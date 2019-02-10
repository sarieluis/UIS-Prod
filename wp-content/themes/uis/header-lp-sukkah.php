
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WC4MFB8');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_title() ?></title>
    <?php wp_head(); ?>
    <!--<script src="../../../wp-content/themes/uis/inmanage/lp-pages/sukkah/assets/js/main.js"></script>-->
</head>
<body>

<div id="HeaderMobile">
    <div id="HeaderMobileLogo"></div>
</div>
<div id="Main">
    <div class="question-content">
        <div id="LogoQuestionDiv"></div>
        <div class="content-qu">
            <ul class="questions">
                <li id="qu-steep01" class="steeps steeps_active">
                    <h1>Find Out If You're Eligible for a&nbsp;Canadian Visa</h1>
                    <div class="question-steepss">
                        <div class="question-steep"></div>
                        <div class="question-steep"></div>
                        <div class="question-steep question-steep_active"></div>
                    </div>
                    <img src="../../wp-content/themes/uis/inmanage/lp-pages/flag/assets/images/briefcase.png">
                    <h2>How Soon Do You Need Your Canadian Visa?</h2>
                    <div class="button btnOptionA">Immediately</div>
                    <div class="button btnOptionB" >6 months -1 Year</div>
                    <div class="button btnOptionC" >1-2 Years</div>
                </li>
                <li id="qu-steep02" class="steeps">
                    <h1>Find Out If You're Eligible for a&nbsp;Canadian Visa</h1>
                    <div class="question-steepss">
                        <div class="question-steep"></div>
                        <div class="question-steep question-steep_active"></div>
                        <div class="question-steep"></div>
                    </div>
                    <img src="../../wp-content/themes/uis/inmanage/lp-pages/flag/assets/images/dollar.png">
                    <h2>What Is Your Average Monthly Income?</h2>
                    <div class="button btnOptionA">$1500-$2500</div>
                    <div class="button btnOptionB">$2500-$5000</div>
                    <div class="button btnOptionC">$5000 Or More</div>
                </li>
                <li id="qu-steep03" class="steeps">
                    <h1>Find Out If You're Eligible for a&nbsp;Canadian Visa</h1>
                    <div class="question-steepss">
                        <div class="question-steep question-steep_active"></div>
                        <div class="question-steep"></div>
                        <div class="question-steep"></div>
                    </div>
                    <img src="../../wp-content/themes/uis/inmanage/lp-pages/flag/assets/images/Phone_White.png">
                    <!--<div id="testUIS"><h2>Test By County</h2></div>-->
                    <h2>When Is The Best Time To Reach You?</h2>
                    <div class="button btnOptionA">Morning</div>
                    <div class="button btnOptionB">Noon</div>
                    <div class="button btnOptionC">Evening</div>
                </li>
                <li id="qu-steep04" class="steeps">
                    <h2>Unfortunately you’re not eligible to receive a Canadian Visa at&nbsp;this time.<br>Please try again at a later date.</h2>
                </li>
                <li id="qu-steep05" class="steeps">
                    <h1>Well done!</h1>
                    <img class="rotate-refresh" src="../../wp-content/themes/uis/inmanage/lp-pages/flag/assets/images/refresh.png">
                    <h2>You’re now eligible to begin the application process for your Canadian Visa, Claim it Now!</h2>
                </li>
            </ul>
        </div>
    </div>
    <div id="MainDiv">
        <div id="LogoDiv"></div>
        <div id="CheckScroll"></div>
        <div id="Form">
            <div id="FormTitle">TAKE THE FIRST STEP TOWARDS YOUR CANADIAN VISA</div>
            <form class="register_form_lp_yp" action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="post">
                <input type="hidden" name="oid" value="00D0Y00000356Uq">
                <input type="hidden" name="retURL" value="http://">
                <input type="hidden" name="thankyou_url" value="<?php echo site_url( get_query_var( 'pagename' ) . '-thank-you' ) ?>">
                <?php echo wp_nonce_field( 'submit_registration_lp', '_wpnonce', true, false ) ?>
                <input type="hidden" name="action" value="register_user_lp">
                <input type="hidden" name="lp_ref_url" value="<?php echo wp_get_raw_referer(); ?>">
                <input type="hidden" name="lp_url" value="<?php echo site_url( get_query_var( 'pagename' ) ) ?>">
                <input type="hidden" name="utm_campaign" value="<?php echo isset( $_REQUEST['utm_campaign'] ) ? $_REQUEST['utm_campaign'] : '' ?>" >
                <input type="hidden" name="Work_Experience_of_2_yrs__c" value="" />
                <input type="hidden" name="Monthly_Income_over_1500__c" value="" />
                <input type="hidden" name="Level_of_English__c" value="" />
                <input type="hidden" name="Have_In_Savings__c" value="" />
                <input type="hidden" name="Average_Monthly_Income__c" value="" />
                <input type="hidden" name="Visa_needed_in__c" value="" />
                <input type="hidden" name="Would_like_to_be_contacted_between__c" value="" />
                <input type="hidden" id="region" name="region" value="">

                <div id="FormDiv">
                    <div id="FullNameDiv" class="header-form-line">
                        <input id="full_name" maxlength="40" name="full_name" size="20" type="text" placeholder="Full Name">
                        <p class="error-message"></p>
                    </div>
                    <div id="EmailDiv" class="header-form-line">
                        <input id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email" />
                        <p class="error-message"></p>
                    </div>
                    <div id="FullPhone">
                        <div class="header-form-line phone-line header-form-line-inline-4" id="phone-code">
                            <span class="phone-code-flag flag flag-us"></span>
                            <input id="phone_code" maxlength="40" class="auto-phone-code phone-code-select" name="phone_code" size="20" type="text">
                            <p class="error-message"></p>
                        </div>
                        <div class="header-form-line phone-line header-form-line-inline-8 no-padding" id="PhoneDiv">
                            <input id="phone" maxlength="40" class="" name="phone" size="20" type="text" placeholder="Phone">
                            <p class="error-message"></p>
                        </div>
                    </div>
                    </div>


                <div class="header-form-line" id="country-field">
                    <input type="hidden" class="form-text country-select" placeholder="Country" name="country" required />
                    <p class="error-message"></p>
                </div>

                <div class="legal-text">
                    <p>By Clicking Get Started Now you’re agreeing<br/> to the <a href="https://www.uiscanada.com/terms-of-use/" target="_blank">T&C</a> and <a href="https://www.uiscanada.com/privacy-policy/" target="_blank">Privacy Policy</a></p>
                </div>
                <div id="SubmitBtnDiv">
                    <button class="btn" id="SubmitBtn" type="submit">Get Started Now!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="MainMiddle1">
    <div id="MainMiddle1Div">
        <div id="MainMiddle1TitleDiv">
            Career Opportunity
        </div>
        <div id="MainMiddle1Content1Div">
            Are you looking for a great new career opportunity<br/>
            in a beautiful and friendly country?
        </div>
        <div id="MainMiddle1Content2Div">
            With a growing economy, Canada is actively looking for young,<br/>
            talented people like <a>you</a> to diversify its work-force!
        </div>
    </div>
