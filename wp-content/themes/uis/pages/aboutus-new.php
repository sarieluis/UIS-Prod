<?php
/*
 Template Name: About Page New
*/

global $post;

get_header(); ?>

    <!-- BUNNER -->
		
		
    <div class="bunner-wrap">
	
	<video id="myVideo" onclick="playorstopvideo()" poster="../../wp-content/themes/uis/css/images/Busines_ Explainer_poster_new.png"> 
            <source src="https://www.uiscanada.com/wp-content/themes/uis/video/business-explainer-Purple.mp4" type="video/mp4"> 
        </video>  
		
		<div id="playBtn" onclick="playorstopvideo()">
        <img id="playBtnDesktop" src="../../wp-content/themes/uis/css/images/play_btn.jpg"/>
		</div>
	
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

    <!-- ABOUT US -->
    <div class="about-us">
        <div class="container">
            <div class="content-inner">
                <?php the_cfc_field('about_us_page', 'about_us_page_text_1', $post->ID) ?>
            </div>
        </div>
    </div>
    <!-- ABOUT US END-->

    <!-- SERVICES -->
    <div class="services">
        <div class="container">
            <div class="content-inner">
                <?php the_cfc_field('about_us_page', 'about_us_page_text_2', $post->ID) ?>
                <a href="#" class="btn btn-lg">Get Started Now!</a>
            </div>
        </div>
    </div>
    <!-- SERVICES END-->

    <!-- ABOUT US -->
    <div class="about-us about-us-descr">
        <div class="container">
            <div class="content-inner">
                <?php the_cfc_field('about_us_page', 'about_us_page_text_3', $post->ID) ?>
            </div>
        </div>
    </div>
	


    <!-- ABOUT US END-->

<?php get_footer(); ?>