<?php

// Validating that required post params have been passed here.
// If not then we stop everything and show an Error message to the weird guy
// That loaded this page directly.
if( ! isset( $_POST ) || ! isset( $_POST['client_orderid'] ) ) {
  exit( 'An error occurred. You can go back to homepage by clicking on <a href="' . get_site_url() . '" >THIS</a> link.' );
}

// Include required files
require_once( INMANAGE_FIBONATIX_PATH . '/templates/php-libs/classes/fibonatix.class.php' );
require_once( INMANAGE_FIBONATIX_PATH . '/templates/php-libs/invoice4u/index.php' );
include_once($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/system.php');

// Use Classes
use InManage\Invoice4u\invoice4u;
use InManage\Invoice4u\Invoice4uDocument;
use InManage\Invoice4u\AbstractClass\Invoice4uServices;
use InManage\Invoice4u\Mail;
use InManage\Invoice4u\Payment;
use InManage\Invoice4u\invoice4u_discount;
use InManage\Invoice4u\Item;
use InManage\Invoice4u\AbstractClass\Invoice4uPaymentType;

use Inmanage\Database\Database;
use Inmanage\SalesForce\MCSalesForce\MCSalesForce;
use Inmanage\SalesForce\SalesForceRequest;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceOpportunity\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForcePayment\SalesForcePayment;
use Inmanage\SalesForce\SalesForceAccount\SalesForceAccount;

// Create Fibonatix Instance
$fibonatix = FibonatixGateway::get_instance();

//*************************LOGGER*****************************//
// Create an array with DATA to log.
$log_array['response_fields']     = $_POST;
$log_array['status']              = isset($_POST['status'])           ? $_POST['status']           : null;
$log_array['type']                = isset($_POST['type'])             ? $_POST['type']             : null;
$log_array['last-four-digits']    = isset($_POST['last-four-digits']) ? $_POST['last-four-digits'] : null;
$log_array['processor-tx-id']     = isset($_POST['processor-tx-id'])  ? $_POST['processor-tx-id']  : null;

// Log The request.
$where = array( 'orderid' => $_POST['orderid'] );
$fibonatix->log_request( $log_array, $where );
//**************************LOGGER****************************//


// Default type of flow
$type_of_payment = 'lead';

// Create log array
$log_array = array();

// get client_orderid from POST Note: This id is equal to payment_id from SalesForce
$payment_id = $client_orderid = $_POST["client_orderid"] ? $_POST["client_orderid"] : null;

// We are supposed to get a string that holds the payment id
// Example: String(18) - 'a014E00000EmEbRQAV'
$paymentObject = new SalesForcePayment( $payment_id );

// Get the lead ID and then the Lead object
$lead_id = $paymentObject->Lead__c;
if( $lead_id )
  $SalesForceLeadObject = SalesForceObject::lead_factory( $lead_id );

// Check if lead is converted.
// If lead is converted then the flow will be different
if( ! isset( $SalesForceLeadObject ) || $SalesForceLeadObject->IsConverted == true ) {
  $opportunity_id = $paymentObject->Opportunity__c;
  $SalesForceOpportunityObject = SalesForceObject::opportunity_factory( $opportunity_id );
  $type_of_payment = 'opportunity';
  $SalesForceAccountObject = new SalesForceAccount( $paymentObject->Account__c );
}

/**
 * @desc Get transaction details.
 * The payments details are:
 * 1. type
 * 2. serial-number
 * 3. merchant-order-id
 * 4. processor-tx-id
 * 5. paynet-order-id
 * 6. status
 * 7. amount
 * 8. currency
 * 9. descriptor
 * 10. gate-partial-reversal
 * 11. gate-partial-capture
 * 12. transaction-type
 * 13. receipt-id
 * 14. name
 * 15. cardholder-name
 * 16. card-exp-month
 * 17. card-exp-year
 * 18. email
 * 19. processor-rrn
 * 20. approval-code
 * 21. order-stage
 * 22. merchantdata
 * 23. last-four-digits
 * 24. bin
 * 25. card-type
 * 26. bank-name
 * 27. auth-response-code
 * 28. terminal-id
 * 29. paynet-processing-date
 * 30. acquirer-processing-date
 * 31. by-request-sn
 * 32. processor-auth-credit-code
 * 33. card-hash-id
 * 34. verified-3d-status
 * 35. processor-credit-rrn
 * 36. processor-credit-arn
 * 37. processor-debit-arn
 * 38. ips-src-payment-product-code
 * 39. ips-src-payment-product-name
 * 40. ips-src-payment-type-code
 * 41. ips-src-payment-type-name
 */
$payment_detailsArr = $fibonatix->get_transacation_status($_POST['orderid'], $client_orderid);

// Save payment details in vars to use in further code.
$first_six_digits                     = $_REQUEST["bin"];
$format                               = (strlen($payment_detailsArr["card-exp-month"] < 2) ? "0%s" : "%s");
$expiry_month                         = trim(sprintf($format, $payment_detailsArr["card-exp-month"]));
$expiry_year                          = trim($payment_detailsArr["card-exp-year"]);
$last_4_digits                        = trim($payment_detailsArr["last-four-digits"]);
$expiry__c                            = trim("{$expiry_month}/{$payment_detailsArr["card-exp-year"]}");
$status                               = $_REQUEST["status"];
$card_type                            = $payment_detailsArr['card-type'];

// Update given payment. Does not matter if its successful or not.
$payment_args = array(
  'Expiry__c'         => $expiry__c,
  'Last_4_digits__c'  => $last_4_digits,
  'Payment_Date__c'   => SalesForceRequest::convert_to_salesforce_date_format( time() ),
  'Payment_Status__c' => $status == 'approved' ? 'Success' : 'Declined',
  'PIN__c'            => $first_six_digits
) ;
if( isset( $_POST['error_message'] ) && $status == 'declined' )
  $payment_args['Rejection_Reason__c'] = $_POST['error_message'];

$paymentObject->update( $payment_args );

$invoice_doc_data = array(
  'salesforce_object_id'  => $payment_id, // Payment ID
  'payment_object'        => $paymentObject, // Payment Object
  'type_of_payment'       => $type_of_payment,
  'card-exp-month'        => $expiry_month,
  'card-exp-year'         => $expiry_year,
  'card-type'             => $card_type,
  'last-4-digits'         => $last_4_digits,
  'cases'                 => array()
);

// todo: redo that thing. should be unique transient somehow
$mail_to_save = isset( $SalesForceLeadObject ) ? $SalesForceLeadObject->Email : (isset( $SalesForceAccountObject) ? $SalesForceAccountObject->PersonEmail : '' );
set_transient( 'lead_mail', $mail_to_save );


// Checking Payment Status.
// If approved
if( $status == "approved" ) {

  // Get invoice document object.
  $invoice_document = new Invoice4uDocument();
  $invoice_private_document = new Invoice4uDocument( 'private' );

  // If it's a first time paying Lead.
  if( $type_of_payment == 'lead' ) {

    // Initialization of Invoice Document Class.
    $payment_array = $invoice_document->init( $SalesForceLeadObject, $invoice_doc_data );
    $invoice_private_document->init( $SalesForceLeadObject, $invoice_doc_data );

    // After generating an invoice we can convert the lead in SF
    if( $SalesForceLeadObject->convert_lead($first_six_digits, $last_4_digits, $expiry__c, $payment_array['partial_payment'], $payment_array['price']) ) {
      $user_id = $SalesForceLeadObject->Website_User_ID__c;
      $user_name = $SalesForceLeadObject->Website_Username__c;

      $invoice_document->ClientCases = $user_name;
      $invoice_private_document->ClientCases = $user_name;
    }

    // Save data in DB for further use.
    $invoice_order_id = $invoice_document->save();
    $invoice_private_order_id = $invoice_private_document->save();
    // Send request to create an invoice receipt for current payment.
    $invoice_document->make_background_invoice_receipt( $invoice_order_id );
    $invoice_private_document->make_background_private_invoice_receipt( $invoice_private_order_id );


  } elseif ( $type_of_payment == 'opportunity' && isset( $SalesForceOpportunityObject ) ){ // Opportunity

      // Initialization of Invoice Document Class.
      $invoice_document->init( $SalesForceOpportunityObject, $invoice_doc_data );
      $invoice_private_document->init( $SalesForceOpportunityObject, $invoice_doc_data );

      $user_name = $SalesForceAccountObject->Website_Username__c;

      $invoice_document->ClientCases = $user_name;
      $invoice_private_document->ClientCases = $user_name;

      // Save data in DB for further use.
      $invoice_order_id = $invoice_document->save();
      $invoice_private_order_id = $invoice_private_document->save();
      // Send request to create an invoice receipt for current payment.
      $invoice_document->make_background_invoice_receipt( $invoice_order_id );
      $invoice_private_document->make_background_private_invoice_receipt( $invoice_private_order_id );
    }

//    die( 'End of flow. [' . __LINE__ . ']' );
    ?>
    <script>
      window.top.location.href = '<?php echo get_site_url(); ?>/secure-payment/fibonatix-thank-you'
    </script>;
    <?php

} else { // If payment failed

  // If it was 'lead' type of payment
  if ( $type_of_payment == 'lead' ) {

//      $SalesForceLeadObject->lead_payment_failed($first_six_digits, $last_4_digits, $expiry__c);;

  }
  // If it was an 'opportunity' type of payment
  elseif ( $type_of_payment == 'opportunity' && isset( $SalesForceOpportunityObject ) ) {

  }
//  die( 'End of flow. [' . __LINE__ . ']' );
  ?>
  <script>
    window.top.location.href = '<?php echo get_site_url(); ?>/secure-payment/fibonatix-error'
  </script>;
  <?php
}