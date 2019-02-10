<?php
namespace InManage\Invoice4u;

class Mail {

  /**
   * @type string
   * @var
   */
  public $Mail;

  /**
   * @type boolean
   * @var
   */
  public $IsUserMail;

  public function __construct ( $Mail, $IsUserMail ) {

    $this->Mail       = $Mail;
    $this->IsUserMail = $IsUserMail;
  }
}