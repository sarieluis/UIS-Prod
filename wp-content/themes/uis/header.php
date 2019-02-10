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

    <meta charset="utf-8" />
    <title><?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php wp_head(); ?>

</head>
<body>

<!-- Crazy Egg -->
<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0072/7417.js" async="async"></script>
<!-- End Crazy Egg -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WC4MFB8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php if( get_query_var( 'pagename' ) == 'thank-you' || basename(get_page_template()) == 'thankyou-page.php' ) : ?>
  <!-- Offer Conversion: UIS Canada -->
  <iframe src="https://uiscanada.go2cloud.org/aff_l?offer_id=2" scrolling="no" frameborder="0" width="1" height="1"></iframe>
  <!-- // End Offer Conversion -->
<?php endif; ?>

<div class="wrapper" id="wrapperDiv">

    <?php if( basename(get_page_template()) != 'thankyou-page.php' && get_query_var('pagename') != 'login' && !is_profile()) : ?>
    <!-- HEADER -->
    <header class="header" id="headerDiv">
        <div class="header-top">
            <div class="container">
                <div class="header-top_inner">
                  <?php if( is_user_logged_in() && current_user_can( 'edit_user', get_current_user_id() ) ) : ?>

                    <a class="personal-application-header-link" href="<?php echo get_site_url() . '/personal-application' ?>" >
                      <?php echo __( 'Personal Application', 'uiscanada' ); ?>
                    </a>

                  <?php endif; ?>
                    <div class="header-phone">
                        <!--<?php
                        if(is_active_sidebar('header-phone')){
                            dynamic_sidebar('header-phone');
                        }
                        ?>-->
                        <div class="textwidget"><p><span class="phone">+1-604-262-3728</span></p>
                        </div>
                    </div>
                    <div class="header-actions">
                        <?php if(is_user_logged_in()) : ?>
                            <a href="<?php echo wp_logout_url( home_url() ); ?>" class="login">
                                <i class="i-login"></i>
                                <span>Logout</span>
                            </a>
                        <?php elseif( basename( get_page_template() ) != 'template.fibonatix-thankyou-page.php' ): ?>
                            <a href="/login" class="login">
                                <i class="i-login"></i>
                                <span>Login</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom_inner">
                    <div class="header-logo">
                        <a href="<?php echo site_url() ?>" class="logo for-img">
                            <img src="<?php echo wp_get_attachment_image_url(get_theme_mod( 'custom_logo' ), 'full') ?>" alt="">
                        </a>
                    </div>
                    <div class="header-nav">
                        <nav class="nav">
                            <?php
                            if( has_nav_menu('primary') ) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'echo' => true,
                                    'items_wrap'      => '<ul class="nav-list">%3$s</ul>',
                                    'walker' => new HeaderMenuWalker()
                                ));
                            }
                            ?>
                        </nav>



                    </div>

                    <div class="mobile-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->
<?php endif; ?>