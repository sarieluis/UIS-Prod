<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceQuery;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceQuery extends SalesForceObject
{
    public  $baseUriArr = array(
        'query',
        '{query}'
    );

    protected $query;
    public $done;
    public $totalSize;
    public $records = array();

    public function __construct()
    {

    }

    public function set_query($q)
    {
        $q = implode("+", explode(" ", trim($q)));
        $this->query = "?q={$q}";
        return $this;
    }

    public function run()
    {
        parent::__construct(array(), true, true);
    }


    public static function get_unready_leads() {

      $Self = new Self();
      $Self->set_query(
        "SELECT Id FROM Lead WHERE Website_User_ID__c = ''"
      );

      return $Self;
    }

    public static function get_case($wordpress_id)
    {
      $Self = new Self();
      $Self->set_query(
        "SELECT id FROM Case WHERE Account.Website_User_ID__c = '{$wordpress_id}'"
      );

      return $Self;
    }

  public static function get_detailed_cases($wordpress_id)
  {
    $Self = new Self();
    $Self->set_query(
      "SELECT id, CaseNumber FROM Case WHERE Account.Website_User_ID__c = '{$wordpress_id}'"
    );

    return $Self;
  }

    public static function get_dependents( $case_id ) {

      $Self = new Self();
      $Self->set_query(
        "SELECT Id, Case__c, Date_of_Birth__c, First_Name__c, Last_Name__c FROM Dependents__c WHERE Case__c = '{$case_id}'"
      );

      return $Self;
    }

    public static function get_Content_Document_Link( $content_documnet_id ) {

      $Self = new Self();

      $Self->set_query(
        "SELECT Id, ContentDocumentId FROM ContentVersion WHERE  Id = '{$content_documnet_id}'"
      );

      return $Self;
    }

    public static function get_all_Evaluation_Product__c_ids($lead_id)
    {
        $Self = new self();
        $Self->set_query("
            SELECT id FROM Evaluation_Product__c WHERE Lead__c = '{$lead_id}'
        ");

        return $Self;
    }

    public static function get_PriceBookEntry_id($CurrencyIsoCode, $Product__c, $PriceBook2 = "01s0Y0000089W9G")
    {
        $Self = new self();
        $Self->set_query("
            SELECT Id FROM PriceBookEntry WHERE IsActive = TRUE AND PriceBook2id = '{$PriceBook2}' AND CurrencyIsoCode = '{$CurrencyIsoCode}' AND Product2id = '{$Product__c}'
        ");
        
        return $Self;
    }

    public static function get_all_other_unassigned_payments($lead_id)
    {
        $Self = new self();
        $Self->set_query("
            SELECT id FROM payment__c WHERE lead__c = '{$lead_id}'
        ");

        return $Self;
    }

    public static function get_all_payments_of_opportunity( $opportunity_id ) {
      $Self = new Self();
      $Self->set_query(
        "SELECT id, Payment_Amount__c FROM Payment__c WHERE Opportunity__c = '{$opportunity_id}' AND Payment_Status__c = 'Success'"
      );

      return $Self;
    }

  public static function get_evaluation_product_id_of_lead( $lead_id ) {
    $Self = new Self();
    $Self->set_query(
      "SELECT id FROM Evaluation_Product__c WHERE Lead__c = '{$lead_id}'"
    );
    return $Self;
  }

  public static function get_line_item_id_by_opportunity( $opp_id ) {
    $Self = new Self();
    $Self->set_query(
      "SELECT id FROM OpportunityLineItem WHERE OpportunityId = '{$opp_id}'"
    );
    return $Self;
  }

  public static function get_pricebook_by_opportunity( $opp_id ) {
    $Self = new Self();
    $Self->set_query(
      "SELECT id FROM OpportunityLineItem WHERE OpportunityId = '{$opp_id}'"
    );
    return $Self;
  }


  public static function get_product_by_id( $product_id ) {
    $Self = new Self();
    $Self->set_query(
      "SELECT id, Name FROM Product2 WHERE Id = '{$product_id}'"
    );
    return $Self;
  }

  public static function get_reports() {
    $Self = new Self();
    $Self->set_query(
      "SELECT id, Name FROM Report"
    );
    return $Self;
  }
}