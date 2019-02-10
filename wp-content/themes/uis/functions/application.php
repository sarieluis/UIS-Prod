<?php
session_start();
$user_id = get_current_user_id();

include_once ($_SERVER["DOCUMENT_ROOT"] ."/inmanage/class/system.php");

use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;
use Inmanage\SalesForce\SalesForceCase\SalesForceCase;

function application_save_tab() {

    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce( $_POST['_wpnonce'], 'submit_application_save_tab' ) || !is_user_logged_in() ) {
        exit;
    }


    $user_id = get_current_user_id();
    $tmp_files_dir_path = $_SERVER['DOCUMENT_ROOT'] . '/inmanage/class/SalesForce/TEMP_FILES/';

    $user_cases   = uis_current_user_get_cases_array();

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

    if( isset( $_POST['case_type'] ) && $_POST['case_type'] == 'Spouse' && $case_spouse !== false ) {
        $case = $case_spouse;
    } else {
        $case = $case_primary;
    }

    if( isset( $_POST['case_type'] ) )
        unset( $_POST['case_type'] );

    $data = $_POST;

    $tab = $data['tab'];

    unset($data['tab']);
    unset($data['action']);
    unset($data['_wpnonce']);
    unset($data['_wp_http_referer']);

    $errors = [];
    $sf_ready_array = array();
    $files_to_upload = array();


    if(($data['need-validation'] == 1 && $case->Evaluation_Status__c != 'Completed') || $case->Optimization_Status__c == 'In Progress') {
        switch ($tab) {
            case 1:

                $sf_ready_array['Middle_Name__c']                           = $data['middleName'];
                $sf_ready_array['Another_Email_Address__c']                 = $data['anotherEmail'];
                $sf_ready_array['Number_of_Dependent_Children_Under_22__c'] = $data['children'];

                if ($data['firstName'] == '') {
                    $errors['firstName'] = 'This field is required';
                } else {
                    $sf_ready_array['First_Name__c'] = $data['firstName'];
                }
                if ($data['lastName'] == '') {
                    $errors['lastName'] = 'This field is required';
                } else {
                    $sf_ready_array['Last_Name__c'] = $data['lastName'];
                }
                if ($data['gender'] == '') {
                    $errors['gender'] = 'This field is required';
                } else {
                    $sf_ready_array['Gender__c'] = $data['gender'];
                }
                if ($data['email'] == '') {
                    $errors['email'] = 'This field is required';
                } else {
                    $sf_ready_array['Email_Address__c'] = $data['email'];
                }
                if ($data['phone'] == '') {
                    $errors['phone'] = 'This field is required';
                } else {
                    $sf_ready_array['Phone_Number__c'] = $data['phone'];
                }
                if ($data['country'] == '') {
                    $errors['country'] = 'This field is required';
                } else {
                    $sf_ready_array['Country_of_Residence__c'] = $data['country'];
                }
                if ($data['street'] == '') {
                    $errors['street'] = 'This field is required';
                } else {
                    $sf_ready_array['Street__c'] = $data['street'];
                }
                if ($data['city'] == '') {
                    $errors['city'] = 'This field is required';
                } else {
                    $sf_ready_array['City__c'] = $data['city'];
                }
                if ($data['zipcode'] == '') {
                    $errors['zipcode'] = 'This field is required';
                } else {
                    $sf_ready_array['Zip_Code_Postal_Code__c'] = $data['zipcode'];
                }
                if ($data['dob'] == '') {
                    $errors['dob'] = 'This field is required';
                } else {
                    $sf_ready_array['Date_of_Birth__c'] = $data['dob'];
                }
                if ($data['material'] == '') {
                    $errors['material'] = 'This field is required';
                } else {

                    $sf_ready_array['Marital_Status__c'] = $data['material'];
                }
                if ($data['criminal'] == '') {
                    $errors['criminal'] = 'This field is required';
                } else {
                    $sf_ready_array['Criminal_Offences__c'] = $data['criminal'];
                }
                if ( ! isset( $data['health'] ) || $data['health'] == '') {
                    $errors['health'] = 'This field is required';
                } else {
                    $sf_ready_array['Health_Problems__c'] = $data['health'];
                }


                // File passportID-file
                if( $data['passportID-file'] != '' && ! $case->Passport_Copy__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passportID-file'], 'passportID-file' );
                    if( ! $file ){
                        $errors['passportID-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Passport_Copy__c'] = TRUE;
                }


                // File utilityBill-file
                if( ! $case->Utility_Bill__c && $data['utilityBill-file'] != '' ){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['utilityBill-file'], 'utilityBill-file' );
                    if( ! $file ){
                        $errors['utilityBill-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Utility_Bill__c'] = TRUE;

                }

                break;

            case 2:

                $sf_ready_array['What_is_your_highest_Level_of_education__c']     = $data['programType'];
                $sf_ready_array['Program_Duration__c']                            = $data['programDuration'];
                $sf_ready_array['Field_of_Study__c']                              = $data['studyField'];
                $sf_ready_array['Country_of_Study__c']                            = $data['studyCountry'];
                $sf_ready_array['Have_you_completed_this_program__c']             = isset( $data['education'] ) ? $data['education'] : '';
                $sf_ready_array['Total_Years_of_Education_Since_Grade_1__c']      = $data['educationYears'];
                $sf_ready_array['Field_of_Study_2__c']                            = $data['studyField_2'];
                $sf_ready_array['Country_of_Study_2__c']                          = $data['studyCountry_2'];
                $sf_ready_array['Program_Duration_2__c']                          = $data['programDuration_2'];

                if ($data['programType'] == '') {
                    $errors['programType'] = 'This field is required';
                }
                if ($data['programDuration'] == '') {
                    $errors['programDuration'] = 'This field is required';
                }
                if ($data['studyField'] == '') {
                    $errors['studyField'] = 'This field is required';
                }
                if ($data['studyCountry'] == '') {
                    $errors['studyCountry'] = 'This field is required';
                }
                if ( ! isset( $data['education'] ) || $data['education'] == '') {
                    $errors['education'] = 'This field is required';
                }
                if ($data['educationYears'] == '') {
                    $errors['educationYears'] = 'This field is required';
                }
                break;

            case 3:


                $sf_ready_array['How_Many_Jobs_Did_You_Have__c'] = $data['jobsCount'];

                if( $sf_ready_array['How_Many_Jobs_Did_You_Have__c'] ) {

                    for( $i = 1; $i <= $sf_ready_array['How_Many_Jobs_Did_You_Have__c']; $i++ ) {

                        $sf_ready_array['Job_' . $i . '_Years_of_experience__c']  = $data['jobs'][$i]['years'];
                        $sf_ready_array['Job_' . $i . '_Description__c']          = $data['jobs'][$i]['description'];
                        $sf_ready_array['Job_' . $i . '_Started__c']              = $data['jobs'][$i]['started'];
                        $sf_ready_array['Job_' . $i . '_Finish__c']               = $data['jobs'][$i]['finish'];
                        $sf_ready_array['Job_' . $i . '_full_time_position__c']   = $data['jobs'][$i]['fulltime'];
                        $sf_ready_array['Job_' . $i . '_30_hours_a_week__c']      = $data['jobs'][$i]['week'];

                    }
                }

                $sf_ready_array['How_Many_Jobs_Did_Your_Spouse_Have__c'] = $data['jobsSpouseCount'];

                if( $sf_ready_array['How_Many_Jobs_Did_Your_Spouse_Have__c'] ) {

                    for( $i = 1; $i <= $sf_ready_array['How_Many_Jobs_Did_Your_Spouse_Have__c']; $i++ ) {

                        $sf_ready_array['Job_Spouse_' . $i . '_Years_of_experience__c']  = $data['jobs_spouse'][$i]['years'];
                        $sf_ready_array['Job_Spouse_' . $i . '_Description__c']          = $data['jobs_spouse'][$i]['description'];
                        $sf_ready_array['Job_Spouse_' . $i . '_Started__c']              = $data['jobs_spouse'][$i]['started'];
                        $sf_ready_array['Job_Spouse_' . $i . '_Finish__c']               = $data['jobs_spouse'][$i]['finish'];
                        $sf_ready_array['Job_Spouse_' . $i . '_full_time_position__c']   = $data['jobs_spouse'][$i]['fulltime'];
                        $sf_ready_array['Job_Spouse_' . $i . '_30_hours_a_week__c']      = $data['jobs_spouse'][$i]['week'];

                    }
                }


//                $sf_ready_array[''] = $data['cv-file'];

                if ( ! isset( $data['work-1'] ) || $data['work-1'] == '') {
                    $errors['work-1'] = 'This field is required';
                } else {
                    $sf_ready_array['Do_You_have_a_Valid_Candidan__c'] = $data['work-1'];
                }
                if ( ! isset( $data['work-2'] ) || $data['work-2'] == '') {
                    $errors['work-2'] = 'This field is required';
                } else {
                    $sf_ready_array['Do_You_have_a_Job_Offer_From_a_Canadidan__c']  = $data['work-2'];
                }
                if ( ! isset( $data['work-3'] ) || $data['work-3'] == '') {
                    $errors['work-3'] = 'This field is required';
                } else {
                    $sf_ready_array['At_least_1_care_giving_experience__c']         = $data['work-3'];
                }
                if ($data['estimatedWorth'] == '') {
                    $errors['estimatedWorth'] = 'This field is required';
                }
                if ($data['cashFlow'] == '') {
                    $errors['cashFlow'] = 'This field is required';
                }
                if ($data['transferMoney'] == '') {
                    $errors['transferMoney'] = 'This field is required';
                }

                // Business Related fields

                //$sf_ready_array['What_is_your_estimated_net_worth_USD__c']      = $data['estimatedWorth'];
                $sf_ready_array['What_is_your_estimated__c']                    = $data['estimatedWorth'];
                $sf_ready_array['How_Much_Money_Will_You_Have_in_Canada__c']    = $data['transferMoney'];
                $sf_ready_array['What_is_your_current_cash_flow__c']            = $data['cashFlow'];

                if( ! isset( $data['Do_you_own_a_business__c'] ) ) {
                    $errors['Do_you_own_a_business__c'] = 'This field is required';
                } else {
                    $sf_ready_array['Do_you_own_a_business__c']                   = $data['Do_you_own_a_business__c'];
                }

                $sf_ready_array['Please_Describe_your_business_activities__c']  = $data['Please_Describe_your_business_activities__c'];
                $sf_ready_array['When_was_the_business_established__c']         = convert_to_salesforce_date_format( str_replace( ' ', '', $data['When_was_the_business_established__c'] ) );
                $sf_ready_array['How_many_employees_are_currently_employe__c']  = $data['How_many_employees_are_currently_employe__c'];


                // CV File
                if( $data['cv-file'] != '' && ! $case->CV_Resume__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['cv-file'], 'cv-file' );
                    if( ! $file ){
                        $errors['cv-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['CV_Resume__c'] = TRUE;
                }
                break;

            case 4:

                $sf_ready_array['What_is_your_overall_level_of_English__c'] = $data['englishLevel'];
                $sf_ready_array['What_is_Your_Overall_Level_of_French__c'] = $data['frenchLevel'];
                /*$sf_ready_array['What_is_Your_Reading_Level_of_English__c'] = $data['englishReadingLevel'];
                $sf_ready_array['What_is_Your_Listening_Level_of_English__c'] = $data['englishListeningLevel'];
                $sf_ready_array['What_is_Your_Writing_Level_of_English__c'] = $data['englishWritingLevel'];
                $sf_ready_array['What_is_Your_Speaking_Level_of_English__c'] = $data['englishSpeakingLevel'];
                /*$sf_ready_array['What_is_your_Reading_level_of_French__c'] = $data['frenchReadingLevel'];
                $sf_ready_array['What_is_your_Listening_Level_of_French__c'] = $data['frenchListeningLevel'];
                $sf_ready_array['What_is_Your_Writing_Level_of_French__c'] = $data['frenchWritingLevel'];
                $sf_ready_array['What_is_Your_Speaking_Level_of_French__c'] = $data['frenchSpeakingLevel'];*/

                if ($data['englishLevel'] == '') {
                    $errors['englishLevel'] = 'This field is required';
                }
                if ($data['frenchLevel'] == '') {
                    $errors['frenchLevel'] = 'This field is required';
                }
                /*if ($data['englishReadingLevel'] == '') {
                    $errors['englishReadingLevel'] = 'This field is required';
                }
                if ($data['englishListeningLevel'] == '') {
                    $errors['englishListeningLevel'] = 'This field is required';
                }
                if ($data['englishWritingLevel'] == '') {
                    $errors['englishWritingLevel'] = 'This field is required';
                }
                if ($data['englishSpeakingLevel'] == '') {
                    $errors['englishSpeakingLevel'] = 'This field is required';
                }
                if ($data['frenchReadingLevel'] == '') {
                    $errors['frenchReadingLevel'] = 'This field is required';
                }
                if ($data['frenchListeningLevel'] == '') {
                    $errors['frenchListeningLevel'] = 'This field is required';
                }
                if ($data['frenchWritingLevel'] == '') {
                    $errors['frenchWritingLevel'] = 'This field is required';
                }
                if ($data['frenchSpeakingLevel'] == '') {
                    $errors['frenchSpeakingLevel'] = 'This field is required';
                }*/
                break;

            case 5:

                $sf_ready_array['Have_at_Least_1_Year_Canadian_Work__c']        = $data['adaptability-1'];
                $sf_ready_array['Did_You_or_Your_Spouse_Study_in_Canada__c']    = $data['adaptability-2'];
                $sf_ready_array['Has_your_spouse__c']                           = $data['adaptability-3'];
                $sf_ready_array['Spouse_done_education_after_High_School__c']   = $data['adaptability-4'];
                $sf_ready_array['Spouse_Highest_Degree__c']                     = $data['partnerDegree'];
                $sf_ready_array['Total_Years_of_Spouse_Education__c']           = $data['partnerEducationYears'];
                $sf_ready_array['Completed_2_Years_of_PS_Education__c']         = $data['adaptability-5'];
                /*$sf_ready_array['Spouse_English_Reading_Level__c']              = $data['partnerEnglishReading'];
                $sf_ready_array['Spouse_English_Listening_Level__c']            = $data['partnerEnglishListening'];
                $sf_ready_array['Spouse_English_Writing_Level__c']              = $data['partnerEnglishWriting'];*/
                $sf_ready_array['Spouse_English_Speaking_Level__c']             = $data['partnerEnglishSpeaking'];
                /* $sf_ready_array['What_is_your_spouse_French_Reading_Level__c']  = $data['partnerFrenchReading'];
                 $sf_ready_array['Spouse_French_Listening_Level__c']             = $data['partnerFrenchListening'];
                 $sf_ready_array['What_is_your_spouse_French_Writing_Level__c']  = $data['partnerFrenchWriting'];*/
                $sf_ready_array['Spouse_French_Speaking_Level__c']              = $data['partnerFrenchSpeaking'];
                $sf_ready_array['Family_Members_Living_in_Canada__c']           = $data['partnerFamily'];
                $sf_ready_array['Is_your_relative_18_years_old_of_age_or__c']   = $data['adaptability-6'];
                $sf_ready_array['Does_your_relative_or_your_spouse_s_rel__c']   = $data['adaptability-7'];
                $sf_ready_array['Canadian_job_description__c']                  = $data['canadianPosition'];
                $sf_ready_array['How_many_academic_years_in_Canada__c']         = $data['YearsOfAcademic'];
                $sf_ready_array['Were_the_studies_Full_time_or_part_time__c']   = $data['TypeOfStudies'];


                if ($data['adaptability-1'] == '') {
                    $errors['adaptability-1'] = 'This field is required';
                }
                if ($data['adaptability-2'] == '') {
                    $errors['adaptability-2'] = 'This field is required';
                }
                if ($data['adaptability-3'] == '') {
                    $errors['adaptability-3'] = 'This field is required';
                }
                if ($data['adaptability-4'] == '') {
                    $errors['adaptability-4'] = 'This field is required';
                }
                if ($data['adaptability-5'] == '') {
                    $errors['adaptability-5'] = 'This field is required';
                }
                if ($data['adaptability-4'] != 'I do not have a spouse') {
                    if ($data['partnerDegree'] == '') {
                        $errors['partnerDegree'] = 'This field is required';
                    }
                    if ($data['partnerEducationYears'] == '') {
                        $errors['partnerEducationYears'] = 'This field is required';
                    }
                }
                /*if ($data['partnerEnglishReading'] == '') {
                    $errors['partnerEnglishReading'] = 'This field is required';
                }*/
                /*if ($data['partnerEnglishListening'] == '') {
                    $errors['partnerEnglishListening'] = 'This field is required';
                }*/
                /*if ($data['partnerEnglishWriting'] == '') {
                    $errors['partnerEnglishWriting'] = 'This field is required';
                }*/
                if ($data['partnerEnglishSpeaking'] == '') {
                    $errors['partnerEnglishSpeaking'] = 'This field is required';
                }
                /*if ($data['partnerFrenchReading'] == '') {
                    $errors['partnerFrenchReading'] = 'This field is required';
                }*/
                /*if ($data['partnerFrenchListening'] == '') {
                    $errors['partnerFrenchListening'] = 'This field is required';
                }*/
                /*if ($data['partnerFrenchWriting'] == '') {
                    $errors['partnerFrenchWriting'] = 'This field is required';
                }*/
                if ($data['partnerFrenchSpeaking'] == '') {
                    $errors['partnerFrenchSpeaking'] = 'This field is required';
                }
                if ($data['partnerFamily'] == '') {
                    $errors['partnerFamily'] = 'This field is required';
                }
                break;

            case 6:

                $number_of_children = $data['depends_count'];
                $new_dependents_array = array();

                for( $i = 1; $i <= $number_of_children; $i++  ) {

                    // We don't need empty dependents.
                    if( $data['depends'][$i]['firstName'] == '' || $data['depends'][$i]['lastName']=='' || $data['depends'][$i]['dob'] == '' ) continue;
                    // Create new Dependent.
                    $new_dependent = new \Inmanage\SalesForce\SalesForceDependents\SalesForceDependents( false, $case->Id, $data['depends'][$i]['dob'], $data['depends'][$i]['firstName'], $data['depends'][$i]['lastName'] );
                    $new_dependents_array[] = $new_dependent;
                }

                break;

            case 7:
                $documentsUploaded;

                // IELTS FILE
                if( $data['ielts-file'] != '' && ! $case->IELTS_Results__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['ielts-file'], 'ielts-file' );
                    if( ! $file ){
                        $errors['ielts-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['IELTS_Results__c'] = TRUE;
                }

                // Education Certificate File
                if( $data['edu-certificate-file'] != '' && ! $case->Education_Certificate__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['edu-certificate-file'], 'edu-certificate-file' );
                    if( ! $file ){
                        $errors['edu-certificate-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Education_Certificate__c'] = TRUE;
                }


                // Dependents ID File
                if ( $data['dependents-id-file'] != '' && ! $case->Dependent_s_ID_s__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['dependents-id-file'], 'dependents-id-file' );
                    if( ! $file ){
                        $errors['dependents-id-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Dependent_s_ID_s__c'] = TRUE;
                }

                // Police Check File
                if( $data['police-check-file'] != '' && ! $case->Police_Check__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['police-check-file'], 'police-check-file' );
                    if( ! $file ){
                        $errors['police-check-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Police_Check__c'] = TRUE;
                }

                // Medical Test File
                if ( $data['medical-test-file'] != '' && ! $case->Medical_Test__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['medical-test-file'], 'medical-test-file' );
                    if( ! $file ){
                        $errors['medical-test-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Medical_Test__c'] = TRUE;
                }

                //FS - Digital Photo - Applicant
                if ( $data['digital-photo-applicant-file'] != '' && ! $case->FS_Digital_photo_applicant__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-applicant-file'], 'digital-photo-applicant-file' );
                    if( ! $file ){
                        $errors['digital-photo-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Applicant";
                }

                //FS - Digital Photo - Spouse
                if ( $data['digital-photo-spouse-file'] != '' && ! $case->FS_Digital_photo_spouse__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-spouse-file'], 'digital-photo-spouse-file' );
                    if( ! $file ){
                        $errors['digital-photo-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Spouse";
                }

                //FS - Digital Photo - Child #1
                if ( $data['digital-photo-child_1-file'] != '' && ! $case->FS_Digital_photo_child_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-child_1-file'], 'digital-photo-child_1-file' );
                    if( ! $file ){
                        $errors['digital-photo-child_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_child_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Child #1";
                }

                //FS - Digital Photo - Child #2
                if ( $data['digital-photo-child_2-file'] != '' && ! $case->FS_Digital_photo_child_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-child_2-file'], 'digital-photo-child_2-file' );
                    if( ! $file ){
                        $errors['digital-photo-child_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_child_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Child #2";
                }

                //FS - Digital Photo - Child #3
                if ( $data['digital-photo-child_3-file'] != '' && ! $case->FS_Digital_photo_child_3__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-child_3-file'], 'digital-photo-child_3-file' );
                    if( ! $file ){
                        $errors['digital-photo-child_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_child_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Child #3";
                }

                //FS - Digital Photo - Child #4
                if ( $data['digital-photo-child_4-file'] != '' && ! $case->FS_Digital_photo_child_4__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-child_4-file'], 'digital-photo-child_4-file' );
                    if( ! $file ){
                        $errors['digital-photo-child_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_child_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Child #4";
                }

                //FS - Digital Photo - Child #5
                if ( $data['digital-photo-child_5-file'] != '' && ! $case->FS_Digital_photo_child_5__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['digital-photo-child_5-file'], 'digital-photo-child_5-file' );
                    if( ! $file ){
                        $errors['digital-photo-child_5-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Digital_photo_child_5__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Digital Photo - Child #5";
                }

                //FS - Birth Certificate - Applicant
                if ( $data['birth-certificate-applicant-file'] != '' && ! $case->FS_Birth_Certificate_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-applicant-file'], 'birth-certificate-applicant-file' );
                    if( ! $file ){
                        $errors['birth-certificate-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Applicant";
                }

                //FS - Birth Certificate - Spouse
                if ( $data['birth-certificate-spouse-file'] != '' && ! $case->FS_Birth_Certificate_Spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-spouse-file'], 'birth-certificate-spouse-file' );
                    if( ! $file ){
                        $errors['birth-certificate-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Spouse";
                }

                //FS - Birth Certificate - Child #1
                if ( $data['birth-certificate-child_1-file'] != '' && ! $case->FS_Birth_Certificate_Child_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-child_1-file'], 'birth-certificate-child_1-file' );
                    if( ! $file ){
                        $errors['birth-certificate-child_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Child_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Child #1";
                }

                //FS - Birth Certificate - Child #2
                if ( $data['birth-certificate-child_2-file'] != '' && ! $case->FS_Birth_Certificate_Child_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-child_2-file'], 'birth-certificate-child_2-file' );
                    if( ! $file ){
                        $errors['birth-certificate-child_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Child_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Child #2";
                }

                //FS - Birth Certificate - Child #3
                if ( $data['birth-certificate-child_3-file'] != '' && ! $case->FS_Birth_Certificate_Child_3__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-child_3-file'], 'birth-certificate-child_3-file' );
                    if( ! $file ){
                        $errors['birth-certificate-child_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Child_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Child #3";
                }

                //FS - Birth Certificate - Child #4
                if ( $data['birth-certificate-child_4-file'] != '' && ! $case->FS_Birth_Certificate_Child_4__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-child_4-file'], 'birth-certificate-child_4-file' );
                    if( ! $file ){
                        $errors['birth-certificate-child_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Child_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Child #4";
                }

                //FS - Birth Certificate - Child #5
                if ( $data['birth-certificate-child_5-file'] != '' && ! $case->FS_Birth_Certificate_Child_5__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['birth-certificate-child_5-file'], 'birth-certificate-child_5-file' );
                    if( ! $file ){
                        $errors['birth-certificate-child_5-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Birth_Certificate_Child_5__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Birth Certificate - Child #5";
                }

                //FS - IELTS Test - Applicant
                if ( $data['ielts-test-applicant-file'] != '' && ! $case->FS_IELTS_Test_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['ielts-test-applicant-file'], 'ielts-test-applicant-file' );
                    if( ! $file ){
                        $errors['ielts-test-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_IELTS_Test_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>IELTS Test - Applicant";
                }

                //FS - IELTS Test - Spouse
                if ( $data['ielts-test-spouse-file'] != '' && ! $case->FS_IELTS_Test_Spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['ielts-test-spouse-file'], 'ielts-test-spouse-file' );
                    if( ! $file ){
                        $errors['ielts-test-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_IELTS_Test_Spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>IELTS Test - Spouse";
                }

                //FS - Employment reference letters - Applicant
                if ( $data['employment-reference-applicant-file'] != '' && ! $case->FS_Employment_reference_letters_applican__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-applicant-file'], 'employment-reference-applicant-file' );
                    if( ! $file ){
                        $errors['employment-reference-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_applican__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters - Applicant";
                }

                //FS - Employment reference letters - Spouse
                if ( $data['employment-reference-spouse-file'] != '' && ! $case->FS_Employment_reference_letters_spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-spouse-file'], 'employment-reference-spouse-file' );
                    if( ! $file ){
                        $errors['employment-reference-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters - Spouse";
                }

                //FS - Education diploma - Applicant
                if ( $data['education-diploma-applicant-file'] != '' && ! $case->FS_Education_diploma_applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['education-diploma-applicant-file'], 'education-diploma-applicant-file' );
                    if( ! $file ){
                        $errors['education-diploma-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Education_diploma_applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Education diploma - Applicant";
                }

                //FS - Education diploma - Spouse
                if ( $data['education-diploma-spouse-file'] != '' && ! $case->FS_Education_diploma_spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['education-diploma-spouse-file'], 'education-diploma-spouse-file' );
                    if( ! $file ){
                        $errors['education-diploma-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Education_diploma_spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Education diploma - Spouse";
                }

                //FS - WES - Applicant
                if ( $data['wes-applicant-file'] != '' && ! $case->FS_WES_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['wes-applicant-file'], 'wes-applicant-file' );
                    if( ! $file ){
                        $errors['wes-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_WES_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>WES - Applicant";
                }

                //FS - WES - Spouse
                if ( $data['wes-spouse-file'] != '' && ! $case->FS_WES_Spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['wes-spouse-file'], 'wes-spouse-file' );
                    if( ! $file ){
                        $errors['wes-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_WES_Spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>WES - Spouse";
                }

                //FS - Marriage Certificate - Applicant
                if ( $data['marriage-certificate-file'] != '' && ! $case->FS_Marriage_Certificate_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['marriage-certificate-file'], 'marriage-certificate-file' );
                    if( ! $file ){
                        $errors['marriage-certificate-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Marriage_Certificate_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Marriage Certificate - Applicant";
                }

                //FS - Common Law declaration - Applicant
                if ( $data['common-law-declaration-file'] != '' && ! $case->FS_Common_Law_declaration__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['common-law-declaration-file'], 'common-law-declaration-file' );
                    if( ! $file ){
                        $errors['common-law-declaration-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Common_Law_declaration__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Common Law declaration - Applicant";
                }

                //FS - Divorce Certificate - Applicant
                if ( $data['divorce-certificate-applicant-file'] != '' && ! $case->FS_Divorce_Certificate_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['divorce-certificate-applicant-file'], 'divorce-certificate-applicant-file' );
                    if( ! $file ){
                        $errors['divorce-certificate-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Divorce_Certificate_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Divorce Certificate - Applicant";
                }

                //FS - Passport photo - Applicant
                if ( $data['passport-photo-applicant-file'] != '' && ! $case->FS_Passport_photo_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-applicant-file'], 'passport-photo-applicant-file' );
                    if( ! $file ){
                        $errors['passport-photo-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Applicant";
                }

                //FS - Passport photo - Spouse
                if ( $data['passport-photo-spouse-file'] != '' && ! $case->FS_Passport_photo_Spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-spouse-file'], 'passport-photo-spouse-file' );
                    if( ! $file ){
                        $errors['passport-photo-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Spouse";
                }

                //FS - Passport photo - Child #1
                if ( $data['passport-photo-child_1-file'] != '' && ! $case->FS_Passport_photo_Child_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-child_1-file'], 'passport-photo-child_1-file' );
                    if( ! $file ){
                        $errors['passport-photo-child_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Child_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Child #1";
                }

                //FS - Passport photo - Child #2
                if ( $data['passport-photo-child_2-file'] != '' && ! $case->FS_Passport_photo_Child_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-child_2-file'], 'passport-photo-child_2-file' );
                    if( ! $file ){
                        $errors['passport-photo-child_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Child_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Child #2";
                }

                //FS - Passport photo - Child #3
                if ( $data['passport-photo-child_3-file'] != '' && ! $case->FS_Passport_photo_Child_3__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-child_3-file'], 'passport-photo-child_3-file' );
                    if( ! $file ){
                        $errors['passport-photo-child_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Child_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Child #3";
                }

                //FS - Passport photo - Child #4
                if ( $data['passport-photo-child_4-file'] != '' && ! $case->FS_Passport_photo_Child_4__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-child_4-file'], 'passport-photo-child_4-file' );
                    if( ! $file ){
                        $errors['passport-photo-child_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Child_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Child #4";
                }

                //FS - Passport photo - Child #5
                if ( $data['passport-photo-child_5-file'] != '' && ! $case->FS_Passport_photo_Child_5__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-photo-child_5-file'], 'passport-photo-child_5-file' );
                    if( ! $file ){
                        $errors['passport-photo-child_5-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_photo_Child_5__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport photo - Child #5";
                }

                //FS - Passport - All pages - Applicant
                if ( $data['passport-all-pages-applicant-file'] != '' && ! $case->FS_Passport_All_pages_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-applicant-file'], 'passport-all-pages-applicant-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Applicant";
                }

                //FS - Passport - All pages - Spouse
                if ( $data['passport-all-pages-spouse-file'] != '' && ! $case->FS_Passport_All_pages_Spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-spouse-file'], 'passport-all-pages-spouse-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Spouse";
                }

                //FS - Passport - All pages - Child #1
                if ( $data['passport-all-pages-child_1-file'] != '' && ! $case->FS_Passport_All_pages_Child_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-child_1-file'], 'passport-all-pages-child_1-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-child_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Child_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Child #1";
                }

                //FS - Passport - All pages - Child #2
                if ( $data['passport-all-pages-child_2-file'] != '' && ! $case->FS_Passport_All_pages_Child_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-child_2-file'], 'passport-all-pages-child_2-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-child_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Child_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Child #2";
                }

                //FS - Passport - All pages - Child #3
                if ( $data['passport-all-pages-child_3-file'] != '' && ! $case->FS_Passport_All_pages_Child_3__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-child_3-file'], 'passport-all-pages-child_3-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-child_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Child_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Child #3";
                }

                //FS - Passport - All pages - Child #4
                if ( $data['passport-all-pages-child_4-file'] != '' && ! $case->FS_Passport_All_pages_Child_4__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-child_4-file'], 'passport-all-pages-child_4-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-child_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Child_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Child #4";
                }

                //FS - Passport - All pages - Child #5
                if ( $data['passport-all-pages-child_5-file'] != '' && ! $case->FS_Passport_All_pages_Child_5__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['passport-all-pages-child_5-file'], 'passport-all-pages-child_5-file' );
                    if( ! $file ){
                        $errors['passport-all-pages-child_5-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Passport_All_pages_Child_5__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Passport - All pages - Child #5";
                }

                //FS - Previous and cancelled passport - Applicant
                if ( $data['previous-passport-applicant-file'] != '' && ! $case->FS_Previous_Passport_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-applicant-file'], 'previous-passport-applicant-file' );
                    if( ! $file ){
                        $errors['previous-passport-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Applicant";
                }

                //FS - Previous and cancelled passport - Spouse
                if ( $data['previous-passport-spouse-file'] != '' && ! $case->FS_Previous_Passport_Spouse__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-spouse-file'], 'previous-passport-spouse-file' );
                    if( ! $file ){
                        $errors['previous-passport-spouse-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Spouse__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Spouse";
                }

                //FS - Previous and cancelled passport - Child #1
                if ( $data['previous-passport-child_1-file'] != '' && ! $case->FS_Previous_Passport_Child_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-child_1-file'], 'previous-passport-child_1-file' );
                    if( ! $file ){
                        $errors['previous-passport-child_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Child_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Child #1";
                }

                //FS - Previous and cancelled passport - Child #2
                if ( $data['previous-passport-child_2-file'] != '' && ! $case->FS_Previous_Passport_Child_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-child_2-file'], 'previous-passport-child_2-file' );
                    if( ! $file ){
                        $errors['previous-passport-child_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Child_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Child #2";
                }

                //FS - Previous and cancelled passport - Child #3
                if ( $data['previous-passport-child_3-file'] != '' && ! $case->FS_Previous_Passport_Child_3__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-child_3-file'], 'previous-passport-child_3-file' );
                    if( ! $file ){
                        $errors['previous-passport-child_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Child_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Child #3";
                }

                //FS - Previous and cancelled passport - Child #4
                if ( $data['previous-passport-child_4-file'] != '' && ! $case->FS_Previous_Passport_Child_4__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-child_4-file'], 'previous-passport-child_4-file' );
                    if( ! $file ){
                        $errors['previous-passport-child_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Child_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Child #4";
                }

                //FS - Previous and cancelled passport - Child #5
                if ( $data['previous-passport-child_5-file'] != '' && ! $case->FS_Previous_Passport_Child_5__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['previous-passport-child_5-file'], 'previous-passport-child_5-file' );
                    if( ! $file ){
                        $errors['previous-passport-child_5-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Previous_Passport_Child_5__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Previous and cancelled passport - Child #5";
                }

                //FS - Proof of ownership of a propety & appraisal
                if ( $data['proof-of-ownership-file'] != '' && ! $case->FS_Proof_of_ownership__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['proof-of-ownership-file'], 'proof-of-ownership-file' );
                    if( ! $file ){
                        $errors['proof-of-ownership-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Proof_of_ownership__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Proof of ownership of a propety & appraisal";
                }

                //FS - Personal bank statements
                if ( $data['personal-bank-statements-file'] != '' && ! $case->FS_Personal_bank_statements__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['personal-bank-statements-file'], 'personal-bank-statements-file' );
                    if( ! $file ){
                        $errors['personal-bank-statements-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Personal_bank_statements__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Personal bank statements";
                }

                //FS - Personal bank statements - From
                $sf_ready_array['FS_Personal_bank_statements_From__c'] = $data['pbs-date-from'];

                //FS - Personal bank statements - To
                $sf_ready_array['FS_Personal_bank_statements_To__c'] = $data['pbs-date-to'];

                //FS - Business bank statements
                if ( $data['business-bank-statements-file'] != '' && ! $case->FS_Business_bank_statements__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['business-bank-statements-file'], 'business-bank-statements-file' );
                    if( ! $file ){
                        $errors['business-bank-statements-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Business_bank_statements__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Business bank statements";
                }

                //FS - Personal bank statements - From
                $sf_ready_array['FS_Business_bank_statements_From__c'] = $data['bbs-date-from'];

                //FS - Personal bank statements - To
                $sf_ready_array['FS_Business_bank_statements_To__c'] = $data['bbs-date-to'];

                //FS - Copy of certificate of incorporation
                if ( $data['certificate-of-incorporation-file'] != '' && ! $case->FS_Certificate_of_incorporation__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['certificate-of-incorporation-file'], 'certificate-of-incorporation-file' );
                    if( ! $file ){
                        $errors['certificate-of-incorporation-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Certificate_of_incorporation__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Copy of certificate of incorporation";
                }

                //FS Appraisal assessment
                if ( $data['appraisal-assessment-file'] != '' && ! $case->FS_Appraisal_assessment__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['appraisal-assessment-file'], 'appraisal-assessment-file' );
                    if( ! $file ){
                        $errors['appraisal-assessment-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Appraisal_assessment__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Appraisal assessment";
                }

                //FS Company’s  tax return declaration #1
                if ( $data['ctd_1-file'] != '' && ! $case->FS_Company_s_tax_return_declaration_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['ctd_1-file'], 'ctd_1-file' );
                    if( ! $file ){
                        $errors['ctd_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Company_s_tax_return_declaration_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Company’s  tax return declaration #1";
                }

                //FS Company’s  tax return declaration - Year #1
                $sf_ready_array['FS_Company_s_tax_return_declaration_1_Y__c'] = $data['ctd_1_year'];

                //FS Company’s  tax return declaration #2
                if ( $data['ctd_2-file'] != '' && ! $case->FS_Company_s_tax_return_declaration_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['ctd_2-file'], 'ctd_2-file' );
                    if( ! $file ){
                        $errors['ctd_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Company_s_tax_return_declaration_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Company’s  tax return declaration #2";
                }

                //FS Company’s  tax return declaration - Year #2
                $sf_ready_array['FS_Company_s_tax_return_declaration_2_Y__c'] = $data['ctd_2_year'];

                //FS FS Business license
                if ( $data['business-license-file'] != '' && ! $case->FS_Business_license__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['business-license-file'], 'business-license-file' );
                    if( ! $file ){
                        $errors['business-license-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Business_license__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Company’s  tax return declaration - Year #2";
                }

                //FS Copy of any Company certification or membership
                if ( $data['company-certification-file'] != '' && ! $case->FS_Copy_of_any_Company_certification__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['company-certification-file'], 'company-certification-file' );
                    if( ! $file ){
                        $errors['company-certification-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Copy_of_any_Company_certification__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Copy of any Company certification or membership";
                }

                //FS Signing authority from bank
                if ( $data['signing-authority-bank-file'] != '' && ! $case->FS_Signing_authority_from_bank__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['signing-authority-bank-file'], 'signing-authority-bank-file' );
                    if( ! $file ){
                        $errors['signing-authority-bank-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Signing_authority_from_bank__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Signing authority from bank";
                }

                //FS List services provided by the company
                if ( $data['list-services-provided-file'] != '' && ! $case->FS_List_services_provided_by_the_company__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['list-services-provided-file'], 'list-services-provided-file' );
                    if( ! $file ){
                        $errors['list-services-provided-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_List_services_provided_by_the_company__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>List services provided by the company";
                }

                //FS Contract/s with clients
                if ( $data['contracts-with-clients-file'] != '' && ! $case->FS_Contract_s_with_clients__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['contracts-with-clients-file'], 'contracts-with-clients-file' );
                    if( ! $file ){
                        $errors['contracts-with-clients-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Contract_s_with_clients__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Contract/s with clients";
                }

                //FS Bank Statement month #1
                if ( $data['bank-statement-month_1-file'] != '' && ! $case->FS_Bank_Statement_month_1__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['bank-statement-month_1-file'], 'bank-statement-month_1-file' );
                    if( ! $file ){
                        $errors['bank-statement-month_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Bank_Statement_month_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Bank Statement month #1";
                }

                //FS Bank Statement month #1 - Month
                $sf_ready_array['FS_Bank_Statement_month_1_Month__c'] = $data['bank-statement-month_1-month'];

                //FS Bank Statement month #1 - Year
                $sf_ready_array['FS_Bank_Statement_month_1_Year__c'] = $data['bank-statement-month_1-year'];

                //FS Bank Statement month #2
                if ( $data['bank-statement-month_2-file'] != '' && ! $case->FS_Bank_Statement_month_2__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['bank-statement-month_2-file'], 'bank-statement-month_2-file' );
                    if( ! $file ){
                        $errors['bank-statement-month_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Bank_Statement_month_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Bank Statement month #2";
                }

                //FS Bank Statement month #2 - Month
                $sf_ready_array['FS_Bank_Statement_month_2_Month__c'] = $data['bank-statement-month_2-month'];

                //FS Bank Statement month #2 - Year
                $sf_ready_array['FS_Bank_Statement_month_2_Year__c'] = $data['bank-statement-month_2-year'];

                //FS Bank Statement month #3
                if ( $data['bank-statement-month_3-file'] != '' && ! $case->FS_Bank_Statement_month_3__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['bank-statement-month_3-file'], 'bank-statement-month_3-file' );
                    if( ! $file ){
                        $errors['bank-statement-month_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Bank_Statement_month_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Bank Statement month #3";
                }

                //FS Bank Statement month #3 - Month
                $sf_ready_array['FS_Bank_Statement_month_3_Month__c'] = $data['bank-statement-month_3-month'];

                //FS Bank Statement month #3 - Year
                $sf_ready_array['FS_Bank_Statement_month_3_Year__c'] = $data['bank-statement-month_3-year'];

                //FS Bank Statement month #4
                if ( $data['bank-statement-month_4-file'] != '' && ! $case->FS_Bank_Statement_month_4__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['bank-statement-month_4-file'], 'bank-statement-month_4-file' );
                    if( ! $file ){
                        $errors['bank-statement-month_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Bank_Statement_month_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Bank Statement month #4";
                }

                //FS Bank Statement month #4 - Month
                $sf_ready_array['FS_Bank_Statement_month_4_Month__c'] = $data['bank-statement-month_4-month'];

                //FS Bank Statement month #4 - Year
                $sf_ready_array['FS_Bank_Statement_month_4_Year__c'] = $data['bank-statement-month_4-year'];

                //FS Financial support letter
                if ( $data['financial-support-letter-file'] != '' && ! $case->FS_Financial_support_letter__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['financial-support-letter-file'], 'financial-support-letter-file' );
                    if( ! $file ){
                        $errors['financial-support-letter-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Financial_support_letter__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Financial support letter";
                }

                //FS Copy of passports
                if ( $data['copy-of-passports-file'] != '' && ! $case->FS_Copy_of_passports__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['copy-of-passports-file'], 'copy-of-passports-file' );
                    if( ! $file ){
                        $errors['copy-of-passports-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Copy_of_passports__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Copy of passports";
                }

                //FS Letter of Acceptance
                if ( $data['letter-of-acceptance-file'] != '' && ! $case->FS_Letter_of_Acceptance__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['letter-of-acceptance-file'], 'letter-of-acceptance-file' );
                    if( ! $file ){
                        $errors['letter-of-acceptance-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Letter_of_Acceptance__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Letter of Acceptance";
                }

                //FS Payment Receipt from School
                if ( $data['payment-receipt-fc-file'] != '' && ! $case->FS_Payment_Receipt_from_School__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['payment-receipt-fc-file'], 'payment-receipt-fc-file' );
                    if( ! $file ){
                        $errors['payment-receipt-fc-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Payment_Receipt_from_School__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Payment Receipt from School";
                }

                //FS Letter of motives
                if ( $data['letter-of-motives-file'] != '' && ! $case->FS_Letter_of_motives__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['letter-of-motives-file'], 'letter-of-motives-file' );
                    if( ! $file ){
                        $errors['letter-of-motives-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Letter_of_motives__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Letter of motives";
                }

                //FS Flight Ticket Reservation
                if ( $data['flight-ticket-reservation-file'] != '' && ! $case->FS_Flight_Ticket_Reservation__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['flight-ticket-reservation-file'], 'flight-ticket-reservation-file' );
                    if( ! $file ){
                        $errors['flight-ticket-reservation-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Flight_Ticket_Reservation__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Flight Ticket Reservation";
                }

                //FS Proof of properties ownership
                if ( $data['Proof-of-properties-ownership-file'] != '' && ! $case->FS_Proof_of_properties_ownership__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['Proof-of-properties-ownership-file'], 'Proof-of-properties-ownership-file' );
                    if( ! $file ){
                        $errors['Proof-of-properties-ownership-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Proof_of_properties_ownership__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Proof of properties ownership";
                }

                //FS Criminal record Clearance
                if ( $data['criminal-record-clearance-file'] != '' && ! $case->FS_Criminal_record_Clearance__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['criminal-record-clearance-file'], 'criminal-record-clearance-file' );
                    if( ! $file ){
                        $errors['criminal-record-clearance-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Criminal_record_Clearance__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Criminal record Clearance";
                }

                //FS CV - Applicant
                if ( $data['cv-applicant-file'] != '' && ! $case->FS_CV_Applicant__c) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['cv-applicant-file'], 'cv-applicant-file' );
                    if( ! $file ){
                        $errors['cv-applicant-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_CV_Applicant__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>CV - Applicant";
                }

                //FS Medicals
                if ( $data['medicals-file'] != '' && ! $case->FS_Medicals__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['medicals-file'], 'medicals-file' );
                    if( ! $file ){
                        $errors['medicals-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Medicals__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Medicals";
                }

                //FS Other File #1
                if ( $data['other-file_1-file'] != '' && ! $case->FS_Other_File_1__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['other-file_1-file'], 'other-file_1-file' );
                    if( ! $file ){
                        $errors['other-file_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Other_File_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Other File #1";
                }

                //FS Other File #2
                if ( $data['other-file_2-file'] != '' && ! $case->FS_Other_File_2__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['other-file_2-file'], 'other-file_2-file' );
                    if( ! $file ){
                        $errors['other-file_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Other_File_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Other File #2";
                }

                //FS Other File #3
                if ( $data['other-file_3-file'] != '' && ! $case->FS_Other_File_3__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['other-file_3-file'], 'other-file_3-file' );
                    if( ! $file ){
                        $errors['other-file_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Other_File_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Other File #3";
                }

                //FS Other File #4
                if ( $data['other-file_4-file'] != '' && ! $case->FS_Other_File_4__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['other-file_4-file'], 'other-file_4-file' );
                    if( ! $file ){
                        $errors['other-file_4-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Other_File_4__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Other File #4";
                }

                //FS Other File #5
                if ( $data['other-file_5-file'] != '' && ! $case->FS_Other_File_5__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['other-file_5-file'], 'other-file_5-file' );
                    if( ! $file ){
                        $errors['other-file_5-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Other_File_5__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Other File #5";
                }

                //FS Employment reference letters applicant job #1
                if ( $data['employment-reference-applicant_job_1-file'] != '' && ! $case->FS_Employment_reference_letters_a_job_1__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-applicant_job_1-file'], 'employment-reference-applicant_job_1-file' );
                    if( ! $file ){
                        $errors['employment-reference-applicant_job_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_a_job_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters applicant job #1";
                }


                //FS Employment reference letters applicant job #2
                if ( $data['employment-reference-applicant_job_2-file'] != '' && ! $case->FS_Employment_reference_letters_a_job_2__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-applicant_job_2-file'], 'employment-reference-applicant_job_2-file' );
                    if( ! $file ){
                        $errors['employment-reference-applicant_job_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_a_job_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters applicant job #2";
                }

                //FS Employment reference letters applicant job #3
                if ( $data['employment-reference-applicant_job_3-file'] != '' && ! $case->FS_Employment_reference_letters_a_job_3__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-applicant_job_3-file'], 'employment-reference-applicant_job_3-file' );
                    if( ! $file ){
                        $errors['employment-reference-applicant_job_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_a_job_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters applicant job #3";
                }

                //FS Employment reference letters spouse job #1
                if ( $data['employment-reference-spouse_job_1-file'] != '' && ! $case->FS_Employment_reference_letters_s_job_1__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-spouse_job_1-file'], 'employment-reference-spouse_job_1-file' );
                    if( ! $file ){
                        $errors['employment-reference-spouse_job_1-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_s_job_1__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters spouse job #1";
                }

                //FS Employment reference letters spouse job #2
                if ( $data['employment-reference-spouse_job_2-file'] != '' && ! $case->FS_Employment_reference_letters_s_job_2__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-spouse_job_2-file'], 'employment-reference-spouse_job_2-file' );
                    if( ! $file ){
                        $errors['employment-reference-spouse_job_2-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_s_job_2__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters spouse job #2";
                }

                //FS Employment reference letters spouse job #3
                if ( $data['employment-reference-spouse_job_3-file'] != '' && ! $case->FS_Employment_reference_letters_s_job_3__c){

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['employment-reference-spouse_job_3-file'], 'employment-reference-spouse_job_3-file' );
                    if( ! $file ){
                        $errors['employment-reference-spouse_job_3-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['FS_Employment_reference_letters_s_job_3__c'] = TRUE;

                    if ($documentsUploaded){
                        $documentsUploaded .= ", ";
                    }
                    $documentsUploaded .= "<br/>Employment reference letters spouse job #3";
                }

                /*Send Mail To Support*/

                $to = "sarielh90@gmail.com, legal@uiscanada.com, support@uiscanada.com";
                $subject = "Name : " .$case->First_Name__c. " " .$case->Last_Name__c. "-CaseNumber: " .$case->CaseNumber;
                $txt = "<div style='text-align:left;direction:ltr;'><b>Documents :</b> " .$documentsUploaded. "</div>";
                $headers = "From: AdminUIS@uiscanada.com\r\n";
                $headers .= "Reply-To: AdminUIS@uiscanada.com\r\n";
                $headers .= "CC: sarielh@uiscanada.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                mail($to,$subject,$txt,$headers);

                break;

            case 8:
                // Retainer Agreement File
                if ( $data['retainer-agreement-file'] != '' && ! $case->Retainer_Agreement__c ) {

                    $file = uis_save_file( $tmp_files_dir_path, $_POST['retainer-agreement-file'], 'retainer-agreement-file' );
                    if( ! $file ){
                        $errors['retainer-agreement-file'] = 'File format is not supported.';
                        break;
                    }

                    $files_to_upload[] = $file;
                    $sf_ready_array['Retainer_Agreement__c'] = TRUE;
                }
                break;
        }
    }

    if(empty($errors)) {

//        update_user_meta(get_current_user_id(), 'tab_'.$tab, serialize($data));


//        new SalesForceQueryResponse(SalesForceQuery::get_dependants($case->Id));

        // UPDATE CASE DEPENDENTS
        // ========================================================
        // If there are dependents to update then do so
        // 1. Delete all existing
        // 2. Insert all new Dependents.
        // Explanation: There are no Dependents Ids so we can't
        // really know which to update. The solution is to remove
        // existing ones and insert new ones.

        if( isset( $new_dependents_array ) && ! empty( $new_dependents_array ) ) {

            \Inmanage\SalesForce\SalesForceDependents\SalesForceDependents::delete_all_from_case( $case->Id );

            foreach( $new_dependents_array as $dependent ) {

                $dependent->insert();
            }
        }
        // ========================================================




        // UPLOAD FILES
        // ========================================================
        // If there are files to upload then upload them.
        // If not then skip this step
        foreach( $files_to_upload as $file ){

            $case->upload( $file );
        }
        // ========================================================





        // UPDATE CASE DATA
        // ========================================================
        $case->update( $sf_ready_array );
        // ========================================================




        wp_send_json(array(
            'result' => true
        ));

    } else {
        wp_send_json(array(
            'result' => false,
            'errors' => $errors
        ));
    }

}
add_action( 'admin_post_nopriv_application_save_tab', 'application_save_tab' );
add_action( 'admin_post_application_save_tab', 'application_save_tab' );


function uis_save_file( $path, $the_base64, $file_name_prefix ) {

    $datatype_extensions = array(
        'data:application/pdf' => '.pdf',
        'data:application/vnd.openxmlformats-officedocument.wordprocessingml.document' => '.docx',
        'data:text/plain'       => '.txt',
        'data:image/gif'        => '.gif',
        'data:image/GIF'        => '.gif',
        'data:image/png'        => '.png',
        'data:image/PNG'        => '.png',
        'data:image/jpeg'       => '.jpg',
        'data:image/jpg'        => '.jpg',
        'data:image/JPEG'       => '.jpg',
        'data:image/JPG'        => '.jpg'
    );

    $tmp_file_data = explode( ';', $the_base64 );
    $file_ext = $tmp_file_data[0];
    $file_base64 = $tmp_file_data[1];
    $tmp_file_data = explode( ',', $file_base64 );
    $file_base64_code_prefix = $tmp_file_data[0];
    $file_base64_code = $tmp_file_data[1];

    if( isset( $datatype_extensions[$file_ext] ) )
        $extension = $datatype_extensions[$file_ext];
    else return false;


    $file = base64_decode( $file_base64_code );

    $file_path = $path . $file_name_prefix . '-' . time() . $extension;
    if( file_put_contents( $file_path, $file ) ) return $file_path;
}

function convert_to_salesforce_date_format($date) {
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