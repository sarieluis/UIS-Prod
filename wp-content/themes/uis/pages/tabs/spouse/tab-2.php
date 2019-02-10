<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">
    <div class="app-row">
        <div class="app-col app-col-12">
            <p><strong>What is your highest level of education or training? </strong></p>
        </div>
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Type of Program </label>
                <select <?php echo $disabled; ?> name="programType">

                    <?php
                    $program_types = [
                        'High school diploma',
                        'One year program diploma',
                        'Two year program diploma',
                        'Three year program diploma',
                        'Post-Secondary degree (Bachelors)',
                        'Two or more University degrees at Bachelors level',
                        'Professional degree of Law/ Medicine/ Pharmacy/ Dentistry/ Optometry',
                        'Masters Degree',
                        'PhD',
                    ];
                    ?>

                    <?php foreach($program_types as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_2['programType']) && $tab_2['programType'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Program duration</label>
                <select <?php echo $disabled; ?> name="programDuration">

                    <?php
                    $program_durations = [
                        'Less than 1 academic year',
                        '2 Academic years or more but less than 3 years',
                        '3 Academic years or more but less than 4 years',
                        '4 Academic years or more',
                    ];
                    ?>

                    <?php foreach($program_durations as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_2['programDuration']) && $tab_2['programDuration'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-3">
            <div class="app-form-group">
                <label class="app-form-label">Field of Study</label>
                <input <?php echo $disabled; ?> type="text" class="app-form-text" name="studyField" value="<?php echo isset($tab_2['studyField']) ? $tab_2['studyField'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-3">
            <div class="app-form-group">
                <label class="app-form-label">Country of Study</label>
                <input <?php echo $disabled; ?> type="text" class="app-form-text country-select" name="studyCountry" value="<?php echo isset($tab_2['studyCountry']) ? $tab_2['studyCountry'] : '' ?>">
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Have you completed this program and received a degree, diploma or certificate?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="education" value="Yes" <?php echo isset($tab_2['education']) && $tab_2['education'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="education" value="No" <?php echo isset($tab_2['education']) ? ($tab_2['education'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                    <input <?php echo $disabled; ?> type="number" class="app-form-text" name="educationYears" value="<?php echo isset($tab_2['educationYears']) ? $tab_2['educationYears'] : '' ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="app-footer-inner clearfix">
        <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> ><?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?></a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="2">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>