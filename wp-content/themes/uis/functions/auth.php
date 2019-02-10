<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;
use Inmanage\SalesForce\SalesForceCase\SalesForceCase;

/**
 * Echoes form to leave a lead
 */
function show_register_form() {
    if(!is_user_logged_in()) {
        echo '<div class="form-wrap"><form class="register_form" action="' . esc_url(admin_url('admin-post.php')) . '" method="post">
                        <p class="form-title">Take the first step towards your Canadian Visa</p>
						<input type="hidden" name="lp_url" value="' . site_url( get_query_var( 'pagename' ) ) . '">
						<input type="hidden" name="utm_campaign" value="' .  $_REQUEST['utm_campaign'] . '" >
                        <div class="form-group">
                            <input type="text" class="form-text" placeholder="Full name" name="full_name" required>    
                            <p class="error-message"></p>
                        </div>
                       
                        <div class="form-group">
                            <input type="email" class="form-text" placeholder="Email" name="email" required>
                            <p class="error-message"></p>
                        </div>
                        
                        
                        <div id="phone-code" class="form-group form-group-inline-4">
                            <span class="phone-code-flag flag flag-us"></span>
                            <input type="text" class="form-text auto-phone-code phone-code-select" placeholder="+1" name="phone_code" required>
                            <p class="error-message"></p>
                        </div>
                        
                        <div class="form-group form-group-inline-8 no-padding">
                          <input type="text" class="form-text" placeholder="Phone number" name="phone" required>
                          <p class="error-message"></p>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group" id="country-field">
                            <input type="text" class="form-text country-select" placeholder="Country" name="country" required>
                            <p class="error-message"></p>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" name="confirmation" checked="checked">
                                <span class="checkmark"></span>
                                I agree with the <a style="color:#fff;padding: 0 3px;" href="https://www.uiscanada.com/terms-of-use/">terms of use</a>&<a style="color: #fff;padding: 0 3px;" href="https://www.uiscanada.com/privacy-policy/">privacy policy</a>
                            </label>
                            <p class="error-message"></p>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="action" value="register_user">
                            ' . wp_nonce_field('submit_registration') . '
                            <button class="btn">Get Started Now!</button>
                        </div>
                    </form></div>';
    }
}

function uis_break_name( $full_name ) {

    if( ! $full_name ) return false;

    // Break words into an array;
    $full_name_array = explode( ' ', $full_name );

    $first_name = $full_name_array[0];
    unset( $full_name_array[0] );
    $last_name = implode( ' ', $full_name_array );

    return array( 'first_name' => $first_name, 'last_name' => $last_name );
}

