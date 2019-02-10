<?php
// Error reporting for Debugging purposes. // todo: Remove when going Live
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$debug_mode = false;

// Headers // Todo: Check why is there a need to those header.
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Import WP Functionality.
require($_SERVER['DOCUMENT_ROOT'] . '/wp-blog-header.php');

// Setting WP Mail's content as HTML
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
function set_html_content_type() {
  return 'text/html';
}

// ------------ Require all files to begin generating Invoice ------------ //

// Abstract classes
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/abstract/invoice4u-services.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/abstract/invoice4u-payment-type.php';

// Classes
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-item.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-discount.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-payment.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-payment.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-branch.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-clearing.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-customer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-document.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/inmanage-fibonatix/templates/php-libs/invoice4u/class/invoice4u-mail.php';

// Namespaces
use InManage\Invoice4u\invoice4u;
use InManage\Invoice4u\Invoice4uDocument;

// ----------------------------------------------------------------------- //
$invoice_order_id = $_REQUEST['invoice_data'];

$invoice = new Invoice4u( 'private_prod' );
$invoice_document = new Invoice4uDocument( 'private' );
$invoice_document->get( $invoice_order_id );
$json = json_encode( $invoice_document );

if( $debug_mode ) {
  mail( 'amos@inmanage.net', 'Private Invoice - Invoice Document JSON',$json );
}

$result = $invoice_document->invoice_receipt( $invoice_document->sf_object_id );

if( $debug_mode ) {
  mail( 'amos@inmanage.net', 'Private Invoice - Request result', json_encode($result) );
}

// If invoice wasn't created then send an error message
if( property_exists($unjsoned_result, 'CreateDocumentResult' ) && $unjsoned_result->CreateDocumentResult == null ) {
  $invoice_document->send_failure_mail();
  die;
}

// get document id from result
$doc_id     = $invoice_document->get_doc_id( $result );
// get document number from result
$doc_number = $invoice_document->get_doc_number( $result );
// Download the PDF that was generated. The variable will hold its path
$file_path  = $invoice_document->download_pdf( $doc_id, $doc_number );
// Send Generated Invoice to customer.
$invoice_document->send_mail_to_uis( $file_path );