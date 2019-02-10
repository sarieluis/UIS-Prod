<?php
/*
 Template Name: Terms Page
*/

global $post;

get_header(); ?>

    <!-- BUNNER -->
    <div class="content-bunner bunner-wrap">
        <div class="bunner-img full-img">
            <?php echo get_the_post_thumbnail($post->ID) ?>
        </div>
    </div>
    <!-- BUNNER END -->

    <!-- TERMS -->
    <div class="content">
        <div class="container">
            <h1 class="text-left text-white">Terms & Conditions</h1>
            <div class="content-inner">
                <?php echo $post->post_content; ?>
            </div>


        </div>
    </div>
    <!-- TERMS END -->

<?php get_footer(); ?>