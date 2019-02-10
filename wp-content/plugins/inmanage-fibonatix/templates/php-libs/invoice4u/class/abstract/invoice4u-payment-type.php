<?php
namespace InManage\Invoice4u\AbstractClass;
abstract class Invoice4uPaymentType {

  const CreditCard    = 1;
  const Check         = 2;
  const MoneyTransfer = 3;
  const Cash          = 4;
  const Credit        = 5;
}