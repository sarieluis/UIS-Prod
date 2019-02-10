<?php
namespace InManage\Invoice4u;
use InManage\Invoice4u\AbstractClass\Invoice4uServices;
use InManage\Invoice4u\AbstractClass\Invoice4uPaymentType;
use InManage\Invoice4u\invoice4u;
use InManage\Invoice4u\Payment;
use InManage\Invoice4u\Mail;
use InManage\Invoice4u\Item;
use DateTime;
use Inmanage\SalesForce\SalesForceAccount\SalesForceAccount;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceOpportunity\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForcePayment\SalesForcePayment;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;
use Inmanage\SalesForce\SalesForceEvaluationProduct\SalesForceEvaluationProduct;
use Inmanage\SalesForce\SalesForceOpportunityLineItem\SalesForceOpportunityLineItem;
use stdClass;

class Invoice4uDocument extends invoice4u {

  /**
   * @var array
   */
  private $db_fields = array(
    'id',
    'ClientID',
    'ClientName',
    'IssueDate',
    'Subject',
    'Currency',
    'RoundAmount',
    'TaxIncluded',
    'Language',
    'BranchID',
    'Payments',
    'Items',
    'AssociatedEmails',
    'PaymentType',
    'sf_object_id',
    'ExternalComments',
    'TaxPercentage',
    'TotalWithoutTax',
    'TotalTaxAmount',
    'Total',
    'ClientAddress',
    'ClientCity',
    'ClientZip',
    'ClientCases',
    'InternalComments',
    'type',
    'Country'
  );

  public $document_types = array(

    'invoice'           => '1',
    'receipt'           => '2',
    'invoice_receipt'   => '3',
    'invoice_credit'    => '4',
    'proforma_invoice'  => '5',
    'invoice_order'     => '6',
    'invoice_quote'     => '7',
    'invoice_ship'      => '8',
    'deposits'          => '9',
  );

  public $BranchID = 666;

  public $id;
  public $Language = 2;
  public $DocumentType;
  public $Subject = 'UIS Canada';
  public $IssueDate;
  public $Items;
  public $AssociatedEmails;
  public $ExternalComments;
  public $InternalComments;
  // Payment
  public $Currency;
  public $RoundAmount;
  public $PaymentType;
  public $Payments;
  public $Total;
  // General
  public $sf_object_id;
  public $invoice_order_id;
  public $type;
  // Client
  public $ClientID;
  public $ClientName;
  public $ClientAddress;
  public $ClientCity;
  public $ClientZip;
  public $ClientCases;

  public $Country;
  // Tax
  public $TaxPercentage;
  public $TaxIncluded;
  public $TotalWithoutTax;
  public $TotalTaxAmount;

  /**
   * Invoice4uDocument constructor.
   */
  public function __construct ( $type = 'client' ) {

    if( $type == 'private' )
      $this->set_mode( 'private_prod' );


    $this->type               = $type;
    $this->ClientID           = '71027'; // General Client ID
    $this->Currency           = 'USD';
    $this->Items              = array();
    $this->Payments           = array();
    $this->AssociatedEmails   = array();
    $this->IssueDate          = date("c", time() );
    $this->TaxIncluded        = true;
  }





