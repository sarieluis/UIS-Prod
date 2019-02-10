<?php if( basename(get_page_template()) != 'thankyou-page.php' && get_query_var('pagename') != 'login' && !is_profile() ) : ?>

<?php if( get_query_var('pagename') != 'terms-of-use' && get_query_var('pagename') != 'privacy-policy' && get_query_var('pagename') != 'faq' ) : ?>
<!-- SEO -->
<div class="seo" id="seoDiv">
    <div class="container">
        <?php
        if(is_active_sidebar('footer-headlines')){
            dynamic_sidebar('footer-headlines');
        }
        ?>
    </div>
</div>
<!-- SEO END -->
<?php endif; ?>


<!-- FOOTER -->
<footer class="footer" id="footerDiv">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top_inner">
                <div class="footer-logo">
                    <a href="<?php echo site_url() ?>" class="logo for-img">
                        <img src="<?php echo get_template_directory_uri() ?>/img/assets/logo_white.png" alt="">
                    </a>
                </div>
                <div class="footer-contact">
                    <div class="footer-contact-text">
                       <!--<?php
                        if(is_active_sidebar('footer-sidebar-2')){
                            dynamic_sidebar('footer-sidebar-2');
                        }
                        ?>-->
                        <div class="textwidget"><p class="footer-title">68 Water Street, Office 406,</p>
                            <p>
                                Gastown, Vancouver,<br>
                                BC V6B 1A4, Canada
                            </p>
                            <p class="contact"><a href="tel:+15874043939">+1-604-262-3728</a><br>
                                <a href="mailto:support@uiscanada.com">support@uiscanada.com</a></p>
                        </div>

                        <div class="footer-social">
                            <div class="social-list">
                                <?php if(get_option('in_link')) : ?>
                                    <a href="<?php echo get_option('in_link') ?>" target="_blank" class="social-link">
                                        <i class="i-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(get_option('inst_link')) : ?>
                                    <a href="<?php echo get_option('inst_link') ?>" target="_blank" class="social-link">
                                        <i class="i-instagram"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(get_option('gp_link')) : ?>
                                    <a href="<?php echo get_option('gp_link') ?>" target="_blank" class="social-link">
                                        <i class="i-g-plus"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(get_option('fb_link')) : ?>
                                    <a href="<?php echo get_option('fb_link') ?>" target="_blank" class="social-link">
                                        <i class="i-facebook"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-menu">
                    <nav class="nav">

                        <?php
                        if( has_nav_menu('footer_menu') ) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer_menu',
                                'container' => false,
                                'echo' => true,
                                'items_wrap'      => '<ul class="footer-nav">%3$s</ul>',
                                'walker' => new FooterMenuWalker()
                            ));
                        }
                        ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom_inner">
                <div class="footer-copy">
                    <!--<p>All rights reserved to U.M.C Ltd. Johannstrasse 37, Unternehmerstadt, Düsseldorf, 40476, Germany </p>-->
					<p>
					All rights reserved to U.M.C Ltd. 
					</br>
					Eichhornstraße 3, 10785 Berlin, Germany.
					</p>
                    <p>Copyright &copy; <?php echo date("Y"); ?></p>
                </div>
                <div class="footer-payment">
                    <a href="#" class="footer-payment-link for-img">
                        <img src="<?php echo get_template_directory_uri() ?>/img/assets/footer-payment-1.png" alt="">
                    </a>
                    <a href="#" class="footer-payment-link for-img">
                        <img src="<?php echo get_template_directory_uri() ?>/img/assets/footer-payment-2.png" alt="">
                    </a>
                    <a href="#" class="footer-payment-link for-img">
                        <img src="<?php echo get_template_directory_uri() ?>/img/assets/footer-payment-3.png" alt="">
                    </a>
                    <a href="#" class="footer-payment-link for-img">
                        <img src="<?php echo get_template_directory_uri() ?>/img/assets/footer-payment-4.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER END -->
<?php endif; ?>

</div>

<div class="hidden"></div>

<?php wp_footer() ?>

<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>