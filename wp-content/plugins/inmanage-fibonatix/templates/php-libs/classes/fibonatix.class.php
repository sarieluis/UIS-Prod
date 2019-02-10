<?php
class FibonatixGateway {
    private static $instance;
    private $api_key;
    private $secret_key;
    private $login;
    private $control_key;

    private $form;
    private $not_secure_end_point_group;
    private $secure_end_point_group;
    private $request_url;
    private $request_form_url;
    private $request_form_url_secure;
    private $request_order_status_url;
    private $request_order_status_url_secure;
    private $endpoint_id;
    private $payemnt_result_page_url;

    /**
     * holds credentials for development and production mode
     * @var array
     */
    private $account_creds = array(

        'dev' => array(
            'control_key'                 => 'EBD34207-1E31-4C96-8534-6CABD0AFB2FC',
            'login'                       => 'SandBoxTest',
            'secure_end_point_group'      => '435',
            'not_secure_end_point_group'  => '434',
            'endpoint_id'                 => '1'
        ),

        'prod' => array(
            'control_key'                 => '7C930FFC-DF13-41A5-BE4F-2CF5299EC390',
            'login'                       => 'UISCanada',
            'secure_end_point_group'      => '979',
            'not_secure_end_point_group'  => '978',
            'endpoint_id'                 =>  '1'
        )
    );


    /**
     * Defines whether or not we are in a sandbox mode
     * @var bool
     */
    private $sandbox_mode = false;




    /**
     * FibonatixGateway constructor.
     */
    private function __construct () {

        $this->payemnt_result_page_url = get_permalink() . 'return';

        $this->set_sandbox_mode( $this->sandbox_mode );
    }





    /**
     * Returns instance of this class.
     *
     * @return FibonatixGateway
     */
    public static function get_instance() {

        if( ! self::$instance || self::$instance == null ) {
            self::$instance = new FibonatixGateway();
        }

        return self::$instance;
    }




    /**
     * Send Request to receive the form url
     *
     * @return array
     */
    public function send_payment_form_request($salesforce_unique_key, $first_name, $last_name, $amount, $currency, $email, $address, $city, $state_code, $zip_code, $country_code, $payment_3d) {

        // Logger array data structure.
        $log_array = array(
            'request_fields' => array(),
            'response_fields' => array(),
            'method_name' => __METHOD__
        );

        // This array should be generated when we get the order id from SalesForce
        $request_fields = array(
            'client_orderid' => $salesforce_unique_key,
            'order_desc' => 'UIS Canada Payment platform',
            'first_name' => $first_name,
            'last_name' => $last_name,
            //'ssn' => '1267', todo::check if field is required

            'address1' => $address,
            'city' => $city,
            'state' => $state_code,
            'zip_code' => $zip_code,
            'country' => $country_code,

            'amount' => $amount,
//        'amount' => 1000,
            'email' => $email,
            'currency' => $currency,
            'ipaddress' => $_SERVER["REMOTE_ADDR"],
            'site_url' => home_url(),
            'redirect_url' => $this->payemnt_result_page_url,
            'server_callback_url' => $this->payemnt_result_page_url,
            'merchant_data' => 'VIP customer',
        );

        $max_unsecure_amount = 1500;
        if( $this->sandbox_mode )
          $max_unsecure_amount = 250;
        // this one will be generated here. So don't remove it.
        // this is the 'control' generator. A special sha1 hash for request verification.


        $request_url = $this->request_form_url;
        if( $payment_3d == 'yes' ) {

  //      $request_url = $this->request_form_url_secure;
          $request_url = $this->request_form_url_secure;
          $request_fields['control'] = $this->sign_payment_request( $request_fields, true );
        } else {

          $request_fields['control'] = $this->sign_payment_request( $request_fields, false );
        }
//        if( $request_fields['amount'] > (int)$max_unsecure_amount ) {

//      $request_url = $this->request_form_url_secure;
//            $request_url = $this->request_form_url_secure;
//            $request_fields['control'] = $this->sign_payment_request( $request_fields, true );
//        } else {
//
//            $request_fields['control'] = $this->sign_payment_request( $request_fields, false );
//        }

        // add data to log array.
        $log_array['request_fields']  = $request_fields;
        $log_array['client_orderid']    = isset( $request_fields['client_orderid'] ) ? $request_fields['client_orderid'] : null;

        // Logging current request.
        $log_id = $this->log_request( $log_array );
        $log_array = array(); // Reset log array for next Logging.

        // Sending the request here and getting the response fields.
        $response_fields = $this->make_request( $request_fields, $request_url );

        // Saving those response fields to the log array
        $log_array['response_fields'] = $response_fields;
        $log_array['paynet-order-id'] = isset( $response_fields['paynet-order-id'] ) ? $response_fields['paynet-order-id'] : null;

        // for us to not create a new log row in the database we send
        // the $where array to find the relevant row that was created
        // earlier and the method will update the row with new data.
        $where = array(
            'id' => $log_id // last insert id.
        );

        // Log the request result.
        $result = $this->log_request( $log_array, $where );
        // return response fields.
        return $response_fields;
    }