  /**
   * Initialize Invoice document object
   *
   * @param $SalesForceObject
   * @param $data
   */
  public function init( $SalesForceObject, $data ) {
//    $mendatory_data = array(
//      payment_object
//      type_of_payment
//      lead_id
//      salesforce_object_id
//      card-exp-month
//      card-exp-year
//      card-type
//    );
    $type_of_payment          = $data['type_of_payment'];
    $SalesForcePaymentObject  = $data['payment_object'];
    $number_of_payments_made  = 0;

    if( $type_of_payment == 'lead' ) {
      $lead_id          = $SalesForcePaymentObject->Lead__c;
      $SalesForceLead   = new SalesForceLead( $lead_id );
      $this->ClientName = $SalesForceLead->FirstName . ' ' . $SalesForceLead->LastName;
      $website_user_id  = $SalesForceLead->Website_User_ID__c;
      $this->add_associated_email( new Mail( $SalesForceLead->Email, true ) );


      $this->add_associated_email( new Mail( $SalesForceObject->Email, true ) );

      $state_code           = $SalesForceLead->StateCode ? ' '.$SalesForceLead->StateCode : '';
      $this->Country        = self::get_country($SalesForceLead->CountryCode, 'code', 'name' );
      $this->ClientCity     = $this->Country . ', ' .$SalesForceLead->City;
      $this->ClientAddress  = $SalesForceLead->Street;
      $this->ClientZip      = $SalesForceLead->PostalCode;

      $sf_request_result = new SalesForceQueryResponse( SalesForceQuery::get_evaluation_product_id_of_lead( $lead_id ) );
      if( ! isset( $sf_request_result ) || $sf_request_result->success == false || count( $sf_request_result->recordsArr ) < 1 ) {
        echo "<p>An error occurred while processing your request</p>";
        die;
      }

      // Calculate What left to pay.
      // Because a lead does not have an opportunity we will find
      // the evaluation product that is being paid
      $evaluation_product_id  = $sf_request_result->recordsArr[0]->Id;
      $evaluation_product     = new SalesForceEvaluationProduct( $evaluation_product_id );

      $product = new SalesForceQueryResponse( SalesForceQuery::get_product_by_id( $evaluation_product->Product__c ) );
      if( ! isset( $product ) || $product->success == false || count( $product->recordsArr ) < 1 ) {
        echo "<p>An error occurred while processing your request</p>";
        die;
      }

      $product_name           = $product->recordsArr[0]->Name;
      $total_price            = $evaluation_product->Price__c;
      $amount_due             = $total_price - $SalesForcePaymentObject->Payment_Amount__c;
      $current_payment_number = 1 + $number_of_payments_made;

    } else {
      $opportunity_id         = $SalesForcePaymentObject->Opportunity__c;
      $account_id             = $SalesForcePaymentObject->Account__c;
      $SalesForceOpportunity  = new SalesForceOpportunity( $opportunity_id );
      $SalesForceAccount      = new SalesForceAccount( $account_id );
      $this->add_associated_email( new Mail( $SalesForceAccount->PersonEmail, true ) );
      $website_user_id        = $SalesForceAccount->Website_User_ID__c;
      $this->ClientName       = $SalesForceAccount->FirstName . ' ' . $SalesForceAccount->LastName;
      $this->Country          = $SalesForceAccount->PersonMailingCountry;
      $state_code             = $SalesForceAccount->PersonMailingCountry ? ' '.$SalesForceAccount->PersonMailingStateCode : '';
      $this->ClientCity       = $SalesForceAccount->PersonMailingCountry . ' ' . $state_code . ', ' .$SalesForceAccount->PersonMailingCity;
      $this->ClientAddress    = $SalesForceAccount->PersonMailingStreet;
      $this->ClientZip        = $SalesForceAccount->PersonMailingPostalCode;

      // Get All payments of current Opportunity
      $sf_request_result = new SalesForceQueryResponse( SalesForceQuery::get_all_payments_of_opportunity( $opportunity_id ) );

      if( ! isset( $sf_request_result ) || $sf_request_result->success == false || count( $sf_request_result->recordsArr ) < 1 ) {
        mail( 'amos@inmanage', 'Error - Payments.', 'Could not find all payments of an opportunity. file:' . __FILE__  . ' | line: ' .  __LINE__ );
        die( 'Something went wrong. Maybe some configurations are missing. [' . __LINE__ . ']' );
      }


//      $sf_request_result2 = new SalesForceQueryResponse( SalesForceQuery::get_line_item_id_by_opportunity( $opportunity_id ) );
//      if( ! isset( $sf_request_result2 ) || $sf_request_result2->success == false || count( $sf_request_result2->recordsArr ) < 1 ) {
//        die( 'Something went wrong. Maybe some configurations are missing. [' . __LINE__ . ']' );
//      }

      $product_name = $SalesForceOpportunity->Type;
      $all_payments = $sf_request_result->recordsArr;
      $sum_paid = 0;

      foreach( $all_payments as $payment ) {
        $sum_paid += $payment->Payment_Amount__c;
      }
      $total_price  = $SalesForceOpportunity->Amount;
      // What left to pay.
      $amount_due   = $total_price - $sum_paid;
      if( $amount_due <= 0 ) {
        $SalesForceOpportunity->StageName = $SalesForceOpportunity::STAGE_CLOSE_WON;
        $SalesForceOpportunity->set_oppertunity_StageName( $SalesForceOpportunity::STAGE_CLOSE_WON );
      } else {
        $SalesForceOpportunity->StageName = $SalesForceOpportunity::STAGE_PARTIAL_PAID;
        $SalesForceOpportunity->set_oppertunity_StageName( $SalesForceOpportunity::STAGE_PARTIAL_PAID );
      }
      // Calculate which payment is it now.
      $current_payment_number = count( $sf_request_result->recordsArr );
    }

    // Gather information for the Invoice.
    $this->sf_object_id       = $data['salesforce_object_id'];
    $ExternalComments         = 'Payment number: ' . $current_payment_number . '<br>';
    $ExternalComments         .= 'Total amount: ' . $total_price . ' ' . $SalesForceObject->CurrencyIsoCode .'<br>';
    $ExternalComments         .= 'Amount Due: ' . $amount_due . ' ' . $SalesForceObject->CurrencyIsoCode;
    $this->ExternalComments   = $ExternalComments;

    $this->Subject            = 'UIS Canada';
    $this->TaxPercentage      = $this->type == 'client' ? $this->get_vat_by_country_name($this->Country) : 0;
    $this->TaxIncluded        = true;
    $this->TotalWithoutTax    = $SalesForcePaymentObject->Payment_Amount__c / (1 + ($this->TaxPercentage/100));
    $this->TotalTaxAmount     = $SalesForcePaymentObject->Payment_Amount__c - $this->TotalWithoutTax;
    $this->Total              = $SalesForcePaymentObject->Payment_Amount__c;
    $this->PaymentType        = Invoice4uPaymentType::Credit;
    $this->add_item(
      new Item (
        '001',
        $product_name,
        1,
        $SalesForcePaymentObject->Payment_Amount__c,
        new invoice4u_discount( '0', false ),
        $SalesForcePaymentObject->Payment_Amount__c / (1 + ($this->TaxPercentage/100)),
        $this->TaxPercentage
      )
    );
    $this->add_payment(
      new Payment( $this->IssueDate,
        $SalesForcePaymentObject->Payment_Amount__c,
        1,
        '1',
        $website_user_id,
        trim( $data['card-exp-month'] ) .'-'. trim( $data["card-exp-year"] ),
        $data['last-4-digits'],
        trim( $data['card-type'] )
      )
    );

    return array( 'partial_payment' => $SalesForcePaymentObject->Payment_Amount__c, 'price' => $total_price );
  }





