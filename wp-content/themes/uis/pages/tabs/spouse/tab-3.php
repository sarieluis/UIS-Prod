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
                        <?php for($c = 0; $c < 16; $c++) : ?>
                            <option value="<?php echo $c ?>" <?php echo isset($tab_3['jobsCount']) && $tab_3['jobsCount'] == $c ? 'selected' : ''  ?>><?php echo $c ?></option>
                        <?php endfor;?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="job-description">

        <?php for($i = 1; $i <= 15; $i++) : ?>
            <div class="app-row" <?php echo $i > $tab_3['jobsCount'] ? 'style="display:none"' : '' ?>>
                <div class="app-col app-col-4">
                    <div class="app-form-group">
                        <label class="app-form-label">Job #<?php echo $i ?> Description</label>
                        <input <?php echo $disabled; ?> type="text" class="app-form-text" name="jobs[<?php echo $i ?>][description]" value="<?php echo isset($tab_3['jobs'][$i]['description']) ? $tab_3['jobs'][$i]['description'] : '' ?>">
                    </div>
                </div>

                <div class="app-col app-col-5th">
                    <div class="app-form-group">
                        <label class="app-form-label">Job #<?php echo $i ?> Years of experience</label>
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

                            <?php foreach($estimated_worth as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo isset($tab_3['jobs'][$i]['years']) && $tab_3['jobs'][$i]['years'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
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
                        <input <?php echo $disabled; ?> type="radio" name="work-1" value="Yes" <?php echo isset($tab_3['work-1']) && $tab_3['work-1'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-1" value="No" <?php echo isset($tab_3['work-1']) ? ($tab_3['work-1'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                        <input <?php echo $disabled; ?> type="radio" name="work-2" value="Yes" <?php echo isset($tab_3['work-2']) && $tab_3['work-2'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-2" value="No" <?php echo isset($tab_3['work-2']) ? ($tab_3['work-2'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                        <input <?php echo $disabled; ?> type="radio" name="work-3" value="Yes" <?php echo isset($tab_3['work-3']) && $tab_3['work-3'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="work-3" value="No" <?php echo isset($tab_3['work-3']) ? ($tab_3['work-3'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                                '$300,000-$1,599,000',
                                'More than $1,600,000',
                            ];
                            ?>

                            <?php foreach($estimated_worth as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo isset($tab_3['estimatedWorth']) && $tab_3['estimatedWorth'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                                <option value="<?php echo $item ?>" <?php echo isset($tab_3['transferMoney']) && $tab_3['transferMoney'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
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
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="cv">
                        <input type="hidden" class="hidden-file" name="cv-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-footer-inner clearfix">
        <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> ><?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?></a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="3">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>