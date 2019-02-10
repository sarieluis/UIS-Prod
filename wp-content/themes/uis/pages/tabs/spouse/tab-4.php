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
                                <option value="<?php echo $item ?>" <?php echo isset($tab_4['englishLevel']) && $tab_4['englishLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                                <option value="<?php echo $item ?>" <?php echo isset($tab_4['frenchLevel']) && $tab_4['frenchLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-12">
            <p>What is your level of <strong>English</strong>?</p>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Reading:</label>
                <select <?php echo $disabled; ?> name="englishReadingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['englishReadingLevel']) && $tab_4['englishReadingLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="englishListeningLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['englishListeningLevel']) && $tab_4['englishListeningLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="englishWritingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['englishWritingLevel']) && $tab_4['englishWritingLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Speaking:</label>
                <select <?php echo $disabled; ?> name="englishSpeakingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['englishSpeakingLevel']) && $tab_4['englishSpeakingLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['frenchReadingLevel']) && $tab_4['frenchReadingLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Listening:</label>
                <select <?php echo $disabled; ?> name="frenchListeningLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['frenchListeningLevel']) && $tab_4['frenchListeningLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Writing:</label>
                <select <?php echo $disabled; ?> name="frenchWritingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['frenchWritingLevel']) && $tab_4['frenchWritingLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Speaking:</label>
                <select <?php echo $disabled; ?> name="frenchSpeakingLevel">
                    <?php foreach($levels as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_4['frenchSpeakingLevel']) && $tab_4['frenchSpeakingLevel'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="app-col app-col-5th"></div>
    </div>

    <div class="app-footer-inner clearfix">
      <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> ><?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?></a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="4">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>