  /**
   * Makes a linux request to run invoice generation file in background;
   *
   * @param $invoice_order_id
   */
  public function make_background_invoice_receipt( $invoice_order_id ) {

    $command = "wget -O - '{$_SERVER['HTTP_HOST']}/inmanage/_crons/invoice4u.cron.receipt.php?invoice_data=" . $invoice_order_id ."' > /dev/null 2>/dev/null &";

    shell_exec($command); //run the command in background without waiting to server response.
  }



  /**
   * Makes a linux request to run invoice generation file in background;
   *
   * @param $invoice_order_id
   */
  public function make_background_private_invoice_receipt( $invoice_order_id ) {

    $command = "wget -O - '{$_SERVER['HTTP_HOST']}/inmanage/_crons/invoice4u.cron.private.receipt.php?invoice_data=" . $invoice_order_id ."' > /dev/null 2>/dev/null &";

    shell_exec($command); //run the command in background without waiting to server response.
  }





  /**
   * @param string $user_phone
   * @return array
   */
  public function create_customer() {

    $cases_string = 'Case number: '. $this->ClientCases ;

    //24.01.2017 | Itay: comment this line, because Customer object doesnt support multiple emails.
    //$customer = new Customer($user_full_name, $user_phone, $user_emailArr);
//    $customer = new Customer($this->ClientName, $user_phone);
    $customer = new stdClass();
    $customer->Name     = $this->ClientName;
    $customer->Address  = $this->ClientAddress;
    $customer->City     = $this->ClientCity;
    $customer->Zip      = $this->ClientZip;
//    $customer->Phone = $cases_string;
    $customer->Email    = $cases_string;

    if( ! self::$token || self::$token == false || empty( self::$token ) )
      $this->login();
    $result = $this->do_soap_request( array('customer' => $customer, 'token' => self::$token), Invoice4uServices::create_customer[$this->mode], 'Create' );

    if ($result->Errors->CommonError->ID > 0 || !empty($result->Errors->CommonError->Error)) {
      return array("error" => $result->Errors->CommonError->ID, "error_msg" => $result->Errors->CommonError->Error);
    }
    return $result->CreateResult->ExtNumber;
  }





