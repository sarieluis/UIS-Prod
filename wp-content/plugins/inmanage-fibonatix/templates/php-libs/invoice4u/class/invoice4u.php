<?php
// Namespace
namespace InManage\Invoice4u;

// Usage of other classes
use InManage\Invoice4u\AbstractClass\Invoice4uServices;
use stdClass;
use SoapClient;
use SoapFault;
use SoapHeader;
use SoapParam;
use SoapServer;
use SoapVar;
use Exception;





class invoice4u {

  public $creds = array(
    'dev'   => array(
      'email'     => 'test@test.com',
      'password'  => '123456',
    ),
    'prod'  => array(
      'email'     => 'billing@uiscanada.com',
      'password'  => '88f853c4-3881-4d52-8',
    ),
    'private_prod' => array(
      'email'     => 'billing@uiscanada.com',
      'password'  => 'shai090804',
    )
  );

  public static $token;
  public static $logged_in = false;
  public $mode = 'prod'; // required, string, available values: 'dev', 'prod', 'private_prod'. Default - 'dev'





  /*----------------------------------------------------------------------------------*/
  /**
   * invoice4u constructor.
   */
  public function __construct ( $mode = false ) {

    // Set the mode. dev or prod
    if( $mode ) $this->set_mode( $mode );
    else $this->set_mode();

    if( ! session_id() ) session_start();

    // Login
    $this->login();

    if( ! self::$token ) {

    }
  }
  /*----------------------------------------------------------------------------------*/






  /*----------------------------------------------------------------------------------*/
  /**
   * Sends Soap requests to Invoice4u.
   *
   * @param $data
   * @param $wsdl
   * @param $service
   * @return string
   */
  public function do_soap_request( $data, $wsdl ,$service ) {
    // Log the

    $serialized_post_data = serialize( $data );

    $last_id = $this->log_request( array( 'request' => $serialized_post_data ) );



    // Try send the soap request / Else throw the exception that happened
    try {

      // SOAP options
      $options = array(
        'trace'               => true,
        'exceptions'          => true,
        'cache_wsdl'          => WSDL_CACHE_NONE,
        'connection_timeout'  => 10,
      );

      // Initializing SoapClient to send SOAP request to Invoice4u
      $client = new SoapClient( $wsdl, $options );

      // Send request and get result.
      $response = $client->$service( $data );

      // Log response from Invoice4u
      $serialized_response = serialize( $response );

      $this->log_request( array( 'response' => $serialized_response ), array( 'id' => $last_id ) );



      // return the response.
      return $response;

    } catch ( SoapFault $f ) { // Catch Soap Error

      return $f->getMessage();
    } catch ( Exception $e ) { // Catch Exception.

      return $e->getMessage();
    }
  }
  /*----------------------------------------------------------------------------------*/





  /*----------------------------------------------------------------------------------*/
  /**
   * @description Checks current mode and returns it. If no mode is set or the mode is not available
   * then the default is 'dev'
   *
   * @return string
   */
  public function set_mode( $mode = false ) {

    $mode = $mode ? $mode : $this->mode;

    if( ! $mode || ( $mode != 'dev' && $mode != 'prod' && $mode != 'private_prod' ) )
      $this->mode = $mode = 'dev';
    else if( $mode )
      $this->mode = $mode;
  }
  /*----------------------------------------------------------------------------------*/





  /*----------------------------------------------------------------------------------*/
  /**
   * Send Soap login request to Invoice4u
   *
   * @return bool
   */
  public function login() {

    // Login Data.
    $data = array(
      'username' => $this->get_email(),
      'password' => $this->get_password(),
      'isPersistent' => false
    );

    // Run login request.

    $response = $this->do_soap_request( $data, Invoice4uServices::verify_login[$this->mode], "VerifyLogin" );



    // Checking if we received the token after login.
    if( is_object( $response ) && isset( $response->VerifyLoginResult ) && !! $response->VerifyLoginResult ) {

      // Saving the token.
      self::$token = $response->VerifyLoginResult;
      return true;
    }

    // If login failed return false and save false in TOKEN
    self::$token = false;
    return false;

  }
  /*----------------------------------------------------------------------------------*/





  /*----------------------------------------------------------------------------------*/
  /**
   * DEPRECATED.
   *
   * todo: Should be removed and made a new version of this method that will use Soap Client.
   *
   * @return bool
   */
  public function is_authenticated() {


    $post_data = array(
      'Token' => self::$token
    );

    // Make login request
    $json_response = $this->do_request( $post_data, Invoice4uServices::is_authenticated[$this->mode] );

    // If response is empty then login failed
    if( ! $json_response ) {

      self::$logged_in = FALSE;
      return FALSE;
    }

    // if not empty then decode the json before further validation
    $response = json_decode( $json_response );

    // If Token is set then the login successfully made
    // and we are saving the token and changing the logged_in param
    // to TRUE
    if( isset( $response->ApiActive ) && $response->ApiActive == 'true' ) {

      self::$logged_in = TRUE;
      return TRUE;
    }

    // Default result is FALSE
    return FALSE;
  }
  /*----------------------------------------------------------------------------------*/





  /*----------------------------------------------------------------------------------*/
  /**
   * Return email to login depending on Mode that is active now.
   *
   * @return mixed
   */
  public function get_email() {

    return $this->creds[$this->mode]['email'];
  }
  /*----------------------------------------------------------------------------------*/






  /*----------------------------------------------------------------------------------*/
  /**
   * Return password to login depending on Mode that is active now.
   *
   * @return mixed
   */
  public function get_password() {

    return $this->creds[$this->mode]['password'];
  }
  /*----------------------------------------------------------------------------------*/





  /*----------------------------------------------------------------------------------*/
  /**
   * Logs every request that is sent to Invoice4u in Database.
   * For Debugging purposes.
   * Name of DB table: tb_invoice4u_log
   *
   * @param $log_array
   * @param bool $where
   * @return false|int
   */
  public function log_request( $log_array, $where = false ) {
    global $wpdb; // global WP database object that we will use to operate.

    // table name to operate with.

    $table = 'tb_invoice4u_log';

    // If there is a $where array.
    if( $where && is_array( $where ) ) {

      // update existing log row
      $values = array(

        'date_created'  => date( "Y-m-d H:i:s" ),
        'response'      => $log_array['response'],
      );

      $result = $wpdb->update( $table, $values, $where );

    } else { // if there is no Where array then a new row will be created.

      // create new log row

      $data = array(
        'request'               => $log_array['request'],
        'response'              => null,
      );

      // TODO: Finish the request logging

      // logging the request into the database.
      $result = $wpdb->insert( $table, $data );

      if( $result ) $result =  $wpdb->insert_id;

    }

    return $result;
  }
  /*----------------------------------------------------------------------------------*/
}