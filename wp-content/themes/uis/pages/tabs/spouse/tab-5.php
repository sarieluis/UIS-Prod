<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <?php
    $levels = [
        'Very high',
        'High',
        'Basic',
        'Not at all',
        'I do not have a spouse',
    ];
    ?>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Do you or your spouse / common-law partner have at least 1 year of full-time Canadian work experience on a valid work permit?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-1" value="Yes" <?php echo isset($tab_5['adaptability-1']) && $tab_5['adaptability-1'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-1" value="No" <?php echo isset($tab_5['adaptability-1']) ? ($tab_5['adaptability-1'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                <label class="app-form-label">Did you or your spouse/common law partner study in Canada? </label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-2" value="Yes" <?php echo isset($tab_5['adaptability-2']) && $tab_5['adaptability-2'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-2" value="No" <?php echo isset($tab_5['adaptability-2']) ? ($tab_5['adaptability-2'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                <label class="app-form-label">Has your spouse/common-law partner completed high school (secondary school)?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-3" value="Yes" <?php echo isset($tab_5['adaptability-3']) && $tab_5['adaptability-3'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-3" value="No" <?php echo isset($tab_5['adaptability-3']) ? ($tab_5['adaptability-3'] == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-3" value="N/A" <?php echo isset($tab_5['adaptability-3']) && $tab_5['adaptability-3'] == 'N/A' ? 'checked' : ''  ?>>
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
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-4" value="Yes" <?php echo isset($tab_5['adaptability-4']) && $tab_5['adaptability-4'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-4" value="No" <?php echo isset($tab_5['adaptability-4']) ? ($tab_5['adaptability-4'] == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-4" value="I do not have a spouse" <?php echo isset($tab_5['adaptability-4']) && $tab_5['adaptability-4'] == 'I do not have a spouse' ? 'checked' : ''  ?>>
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
                                'Two or more post-secondary credential, one of which is a three year or longer post-secondary credential',
                                'Masters level or Professional degree',
                                'Doctorate level',
                            ];
                            ?>

                            <?php foreach($partnerDegree as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerDegree']) && $tab_5['partnerDegree'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                    <input <?php echo $disabled; ?> type="number" class="app-form-text" name="partnerEducationYears" value="<?php echo isset($tab_5['partnerEducationYears']) ? $tab_5['partnerEducationYears'] : '' ?>">
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
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-5" value="Yes" <?php echo isset($tab_5['adaptability-5']) && $tab_5['adaptability-5'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-5" value="No" <?php echo isset($tab_5['adaptability-5']) ? ($tab_5['adaptability-5'] == 'No' ? 'checked' : '') : 'checked'  ?>>
                        <span class="pseudo-radio"></span>
                        No
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="adaptability-5" value="I do not have a spouse" <?php echo isset($tab_5['adaptability-5']) && $tab_5['adaptability-5'] == 'I do not have a spouse' ? 'checked' : ''  ?>>
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
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishReading">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerEnglishReading']) && $tab_5['partnerEnglishReading'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishListening">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerEnglishListening']) && $tab_5['partnerEnglishListening'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishWriting">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerEnglishWriting']) && $tab_5['partnerEnglishWriting'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Speaking:</label>
                <select <?php echo $disabled; ?> name="partnerEnglishSpeaking">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerEnglishSpeaking']) && $tab_5['partnerEnglishSpeaking'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchReading">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerFrenchReading']) && $tab_5['partnerFrenchReading'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchListening">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerFrenchListening']) && $tab_5['partnerFrenchListening'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchWriting">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerFrenchWriting']) && $tab_5['partnerFrenchWriting'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Speaking:</label>
                <select <?php echo $disabled; ?> name="partnerFrenchSpeaking">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerFrenchSpeaking']) && $tab_5['partnerFrenchSpeaking'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                            ];
                            ?>

                            <?php foreach($partnerFamily as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo isset($tab_5['partnerFamily']) && $tab_5['partnerFamily'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-footer-inner clearfix">
      <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> ><?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?></a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="5">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>