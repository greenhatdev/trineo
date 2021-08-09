<?php

/**
 * Template Name: Our humans
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Green hat
 * @since 1.0
 * @version 1.0
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
        }
    endwhile;
    wp_reset_postdata();
endif;
?>

<section class="page-header <?php if ($light_purple_background) {
    echo 'light-purple-background';
} else {
    echo 'purple-background';
} ?>">
    <div class="basic-heading vertically-middle header-menu-padding">

        <div class="row vertically-middle ">
            <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeIn new-effect " data-wow-delay="0.0s">
                <div class=" max-width-750px">
                    <?php if ($subheading) { ?>
                        <a class="h5 green-text uppercase" href="<?php echo $subheading_link; ?>"><?php echo $subheading; ?></a>
                    <?php } ?>
                    <h1 class=" <?php if ($light_purple_background) {
                        echo 'primary-color';
                    } else {
                        echo 'white-text';
                    } ?>"> <?php echo $pageHeading ?></h1>
                    <div class="page-subtitle  <?php if ($light_purple_background) {
                        echo 'primary-color';
                    } else {
                        echo 'white-text';
                    } ?>"><?php echo $pageDescription; ?></div>
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
<div class="bg1"></div>
<?php
$text = get_field('leadership_text');
$image = get_field('leadership_image');
?>
<section class="padding-xl-top wow fadeIn new-effect ">
    <div class="container ">
        <div class="row margin-md-top vertically-middle">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom "
                 data-wow-delay="0.1s" >
                <div class="h5 primary-color uppercase">Our Inspiration</div>
                <div class="h3 left-border primary-color"><?php echo $text; ?></div>
            </div>

            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom "
                 data-wow-delay="0.2s" >
                <img class="rounded-edges" src="<?php echo $image; ?>"/>
            </div>
        </div>
    </div>
</section>
</div>

<section class="section meet-the-team padding-xl-top  padding-lg-bottom wow fadeIn new-effect ">
    <div class="container">
        <div class="team-members">
            <div class="row">
                <?php
                $postarg1 = array('post_type' => 'team-members', 'post_status' => 'publish', 'order' => "asc");
                $team = new WP_Query($postarg1);
                $index = 1;
                if ($team->have_posts()) :
                    while ($team->have_posts()) : $team->the_post();
                        $index++;
                        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        ?>
                        <div class="col-lg-4 team-member margin-md-bottom "
                             data-wow-delay="0.<?php echo $index; ?>s">
                            <div class="team-member-image" style="background-image:url(<?php echo $image; ?>);">

                            </div>
                            <div class="content">
                                <div class="team-name h4 primary-color"><?php the_title(); ?></div>
                                <div class="team-position "><?php echo get_field("position"); ?></div>
                                <p><?php echo get_field("bio"); ?></p>
                                <div class="linkedin"><a href="<?php echo get_field("linkedin_profile_link"); ?>" target="_blank"><img
                                                src="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/images/linkedin.svg"/></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
$blog_heading = get_field('blog_heading');
?>
<section class="section padding-lg-top wow fadeIn new-effect">
    <div class="container">
        <div class="row vertically-middle ">
            <div class="col-md-12 padding-sm-bottom "
                 data-wow-delay="0.1s" >
                <div class="h3 primary-color"><?php echo $blog_heading; ?> <a href="/insights" class="button button--transparent margin-md-left">View all</a></div>
            </div>
        </div>
        <div class="row   margin-md-top ">
            <?php
            $args = array('post_type' => 'post', 'posts_per_page' => 3, 'order' => "desc", 'category_name' => 'culture');
            $loop = new WP_Query($args);
            $index=1;
            while ($loop->have_posts()) : $loop->the_post();
                $title = get_the_title();
                $permalink = get_the_permalink();
                $index++;
                ?>
                <div class="col-md-4 equal "
                     data-wow-delay="0.<?php echo $index; ?>s" >
                    <?php
                    get_template_part('partials/single-insight', get_post_format());
                    ?>
                </div>
            <?php
            endwhile;
            ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php
$join_the_team = get_field('join_the_team');
?>
<section class="padding-xl-top">
    <div class="container ">
        <div class="row margin-md-top vertically-middle border-bottom wow fadeIn new-effect">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom padding-right-desktop "
                 data-wow-delay="0.1s" >
                <div class="h3 primary-color margin-md-bottom"><?php echo $join_the_team['heading']; ?></div>
                <p><?php echo $join_the_team['text']; ?></p>
                <div>
                    <a href="<?php echo $join_the_team['cta_link']; ?>"
                       class="button button--secondary"><?php echo $join_the_team['cta_text']; ?></a>
                </div>
            </div>

            <div class="col-md-6 margin-lg-bottom "
                 data-wow-delay="0.2s" >
                <img class="rounded-edges" src="<?php echo $join_the_team['image']; ?>"/>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
