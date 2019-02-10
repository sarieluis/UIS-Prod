<?php
// Template Name: LP Engineers
?>

<?php get_header( 'lp-medical' ); ?>

<main class="content">
  <section class="career">
    <div class="container">
      <div class="career-inner">
        <h3 class="career-title">Are you looking for a great new career opportunity in a beautiful and friendly country?</h3>
        <div class="career-text">
          <p>With a growing economy, Canada is actively looking for young, talented people like you to diversify its work-force!</p>
        </div>
      </div>
      <div class="career-sticker">
        <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-sticker.png' ?>" alt="">
      </div>
    </div>
  </section>

  <section class="description">
    <div class="container">
      <h2 class="description-title">Open the Door to a New Life</h2>
      <div class="description-inner">
        <p>Engineers, Canada needs you. Come live and work in a thriving economy with one of the world's highest standard of living. 
Home of global hi-tech corporations, with flourishing oil & gas industries, well developed education, health and service sectors; the country offers a wealth of exciting career opportunities in the engineering field. 
Built on the values of equality, diversity and respect for the individual, Canada's multi-cultural society is the perfect place to grow. 

</p>
        <strong class="description-inner-slogan">Start Your Journey to Canada Today!</strong>
      </div>
      <a href="#" class="btn">Get Started Now!</a>
    </div>
  </section>




  <?php

  ?>
  <section class="testimonials">
    <div class="container">
      <div class="testimonials-img">
        <img src="<?php echo get_field( 'testimonial_image' ) ? get_field( 'testimonial_image' ) : get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-testimonials3.png'; ?>" alt="">
      </div>
      <h4 class="testimonials-name">Michael C Tan, London, UK, 45</h4>
      <div class="testimonials-text">
        <?php if( get_field( 'testimonial_text' ) ) : ?>
          <?php echo get_field( 'testimonial_text' ); ?>
        <?php else : ?>
        <p>As an Engineer, I'm always looking for exciting new work opportunities. UIS Canada helped me achieve that when I received my Canadian work visa. I'm now happily living in Canada working for one of the largest engineering companies in Toronto. </p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="advantages">
    <div class="advantages-inner">
      <div class="advantages-item">
        <div class="advantages-img">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-leaf.png' ?>" alt="">
        </div>
        <div class="advantages-text">
          <p>“Canada now claims the world’s most prosperous and successful immigrant population” <span>NY Times. June 28, 2017</span></p>
        </div>
      </div>
      <div class="advantages-item">
        <div class="advantages-img">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-leaf.png' ?>" alt="">
        </div>
        <div class="advantages-text">
          <p>Ranked in top 3 countries<br/>to live in by UN</p>
        </div>
      </div>
      <div class="advantages-item">
        <div class="advantages-img">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-leaf.png' ?>" alt="">
        </div>
        <div class="advantages-text">
          <p>Economy among Top 10 in the world fastest growing of G7</p>
        </div>
      </div>
      <div class="advantages-item">
        <div class="advantages-img">
          <img src="<?php echo get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-leaf.png' ?>" alt="">
        </div>
        <div class="advantages-text">
          <p>Open society, home to over 200 different ethnic communities</p>
        </div>
      </div>
    </div>
  </section>

</main>
<?php get_footer( 'lp-young-professionals' );