</div>

<div id="MainMiddle2">
    <div id="MainMiddle2Div">
        <div id="MainMiddle2TitleDiv">Better Life</div>
        <div id="MainMiddle2ImagesDiv">
            <div id="MainMiddle2ImagesLeftImageDiv">
                <div id="MainMiddle2ImagesLeftImageLabelDesktopDiv">
                    Do you want a better life for yourself and your family?
                </div>
                <img class="MainMiddle2ImageDiv" src="../../../wp-content/themes/uis/inmanage/lp-pages/sukkah/assets/images/640/Family_640_639x411.png"/>
                <div class="MainMiddle2ImagesImageLabelDiv">
                    Do you want a better life</br>
                    for yourself and your family?
                </div>
            </div>
            <div id="MainMiddle2ImagesMiddleImageDiv">
                <div id="MainMiddle2ImagesMiddleImageLabelDesktopDiv">
                    Do you want to maximize your academic or professional potential?
                </div>
                <img class="MainMiddle2ImageDiv" src="../../../wp-content/themes/uis/inmanage/lp-pages/sukkah/assets/images/640/Man_640_639x411.png"/>
                <div class="MainMiddle2ImagesImageLabelDiv">
                    Do you want to maximize your academic</br>
                    or professional potential?
                </div>
            </div>
            <div id="MainMiddle2ImagesRightImageDiv">
                <div id="MainMiddle2ImagesRightImageLabelDesktopDiv">
                    Do you want to build a safe home in an open, democratic society?
                </div>
                <img class="MainMiddle2ImageDiv" src="../../../wp-content/themes/uis/inmanage/lp-pages/sukkah/assets/images/640/House_640_639x411.png"/>
                <div class="MainMiddle2ImagesImageLabelDiv">
                    Do you want to build a safe home in an </br>
                    open, democratic society?
                </div>
            </div>
        </div>
        <div id="MainMiddle2ContentDiv">
            <div id="MainMiddle2ContentTitleDiv">
                CANADA is waiting for you
            </div>
            <div id="MainMiddle2ContentTextDiv">
                A multicultural country with a thriving economy, Canada actively welcomes</br>
                immigration from every corner of the globe. Awaiting immigration with open arms,</br>
                Canada approves the applications of over half a million individuals and families, </br>
                business people and students every year.</br>
                Make sure you and your family are among them.
            </div>
            <a href="#">
            <div id="MainMiddle2ContentButtonDiv">
                Get Started Now!
            </div>
            </a>
        </div>
    </div>
