<?php
/*
 Template Name: Contact us Thank you page
*/
global $post;

$slider = get_cfc_meta('homepage_slider');
$facts = get_cfc_meta('homepage_facts');
$steps = get_cfc_meta('homepage_steps');
$express = get_cfc_meta('homepage_express');

get_header();
?>
  <iframe src="http://uiscanada.go2cloud.org/aff_l?offer_id=2" scrolling="no" frameborder="0" width="1" height="1" style="float: left"></iframe>

  <!-- Content -->
  <div class="thankyou-content">

  <!--  Floating Canada Flag Image  -->
    <img id="floating-flag" src="<?php echo get_stylesheet_directory_uri() . '/inmanage/assets/images/flag.png' ?>" title="UIS Canada" alt="UIS Canada" />
  <!--  End Floating Canada Flag Image  -->

    <div class="container">
      <div class="content-inner">

        <!-- Payment confirmation message -->
        <div class="payment-confirmation-message">
          <h1>
            Thank You <checkedbox></checkedbox>
          </h1>
          <p>Payment is confirmed</p>
        </div>
        <!-- End Payment confirmation message -->

        <!-- Red Message -->
        <div class="red-message">
          <p>Now What?</p>
        </div>
        <!-- END Red Message -->

        <!-- After payment steps -->
        <div class="after-payment-steps">
          <ul class="steps-list">
            <li>
              An email has been sent to <?php echo get_transient( 'lead_mail' ); ?> with your personal login details, evaluation next steps and your invoice.
            </li>
            <li>
              Login into your account, fill out yje evaluation form amd submit your evaluation application for review by out legal team.
            </li>
          </ul>
        </div>
        <!-- End After payment steps -->

        <!-- Good luck message -->
        <div class="good-luck-message">
          <p>Good Luck!</p>
        </div>
        <!-- End Good luck message -->

      </div>
    </div>
  </div>
  <!-- END Content -->


<?php get_footer( 'fibonatix' ); ?>