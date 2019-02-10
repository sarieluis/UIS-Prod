<?php
namespace InManage\Invoice4u;

class Item {

  public $Code;
  public $Name;
  public $Quantity;
  public $Price;
  public $Discount;
//  public $TotalWithoutTax;
//  public $TaxPercantage;

  public function __construct ( $Code, $Name, $Quantity, $Price, $Discount, $TotalWithoutTax, $TaxPercantage ) {

    $this->Code             = $Code;
    $this->Name             = $Name;
    $this->Quantity         = $Quantity;
    $this->Price            = $Price;
    $this->Discount         = $Discount;
//    $this->TotalWithoutTax  = $TotalWithoutTax;
//    $this->TaxPercantage    = $TaxPercantage;
  }
}