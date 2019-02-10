<?php
/*
 Template Name: FAQ Page
*/

global $post;

$faq = get_cfc_meta('faq_page');

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

    <!-- FAQ -->
    <div class="faq">
        <div class="container">
            <div class="faq-inner">
                <?php echo $post->post_content ?>

                <?php if(!empty($faq)) : ?>
                    <div class="accordion-wrapper">
                    <?php foreach ($faq as $key => $item) : ?>
                        <div class="accordion-item js-content-wrap">
                            <div class="accordion-header js-show-content">
                                <p class="accordion-title"><?php echo ++$key . ' ' . $item['faq_page_question'] ?></p>
                                <div class="accordion-icon"></div>
                            </div>
                            <div class="accordion-body js-content">
                                <?php echo $item['faq_page_answer'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <p class="faq-footer">Don’t miss your Opportunity in Canada. Apply for your Canadian Visa Today. <a href="#">Register Now</a></p>

        </div>
    </div>
    <!-- FAQ END-->

<?php get_footer(); ?>