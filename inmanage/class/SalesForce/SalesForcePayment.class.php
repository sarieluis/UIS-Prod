<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForcePayment;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForcePayment extends SalesForceObject {

  const PAYMENT_STATUS_SUCCESS = 'Success';
  const PAYMENT_STATUS_REJECTED = 'Rejected';
  const PAYMENT_STATUS_CANCELLED = 'Cancelled';

  public  $baseUriArr = array(
    'sobjects',
    'Payment__c',
    'id',
    '{Id}'
  );

  public  $insert_uriArr = array(
    'sobjects',
    'Payment__c',
    'id',
  );

  public $Id;
  public $Account__c;
  public $Expiry__c;
  public $Last_4_digits__c;
  public $Lead__c;
  public $Opportunity__c;
  public $Payment_Amount__c;
  public $Payment_Date__c;
  public $Payment_Status__c;
  public $PIN__c;

  public function __construct($salesforce_object_id, $fieldsArr = null, $get_record = true, $get_all_fields = false) {
      $this->Id = $salesforce_object_id;
      parent::__construct();
  }


  /**
   * @return mixed
   */
    private function create()
    {
        $fieldsArr = array(
            "Lead__c",
            "Payment_Amount__c",
            "Payment_Date__c",
            "Payment_Status__c",
            "PIN__c",
            "Last_4_digits__c",
            "Expiry__c",
            "Account__c",
            "Opportunity__c",
        );

        foreach ($fieldsArr as $index => $field)
        {
            unset($fieldsArr[$index]);
            $fieldsArr[$field] = $this->{$field};
        }
        $id = $this->insert_record($this->insert_uriArr, $fieldsArr);

        return $id;
    }


    public static function insert_new_payment($first_six_digits, $last_4_digits, $lead_id, $amount, $account_id = NULL, $oppertunity_id = NULL, $expiry__c = '', $payment_status = NULL)
    {
        $Self = new self(null, array(), false);
        $Self->Lead__c = $lead_id;
        $Self->Payment_Amount__c = $amount;
        $Self->Payment_Date__c = self::convert_to_salesforce_date_format(time());
        $Self->Payment_Status__c = $payment_status;
        $Self->PIN__c = $first_six_digits;
        $Self->Last_4_digits__c = $last_4_digits;
        $Self->Expiry__c = $expiry__c;

        $Self->Account__c = $account_id;
        $Self->Opportunity__c = $oppertunity_id;

        return $Self->create();
    }


    public function update($fieldsArr = array())
    {
        $uriArr = array(
            'sobjects',
            'Payment__c',
            'id',
            $this->Id
        );

        $result = $this->update_record($uriArr, $fieldsArr);

        return $result;
    }

    public function update_unssigned_payments()
    {
        $updateArr = array(
            "Account__c" => $this->Account__c,
            "Opportunity__c" => $this->Opportunity__c,
        );

        return $this->update($updateArr);
    }
}