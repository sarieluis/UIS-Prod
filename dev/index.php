<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 10/12/2017
 * Time: 14:39
 */
session_start();

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/db.class.inc.php');
include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForceManager.class.inc.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/MCSalesForce.class.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/SalesForceLead.class.php');

use Inmanage\Database\Database;
use Inmanage\SalesForce\MCSalesForce\MCSalesForce;
use Inmanage\SalesForce\SalesForceRequest;
use Inmanage\SalesForce\SalesForceLead\SalesForceLead;


$SalesForceLead = new SalesForceLead("00Q0Y000009UxVW");





