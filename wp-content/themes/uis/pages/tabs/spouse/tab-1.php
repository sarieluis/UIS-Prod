<?php
$disabled = isset($disable_step_1) ? 'disabled' : '';
?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post" enctype="multipart/form-data" >

    <div class="app-row">
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">First name</label>
                <input <?php echo $disabled; ?> type="text" name="firstName" class="app-form-text" value="<?php echo isset($tab_1['firstName']) ? $tab_1['firstName'] : '' ?>" >
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Middle name</label>
                <input <?php echo $disabled; ?> type="text" name="middleName" class="app-form-text" value="<?php echo isset($tab_1['middleName']) ? $tab_1['middleName'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Last name</label>
                <input <?php echo $disabled; ?> type="text" name="lastName" class="app-form-text" value="<?php echo isset($tab_1['lastName']) ? $tab_1['lastName'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Gender</label>
                <div class="app-radio-group app-radio-group-text">
                    <label class="radio-text">
                        <input <?php echo $disabled; ?> type="radio" name="gender" value="female" <?php echo isset($tab_1['gender']) && $tab_1['gender'] == 'female' ? 'checked' : ''  ?>>
                        <span>Female</span>
                    </label>
                    <label class="radio-text">
                        <input <?php echo $disabled; ?>  type="radio" name="gender" value="male" <?php echo isset($tab_1['gender']) ? ($tab_1['gender'] == 'male' ? 'checked' : '') : 'checked'  ?>>
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
                <input <?php echo $disabled; ?> type="email" name="email" class="app-form-text" value="<?php echo isset($tab_1['email']) ? $tab_1['email'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">*Another email address</label>
                <input <?php echo $disabled; ?> type="email" name="anotherEmail" class="app-form-text" value="<?php echo isset($tab_1['anotherEmail']) ? $tab_1['anotherEmail'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Phone number</label>
                <input <?php echo $disabled; ?> type="text" name="phone" class="app-form-text" value="<?php echo isset($tab_1['phone']) ? $tab_1['phone'] : '' ?>">
                <a href="#" class="add">+ Add new phone</a>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Country of residence</label>
                <input <?php echo $disabled; ?> type="text" name="country" class="app-form-text country-select" value="<?php echo isset($tab_1['country']) ? $tab_1['country'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
        </div>
    </div>

    <div class="app-row">
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Street</label>
                <input <?php echo $disabled; ?> type="text" name="street" class="app-form-text" value="<?php echo isset($tab_1['street']) ? $tab_1['street'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">City</label>
                <input <?php echo $disabled; ?> type="text" name="city" class="app-form-text" value="<?php echo isset($tab_1['city']) ? $tab_1['city'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Zip code / Postal code</label>
                <input <?php echo $disabled; ?> type="text" name="zipcode" class="app-form-text" value="<?php echo isset($tab_1['zipcode']) ? $tab_1['zipcode'] : '' ?>">
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Date of birth</label>
                <div class="input-icon">
                    <input <?php echo $disabled; ?> type="text" name="dob" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo isset($tab_1['dob']) ? $tab_1['dob'] : '' ?>">
                    <i class="i-calendar"></i>
                </div>
            </div>
        </div>
        <div class="app-col app-col-5th">
            <div class="app-form-group">
                <label class="app-form-label">Material status</label>
                <select <?php echo $disabled; ?> name="material">

                    <?php
                        $material_statuses = [
                            'Single',
                            'Married',
                            'Widowed',
                            'Legally Separated',
                            'Common Law Partners',
                            'Divorced',
                        ];
                    ?>

                    <?php foreach($material_statuses as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_1['material']) && $tab_1['material'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                    <select <?php echo $disabled; ?> name="children">

                        <?php for($c = 0; $c < 23; $c++) : ?>
                            <option value="<?php echo $c ?>" <?php echo isset($tab_1['children']) && $tab_1['children'] == $c ? 'selected' : ''  ?>><?php echo $c ?></option>
                        <?php endfor;?>

                    </select>
                </div>
            </div>
        </div>
        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Criminal offences</label>
                <select <?php echo $disabled; ?> name="criminal">

                    <?php
                    $criminal_offences = [
                        'You have never been convicted of any criminal offences',
                        'You have been convicted in a criminal offence',
                    ];
                    ?>

                    <?php foreach($criminal_offences as $item) : ?>
                        <option value="<?php echo $item ?>" <?php echo isset($tab_1['criminal']) && $tab_1['criminal'] == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
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
                        <input <?php echo $disabled; ?> type="radio" name="health" value="Yes" <?php echo isset($tab_1['health']) && $tab_1['health'] == 'Yes' ? 'checked' : ''  ?>>
                        <span class="pseudo-radio"></span>
                        Yes
                    </label>
                    <br />
                    <label class="radio">
                        <input <?php echo $disabled; ?> type="radio" name="health" value="No" <?php echo isset($tab_1['health']) ? ($tab_1['health'] == 'No' ? 'checked' : '') : 'checked'  ?>>
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
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="passportID">
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
                        <mark>No file choosen</mark>
                        <input <?php echo $disabled; ?> type="file" name="utilityBill">
                        <input type="hidden" class="hidden-file" name="utilityBill-file">
                    </label>
                </div>
            </div>
        </div>
    </div>


    <div class="app-footer-inner clearfix">
        <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> ><?php echo isset( $disable_step_1 ) ? 'Completed' : 'Next'; ?></a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="1">
    <input type="hidden" name="tab-confirmation" value="0">
    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>

</form>