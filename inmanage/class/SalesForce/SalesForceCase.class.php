<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceCase;
use Inmanage\SalesForce\HttpRequestManager;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceCase extends SalesForceObject
{
    public  $baseUriArr = array(
        'sobjects',
        'Case',
        'Id',
        '{Id}'
    );

    public $Id;
    public $attributes = array( 'type' => '', 'url' => '' );
    public $IsDeleted;
    public $CaseNumber;
    public $ContactId;
    public $AccountId;
    public $ParentId;
    public $SuppliedName;
    public $SuppliedEmail;
    public $SuppliedPhone;
    public $SuppliedCompany;
    public $Type;
    public $Status;
    public $Reason;
    public $Origin;
    public $Subject;
    public $Priority;
    public $Description;
    public $IsClosed;
    public $ClosedDate;
    public $IsEscalated;
    public $CurrencyIsoCode;
    public $OwnerId;
    public $CreatedDate;
    public $CreatedById;
    public $LastModifiedDate;
    public $LastModifiedById;
    public $SystemModstamp;
    public $ContactPhone;
    public $ContactMobile;
    public $ContactEmail;
    public $ContactFax;
    public $LastViewedDate;
    public $LastReferencedDate;
    public $First_Name__c;
    public $Middle_Name__c;
    public $Last_Name__c;
    public $Gender__c;
    public $Email_Address__c;
    public $Another_Email_Address__c;
    public $Phone_Number__c;
    public $Country_of_Residence__c;
    public $Street__c;
    public $City__c;
    public $Zip_Code_Postal_Code__c;
    public $Date_of_Birth__c;
    public $Marital_Status__c;
    public $Number_of_Dependent_Children_Under_22__c;
    public $Criminal_Offences__c;
    public $Job_3_Description__c;
    public $Job_3_Years_of_experience__c;
    public $Field_of_Study__c;
    public $Country_of_Study__c;
    public $Total_Years_of_Education_Since_Grade_1__c;
    public $Job_1_Description__c;
    public $Evaluation_Status__c;
    public $Nationality__c;
    public $Job_2_Description__c;
    public $Total_Years_of_Spouse_Education__c;
    public $Number_of_Dependent_Children_Over_22__c;
    public $Optimization_Status__c;
    public $Submission_Status__c;
    public $Second_Phone_Number__c;
    public $Do_you_have_another_citizenship__c;
    public $What_is_your_status_in_your_current_coun__c;
    public $Current_Country_of_Residence_Since__c;
    public $Do_you_have_a_Spouse__c;
    public $another_citizenship__c;
    public $Do_you_have_any_dependent_children__c;
    public $Health_Problems__c;
    public $What_is_your_highest_Level_of_education__c;
    public $Program_Duration__c;
    public $Have_you_completed_this_program__c;
    public $How_Many_Jobs_Did_You_Have__c;
    public $How_Many_Jobs_Did_Your_Spouse_Have__c;
    public $Job_1_Years_of_experience__c;
    public $Job_2_Years_of_experience__c;
    public $Do_You_have_a_Valid_Candidan__c;
    public $Do_You_have_a_Job_Offer_From_a_Canadidan__c;
    public $At_least_1_care_giving_experience__c;
    public $What_is_your_estimated_net_worth_USD__c;
    public $How_Much_Money_Will_You_Have_in_Canada__c;
    public $What_is_Your_Listening_Level_of_English__c;
    public $What_is_your_Listening_Level_of_French__c;
    public $What_is_your_overall_level_of_English__c;
    public $What_is_Your_Overall_Level_of_French__c;
    public $What_is_Your_Reading_Level_of_English__c;
    public $What_is_your_Reading_level_of_French__c;
    public $What_is_Your_Speaking_Level_of_English__c;
    public $What_is_Your_Speaking_Level_of_French__c;
    public $What_is_Your_Writing_Level_of_English__c;
    public $What_is_Your_Writing_Level_of_French__c;
    //public $What_is_your_spouse_French_Reading_Level__c;
    //public $What_is_your_spouse_French_Writing_Level__c;
    public $What_Is_Your_Spouse_Level_of_English__c;
    public $What_is_your_spouse_Level_of_French__c;
    public $Have_at_Least_1_Year_Canadian_Work__c;
    public $Did_You_or_Your_Spouse_Study_in_Canada__c;
    public $Has_your_spouse__c;
    public $Spouse_done_education_after_High_School__c;
    public $Spouse_Highest_Degree__c;
    public $Completed_2_Years_of_PS_Education__c;
    //public $Spouse_English_Listening_Level__c;
    //public $Spouse_English_Reading_Level__c;
    public $Spouse_English_Speaking_Level__c;
    //public $Spouse_English_Writing_Level__c;
    //public $Spouse_French_Listening_Level__c;
    public $Spouse_French_Speaking_Level__c;
    public $Family_Members_Living_in_Canada__c;
    public $Do_you_own_a_business__c;
    public $Please_Describe_your_business_activities__c;
    public $When_was_the_business_established__c;
    public $How_many_employees_are_currently_employe__c;

    public $Passport_Copy__c;
    public $Utility_Bill__c;
    public $CV_Resume__c;
    public $IELTS_Results__c;
    public $Education_Certificate__c;
    public $Dependent_s_ID_s__c;
    public $Police_Check__c;
    public $Medical_Test__c;
    public $Retainer_Agreement__c;

    // Sariel - New Fields
    public $Field_of_Study_2__c;
    public $Country_of_Study_2__c;
    public $Program_Duration_2__c;
    public $Job_1_Started__c;
    public $Job_2_Started__c;
    public $Job_3_Started__c;
    public $Job_1_Finish__c;
    public $Job_2_Finish__c;
    public $Job_3_Finish__c;
    public $Job_1_full_time_position__c;
    public $Job_2_full_time_position__c;
    public $Job_3_full_time_position__c;
    public $Job_1_30_hours_a_week__c;
    public $Job_2_30_hours_a_week__c;
    public $Job_3_30_hours_a_week__c;
    public $What_is_your_estimated__c;
    public $What_is_your_current_cash_flow__c;
    public $Is_your_relative_18_years_old_of_age_or__c;
    public $Does_your_relative_or_your_spouse_s_rel__c;
    public $Canadian_job_description__c;
    public $Visa_Type__c;
    public $FS_Digital_photo_applicant__c;
    public $FS_Digital_photo_spouse__c;
    public $FS_Digital_photo_child_1__c;
    public $FS_Digital_photo_child_2__c;
    public $FS_Digital_photo_child_3__c;
    public $FS_Digital_photo_child_4__c;
    public $FS_Digital_photo_child_5__c;
    public $FS_Birth_Certificate_Applicant__c;
    public $FS_Birth_Certificate_Spouse__c;
    public $FS_Birth_Certificate_Child_1__c;
    public $FS_Birth_Certificate_Child_2__c;
    public $FS_Birth_Certificate_Child_3__c;
    public $FS_Birth_Certificate_Child_4__c;
    public $FS_Birth_Certificate_Child_5__c;
    public $FS_IELTS_Test_Applicant__c;
    public $FS_IELTS_Test_Spouse__c;
    public $FS_Employment_reference_letters_applican__c;
    public $FS_Employment_reference_letters_spouse__c;
    public $FS_Education_diploma_applicant__c;
    public $FS_Education_diploma_spouse__c;
    public $FS_WES_Applicant__c;
    public $FS_WES_Spouse__c;
    public $FS_Marriage_Certificate_Applicant__c;
    public $FS_Common_Law_declaration__c;
    public $FS_Divorce_Certificate_Applicant__c;
    public $FS_Passport_photo_Applicant__c;
    public $FS_Passport_photo_Spouse__c;
    public $FS_Passport_photo_Child_1__c;
    public $FS_Passport_photo_Child_2__c;
    public $FS_Passport_photo_Child_3__c;
    public $FS_Passport_photo_Child_4__c;
    public $FS_Passport_photo_Child_5__c;
    public $FS_Passport_All_pages_Applicant__c;
    public $FS_Passport_All_pages_Spouse__c;
    public $FS_Passport_All_pages_Child_1__c;
    public $FS_Passport_All_pages_Child_2__c;
    public $FS_Passport_All_pages_Child_3__c;
    public $FS_Passport_All_pages_Child_4__c;
    public $FS_Passport_All_pages_Child_5__c;
    public $FS_Previous_Passport_Applicant__c;
    public $FS_Previous_Passport_Spouse__c;
    public $FS_Previous_Passport_Child_1__c;
    public $FS_Previous_Passport_Child_2__c;
    public $FS_Previous_Passport_Child_3__c;
    public $FS_Previous_Passport_Child_4__c;
    public $FS_Previous_Passport_Child_5__c;
    public $FS_Proof_of_ownership__c;
    public $FS_Personal_bank_statements__c;
    public $FS_Personal_bank_statements_From__c;
    public $FS_Personal_bank_statements_To__c;
    public $FS_Business_bank_statements__c;
    public $FS_Business_bank_statements_From__c;
    public $FS_Business_bank_statements_To__c;
    public $FS_Certificate_of_incorporation__c;
    public $FS_Appraisal_assessment__c;
    public $FS_Company_s_tax_return_declaration_1__c;
    public $FS_Company_s_tax_return_declaration_1_Y__c;
    public $FS_Company_s_tax_return_declaration_2__c;
    public $FS_Company_s_tax_return_declaration_2_Y__c;
    public $FS_Business_license__c;
    public $FS_Copy_of_any_Company_certification__c;
    public $FS_Signing_authority_from_bank__c;
    public $FS_List_services_provided_by_the_company__c;
    public $FS_Contract_s_with_clients__c;
    public $FS_Bank_Statement_month_1__c;
    public $FS_Bank_Statement_month_1_Month__c;
    public $FS_Bank_Statement_month_1_Year__c;
    public $FS_Bank_Statement_month_2__c;
    public $FS_Bank_Statement_month_2_Month__c;
    public $FS_Bank_Statement_month_2_Year__c;
    public $FS_Bank_Statement_month_3__c;
    public $FS_Bank_Statement_month_3_Month__c;
    public $FS_Bank_Statement_month_3_Year__c;
    public $FS_Bank_Statement_month_4__c;
    public $FS_Bank_Statement_month_4_Month__c;
    public $FS_Bank_Statement_month_4_Year__c;
    public $FS_Financial_support_letter__c;
    public $FS_Copy_of_passports__c;
    public $FS_Letter_of_Acceptance__c;
    public $FS_Payment_Receipt_from_School__c;
    public $FS_Letter_of_motives__c;
    public $FS_Flight_Ticket_Reservation__c;
    public $FS_Proof_of_properties_ownership__c;
    public $FS_Criminal_record_Clearance__c;
    public $FS_CV_Applicant__c;
    public $FS_Medicals__c;
    public $FS_Other_File_1__c;
    public $FS_Other_File_2__c;
    public $FS_Other_File_3__c;
    public $FS_Other_File_4__c;
    public $FS_Other_File_5__c;
    public $FS_Employment_reference_letters_a_job_1__c;
    public $FS_Employment_reference_letters_a_job_2__c;
    public $FS_Employment_reference_letters_a_job_3__c;
    public $Job_Spouse_1_Description__c;
    public $Job_Spouse_1_Years_of_experience__c;
    public $Job_Spouse_1_Started__c;
    public $Job_Spouse_1_Finish__c;
    public $Job_Spouse_1_full_time_position__c;
    public $Job_Spouse_1_30_hours_a_week__c;
    public $Job_Spouse_2_Description__c;
    public $Job_Spouse_2_Years_of_experience__c;
    public $Job_Spouse_2_Started__c;
    public $Job_Spouse_2_Finish__c;
    public $Job_Spouse_2_full_time_position__c;
    public $Job_Spouse_2_30_hours_a_week__c;
    public $Job_Spouse_3_Description__c;
    public $Job_Spouse_3_Years_of_experience__c;
    public $Job_Spouse_3_Started__c;
    public $Job_Spouse_3_Finish__c;
    public $Job_Spouse_3_full_time_position__c;
    public $Job_Spouse_3_30_hours_a_week__c;
    public $FS_Employment_reference_letters_s_job_1__c;
    public $FS_Employment_reference_letters_s_job_2__c;
    public $FS_Employment_reference_letters_s_job_3__c;
    public $How_many_academic_years_in_Canada__c;
    public $Were_the_studies_Full_time_or_part_time__c;


    public function __construct($salesforce_object_id)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct();

    }

  public function update ( $fieldsArr = array() )
  {

    $uriArr = array(
      'sobjects',
      'Case',
      'Id',
      $this->Id
    );

    $result = $this->update_record( $uriArr, $fieldsArr ); // TODO: Change the autogenerated stub
    return $result;
  }


  // Uploads the file to current case.
  public function upload( $file_path ) {

      $uriArr = array(
        'sobjects',
        'ContentVersion',
        $this->Id,
//        'File'
      );

      // first goes the file upload
      $result = $this->upload_file( $uriArr, $file_path );

      // Then we search for the ContentVersion that we created by uploading the file
      $contentDocumentLink = new SalesForceQueryResponse( SalesForceQuery::get_Content_Document_Link( $result->id ) );

      // Validating that we got a record from SalesForce
      if( ! empty( $contentDocumentLink->recordsArr[0] ) ) {
        $record = $contentDocumentLink->recordsArr[0];

        // Creating the ContentDocumentLink.
        if( isset( $result->id ) ) {
          $second_result = $this->insert_record(  array(
            'sobjects',
            'ContentDocumentLink'
          ), array(
            'ContentDocumentId' => $record->ContentDocumentId,
            'LinkedEntityId'  => $this->Id,
            'ShareType'       => 'V'
          ) );
        }
      }
  }

}