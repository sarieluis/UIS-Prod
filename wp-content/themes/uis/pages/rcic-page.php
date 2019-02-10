<?php
/*
 Template Name: RCIC Page
*/

global $post;


get_header(); ?>

    <!-- BUNNER -->
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

    <!-- RCIC -->
    <div class="rcic">
        <div class="container">
            <div class="rcic-inner">
                <h3><?php the_cfc_field('rcic_page', 'rcic_page_1st_title', $post->ID) ?></h3>
                <div class="why-rcic">
                    <div class="rcic-text">
                        <?php the_cfc_field('rcic_page', 'rcic_page_1st_text', $post->ID) ?>
                    </div>
                    <div class="rcic-img">
                        <div class="for-img"><img src="<?php echo wp_get_attachment_image_src(the_cfc_field('rcic_page', 'rcic_page_1st_image', $post->ID, 0, false), 'full')[0] ?>" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="rcic-inner">
                <h3><?php the_cfc_field('rcic_page', 'rcic_page_2nd_title', $post->ID) ?></h3>
                <div class="what-rcic">
                    <div class="rcic-img">
                        <div class="for-img"><img src="<?php echo wp_get_attachment_image_src(the_cfc_field('rcic_page', 'rcic_page_2nd_image', $post->ID, 0, false), 'full')[0] ?>" alt=""></div>
                    </div>
                    <div class="rcic-text">
                        <?php the_cfc_field('rcic_page', 'rcic_page_2nd_text', $post->ID) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- RCIC END-->

<?php get_footer(); ?>