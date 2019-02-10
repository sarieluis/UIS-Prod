<?php
namespace Inmanage\SalesForce\SalesForceDependents;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceDependents extends SalesForceObject
{
  public  $baseUriArr = array(
    'sobjects',
    'Dependents__c',
    '{Id}'
  );

  public $Id;
  public $Case__c;
  public $Date_of_Birth__c;
  public $First_Name__c;
  public $Last_Name__c;

  public function __construct( $Id = '', $salesforce_object_id = '', $Date_of_Birth__c = '', $First_Name__c = '', $Last_Name__c = '' ) {

    $this->Id = $Id;
    $this->Case__c          = $salesforce_object_id;
    $this->Date_of_Birth__c = $Date_of_Birth__c;
    $this->First_Name__c    = $First_Name__c;
    $this->Last_Name__c     = $Last_Name__c;
    parent::__construct();
  }

  public function insert() {

    $urlArr = array(
      'sobjects',
      'Dependents__c'
    );

    $this->Date_of_Birth__c = str_replace(' ', '', $this->Date_of_Birth__c);

    $fields = array(
      'Case__c'           => $this->Case__c,
      'Date_of_Birth__c'  => self::convert_to_salesforce_date_format($this->Date_of_Birth__c),
      'First_Name__c'     => $this->First_Name__c,
      'Last_Name__c'      => $this->Last_Name__c
    );

    return $this->insert_record( $urlArr, $fields );
  }

  public function delete() {

    $urlArr = array(
      'sobjects',
      'Dependents__c',
      $this->Id
    );

    $result = $this->delete_record( $urlArr, array() );
  }

  public static function delete_all_from_case( $case_id ) {

    $dependents_response = new SalesForceQueryResponse( SalesForceQuery::get_dependents( $case_id ) );
    $dependents_array = array();
    if( $dependents_response->success === true && ! empty( $dependents_response->recordsArr ) ) {

      foreach( $dependents_response->recordsArr as $dependent_obj ) {

        $dependent = new self( $dependent_obj->Id );
        $dependent->delete();
      }
    }
  }




}