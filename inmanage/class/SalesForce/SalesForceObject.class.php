<?php

namespace Inmanage\SalesForce\SalesForceObject;
use Inmanage\SalesForce\i_SalesForceObject\i_SalesForceObject;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;
use Inmanage\SalesForce\SalesForceOpportunity\SalesForceOpportunity;
use Inmanage\SalesForce\SalesForceRequest;
use ReflectionFunction;
include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForceManager.class.inc.php');

class SalesForceObject extends SalesForceRequest {

    const LEAD_PREFIX_PATTERN = '/^00Q/';
    const SOAP_PATH = '/inmanage/class/SalesForce/MediaCrush.xml';
    const SOAP_PATH_TEST = '/inmanage/class/SalesForce/MediaCrush-test.xml';
    /**
     * Init an Object from salesforce server.
     * SalesForceObject constructor.
     */
    public function __construct(array $fieldsArr = NULL, $get_record = true, $get_all_fields = false)
    {
        parent::__construct();

        if($get_record)
        {
            $uriArr =  $this->build_salesforce_uri_by_placeholders($this, $this->baseUriArr);
            $recordArr = $fieldsArr ?: $this->get_record($uriArr);
            foreach($recordArr as $property => $value){
                if(property_exists($this, $property) || $get_all_fields)
                {
                    $this->{$property} = $value;
                }
            }
        }

    }
    
  /**
   * build uri according to the given placehloders.
   * example:
   *  $uri_templateArr = array(
  'sobjects',
  'Lead',
  'id',
  '{Lead__c}'
   * )
   *
   * will return
  $uri_templateArr = array(
  'sobjects',
  'Lead',
  'id',
  $Class->Lead__c
  )
   */
  public function build_salesforce_uri_by_placeholders($Class, $uri_templateArr) {

      foreach ($uri_templateArr as $key=> $uri_part) {

          $class_property = NULL;
          if(preg_match("/{(.*)}/", $uri_part)) {
              $class_property = str_replace(array("{", "}"), "", $uri_part);
          }

          if($class_property != NULL && property_exists($Class, $class_property)) {
              $uri_templateArr[$key] = $Class->{$class_property};
          }
      }

      return $uri_templateArr;
  }





  /**
   * Returns Lead object;
   *
   * @param $id
   * @return SalesForceLead
   */
  public static function lead_factory( $id ) {

    $Object = new SalesForceLead($id);
    return $Object;
  }





  /**
   * Returns Opportunity object;
   *
   * @param $id
   * @return SalesForceOpportunity
   */
  public static function opportunity_factory( $id ) {

    $Object = new SalesForceOpportunity($id);
    return $Object;
  }
}
?>