<?php
$available_dependents = 22;
$j=1;
if( ! empty( $dependents_array ) ) {

  $dependents_count = count( $dependents_array );
}
$disabled = isset($disable_step_1) ? 'disabled' : '';


if( ! isset( $tab_1['children'] ) )
  $children = $case->Number_of_Dependent_Children_Under_22__c;
else
  $children = $tab_1['children'];
?>

<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <div class="depends-holder">

      <?php if( ! empty( $dependents_array ) ) : ?>
        <?php foreach( $dependents_array as $dependent ) : ?>

          <div class="app-row" <?php echo $j > $children ? 'style="display:none"' : '' ?>>
            <div class="app-col app-col-5th">
              <div class="app-form-group">
                <label class="app-form-label">First name</label>
                <input <?php echo $disabled; ?> type="text" class="app-form-text" name="depends[<?php echo $j ?>][firstName]" value="<?php echo $dependent->First_Name__c; ?>">
              </div>
            </div>
            <div class="app-col app-col-5th">
              <div class="app-form-group">
                <label class="app-form-label">Last name</label>
                <input <?php echo $disabled; ?> type="text" class="app-form-text" name="depends[<?php echo $j ?>][lastName]" value="<?php echo $dependent->Last_Name__c ?>">
              </div>
            </div>
            <div class="app-col app-col-5th">
              <div class="app-form-group">
                <label class="app-form-label">Date of birth</label>
                <div class="input-icon">
                  <input <?php echo $disabled; ?> type="text" class="app-form-text datepicker" placeholder="dd / mm / yyyy" name="depends[<?php echo $j ?>][dob]" value="<?php echo $dependent->Date_of_Birth__c; ?>">
                  <i class="i-calendar"></i>
                </div>
              </div>
            </div>
            <div class="app-col app-col-5th"></div>
            <div class="app-col app-col-5th"></div>
          </div>

        <?php $j++; endforeach; ?>
      <?php endif; ?>

      <?php for($i = $j; $i <= $available_dependents; $i++) : ?>
          <div class="app-row" <?php echo $i > $children ? 'style="display:none"' : '' ?>>
              <div class="app-col app-col-5th">
                  <div class="app-form-group">
                      <label class="app-form-label">First name</label>
                      <input <?php echo $disabled; ?> type="text" class="app-form-text" name="depends[<?php echo $i ?>][firstName]" value="">
                  </div>
              </div>
              <div class="app-col app-col-5th">
                  <div class="app-form-group">
                      <label class="app-form-label">Last name</label>
                      <input <?php echo $disabled; ?> type="text" class="app-form-text" name="depends[<?php echo $i ?>][lastName]" value="">
                  </div>
              </div>
              <div class="app-col app-col-5th">
                  <div class="app-form-group">
                      <label class="app-form-label">Date of birth</label>
                      <div class="input-icon">
                          <input <?php echo $disabled; ?> type="text" class="app-form-text datepicker" placeholder="dd / mm / yyyy" name="depends[<?php echo $i ?>][dob]" value="">
                          <i class="i-calendar"></i>
                      </div>
                  </div>
              </div>
              <div class="app-col app-col-5th"></div>
              <div class="app-col app-col-5th"></div>
          </div>
      <?php endfor; ?>
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

    <input type="hidden" name="depends_count" value="<?php echo $tab_1['children']; ?>">
    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="6">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>