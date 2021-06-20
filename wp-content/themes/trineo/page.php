<?php

/**
 * The template for displaying all single posts
 */
get_header();

$header_image = '';

if (have_rows('post_page_builder')):
    while (have_rows('post_page_builder')) : the_row();
        if (get_row_layout() == 'generic_page_header') {
            $pageHeading = get_sub_field('page_title');
            $subheading = get_sub_field('subheading');
            $subheading_link = get_sub_field('subheading_link');
            $pageDescription = get_sub_field('page_description');
            $cta_text = get_sub_field('cta_text');
            $cta_link = get_sub_field('cta_link');
            $cta_link_only = get_sub_field('cta_link_only');
            $light_purple_background = get_sub_field('light_purple_background');
            $header_image = get_sub_field('header_image');
            $add_wings_background= get_sub_field('add_wings_background');
            $uppercase_heading = get_sub_field('uppercase_heading');
        }
    endwhile;
    wp_reset_postdata();
endif;
?>
<?php  if($light_purple_background || $add_wings_background){ ?>

<?php } ?>
<section class="page-header <?php if($light_purple_background){echo 'light-purple-background';}else { echo 'purple-background';} ?>">
    <div class="basic-heading vertically-middle header-menu-padding">

        <div class="row vertically-middle ">
            <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect " data-wow-delay="0.0s">
                <div class=" padding-right-col-1 max-width-750px">
                    <?php if ($subheading) { ?>
                        <a class="h5 green-text uppercase" href="<?php echo $subheading_link; ?>"><?php echo $subheading; ?></a>
                    <?php } ?>
                    <h1 class="<?php if($light_purple_background){echo 'primary-color';}else { echo 'white-text';} ?> <?php if($uppercase_heading){echo 'uppercase';}  ?>"> <?php echo $pageHeading ?></h1>
                    <div class="page-subtitle max-width-600 <?php if($light_purple_background){echo 'primary-color';}else { echo 'white-text';} ?>"><?php echo $pageDescription; ?></div>
                    <?php if ($cta_text && $cta_link) { ?>
                        <a href="<?php echo $cta_link; ?>"
                           class="button button--transparent button--transparent-white-arrow"
                           style="margin-top:-20px"><?php echo $cta_text; ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-5 background-image-cover"
                 style="background-image: url('<?php echo $header_image; ?>'); min-height: 350px;">
            </div>
        </div>
    </div>
</section>
        <?php  if($light_purple_background && !$add_wings_background){ ?>
            <div class="bg1"></div>
<?php } ?>
<?php get_template_part('templates/post-page-builder', 'post-page-builder'); ?>

<?php
get_footer();
?>
