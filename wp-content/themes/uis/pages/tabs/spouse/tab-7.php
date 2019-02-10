<?php
$disabled = isset($disable_step_2) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Upload IELTS Results</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="ielts">
                        <input type="hidden" class="hidden-file" name="ielts-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Upload Education Certificate</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="edu-certificate">
                        <input type="hidden" class="hidden-file" name="edu-certificate-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Upload Dependent’s ID’s</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="dependents-id">
                        <input type="hidden" class="hidden-file" name="dependents-id-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Upload Police Check</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="police-check">
                        <input type="hidden" class="hidden-file" name="police-check-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Upload Medical Test</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="medical-test">
                        <input type="hidden" class="hidden-file" name="medical-test-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-footer-inner clearfix">
      <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> ><?php echo isset( $disable_step_2 ) ? 'Completed' : 'Next'; ?></a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="7">

    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>