function register_user() {



    $full_name = $_POST['full_name'];
    $full_name_array = uis_break_name( $full_name );

    $first_name   = $full_name_array['first_name'];
    $last_name    = $full_name_array['last_name'];
    $username     = uis_generate_username();
    $email        = $_POST['email'];
    $phone        = $_POST['phone_code'] . $_POST['phone'];
    $country      = $_POST['country'];
    $confirmation = isset($_POST['confirmation']) && $_POST['confirmation'] == 'on' ? true : false;
    $password     = wp_generate_password( 8, false, false );
    $lp_url       = $_POST['lp_url'];
    $utm_campaign   = $_POST['utm_campaign'];

    $to = "mediacrush2018@gmail.com, sarielh@uiscanada.com";
    $subject = "New Lead Income";
    $txt = "<div style='text-align:left;direction:ltr;'><b>Full Name: </b> " .$full_name. "<br/><b>Email:</b> " .$email. "<br/><b>Phone:</b>" .$phone.
        "<br/><b>Campaign:</b> " .$utm_campaign. "<br/><b>LP Url:</b> " .$lp_url. "<br/><b>Country:</b> " .$country. "</div>";
    $headers = "From: UIS-NewLead@uiscanada.com\r\n";
    $headers .= "Reply-To: UIS-NewLead@uiscanada.com\r\n";
    $headers .= "CC: sarielh@uiscanada.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($to,$subject,$txt,$headers);

    $lead_data_array = array(
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'email'         => $email,
        'phone'         => $phone,
        'country_code'  => $country,
        'password'      => $password,
        'URL_of_LP__c'        => $lp_url,
        'username'      => $username,
        'user_id'       => '',
        'utm_campaign'		  => $utm_campaign
    );

    $errors = [];

    if($username == '') {
        $errors['username'] = 'This field is required';
    }
    if($email == '') {
        $errors['email'] = 'This field is required';
    } else {
        if(email_exists($email)) {
            $errors['email'] = 'This email already exists';
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'This email is not valid';
            }
        }
    }


    if($phone == '' || !preg_match( '/\d{7,999}/', $_POST['phone'] )) {
        $errors['phone'] = 'You have entered an invalid phone number.';
    }


    /*if( $country == '' ) {
        $errors['country'] = 'This field is required';
    } elseif ( ! get_country( $country, 'name', 'code' ) ) {
        $errors['country'] = 'You have entered an invalid country.' . __LINE__;
    }*/
    if(!$confirmation) {
        $errors['confirmation'] = 'This checkbox is required';
    }

    if(empty($errors)) {

        $user_id = wp_insert_user(array(
            'user_pass' => $password,
            'user_login' => $username,
            'user_email' => $email,
            'display_name' => $username,
        ));

        if($user_id) {

            update_user_meta( $user_id, 'phone', $phone );
            update_user_meta( $user_id, 'country', $country );

            $lead_data_array['user_id'] = $user_id;
            // send lead to SalesForce
            $_SESSION['lead_user_id'] = $user_id;
            uis_sf_create_lead( $lead_data_array );

            wp_send_json( array (
                'result' => true,
                'message' => get_option('register_success_text'),
            ) );
        } else {
            wp_send_json(array(
                'result' => false
            ));
        }
    } else {
        wp_send_json(array(
            'result' => false,
            'errors' => $errors
        ));
    }

}
add_action( 'admin_post_nopriv_register_user', 'register_user' );
add_action( 'admin_post_register_user', 'register_user' );




