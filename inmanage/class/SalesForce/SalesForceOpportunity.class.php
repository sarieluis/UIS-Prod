<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForcePayment\SalesForcePayment;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceOpportunity extends SalesForceObject
{
    const STAGE_CLOSE_WON = "Closed Won";
    const STAGE_PARTIAL_PAID = "Partial Paid";
    const TYPE_OPTIMIZATION = "Optimization";
    const TYPE_SUBMISSION = "Submission";
    const TYPE_COLLECTION = "Collection";

    public  $baseUriArr = array(
        'sobjects',
        'Opportunity',
        'id',
        '{Id}'
    );

    public $Id;
    public $IsDeleted;
    public $AccountId;
    public $Name;
    public $Description;
    public $StageName;
    public $Amount;
    public $Probability;
    public $CloseDate;
    public $Type;
    public $NextStep;
    public $LeadSource;
    public $IsClosed;
    public $IsWon;
    public $ForecastCategory;
    public $ForecastCategoryName;
    public $CurrencyIsoCode;
    public $CampaignId;
    public $HasOpportunityLineItem;
    public $Pricebook2Id;
    public $OwnerId;
    public $CreatedDate;
    public $CreatedById;
    public $LastModifiedDate;
    public $LastModifiedById;
    public $SystemModstamp;
    public $LastActivityDate;
    public $FiscalQuarter;
    public $FiscalYear;
    public $Fiscal;
    public $LastViewedDate;
    public $LastReferencedDate;
    public $SyncedQuoteId;
    public $ContractId;
    public $HasOpenActivity;
    public $HasOverdueTask;
    public $Budget_Confirmed__c;
    public $Discovery_Completed__c;
    public $ROI_Analysis_Completed__c;
    public $Amount_Before_Discount__c;
    public $Loss_Reason__c;
    public $Customer_Email__c;
    public $Sent_Welcome_Email__c;
    public $Created_Evaluation__c;
    public $Count_Single_Evaluation__c;
    public $Count_Double_Evaluation__c;
    public $Count_Single_Optimization__c;
    public $Count_Double_Optimization__c;
    public $Created_Case__c;

    public function __construct($salesforce_object_id)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct();
    }

    private function update($fieldsArr = array())
    {
        $uriArr = array(
            'sobjects',
            'Opportunity',
            'id',
            $this->Id
        );

        $result = $this->update_record($uriArr, $fieldsArr);

        return $result;
    }

    public function update_oppertunity_StageName($partial_payment, $total_payment)
    {
        if($partial_payment >= $total_payment)
        {
            $stage = self::STAGE_CLOSE_WON;
        }
        else{
            $stage = self::STAGE_PARTIAL_PAID;
        }

        return $this->update(array("StageName"=>$stage));
    }

    public function set_oppertunity_StageName( $stage )
    {
      if( $stage == self::STAGE_CLOSE_WON || $stage == self::STAGE_PARTIAL_PAID )
        return $this->update(array("StageName"=>$stage));

      return false;
    }


    private function insert_new_payment_according_to_type()
    {

        switch ($this->Type)
        {
            case (self::TYPE_OPTIMIZATION):
            case (self::TYPE_COLLECTION):
            case (self::TYPE_SUBMISSION):
                $id = SalesForcePayment::insert_new_payment($first_six_digits, $last_4_digits, NULL, $this->Amount, $this->AccountId, $this->Id, $expiry__c, SalesForcePayment::PAYMENT_STATUS_SUCCESS);
                if(in_array($_SERVER['REMOTE_ADDR'],array('62.219.212.139','81.218.173.175','37.142.40.96','82.102.165.193','207.232.22.164'))) {
                  mail('amos@inmanage.net','Here: ' . __LINE__ . ' at ' . __FILE__,print_r('<hr /><pre>' . print_r($id, true) .'<br>Here: ' . __LINE__ . ' at ' . __FILE__. '</pre><hr />',true),'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n");
                }
                break;

            default:
                $id = NULL;
                break;
        }
        
        return $id;
    }

    public function create_payment_object_after_oppertunity_payment($first_six_digits, $last_4_digits, $expiry__c)
    {
        $payment_id = $this->insert_new_payment_according_to_type();
        if($payment_id)
        {
            $update_result = $this->update_oppertunity_StageName($this->Amount, $this->Amount_Before_Discount__c);
        }

        return array("payment_id" => $id, "update_result"=>$update_result);
    }
}