  /**
   * @return mixed
   */
  public function GetCustomerByName()
  {
    if( ! self::$token || self::$token == false || empty( self::$token ) )
      $this->login();
    $result = $this->do_soap_request(  array('name' => $this->ClientName, 'token' => self::$token), Invoice4uServices::create_customer[$this->mode], 'GetByName' );
    return $result->GetByNameResult->ExtNumber;
  }





  /**
   * @desc Gathers Information for the request. Sends the request to make new invoice
   * for current Transaction
   *
   * @param $sf_record_id
   * @return mixed
   */
  public function invoice_receipt( $sf_record_id ) {


//    $generalCustomer = new stdClass();
//    $generalCustomer->Name = $this->ClientName;
//    $generalCustomer->Identifier = $this->sf_object_id . time();

    $customer = $this->GetCustomerByName();
    if(!$customer || empty($customer)){
      $customer = $this->create_customer();
    }

    $case_numbers = $this->ClientCases;
    $cases_string = 'Case number: ';
    foreach( $case_numbers as $case_number )
      $cases_string .= $case_number . ' ';
    $this->InternalComments = $cases_string;

    // validate that the token is in place
    if( ! self::$token || self::$token == false || empty( self::$token ) )
      $this->login();

    $post_data = array();
    $post_data['token'] = self::$token;
    $post_data['doc'] = array();
    $post_data['doc']['Language'] = 2;
    $post_data['doc']['ExternalComments'] = $this->ExternalComments;
    $post_data['doc']['InternalComments'] = $this->InternalComments;
    $post_data['doc']['ClientID'] = $customer;
    $post_data['doc']['DocumentType'] = 3;
    $post_data['doc']['Subject'] = $this->Subject;
    $post_data['doc']['Currency'] = $this->Currency;
    $post_data['doc']['IssueDate'] = $this->IssueDate;
    $post_data['doc']['TaxIncluded'] = $this->TaxIncluded;
    $post_data['doc']['TaxPercentage'] = $this->TaxPercentage;
    $post_data['doc']['TotalWithoutTax'] = $this->TotalWithoutTax;
    $post_data['doc']['TotalTaxAmount'] = $this->TotalTaxAmount;
    $post_data['doc']['Payments'] = $this->Payments;
    $post_data['doc']['Items'] = $this->Items;
    $post_data['doc']['AssociatedEmails'] = array( new stdClass() );

    $response = $this->do_soap_request( $post_data, Invoice4uServices::invoice_receipt[$this->mode], 'CreateDocument' );

    $doc_id = $this->get_doc_id( $response );

    $this->log_doc( array( 'sf_record_id' => $sf_record_id, 'doc_id' => $doc_id ) );

    return $response;
  }