function register_user_lp() {



    $full_name = $_POST['full_name'];
    $full_name_array = uis_break_name( $full_name );

    if( isset($_POST['utm_campaign']) && $_POST['utm_campaign'] ) {
        $utm_campaign = $_POST['utm_campaign'];
    } elseif( isset( $_SESSION['utm_campaign'] ) && $_SESSION['utm_campaign'] ) {
        $utm_campaign = $_SESSION['utm_campaign'];
    } else {
        $utm_campaign = 'Empty';
    }


    $first_name   = $full_name_array['first_name'];
    $last_name    = $full_name_array['last_name'];
    $username     = uis_generate_username();
    $email        = $_POST['email'];
    $phone        = $_POST['phone_code'] . $_POST['phone'];
    $country      = $_POST['country'];
    $confirmation = isset($_POST['confirmation']) && $_POST['confirmation'] == 'on' ? true : false;
    $lp_ref_url   = $_POST['lp_ref_url'];
    $lp_url       = $_POST['lp_url'];
    //$high_school  = $_POST['Have_High_School_Diploma__c'];
    $Level_of_English__c  = $_POST['Level_of_English__c'];
    $work_ex      = $_POST['Work_Experience_of_2_yrs__c'];
    $monthly_in   = $_POST['Monthly_Income_over_1500__c'];
    $University_Degree    = $_POST['University_Degree__c'];
    $monthly_in_b   = $_POST['Monthly_Income_Over_2000__c'];
    $Have_In_Savings = $_POST['Have_In_Savings__c'];
    $Average_Monthly_Income = $_POST['Average_Monthly_Income__c'];
    $Visa_needed_in = $_POST['Visa_needed_in__c'];
    $gcleid = $_POST['GCLID__c'];
    $Would_like_to_be_contacted_between = $_POST['Would_like_to_be_contacted_between__c'];
    $Region = $_POST['Region__c'];
    $minimum_funds_to_open_a_business = $_POST['minimum_funds_to_open_a_business__c'];
    $management_experience = $_POST['management_experience__c'];


    $to = "mediacrush2018@gmail.com, sarielh@uiscanada.com";
    $subject = "New Lead Income";
    $txt = "<div style='text-align:left;direction:ltr;'><b>Full Name: </b> " .$full_name. "<br/><b>Email:</b> " .$email. "<br/><b>Phone:</b>" .$phone.
        "<br/><b>Campaign:</b> " .$utm_campaign. "<br/><b>LP Url:</b> " .$lp_url. "<br/><b>Country:</b> " .$country. "</div>";
    $headers = "From: UIS-NewLead@uiscanada.com\r\n";
    $headers .= "Reply-To: UIS-NewLead@uiscanada.com\r\n";
    $headers .= "CC: sarielh@uiscanada.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($to,$subject,$txt,$headers);


    /*$subjectMailLead = 'New Lead V2';
    $mailTo = 'mediacrush2018@gmail.com';
    $mailMessage = 'Full Name : ' .$full_name. '<br/>Email: ' .$email. '<br/>Phone: ' .$phone. '<br/>Campaign : ' .$utm_campaign. '<br/>LP Url: ' .$lp_url. '<br/>Country :' .$country ;
    $headersMail = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($mailTo, $subjectMailLead, $mailMessage, $headersMail);*/


    $password     = wp_generate_password( 8, false, false );

    $lead_data_array = array(
        'first_name'                                => $first_name,
        'last_name'                                 => $last_name,
        'email'                                     => $email,
        'phone'                                     => $phone,
        'country_code'                              => $country,
        'password'                                  => $password,
        'username'                                  => $username,
        'Last_Visited_URL__c'                       => $lp_ref_url,
        'URL_of_LP__c'                              => $lp_url,
        'utm_campaign'		                        => $utm_campaign,
        'user_id'                                   => '',
        //'Have_High_School_Diploma__c'             => $high_school,
        'Level_of_English__c'                       => $Level_of_English__c,
        'Work_Experience_of_2_yrs__c'               => $work_ex,
        'Monthly_Income_over_1500__c'               => $monthly_in,
        'University_Degree__c'                      => $University_Degree,
        'Monthly_Income_Over_2000__c'               => $monthly_in_b,
        'Have_In_Savings__c'                        => $Have_In_Savings,
        'Average_Monthly_Income__c'                 => $Average_Monthly_Income,
        'Visa_needed_in__c'                         => $Visa_needed_in,
        'GCLID__c'                                  => $gcleid,
        'Would_like_to_be_contacted_between__c'     => $Would_like_to_be_contacted_between,
        'Region__c'                                 => $Region,
        'minimum_funds_to_open_a_business__c'       => $minimum_funds_to_open_a_business,
        'management_experience__c'                  => $management_experience
    );

    $errors = [];

    if( $username == '' ) {
        $errors['username'] = 'This field is required';
    }


    if($email == '') {
        $errors['email'] = 'This field is required';
    } else {
        if(email_exists($email)) {
            $errors['email'] = 'This email already exists';
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'This email is not valid';
            }
        }
    }


    if($phone == '' || !preg_match( '/\d{7,999}/', $_POST['phone'] )) {
        $errors['phone'] = 'You have entered an invalid phone number.';
    }
    /*if( $country == '' ) {
        $errors['country'] = 'This field is required';
    } elseif ( ! get_country( $country, 'name', 'code' ) ) {
        $errors['country'] = 'You have entered an invalid country.';
    }*/
    if(!$confirmation) {
        $errors['confirmation'] = 'This checkbox is required';
    }

    if(empty($errors)) {

        $user_id = wp_insert_user(array(
            'user_pass' => $password,
            'user_login' => $username,
            'user_email' => $email,
            'display_name' => $username,
        ));

        if($user_id) {

            update_user_meta( $user_id, 'phone', $phone );
            update_user_meta( $user_id, 'country', $country );

            $lead_data_array['user_id'] = $user_id;
            $_SESSION['lead_user_id'] = $user_id;
            // send lead to SalesForce
            uis_sf_create_lead( $lead_data_array );

            wp_send_json( array (
                'result' => true,
                'message' => get_option('register_success_text'),
            ) );
        } else {
            wp_send_json(array(
                'result' => false
            ));
        }
    } else {
        wp_send_json(array(
            'result' => false,
            'errors' => $errors
        ));
    }

}
add_action( 'admin_post_nopriv_register_user_lp', 'register_user_lp' );
add_action( 'admin_post_register_user_lp', 'register_user_lp' );




