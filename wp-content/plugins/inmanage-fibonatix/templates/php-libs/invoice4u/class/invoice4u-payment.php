<?php
namespace InManage\Invoice4u;

class Payment {

  public $Date;
  public $Amount;
  public $PaymentType;
  public $NumberOfPayments;
  public $PayerID;
  public $ExpirationDate;
  public $PaymentNumber;
  public $CreditCardName;

  public function __construct ( $Date, $Amount, $PaymentType, $NumberOfPayments, $PayerID, $ExpirationDate, $PaymentNumber, $CreditCardName ) {

    $this->Date                 = date("c", time());
    $this->Amount               = $Amount;
    $this->PaymentType          = $PaymentType;
    $this->NumberOfPayments     = $NumberOfPayments;
    $this->PayerID              = $PayerID;
    $this->ExpirationDate       = $this->fix_date( $ExpirationDate );
    $this->PaymentNumber        = $PaymentNumber;
    $this->CreditCardName       = $CreditCardName;
  }

  private function fix_date( $exp_date ) {

    // MASTER EXPLODER
    $exp_date_array = explode( '-', $exp_date );

    // Fix Year
    $exp_date_array[1] = substr( $exp_date_array[1], '2' );

    // Fix Month
    if( strlen($exp_date_array[0]) == 1 ) {
      $exp_date_array[0] = "0" . $exp_date_array[0];
    }

    // Save Fixed Expiration Date
    $exp_date = implode( '-', $exp_date_array );

    return  $exp_date;
  }
}