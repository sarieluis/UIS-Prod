<?php
// Validate that every needed param is in place.
if( ! isset( $_REQUEST['payment_id'] ) ) {
  wp_die( 'It seems you navigated to a wrong URL. You might want to go back to <a href="'. get_site_url() .'">HOMEPAGE</a> [4]' );
}

$payment_3d = isset( $_REQUEST['3d'] ) ? 'yes' : 'no';

// Include Header
get_header( 'fibonatix' );

// todo: Validate if session is open or not. This validation is not working.
if( ! isset( $_SESSION ) )
  session_start();

// Get Files to begin work
require_once( INMANAGE_FIBONATIX_PATH . '/templates/php-libs/classes/fibonatix.class.php' );
include_once( $_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/system.php' );

// List of classes that are needed on this page
use Inmanage\Database\Database;
use Inmanage\SalesForce\MCSalesForce\MCSalesForce;
use Inmanage\SalesForce\SalesForceRequest;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceAccount\SalesForceAccount;
use Inmanage\SalesForce\SalesForceOpportunity\SalesForceOpportunity;

// Get instance of Fibonatix
$fibonatix = FibonatixGateway::get_instance();

// Define default Payment Process Type
$payment_process_type = 'lead';

// get payment id from given params
$payment_id = isset( $_REQUEST['payment_id'] ) ? $_REQUEST['payment_id'] : false;
if( ! $payment_id ) die( 'Something went wrong. Please follow the <a href="'.get_site_url().'">LINK</a> to return to Homepage.[35]' );

// get payment object by payment id.
$SalesForcePaymentObject = new \Inmanage\SalesForce\SalesForcePayment\SalesForcePayment( $payment_id );
// Get opportunity if there is one.
// If opportunity ID is empty then it means that This is the first payment
// and it's performed as a Lead. If not then it is an opportunity type of Flow.
$opportunity_id = $SalesForcePaymentObject->Opportunity__c;
if( $opportunity_id ) {
  $payment_process_type = 'opportunity';
}
// Get Lead ID
$lead_id = $SalesForcePaymentObject->Lead__c;

// Get Status Payment
$payments_status = $SalesForcePaymentObject->Payment_Status__c;


// Lead Type process Flow
if( $payment_process_type == 'lead' ) {

  // Get lead object
  $SalesForceLeadObject = SalesForceObject::lead_factory( $lead_id );


  if( $SalesForceLeadObject instanceof SalesForceLead ) {

    $object_id          = $SalesForcePaymentObject->Id;
    $first_name         = $SalesForceLeadObject->FirstName;
    $last_name          = $SalesForceLeadObject->LastName;
    $currency_iso_code  = $SalesForceLeadObject->CurrencyIsoCode;
    $email              = $SalesForceLeadObject->Email;
    $street             = $SalesForceLeadObject->Street;
    $city               = $SalesForceLeadObject->City;
    $state_code         = $SalesForceLeadObject->StateCode;
    $postal_code        = $SalesForceLeadObject->PostalCode;
    $country_code       = $SalesForceLeadObject->CountryCode;
    $amount             = $SalesForcePaymentObject->Payment_Amount__c;


  } else die( 'Something went wrong. You can navigate to <a href="' . get_site_url() . '">Homepage</a> by clicking the link.[70]' );

}
// Opportunity Type process Flow
else if( $payment_process_type == 'opportunity' ) {

  $SalesForceOpportunityObject = SalesForceObject::opportunity_factory( $opportunity_id );

  if ( $SalesForceOpportunityObject instanceof SalesForceOpportunity ) {

    // Opportunity.
    $SalesForceAccount  = new SalesForceAccount($SalesForceOpportunityObject->AccountId);
    $object_id          = $SalesForcePaymentObject->Id;
    $first_name         = $SalesForceAccount->FirstName;
    $last_name          = $SalesForceAccount->LastName;
    $currency_iso_code  = $SalesForceOpportunityObject->CurrencyIsoCode;
    $email              = $SalesForceAccount->PersonEmail;
    $street             = $SalesForceAccount->PersonMailingStreet;
    $city               = $SalesForceAccount->PersonMailingCity;
    $state_code         = $SalesForceAccount->PersonMailingStateCode ?: $SalesForceAccount->PersonMailingCountryCode;
    $postal_code        = $SalesForceAccount->PersonMailingPostalCode;
    $country_code       = $SalesForceAccount->PersonMailingCountryCode;
    $amount             = $SalesForcePaymentObject->Payment_Amount__c;
  } else die( 'Something went wrong. You can navigate to <a href="' . get_site_url() . '">Homepage</a> by clicking the link. [93]' );

}
// if There is some problem in the flow and we get to this case then there is an error.
else die( 'Something went wrong. You can navigate to <a href="' . get_site_url() . '">Homepage</a> by clicking the link. [97]' );

// Send Payment request to fibonatix.
$payment_form_result = $fibonatix->send_payment_form_request(
    $object_id,
    $first_name,
    $last_name,
    $amount,
    $currency_iso_code,
    $email,
    $street,
    $city,
    $state_code,
    $postal_code,
    $country_code,
    $payment_3d
);

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body style="background-color: transparent;" >

  <?php if( is_array( $payment_form_result ) && isset( $payment_form_result['redirect-url'] ) && $payments_status != 'Success' && $payments_status != 'Cancelled' ) : // If everything is ok then show ?>
    <!--  Payment iFrame  -->
    <div class="payment-iframe-holder">
         <iframe frameborder="0" src="<?php echo $payment_form_result['redirect-url'] ?>" id="payment-iframe" width="100%" height="700"></iframe>
        <!--<iframe frameborder="0" src="http://uis.urbanet.co.il/sariel/" id="payment-iframe" width="100%" height="830"></iframe>-->
   </div>
   <!--  End Payment iFrame  -->
  <?php else : ?>

    <!--  Error Message   -->
    <!--<p>Oops... Something went wrong... You can navigate to <a style="color:blue; text-decoration: underline" href="<?php echo get_site_url(); ?>">Homepage</a> by clicking the link. [134]</p>-->
      <p>Oops, this link has expired. Please request a new payment link from your UIS account manager.</p>
    <!--  End Error Message  -->

  <?php endif; ?>

  <!-- Footer -->
  <?php get_footer( 'fibonatix' ); ?>
  <!-- End Footer -->

</body>
</html>