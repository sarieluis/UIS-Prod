<?php
/*
 Template Name: About Page
*/

global $post;

get_header(); ?>

    <!-- BUNNER -->	
	
	<div class="static-block static-block_sm" id="static-block-mobile">
            <div class="container" id="containerFormMobile">
			<div id="xBtn" onclick="returnPage()"></div>
                <?php show_register_form(); ?>
            </div>
        </div>
		
		<div id="videoMobileDiv">
	<video playsinline autoplay muted loop id="myMobileVideo" poster="../../wp-content/themes/uis/css/images/Video_Explainer_Dark.png">
            <source src="https://www.uiscanada.com/wp-content/themes/uis/video/business_explainer_different_color.mp4" type="video/mp4"> 
        </video>
		<div id="muteBtn" onclick="mutedVideo()"></div> 
		<div id="signUpBtn" onclick="showFormMobile()"></div>
		</div>
    <div class="bunner-wrap">
	
	<div id="videoDiv">
	<video id="myVideo" onclick="playorstopvideo()" poster="../../wp-content/themes/uis/css/images/Video_Explainer_Dark.png">
            <source src="https://www.uiscanada.com/wp-content/themes/uis/video/business_explainer_different_color.mp4" type="video/mp4"> 
        </video>
		</div>
		
		<div id="playBtn" onclick="playorstopvideo()">
        <img id="playBtnDesktop" src="../../wp-content/themes/uis/css/images/play_btn.jpg"/>
		</div>
		
        <div class="bunner-img full-img" id="bunner_img_desktop">
            <?php echo get_the_post_thumbnail($post->ID) ?>
        </div>

        <div class="static-block static-block_sm" id="static_desktop">
            <div class="container">
                <?php show_register_form(); ?>
            </div>
        </div>
    </div>
    <!-- BUNNER END -->
	<!-- Who Are you -->
	
	<div class="services" id="whoWeAre">
        <div class="container">
            <div class="content-inner">	
                <h3 class="title text-left">Who we are?</h3>
				<p>
UIS Canada is a reputable immigration firm based out of Vancouver, BC, with a team of professional immigration Consultants specializing in Canadian immigration, refugee and citizenship law. Nir Babani the Founder and Managing Director of UIS Canada has been practicing in British Columbia for over a decade, bringing a wealth of knowledge and expertise to clients.
<br/><br/>
Our experienced team of Professional Consultants have successfully represented numerous individuals, families and businesses on immigration, refugee and citizenship matters throughout Canada and internationally. We advocate fiercely on behalf of our clients, bringing to bear our legal expertise as well as our commitment to excellence to uphold our track record for providing high quality legal services.
<br/><br/>
Our immigration firm in British Columbia reflects the diversity of the clients we serve with a proven track record of success in dealing with complex immigration, refugee and citizenship matters. We represent clients all across Canada and internationally.
<br/><br/>
We serve employers and employees seeking temporary or permanent residency in Canada, assess their background, qualifications and eligibility and advise on their best options and application process. Whether you seek to file a refugee claim, appeal the refusal of your case by an immigration officer, fight your removal from Canada, or require representation on a citizenship matter, we will assist, guide and advise you with utmost care and professionalism.

				</p>
                
            </div>
        </div>
    </div>

    <!-- ABOUT US -->
    <div class="about-us" id="aboutUsDiv">
        <div class="container">
            <div class="content-inner">
                <?php the_cfc_field('about_us_page', 'about_us_page_text_1', $post->ID) ?>
            </div>
        </div>
    </div>
    <!-- ABOUT US END-->

    <!-- SERVICES -->
    <div class="services" id="servicesDiv">
        <div class="container">
            <div class="content-inner">
                <?php the_cfc_field('about_us_page', 'about_us_page_text_2', $post->ID) ?>
                <a href="#" class="btn btn-lg">Get Started Now!</a>
            </div>
        </div>
    </div>
    <!-- SERVICES END-->

    <!-- ABOUT US -->
    <div class="about-us about-us-descr" id="aboutUsDescr">
        <div class="container">
            <div class="content-inner">
                <!--<?php the_cfc_field('about_us_page', 'about_us_page_text_3', $post->ID) ?>-->
                <h3 class="m-2">Where and who we are</h3>
                <p>With offices in the city of Vancouver, in the Canadian province of British Columbia, we are a multicultural team many of whom are themselves former immigrants or first generation Canadian-born children of immigrants. We offer a highly personal service that reflects the unique personal needs of our clients, and helps you navigate the complex pathways to fulfilling your Canadian dream.</p>

            </div>
        </div>
    </div>
	
	
	<div class="static-block static-block_sm" id="static-block-mobileDown">
            <div class="container">
                <?php show_register_form(); ?>
            </div>
        </div>


    <!-- ABOUT US END-->

<?php get_footer(); ?>