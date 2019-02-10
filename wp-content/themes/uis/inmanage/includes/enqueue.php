<?php
add_action( 'wp_enqueue_scripts', 'uis_inm_enqueue_scripts', 100 );
function uis_inm_enqueue_scripts() {
  global $wp_scripts, $wp_styles;

  /** Register Scripts **/
  wp_register_script( 'uis-lp-entrepreneur-question-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/entrepreneur/assets/js/question.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-entrepreneur-main-questions-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/entrepreneur/assets/js/main-question.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-entrepreneur-main-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/entrepreneur/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-sukkah-main-questions-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/sukkah/assets/js/main-question.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-sukkah-main-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/sukkah/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-sukkah-question-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/sukkah/assets/js/question.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-summary-page-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/newthankyoupage/assets/js/summary.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-canadanews-articles-list-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canadanews/js/articles.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-canadanews-articlebanner-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canadanews/js/articlebanner.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-young-professionals-iphone-inline-video-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/js/iphone-inline-video.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-young-professionals-main-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-canada_is_bustling-scroll-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canada_is_bustling/assets/js/scroll.js', array( 'jquery' ), '1.0.0', true );
  
  wp_register_script( 'uis-lp-falg-main-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/flag/assets/js/main.min.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-falg-question-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/flag/assets/js/question.min.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-falg-question-b-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/flag/assets/js/question_b.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-falg-iphone-inline-video-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/flag/assets/js/iphone-inline-video.min.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-lp-musk-main-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/js/scroll.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-about-us-js', get_stylesheet_directory_uri() . '/js/aboutus.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-visatype-js', get_stylesheet_directory_uri() . '/js/visatype.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-canadanews-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canadanews/js/main.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-general-js', get_stylesheet_directory_uri() . '/js/general.min.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'uis-sariel-question-js', get_stylesheet_directory_uri() . '/inmanage/lp-pages/testpage/assets/js/question.js', array( 'jquery' ), '1.0.0', true );

  
  
 

   /** Register Styles **/
    // Register Style: Template - UIS Landing page "Erez and Sariel Test".
    wp_register_style( 'erez-sariel-test-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/erez/assets/css/main.css', false, '1.0.0' );
    // Register Style: Template - UIS Landing page "LP Entrepreneur-Questions".
    wp_register_style( 'uis-lp-entrepreneur-questions-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/entrepreneur/assets/css/main-questions.css', false, '1.0.0' );
    // Register Style: Template - UIS Landing page "LP Entrepreneur".
    wp_register_style( 'uis-lp-entrepreneur-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/entrepreneur/assets/css/main.css', false, '1.0.0' );
    // Register Style: Template - UIS Landing page "LP Lake-Questions".
    wp_register_style( 'uis-lp-sukkah-questions-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/sukkah/assets/css/main-questions.css', false, '1.0.0' );
    // Register Style: Template - UIS Landing page "LP Lake".
    wp_register_style( 'uis-lp-sukkah-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/sukkah/assets/css/main.css', false, '1.0.0' );
    // Register Style: Template - UIS Landing page "Payment Summary".
    wp_register_style( 'uis-payment-summary-main-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/newthankyoupage/assets/paymentsummary.css', false, '1.0.0' );
    // Register Style: Template - UIS Landing page "Canadanews New Version".
  wp_register_style( 'uis-canadanews-newversion-main-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canadanews/css/newmain.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Exciting Things ".
  wp_register_style( 'uis-excitingthings-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/excitingthings/assets/css/main.min.css', false, '1.0.0' );
   
   // Register Style: Template - UIS Landing page "Family Questions".
  wp_register_style( 'uis-lp-family-questions-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/family/assets/css/style_question.min.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Family".
  wp_register_style( 'uis-lp-family-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/family/assets/css/style_NoQuestion.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Canad News Header".
  wp_register_style( 'uis-canadanews-header-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/educationalguide/assets/css/header.css', false, '1.0.0' );
   
   // Register Style: Template - UIS Landing page "Canadanews".
  wp_register_style( 'uis-canadanews-main-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canadanews/css/main.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Visa Type Fixed CSS".
  wp_register_style( 'uis-visatype-us-fixed', get_stylesheet_directory_uri() . '/css/visatype.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "About Us New".
  wp_register_style( 'uis-about-us-main', get_stylesheet_directory_uri() . '/css/main.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "About Us Fixed CSS".
  wp_register_style( 'uis-about-us-fixed', get_stylesheet_directory_uri() . '/css/aboutus.css', false, '1.0.0' );
   
   // Register Style: Template - UIS Landing page "Young Professionals LP Question".
  wp_register_style( 'uis-lp-young-professionals-questions-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/css/stylequestions.min.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Musk LP".
  wp_register_style( 'uis-lp-musk-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/musk/assets/css/main.min.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Medical Questions LP".
  wp_register_style( 'uis-lp-medical-questions-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/engineers_questions/assets/css/stylemedical.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Medical LP".
  wp_register_style( 'uis-lp-medical-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/css/stylemedical.min.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Countries Flags".
  wp_register_style( 'uis-flag-country-style', get_stylesheet_directory_uri() . '/css/downflags.min.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Engineers Questions".
  wp_register_style( 'uis-lp-engineers-questions-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/engineers_questions/assets/css/style.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Flag Question".
  wp_register_style( 'uis-lp-flag-question-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/flag/assets/css/style_question.min.css', false, '1.0.0' );
  
   // Register Style: Template - UIS Landing page "Flag". 
  wp_register_style( 'uis-lp-flag-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/flag/assets/css/style_NoQuestion.min.css', false, '1.0.0' );
   
   // Register Style: Template - UIS Landing page "NewThankYouPage".
  wp_register_style( 'uis-test-newthankyoupage-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/newthankyoupage/assets/style.css', false, '1.0.0' );

  // Register Style: Template - UIS Landing page "Families".
  wp_register_style( 'uis-lp-families-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/families/assets/css/style.css', false, '1.0.0' );

  // Register Style: Template - UIS Landing page "Young Professionals".
  wp_register_style( 'uis-lp-young-professionals-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/css/style.min.css', false, '1.0.0' );

  // Register Style: Template - UIS Landing page "Openarms".
  wp_register_style( 'uis-openarms-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/openarms/assets/css/main.min.css', false, '1.0.0' );

  // Register Style: Template - Fibonatix thank you page. (Payment confirmation)
  wp_register_style( 'uis-fibonatix-thankyou-style', get_stylesheet_directory_uri() . '/inmanage/assets/css/template.fibonatix.thank-you.css', false, '1.0.0' );

  // Register Style: Template - UIS Landing page "Canada is bustling";
  wp_register_style( 'uis-canada-is-bustling-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/canada_is_bustling/assets/css/main.min.css', false, '1.0.0' );
  
  // Register Style: Template - UIS Landing page "Sariel Test".
  wp_register_style( 'uis-lp-testsariel-question-style', get_stylesheet_directory_uri() . '/inmanage/lp-pages/testpage/assets/css/style_question.css', false, '1.0.0' );


  /** Enqueue styles depending on current page template **/
  if( basename(get_page_template()) == 'template.lp.families.php' ||  basename(get_page_template()) == 'template-test.php' ) {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_style( 'uis-lp-families-style' );
  } else if( basename(get_page_template()) == 'template.lp.young-professionals.php' || basename(get_page_template()) == 'template-lp-engineers.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
    wp_enqueue_style( 'uis-lp-young-professionals-style' );
	wp_enqueue_style( 'uis-flag-country-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' ); 
	
  }  else if( basename(get_page_template()) == 'template-lp-medical.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
    wp_enqueue_style( 'uis-lp-medical-style' );
	wp_enqueue_style( 'uis-flag-country-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' );
	
  } else if( basename(get_page_template()) == 'template-flag-countries-test.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
    wp_enqueue_style( 'uis-lp-young-professionals-style' ); 
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' );
	
	
  } else if( basename(get_page_template()) == 'template.openarms.php'  ) {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
    wp_enqueue_style( 'uis-openarms-style' ); 
	wp_enqueue_script( 'uis-general-js' ); 
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  } else if( basename(get_page_template()) == 'template.canadanews.openarms.php'  ) {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-header-style' );
    wp_enqueue_style( 'uis-excitingthings-style' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'uis-canadanews-articlebanner-js' );
    //wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  }  else if( basename(get_page_template()) == 'template.canadanews.educationalguide.php' || basename(get_page_template()) == 'template.canadanews.jobsearch.php' || basename(get_page_template()) == 'template.canadanews.million-immigrants.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-header-style' );
    wp_enqueue_style( 'uis-excitingthings-style' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'uis-canadanews-articlebanner-js' );
    //wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  } else if( basename(get_page_template()) == 'template.canadanews.immigrantscities.php' ||  basename(get_page_template()) == 'template.canadanews.immigrantprofile.php' || basename(get_page_template()) == 'template.canadanews.costofliving.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-header-style' );
    wp_enqueue_style( 'uis-excitingthings-style' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'uis-canadanews-articlebanner-js' );
    //wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  }	else if( basename(get_page_template()) == 'template.canadanews.excitingthings.php' || basename(get_page_template()) == 'template.canadanews.bookofrights.php' || basename(get_page_template()) == 'template.canadanews.salaries.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-header-style' );
    wp_enqueue_style( 'uis-excitingthings-style' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'uis-canadanews-articlebanner-js' );
    //wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  } else if( basename( get_page_template() ) == 'template.fibonatix-thankyou-page.php' ) {

    // Enqueue Style: Template - Fibonatix thank you page. (Payment confirmation)
    wp_enqueue_style( 'uis-fibonatix-thankyou-style' );

  } else if( basename( get_page_template() ) == 'template.lp.canada-is-bustling.php') { 

    // Enqueue Style: Template - UIS Landing Page: "Canada is bustling"
    wp_enqueue_style( 'uis-canada-is-bustling-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  } else if( basename( get_page_template() ) == 'template.canadanews.canada-is-bustling.php') { 

    // Enqueue Style: Template - UIS Landing Page: "Canada is bustling"
	wp_enqueue_style( 'uis-canadanews-header-style' );
    wp_enqueue_style( 'uis-excitingthings-style' );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'uis-canadanews-articlebanner-js' );
    //wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
  } else if ( basename( get_page_template() ) == 'template-test-thankyoupage.php') { 
	wp_enqueue_style( 'uis-test-newthankyoupage-style' );
  } else if( basename(get_page_template()) == 'template-lp-flag.php' || basename(get_page_template()) == "template-lp-flag-bdu.php" || basename(get_page_template()) == "template-lp-flag-outbrain.php") {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
 
    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-flag-style' );
	//wp_enqueue_script( 'uis-general-js' );
    //wp_enqueue_script( 'uis-lp-falg-main-js' );
    //wp_enqueue_script( 'uis-lp-falg-question-js' );
	//wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
  } else if( basename(get_page_template()) == 'template-lp-family.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
 
    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-family-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'uis-lp-falg-main-js' );
    wp_enqueue_script( 'uis-lp-falg-question-js' );
	wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
  } else if( basename(get_page_template()) == 'template-lp-family-questions.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
 
    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-family-questions-style' );
    wp_enqueue_script( 'uis-lp-falg-main-js' );
    wp_enqueue_script( 'uis-lp-falg-question-js' );
	wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
  } else if( basename(get_page_template()) == 'template-lp-flag-question.php' || basename(get_page_template()) == 'template-lp-flag-question-bdu.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-flag-question-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'uis-lp-falg-main-js' );
    wp_enqueue_script( 'uis-lp-falg-question-js' );
	wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
  } else if( basename(get_page_template()) == 'template-lp-flag-question-b.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-flag-question-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'uis-lp-falg-main-js' );
    wp_enqueue_script( 'uis-lp-falg-question-b-js' );
	wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
  } else if( basename(get_page_template()) == 'template.lp.young-professionals-questions.php' ) {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-young-professionals-questions-style' );
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' );
	wp_enqueue_script( 'uis-lp-falg-question-js' );
  } else if( basename(get_page_template()) == 'template-lp-engineers-questions.php' ) {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-engineers-questions-style' );
	wp_enqueue_script( 'uis-general-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' );
	wp_enqueue_script( 'uis-lp-falg-question-js' );
  } else if( basename(get_page_template()) == 'template-lp-medical-questions.php' ) {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );

    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
    wp_enqueue_style( 'uis-lp-medical-questions-style' );
	wp_enqueue_script( 'uis-general-js' ); 
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' );
	wp_enqueue_script( 'uis-lp-falg-question-js' );
  } else if( basename(get_page_template()) == 'template.lp.musk.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
 
    // Enqueue Styles
    wp_enqueue_style( 'uis-lp-musk-style' );
	wp_enqueue_script( 'uis-general-js' );
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'uis-lp-musk-main-js' );
	wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
	wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
} else if( basename(get_page_template()) == 'template.canadanews.musk.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
 
    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-header-style' );
    wp_enqueue_style( 'uis-excitingthings-style' );
	wp_enqueue_script( 'jquery' );
    //wp_enqueue_script( 'uis-lp-musk-main-js' );
	wp_enqueue_script( 'uis-lp-falg-iphone-inline-video-js' );
	wp_enqueue_script( 'uis-canadanews-articlebanner-js' ); 
	//wp_enqueue_script( 'uis-lp-canada_is_bustling-scroll-js' );
} else if( basename(get_page_template()) == 'template.lp.young-professionals-countries-test.php') {

    // Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
 
    // Enqueue Styles
	wp_enqueue_style( 'uis-flag-country-style' );
	wp_enqueue_style( 'uis-lp-young-professionals-style' );
    wp_enqueue_script( 'uis-lp-young-professionals-iphone-inline-video-js' );
    wp_enqueue_script( 'uis-lp-young-professionals-main-js' );
} else if( basename(get_page_template()) == 'aboutus-new.php' || basename(get_page_template()) == 'about-page.php') {

	// Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
	
    // Enqueue Styles
	wp_enqueue_style( 'uis-about-us-main' );
	wp_enqueue_style( 'uis-about-us-fixed' );
	wp_enqueue_script( 'uis-about-us-js' );
 
} else if( basename(get_page_template()) == 'visa-page.php') {

	// Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
	
    // Enqueue Styles
	wp_enqueue_style( 'uis-about-us-main' );
	wp_enqueue_style( 'uis-visatype-us-fixed' );
	wp_enqueue_script( 'uis-visatype-js' );
 
} else if( basename(get_page_template()) == 'template.canadanews.php') {

	// Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
	
    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-main-style' );
	wp_enqueue_style( 'uis-lp-young-professionals-style' );
	wp_enqueue_script( 'uis-canadanews-js' );
 
} else if( basename(get_page_template()) == 'template.canadanews.articles.php') {

	// Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
	
    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-main-style' );
	wp_enqueue_style( 'uis-lp-young-professionals-style' );
	wp_enqueue_script( 'uis-canadanews-articles-list-js' );
 
} else if( basename(get_page_template()) == 'template.canadanews.newversion.php') {

	// Dequeue Styles
    wp_dequeue_style( 'style' );
    wp_dequeue_style( 'main' );
	
    // Enqueue Styles
	wp_enqueue_style( 'uis-canadanews-newversion-main-style' );
	wp_enqueue_style( 'uis-lp-young-professionals-style' );
	wp_enqueue_script( 'uis-canadanews-js' );
 
} else if( basename(get_page_template()) == 'template.payment-summary.php') {

      // Enqueue Styles
      wp_enqueue_style( 'uis-payment-summary-main-style' );
      wp_enqueue_script( 'uis-summary-page-js' );

  } else if( basename(get_page_template()) == 'template-lp-sukkah.php') {

      // Dequeue Styles
      wp_dequeue_style( 'style' );
      wp_dequeue_style( 'main' );

      // Enqueue Styles
      wp_enqueue_style( 'uis-lp-sukkah-style' );

      wp_enqueue_script( 'uis-lp-sukkah-main-js' );

  } else if( basename(get_page_template()) == 'template-lp-sukkah-questions.php') {

      // Dequeue Styles
      wp_dequeue_style( 'style' );
      wp_dequeue_style( 'main' );

      // Enqueue Styles
      wp_enqueue_style( 'uis-lp-sukkah-questions-style' );

      wp_enqueue_script( 'uis-lp-sukkah-main-questions-js' );
      wp_enqueue_script( 'uis-lp-sukkah-question-js' );


  }else if( basename(get_page_template()) == 'template-lp-entrepreneur.php') {

      // Dequeue Styles
      wp_dequeue_style( 'style' );
      wp_dequeue_style( 'main' );

      // Enqueue Styles
      wp_enqueue_style( 'uis-lp-entrepreneur-style' );

      wp_enqueue_script( 'uis-lp-entrepreneur-main-js' );

  } else if( basename(get_page_template()) == 'template-lp-entrepreneur-questions.php') {

      // Dequeue Styles
      wp_dequeue_style( 'style' );
      wp_dequeue_style( 'main' );

      // Enqueue Styles
      wp_enqueue_style( 'uis-lp-entrepreneur-questions-style' );

      wp_enqueue_script( 'uis-lp-entrepreneur-main-questions-js' );
      wp_enqueue_script( 'uis-lp-entrepreneur-question-js' );


  } else if( basename(get_page_template()) == 'template-test-erezandsariel.php') {

      // Dequeue Styles
      wp_dequeue_style( 'style' );
      wp_dequeue_style( 'main' );

      // Enqueue Styles
      wp_enqueue_style( 'erez-sariel-test-style' );




  }


}