  /**
   * @desc retrieves the document id from the response after generating the response
   *
   * @param $response_object
   * @return bool
   */
  public function get_doc_id( $response_object ) {

    if( is_string( $response_object ) ) $response_object = json_decode( $response_object );

    // Validating that everything is in place
    if( ! is_object( $response_object ) || ! isset( $response_object->CreateDocumentResult ) ) return false;
    if( ! is_object( $response_object->CreateDocumentResult ) ) return false;
    if( ! isset( $response_object->CreateDocumentResult->ID ) ) return false;

    // if everything is in place than return the ID
    return $response_object->CreateDocumentResult->ID;
  }





  /**
   * @desc retrieves the document id from the response after generating the response
   *
   * @param $response_object
   * @return bool
   */
  public function get_doc_number( $response_object ) {

    if( is_string( $response_object ) ) $response_object = json_decode( $response_object );

    // Validating that everything is in place
    if( ! is_object( $response_object ) || ! isset( $response_object->CreateDocumentResult ) ) return false;
    if( ! is_object( $response_object->CreateDocumentResult ) ) return false;
    if( ! isset( $response_object->CreateDocumentResult->ID ) ) return false;

    // if everything is in place than return the ID
    return $response_object->CreateDocumentResult->DocumentNumber;
  }





  /**
   * @desc adds item to the item array of current instance
   *
   * @param $item
   */
  public function add_item( $item ) {

    $items        = $this->Items;
    $items[]      = $item;
    $this->Items  = $items;
  }





  /**
   * @desc adds payment to the payments array of current instance
   *
   * @param $payment
   */
  public function add_payment( $payment ) {

    $payments       = $this->Payments;
    $payments[]     = $payment;
    $this->Payments = $payments;
  }





  /**
   * @desc adds Associated Email to the Associated Emails array of current instance
   *
   * @param $mail
   */
  public function add_associated_email( $mail ) {

    $associated_emails        = $this->AssociatedEmails;
    $associated_emails[]      = $mail;
    $this->AssociatedEmails  = $associated_emails;
  }





  /**
   * @desc Saves to the DB the data about the invoice for current Transaction
   *
   * @param $log_array
   * @return false|int
   */
  public function log_doc( $log_array ) {

    global $wpdb; // global WP database object that we will use to operate.

    // table name to operate with.
    $table = 'tb_invoice4u_docs_log';

    // create new log row

    // Data to Insert
    $data = array(
      'sf_record_id'        => $log_array['sf_record_id'],
      'doc_id'              => $log_array['doc_id'],
    );

    // logging the request into the database.
    $result = $wpdb->insert( $table, $data );
    if( $result ) $result =  $wpdb->insert_id;


    return $result;
  }





  /**
   * @desc saves current instance data to database.
   *
   * @return false|int
   */
  public function save() {

    global $wpdb; // global WP database object that we will use to operate.

    $table = 'tb_uisorders';
    $data = array();

    // going though current instance data and saving it to an array;
    // arrays and objects will be serialized
    foreach( $this->db_fields as $field ) {

      if( is_array( $this->$field ) || is_object( $this->$field ) ) {

        $data[$field] = serialize( $this->$field );
      } else {

        $data[$field] = $this->$field;
      }
    }

    // result will hold the new row id. OR it will hold boolean FALSE;
    $result = $wpdb->insert( $table, $data );

    if( $result ) return $wpdb->insert_id;

    return $result;
  }





  /**
   * Gets all data of an order by invoice_order_id and saves in current
   * instance.
   *
   * @param $invoice_order_id
   * @return bool
   */
  public function get( $invoice_order_id ) {

    global $wpdb; // global WP database object that we will use to operate.

    // The table with which we will operate
    $table = 'tb_uisorders';

    // Getting the request ready for further use.
    $request = 'SELECT * FROM ' . $table . ' WHERE id = ' . $invoice_order_id . ' AND `type` = "' . $this->type . '"';

    // Do sql request
    $result = $wpdb->get_results( $request );

    if( ! empty( $result ) ) {

      foreach( $result as $row ) {

        foreach( $row as $key => $value ) {

          if( is_serialized( $value ) ) {
            $this->$key = unserialize( $value );
          } else {
            $this->$key = $value;
          }
        }
      }

      return true;
    }

    return false;
  }





