<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 10/12/2017
 * Time: 17:16
 */

namespace Inmanage\SalesForce\SalesForceLead;
use Inmanage\SalesForce\SalesForceAccount\SalesForceAccount;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceContact\SalesForceContact;
use Inmanage\SalesForce\SalesForceEvaluationProduct\SalesForceEvaluationProduct;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceOpportunity\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForceOpportunityLineItem\SalesForceOpportunityLineItem;
use Inmanage\SalesForce\SalesForcePayment\SalesForcePayment;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;
use ReflectionFunction;
use SoapClient;
use SoapHeader;
use Exception;
use SoapVar;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceLead extends SalesForceObject{
    public  $baseUriArr = array(
        'sobjects',
        'Lead',
        'id',
        '{Id}'
    );

    public $Id;
    public $OwnerId;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Street;
    public $City;
    public $StateCode;
    public $CountryCode;
    public $PostalCode;
    public $Status;
    public $CurrencyIsoCode;
    public $Last_4_digits__c;
    public $Expiry__c;
    public $IsConverted;
    public $Partial_Payment__c;
    public $Website_User_ID__c;
    public $Total_Price__c;
    public $Partner_ID__c;
    public $Website_Username__c;

    public function __construct($salesforce_object_id)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct();
    }


    public function convert_lead($first_six_digits, $last_4_digits, $expiry__c, $partial_payment, $full_price) {

      // get instance of SalesForce Lead
      $SalesForceConfig = SalesForceConfig::get_instance();

      // Create an instance of SOAP
      $SoapClient = new SoapClient($_SERVER["DOCUMENT_ROOT"] .self::SOAP_PATH, array("trace" => 1));
      //$SoapClient = new SoapClient($_SERVER["DOCUMENT_ROOT"] .self::SOAP_PATH_TEST, array("trace" => 1));
      // Send login request to SF.

      $LoginResponse = $SoapClient->login(array("username" => $SalesForceConfig->user_name, 'password' => $SalesForceConfig->password .$SalesForceConfig->token) ); //do login to get remote endpoint
      // Set the endpoint url.
      $SoapClient->__setLocation($LoginResponse->result->serverUrl);
      // Set the session header.
      $SessionHeader = new SoapHeader("urn:enterprise.soap.sforce.com", 'SessionHeader', array (
          'sessionId' => $LoginResponse->result->sessionId,
      ));

      // Set the convertLead fields.
      $xml = <<<XML
      <sequence>
        <leadId>{$this->Id}</leadId>
        <convertedStatus>Paid</convertedStatus>
      </sequence> 
XML;

      //convert it to the WSDL Syntax
      $SoapVar = new SoapVar($xml, XSD_ANYXML);
      //set the session header.
      $SoapClient->__setSoapHeaders($SessionHeader);

      // Try Convert Lead
      try {

        // Convert Lead
        $ConvertResponse = $SoapClient->convertLead(array($SoapVar)); //convert

      } catch(Exception $e) {

        // if there was an error converting the lead then send an email with the
        // details of the error that occurred
        mail(implode(',', self::$mailsArr),'MEDIA CRUSH CONVERT() ERROR '.__FILE__,print_r(array("Error"=>$e->getMessage(), "code"=>$e->getCode(), "Request Out"=>$SoapClient->__getLastRequest(), 'Response IN'=>$SoapClient->__getLastResponse()),true),'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n");
      }


      // Get the result of the response
      $ConvertResponse = isset( $ConvertResponse ) ? $ConvertResponse->result : false;

        if( is_object( $ConvertResponse ) && (int)$ConvertResponse->success) {

            SalesForceOpportunityLineItem::insert_opportunity_line_item($this, $ConvertResponse);
            //update oppertunity.
            $SalesForceOpportunity = new SalesForceOpportunity($ConvertResponse->opportunityId);
            $SalesForceOpportunity->update_oppertunity_StageName($partial_payment, $full_price);
//            SalesForcePayment::insert_new_payment($first_six_digits, $last_4_digits, $this->Id, $this->Partial_Payment__c, $ConvertResponse->accountId, $ConvertResponse->opportunityId, $expiry__c, SalesForcePayment::PAYMENT_STATUS_SUCCESS);
            $this->update_all_other_unassigned_payments($ConvertResponse);
            $result = true;
        }
        else{
            mail(implode(',', self::$mailsArr),'MEDIA CRUSH CONVERT() success is FALSE'.__FILE__,print_r(array("Request Out"=>$SoapClient->__getLastRequest(), 'Response IN'=>$SoapClient->__getLastResponse()),true),'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n");
            $result = false;
        }


        return $result;
    }

    public function update_all_other_unassigned_payments($ConvertResponse)
    {
        $PaymentResponse = new SalesForceQueryResponse(SalesForceQuery::get_all_other_unassigned_payments($this->Id));
        $updatedArr = array();

        foreach ($PaymentResponse->recordsArr as $PaymentRecord)
        {
            $SalesForcePayment = new SalesForcePayment($PaymentRecord->Id, array(), true);
            $SalesForcePayment->Account__c = $ConvertResponse->accountId;
            $SalesForcePayment->Opportunity__c = $ConvertResponse->opportunityId;
            $status = $SalesForcePayment->update_unssigned_payments();
            if(!!$status)
            {
                $updatedArr[] = $status;
            }
        }

        return !!$updatedArr;
    }

    public function lead_payment_failed($first_six_digits, $last_4_digits, $expiry__c)
    {
        $id = SalesForcePayment::insert_new_payment($first_six_digits, $last_4_digits, $this->Id, $this->Partial_Payment__c, NULL, NULL, $expiry__c, SalesForcePayment::PAYMENT_STATUS_REJECTED);

        if(!$id)
        {
            mail(implode(',', self::$mailsArr),'MEDIA CRUSH lead payment failed, but couldnot create payment object.'.__FILE__,print_r(array('$first_six_digits'=>$first_six_digits, '$last_4_digits'=>$last_4_digits, 'LeadObject'=>$this,  '$expiry__c'=>$expiry__c, 'reason' => SalesForcePayment::PAYMENT_STATUS_REJECTED),true),'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n");
        }

        return !!$id;
    }

    public function update( $fieldsArr ) {

      $uriArr = array(
        'sobjects',
        'Lead',
        'Id',
        $this->Id
      );

      $result = $this->update_record( $uriArr, $fieldsArr ); // TODO: Change the autogenerated stub
      return $result;
    }
}
