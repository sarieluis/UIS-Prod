<div class="form-big-container">
  <div class="muve-form"></div>
  <div class="header-form" id="header-form">
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

        <div class="header-form-line">
          <input id="full_name" maxlength="40" name="full_name" size="20" type="text" placeholder="Full Name">
          <p class="error-message"></p>
        </div>

        <div class="header-form-line">
          <input  id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email">
          <p class="error-message"></p>
        </div>

        <div class="header-form-line phone-line header-form-line-inline-4" id="phone-code">
          <span class="phone-code-flag flag flag-us"></span>
          <input id="phone_code" class="auto-phone-code phone-code-select" maxlength="40" name="phone_code" size="20" type="text" placeholder="Phone code">
          <p class="error-message"></p>
        </div>

        <div class="header-form-line phone-line header-form-line-inline-8 no-padding">
          <input id="phone" class="" maxlength="40" name="phone" size="20" type="text" placeholder="Phone number">
          <p class="error-message"></p>
        </div>

        <div class="clearfix"></div>

        <div class="header-form-line" id="country-field">
          <input type="hidden" id="country_code" class="form-text country-select" placeholder="Country" name="country" required />
          <p class="error-message"></p>
        </div>

        <button class="btn" type="submit">Get Started Now!</button>
        <div class="header-form-line-check">
          By Clicking Get Started Now you’re agreeing to the <a style="color:#fff" href="https://www.uiscanada.com/terms-of-use/">T&C</a> and <a style="color:#fff" href="https://www.uiscanada.com/privacy-policy/">Privacy Policy</a>
        </div>
      </form>
    </div>
    <div class="advertional">-Advertorial-</div>
  </div>
</div>