  /**
   * @param $doc_id
   * @param $doc_number
   * @return string
   */
  public function download_pdf( $doc_id, $doc_number ) {



    if( $this->mode == 'prod' ) {
      $url = 'https://newview.invoice4u.co.il/Views/PDF.aspx?docid='. $doc_id .'&docNumber='. $doc_number .'&isOriginal=true';
      $path_to_save = $_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/invoices/invoice' . date( 'd-m-Y-H-i-s' ) . '-' . $doc_number . '.pdf';
    } else if( $this->mode == 'private_prod' ) {
      $url = 'https://newview.invoice4u.co.il/Views/PDF.aspx?docid='. $doc_id .'&docNumber='. $doc_number .'&isOriginal=true';
      $path_to_save = $_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/invoices/invoice' . date( 'd-m-Y-H-i-s' ) . '-priv-' . $doc_number . '.pdf';
    } elseif( $this->mode == 'dev' ) {
      $url = 'https://newviewqa.invoice4u.co.il/Views/PDF.aspx?docid='. $doc_id .'&docNumber='. $doc_number .'&isOriginal=true';
      $path_to_save = $_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/invoices/invoice' . date( 'd-m-Y-H-i-s' ) . '-test-' . $doc_number . '.pdf';
    }

    copy( $url, $path_to_save );

    return $path_to_save;
  }





  /**
   * Sends confirmation mail with invoice to the customer.
   *
   * @param $file_path
   */
  public function send_mail_to_customer( $file_path ) {

    // Get the file name
    $filename = basename( $file_path );

    // Generating a string with all mails that have to receive this email.
//    $mailto = 'amos@inmanage.net, ';
    $mailto = '';
    foreach( $this->AssociatedEmails as $associatedEmail ) {


      $mailto .= $associatedEmail->Mail . ', ';
    }

//    $mailto .= 'amos@inmanage.net'; // todo: remove when going Live

    // Mail subject.
    $subject = 'Your Invoice from UIS Canada';

    // Mail body - Content.
    $message  = '<p>Dear ' . $this->ClientName . ',<br />';
    $message .= 'Thank you for choosing UIS Canada. <br />';
    $message .= 'We are glad to confirm your successful payment. Please find attached your detailed invoice.  <br />';
    $message .= 'Thank you for your cooperation. <br />';
    $message .= 'Sincerely,';

    // Mail body - Signature
    $message .= $this->get_mail_singature_html();

    // Mail Headers
    $headers    = array();
    $headers[]  = 'From: UIS Canada <Billing@uiscanada.com>';
    $headers[]  = 'Bcc: Billing@uiscanada.com';
    $headers[]  = 'Reply-To: Billing@uiscanada.com';

    // Mail Attachments.
    $attachments = array();
    $attachments[] = $file_path; // The invoice.

    // Send Mail.
    if( wp_mail( $mailto, $subject, $message, $headers, $attachments ) ) {
      echo "Error mail sent Successfully.";
    } else {
      echo "Failed to send error Mail.";
      print_r( error_get_last() );
    }

    // End of Method
  }



  /**
   * Sends confirmation mail with invoice to the customer.
   *
   * @param $file_path
   */
  public function send_mail_to_uis( $file_path ) {

    // Get the file name
    $filename = basename( $file_path );

    // Generating a string with all mails that have to receive this email.
    $mailto = 'john@uiscanada.com';
//    $mailto = '';

//    $mailto .= 'itaibar@inmanage.net,';

//    $mailto .= 'amos@inmanage.net'; // todo: remove when going Live

    // Mail subject.
    $subject = 'Your Invoice from UIS Canada';

    // Mail body - Content.
    $message  = '<p>Dear ' . $this->ClientName . ',<br />';
    $message .= 'Thank you for choosing UIS Canada. <br />';
    $message .= 'We are glad to confirm your successful payment. Please find attached your detailed invoice.  <br />';
    $message .= 'Thank you for your cooperation. <br />';
    $message .= 'Sincerely,';

    // Mail body - Signature
    $message .= $this->get_mail_singature_html();

    // Mail Headers
    $headers    = array();
    $headers[]  = 'From: UIS Canada <Billing@uiscanada.com>';
    $headers[]  = 'Reply-To: Billing@uiscanada.com';

    // Mail Attachments.
    $attachments = array();
    $attachments[] = $file_path; // The invoice.

    // Send Mail.
    if( wp_mail( $mailto, $subject, $message, $headers, $attachments ) ) {
      echo "Error mail sent Successfully.";
    } else {
      echo "Failed to send error Mail.";
      print_r( error_get_last() );
    }

    // End of Method
  }





