<?php

/**
 * The template for displaying all single posts

 */
get_header();

$header_image='';

if (have_rows('post_page_builder')):
    while (have_rows('post_page_builder')) : the_row();
        if (get_row_layout() == 'generic_page_header') {
            $pageHeading = get_sub_field('page_title');
            $pageDescription = get_sub_field('page_description');
            $cta_text = get_sub_field('cta_text');
            $cta_link = get_sub_field('cta_link');
            $cta_link_only = get_sub_field('cta_link_only');
            $blue_gradient = get_sub_field('blue_gradient');
            $header_image = get_sub_field('header_image');
        }
    endwhile;
    wp_reset_postdata();
endif;
?>
<section class="page-header purple-background">
    <div class="basic-heading vertically-middle header-menu-padding">
        <div class="row vertically-middle ">
            <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect " data-wow-delay="0.0s">
                <div class="padding-left-col-1 padding-right-col-1 max-width-750px">
                    <h1 class="white-text"><?php echo $pageHeading ?></h1>
                    <div class="page-subtitle white-text max-width-430"><?php echo $pageDescription; ?></div>
                    <?php if($cta_text && $cta_link){ ?>
                        <a href="<?php echo $cta_link; ?>" class="button button--transparent button--transparent-white-arrow" style="margin-top:-20px"><?php echo $cta_text; ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-5 background-image-cover"
                 style="background-image: url('<?php echo $header_image; ?>'); min-height: 350px;">
            </div>
        </div>
    </div>
</section>
<?php get_template_part('templates/post-page-builder', 'post-page-builder'); ?>

<?php
get_footer();
?>
