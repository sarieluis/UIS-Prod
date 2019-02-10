<?php
/*
 Template Name: Canada Page
*/

global $post;

$facts = get_cfc_meta('canada_page_facts');
$quality = get_cfc_meta('canada_page_quality');

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

    <!-- ADVANTAGES -->
    <div class="advantages">
        <div class="container">
            <p class="text-lg"><?php the_cfc_field('canada_page', 'canada_page_headline', $post->ID) ?></p>

            <div class="advantages-block">
                <div class="advantages-main">
                    <div class="advantages-main-col">
                        <div class="advantages-main-text">
                            <h2 class="title title-lg text-left"><?php the_cfc_field('canada_page', 'canada_page_1st_title', $post->ID) ?></h2>
                            <p><?php the_cfc_field('canada_page', 'canada_page_1st_description', $post->ID) ?></p>
                        </div>
                        <div class="advantages-main-text">
                            <h2 class="title title-lg text-left"><?php the_cfc_field('canada_page', 'canada_page_2nd_title', $post->ID) ?></h2>
                            <p><?php the_cfc_field('canada_page', 'canada_page_2nd_description', $post->ID) ?></p>
                        </div>
                    </div>
                    <div class="advantages-main-col">
                        <div class="for-img">
                            <img src="<?php echo wp_get_attachment_image_src(the_cfc_field('canada_page', 'canada_page_image', $post->ID, 0, false), 'full')[0] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <?php if(!empty($facts)) : ?>
            <div class="advantages-block">
                <h2 class="title title-lg text-left"><?php echo count($facts) ?> quick facts</h2>
                <div class="quickfact-list">

                <?php foreach ($facts as $key => $item) : ?>
                    <div class="quickfact-col">
                        <div class="quickfact-item">
                            <div class="quickfact-nubmer"><?php echo ++$key; ?></div>
                            <div class="quickfact-title"><?php echo $item['fact'] ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if(!empty($quality)) : ?>
            <div class="advantages-block advantages-block_quality">
                <h2 class="title title-lg text-left">Quality of life</h2>
                <p class="quality-block-subtitle">Canada really is a great place to live.  For nine years in a row the UN has ranked </p>
                <div class="quality-list">

                <?php foreach ($quality as $key => $item) : ?>
                    <div class="quality-item">
                        <div class="quality-header">
								<span class="quality-icon for-img">
									<img src="<?php echo wp_get_attachment_image_src($item['canada_page_quality_image'], 'full')[0] ?>" alt="">
								</span>
                            <span class="quality-title"><?php echo $item['canada_page_quality_title'] ?></span>
                        </div>
                        <div class="quality-body"><?php echo $item['canada_page_quality_description'] ?></div>
                    </div>
                <?php endforeach; ?>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- ADVANTAGES END -->

<?php get_footer(); ?>