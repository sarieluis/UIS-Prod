<?php
namespace InManage\Invoice4u;

class invoice4u_discount {

  public $Value;
  public $IsNominal;

  public function __construct ( $Value, $IsNominal ) {

    $this->Value = $Value;
    $this->IsNominal = $IsNominal;
  }
}