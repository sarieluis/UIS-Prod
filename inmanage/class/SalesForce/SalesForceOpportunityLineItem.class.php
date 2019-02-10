<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceOpportunityLineItem;
use Inmanage\SalesForce\i_SalesForceObject\i_SalesForceObject;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceEvaluationProduct\SalesForceEvaluationProduct;
use Inmanage\SalesForce\SalesForceOpportunity\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceOpportunityLineItem extends SalesForceObject
{
    public  $baseUriArr = array(
        'sobjects',
        'OpportunityLineItem',
        'id',
        '{Id}'
    );
    public $insert_uriArr = array(
        'sobjects',
        'OpportunityLineItem',
    );

    public $Id;
    public $Name;
    public $Opportunity;
    public $OpportunityId;
    public $Quantity;
    public $UnitPrice;
    public $PricebookEntry;
    public $PricebookEntryId;
    public $ProductId;
    public $Product2Id;
    public $ProductCode;


    public function __construct($salesforce_object_id, $fieldsArr = null, $get_record = true, $get_all_fields = false)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct($fieldsArr, $get_record, $get_all_fields);
    }


    private function create()
    {
        $fieldsArr = array(
            "OpportunityId",
            "Quantity",
            "UnitPrice",
            "PriceBookEntryId"
        );

        foreach ($fieldsArr as $index => $field)
        {
            unset($fieldsArr[$index]);
            $fieldsArr[$field] = $this->{$field};
        }
        $id = $this->insert_record($this->insert_uriArr, $fieldsArr);

        return $id;
    }

    public static function insert_opportunity_line_item(SalesForceLead $Lead, $ConvertResponse)
    {
        $new_idsArr = array();
        $EvaluationResponse = new SalesForceQueryResponse(SalesForceQuery::get_all_Evaluation_Product__c_ids($Lead->Id)); //get all Lead evaluation ids.

        //run over all evalutaion ids and create OpporunityLineItem in SF
        foreach ($EvaluationResponse->recordsArr as $EvaluationRecord)
        {

            $SalesForceEvaluationProduct = new SalesForceEvaluationProduct($EvaluationRecord->Id);
            $SalesForceQueryResponse = new SalesForceQueryResponse(SalesForceQuery::get_PriceBookEntry_id($Lead->CurrencyIsoCode, $SalesForceEvaluationProduct->Product__c));

            foreach ($SalesForceQueryResponse->recordsArr as $PriceBookEntryRecord)
            {
                $SalesForceOpportunityLineItem = new SalesForceOpportunityLineItem(NULL, array(), false);
                $SalesForceOpportunityLineItem->Opportunity = $SalesForceOpportunityLineItem->OpportunityId = $ConvertResponse->opportunityId;
                $SalesForceOpportunityLineItem->Quantity = $SalesForceEvaluationProduct->Quantity__c;
                $SalesForceOpportunityLineItem->UnitPrice = $SalesForceEvaluationProduct->Price__c;
                $SalesForceOpportunityLineItem->PriceBookEntry = $SalesForceOpportunityLineItem->PriceBookEntryId = $PriceBookEntryRecord->Id;

                $new_idsArr[] = $SalesForceOpportunityLineItem->create();
            }


            return $new_idsArr;
        }
    }

}