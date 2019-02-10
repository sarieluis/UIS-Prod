<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <title><?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge" />-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body>

<?php

if( !isset( $_SESSION ) )
  session_start();

require_once( INMANAGE_FIBONATIX_PATH . '/templates/php-libs/classes/fibonatix.class.php' );
include_once( $_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/system.php' );

use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForcePayment\SalesForcePayment;
use Inmanage\SalesForce\SalesForceAccount\SalesForceAccount;

$SalesForceObject = false;
$payment_id = $_GET['payment_id'];
$SalesForcePaymentObject = new SalesForcePayment( $payment_id );
if( ! $SalesForcePaymentObject->Opportunity__c ) {
  $lead_id = $SalesForcePaymentObject->Lead__c;
  $SalesForceObject = SalesForceObject::lead_factory( $lead_id );
} else if( $SalesForcePaymentObject->Account__c ) {
  $account_id = $SalesForcePaymentObject->Account__c;
  $SalesForceObject = new SalesForceAccount( $account_id );
}
?>

<div class="wrapper">

  <!-- HEADER -->
  <header class="header">
    <div class="header-bottom">
      <div class="container">
        <div class="header-bottom_inner" style="position: relative">
          <div class="header-logo">
            <a href="<?php echo site_url() ?>" class="logo for-img">
              <img src="<?php echo wp_get_attachment_image_url(get_theme_mod( 'custom_logo' ), 'full') ?>" alt="">
            </a>
          </div>

          <?php if( is_object( $SalesForceObject ) && isset( $SalesForceObject->FirstName ) ) : ?>
            <h2 style="margin:0px; display: inline-block; position: absolute; top:50%; transform: translate(-50%,-50%); left: 50%;">Hi, <?php echo $SalesForceObject->FirstName; ?></h2>
          <?php endif; ?>

          <!--<div class="mobile-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>-->

        </div>
      </div>
    </div>
  </header>
  <!-- HEADER END-->