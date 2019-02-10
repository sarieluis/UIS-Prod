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
  <meta HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
  <title><?php the_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WC4MFB8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Header -->
<header class="header">
  <div class="header-top">
    <div class="container">
      <a href="#" onclick="openLink('https://www.uiscanada.com/?utm_campaign=')" class="logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inmanage/lp-pages/families/assets/images/logo.png" alt="<?php the_title(); ?>">
      </a>
    </div>
  </div>
  <div class="header-inner">
    <div class="header-banner">
      <div class="container">
        <h1 class="page-title"><span>Canada</span> Open Doors<br/> for Families</h1>
      </div>
    </div>
    <div class="header-flag">
      <div class="container">
        <div class="header-flag-text">
          <p>Are you looking to build a new life for yourself & your family? Then Canada is waiting for you!</p>
        </div>
      </div>
    </div>
    <div class="header-form">
      <div class="container">
        <div class="header-form-inner">
          <h3 class="header-form-title">Take the first step towards your Canadian Visa</h3>

          <!-- <form action="#">
            <div class="header-form-line">
              <input type="text" name="first-name" value="" placeholder="First Name">
            </div>
            <div class="header-form-line">
              <input type="text" name="last-name" value="" placeholder="Last Name">
            </div>
            <div class="header-form-line">
              <input type="email" name="last-name" value="" placeholder="Email">
            </div>
            <div class="header-form-line">
              <input type="tel" name="phone" value="" placeholder="Phone Number">
            </div>
            <div class="header-form-line">
              <input type="text" name="country" value="" placeholder="Country">
            </div>
            <div class="header-form-line">
              <input type="checkbox" id="agree" name="agree" value="">
              <label for="agree">I agree with the terms of use & privacy policy</label>
            </div>
            <button class="btn" type="submit">Get Started Now!</button>
          </form> -->

          <form class="register_form_lp" action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="post">

            <input type="hidden" name="oid" value="00D0Y00000356Uq">
            <input type="hidden" name="retURL" value="http://">
            <input type="hidden" name="thankyou_url" value="<?php echo site_url( get_query_var( 'pagename' ) . '-thank-you' ) ?>" >
            <?php echo wp_nonce_field( 'submit_registration_lp', '_wpnonce', true, false ) ?>
            <input type="hidden" name="action" value="register_user_lp">
            <input type="hidden" name="lp_ref_url" value="<?php echo wp_get_raw_referer(); ?>">
            <input type="hidden" name="lp_url" value="<?php echo site_url( get_query_var( 'pagename' ) ) ?>" >
			<input type="hidden" name="utm_campaign" value="<?php echo isset( $_REQUEST['utm_campaign'] ) ? $_REQUEST['utm_campaign'] : '' ?>" >


            <!--  ----------------------------------------------------------------------  -->
            <!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
            <!--  these lines if you wish to test in debug mode.                          -->
            <!--  <input type="hidden" name="debug" value=1>                              -->
            <!--  <input type="hidden" name="debugEmail" value="yoni@i-cloudius.com">     -->
            <!--  ----------------------------------------------------------------------  -->

            <div class="header-form-line">
              <input id="full_name" maxlength="40" name="full_name" size="20" type="text" placeholder="Full Name" />
              <p class="error-message"></p>
            </div>

            <div class="header-form-line">
              <input  id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email" />
              <p class="error-message"></p>
            </div>

            <div id="phone-code" class="header-form-line header-form-line-inline-4">
              <span class="phone-code-flag flag flag-us"></span>
              <input  id="phone_code" maxlength="40" class="auto-phone-code phone-code-select" name="phone_code" size="20" type="text" placeholder="+1" />
              <p class="error-message"></p>
            </div>

            <div class="header-form-line header-form-line-inline-8 no-padding">
              <input  id="phone" maxlength="40" name="phone" size="20" type="text" placeholder="Phone Number" />
              <p class="error-message"></p>
            </div>

            <div class="clearfix"></div>

            <div class="header-form-line" id="country-field">
              <input type="hidden" class="form-text country-select" placeholder="Country" name="country" required />
              <p class="error-message"></p>
            </div>

            <div class="header-form-line">
              <input type="checkbox" id="agree" name="confirmation" value="" checked>
              <label for="confirmation">I agree with the <a style="color: #919191; text-decoration: none" href="https://www.uiscanada.com/terms-of-use/">terms of use</a> & <a style="color: #919191; text-decoration: none" href="https://www.uiscanada.com/privacy-policy/">privacy policy</a></label>
              <p class="error-message"></p>
            </div>

            <input type="submit" name="submit" class="btn" value="Get Started Now!">

          </form>
		  <div id="FlagCountry">
			<div id="userCountry"></div>
			<div id="planAnm"></div>
			<div id="canadaCountry"></div>
		  </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End Header -->