function login_user() {

    $username = trim( $_POST['username'] );
    $password = $_POST['password'];

    $user = wp_signon(array(
        'user_login' => $username,
        'user_password' => $password,
        'remember' => true,
    ));

    if ( is_wp_error($user) ) {
        $errors['password'] = 'Wrong data.';

        wp_send_json(array(
            'result' => false,
            'errors' => $errors
        ));
    } else {


        $redirect_url = site_url('/personal-application');

        wp_send_json(array(
            'result' => true,
            'redirect_url' => $redirect_url
        ));
    }

}
add_action( 'admin_post_nopriv_login_user', 'login_user' );
add_action( 'admin_post_login_user', 'login_user' );



function login_user_action() {


    $username = trim( $_POST['username'] );
    $password = $_POST['password'];

    $user = wp_signon(array(
        'user_login' => $username,
        'user_password' => $password,
        'remember' => true,
    ));

    if ( is_wp_error($user) ) {
        $errors['password'] = 'Wrong data.';

        wp_redirect( '/' ); exit;

    } else {


        $redirect_url = site_url('/personal-application');

        wp_redirect( $redirect_url ); exit;
    }

}
add_action( 'admin_post_nopriv_login_user_action', 'login_user_action' );
add_action( 'admin_post_login_user_action', 'login_user_action' );


function is_profile() {
    return (bool)preg_match('#^\/personal-application#', $_SERVER['REQUEST_URI']);
}

if($_SERVER['REQUEST_URI'] == '/login/' && is_user_logged_in()) {
    wp_redirect( site_url());
    exit;
}
if(is_profile() && !is_user_logged_in()) {
    wp_redirect( site_url());
    exit;
}





/**
 * Sends request with lead data to SalesForce to create a lead in SalesForce.
 *
 * @param $lead_data_array // Array - Holds the data of the lead that we want to send to SalesForce
 * @return bool
 */
function uis_sf_create_lead( $lead_data_array ) {

    // Validating Lead data Array. If its empty or not type of Array then we just return false.
    if( ! $lead_data_array || ! is_array( $lead_data_array ) || empty( $lead_data_array ) )
        return false;

    // todo: describe what's here
    // todo: validate it using the DEBUG constant
    $_sf_post_url = isset( $_SERVER['HTTP_HOST'] ) && $_SERVER['HTTP_HOST'] == 'uis.urbanet.co.il' ? 'https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8' : 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
    $oid          = isset( $_SERVER['HTTP_HOST'] ) && $_SERVER['HTTP_HOST'] == 'uis.urbanet.co.il' ? '00D1q0000008bDJ' : '00D0Y00000356Uq';

    //$_sf_post_url = 'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
    //$oid = '00D0Y00000356Uq';

    $result = wp_remote_post( $_sf_post_url, array(
        'method' => 'POST',
        'body'   => array(
            'first_name'           => $lead_data_array['first_name'], // unique
            'last_name'            => $lead_data_array['last_name'], // unique
            'country_code'         => get_country( $lead_data_array['country_code'], 'name', 'code' ),
            'email'                => $lead_data_array['email'], // unique
            'phone'                => $lead_data_array['phone'], // unique
            'Website_Password__c'  => $lead_data_array['password'],
            'Website_User_ID__c'   => $lead_data_array['user_id'],
            'Website_Username__c'  => $lead_data_array['username'],
            //'Partner_ID__c'        => isset( $_SESSION['utm_campaign'] ) ? $_SESSION['utm_campaign'] : '',
            'Partner_ID__c'        => $lead_data_array['utm_campaign'],
            'oid'                  => $oid,   // SalesForce generated OID. Mendatory for lead creation
            'Last_Visted_URL__c'   => isset( $lead_data_array['Last_Visted_URL__c'] ) ? $lead_data_array['Last_Visted_URL__c'] : '',
            'URL_of_LP__c'         => isset( $lead_data_array['URL_of_LP__c'] ) ? $lead_data_array['URL_of_LP__c'] : '',
            'Lead_IP__c'           => get_current_user_ip(),
            //'Have_High_School_Diploma__c'  => $lead_data_array['Have_High_School_Diploma__c'],
            'Level_of_English__c'                        => $lead_data_array['Level_of_English__c'],
            'Work_Experience_of_2_yrs__c'                => $lead_data_array['Work_Experience_of_2_yrs__c'],
            'Monthly_Income_over_1500__c'                => $lead_data_array['Monthly_Income_over_1500__c'],
            'University_Degree__c'                       => $lead_data_array['University_Degree__c'],
            'Monthly_Income_Over_2000__c'                => $lead_data_array['Monthly_Income_Over_2000__c'],
            'Have_In_Savings__c'                         => $lead_data_array['Have_In_Savings__c'],
            'Average_Monthly_Income__c'                  => $lead_data_array['Average_Monthly_Income__c'],
            'Visa_needed_in__c'                          => $lead_data_array['Visa_needed_in__c'],
            'GCLID__c'                                   => $lead_data_array['GCLID__c'],
            'Would_like_to_be_contacted_between__c'      => $lead_data_array['Would_like_to_be_contacted_between__c'],
            'Region__c'                                  => $lead_data_array['Region__c'],
            'minimum_funds_to_open_a_business__c'        => $lead_data_array['minimum_funds_to_open_a_business__c'],
            'management_experience__c'                   => $lead_data_array['management_experience__c']
        )
    ) );

    //
    $json = json_encode( $result );
    return true;
}





