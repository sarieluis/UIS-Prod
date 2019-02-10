<?php
namespace Inmanage\SalesForce\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForcePayment\SalesForcePayment;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceReport extends SalesForceObject
{
  public  $baseUriArr = array(
    'sobjects',
    'reports',
    'id',
    '{Id}'
  );

  public $Id;
  public $Name;


  public function __construct($salesforce_object_id)
  {
    $this->Id = $salesforce_object_id;
    parent::__construct();
  }
}