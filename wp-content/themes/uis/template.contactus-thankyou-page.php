<?php
/*
 Template Name: Fibonatix Thank you page
*/

global $post;


$slider = get_cfc_meta('homepage_slider');
$facts = get_cfc_meta('homepage_facts');
$steps = get_cfc_meta('homepage_steps');
$express = get_cfc_meta('homepage_express');

get_header(); ?>

  <!-- SLIDER -->
  <div class="slider-wrap">
    <?php if(!empty($slider)) : ?>
      <div class="slider">

        <?php foreach ($slider as $key => $item) :

          $count = '';
          if($key == 0) $count = 'first';
          if($key == 1) $count = 'second';
          if($key == 2) $count = 'third';
          if($key == 3) $count = 'fourth';

          ?>
          <div class="<?php echo $count ?>-slide">
            <div class="slider-img full-img">
              <img src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0] ?>" alt="">
            </div>
            <div class="slider-img-tablet for-img">
              <img src="<?php echo wp_get_attachment_image_src($item['image-tablet'], 'full')[0] ?>" alt="">
            </div>
            <div class="slider-img-mobile for-img">
              <img src="<?php echo wp_get_attachment_image_src($item['image-mobile'], 'full')[0] ?>" alt="">
            </div>
            <div class="slider-text <?php echo $item['text-type'] == 'red' ? 'slider-text_sm' : '' ?>">
              <div class="container">

                <p class="text-<?php echo $item['text-type'] == 'white' ? 'white' : 'black' ?>">
                  <?php echo $item['text-type'] == 'red' ? $item['title'] : '<span>'. $item['title'] .'</span>' ?>
                  <?php echo $item['text-type'] == 'red' ? '<span class="text-red">'.$item['subtitle'].'</span>' : $item['subtitle'] ?>
                </p>

              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    <?php endif; ?>


  </div>
  <!-- SLIDER END -->

  <!-- ABOUT -->
  <div class="about">
    <div class="container">
      <div class="about-inner">
        <?php echo $post->post_content; ?>
      </div>
    </div>
  </div>
  <!-- ABOUT END-->

  <!-- FACTS -->
<?php if(!empty($facts)) : ?>
  <div class="facts">
    <div class="container">
      <div class="facts-inner">

        <?php foreach ($facts as $item) : ?>
          <div class="fact-col">
            <div class="fact">
              <div class="fact-img for-img">
                <img src="<?php echo get_template_directory_uri() ?>/img/assets/canada_icon.png" alt="">
              </div>
              <div class="fact-text"><?php echo $item['text'] ?></div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
<?php endif; ?>
  <!-- FACTS END -->

  <!-- STEPS -->
<?php if(!empty($steps)) : ?>
  <div class="steps">
    <div class="container">
      <div class="steps-inner">
        <h2 class="title"><?php the_cfc_field('homepage_headlines', 'steps-blocks-title', $post->ID) ?></h2>
        <p class="subtitle"><?php the_cfc_field('homepage_headlines', 'steps-blocks-subtitle', $post->ID) ?></p>
        <div class="step-list">

          <?php foreach ($steps as $item) : ?>
            <div class="step">
              <div class="step-img-line">
                <div class="step-img for-img">
                  <img src="<?php echo wp_get_attachment_image_src($item['homepage_steps_image'], 'full')[0] ?>" alt="">
                </div>
              </div>
              <div class="step-descr">
                <span class="step-count"><?php echo $item['homepage_steps_title'] ?></span>
                <p class="step-title"><?php echo $item['homepage_steps_subtitle'] ?></p>
                <div class="step-text">
                  <p><?php echo $item['homepage_steps_description'] ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

        <div class="text-center">
          <a href="#" class="btn btn-lg">Get Started Now!</a>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
  <!-- STEPS END-->

  <!-- EXPRESS -->
<?php if(!empty($express)) : ?>
  <div class="express">
    <div class="container">
      <div class="express-inner">
        <h2 class="title text-white"><?php the_cfc_field('homepage_headlines', 'express-blocks-title', $post->ID) ?></h2>

        <div class="express-list">

          <?php foreach ($express as $item) : ?>
            <div class="express-col">
              <div class="express-item">
                <div class="express-img for-img">
                  <img src="<?php echo wp_get_attachment_image_src($item['homepage_express_image'], 'full')[0] ?>" alt="">
                </div>
                <p class="express-title"><?php echo $item['homepage_express_title'] ?></p>
                <div class="express-descr"><p><?php echo $item['homepage_express_description'] ?></p></div>
                <div class="express-actions">
                  <div class="js-show-text for-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/assets/down-arrow.png" alt="">
                  </div>
                  <div class="btn">Check for Eligibility</div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
  <!-- EXPRESS END -->

<?php get_footer( 'fibonatix' ); ?>