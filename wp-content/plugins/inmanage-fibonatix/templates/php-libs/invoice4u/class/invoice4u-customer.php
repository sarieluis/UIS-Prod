<?php
use InManage\Invoice4u\invoice4u;
use InManage\Invoice4u\AbstractClass\Invoice4uServices;

class Invoice4uCustomer extends Invoice4u {

  public $name;
  public $email;
  public $phone;
  public $fax;
  public $address;
  public $city;
  public $zip;
  public $unique_id;
  public $org_id;
  public $pay_terms;
  public $cell;

  public function create_customer() {

    $post_data = array (

      'Name'      => $this->name,
      'Email'     => $this->email,
      'Phone'     => $this->phone,
      'Fax'       => $this->fax,
      'Address'   => $this->address,
      'City'      => $this->city,
      'Zip'       => $this->zip,
      'UniqueID'  => $this->unique_id,
      'OrgID'     => $this->org_id,
      'PayTerms'  => $this->pay_terms,
      'Cell'      => $this->cell
    );

    $response = $this->do_request( $post_data, Invoice4uServices::create_customer );

    return $response;
  }


  public function update_customer_request() {

    $post_data = array (

      'Name'      => $this->name,
      'Email'     => $this->email,
      'Phone'     => $this->phone,
      'Fax'       => $this->fax,
      'Address'   => $this->address,
      'City'      => $this->city,
      'Zip'       => $this->zip,
      'UniqueID'  => $this->unique_id,
      'OrgID'     => $this->org_id,
      'PayTerms'  => $this->pay_terms,
      'Cell'      => $this->cell
    );

    $response = $this->do_request( $post_data, Invoice4uServices::update_customer );

    return $response;
  }
}