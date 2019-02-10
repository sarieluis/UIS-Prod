<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <?php
    $levels = [
        'Fluent',
        'Very high',
        'High',
        'Basic',
        'Low',
        'None'
    ];
    ?>

    <div class="app-row">
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">What is your overall level of English?</label>
                <div class="app-row">
                    <div class="app-col app-col-6">
                        <select <?php echo $disabled; ?> name="englishLevel">
                            <?php foreach($levels as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo $case->What_is_your_overall_level_of_English__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                <label class="app-form-label">What is your overall level of French? </label>
                <div class="app-row">
                    <div class="app-col app-col-6">
                        <select <?php echo $disabled; ?> name="frenchLevel">
                            <?php foreach($levels as $item) : ?>
                                <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Overall_Level_of_French__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="app-row">
        <div class="app-col app-col-12">
            <p>What is your level of <strong>English</strong>?</p>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="englishReadingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Reading_Level_of_English__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="englishListeningLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Listening_Level_of_English__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="englishWritingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Writing_Level_of_English__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Speaking:</label>
                <select <?php echo $disabled; ?> name="englishSpeakingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Speaking_Level_of_English__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th"></div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-12">
            <p>What is your level of <strong>French</strong>?</p>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="frenchReadingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_your_Reading_level_of_French__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="frenchListeningLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_your_Listening_Level_of_French__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="frenchWritingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Writing_Level_of_French__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Speaking:</label>
                <select <?php echo $disabled; ?> name="frenchSpeakingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->What_is_Your_Speaking_Level_of_French__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th"></div>
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
    <input type="hidden" name="tab" value="4">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>