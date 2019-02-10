<?php
if( ! in_array($_SERVER['REMOTE_ADDR'],array('62.219.212.139','81.218.173.175','37.142.40.96','82.102.165.193','207.232.22.164'))) {

    if( ! wp_next_scheduled( 'uis_sf_leads_sync_hook' ) ) {

//      wp_schedule_event( time(), 'hourly', 'uis_sf_leads_sync_hook' );
      wp_schedule_event( time(), 'quarter_hour', 'uis_sf_leads_sync_hook' );
//      wp_schedule_event( time(), 'noon_one', 'uis_sf_leads_sync_hook' );
    }
    add_action( 'uis_sf_leads_sync_hook', 'run_uis_sf_leads_sync_func' );
}
if( ! isset( $_SESSION ) ) session_start();

/**
 * @return bool
 */

//if(in_array($_SERVER['REMOTE_ADDR'],array('62.219.212.139','81.218.173.175','37.142.40.96','82.102.165.193','207.232.22.164'))) {
////  uis_sf_leads_sync_func();
//}
function run_uis_sf_leads_sync_func() {
    uis_sf_leads_sync_func();
}

function uis_sf_leads_sync_func() {
    // Synchronize Leads from SalesForce with Wordpress

    // Step 1 - Get Leads from SF that are not yet converted and don't have a Wordpress user id and password.
    $leads_array = uis_sf_get_unready_leads();


    if( ! $leads_array || ! is_array( $leads_array ) )
        return false;

    // Step 2 - Create Users using the information leads hold.
    $failed_users     = array();
    $successful_users = array();
    $users            = array();
    foreach( $leads_array as $lead ) {

        $users[] = uis_sf_create_user_by_lead( $lead );
    }

    // Step 3 - Generate Array with successful user creations.
    // Step 4 - Generate Array with failed user creations and reasons.
    foreach( $users as $user ) {

        if( ! isset( $user['errors'] ) ) {

            $successful_users[] = $user;
        } else {

            $failed_users[] = $user;
        }
    }

//  if( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
//    echo "<pre style='direction:ltr; text-align: left'>";
//    echo 'Leads Count: ' . count( $leads_array );
//    echo '<br>';
//    echo 'Successful Users: ' . count( $successful_users );
//    echo '<br>';
//    echo 'Failed Users: ' . count( $failed_users );
//    echo '<br>';
//    foreach( $failed_users as $failed_user ) {
//      echo "Lead id :" . $failed_user['lead_id'];
//      echo '<br>';
//      echo "Errors :";
//      var_dump($failed_user['errors']);
//      echo '<br>';
//    }
//    echo "</pre>";
//  }

    // Step 5 - Update Leads with the relevant Data that was generated when creating the users.
    foreach( $leads_array as $lead_key => $lead  ) {

        foreach( $successful_users as $user_key => $user ) {

            if( $user['lead_id'] == $lead->Id ) {

                // Update Lead
                $fields_arr = array(
                    'Website_Password__c' => $user['password'],
                    'Website_User_ID__c'  => $user['user_id'],
                    'Website_Username__c' => $user['username']
                );
                $lead->update( $fields_arr );

                unset( $successful_users[$user_key] );
                break;
            }
        }
    }

    // TODO: Step 6 - Generate XLSX File that will hold information about the Insertion.
    // TODO: Step 7 - Send Email with an attached XLSX File that was created in the previous step.
}


/**
 *
 *
 * @return array|bool
 */
function uis_sf_get_unready_leads() {

    // If we don't have The SF API and classes to perform the query request to SalesForce
    // then the default answer is FALSE.
    if( ! class_exists( 'Inmanage\SalesForce\SalesForceQuery\SalesForceQuery' ) || ! class_exists( 'Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse' ) )
        return false;

    // Pull All unready leads from SalesForce
    $result = new Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse( Inmanage\SalesForce\SalesForceQuery\SalesForceQuery::get_unready_leads() );

    if(in_array($_SERVER['REMOTE_ADDR'],array('62.219.212.139','81.218.173.175','37.142.40.96','82.102.165.193','207.232.22.164','142.44.243.107', '212.235.70.29'))) {
        echo "<pre style='direction:ltr; text-align: left'>";
        var_dump(  $result  );
        echo "</pre>";
    }
    
    // If query failed then stop
//    if( ! $result->success )
//        return false;

    // If no results found then stop
    if( empty( $result->recordsArr ) )
        return false;

    $records = $result->recordsArr;

    if( count( $records ) > 50 ) {
      $temp_array = array();
      for( $i=0; $i<50; $i++ ) {
        $temp_array[] = $records[$i];
      }
      $records = $temp_array;
    }

    $leads_array = array();

    foreach( $records as $record ) {

        $lead = new \Inmanage\SalesForce\SalesForceLead\SalesForceLead( $record->Id );
        $leads_array[] = $lead;
    }

    return $leads_array;
}


/**
 * Receives SalesForce Lead object and converts it to a user in Wordpress
 *
 * @param \Inmanage\SalesForce\SalesForceLead\SalesForceLead $lead
 * @return array
 */
function uis_sf_create_user_by_lead( \Inmanage\SalesForce\SalesForceLead\SalesForceLead $lead ) {

    // Generate User email, username and password
    $email = $lead->Email;
    $username = uis_generate_username();
    $password = wp_generate_password( 8, false, false );
    $exists = false;

    // An array that will hold the user data to further Lead update
    $lead_data_array = array(
        'email'         => $email,
        'password'      => $password,
        'user_id'       => '',
        'lead_id'       => $lead->Id,
        'username'      => $username
    );

    // errors array
    $errors = [];

    // Validation
    if($username == '') {
        $errors['username'] = 'This field is required';
    }
    if($email == '') {
        $errors['email'] = 'This field is required';
    } else {

        if( email_exists($email) || username_exists( $username ) ) {
          $password = wp_generate_password( 8, false, false );
          $exists = true;

        } else {
          if(email_exists($email)) {
            $errors['email'] = 'This email already exists';
          } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errors['email'] = 'This email is not valid';
            }
          }
          if( username_exists( $username ) ) {
            $errors['username'] = 'This username already exists';
          }
        }
    }

    // If Errors array is empty than it means that everything is OK and the user
    // will be created successfully.
    if( empty($errors) ) {

      if( ! $exists ) {
        // Attempt to create User
        $user_id = wp_insert_user(array(
          'user_pass' => $password,
          'user_login' => $username,
          'user_email' => $email,
          'display_name' => $username,
        ));

        // If there is a user_id than the attempt was successfull
        if($user_id) {

          $lead_data_array['user_id'] = $user_id;
          return $lead_data_array;

        } else { // else we return the errors array.

          $lead_data_array['errors'] = $errors;
          return $lead_data_array;
        }
      } else {
        $user = get_user_by( 'email', $email );
        wp_set_password( $password, $user->ID );
        $lead_data_array['user_id'] = $user->ID;
        $lead_data_array['password'] = $password;
        return $lead_data_array;
      }

    } else { // if there are errors than we save them but no attempt to create user will be made.

        $lead_data_array['errors'] = $errors;
        return $lead_data_array;
    }

}


/**
 * @description Generates a unique username for UIS
 *
 * @return string
 */
function uis_generate_username() {

    $inm_username_ai = get_option( 'inm_username_ai' );
    $username = 'case' . $inm_username_ai;

    $inm_username_ai++;
    update_option( 'inm_username_ai', $inm_username_ai );

    return $username;
}


function uis_cron_logger() {

}