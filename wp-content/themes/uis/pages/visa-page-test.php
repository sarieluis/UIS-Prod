<?php
/*
 Template Name: Visa Page Test Video 2
*/

global $post;

$visas = get_cfc_meta('visas_page_types'); 

get_header(); 
get_header('visatype-videotest'); ?>


    <!-- BUNNER -->
	<video autoplay muted loop id="myVideo">
  <source src="https://www.uiscanada.com/wp-content/themes/uis/inmanage/lp-pages/visa_type_videotest/assets/Express_Entry.mp4" type="video/mp4">
</video>
    <div class="bunner-wrap">
        <div class="bunner-img full-img">
            <?php echo get_the_post_thumbnail($post->ID) ?>
        </div>

        <div class="static-block static-block_sm">
            <div class="container">
                <?php show_register_form(); ?>
            </div>
        </div>
    </div>
    <!-- BUNNER END -->

    <!-- VISAS -->
    <?php if(!empty($visas)) : ?>
    <div class="visas">
        <div class="container">
            <h1 class="text-left"><?php the_cfc_field('visa_page', 'visa_page_title', $post->ID) ?></h1>
            <p class="visas-content"><?php the_cfc_field('visa_page', 'visa_page_subtitle', $post->ID) ?></p>
            <div class="visa-list">
                <div class="visa-row">

                    <?php foreach ($visas as $key => $item) : ?>
                        <div class="visa-col">
                            <div class="visa-item">
                                <div class="visa-img-line">
                                    <div class="visa-img for-img">
                                        <img src="<?php echo wp_get_attachment_image_src($item['visas_page_types_image'], 'full')[0] ?>" alt="">
                                    </div>
                                </div>
                                <div class="visa-descr">
                                    <p class="visa-title"><?php echo $item['visas_page_types_title'] ?></p>
                                    <div class="visa-text">
                                        <p><?php echo $item['visas_page_types_description'] ?></p>
                                    </div>
                                </div>
                                <div class="visa-actions">
                                    <a href="#" class="js-shop-popup" data-popup="popup-<?php echo $key ?>">Click here for more information</a>
                                </div>
                                <div class="popup-overlay visas-popup" data-popup="popup-<?php echo $key ?>">
                                    <div class="popup-centering">
                                        <div class="popup">
                                            <div class="popup-header">
                                                <div class="for-img">
                                                    <img src="<?php echo wp_get_attachment_image_src($item['visas_page_types_image'], 'full')[0] ?>" alt="">
                                                </div>
                                                <p class="popup-title"><?php echo $item['visas_page_types_title'] ?></p>
                                                <a href="#" class="popup-close js-close-popup">&nbsp;</a>
                                            </div>
                                            <div class="popup-body">
                                                <?php echo $item['visas_page_types_popup'] ?>
                                            </div>
                                            <div class="popup-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="visa-footer"><?php the_cfc_field('visa_page', 'visa_page_footer', $post->ID) ?></div>

        </div>
    </div>
    <?php endif; ?>
    <!-- VISAS END -->

<?php get_footer(); ?>