/**
 * Gets content of a JSON file with the list of countries.
 * Finds needed value in an array of country arrays by one
 * of the values that the needed countries holds.
 *
 * If nothing matches then we return false.
 * Else we return the value that we were searching for.
 *
 * @param $value // The value to search by
 * @param $search_by // the key to search by
 * @param $search_for // the key that holds the needed information
 * @return bool
 */
function get_country( $value, $search_by, $search_for ) {

    $countries = json_decode( file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/phone-codes.json' ), true );

    foreach ( $countries as $key => $country ) {

        if ( strtolower($country[ $search_by ]) == strtolower( $value ) ) {
            return $country[ $search_for ];
        }
    }

    return false;
}





/**
 * @description This function checks if current user has case.
 * It return Boolean or in case the its param is set to true and the result is also true
 * then the Case Object will be returned.
 *
 * @author Amos Khimich
 *
 * @param bool $return_case_obj
 * @return bool|SalesForceCase
 */
function uis_current_user_has_case( $return_case_obj = false ) {

    // If user is not even logged in then of course
    // no case can be found. DUH!...
    if( ! is_user_logged_in() ) return false;

    // Get currently logged in user.
    $user_id = get_current_user_id();

    // If we don't have The SF API and classes to perform the query request to SalesForce
    // then the default answer is FALSE.
    if( ! class_exists( 'Inmanage\SalesForce\SalesForceQuery\SalesForceQuery' ) || ! class_exists( 'Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse' ) )
        return false;

    // Sending an SOQL to SalesForce to get SalesForce user Account by his WP ID
    $QueryResponse = new SalesForceQueryResponse(SalesForceQuery::get_case( $user_id ));

    // If Query was not successful then again... FALSE
    if( ! $QueryResponse->success ) return false;

    // Retrieving records from the response we got after performing the Query request.
    $records = $QueryResponse->recordsArr;

    // If we got no records then the answer is a no no.
    if( empty( $records ) ) return false;

    // Else we get the first record ( There is no)
    $record = $records[0];
    $salesforce_object_id = $record->Id;

    $case = new SalesForceCase( $salesforce_object_id );

    if( $return_case_obj ) {

        return $case;
    }

    return true;

}





/* @description This function returns the count of cases that the user has
 *
 * @author Amos Khimich
 *
 * @param bool $return_case_obj
 * @return bool|SalesForceCase
 */
function uis_current_user_count_cases() {

    // If user is not even logged in then of course
    // no case can be found. DUH!...
    if( ! is_user_logged_in() ) return false;

    // Get currently logged in user.
    $user_id = get_current_user_id();

    // If we don't have The SF API and classes to perform the query request to SalesForce
    // then the default answer is FALSE.
    if( ! class_exists( 'Inmanage\SalesForce\SalesForceQuery\SalesForceQuery' ) || ! class_exists( 'Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse' ) )
        return false;

    // Sending an SOQL to SalesForce to get SalesForce user Account by his WP ID
    $QueryResponse = new SalesForceQueryResponse(SalesForceQuery::get_case( $user_id ));

    // If Query was not successful then again... FALSE
    if( ! $QueryResponse->success ) return false;

    // Retrieving records from the response we got after performing the Query request.
    $records = $QueryResponse->recordsArr;

    // If we got no records then the answer is a no no.
    if( empty( $records ) ) return false;

    // return the count of cases that the current user has
    return count( $records );
}





/**
 * @description
 *
 * @author Amos Khimich
 *
 * @return bool|array
 */
function uis_current_user_get_cases_array() {

    // If user is not even logged in then of course
    // no case can be found. DUH!...
    if( ! is_user_logged_in() ) return false;

    // Get currently logged in user.
    $user_id = get_current_user_id();

    // If we don't have The SF API and classes to perform the query request to SalesForce
    // then the default answer is FALSE.
    if( ! class_exists( 'Inmanage\SalesForce\SalesForceQuery\SalesForceQuery' ) || ! class_exists( 'Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse' ) )
        return false;

    // Sending an SOQL to SalesForce to get SalesForce user Account by his WP ID
    $QueryResponse = new SalesForceQueryResponse(SalesForceQuery::get_case( $user_id ));

    // If Query was not successful then again... FALSE
    if( ! $QueryResponse->success ) return false;

    // Retrieving records from the response we got after performing the Query request.
    $records = $QueryResponse->recordsArr;

    // If we got no records then the answer is a no no.
    if( empty( $records ) ) return false;

    $cases_array = array();

    // Else we get the first record ( There is no)
    foreach( $records as $record ) {

        $salesforce_object_id = $record->Id;

        $case = new SalesForceCase( $salesforce_object_id );
        $cases_array[] = $case;
    }

    return $cases_array;

}





/**
 * Validates that the user has permission to access/edit Step 1 in Personal Application
 *
 * @param $case
 * @param bool $validate_url
 * @return bool
 */
function uis_check_personal_application_access_permission_step_1( $case, $validate_url = true ) {

    $parsed_url = parse_url( $_SERVER['REQUEST_URI'] );

    if( trim($parsed_url['path'], '/') !== 'personal-application' && $validate_url ) return true;

    $step_status = $case->Evaluation_Status__c;

    if( $step_status == 'Completed' && $case->Optimization_Status__c != 'In Progress' && $case->Optimization_Status__c != 'Completed' )
        return true;

    if( $step_status != 'In Progress' )
        return false;

    return true;
}





/**
 * Validates that the user has permission to access/edit Step 2 in Personal Application
 *
 * @param $case
 * @param bool $validate_url
 * @return bool
 */
function uis_check_personal_application_access_permission_step_2( $case, $validate_url = true ) {

    $parsed_url = parse_url( $_SERVER['REQUEST_URI'] );

    if( trim($parsed_url['path'], '/') !== 'personal-application/optimization' && $validate_url ) return true;

    $step_status = $case->Optimization_Status__c;

    if( $step_status == 'Completed' && $case->Submission_Status__c != 'In Progress' && $case->Submission_Status__c != 'Completed' )
        return true;

    if( $step_status != 'In Progress' ) {

        return false;
    }

    return true;

    /*$step_status = $case->Optimization_Status__c;

    if ($step_status == 'In Progress' || $$step_status == 'Completed' || $step_status == 'Test'){
        return true;
    }
    else
    {
        return false;
    }*/
}





/**
 * Validates that the user has permission to access/edit Step 3 in Personal Application
 *
 * @param $case
 * @param bool $validate_url
 * @return bool
 */
function uis_check_personal_application_access_permission_step_3( $case, $validate_url = true ) {

    $parsed_url = parse_url( $_SERVER['REQUEST_URI'] );

    if( trim($parsed_url['path'], '/') !== 'personal-application/submission' && $validate_url ) return true;

    $step_status = $case->Submission_Status__c;

    if( $step_status != 'In Progress' && $step_status != 'Completed' ) {

        return false;
    }

    return true;
}





// ======================================================= //
// Auth Check Personal Application area
// ======================================================= //
add_action( 'init', 'uis_personal_application_auth' );
function uis_personal_application_auth() {

    $parsed_url = parse_url( $_SERVER['REQUEST_URI'] );

    if( trim($parsed_url['path'], '/') !== 'personal-application' &&
        trim($parsed_url['path'], '/') !== 'personal-application/optimization' &&
        trim($parsed_url['path'], '/') !== 'personal-application/submission' ) {
        return true;
    }

    // Checks if a guest user is trying to access the Application Pages
    // No matter which steps.
    if( ! is_user_logged_in() ) {

        wp_redirect( site_url() );
        exit;
    }

    // Get current user's ID
    $user_id = get_current_user_id();

    // Check if current user has a Case in SalesForce
    $user_cases = uis_current_user_get_cases_array();

    // If the user Does has it then we throw him out of the Personal Application Area.
    if( $user_cases === false ) {

        wp_redirect( site_url() );
        exit;
    }

    if( count( $user_cases ) == 2 ) {

        if( $user_cases[0]->Type == 'Spouse' ) {

            $case_spouse = $user_cases[0];
            $case_primary = $user_cases[1];
        } else {

            $case_spouse = $user_cases[1];
            $case_primary = $user_cases[0];
        }
    } else {

        $case_primary = $user_cases[0];
        $case_spouse = false;
    }

    if( isset( $_REQUEST['case'] ) && $_REQUEST['case'] == 'spouse' && $case_spouse !== false ) {
        $case = $case_spouse;
    } else {
        $case = $case_primary;
    }

    if( ! uis_check_personal_application_access_permission_step_1( $case, false ) &&
        ! uis_check_personal_application_access_permission_step_2( $case, false ) &&
        ! uis_check_personal_application_access_permission_step_3( $case, false ) ) {

        wp_redirect( get_site_url() );
        exit;
    }

    $query = isset( $parsed_url['query'] ) ? '?' . $parsed_url['query'] : '';

    if( ! uis_check_personal_application_access_permission_step_1( $case ) ) {

        wp_redirect( get_site_url() . '/personal-application/optimization' . $query );
        exit;
    }

    if( ! uis_check_personal_application_access_permission_step_2( $case ) ) {

        wp_redirect( get_site_url() . '/personal-application/submission' . $query );
        exit;
    }


    if( ! uis_check_personal_application_access_permission_step_3( $case ) ) {

        wp_redirect( get_site_url() . '/personal-application' . $query );
        exit;
    }
}
// ======================================================= //





/**
 * Function to get the client IP address
 *
 * @return string
 */
function get_current_user_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/**
 * UTM Campaign (later will be used to save in SF Lead)
 */
if( isset( $_REQUEST['utm_campaign'] ) ) {

    if( ! isset( $_SESSION ) ) {

        session_start();
    }

//
    //if(get_current_user_ip() == '207.232.22.164' || get_current_user_ip() == '142.44.243.107') {
    //echo "<pre style='direction:ltr; text-align: left'>";
    //  var_dump($_SESSION);
    // echo "</pre>";
    // die;
//  }
    $_SESSION['utm_campaign'] = $_REQUEST['utm_campaign'];
    uis_save_utm_lead_to_log( $_GET );
}

function uis_save_utm_lead_to_log( $get_params_array ) {

    $file = fopen( get_stylesheet_directory() . '/leads.txt', 'a' );

    $utms = '';
    foreach( $get_params_array as $key => $value ) {
        $utms .= $key . ': ' . $value . ' | ';
    }

    date_default_timezone_set( 'Asia/Jerusalem' );

    $txt = '['. date( "d/m/Y H:i:s" ) .'] - Lead UTM URL: ' . $utms . PHP_EOL;

    fwrite( $file, $txt );
}