</div>

<div id="MainMiddle3">
    <div id="MainMiddle3TopIcon"></div>
    <div id="MainMiddle3Title">FAQ</div>
    <div id="MainMiddle3Div">
        <div id="MainMiddle3LeftDiv">
            <div id="MainMiddle3LeftTopDiv">
                <div id="MainMiddle3LeftTopTitleDiv">Why Use a RCIC</div>
                <div id="MainMiddle3LeftTopTextDiv">
                    Canada offers over 60 types of visas. Our
                    regulated RCIC expert will observe your profile
                    and recommend the visa type best
                    suited for you.
                </div>
            </div>
            <div id="MainMiddle3LeftBottomDiv">
                <div id="MainMiddle3LeftBottomTitleDiv">
                    What is included in the assessment?
                </div>
                <div id="MainMiddle3LeftBottomTextDiv">
                    <ul id="MainMiddle3LeftBottomTextUlDiv">
                        <li>Which type of visas you’re eligible for.</li>
                        <li>Which locations in Canada your skills are needed.</li>
                        <li>Optimization of your immigration portfolio.</li>
                        <li>Preparation of your immigration visa.</li>
                    </ul>
                </div>
            </div>
            <div id="MainMiddle3LeftAgentMobileDiv">
                <div id="MainMiddle3LeftAgentMobileLabelDiv">
                    <div id="MainMiddle3LeftAgentMobileLabelNameDiv">
                        UIS Canada RCIC</br>
                        Nir Babani
                    </div>
                    <div id="MainMiddle3LeftAgentMobileLabelLicenseDiv">
                        License # R407271
                    </div>
                </div>
            </div>
        </div>
        <div id="MainMiddle3RightDiv">
            <div id="MainMiddle3RightLabelDiv">
                <div id="MainMiddle3RightLabelNameDiv">
                    UIS Canada RCIC</br>
                    Nir Babani
                </div>
                <div id="MainMiddle3RightLabelLicenseDiv">License # R407271</div>
            </div>
        </div>
    </div>
</div>

<div id="MainMiddle4">
    <div id="MainMiddle4Div">
        <div id="MainMiddle4TitleDiv">Testimonial</div>
        <div id="MainMiddle4GalleryDiv">
            <div id="MainMiddle4GalleryLeftArrowDiv"></div>
            <div id="MainMiddle4GalleryPersonDiv"></div>
            <div id="MainMiddle4GalleryRightArrowDiv"></div>
        </div>
        <div id="MainMiddle4PersonNameDiv">Edward O’Neill</div>
        <div id="MainMiddle4PersonTextDiv">
            I’m an account manager from Dublin, Ireland. I’m now happily living in Toronto, Canada. I received my work permit through Express Entry Visa – Young professionals category, and was amazed at how many great companies wanted me to come work for them. My future has never looked brighter!
        </div>
    </div>
</div>

<div id="Footer">
    <div id="FooterDIv">
        <div id="FooterLeftDIv">
            <a href="https://www.uiscanada.com"><div id="FooterLeftLogoDIv"></div></a>
        </div>
        <div id="FooterMiddleDIv">
            +1-604-262-3728</br>
            <a href="mailto:Support@uiscanada.com">Support@uiscanada.com</a>

        </div>
        <div id="FooterRightDIv">
            68 Water Street, Office 406,</br>
            Gastown, Vancouver,</br>
            BC V6B 1A4, Canada
        </div>
    </div>
</div>











