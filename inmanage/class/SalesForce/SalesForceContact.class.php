<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceContact;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceContact extends SalesForceObject
{
    public  $baseUriArr = array(
        'sobjects',
        'Contact',
        'id',
        '{Id}'
    );

    public $Id;

    public function __construct($salesforce_object_id)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct();
    }


}