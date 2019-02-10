<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceEvaluationProduct;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceEvaluationProduct extends SalesForceObject
{
    public  $baseUriArr = array(
        'sobjects',
        'Evaluation_Product__c',
        '{Id}'
    );

    public $Id;
    public $OwnerId;
    public $IsDeleted;
    public $Name;
    public $CurrencyIsoCode;
    public $CreatedDate;
    public $CreatedById;
    public $LastModifiedDate;
    public $LastModifiedById;
    public $SystemModstamp;
    public $Lead__c;
    public $Product__c;
    public $Price__c;
    public $Quantity__c;

    public function __construct($salesforce_object_id)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct();
    }

}