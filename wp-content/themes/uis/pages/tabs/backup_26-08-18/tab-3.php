<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">
    <div class="app-row">
        <div class="app-col app-col-12">
            <div class="app-form-group">
                <label class="app-form-label">How many jobs did you have in the past 10 years which you were paid for at least a year? </label>
                <div class="app-form-text_sm">
                    <select <?php echo $disabled; ?> name="jobsCount">
                        <?php for($c = 0; $c < 4; $c++) : ?>
                            <option value="<?php echo $c ?>" <?php echo $case->How_Many_Jobs_Did_You_Have__c == $c ? 'selected' : ''  ?>><?php echo $c ?></option>
                        <?php endfor;?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="job-description">

        <?php for($i = 1; $i <= 3; $i++) : ?>
            <div class="app-row" <?php echo $i > $case->How_Many_Jobs_Did_You_Have__c ? 'style="display:none"' : '' ?>>
                <div class="app-col app-col-12">
                    <p><strong>Job #<?php echo $i ?></strong></p>
                </div>

                <div class="app-col app-col-4">
                    <div class="app-form-group">
                        <label class="app-form-label label-fix">Job #<?php echo $i ?> - Description - Current or most recent employment</label>
                        <?php $job_desc_param = 'Job_' . $i . '_Description__c'; ?>
                        <input <?php echo $disabled; ?> type="text" class="app-form-text" name="jobs[<?php echo $i ?>][description]" value="<?php echo $case->$job_desc_param; ?>">
                    </div>
                </div>

                <div class="app-col app-col-5th">
                    <div class="app-form-group">
                        <label class="app-form-label label-fix">Job #<?php echo $i ?> - Years of experience</label>
                        <select <?php echo $disabled; ?> name="jobs[<?php echo $i ?>][years]">

                            <?php
                            $estimated_worth = [
                                'Less than 1 year',
                                '1 year',
                                '2-3 years',
                                '4-5 years',
                                '6 years or more',
                            ];
                            ?>

                            <?php $job_years_param = 'Job_' . $i . '_Years_of_experience__c'; ?>
                            <?php foreach($estimated_worth as $item) : ?>

                                <option value="<?php echo $item ?>" <?php echo $case->$job_years_param == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                </div>
				
				<div class="app-col app-col-5">
                    <div class="app-form-group">
                        <label class="app-form-label label-fix">Job #<?php echo $i ?> - Started working on</label>
                        <div class="input-icon">
                            <?php $job_start_param = 'Job_' . $i . '_Started__c'; ?>
                            <input <?php echo $disabled; ?> type="text" name="jobs[<?php echo $i ?>][started]" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->$job_start_param; ?>">	
                            <i class="i-calendar"></i>
                        </div>
                    </div>
                </div>
				
				<div class="app-col app-col-5">
                    <div class="app-form-group">
                        <label class="app-form-label label-fix">Job #<?php echo $i ?> - Finished working on</label>
                        <div class="input-icon">
							<?php $job_finish_param = 'Job_' . $i . '_Finish__c'; ?>
                            <input <?php echo $disabled; ?> type="text" name="jobs[<?php echo $i ?>][finish]" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->$job_finish_param; ?>">
                            <i class="i-calendar"></i>
                        </div>
                    </div> 
                </div>
				
            </div>
        <?php endfor; ?>

    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Do you or your spouse/common law partner have a valid Canadian work permit? </label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-1" value="Yes" <?php echo $case->Do_You_have_a_Valid_Candidan__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-1" value="No" <?php echo $case->Do_You_have_a_Valid_Candidan__c == 'No' ? 'checked' : '';  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Do you or your spouse/common law partner have a job offer from a Canadian employer?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-2" value="Yes" <?php echo $case->Do_You_have_a_Job_Offer_From_a_Canadidan__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-2" value="No" <?php echo $case->Do_You_have_a_Job_Offer_From_a_Canadidan__c == 'No' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Do you have at least 1 year of care-giving experience (child care or elderly/disabled)? </label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-3" value="Yes" <?php echo $case->At_least_1_care_giving_experience__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-3" value="No" <?php echo $case->At_least_1_care_giving_experience__c == 'No' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row align-items-end">
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">What is your estimated net worth in US dollars? </label>
                <div class="app-row">
                    <div class="app-col app-col-6">
                        <select <?php echo $disabled; ?> name="estimatedWorth">
                            <?php
                            $estimated_worth = [
                                'Less than $300,000',
                                '$300,000 - $600,000',
                                '$600,000 - $1,000,000',
                                '$1,000,000 - $1,600,000',
                                'More than $1,600,000',
                            ];
                            ?>

                            <?php foreach($estimated_worth as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo $case->What_is_your_estimated_net_worth_USD__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">How much money (in Canadian dollars) will you have available to transfer when you move to Canada?</label>
                <div class="app-row">
                    <div class="app-col app-col-6">
                        <select <?php echo $disabled; ?> name="transferMoney">
                            <?php
                            $transfer_money = [
                                'At least $12,300',
                                'At least $15,312',
                                'At least $18,825',
                                'At least $22,856',
                                'At least $25,923',
                                'At least $29,236',
                                'At least $32,550',
                            ];
                            ?>

                            <?php foreach($transfer_money as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo $case->How_Much_Money_Will_You_Have_in_Canada__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="app-row">
      <!-- Field container:Do you own a business? Yes/No -->
      <div class="app-col app-col-6">
        <div class="app-form-group">
          <label class="app-form-label">Do you own a business?</label>
          <div class="app-radio-group">
            <label class="radio">
              <input <?php echo $disabled; ?> type="radio" name="Do_you_own_a_business__c" value="Yes" <?php echo $case->Do_you_own_a_business__c == 'Yes' ? 'checked' : ''  ?>>
              <span class="pseudo-radio"></span>
              Yes
            </label>
            <br />
            <label class="radio">
              <input <?php echo $disabled; ?> type="radio" name="Do_you_own_a_business__c" value="No" <?php echo $case->Do_you_own_a_business__c == 'No' ? 'checked' : ''  ?>>
              <span class="pseudo-radio"></span>
              No
            </label>
          </div>
        </div>
      </div>
      <!-- End Field container -->



      <!-- Field container: Describe your business activities. Textarea -->
      <div class="app-col app-col-6">
        <div class="app-form-group">
          <label class="app-form-label">Please describe your business activities</label>
          <div class="app-textarea-group">
            <label class="textarea">
            <textarea
              <?php echo $disabled; ?>
                maxlength="150"
                name="Please_Describe_your_business_activities__c"
                class="app-form-textarea"
                id="Please_Describe_your_business_activities__c"
                placeholder="Please describe your business activities here...(Max characters: 150)"><?php echo trim( $case->Please_Describe_your_business_activities__c ); ?></textarea>
            </label>
          </div>
        </div>
      </div>
      <!-- End Field container -->
    </div>


  <div class="app-row">
    <!-- Field container: When was the business established. Date -->
    <div class="app-col app-col-3">
      <div class="app-form-group">
        <label class="app-form-label">When was the business established?</label>
        <div class="input-icon">
          <input <?php echo $disabled; ?> type="text" name="When_was_the_business_established__c" class="app-form-text datepicker" placeholder="dd/mm/yyyy" value="<?php echo $case->When_was_the_business_established__c ?>">
          <i class="i-calendar"></i>
        </div>
      </div>
    </div>
    <!-- End Field container -->

    <div class="app-col app-col-3"></div>

    <!-- Field container: How many employees are currently employed. Number -->
    <div class="app-col app-col-6">
      <div class="app-form-group">
        <label class="app-form-label">How many employees are currently employed?</label>
        <div class="app-form-text_sm">
          <input <?php echo $disabled; ?> type="number" class="app-form-text" name="How_many_employees_are_currently_employe__c" value="<?php echo $case->How_many_employees_are_currently_employe__c ?>">
        </div>
      </div>
    </div>
    <!-- End Field container -->
  </div>






    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Please upload your CV/resume in English/French: </label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <?php if( ! $case->CV_Resume__c ) : ?>
                          <mark>No file choosen</mark>
                        <?php else : ?>
                          <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->CV_Resume__c ) ? 'disabled' : $disabled; ?> type="file" name="cv">
                        <input type="hidden" class="hidden-file" name="cv-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-footer-inner clearfix">
      <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> >
        <?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?>
        <span class="loading"></span>
      </a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="3">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>