<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 11/01/2017
 * Time: 10:58
 *
 * PLEASE EXTEND YOURC CLASS FROM SalesForceRequest and write there the all logic
 *
 * i.e -
 * class MyProject extend SalesForceRequest{
        public functino custom_method(){
 *      ....
 *      }
 * }
 */
/**-----------------------------------------------------------------------------------------------------------------**/
namespace Inmanage\SalesForce;
use Inmanage\SalesForce;
use Inmanage\Database\Database;

class SalesForceConfig
{

    const SESSION_SCOPE = "saleforceArr";
    const MAX_CALLS_TRIES = 3;
    const SALESFORCE_VERSION = 'v38.0'; //get list of versions in  https://yourInstance.salesforce.com/services/data/

    private $dev_detailsArr = array(
        'base_url' => "https://test.salesforce.com",
        'user_name' => "amos@mediacrush.dev",
//        'password' => "Inmanage2180!",
        'password' => "Inmanage666",
        "token" => "fZUuwlBNojFLsP9baAuZcsno",
//        "token" => "Lv8nDPXKNttwE50oYRb9GPc8",
        "client_secret" => "9033129832541203862",
        "client_id" => "3MVG9w8uXui2aB_opAktcsx3QOayTh2rlWfekTFT0S.8Gzbwfos8QzKUotPdfY8PX7f7ZBQhzZDfvBvtLcbZf",
    );

    private $live_detailsArr = array(
        'base_url' => "https://login.salesforce.com",
        'user_name' => "john@uiscanada.com",
        'password' => "!Qaz2wsx",
        "token" => "I5xwIaWopKppemQHcIqg5kzP",
        "client_secret" => "859577904022837851",
        "client_id" => "3MVG9HxRZv05HarQrp_VsiZI6kWKiK36C2.PrdOAnzWocT0GsfhkcTXxkKvssLdZWCZnWy3xzjSrfMICEZ.h7",
    );


    public $base_url = null;
    public $user_name = null;
    public $password = null;
    public $token = null;
    public $client_secret = null;
    public $client_id = null;

    public $ts = null;

    public static $Instance = null;

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method:
     *  constructor.
     *
     * Description:
     *  Init class and set vars.
     */
    private function __construct()
    {
        $dev_mode = false; //read it from global var
        $this->ts = time();

        $config_detailsArr = ($dev_mode) ? $this->dev_detailsArr : $this->live_detailsArr;

        foreach($config_detailsArr as $class_field => $config_field_value)
        {

            if(property_exists($this, $class_field))
            {
                $this->{$class_field} = $config_field_value;
            }

        }
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method:
     *  get_instance
     *
     * Description:
     *  Singleton that returns one SalesForceConfig instace
     * @return null|SalesForceConfig
     */
    public static function get_instance()
    {

        if(empty(self::$Instance))
        {
            self::$Instance = new self();
        }

        return self::$Instance;
    }

}

/**-----------------------------------------------------------------------------------------------------------------**/
class SalesForceAuthentication
{
    const request_uri = '/services/oauth2/token';
    const SESSION_SCOPE = 'authenticationArr';