  /**
   * Sends mail with error. This mail should be sent when there was an error generating
   * The invoice of a customer.
   *
   * Uses WP Mail instead of PHP's mail() function.
   */
  public function send_failure_mail() {

    $mailto = '';

    // Gathers all mails that are related to current order.
    foreach( $this->AssociatedEmails as $associatedEmail ) {

      // Stringifying the emails to a big, long string
      $mailto .= $associatedEmail->Mail . ', ';
    }

    // This is a another mail for the administration to be informed that
    // there was an error.
    $mailto .= 'shai@uiscanada.com';  // todo: Comment When going Live
    //    $mailto = 'billing@uiscanada.com'; // todo: Uncomment when going Live

    // Mail Body.
    $subject = 'Oops... It seems that something went wrong - UIS Canada';
    $message  = '<p>Dear <b>' . $this->ClientName . '</b>,<br />';
    $message .= 'Thank you for choosing UIS Canada. <br />';
    $message .= 'We are sorry to inform you that something went wrong while generating your invoice. Please contact UIS Canada to resolve this issue.  <br />';
    $message .= 'Thank you for your cooperation. <br />';
    $message .= 'Sincerely,';

    // Mail Signature.
    $message .= $this->get_mail_singature_html();

    // Mail Headers
    $headers    = array();
    $headers[]  = 'From: UIS Canada <Billing@uiscanada.com>';
    $headers[]  = 'Reply-To: Billing@uiscanada.com';

    // Send Mail.
    if( wp_mail( $mailto, $subject, $message, $headers ) ) {
      echo "Error mail sent Successfully.";
    } else {
      echo "Failed to send error Mail.";
      print_r( error_get_last() );
    }

    // End of Method.
  }





  /**
   * Generates and returns Email Signature HTML.
   *
   * @return string
   */
  public function get_mail_singature_html() {

    $signature  = '<div style="">';
    $signature .= '<div style="clear: both"></div>';
    $signature .= '<img style="margin-right: 15px; float:left; border-right: 3px solid #f00; width: auto; height: auto" src="'. get_site_url() .'/wp-content/uploads/2018/03/unnamed.jpg" />';
    $signature .= '<div style="float: left; margin-top: 28px;">';
    $signature .= '<h2 style="color: red; margin-bottom: 5px;">Billing Department</h2>';
    $signature .= '<p style="margin: 0px;"><b>UIS Canada</b></p>';
    $signature .= '<p style="margin: 0px;"><span style="color:red">m:</span> <a href="tel:+15874043939">+1-604-262-3728</a></p>';
    $signature .= '<p style="margin: 0px;"><span style="color:red">a:</span> <a href="https://www.google.com/maps/place/10665+Jasper+Ave,+Edmonton,+AB+T5J+3S9,+Canada/@53.540499,-113.5062687,17z/data=!3m1!4b1!4m5!3m4!1s0x53a0223820775507:0xa3e0450a2affa988!8m2!3d53.540499!4d-113.50408">68 Water Street, Office 406, Gastown, Vancouver, BC V6B 1A4, Canada</a></p>';
    $signature .= '<p style="margin: 0px;"><span style="color:red">w:</span> <a href="https://www.uiscanada.com">uiscanada.com</a> <span style="color:red">e:</span> <a href="mailto:billing@uiscanada.com">billing@uiscanada.com</a></p>';
    $signature .= '</div>';
    $signature .= '<div style="clear: both"></div>';
    $signature .= '</div>';


    return $signature;

    // End of Method.
  }





