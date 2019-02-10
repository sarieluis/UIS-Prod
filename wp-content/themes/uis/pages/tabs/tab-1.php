<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
$titleDisabled = isset($disable_step_1) ? 'title="Questionnaire is Completed"' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post" enctype="multipart/form-data" >

    <div class="app-row">
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">First name</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="firstName" class="app-form-text" value="<?php echo $case->First_Name__c; ?>" >
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Middle name</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="middleName" class="app-form-text" value="<?php echo $case->Middle_Name__c; ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Last name</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="lastName" class="app-form-text" value="<?php echo $case->Last_Name__c; ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Gender</label>
                <div class="app-radio-group app-radio-group-text">
                    <label class="radio-text">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="radio" name="gender" value="female" <?php echo isset($case->Gender__c) && $case->Gender__c == 'Female' ? 'checked' : ''  ?>>
                        <span>Female</span>
                    </label>
                    <label class="radio-text">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?>  type="radio" name="gender" value="male" <?php echo isset($case->Gender__c) && $case->Gender__c == 'Male' ? 'checked' : ''  ?>>
                        <span>Male</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="app-col app-col-5th">
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Email Address</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="email" name="email" class="app-form-text" value="<?php echo $case->Email_Address__c ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">*Another email address</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="email" name="anotherEmail" class="app-form-text" value="<?php echo $case->Another_Email_Address__c ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Phone number</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="phone" class="app-form-text" value="<?php echo $case->Phone_Number__c ?>">
<!--                <a href="#" class="add">+ Add new phone</a>-->
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Country of residence</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="country" class="app-form-text country-select" value="<?php echo $case->Country_of_Residence__c ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Street</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="street" class="app-form-text" value="<?php echo $case->Street__c; ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">City</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="city" class="app-form-text" value="<?php echo $case->City__c ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Zip code / Postal code</label>
                <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="zipcode" class="app-form-text" value="<?php echo $case->Zip_Code_Postal_Code__c ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Date of birth</label>
                <div class="input-icon">
                    <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="dob" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->Date_of_Birth__c ?>">
                    <i class="i-calendar"></i>
                </div>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Marital Status</label>
                <select <?php echo $disabled; ?> <?php echo $titleDisabled; ?> name="material">

                    <?php
                        $material_statuses = [
                            'Single',
                            'Married',
                            'Widowed',
                            'Legally Separated',
                            'Common Law Partners (Cohabitating at least 12 months)',
                            'Divorced',
                        ];
                    ?>

                    <?php foreach($material_statuses as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Marital_Status__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-4">
            <div class="app-form-group">
                <label class="app-form-label">Number of dependent childred under 22:</label>
                <div class="app-form-text_sm">
                    <select <?php echo $disabled; ?> <?php echo $titleDisabled; ?> name="children">

                        <?php for($c = 0; $c < 23; $c++) : ?>
                            <option value="<?php echo $c ?>" <?php echo $case->Number_of_Dependent_Children_Under_22__c == $c ? 'selected' : ''  ?>><?php echo $c ?></option>
                        <?php endfor;?>

                    </select>
                </div>
            </div>
        </div>
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Criminal offences</label>
                <select <?php echo $disabled; ?> <?php echo $titleDisabled; ?> name="criminal">

                    <?php
                    $criminal_offences = [
                        'You have never been convicted of any criminal offences',
                        'You have been convicted in a criminal offence',
                    ];
                    ?>

                    <?php foreach($criminal_offences as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo $case->Criminal_Offences__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Have you or any of your immediate family had any serious health problems?</label>
                <div class="app-radio-group">
                    <label class="radio">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="radio" name="health" value="Yes" <?php echo $case->Health_Problems__c == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="radio" name="health" value="No" <?php echo $case->Health_Problems__c == 'No' ? 'checked' : ''; ?>>
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
                <label class="app-form-label">Please upload a clear Copy of your Passport ID Page:</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
                        <span class="button clearfix">
                            Choose file
                            <i class="i-upload"></i>
                        </span>
                        <?php if( ! $case->Passport_Copy__c ) : ?>
                          <mark>No file choosen</mark>
                        <?php else : ?>
                          <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->Passport_Copy__c ) ? 'disabled' : $disabled; ?> type="file" name="passportID">
                        <input type="hidden" class="hidden-file" name="passportID-file">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="app-row">
        <div class="app-col">
            <div class="app-form-group">
                <label class="app-form-label">Please Upload a Utility Bill (not older than 3 months)</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
                                                    <span class="button clearfix">
                                                        Choose file
                                                        <i class="i-upload"></i>
                                                    </span>
                        <?php if( ! $case->Utility_Bill__c ) : ?>
                          <mark>No file choosen</mark>
                        <?php else : ?>
                          <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->Utility_Bill__c ) ? 'disabled' : $disabled; ?> type="file" name="utilityBill">
                        <input type="hidden" class="hidden-file" name="utilityBill-file">
                    </label>
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
    <input type="hidden" name="tab" value="1">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>

</form>