    /**
     * Sends the request.
     *
     * @param $request_fields
     * @return array
     */
    public function make_request( $request_fields, $request_url ) {

        $curl = curl_init( $request_url );

        curl_setopt_array($curl, array
        (
            CURLOPT_HEADER         => 0,
            CURLOPT_USERAGENT      => 'Fibonatix-Client/1.0',
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST           => 1,
            CURLOPT_RETURNTRANSFER => 1
        ));

        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($request_fields));

        $response = curl_exec($curl);

        if(curl_errno($curl))
        {
            $error_message  = 'Error occurred: ' . curl_error($curl);
            $error_code     = curl_errno($curl);
        }
        elseif(curl_getinfo($curl, CURLINFO_HTTP_CODE) != 200)
        {
            $error_code     = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $error_message  = "Error occurred. HTTP code: '{$error_code}'";
        }

        curl_close($curl);

        if (!empty($error_message))
        {
            throw new RuntimeException($error_message, $error_code);
        }

        if(empty($response))
        {
            throw new RuntimeException('Host response is empty');
        }

        $response_fields = array();

        parse_str($response, $response_fields);

        return $response_fields;
    }



    /**
     * returns singing string
     *
     * @param $string
     * @return string
     */
    private function sign_string( $string ){

        return sha1($string . $this->control_key );
    }


    /**
     * Signs status request.
     *
     * @param $request_fields
     * @return string
     */
    private function sign_status_request( $request_fields ) {

        $base = '';
        $base .= $this->login;
        $base .= $request_fields['client_orderid'];
        $base .= $request_fields['orderid'];

        return $this->sign_string( $base );
    }


    /**
     * Signs payment (sale/auth/transfer) request
     *
     * @param 	array		$requestFields		request array
     * @param	string		$endpointOrGroupId	endpoint or endpoint group ID
     * @param	string		$merchantControl	merchant control key
     *
     * @return  Sign String;
     */
    private function sign_payment_request( $request_fields, $secure ) {

        if( $secure )
            $endpoint = $this->secure_end_point_group;
        else
            $endpoint = $this->not_secure_end_point_group;

        $base  = '';
        $base .= $endpoint;
        $base .= $request_fields['client_orderid'];
        $base .= $request_fields['amount'] * 100;
        $base .= $request_fields['email'];

        $sign_string = $this->sign_string( $base );

        return $sign_string;
    }


    /**
     * returns Transaction status by paynet id.
     *
     * @param $paynet_id
     */
    public function get_transacation_status( $paynet_id, $client_orderid ) {

        $request_fields = array(
            'login'           => $this->login,
            'client_orderid'  => trim($client_orderid),
            'orderid'         => trim($paynet_id),
            'by-request-sn'   => trim( $this->get_serial_number( $paynet_id ) ),

        );
        $request_fields['control'] = $this->sign_status_request( $request_fields, $this->login, $this->login );

        $response_fields = $this->make_request( $request_fields, $this->request_order_status_url );

        return $response_fields;
    }


    /**
     * This is the error parser.
     * After a request or some kind of other operation is done - we receive a code.
     * If there was no error during the operation than the error_parser won't be need.
     * In other case we will receive a code and run it through this parser to show the
     * user a human readable error that will be descriptive enough for user's understanding.
     *
     * @param $error_number
     * @return mixed
     */
    public function error_parser( $error_number ) {

        $errors_array = array(
            'unknown_error' => 'An Unknown Error has occurred. Please contact the website administration to report this error.',
            '1'             => 'Unknown',
            '2'             => 'Unknown',
            '3'             => 'Unknown',
            '4'             => 'Unknown'
        );

        // if the error code is found in our parser then we will show him the error.
        if( isset( $errors_array[$error_number] ) )
            return $errors_array[$error_number];

        // otherwise we will shoot the unknown error by default.
        // Of course we need to have all error codes covered here so the user won't
        // get the default error.
        return $errors_array[ 'unknown_error' ];
    }




    /**
     * Sets sandbox mode and changes parameters accordingly.
     *
     * *** ATTENTION!!! ***
     * This part is very important. Be sure that the sandbox_mode parameter
     * of this class is defined correctly! When we are live we HAVE TO define it as FALSE
     * and if we are still testing than we MUST define it as TRUE!
     * *** ATTENTION!!! ***
     */
    public function set_sandbox_mode( $mode = false ) {

        // update the sandbox mode parameter.
        // For cases if it was defined after class construction.
        $this->sandbox_mode = $mode;

        if( $mode ) {

            $creds_key = 'dev';
            $requset_url_prefix = 'sandbox';
        } else {

            $creds_key = 'prod';
            $requset_url_prefix = 'gate';
        }

        // Defining parameters according to mode.
        $this->login                      = $this->account_creds[$creds_key]['login'];
        $this->control_key                = $this->account_creds[$creds_key]['control_key'];
        $this->secure_end_point_group     = $this->account_creds[$creds_key]['secure_end_point_group'];
        $this->not_secure_end_point_group = $this->account_creds[$creds_key]['not_secure_end_point_group'];
        $this->endpoint_id                = $this->account_creds[$creds_key]['endpoint_id'];

        $this->request_url = 'https://'. $requset_url_prefix .'.fibonatix.com/paynet/api/v2/sale/group/' . $this->not_secure_end_point_group;
        $this->request_form_url = 'https://'. $requset_url_prefix .'.fibonatix.com/paynet/api/v2/sale-form/group/' . $this->not_secure_end_point_group;
        $this->request_form_url_secure = 'https://'. $requset_url_prefix .'.fibonatix.com/paynet/api/v2/sale-form/group/' . $this->secure_end_point_group;
        $this->request_order_status_url = 'https://'. $requset_url_prefix .'.fibonatix.com/paynet/api/v2/status/group/' . $this->not_secure_end_point_group;
        $this->request_order_status_url_secure = 'https://'. $requset_url_prefix .'.fibonatix.com/paynet/api/v2/status/group/' . $this->secure_end_point_group;
    }



    private function get_serial_number( $orderid ) {

        global $wpdb;

        $table = 'tb_fibonatix_log';

        $query  = 'SELECT by_request_sn FROM ' . $table . ' ';
        $query .= 'WHERE `orderid` = ' . $orderid;

        $result = $wpdb->get_results( $query );

        $by_request_sn = false;

        if( $result && ! empty( $result ) ) {

            $by_request_sn = $result[0]->by_request_sn;
        }

        return $by_request_sn;

    }



    /**
     * Logs every step from showing the form to the user
     * till the end of the transaction.
     *
     * @return bool
     */
    public function log_request( $log_array, $where = false ) {

        global $wpdb; // global WP database object that we will use to operate.

        // table name to operate with.
        $table = 'tb_fibonatix_log';

        // TODO: Should find user's email and insert it here.
        $user_email = 'amos@inmanage.net';

        // If there is a $where array.
        if( is_array( $where ) ) {


            // update existing log row
            $values = array(

                'last_update' => time(),
                'response'    => serialize( $log_array['response_fields'] ),
            );

            // Values that may be added during requests.
            if( isset( $log_array['paynet-order-id'] ) )  $values['orderid']          = $log_array['paynet-order-id'];
            if( isset( $log_array['client_orderid'] ) )   $values['client_orderid']   = $log_array['client_orderid'];
            if( isset( $log_array['status'] ) )           $values['status']           = $log_array['status'];
            if( isset( $log_array['type'] ) )             $values['type']             = $log_array['type'];
            if( isset( $log_array['last-four-digits'] ) ) $values['last_four_digits'] = $log_array['last-four-digits'];
            if( isset( $log_array['processor-tx-id'] ) )  $values['processor_tx_id']  = $log_array['processor-tx-id'];
            if( isset( $log_array['response_fields']['serial-number'] ) )    $values['by_request_sn']    = $log_array['response_fields']['serial-number'];

            $result = $wpdb->update( $table, $values, $where );

        } else { // if there is no Where array then a new row will be created.

            // create new log row

            $data = array(
                'wp_user_id'            => get_current_user_id() ? get_current_user_id() : null,
                'user_email'            => $user_email,
                'request_fields'        => serialize( $log_array['request_fields'] ),
                'method_name'           => $log_array['method_name'],
                'response'              => null,
                'client_orderid'        => $log_array['client_orderid'],
                'last_update'           => time()
            );
            // TODO: Finish the request logging
            // logging the request into the database.

            $result = $wpdb->insert( $table, $data );
            if( $result ) $result =  $wpdb->insert_id;

        }

        return $result;
    }
}