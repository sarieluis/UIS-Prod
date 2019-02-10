<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <?php
    $levels = [
        'Very high',
        'High',
        'Basic',
        'None at all',
        'I do not have a spouse',
    ];
    ?>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Do you or your spouse / common-law partner have at least 1 year of full-time Canadian work experience on a valid work permit?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-1" value="Yes" <?php echo $case->Have_at_Least_1_Year_Canadian_Work__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-1" value="No" <?php echo $case->Have_at_Least_1_Year_Canadian_Work__c != false ? ($case->Have_at_Least_1_Year_Canadian_Work__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>

            <div class="app-col app-col-6" id="describeCanadianJonExp">
            <div class="app-form-group">
                <label class="app-form-label">If yes, please describe your Canadian work experience</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="canadianPosition" class="app-form-text" value="<?php echo $case->Canadian_job_description__c; ?>" style="width:250px;">
            </div>
            </div>

        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Did you or your spouse/common law partner study in Canada? </label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-2" value="Yes" <?php echo $case->Did_You_or_Your_Spouse_Study_in_Canada__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-2" value="No" <?php echo $case->Did_You_or_Your_Spouse_Study_in_Canada__c != false ? ($case->Did_You_or_Your_Spouse_Study_in_Canada__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row" id="TotalYearsAcademic">
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">How many academic years did you or your spouse complete in Canada?</label>
                <div class="app-form-text_sm">
                    <input <?php echo $disabled; ?> type="number" class="app-form-text" name="YearsOfAcademic" value="<?php echo $case->How_many_academic_years_in_Canada__c ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="app-row" id="TypeOfStudies">
        <div class="app-col app-col-12">
            <p>Were the studies Full time or Part-time?</p>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <select <?php echo $disabled; ?> name="TypeOfStudies">
                    <?php
                    $typeStudies = [
                        'Full Time',
                        'Part-time'
                    ];
                    ?>
                    <?php foreach($typeStudies as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Were_the_studies_Full_time_or_part_time__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th"></div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Has your spouse/common-law partner completed high school (secondary school)?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-3" value="Yes" <?php echo $case->Has_your_spouse__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-3" value="No" <?php echo $case->Has_your_spouse__c != false ? ( $case->Has_your_spouse__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-3" value="N/A" <?php echo $case->Has_your_spouse__c == 'N/A' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        N/A
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Has your spouse/common-law partner done any education or training other than high school (secondary school)?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-4" value="Yes" <?php echo $case->Spouse_done_education_after_High_School__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-4" value="No" <?php echo $case->Spouse_done_education_after_High_School__c != false ? ($case->Spouse_done_education_after_High_School__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-4" value="I do not have a spouse" <?php echo $case->Spouse_done_education_after_High_School__c == 'I do not have a spouse' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        I do not have a spouse
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-12">
            <div class="app-form-group">
                <label class="app-form-label">What is the highest degree or diploma that your spouse/common-law partner has completed after finishing high school</label>
                <div class="app-row">
                    <div class="app-col app-col-6">
                        <select <?php echo $disabled; ?> name="partnerDegree">
                            <?php
                            $partnerDegree = [
                                'High school diploma (secondary school)',
                                'One year post-secondary credential',
                                'Two year post-secondary credential',
                                'Three year program diploma or certificate',
                                'Post-Secondary degree (Bachelors)',
                                'Two or more post-secondary credential, one of which is a three year or longer post-secondary credential',
                                'Masters level or Professional degree',
                                'Doctorate level',
                            ];
                            ?>

                            <?php foreach($partnerDegree as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo $case->Spouse_Highest_Degree__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Total years of spouse/common law partner education since grade 1?</label>
                <div class="app-form-text_sm">
                    <input <?php echo $disabled; ?> type="number" class="app-form-text" name="partnerEducationYears" value="<?php echo $case->Total_Years_of_Spouse_Education__c ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Has your spouse/ common-law partner completed (at least) 2 years of post-secondary education in Canada since reaching the age of 17? </label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-5" value="Yes" <?php echo $case->Completed_2_Years_of_PS_Education__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-5" value="No" <?php echo $case->Completed_2_Years_of_PS_Education__c != false ? ($case->Completed_2_Years_of_PS_Education__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-5" value="I do not have a spouse" <?php echo $case->Completed_2_Years_of_PS_Education__c == 'I do not have a spouse' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        I do not have a spouse
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-12">
            <p><strong>What is your spouse/common-law partner level of English?</strong></p>
        </div>

        <!--Old Questions
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishReading">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Spouse_English_Reading_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishListening">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Spouse_English_Listening_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishWriting">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Spouse_English_Writing_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>-->
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <!--<label class="app-form-label">Speaking:</label>-->
                <select <?php echo $disabled; ?> name="partnerEnglishSpeaking">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Spouse_English_Speaking_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th"></div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-12">
            <p><strong>What is your spouse/common-law partner level of French?</strong></p>
        </div>
        <!--Old Questions
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchReading">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_your_spouse_French_Reading_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchListening">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Spouse_French_Listening_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchWriting">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_your_spouse_French_Writing_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>-->
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <!--<label class="app-form-label">Speaking:</label>-->
                <select <?php echo $disabled; ?> name="partnerFrenchSpeaking">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Spouse_French_Speaking_Level__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th"></div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-10">
            <div class="app-form-group">
                <label class="app-form-label">Do you or your spouse/common-law partner; have any family members living in Canada?</label>
                <div class="app-row">
                    <div class="app-col app-col-6">
                        <select <?php echo $disabled; ?> name="partnerFamily">

                            <?php
                            $partnerFamily = [
                                'No Family members in Canada',
                                'Parent',
                                'Grandparent',
                                'Child',
                                'Siblings',
                                'Aunt',
                                'Uncle',
                                'Canadian Spouse',
                                'Niece',
                                'Nephew',

                            ];
                            ?>

                            <?php foreach($partnerFamily as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo $case->Family_Members_Living_in_Canada__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="app-row">
        <div class="app-col app-col-12">
            <p><strong>Relatives in Canada</strong></p>
        </div>
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Is your relative 18 years old of age or older?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-6" value="Yes" <?php echo $case->Is_your_relative_18_years_old_of_age_or__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-6" value="No" <?php echo $case->Is_your_relative_18_years_old_of_age_or__c != false ? ($case->Is_your_relative_18_years_old_of_age_or__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Does your relative, or your spouse’s relative, hold a Canadian PR/Citizenship status? </label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-7" value="Yes" <?php echo $case->Have_at_test__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-7" value="No" <?php echo $case->Have_at_Least_1_test__c != false ? ($case->Have_at_Least_1_Year_Canadian_Work__c == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>-->


    <div class="app-footer-inner clearfix">
        <?php if( $case->Evaluation_Status__c == 'Completed' ) : ?>
            <div title="Questionnaire is Completed" class="app-footer-btn-disabled">Completed</div>
        <?php else : ?>
            <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> >
                <?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?>
                <span class="loading"></span>
            </a>
        <?php endif; ?>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="5">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>