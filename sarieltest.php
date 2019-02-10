<?php
function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    //$result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
    if($ip_data && $ip_data->geoplugin_countryName != null){
        //$result['country'] = $ip_data->geoplugin_countryCode;
        //$result['city'] = $ip_data->geoplugin_city;
        $result = $ip_data->geoplugin_countryCode;
    }
    return $result;
}

$countryClient = getLocationInfoByIp();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- GCLID Parameter -->
    <script>
        window.onload = function getGclid() {
            document.getElementById("GCLID").value = (name = new     RegExp('(?:^|;\\s*)gclid=([^;]*)').exec(document.cookie)) ?
                name.split(",")[1] : ""; }
        // window.onload() may not be supported by all browsers.
        // If you experience problems submitting the GCLID as a
        // hidden field, consider using an alternate method to
        // call this function on page load.
    </script>
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
    <title>Flag</title>
    <link rel='stylesheet' id='uis-lp-flag-style-css'  href='http://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/flag/assets/css/style_NoQuestion.min.css?ver=1.0.0' type='text/css' media='all' />
</head>
<body>

<form class="register_form_lp_yp" action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="post">
    <input type="hidden" name="oid" value="00D0Y00000356Uq">
    <input type="hidden" name="retURL" value="http://">
    <input type="hidden" name="thankyou_url" value="<?php echo site_url( get_query_var( 'pagename' ) . '-thank-you' ) ?>">
    <?php echo wp_nonce_field( 'submit_registration_lp', '_wpnonce', true, false ) ?>
    <input type="hidden" name="action" value="register_user_lp">
    <input type="hidden" name="lp_ref_url" value="<?php echo wp_get_raw_referer(); ?>">
    <input type="hidden" name="lp_url" value="<?php echo site_url( get_query_var( 'pagename' ) ) ?>">
    <input type="hidden" name="utm_campaign" value="<?php echo isset( $_REQUEST['utm_campaign'] ) ? $_REQUEST['utm_campaign'] : '' ?>" >
    <input type="hidden" id="GCLID" name="GCLID__c" value="<?php echo isset( $_REQUEST['gclid'] ) ? $_REQUEST['gclid'] : '' ?>" >

    <div class="header-form-line">
        <input id="full_name" maxlength="40" name="full_name" size="20" type="text" placeholder="Full Name">
        <p class="error-message"></p>
    </div>
    <div class="header-form-line">
        <input id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email" />
        <p class="error-message"></p>
    </div>

    <div class="header-form-line phone-line header-form-line-inline-4" id="phone-code">
        <!--              <div class="icon-phone">-->
        <!--                <svg x="0px" y="0px"-->
        <!--                     viewBox="0 0 51.413 51.413" style="enable-background:new 0 0 51.413 51.413;" xml:space="preserve">-->
        <!--                    <g>-->
        <!--                      <g>-->
        <!--                        <path d="M25.989,12.274c8.663,0.085,14.09-0.454,14.823,9.148h10.564c0-14.875-12.973-16.88-25.662-16.88-->
        <!--                    			c-12.69,0-25.662,2.005-25.662,16.88h10.482C11.345,11.637,17.398,12.19,25.989,12.274z"/>-->
        <!--                        <path d="M5.291,26.204c2.573,0,4.714,0.154,5.19-2.377c0.064-0.344,0.101-0.734,0.101-1.185H10.46H0-->
        <!--                    			C0,26.407,2.369,26.204,5.291,26.204z"/>-->
        <!--                        <path d="M40.88,22.642h-0.099c0,0.454,0.039,0.845,0.112,1.185c0.502,2.334,2.64,2.189,5.204,2.189-->
        <!--                    			c2.936,0,5.316,0.193,5.316-3.374H40.88z"/>-->
        <!--                        <path d="M35.719,20.078v-1.496c0-0.669-0.771-0.711-1.723-0.711h-1.555c-0.951,0-1.722,0.042-1.722,0.711-->
        <!--                    			v1.289v1h-11v-1v-1.289c0-0.669-0.771-0.711-1.722-0.711h-1.556c-0.951,0-1.722,0.042-1.722,0.711v1.496v1.306-->
        <!--                    			C12.213,23.988,4.013,35.073,3.715,36.415l0.004,8.955c0,0.827,0.673,1.5,1.5,1.5h40c0.827,0,1.5-0.673,1.5-1.5v-9-->
        <!--                    			c-0.295-1.303-8.493-12.383-11-14.987V20.078z M19.177,37.62c-0.805,0-1.458-0.652-1.458-1.458s0.653-1.458,1.458-1.458-->
        <!--                    			s1.458,0.652,1.458,1.458S19.982,37.62,19.177,37.62z M19.177,32.62c-0.805,0-1.458-0.652-1.458-1.458s0.653-1.458,1.458-1.458-->
        <!--                    			s1.458,0.652,1.458,1.458S19.982,32.62,19.177,32.62z M19.177,27.621c-0.805,0-1.458-0.652-1.458-1.458-->
        <!--                    			c0-0.805,0.653-1.458,1.458-1.458s1.458,0.653,1.458,1.458C20.635,26.969,19.982,27.621,19.177,27.621z M25.177,37.62-->
        <!--                    			c-0.805,0-1.458-0.652-1.458-1.458s0.653-1.458,1.458-1.458c0.806,0,1.458,0.652,1.458,1.458S25.983,37.62,25.177,37.62z-->
        <!--                    			 M25.177,32.62c-0.805,0-1.458-0.652-1.458-1.458s0.653-1.458,1.458-1.458c0.806,0,1.458,0.652,1.458,1.458-->
        <!--                    			S25.983,32.62,25.177,32.62z M25.177,27.621c-0.805,0-1.458-0.652-1.458-1.458c0-0.805,0.653-1.458,1.458-1.458-->
        <!--                    			c0.806,0,1.458,0.653,1.458,1.458C26.635,26.969,25.983,27.621,25.177,27.621z M31.177,37.62c-0.806,0-1.458-0.652-1.458-1.458-->
        <!--                    			s0.652-1.458,1.458-1.458s1.458,0.652,1.458,1.458S31.983,37.62,31.177,37.62z M31.177,32.62c-0.806,0-1.458-0.652-1.458-1.458-->
        <!--                    			s0.652-1.458,1.458-1.458s1.458,0.652,1.458,1.458S31.983,32.62,31.177,32.62z M31.177,27.621c-0.806,0-1.458-0.652-1.458-1.458-->
        <!--                    			c0-0.805,0.652-1.458,1.458-1.458s1.458,0.653,1.458,1.458C32.635,26.969,31.983,27.621,31.177,27.621z"/>-->
        <!--                      </g>-->
        <!--                    </g>-->
        <!--                    </svg>-->
        <!--              </div>-->
        <span class="phone-code-flag flag flag-us"></span>
        <input id="phone_code" maxlength="40" class="auto-phone-code phone-code-select" name="phone_code" size="20" type="text">
        <p class="error-message"></p>
    </div>

    <div class="header-form-line phone-line header-form-line-inline-8 no-padding">
        <input id="phone" maxlength="40" class="" name="phone" size="20" type="text">
        <p class="error-message"></p>
    </div>

    <div class="header-form-line" id="country-field">
        <input type="hidden" class="form-text country-select" placeholder="Country" name="country" required />
        <p class="error-message"></p>
    </div>

    <div class="legal-text">
        <p>By Clicking Get Started Now you’re agreeing to the <a href="https://www.uiscanada.com/terms-of-use/" target="_blank">T&C</a> and <a href="https://www.uiscanada.com/privacy-policy/" target="_blank">Privacy Policy</a></p>
    </div>
    <button class="btn" type="submit">Get Started Now!</button>
</form>

<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <a href="#" onclick="openLink('https://www.uiscanada.com/?utm_campaign=')" class="footer-top-logo footer-top-item">
                <img src="../../wp-content/themes/uis/inmanage/lp-pages/flag/assets/images/logo-footer.png" alt="">
            </a>
            <div class="footer-top-item">
                <span>68 Water Street, Office 406,</span>
                <span>Gastown, Vancouver,</span>
                <span>BC V6B 1A4, Canada</span>
            </div>
            <div class="footer-top-item">
                <span><a href="tel:+15874043939">+1-604-262-3728</a></span>
                <span><a href="mailto:Support@uiscanada.com">Support@uiscanada.com</a></span>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright-top">Copyright &copy; 2017</div>
            <div class="copyright-bottom">All rights reserved to U.M.C Ltd. Eichhornstraße 3, 10785 Berlin, Germany</div>
        </div>
    </div>
</footer>


</body>
</html>
