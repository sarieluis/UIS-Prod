<?php
// Template Name: LP Young Professionals Questions
?>

<?php get_header( 'lp-young-professionals-questions' ); ?>

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
        <p>Canada is one of the top 10 economies in the world, the fastest growing economy of all G7 countries.<br/>
          This guarantees a constant demand for well talented people like you.<br/>
          Home of global hi-tech corporations, with flourishing oil & gas and financial industries and well developed education, health and service sectors, the country offers a wealth of exciting career opportunities in every field.<br/>
          Boasting one of the developed world's highest Standards of Living (with one of the lowest Costs of Living)<br/>
          Canada provides a wide range of ways to make immigration easy.<br/>
          Built on the values of equality, diversity and respect for the individual, Canada's multicultural society is the perfect place to grow.</p>
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
        <img src="<?php echo get_field( 'testimonial_image' ) ? get_field( 'testimonial_image' ) : get_stylesheet_directory_uri() . '/inmanage/lp-pages/young_professionals/assets/images/img-testimonials.png'; ?>" alt="">
      </div>
      <h4 class="testimonials-name"><?php echo get_field( 'testimonial_name' ) ? get_field( 'testimonial_name' ) : 'Jan Coetzee' ?></h4>
      <div class="testimonials-text">
        <?php if( get_field( 'testimonial_text' ) ) : ?>
          <?php echo get_field( 'testimonial_text' ); ?>
        <?php else : ?>
        <p>I'm a young software engineer from Cape Town, South Africa now happily living and working in Vancouver. I received my work permit through Express Entry Visa – Young professionals category, and was amazed at how many great companies wanted me to come work for them.<br/>My future has never looked brighter!</p>
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