    //all these private properties will be taken from salesforce response
    private $access_token = null;
    private $instance_url = null;
    private $id = null;
    private $token_type = null;
    private $issued_at = null;
    private $signature = null;
    public $ts = null;

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method:
     *  constructor.
     */
    public function __construct()
    {
        $this->ts = time();
        $this->build_class_values_from_session();
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    public function get_authentication_array_from_session()
    {
        return $_SESSION[\Inmanage\SalesForce\SalesForceConfig::SESSION_SCOPE][self::SESSION_SCOPE];
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (private)
     *  build_class_values_from_session
     *
     * Description:
     *  The method builds this class values from session.
     * @return $this
     */
    private function build_class_values_from_session()
    {
        $authenticationArr = $this->get_authentication_array_from_session();

        foreach ($authenticationArr as $key => $value)
        {
            if(property_exists($this, $key))
            {
                $this->{$key} = $value;
            }
        }

        return $this;
    }


    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Methd (public)
     *  get_access_token_from_sales_force
     *
     * Description:
     *  The method send an HTTP request to SalesForce API to get token and authentication values.
     */

    public function get_access_token_from_sales_force()
    {
        $SalesForceConfig = \Inmanage\SalesForce\SalesForceConfig::get_instance();

        $post_fieldsArr = array(
            'grant_type' => 'password',
            'client_id' => $SalesForceConfig->client_id,
            'client_secret' => $SalesForceConfig->client_secret,
            'username' => $SalesForceConfig->user_name,
            'password' => $SalesForceConfig->password .$SalesForceConfig->token,
        );
        $post_values_string_query_string = \Inmanage\SalesForce\HttpRequestManager::build_query_string($post_fieldsArr);
        $json_string = \Inmanage\SalesForce\HttpRequestManager::do_request($SalesForceConfig->base_url .self::request_uri, \Inmanage\SalesForce\HttpRequestManager::HTTP_POST, $post_values_string_query_string);

        $SalesForceJsonResponse = json_decode($json_string);
        $this->store_authentication_values_in_session($SalesForceJsonResponse);
        $this->build_class_values_from_session();
            return !!$this->get_access_token();
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (private)
     *  store_authentication_values_in_session
     *
     * Description:
     *  The method stores authentication values to session.
     *  call this method after $this->get_access_token_from_sales_force
     * @param $SalesForceJsonResponse - SalesForceResponse
     */
    private function store_authentication_values_in_session($SalesForceJsonResponse)
    {
        foreach ($SalesForceJsonResponse as $property => $value)
        {
            if(property_exists($this, $property))
            {
                unset($_SESSION[\Inmanage\SalesForce\SalesForceConfig::SESSION_SCOPE][self::SESSION_SCOPE][$property]);

                if($value)
                {
                    $_SESSION[\Inmanage\SalesForce\SalesForceConfig::SESSION_SCOPE][self::SESSION_SCOPE][$property] = $value;
                }
            }
        }

        return $this;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (public)
     *  reset_authentication
     *
     * Description:
     *  The method clears this class private properties and clear the authentication session
     *
     */
    public function reset_authentication()
    {

        foreach ($this->get_all_private_authentication_properties() as $PrivateProperty)
        {
            $this->{$PrivateProperty->name} = null;
        }

        unset($_SESSION[\Inmanage\SalesForce\SalesForceConfig::SESSION_SCOPE][self::SESSION_SCOPE]);

        return true;

    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (private):
     *  get_all_private_authentication_properties
     *
     * Description:
     *  this method returns all privates properties in this class.
     *  ALL THE PRIVATE properties are the authentication fields that returnes from SALESFORCE
     *
     * @return ReflectionProperty[]
     */
    private function get_all_private_authentication_properties()
    {
        $ReflectionClass = new \ReflectionClass($this);

        return $ReflectionClass->getProperties(\ReflectionProperty::IS_PRIVATE);

    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    //simple getter
    public function get_access_token()
    {
        return $this->access_token;
    }

    /**
     * @return null
     */
    public function getInstanceUrl()
    {
        return $this->instance_url;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * @return null
     */
    public function getIssuedAt()
    {
        return $this->issued_at;
    }

    /**
     * @return null
     */
    public function getSignature()
    {
        return $this->signature;
    }

}
/**-----------------------------------------------------------------------------------------------------------------**/
class SalesForceRequest
{
    public static $mailsArr = array(
        "sarielh@uiscanada.com"

    );

    public $ts = null;
    public $DB;

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * SalesForceRequest constructor.
     */
    public function __construct()
    {
        $this->ts = time();
        $this->DB = Database::getInstance();
    }



    
    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (private)
     *  do_request
     *
     * Description:
     *  The mthod is in charge to send request to SalesForce API + inserts logs.
     *
     * @param array $request_uriArr - array with the salesforce uri url -
     * array(
     * 'first_rout',
     *  'second_route',
     *  'third_route'
     * );
     *  it will be generated to first_rout/second_route/third_route/
     * @param array $fieldsArr - array of fields to pass
     * @param array $http_method - availble http method (take a look at HttpRequestManager)
     * @param array $try - call try number
     *
     * @return mixed
     */
    protected function do_request($request_uriArr = '', $fieldsArr = array(), $http_method = \Inmanage\SalesForce\HttpRequestManager::HTTP_GET, $try = 1)
    {

        $SalesForceConfig = \Inmanage\SalesForce\SalesForceConfig::get_instance();
        $SalesForceAuthentication = new \Inmanage\SalesForce\SalesForceAuthentication();
        $is_token_generating_succesed = $this->set_authentication_values($SalesForceAuthentication);
        $headersArr = $this->build_api_headers_array($SalesForceAuthentication);
        $url = $this->build_salesforce_api_url_path($SalesForceAuthentication, $request_uriArr);


//        die;
        $response_as_json_string = \Inmanage\SalesForce\HttpRequestManager::do_request($url, $http_method, json_encode($fieldsArr), $headersArr); //call WS
        $SalesForceJsonResponse = json_decode($response_as_json_string);
        $this->write_log('tb_salesforce__log', $url, $fieldsArr, $http_method, $SalesForceJsonResponse, $try); //request log

        if((is_array($SalesForceJsonResponse) && isset($SalesForceJsonResponse[0]->errorCode) && $SalesForceJsonResponse[0]->errorCode) && $try < \Inmanage\SalesForce\SalesForceConfig::MAX_CALLS_TRIES)
        {
            if(trim($SalesForceJsonResponse[0]->errorCode) == 'INVALID_SESSION_ID')
            {
                //clear the authentication values. next time, we will render a new token
                $SalesForceAuthentication->reset_authentication();
            }

            //error, try again
            $SalesForceJsonResponse = $this->do_request($request_uriArr, $fieldsArr, $http_method, $try+1);

        }
        elseif ((is_array($SalesForceJsonResponse) && isset($SalesForceJsonResponse[0]->errorCode) && $SalesForceJsonResponse[0]->errorCode) && $try >= \Inmanage\SalesForce\SalesForceConfig::MAX_CALLS_TRIES)
        {
            //error, no more tries left.
            $SalesForceJsonResponse = $SalesForceJsonResponse[0];
        }
        else
        {
            if(isset($_SESSION['first_url']))
            {
                unset($_SESSION['first_url']);
                unset($_SESSION['last_url']);
            }
        }
        return $SalesForceJsonResponse;

    }


  protected function do_upload_request($request_uriArr = '', $file_path = '', $http_method = \Inmanage\SalesForce\HttpRequestManager::HTTP_POST, $try = 1)
  {

    $case_id = $request_uriArr[2];

    $SalesForceConfig = \Inmanage\SalesForce\SalesForceConfig::get_instance();
    $SalesForceAuthentication = new \Inmanage\SalesForce\SalesForceAuthentication();
    $is_token_generating_succesed = $this->set_authentication_values($SalesForceAuthentication);
    $headersArr = $this->build_api_upload_headers_array($SalesForceAuthentication);
    $url = $this->build_salesforce_api_upload_url_path($SalesForceAuthentication, $request_uriArr);


    $response_as_json_string = \Inmanage\SalesForce\HttpRequestManager::do_upload_request($url, $http_method, $file_path, $headersArr, $case_id); //call WS
    $SalesForceJsonResponse = json_decode($response_as_json_string);
    $this->write_log('tb_salesforce__log', $url, $file_path, $http_method, $SalesForceJsonResponse, $try); //request log

    if((is_array($SalesForceJsonResponse) && isset($SalesForceJsonResponse[0]->errorCode) && $SalesForceJsonResponse[0]->errorCode) && $try < \Inmanage\SalesForce\SalesForceConfig::MAX_CALLS_TRIES)
    {
      if(trim($SalesForceJsonResponse[0]->errorCode) == 'INVALID_SESSION_ID')
      {
        //clear the authentication values. next time, we will render a new token
        $SalesForceAuthentication->reset_authentication();
      }

      //error, try again
      $SalesForceJsonResponse = $this->do_upload_request($request_uriArr, $file_path, $http_method, $try+1);

    }
    elseif ((is_array($SalesForceJsonResponse) && isset($SalesForceJsonResponse[0]->errorCode) && $SalesForceJsonResponse[0]->errorCode) && $try >= \Inmanage\SalesForce\SalesForceConfig::MAX_CALLS_TRIES)
    {
      //error, no more tries left.
      $SalesForceJsonResponse = $SalesForceJsonResponse[0];
    }
    else
    {
      if(isset($_SESSION['first_url']))
      {
        unset($_SESSION['first_url']);
        unset($_SESSION['last_url']);
      }
    }
    return $SalesForceJsonResponse;

  }




    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected)
     *  build_api_headers_array
     *
     * Description:
     *  The method builds the requested api headers according to SalesForce convetion.
     *
     * @param SalesForceAuthentication $SalesForceAuthentication - an instance of SalesForceAuthentication
     *
     * @return array
     */
    protected function build_api_headers_array(SalesForceAuthentication $SalesForceAuthentication)
    {
        $headersArr = array(
            'Content-Type: application/json',
            sprintf("Authorization: {$SalesForceAuthentication->getTokenType()} %s", $SalesForceAuthentication->get_access_token()),
        );

        return $headersArr;
    }


  protected function build_api_upload_headers_array(SalesForceAuthentication $SalesForceAuthentication)
  {
    $headersArr = array(
      sprintf("Authorization: {$SalesForceAuthentication->getTokenType()} %s", $SalesForceAuthentication->get_access_token()),
      'Content-Type:  application/json',
//      'Accept: application/json',
//      'Content-Type: application/json; charset=utf-8',
//      'Content-Disposition: form-data; name="file"'
    );

    return $headersArr;
  }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected):
     *  set_authentication_values
     *
     * Description:
     *  The method generates a new token if necassery
     *
     * @param SalesForceAuthentication $SalesForceAuthentication - an instance of SalesForceAuthentication.
     *
     * @return bool
     */
    protected function set_authentication_values(SalesForceAuthentication $SalesForceAuthentication)
    {
        $has_token = true;

        if(!$SalesForceAuthentication->get_access_token())
        {
            //generate new token in SalesForce
            $has_token = $SalesForceAuthentication->get_access_token_from_sales_force();
        }
        return $has_token;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected)
     *  build_salesforce_api_url_path
     *
     * Description:
     *  The method builds the apu url path according to salesforce convention.
     *
     * @param $request_uriArr - array with the salesforce uri url -
     * array(
    'first_rout',
     *  'second_route',
     *  'third_route'
     * );
     *  it will be generated to https://salesforceinstance.com/services/data/{version}/first_rout/second_route/third_route/
     *
     * @param $SalesForceAuthentication - an instance of SalesForceAuthentication
     * @return string
     */
    protected function build_salesforce_api_url_path(SalesForceAuthentication $SalesForceAuthentication, $request_uriArr = array())
    {

        $base_urlArr = array(
            $SalesForceAuthentication->getInstanceUrl(),
            'services/data/' .\Inmanage\SalesForce\SalesForceConfig::SALESFORCE_VERSION
        );

        $base_urlArr = array_merge($base_urlArr, $request_uriArr);

        return implode('/', $base_urlArr);
    }

    protected function build_salesforce_api_upload_url_path( SalesForceAuthentication $salesForceAuthentication, $request_uriArr ) {

      unset( $request_uriArr[2] );

      $base_urlArr = array(
        $salesForceAuthentication->getInstanceUrl(),
        'services/data/' . \Inmanage\SalesForce\SalesForceConfig::SALESFORCE_VERSION
      );

      $base_urlArr = array_merge($base_urlArr, $request_uriArr);

      return implode('/', $base_urlArr);

    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected)
     *  write_log
     *
     * Description:
     *  This method writes log into salesforce table
     *
     * @param $table - requested teable - i.e tb_salesforce__log
     * @param $request_url - salesforce request url
     * @param $post_fieldsArr - fields array that has been sent to salesforce
     * @param $http_method - according to HttpRequestManager CONSTANTS
     * @param $SalesForceJsonResponse - result from SalesForce
     * @param $try - call try.
     *
     * @return resource
     */
    protected function write_log($table, $request_url, $post_fieldsArr, $http_method, $SalesForceJsonResponse, $try)
    {
        $db_fieldsArr = array(
            'request_url' => $request_url,
            'post_fields' => serialize($post_fieldsArr),
            'http_method' => $http_method,
            'response' => serialize($SalesForceJsonResponse),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'try' => $try,
            'last_update' => time(),
        );
        foreach ($db_fieldsArr as &$value)
        {
            $value = $this->DB->make_escape($value);
        }

        $query = "
            INSERT INTO `{$table}` (`" .implode('`,`', array_keys($db_fieldsArr)) ."`)
                VALUES ('" .implode('\',\'', array_values($db_fieldsArr)) ."')
        ";

        $answer = $this->DB->query($query);

        return $answer;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (Protected)
     *  insert_record
     *
     * Description:
     *  Base insert to SalesForce systems according to the rest api url
     *
     * @param $uriArr - array
     *  i.e
     *  $uriArr = array(
    'sobjects',
    'Lead',
    );
     * @param $fieldsArr - array, fields to post.
     *
     * @param int $http_method - default value is POST
     *
     * @return mixed
     */
    protected function insert_record($uriArr = array(), $fieldsArr = array(), $http_method = \Inmanage\SalesForce\HttpRequestManager::HTTP_POST)
    {
        $SalesForceResponseObject = $this->do_request($uriArr, $fieldsArr, $http_method);

        return (isset($SalesForceResponseObject->errorCode)) ? false : $SalesForceResponseObject->id;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected)
     *  get_record
     *
     * Descripition:
     *  The methods returns base record according to the rest api url
     * @param array $uriArr
     *  $uriArr = array(
    'sobjects',
    'Lead',
    'Email',
    'itaybar@inmanage.net'
    );

     * @param array $fieldsArr
     *
     * @param int $http_method - default is GET in base cases.
     *
     * @return mixed
     */
    protected function get_record($uriArr = array(), $fieldsArr = array(), $http_method = \Inmanage\SalesForce\HttpRequestManager::HTTP_GET)
    {
        $SalesForceResponse = $this->do_request($uriArr, array(), \Inmanage\SalesForce\HttpRequestManager::HTTP_GET);

        return (isset($SalesForceResponse->errorCode)) ? new \stdClass() : $SalesForceResponse;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected)
     *  update_record
     *
     * Description:
     *  The method updates an exists record in SALESFORCE according to the rest api url
     *
     * @param array $uriArr
     *  $uriArr = array(
    'sobjects',
    'Lead',
    'Email',
    'itaybar@inmanage.net'
    );

     * @param array $fieldsArr
     *
     * @param int $http_method - default is GET in base cases.
     *
     * @return mixed
     */
    protected function update_record($uriArr = array(), $fieldsArr = array(), $http_method = HttpRequestManager::HTTP_PATCH)
    {
        $SalesForceResponse = $this->do_request($uriArr, $fieldsArr, $http_method);
        return (is_object($SalesForceResponse) && isset($SalesForceResponse->errorCode)) ? $SalesForceResponse : $SalesForceResponse;
    }

    protected function upload_file( $uriArr = array(), $file_path = '', $http_method = HttpRequestManager::HTTP_POST ) {

      $SalesForceResponse = $this->do_upload_request( $uriArr, $file_path, $http_method );
      return ( is_object( $SalesForceResponse ) && isset( $SalesForceResponse->errorCode ) ) ? $SalesForceResponse : $SalesForceResponse;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (protected)
     *  delete_record
     *
     * Description:
     *  The method updates an exists record in SALESFORCE according to the rest api url
     *
     * @param array $uriArr
     *  $uriArr = array(
    'sobjects',
    'Lead',
    'Email',
    'itaybar@inmanage.net'
    );

     * @param array $fieldsArr
     *
     * @param int $http_method - default is GET in base cases.
     *
     * @return mixed
     */
    protected function delete_record($uriArr = array(), $fieldsArr = array(), $http_method = HttpRequestManager::HTTP_DELETE)
    {
      $SalesForceResponse = $this->do_request($uriArr, $fieldsArr, $http_method);
      return (is_object($SalesForceResponse) && isset($SalesForceResponse->errorCode)) ? $SalesForceResponse : $SalesForceResponse;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    //test method for test calls
    public function test()
    {

        //insert
        /*$uriArr = array(
            'sobjects',
            'Lead',
        );

        $fieldsArr = array(
            'FirstName' => 'itay test',
            'LastName' => 'itay test',
            'Company' => "TEST",
            'Email' => 'itaybar@inmanage.net'
        );

        $x = $this->do_request($uriArr, $fieldsArr, \Inmanage\SalesForce\HttpRequestManager::HTTP_POST);*/

        /**-----------------------------------------------------------------------------------------------------------------**/
        //get
        $uriArr = array(
            'sobjects',
            'Lead',
            'Email',
            'itaybara@inmanage.net'
        );
        $x = $this->do_request($uriArr, array(), \Inmanage\SalesForce\HttpRequestManager::HTTP_GET);

        return $x;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (static | private)
     *  convert_to_salesforce_date_format
     *
     * Description:
     *  convert date to salesforce date format.
     *
     * @param $ddmmyyy_of_birth
     *
     * @return bool|string
     */
    public static function convert_to_salesforce_date_format($date)
    {
        $DATE_ISO8601 = null;

        if($date)
        {

            if(is_numeric($date) && (int)$date == $date){
                $date_ts = $date;
            } else {
                $date_ts = strtotime($date);
            }


//            $date_ts = strtotime($date);
            $hour_from_ts = intval(date('H', $date_ts));
            $minutes_from_ts = intval(date('i', $date_ts));
            $hour = ($hour_from_ts) ? $hour_from_ts : '05';
            $minutes = ($minutes_from_ts) ? $minutes_from_ts : null;

            $new_date_ts = mktime($hour, $minutes, null, date('m', $date_ts), date('d', $date_ts), date('Y', $date_ts));
            $DATE_ISO8601 = date(DATE_ISO8601, $new_date_ts);
        }

        return $DATE_ISO8601;
    }
}

/**-----------------------------------------------------------------------------------------------------------------**/
class HttpRequestManager
{
    const HTTP_POST = 1;
    const HTTP_GET = 2;
    const HTTP_PUT = 3;
    const HTTP_DELETE = 4;
    const HTTP_UPDATE = 5;
    const HTTP_PATCH = 6;

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (public | static)
     *  do_request
     *
     * Description:
     *  The method sends an HTTP request by CURL
     *
     * @param string $url - request URL
     * @param int $http_method_type -
     *  HTTP_POST = 1;
    HTTP_GET = 2;
    HTTP_PUT = 3;
    HTTP_DELETE = 4;
    HTTP_UPDATE = 5;

     * @param array $fields - data to post
     * @param array $headersArr - array of headers
     *
     * @return mixed
     */

    public static function do_request($url = '', $http_method_type =  self::HTTP_POST, $fields = array(), $headersArr = array())
    {

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        if(!!$fields)
        {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
            $headersArr[] = 'Content-Length: ' .strlen($fields);
        }

        if(!!$headersArr)
        {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headersArr);
        }

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, self::get_curl_http_method($http_method_type));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

  /**-----------------------------------------------------------------------------------------------------------------**/
  /**
   * Method (public | static)
   *  do_request
   *
   * Description:
   *  The method sends an HTTP request by CURL
   *
   * @param string $url - request URL
   * @param int $http_method_type -
   *  HTTP_POST = 1;
  HTTP_GET = 2;
  HTTP_PUT = 3;
  HTTP_DELETE = 4;
  HTTP_UPDATE = 5;

   * @param array $fields - data to post
   * @param array $headersArr - array of headers
   *
   * @return mixed
   */

  public static function do_upload_request($url = '', $http_method_type =  self::HTTP_POST, $file_path = '', $headersArr = array(), $case_id )
  {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");


    $file_name = basename( $file_path );
    $file = fopen( $file_path, 'r' );
    $content = fread( $file, filesize( $file_path ) );
    $fileData = base64_encode( $content );
    $data = array(
//      "OwnerId" => "$case_id",
      "Title" => "$file_name",
      'PathOnClient'=> $file_path,
      "VersionData" => "$fileData",
      "Origin"      => 'H'
    );

    $data_string = json_encode($data);


    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headersArr);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $response_json = curl_exec($curl);

    return $response_json;
  }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (static | private)
     *  get_curl_http_method
     *
     * Description:
     *  return curl request method.
     *
     * @param $http_method_type
     *
     * @return string
     */
    private static function get_curl_http_method($http_method_type)
    {

        switch ($http_method_type)
        {
            case (self::HTTP_POST):
                $method = 'POST';
                break;

            case (self::HTTP_PUT):
                $method = 'PUT';
                break;

            case (self::HTTP_DELETE):
                $method = 'DELETE';
                break;

            case (self::HTTP_PATCH):
                $method = 'PATCH';
                break;

            default:
                $method = 'GET';
                break;
        }

        return $method;
    }

    /**-----------------------------------------------------------------------------------------------------------------**/
    /**
     * Method (public | static):
     *  build_query_string
     *
     * Description:
     *  The method builds query string from array.
     *
     * @param $post_fieldsArr - (array),
     * array(
    'field' => 'value'
     * )
     *
     * @return string - fieldA=valueA&fieldB=valueB
     */
    public static function build_query_string($post_fieldsArr)
    {
        $first_loop = true;
        $query_string = '';

        if(is_array($post_fieldsArr) && !!$post_fieldsArr)
        {

            foreach ($post_fieldsArr as $field => $value)
            {
                $query_string_and_operator = ($first_loop) ? '' : '&';
                $query_string .= $query_string_and_operator .$field .'=' .$value;
                $first_loop = false;
            }

        }

        return $query_string;
    }

}
