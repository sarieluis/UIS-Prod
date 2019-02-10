<?php
$disabled = isset($disable_step_2) ? 'disabled' : '';

?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">

    <?php if(  $case->First_Name__c == 'test sariel' ) : ?>
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
                            <?php if( ! $case->IELTS_Results__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->IELTS_Results__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts">
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
                            <?php if( ! $case->Education_Certificate__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->Education_Certificate__c ) ? 'disabled' : $disabled; ?> type="file" name="edu-certificate">
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
                            <?php if( ! $case->Dependent_s_ID_s__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->Dependent_s_ID_s__c ) ? 'disabled' : $disabled; ?> type="file" name="dependents-id">
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
                            <?php if( ! $case->Police_Check__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->Police_Check__c ) ? 'disabled' : $disabled; ?> type="file" name="police-check">
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
                            <?php if( ! $case->Medical_Test__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->Medical_Test__c ) ? 'disabled' : $disabled; ?> type="file" name="medical-test">
                            <input type="hidden" class="hidden-file" name="medical-test-file">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div id="LabelHelloName" style="padding-bottom:20px;font-size:17px;">Hello <?php echo $case->First_Name__c; ?>,</div>

    <?php if($case->Visa_Type__c == 'Express Entry (Career Development)' || $case->Visa_Type__c == 'Submission to Pool') : ?>
        <?php if($case->Visa_Type__c == 'Express Entry (Career Development)' ) : ?>
            <strong>Career Development</strong>
        <?php endif; ?>
        <?php if($case->Visa_Type__c == 'Submission to Pool' ) : ?>
            <strong><?php echo $case->Visa_Type__c; ?></strong>
        <?php endif; ?>


        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Digital photo - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Digital_photo_applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-applicant">
                            <input type="hidden" class="hidden-file" name="digital-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-spouse">
                                <input type="hidden" class="hidden-file" name="digital-photo-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_1">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_2">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_3">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_4">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_5">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-spouse">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_1">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_2">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_3">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_4">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_5">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Birth Certificate - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Birth_Certificate_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-applicant">
                            <input type="hidden" class="hidden-file" name="birth-certificate-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-spouse">
                                <input type="hidden" class="hidden-file" name="birth-certificate-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_1">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_2">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_3">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_4__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_4">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_5__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_5">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>


        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">IELTS Test - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_IELTS_Test_Applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_IELTS_Test_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts-test-applicant">
                            <input type="hidden" class="hidden-file" name="ielts-test-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">IELTS Test - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_IELTS_Test_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_IELTS_Test_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts-test-spouse">
                                <input type="hidden" class="hidden-file" name="ielts-test-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Education diploma - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Education_diploma_applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-applicant">
                            <input type="hidden" class="hidden-file" name="education-diploma-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Education diploma - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Education_diploma_spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-spouse">
                                <input type="hidden" class="hidden-file" name="education-diploma-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>


            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Credential Evaluation (WES) - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_WES_Applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_WES_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="wes-applicant">
                            <input type="hidden" class="hidden-file" name="wes-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Credential Evaluation (WES) - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_WES_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_WES_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="wes-spouse">
                                <input type="hidden" class="hidden-file" name="wes-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == 'Married') : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Marriage Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Marriage_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Marriage_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="marriage-certificate">
                                <input type="hidden" class="hidden-file" name="marriage-certificate-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Common Law declaration - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Common_Law_declaration__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Common_Law_declaration__c ) ? 'disabled' : $disabled; ?> type="file" name="common-law-declaration">
                                <input type="hidden" class="hidden-file" name="common-law-declaration-file">
                            </label>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Divorced") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Divorce Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Divorce_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Divorce_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="divorce-certificate-applicant">
                                <input type="hidden" class="hidden-file" name="divorce-certificate-applicant-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

    <div class="app-row app-row-files">

        <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>

        <?php endif; ?>

        <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "2") : ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Employment reference letters - Main Applicant Job #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Employment_reference_letters_a_job_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_2">
                            <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_2-file">
                        </label>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if ( $case->How_Many_Jobs_Did_You_Have__c == "3") : ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Employment reference letters - Main Applicant Job #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Employment_reference_letters_a_job_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_3">
                            <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_3-file">
                        </label>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "1") : ?>
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Employment reference letters - Spouse Job #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Employment_reference_letters_s_job_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_1">
                            <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_1-file">
                        </label>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "2") : ?>
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Employment reference letters - Spouse Job #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Employment_reference_letters_s_job_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_2">
                            <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_2-file">
                        </label>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c == "3") : ?>
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Employment reference letters - Spouse Job #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Employment_reference_letters_s_job_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_3">
                            <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_3-file">
                        </label>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Other File #3</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <?php if( ! $case->FS_Other_File_3__c) : ?>
                            <mark>No file choosen</mark>
                        <?php else : ?>
                            <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                        <input type="hidden" class="hidden-file" name="other-file_3-file">
                    </label>
                </div>
            </div>
        </div>

        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Other File #4</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <?php if( ! $case->FS_Other_File_4__c) : ?>
                            <mark>No file choosen</mark>
                        <?php else : ?>
                            <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                        <input type="hidden" class="hidden-file" name="other-file_4-file">
                    </label>
                </div>
            </div>
        </div>

        <div class="app-col app-col-6">
            <div class="app-form-group">
                <label class="app-form-label">Other File #5</label>
                <div class="app-file-group">
                    <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                        <?php if( ! $case->FS_Other_File_5__c) : ?>
                            <mark>No file choosen</mark>
                        <?php else : ?>
                            <mark>File Has already been uploaded, Thank you.</mark>
                        <?php endif; ?>
                        <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                        <input type="hidden" class="hidden-file" name="other-file_5-file">
                    </label>
                </div>
            </div>
        </div>

        </div>


    <?php endif; ?>

    <?php if($case->Visa_Type__c == 'Investor (PNP)' || $case->Visa_Type__c == 'Investor (Intra-Company Transferee)') : ?>

        <strong><?php echo $case->Visa_Type__c; ?></strong>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport photo Applicant - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_photo_Applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-applicant">
                            <input type="hidden" class="hidden-file" name="passport-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport photo - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_photo_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-spouse">
                                <input type="hidden" class="hidden-file" name="passport-photo-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport photo - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_photo_Child_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-child_1">
                                <input type="hidden" class="hidden-file" name="passport-photo-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport photo - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_photo_Child_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-child_2">
                                <input type="hidden" class="hidden-file" name="passport-photo-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport photo - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_photo_Child_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-child_3">
                                <input type="hidden" class="hidden-file" name="passport-photo-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport photo - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_photo_Child_4__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-child_4">
                                <input type="hidden" class="hidden-file" name="passport-photo-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport photo - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_photo_Child_5__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_photo_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-photo-child_5">
                                <input type="hidden" class="hidden-file" name="passport-photo-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-spouse">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_1">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_2">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_3">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_4">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_5">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Previous and cancelled passports - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Previous_Passport_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-applicant">
                            <input type="hidden" class="hidden-file" name="previous-passport-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Previous and cancelled passports - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Previous_Passport_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-spouse">
                                <input type="hidden" class="hidden-file" name="previous-passport-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Previous and cancelled passports - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Previous_Passport_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-child_1">
                                <input type="hidden" class="hidden-file" name="previous-passport-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Previous and cancelled passports - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Previous_Passport_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-child_2">
                                <input type="hidden" class="hidden-file" name="previous-passport-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Previous and cancelled passports - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Previous_Passport_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-child_3">
                                <input type="hidden" class="hidden-file" name="previous-passport-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Previous and cancelled passports - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Previous_Passport_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-child_4">
                                <input type="hidden" class="hidden-file" name="previous-passport-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Previous and cancelled passports - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Previous_Passport_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Previous_Passport_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="previous-passport-child_5">
                                <input type="hidden" class="hidden-file" name="previous-passport-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Birth Certificate - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Birth_Certificate_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-applicant">
                            <input type="hidden" class="hidden-file" name="birth-certificate-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-spouse">
                                <input type="hidden" class="hidden-file" name="birth-certificate-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_1">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_2">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_3">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_4__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_4">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_5__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_5">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Education diploma - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Education_diploma_applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-applicant">
                            <input type="hidden" class="hidden-file" name="education-diploma-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Education diploma - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Education_diploma_spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-spouse">
                                <input type="hidden" class="hidden-file" name="education-diploma-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">IELTS Test - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_IELTS_Test_Applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_IELTS_Test_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts-test-applicant">
                            <input type="hidden" class="hidden-file" name="ielts-test-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">IELTS Test - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_IELTS_Test_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_IELTS_Test_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts-test-spouse">
                                <input type="hidden" class="hidden-file" name="ielts-test-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == 'Married') : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Marriage Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Marriage_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Marriage_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="marriage-certificate">
                                <input type="hidden" class="hidden-file" name="marriage-certificate-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Common Law declaration - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Common_Law_declaration__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Common_Law_declaration__c ) ? 'disabled' : $disabled; ?> type="file" name="common-law-declaration">
                                <input type="hidden" class="hidden-file" name="common-law-declaration-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Divorced") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Divorce Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Divorce_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Divorce_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="divorce-certificate-applicant">
                                <input type="hidden" class="hidden-file" name="divorce-certificate-applicant-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Proof of ownership of a propety & appraisal </label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Proof_of_ownership__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Proof_of_ownership__c ) ? 'disabled' : $disabled; ?> type="file" name="proof-of-ownership">
                            <input type="hidden" class="hidden-file" name="proof-of-ownership-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Personal bank statements </label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Personal_bank_statements__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Personal_bank_statements__c ) ? 'disabled' : $disabled; ?> type="file" name="personal-bank-statements">
                            <input type="hidden" class="hidden-file" name="personal-bank-statements-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col app-col app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">From</label>
                    <div class="input-icon">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="pbs-date-from" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->FS_Personal_bank_statements_From__c ?>">
                        <i class="i-calendar"></i>
                    </div>
                </div>
            </div>

            <div class="app-col app-col app-col app-col app-col-5th app-col-files">
                <div class="app-form-group">
                    <label class="app-form-label">To</label>
                    <div class="input-icon">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="pbs-date-to" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->FS_Personal_bank_statements_To__c ?>">
                        <i class="i-calendar"></i>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Business bank statements </label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Business_bank_statements__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Business_bank_statements__c ) ? 'disabled' : $disabled; ?> type="file" name="business-bank-statements">
                            <input type="hidden" class="hidden-file" name="business-bank-statements-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col app-col app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">From</label>
                    <div class="input-icon">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="bbs-date-from" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->FS_Business_bank_statements_From__c ?>">
                        <i class="i-calendar"></i>
                    </div>
                </div>
            </div>

            <div class="app-col app-col app-col app-col app-col-5th app-col-files">
                <div class="app-form-group">
                    <label class="app-form-label">to</label>
                    <div class="input-icon">
                        <input <?php echo $disabled; ?> <?php echo $titleDisabled; ?> type="text" name="bbs-date-to" class="app-form-text datepicker" placeholder="dd / mm / yyyy" value="<?php echo $case->FS_Business_bank_statements_To__c ?>">
                        <i class="i-calendar"></i>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Copy of certificate of incorporation</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Certificate_of_incorporation__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Certificate_of_incorporation__c ) ? 'disabled' : $disabled; ?> type="file" name="certificate-of-incorporation">
                            <input type="hidden" class="hidden-file" name="certificate-of-incorporation-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Appraisal assessment of business and Business properties</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Appraisal_assessment__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Appraisal_assessment__c ) ? 'disabled' : $disabled; ?> type="file" name="appraisal-assessment">
                            <input type="hidden" class="hidden-file" name="appraisal-assessment-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Company’s  tax return declaration #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Company_s_tax_return_declaration_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Company_s_tax_return_declaration_1__c ) ? 'disabled' : $disabled; ?> type="file" name="ctd_1">
                            <input type="hidden" class="hidden-file" name="ctd_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Company’s  tax return declaration #1 - Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-6">
                            <select <?php echo $disabled; ?> name="ctd_1_year">
                                <?php
                                $Years = [
                                    '2017',
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($Years as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Company_s_tax_return_declaration_1_Y__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Company’s  tax return declaration #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Company_s_tax_return_declaration_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Company_s_tax_return_declaration_2__c ) ? 'disabled' : $disabled; ?> type="file" name="ctd_2">
                            <input type="hidden" class="hidden-file" name="ctd_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Company’s  tax return declaration #2 - Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-6">
                            <select <?php echo $disabled; ?> name="ctd_2_year">
                                <?php
                                $Years = [
                                    '2017',
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($Years as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Company_s_tax_return_declaration_2_Y__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Business license</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Business_license__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Business_license__c ) ? 'disabled' : $disabled; ?> type="file" name="business-license">
                            <input type="hidden" class="hidden-file" name="business-license-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Copy of any Company certification or membership</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Copy_of_any_Company_certification__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Copy_of_any_Company_certification__c ) ? 'disabled' : $disabled; ?> type="file" name="company-certification">
                            <input type="hidden" class="hidden-file" name="company-certification-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Signing authority from bank</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Signing_authority_from_bank__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Signing_authority_from_bank__c ) ? 'disabled' : $disabled; ?> type="file" name="signing-authority-bank">
                            <input type="hidden" class="hidden-file" name="signing-authority-bank-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">List services provided by the company</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_List_services_provided_by_the_company__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_List_services_provided_by_the_company__c ) ? 'disabled' : $disabled; ?> type="file" name="list-services-provided">
                            <input type="hidden" class="hidden-file" name="list-services-provided-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Contract/s with clients</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Contract_s_with_clients__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Contract_s_with_clients__c ) ? 'disabled' : $disabled; ?> type="file" name="contracts-with-clients">
                            <input type="hidden" class="hidden-file" name="contracts-with-clients-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                            <input type="hidden" class="hidden-file" name="other-file_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_4__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                            <input type="hidden" class="hidden-file" name="other-file_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #5</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_5__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                            <input type="hidden" class="hidden-file" name="other-file_5-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>

    <?php if($case->Visa_Type__c == 'Student') : ?>
        <strong><?php echo $case->Visa_Type__c; ?></strong>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Digital photo - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Digital_photo_applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-applicant">
                            <input type="hidden" class="hidden-file" name="digital-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-spouse">
                                <input type="hidden" class="hidden-file" name="digital-photo-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_1">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_2">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_3">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_4">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_5">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-spouse">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_1">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_2">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_3">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_4">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_5">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_1__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_1__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_1">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_2__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_2__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_2">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_2-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_2_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_2-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_2_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_3__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_3__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_3">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_3-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_3_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_3-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_3_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_4__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_4__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_4">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_4-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->	FS_Bank_Statement_month_4_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_4-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_4_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Financial support letter (Parents-if applicable)</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Financial_support_letter__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Financial_support_letter__c ) ? 'disabled' : $disabled; ?> type="file" name="financial-support-letter">
                            <input type="hidden" class="hidden-file" name="financial-support-letter-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Copy of passports (Parents-if applicable)</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Copy_of_passports__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Copy_of_passports__c ) ? 'disabled' : $disabled; ?> type="file" name="copy-of-passports">
                            <input type="hidden" class="hidden-file" name="copy-of-passports-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Letter of Acceptance</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Letter_of_Acceptance__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Letter_of_Acceptance__c ) ? 'disabled' : $disabled; ?> type="file" name="letter-of-acceptance">
                            <input type="hidden" class="hidden-file" name="letter-of-acceptance-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Payment Receipt from School</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Payment_Receipt_from_School__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Payment_Receipt_from_School__c ) ? 'disabled' : $disabled; ?> type="file" name="payment-receipt-fc">
                            <input type="hidden" class="hidden-file" name="payment-receipt-fc-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Letter of motives</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Letter_of_motives__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Letter_of_motives__c ) ? 'disabled' : $disabled; ?> type="file" name="letter-of-motives">
                            <input type="hidden" class="hidden-file" name="letter-of-motives-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="app-row app-row-files">
            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c == "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "1") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "2") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c == "3") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                            <input type="hidden" class="hidden-file" name="other-file_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_4__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                            <input type="hidden" class="hidden-file" name="other-file_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #5</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_5__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                            <input type="hidden" class="hidden-file" name="other-file_5-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>

    <?php if($case->Visa_Type__c == 'Tourist Visa') : ?>
        <strong><?php echo $case->Visa_Type__c; ?></strong>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Digital photo - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Digital_photo_applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-applicant">
                            <input type="hidden" class="hidden-file" name="digital-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-spouse">
                                <input type="hidden" class="hidden-file" name="digital-photo-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_1">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_2">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_3">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_4">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_5">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-spouse">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_1">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_2">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_3">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_4">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_5">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_1__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_1__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_1">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_2__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_2__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_2">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_2-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_2_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_2-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_2_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_3__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_3__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_3">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_3-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_3_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_3-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_3_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_4__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_4__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_4">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_4-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->	FS_Bank_Statement_month_4_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_4-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_4_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Financial support letter (Parents-if applicable)</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Financial_support_letter__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Financial_support_letter__c ) ? 'disabled' : $disabled; ?> type="file" name="financial-support-letter">
                            <input type="hidden" class="hidden-file" name="financial-support-letter-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Copy of passports (Parents-if applicable)</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Copy_of_passports__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Copy_of_passports__c ) ? 'disabled' : $disabled; ?> type="file" name="copy-of-passports">
                            <input type="hidden" class="hidden-file" name="copy-of-passports-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Flight Ticket Reservation</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Flight_Ticket_Reservation__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Flight_Ticket_Reservation__c ) ? 'disabled' : $disabled; ?> type="file" name="flight-ticket-reservation">
                            <input type="hidden" class="hidden-file" name="flight-ticket-reservation-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Letter of motives</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Letter_of_motives__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Letter_of_motives__c ) ? 'disabled' : $disabled; ?> type="file" name="letter-of-motives">
                            <input type="hidden" class="hidden-file" name="letter-of-motives-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Education diploma - Main Applicant (if applicable)</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Education_diploma_applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-applicant">
                            <input type="hidden" class="hidden-file" name="education-diploma-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Education diploma - Spouse (if applicable)</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Education_diploma_spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-spouse">
                                <input type="hidden" class="hidden-file" name="education-diploma-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == 'Married') : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Marriage Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Marriage_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Marriage_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="marriage-certificate">
                                <input type="hidden" class="hidden-file" name="marriage-certificate-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Common Law declaration - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Common_Law_declaration__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Common_Law_declaration__c ) ? 'disabled' : $disabled; ?> type="file" name="common-law-declaration">
                                <input type="hidden" class="hidden-file" name="common-law-declaration-file">
                            </label>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Proof you own properties in your country of origin (if applicable)</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Proof_of_properties_ownership__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Proof_of_properties_ownership__c ) ? 'disabled' : $disabled; ?> type="file" name="Proof-of-properties-ownership">
                            <input type="hidden" class="hidden-file" name="Proof-of-properties-ownership-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="app-row app-row-files">
            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c == "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "1") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "2") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c == "3") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                            <input type="hidden" class="hidden-file" name="other-file_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_4__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                            <input type="hidden" class="hidden-file" name="other-file_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #5</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_5__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                            <input type="hidden" class="hidden-file" name="other-file_5-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>

    <?php if($case->Visa_Type__c == 'Working Holiday Visa') : ?>
        <strong><?php echo $case->Visa_Type__c; ?></strong>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Digital photo - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Digital_photo_applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-applicant">
                            <input type="hidden" class="hidden-file" name="digital-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_1__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_1__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_1">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Criminal record Clearance</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Criminal_record_Clearance__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Criminal_record_Clearance__c ) ? 'disabled' : $disabled; ?> type="file" name="criminal-record-clearance">
                            <input type="hidden" class="hidden-file" name="criminal-record-clearance-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">CV - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_CV_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_CV_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="cv-applicant">
                            <input type="hidden" class="hidden-file" name="cv-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Medicals</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->	FS_Medicals__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Medicals__c ) ? 'disabled' : $disabled; ?> type="file" name="medicals">
                            <input type="hidden" class="hidden-file" name="medicals-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Flight Ticket Reservation</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Flight_Ticket_Reservation__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Flight_Ticket_Reservation__c ) ? 'disabled' : $disabled; ?> type="file" name="flight-ticket-reservation">
                            <input type="hidden" class="hidden-file" name="flight-ticket-reservation-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                            <input type="hidden" class="hidden-file" name="other-file_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_4__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                            <input type="hidden" class="hidden-file" name="other-file_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #5</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_5__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                            <input type="hidden" class="hidden-file" name="other-file_5-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>
    <?php if($case->Visa_Type__c == 'Work Permit (LMIA)') : ?>
        <strong><?php echo $case->Visa_Type__c; ?></strong>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Digital photo - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Digital_photo_applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-applicant">
                            <input type="hidden" class="hidden-file" name="digital-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-spouse">
                                <input type="hidden" class="hidden-file" name="digital-photo-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_1">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_2">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_3">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_4">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_5">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-spouse">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_1">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_2">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_3">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_4">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_5">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        </div>
        <div class="app-row app-row-files">
            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_1__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_1__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_1">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_1-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_1_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_2__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_2__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_2">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_2-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_2_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_2-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_2_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_3__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_3__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_3">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_3-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_3_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_3-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_3_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-4">
                <div class="app-form-group">
                    <label class="app-form-label">Bank Statement month #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Bank_Statement_month_4__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Bank_Statement_month_4__c ) ? 'disabled' : $disabled; ?> type="file" name="bank-statement-month_4">
                            <input type="hidden" class="hidden-file" name="bank-statement-month_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Month</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_4-month">
                                <?php
                                $MonthsBank = [
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                ];
                                ?>
                                <?php foreach($MonthsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->	FS_Bank_Statement_month_4_Month__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-5th">
                <div class="app-form-group">
                    <label class="app-form-label">Year</label>
                    <div class="app-row">
                        <div class="app-col app-col app-col-12">
                            <select <?php echo $disabled; ?> name="bank-statement-month_4-year">
                                <?php
                                $YearsBank = [
                                    '2018',
                                    '2019',
                                ];
                                ?>
                                <?php foreach($YearsBank as $item) : ?>
                                    <option value="<?php echo $item ?>" <?php echo $case->FS_Bank_Statement_month_4_Year__c == $item ? 'selected' : ''  ?>><?php echo $item ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">CV - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_CV_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_CV_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="cv-applicant">
                            <input type="hidden" class="hidden-file" name="cv-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Medicals</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->	FS_Medicals__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Medicals__c ) ? 'disabled' : $disabled; ?> type="file" name="medicals">
                            <input type="hidden" class="hidden-file" name="medicals-file">
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-row app-row-files">
            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c == "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "1") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "2") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c == "3") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                            <input type="hidden" class="hidden-file" name="other-file_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_4__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                            <input type="hidden" class="hidden-file" name="other-file_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #5</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_5__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                            <input type="hidden" class="hidden-file" name="other-file_5-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>

    <?php if($case->Visa_Type__c == 'PNP') : ?>
        <strong><?php echo $case->Visa_Type__c; ?></strong>
        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Digital photo - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Digital_photo_applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-applicant">
                            <input type="hidden" class="hidden-file" name="digital-photo-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-spouse">
                                <input type="hidden" class="hidden-file" name="digital-photo-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_1">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_2">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_3">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_4">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Digital photo - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Digital_photo_child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Digital_photo_child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="digital-photo-child_5">
                                <input type="hidden" class="hidden-file" name="digital-photo-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Passport - All pages - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Passport_All_pages_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-applicant">
                            <input type="hidden" class="hidden-file" name="passport-all-pages-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Spouse__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-spouse">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_1__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_1">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_2__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_2">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_3__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_3">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_4__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_4">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Passport - All pages - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Passport_All_pages_Child_5__c ) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Passport_All_pages_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="passport-all-pages-child_5">
                                <input type="hidden" class="hidden-file" name="passport-all-pages-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Birth Certificate - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Birth_Certificate_Applicant__c ) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-applicant">
                            <input type="hidden" class="hidden-file" name="birth-certificate-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-spouse">
                                <input type="hidden" class="hidden-file" name="birth-certificate-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_1__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_1">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_2__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_2">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_3__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_3">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "4") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #4</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_4__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_4__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_4">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_4-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Number_of_Dependent_Children_Under_22__c >= "5") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Birth Certificate - Child #5</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Birth_Certificate_Child_5__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Birth_Certificate_Child_5__c ) ? 'disabled' : $disabled; ?> type="file" name="birth-certificate-child_5">
                                <input type="hidden" class="hidden-file" name="birth-certificate-child_5-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">IELTS Test - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_IELTS_Test_Applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_IELTS_Test_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts-test-applicant">
                            <input type="hidden" class="hidden-file" name="ielts-test-applicant-file">
                        </label>
                    </div>
                </div>
            </div>

            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">IELTS Test - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_IELTS_Test_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_IELTS_Test_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="ielts-test-spouse">
                                <input type="hidden" class="hidden-file" name="ielts-test-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Education diploma - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Education_diploma_applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-applicant">
                            <input type="hidden" class="hidden-file" name="education-diploma-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Education diploma - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Education_diploma_spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-spouse">
                                <input type="hidden" class="hidden-file" name="education-diploma-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>


            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Credential Evaluation (WES) - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_WES_Applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_WES_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="wes-applicant">
                            <input type="hidden" class="hidden-file" name="wes-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Credential Evaluation (WES) - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_WES_Spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_WES_Spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="wes-spouse">
                                <input type="hidden" class="hidden-file" name="wes-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Education diploma - Main Applicant</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Education_diploma_applicant__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-applicant">
                            <input type="hidden" class="hidden-file" name="education-diploma-applicant-file">
                        </label>
                    </div>
                </div>
            </div>


            <?php if ( $case->Marital_Status__c == 'Married' || $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Education diploma - Spouse</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Education_diploma_spouse__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Education_diploma_spouse__c ) ? 'disabled' : $disabled; ?> type="file" name="education-diploma-spouse">
                                <input type="hidden" class="hidden-file" name="education-diploma-spouse-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == 'Married') : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Marriage Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Marriage_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Marriage_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="marriage-certificate">
                                <input type="hidden" class="hidden-file" name="marriage-certificate-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Common Law Partners (Cohabitating at least 12 months)") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Common Law declaration - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Common_Law_declaration__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Common_Law_declaration__c ) ? 'disabled' : $disabled; ?> type="file" name="common-law-declaration">
                                <input type="hidden" class="hidden-file" name="common-law-declaration-file">
                            </label>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

            <?php if ( $case->Marital_Status__c == "Divorced") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Divorce Certificate - Main Applicant</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Divorce_Certificate_Applicant__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Divorce_Certificate_Applicant__c ) ? 'disabled' : $disabled; ?> type="file" name="divorce-certificate-applicant">
                                <input type="hidden" class="hidden-file" name="divorce-certificate-applicant-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <div class="app-row app-row-files">
            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "1") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c >= "2") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_You_Have__c == "3") : ?>

                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Main Applicant Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_a_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_a_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-applicant_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-applicant_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "1") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #1</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_1__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_1__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_1">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_1-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c >= "2") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #2</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_2__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_2__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_2">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_2-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $case->How_Many_Jobs_Did_Your_Spouse_Have__c == "3") : ?>
                <div class="app-col app-col-6">
                    <div class="app-form-group">
                        <label class="app-form-label">Employment reference letters - Spouse Job #3</label>
                        <div class="app-file-group">
                            <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                                <?php if( ! $case->FS_Employment_reference_letters_s_job_3__c) : ?>
                                    <mark>No file choosen</mark>
                                <?php else : ?>
                                    <mark>File Has already been uploaded, Thank you.</mark>
                                <?php endif; ?>
                                <input <?php echo ( $disabled == '' && $case->FS_Employment_reference_letters_s_job_3__c ) ? 'disabled' : $disabled; ?> type="file" name="employment-reference-spouse_job_3">
                                <input type="hidden" class="hidden-file" name="employment-reference-spouse_job_3-file">
                            </label>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="app-row app-row-files">
            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #1</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_1__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_1__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_1">
                            <input type="hidden" class="hidden-file" name="other-file_1-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #2</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_2__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_2__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_2">
                            <input type="hidden" class="hidden-file" name="other-file_2-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #3</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_3__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_3__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_3">
                            <input type="hidden" class="hidden-file" name="other-file_3-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #4</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_4__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_4__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_4">
                            <input type="hidden" class="hidden-file" name="other-file_4-file">
                        </label>
                    </div>
                </div>
            </div>

            <div class="app-col app-col-6">
                <div class="app-form-group">
                    <label class="app-form-label">Other File #5</label>
                    <div class="app-file-group">
                        <label class="file_upload clearfix">
														<span class="button clearfix">
															Choose file
															<i class="i-upload"></i>
														</span>
                            <?php if( ! $case->FS_Other_File_5__c) : ?>
                                <mark>No file choosen</mark>
                            <?php else : ?>
                                <mark>File Has already been uploaded, Thank you.</mark>
                            <?php endif; ?>
                            <input <?php echo ( $disabled == '' && $case->FS_Other_File_5__c ) ? 'disabled' : $disabled; ?> type="file" name="other-file_5">
                            <input type="hidden" class="hidden-file" name="other-file_5-file">
                        </label>
                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>

    <div class="app-footer-inner clearfix">
        <a href="#" class="app-footer-btn next-tab-btn" <?php echo $disabled; ?> >
            <?php echo isset( $disable_step_2 ) ? 'Completed' : 'Next'; ?>
            <span class="loading"></span>
        </a>
    </div>

    <input type="hidden" name="action" value="application_save_tab">
    <input type="hidden" name="tab" value="7">
    <input type="hidden" name="case_type" value="<?php echo $case->Type; ?>">
    <input type="hidden" name="need-validation" value="1">
    <?php echo wp_nonce_field( 'submit_application_save_tab' ) ?>
</form>