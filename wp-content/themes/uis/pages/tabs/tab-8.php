<?php
$disabled = isset($disable_step_3) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Upload Retainer Agreement</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <?php if( ! $case->Retainer_Agreement__c ) : ?>
                          <mark>No file choosen</mark>
                        <?php else : ?>
                          <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->Retainer_Agreement__c ) ? 'disabled' : $disabled; ?> type="file" name="retainer-agreement">
                        <input type="hidden" class="hidden-file" name="retainer-agreement-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-footer-inner clearfix">
      <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> >
        <?php echo isset( $disable_step_3 ) ? 'Completed' : 'Next'; ?>
        <span class="loading"></span>
      </a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="8">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>