  /**
   * @param $country_code
   * @return mixed|string
   */
  private static function convert_country_code_to_country_name( $country_code ) {
    // Countries Array
    $countries = array (
      'AF' => 'Afghanistan', 'AX' => 'Aland Islands', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua And Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia', 'BA' => 'Bosnia And Herzegovina', 'BW' => 'Botswana', 'BV' => 'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory', 'BN' => 'Brunei Darussalam', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' => 'Cape Verde', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' => 'Congo', 'CD' => 'Congo, Democratic Republic', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica', 'CI' => 'Cote D\'Ivoire', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia', 'FK' => 'Falkland Islands (Malvinas)', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji', 'FI' => 'Finland', 'FR' => 'France', 'GF' => 'French Guiana', 'PF' => 'French Polynesia', 'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' => 'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GG' => 'Guernsey', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard Island & Mcdonald Islands', 'VA' => 'Holy See (Vatican City State)', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' => 'Iran, Islamic Republic Of', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IM' => 'Isle Of Man', 'IL' => 'Israel', 'IT' => 'Italy', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JE' => 'Jersey', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KR' => 'Korea (North)', 'KP' => 'Korea (South)', 'KW' => 'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => 'Lao People\'s Democratic Republic', 'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libyan Arab Jamahiriya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macao', 'MK' => 'Macedonia', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia, Federated States Of', 'MD' => 'Moldova', 'MC' => 'Monaco', 'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'NL' => 'Netherlands', 'AN' => 'Netherlands Antilles', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PW' => 'Palau', 'PS' => 'Palestinian Territory, Occupied', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' => 'Poland', 'PT' => 'Portugal', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'BL' => 'Saint Barthelemy', 'SH' => 'Saint Helena', 'KN' => 'Saint Kitts And Nevis', 'LC' => 'Saint Lucia', 'MF' => 'Saint Martin', 'PM' => 'Saint Pierre And Miquelon', 'VC' => 'Saint Vincent And Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'ST' => 'Sao Tome And Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia', 'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovakia', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa', 'GS' => 'South Georgia And Sandwich Isl.', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard And Jan Mayen', 'SZ' => 'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' => 'Syrian Arab Republic', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan', 'TZ' => 'Tanzania', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad And Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' => 'Turks And Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom', 'US' => 'United States', 'UM' => 'United States Outlying Islands', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VE' => 'Venezuela', 'VN' => 'Viet Nam', 'VG' => 'Virgin Islands, British', 'VI' => 'Virgin Islands, U.S.', 'WF' => 'Wallis And Futuna', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe',
    );

    // Search for the country code by given country name.
    $country_name = isset( $countries[$country_code] ) ? $countries[$country_code] : '';

    // return it. (If nothing found then)
    return $country_name;
  }


  /**
   * Gets content of a JSON file with the list of countries.
   * Finds needed value in an array of country arrays by one
   * of the values that the needed countries holds.
   *
   * If nothing matches then we return false.
   * Else we return the value that we were searching for.
   *
   * @param $value // The value to search by
   * @param $search_by // the key to search by
   * @param $search_for // the key that holds the needed information
   * @return bool
   */
  function get_country( $value, $search_by, $search_for ) {

    $countries = json_decode( file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/phone-codes.json' ), true );

    foreach ( $countries as $key => $country ) {

      if ( strtolower($country[ $search_by ]) == strtolower( $value ) ) {
        return $country[ $search_for ];
      }
    }

    return false;
  }

  /**
   * Gets content of a JSON file with the list of countries and their VATs.
   *
   * If nothing matches then we return 0.
   * Else we return the value of the VAT.
   *
   * @return int
   */
  function get_vat_by_country_name( $country_name ) {

    $countries = json_decode( file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/countries-vats.json' ), true );

    foreach ( $countries as $country ) {
      if ( strtolower($country[ 'name' ]) == strtolower( $country_name ) ) {
        return $country[ 'vat' ];
      }
    }

    return 0;
  }


  // End of Class
}