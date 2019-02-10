<?php
/*
 Template Name: Contact Page
*/

global $post;


get_header(); ?>

    <!-- MAP -->
    <!--<div class="map-wrap">
        <?php echo do_shortcode('[wpgmza id="1"]') ?>
    </div>-->

    <div class="map-wrap">


        <div style="width: 100%"><iframe width="100%" height="548" src="https://maps.google.com/maps?width=100%&amp;height=548&amp;hl=en&amp;q=68%20WATER%20STREET%2C%20OFFICE%20406%2C%20%20Gastown%2C%20Vancouver%2C%20BC%20V6B%201A4%2C%20Canada+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Map a route</a></iframe></div><br />

    </div>

    <!-- MAP END -->

    <!-- CONTACT US -->
    <div class="contact-us">
        <div class="container">
            <h1 class="text-left">Contact us</h1>
            <div class="contact-wrap clearfix">
                <div class="contact-col">
                    <!--<?php
                    if(is_active_sidebar('contact-us')){
                        dynamic_sidebar('contact-us');
                    }
                    ?>-->
                    <div class="textwidget"><div class="contact-block">
                            <p class="contact-title">Address</p>
                            <div class="addresses-block">
                                <div class="address">
                                    <div class="contact-text">68 Water Street, Office 406,<br>
                                        Gastown, Vancouver, <br>
                                        BC V6B 1A4, Canada
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="contact-text">Eichhornstraße 3,</div>
                                    <div class="contact-text">10785,</div>
                                    <div class="contact-text">Berlin,</div>
                                    <div class="contact-text">Germany</div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-block">
                            <p class="contact-title">Phones</p>
                            <div class="contact-text"><a href="tel:+15874043939">+1-604-262-3728</a><br>
                                <a href="tel:+18889952030">+1-888-995-2030 (Toll free world wide)</a></div>
                        </div>
                        <div class="contact-block">
                            <p class="contact-title">E-mail</p>
                            <div class="contact-text"><a href="mailto:support@uiscanada.com">support@uiscanada.com</a></div>
                        </div>
                    </div>

                </div>
                <div class="contact-col">
                    <div class="contact-block contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="138" title="Contact form 1"]') ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT US END -->

<?php get_footer(); ?>