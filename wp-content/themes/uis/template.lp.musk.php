<?php
// Template Name: [LP] - Musk
?>
<?php get_header( 'lp-musk' ); ?>
<div class="container">
  <main id="main" role="main">
    <div id="content">
      <section class="post">
        <h1>Canada Nurtures Immigrant Success</h1>
        <div class="user-information">
          <div class="img-holder"><img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/author.png" alt="img description"></div>
          <div class="text-holder">
            <p>Analysis by <a href="#">Joe Silverstone</a> , UIS Writer</p>
            <p>Updated 10:51 AM ET,  <time datetime="01-02-2017">Monday April 16th, 2018</time></p>
          </div>
        </div>

        <p>Canada is one of the most exciting places in the world for young people to immigrate to begin their great adventure called life. Many success stories have started here. Perhaps the best known name of those who immigrated to Canada before making their mark on the global stage is <strong>Elon Musk</strong>. Pretty much everyone nowadays recognises his name, but fewer actually know his story.</p>

        <p class="video">
          <video src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>media/Musk.mp4" controls autoplay poster="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/musk-poster.jpg" controlsList="nodownload"></video>
        </p>

        <p>Born and raised in Pretoria, South Africa, by the time Elon was 12 he'd taught himself computer programmingand created his first original video game “Blaster” that he sold to PC and Office Technology for around $500!At age 17 Musk moved to Canada to study at Queen's University, Kingston. <br />
          Musk co-founded a software company, Zip2, which he sold just four years later to Compaq for $307 million ($22m to Musk). Taking half that he created X.com, an e-mail payment company that merged a year later with Confinity, a firm that had a small money transfer service they called PayPal. <br />
          Still just 31, Musk received $165m of the $1.5 billion eBay paid for PayPal in 2002.</p>

        <div class="img-wrapper dark-wrapper">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/musk-1.jpg" alt="img description">
        </div>

        <p> “I like video games,” Musk once admitted, “That's what got me into software engineering when I was a kid … nothing like saving the world”. And it seems he's still at it. On earth, Musk is the visionary CEO of groundbreaking electric carmaker Tesla, whose subsidiary SolarCity is the US 2nd largest solar solar power supplier.</p>

        <p>But his greatest passion is the stars. Fascinated by interstellar travel from childhood, Musk founded SpaceX, now the world's largest private rocket engine producer, with contracts from NASA to replace the Space Shuttle. Musk's stated goal with SpaceX is to create “a true spacefaring civilization”. </p>

        <div class="img-wrapper dark-wrapper">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/musk-2.jpg" alt="img description">
        </div>

        <p>It’s now easier than ever to apply for a Canadian Visa. Thousands are moving to Canada due to the relatively minimal requirements and easy process of applying. However, just like everything new, it’s the early adopters who benefit the most. Elon Musk wouldn’t be who he is without Canada’s open arms policy of welcoming diverse immigration from South Africa. There simply is no better time for immigrants to apply for Canadian Citizenship. </p>
      </section>

      <div class="banner-holder">
        <a href="https://www.uiscanada.com/youngprofessionals/" class="banner">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/bunner-1.jpg" alt="img description">
        </a>
      </div>
    </div>
    <aside id="sidebar">


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
                <input id="email" maxlength="80" name="email" size="20" type="text" placeholder="Email">
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
              <div class="header-form-line-check">
                By Clicking Get Started Now you’re agreeing to the <a style="color:#fff" href="https://www.uiscanada.com/terms-of-use/">T&C</a> and <a style="color:#fff" href="https://www.uiscanada.com/privacy-policy/">Privacy Policy</a>
              </div>
              <button class="btn" type="submit">Get Started Now!</button>
            </form>
          </div>
          <div class="advertional">-Advertorial-</div>
        </div>
      </div>








      <a class="widget" href="https://www.uiscanada.com/families/">
        <div class="img-widget">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/side-11.jpg" alt="img">
        </div>
        <h3>Canada Open Doors for Families</h3>
      </a>
      <a class="widget" href="https://www.uiscanada.com/youngprofessionals/">
        <div class="img-widget">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/side-12.jpg" alt="img">
        </div>
        <h3>Young Professionals Canada is Waiting for You</h3>
      </a>
      <a class="widget" href="https://www.uiscanada.com/why-canada/">
        <div class="img-widget">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/side-13.jpg" alt="img">
        </div>
        <h3>Top 8 Reasons why Canada is the best choice</h3>
      </a>
      <a class="widget" href="https://www.uiscanada.com/openarms/">
        <div class="img-widget">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/side-14.jpg" alt="img">
        </div>
        <h3>Canada to welcome Immigrants with Open Arms</h3>
      </a>
      <a class="widget " href="https://www.uiscanada.com/youngprofessionals/">
        <div class="img-widget">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/' ?>images/img-01.jpg" alt="img">
        </div>
      </a>
    </aside>
  </main>
</div>
</div><?php //Wrapper closer (Opening is in the header. do not delete me please) ?>

<?php get_footer( 'lp-musk' ); ?>