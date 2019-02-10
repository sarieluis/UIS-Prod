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
</head>
<body>
<?php
$video = get_field( 'background_video' );
$video_url = is_array( $video ) && isset( $video['url'] ) ? $video['url'] : get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/video/Young_Pro_Video.mp4';
$video_mime_type = is_array( $video ) && isset( $video['mime_type'] ) ? $video['mime_type'] : 'video/webm';
$video_placeholder_image = get_field( 'video_placeholder_image' ) ? get_field( 'video_placeholder_image' ) : get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/video/poster.jpg';
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WC4MFB8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="header">
  <div class="header-video" style="background: url( <?php echo $video_placeholder_image; ?> ) center no-repeat">
    <video class="desktop-video" autoplay muted loop playsinline>
      <source src="<?php echo $video_url; ?>" type="<?php echo $video_mime_type; ?>" />
      <!--      <source src="--><?php //echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/video/video-desktop.mp4' ?><!--" type="video/mp4" />-->
      <!--      <source src="--><?php //echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/video/video-desktop.ogv' ?><!--" type="video/ogg" />-->
    </video>
    <video class="mobile-video" autoplay muted loop playsinline poster="<?php echo $video_placeholder_image; ?>">
      <source src="<?php echo $video_url; ?>" type="<?php echo $video_mime_type; ?>" />
      <!--      <source src="--><?php //echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/video/video-mobile.mp4' ?><!--" type="video/mp4" />-->
      <!--      <source src="--><?php //echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/video/video-mobile.ogv' ?><!--" type="video/ogg" />-->
    </video>
  </div>
  <div class="header-top">
    <div class="container">
      <a href="#" onclick="openLink('https://www.uiscanada.com/?utm_campaign=')" class="logo">
        <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/logo.png' ?>" alt="">
      </a>
      <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-sticker.png' ?>" class="header-top-sticker" alt="">
    </div>
  </div>
  <div class="header-inner">
    <div class="container">
      <h1 class="page-title">
        <?php echo get_field( 'first_title' ) ? get_field( 'first_title' ) : 'Young Professionals' ?>
        <span><?php echo get_field( 'second_title' ) ? get_field( 'second_title' ) : 'Canada is Waiting For You!' ?></span>
      </h1>


      <div class="header-form">
        <div class="header-form-inner">
          <h3 class="header-form-title">Take the first step towards your Canadian Visa</h3>

          <form class="register_form_lp_yp" action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="post">

            <input type="hidden" name="oid" value="00D0Y00000356Uq">
            <input type="hidden" name="retURL" value="http://">
            <input type="hidden" name="thankyou_url" value="<?php echo site_url( get_query_var( 'pagename' ) . '-thank-you' ) ?>" >
            <?php echo wp_nonce_field( 'submit_registration_lp', '_wpnonce', true, false ) ?>
            <input type="hidden" name="action" value="register_user_lp">
            <input type="hidden" name="lp_ref_url" value="<?php echo wp_get_raw_referer(); ?>">
            <input type="hidden" name="lp_url" value="<?php echo site_url( get_query_var( 'pagename' ) ) ?>" >
            <input type="hidden" name="utm_campaign" value="<?php echo isset( $_REQUEST['utm_campaign'] ) ? $_REQUEST['utm_campaign'] : '' ?>" >
            <input type="hidden" id="region" name="region" value="">
			

            <div class="header-form-line">
              <input id="full_name" maxlength="40" name="full_name" size="20" type="text" placeholder="Full Name">
              <p class="error-message"></p>
            </div>

            <div class="clearfix"></div>

            <div class="header-form-line">
              <input  id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email">
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

            <div class="clearfix"></div>

            <div class="header-form-line" id="country-field">
              <input type="hidden" class="form-text country-select" placeholder="Country" name="country" required />
              <p class="error-message"></p>
            </div>

            <button class="btn" type="submit">Get Started Now!</button>
            <div class="legal-text">
              <p>By Clicking Get Started Now you’re agreeing to the <a style="color: #fff; text-decoration: none" href="https://www.uiscanada.com/terms-of-use/">T&C</a> <a style="color: #fff; text-decoration: none" href="https://www.uiscanada.com/privacy-policy/">and Privacy Policy</a></p>
            </div>
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
