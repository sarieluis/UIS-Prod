<?php
/*
 Template Name: Visa Page
*/

global $post;

$visas = get_cfc_meta('visas_page_types');

get_header(); ?>

    <!-- BUNNER -->
	
	<div class="static-block static-block_sm" id="static-block-mobile">
            <div class="container" id="containerFormMobile">
			<div id="xBtn" onclick="returnPage()"></div>
                <?php show_register_form(); ?>
            </div>
        </div>
	
	<div id="videoMobileDiv">
	<video playsinline autoplay muted loop id="myMobileVideo" poster="../../wp-content/themes/uis/css/images/Express_Entry_poster_new.jpg">
            <source src="https://www.uiscanada.com/wp-content/themes/uis/video/Express_Entry.mp4" type="video/mp4"> 
        </video>
		<div id="muteBtn" onclick="mutedVideo()"></div> 
		<div id="signUpBtn" onclick="showFormMobile()"></div>
		</div>
		
    <div class="bunner-wrap">
	
	<div id="videoDiv">
	<video id="myVideo" onclick="playorstopvideo()" poster="../../wp-content/themes/uis/css/images/Express_Entry_poster_new.jpg">
            <source src="https://www.uiscanada.com/wp-content/themes/uis/video/Express_Entry.mp4" type="video/mp4"> 
        </video>  
		
	</div>
	
		<div id="playBtn" onclick="playorstopvideo()">
        <img id="playBtnDesktop" src="../../wp-content/themes/uis/css/images/play_btn.jpg"/>
		</div>
		
        <div class="bunner-img full-img">
            <?php echo get_the_post_thumbnail($post->ID) ?>
        </div>

        <div class="static-block static-block_sm" id="static_desktop">
            <div class="container">
                <?php show_register_form(); ?>
            </div>
        </div>
    </div>
    <!-- BUNNER END -->

    <!-- VISAS -->
    <?php if(!empty($visas)) : ?>
    <div class="visas" id="visasDiv">
        <div class="container" id="containerDiv">
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
	
	<div class="static-block static-block_sm" id="static-block-mobileDown">
            <div class="container">
                <?php show_register_form(); ?>
            </div>
        </div>
		
    <?php endif; ?>
    <!-- VISAS END -->

<?php get_footer(); ?>