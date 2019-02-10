<?php
global $post;

if( ! isset( $_SESSION ) )
  session_start();

$user_id = get_current_user_id();
include_once ($_SERVER["DOCUMENT_ROOT"] ."/inmanage/class/system.php");

use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;
use Inmanage\SalesForce\SalesForceQueryResponse\SalesForceQueryResponse;
use Inmanage\SalesForce\SalesForceCase\SalesForceCase;
use Inmanage\SalesForce\SalesForceDependents\SalesForceDependents;
$user_cases   = uis_current_user_get_cases_array();

if( ! $user_cases || ( is_array( $user_cases ) && empty( $user_cases ) ) ) wp_redirect( get_site_url() );

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

$disabled = '';

$case_type = $case->Type;

$dependents_response = new SalesForceQueryResponse( SalesForceQuery::get_dependents( $case->Id ) );
$dependents_array = array();
if( $dependents_response->success === true && ! empty( $dependents_response->recordsArr ) ) {

  foreach( $dependents_response->recordsArr as $dependent_obj ) {

    $dependent = new SalesForceDependents( $dependent_obj->Id, $dependent_obj->Case__c, $dependent_obj->Date_of_Birth__c, $dependent_obj->First_Name__c, $dependent_obj->Last_Name__c );
    $dependents_array[] = $dependent;
  }
}

global $post;
$tab_1 = unserialize(get_user_meta(get_current_user_id(), 'tab_1', true));
$tab_2 = unserialize(get_user_meta(get_current_user_id(), 'tab_2', true));
$tab_3 = unserialize(get_user_meta(get_current_user_id(), 'tab_3', true));
$tab_4 = unserialize(get_user_meta(get_current_user_id(), 'tab_4', true));
$tab_5 = unserialize(get_user_meta(get_current_user_id(), 'tab_5', true));
$tab_6 = unserialize(get_user_meta(get_current_user_id(), 'tab_6', true));
$tab_7 = unserialize(get_user_meta(get_current_user_id(), 'tab_7', true));
$tab_8 = unserialize(get_user_meta(get_current_user_id(), 'tab_8', true));

$disable_step_1 = true;
$disable_step_2 = true;
if( $case->Submission_Status__c == 'Completed' )
  $disable_step_3 = true;

get_header(); ?>

    <div class="application bg-white">
        <div class="app-header">
            <div class="container-md">
                <div class="app-logo">
                    <a href="<?php echo home_url() ?>" class="logo for-img">
                        <img src="<?php echo get_template_directory_uri() ?>/img/assets/logo.png" alt="">
                    </a>
                </div>

                <div class="app-title">Personal Application</div>

                <div class="app-progress progress">
                    <div class="progress-step progress-step_current">
                        <div class="step-number">1</div>
                        <div class="step-title">Personal Information</div>
                    </div>
                    <div class="progress-step progress-step_current">
                        <div class="step-number">2</div>
                        <div class="step-title">Optimization and document collection</div>
                    </div>
                    <div class="progress-step progress-step_current">
                        <div class="step-number">3</div>
                        <div class="step-title">Government Letters</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-body">
            <div class="container-md">
                <div class="app-row">
                    <div class="app-col app-col-3 m-4">
                      <?php if( count( $user_cases ) == 2 ) : ?>
                        <select class="select_grey" name="the_case">
                          <!--                          <option value="Chose country">Choose Application</option>-->
                          <?php foreach( $user_cases as $tmp_case ) : ?>
                            <option <?php echo $case->Id == $tmp_case->Id ? 'selected' : ''; ?>
                                value="<?php echo $tmp_case->Type; ?>">
                              <?php echo ( $tmp_case->First_Name__c != false && $tmp_case->Last_Name__c != false ) ? $tmp_case->First_Name__c . " " . $tmp_case->Last_Name__c  : $tmp_case->Type; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      <?php endif; ?>
                    </div>
                </div>

                <div class="tabs-wrapper">
                    <div class="tabs-header">
                        <div class="tab-toggle" data-tab="equal-1">Personal Information</div>
                        <div class="tab-toggle" data-tab="equal-2">Education & Training</div>
                        <div class="tab-toggle" data-tab="equal-3">Work Experience</div>
                        <div class="tab-toggle" data-tab="equal-4">Language Skills</div>
                        <div class="tab-toggle" data-tab="equal-5">Adaptability</div>
                        <div class="tab-toggle" data-tab="equal-6">Dependents</div>
                        <div class="tab-toggle" data-tab="equal-7">Documentation Collection</div>
                        <div class="tab-toggle tab-toggle_active" data-tab="equal-8">Government Letters</div>
                    </div>
                    <div class="tabs-body">
                        <div class="tab-content " data-tab="equal-1">
                          <?php include "tabs/tab-1.php"; ?>
                        </div>
                        <div class="tab-content " data-tab="equal-2">
                          <?php include "tabs/tab-2.php"; ?>
                        </div>
                        <div class="tab-content " data-tab="equal-3">
                          <?php include "tabs/tab-3.php"; ?>
                        </div>
                        <div class="tab-content " data-tab="equal-4">
                          <?php include "tabs/tab-4.php"; ?>
                        </div>
                        <div class="tab-content " data-tab="equal-5">
                          <?php include "tabs/tab-5.php"; ?>
                        </div>
                        <div class="tab-content " data-tab="equal-6">
                          <?php include "tabs/tab-6.php"; ?>
                        </div>
                        <div class="tab-content" data-tab="equal-7">
                          <?php include "tabs/tab-7.php"; ?>
                        </div>

                        <div class="tab-content tab-content_active" data-tab="equal-8">
                            <?php include "tabs/tab-8.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-footer">
            <div class="container-md">
                <div class="app-footer-inner clearfix">
                    <a href="#" id="app-footer-btn" class="app-footer-btn">
                        Save
                        <i class="i-download"></i>
                    </a>
                    <span class="loading"></span>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>