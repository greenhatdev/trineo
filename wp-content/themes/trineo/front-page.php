<?php
/**
 * Template Name: Homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Green hat
 * @since 1.0
 * @version 1.0
 */
get_header();
$hero_section = get_field('banner_section');
$banner_background = $hero_section['banner_background'];
$banner_text = $hero_section['banner_text'];
?>
<section id="hero" class="section hero-section ms menu-padding " data-anchor="hero"
         style="background-image:url(<?php echo $banner_background; ?>)">
    <div class="">
        <div class="container">
            <div class="row vertically-middle">
                <div class="home-header col-md-12 padding-xl-top padding-xl-bottom  wow fadeInUp ">

<!--                    <div class="hero-text">--><?php //echo $banner_text; ?><!--</div>-->

                </div>
            </div>
        </div>
    </div>
</section>

<?php
$section_2 = get_field('section_2');
$section2_heading = $section_2['section2_heading'];
$repeater = $section_2['section2_columns'];
?>
<section class="section section-2 padding-xl-top padding-md-bottom starrybg">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 padding-lg-bottom">
                <div><span  class="h2"><?php echo $section2_heading; ?></span> <a href="/solutions" class="button button--transparent margin-md-left">View all Solutions</a></div>
            </div>
        </div>
        <div class="row vertically-middle wow fadeIn new-effect">
            <?php
            foreach ($repeater as $row) {
                ?>
                <div class="col-md col-icon-text padding-md-bottom">
                    <div class="image-background"
                         style="background-image:url('<?php echo $row['section2_col_icon']; ?>')"></div>
                    <div class="">
                        <div class="solutions-text">
                            <?php echo $row['section2_col_text']; ?>
                        </div>
                        <div class="solutions-heading margin-md-bottom">
                            <?php echo $row['section2_col_heading']; ?>
                        </div>
                        <div class="button-arrow-div">
                            <a href="<?php echo $row['section2_col_link']; ?>"  class="button-arrow"> </a>
                        </div>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row vertically-middle wow fadeIn new-effect padding-lg-top">
            <div class="col-md-12 padding-xl-bottom border-top-white  padding-lg-top">
                <div class="pink-text small-subheading">SERVICES</div>
                <div class="service-links">
                    <?php
                    wp_nav_menu(array(
                            'theme_location' => 'services-menu',
                            'container' => 'ul')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$section_3 = get_field('section_3');
$section3_heading = $section_3['section3_heading'];
?>
<section class="section section-3 padding-xl-top padding-md-bottom">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-4 padding-lg-bottom">
                <div class="h3"><?php echo $section3_heading; ?></div>
                <div>
                    <a class="button button--white" href="/partners">Explore More</a>
                </div>
            </div>
            <div class="col-md-8 padding-lg-bottom">
                <div class="row vertically-middle wow fadeIn new-effect align-center">
                    <?php
                    $args = array('post_type' => 'clients', 'posts_per_page' => -1, 'order' => "asc");
                    $loop = new WP_Query($args);
                    $clientIndex = 0;
                    while ($loop->have_posts()) : $loop->the_post();
                        $image = get_the_post_thumbnail_url();
                        ?>
                        <div class="col-md-4 align-center single-client wow fadeIn new-effect"
                             data-wow-delay="0.<?php echo $clientIndex; ?>s">
                            <div class="image-background" style="background-image: url(<?php echo $image; ?>)"></div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
$section_4 = get_field('section_4');
$section_4_heading = $section_4['section4_heading'];
$section4_video = $section_4['section4_video'];
?>
<section class="section section-4 padding-md-top padding-xl-bottom">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-6 padding-lg-bottom">
                <div class="videoWrapper">
                    <iframe width="560" height="349" src="<?php echo $section4_video; ?>?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6 padding-left-100">
                <div class="h4 "><?php echo $section_4_heading; ?></div>
                <p><?php echo $section_4['section4_text']; ?></p>
                <div>
                    <a class="button button--white" href="<?php echo $section_4['section4_cta_link']; ?>"><?php echo $section_4['section4_cta_text']; ?></a>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
$section_5 = get_field('section_5');
$section5_subheading = $section_5['section5_subheading'];
$section5_heading = $section_5['section5_heading'];
$repeater = $section_5['columns'];

?>
<div class="bg1">
<section class="section section-5 padding-xl-top padding-md-bottom purple-background">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-4 padding-lg-bottom">
                <div class="h2 white-text"><?php echo $section5_heading; ?></div>
                <div class="h4 white-text"><?php echo $section5_subheading; ?></div>
                <div>
                    <a class="button button--white" href="<?php echo $section_5['section5_cta_link']; ?>"><?php echo $section_5['section5_cta_text']; ?></a>
                </div>
            </div>

                <?php
                foreach ($repeater as $row) {
                    ?>
                    <div class="col-md-4 col-icon-text padding-md-bottom white-text">
                        <div class="image-background"
                             style="background-image:url('<?php echo $row['logo']; ?>')"></div>
                        <div class="margin-sm-top">
                            <p class="white-text">
                                <?php echo $row['text']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>

        </div>
    </div>
</section>

<?php
$section_6 = get_field('section_6');
$section6_heading = $section_6['section_6_heading'];
?>
<section class="section section-8 padding-xl-top ">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 padding-lg-bottom">
                <div><span  class="h2 primary-color"><?php echo $section6_heading; ?></span> <a href="/insights" class="button button--transparent margin-md-left">View all</a></div>
            </div>
        </div>
        <div class="row  wow fadeIn new-effect margin-md-top ">
                    <?php
                    $args = array('post_type' => 'post', 'posts_per_page' => 3, 'order' => "asc",);
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        $title = get_the_title();
                        $permalink = get_the_permalink();
                        ?>
                        <div class="col-md-4 equal">
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
    </div>
</section>
</div>
<div class="bg2">
<?php
$section_7 = get_field('section_7');
$section7_heading = $section_7['section7_heading'];
$section7_text = $section_7['section7_text'];
?>
<section class="section section-7 padding-xl-top ">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect padding-lg-top  ">
            <div class="col-md-4 padding-lg-bottom">
                <div class="h2 primary-color"><?php echo $section7_heading; ?></div>
                <p><?php echo $section7_text; ?></p>
                <div>
                    <a href="/case-studies" class="button button--transparent">View all</a></div>
            </div>
            <div class="col-md-8 padding-lg-bottom">
                <div class="case-studies-carousel wow fadeIn new-effect" data-wow-delay="0.3s">
                    <div class="vertically-top home-case-study-owl-carousel owl-carousel  owl-theme">
                        <?php
                        $args = array('post_type' => 'case-studies', 'posts_per_page' => -1, 'order' => "asc",);
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            $title = get_the_title();
                            $permalink = get_the_permalink();

                            get_template_part('partials/single-case-study', get_post_format());

                        endwhile;
                        ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="owl-theme">
                        <div class="owl-controls">
                            <div class="custom-nav owl-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php get_footer(); ?>
