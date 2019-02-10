<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
$titleDisabled = isset($disable_step_1) ? 'title="Questionnaire is Completed"' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">
    <div class="app-row">
        <div class="app-col app-col-12">
            <p><strong>What is your highest level of education or training? </strong></p>
        </div>
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Type of Program </label>
                <select <?php echo $disabled; ?> <?php echo $titleDisabled; ?> name="programType">

                    <?php
                    $program_types = [
                        'High school diploma',
                        'One year program diploma or certificate',
                        'Two year program diploma or certificate',
                        'Three year program diploma or certificate',
                        'Two or more diplomas or certificates',
                        'Post-Secondary degree (Bachelors)',
                        'Two or more University degrees at Bachelors level',
                        'Professional degree of Law/ Medicine/ Pharmacy/ Dentistry/ Optometry',
                        'Masters Degree',
                        'PhD',
                    ];
                    ?>

                    <?php foreach($program_types as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_your_highest_Level_of_education__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>

    </div>

    <div class="app-row">
        <div class="app-col app-col-3">
            <div class="app-form-group">
                <label class="app-form-label">#1 Field of Study</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" class="app-form-text" name="studyField" value="<?php echo $case->Field_of_Study__c; ?>">
            </div>
        </div>
        <div class="app-col app-col-3">
            <div class="app-form-group">
                <label class="app-form-label">#1 Country of Study</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" class="app-form-text country-select" name="studyCountry" value="<?php echo $case->Country_of_Study__c ?>">
            </div>
        </div>

        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">#1 Program duration - <strong>According to your curriculum</strong></label>
                <select <?php echo $disabled; ?> <?php echo $titleDisabled; ?> name="programDuration">

                    <?php
                    $program_durations = [
                        'Less than 1 academic year',
                        '1 Academic year',
                        '2 Academic years or more but less than 3 years',
                        '3 Academic years or more but less than 4 years',
                        '4 Academic years or more',
                    ];
                    ?>

                    <?php foreach($program_durations as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Program_Duration__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>

        <div class="app-col app-col-3">
            <div class="app-form-group">
                <label class="app-form-label">#2 Field of Study</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" class="app-form-text" name="studyField_2" value="<?php echo $case->Field_of_Study_2__c; ?>">
            </div>
        </div>
        <div class="app-col app-col-3">
            <div class="app-form-group">
                <label class="app-form-label">#2 Country of Study</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" class="app-form-text country-select" name="studyCountry_2" value="<?php echo $case->Country_of_Study_2__c ?>">
            </div>
        </div>

        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">#2 Program duration - <strong>According to your curriculum</strong></label>
                <select <?php echo $disabled; ?> <?php echo $titleDisabled; ?> name="programDuration_2">

                    <?php
                    $program_durations = [
                        'Less than 1 academic year',
                        '1 Academic year',
                        '2 Academic years or more but less than 3 years',
                        '3 Academic years or more but less than 4 years',
                        '4 Academic years or more',
                    ];
                    ?>

                    <?php foreach($program_durations as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Program_Duration_2__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>

    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Have you completed these programs and received a degrees, diplomas or certificates?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="radio" name="education" value="Yes" <?php echo $case->Have_you_completed_this_program__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="radio" name="education" value="No" <?php echo $case->Have_you_completed_this_program__c == 'No' ? 'checked' : ''; ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-4">
            <div class="app-form-group">
                <label class="app-form-label">Total years of education (from grade 1)</label>
                <div class="app-form-text_sm">
                    <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="number" class="app-form-text" name="educationYears" value="<?php echo $case->Total_Years_of_Education_Since_Grade_1__c ?>">
                </div>
            </div>
        </div>
    </div>

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
    <input type="hidden" name="tab" value="2">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>