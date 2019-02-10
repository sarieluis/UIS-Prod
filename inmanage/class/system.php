<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 18/12/2017
 * Time: 16:57
 */


//interfaces:
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/i_SalesForceObject.interface.php');

//classes
include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/db.class.inc.php');
include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForceManager.class.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/MCSalesForce.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceLead.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceOpportunity.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceOpportunityLineItem.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForcePayment.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceContact.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceAccount.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceEvaluationProduct.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceQuery.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceQueryResponse.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceCase.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceDependents.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceReports.class.php');


