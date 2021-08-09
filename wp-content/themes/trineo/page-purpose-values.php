<?php

/**
 * Template Name: Purpose and values
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
            <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect " data-wow-delay="0.0s">
                <div class=" padding-right-col-1 max-width-750px">
                    <?php if ($subheading) { ?>
                        <a class="h5 green-text uppercase" href="<?php echo $subheading_link; ?>"><?php echo $subheading; ?></a>
                    <?php } ?>
                    <h1 class="<?php if ($light_purple_background) {
                        echo 'primary-color';
                    } else {
                        echo 'white-text';
                    } ?>"> <?php echo $pageHeading ?></h1>
                    <div class="page-subtitle max-width-600 <?php if ($light_purple_background) {
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
<?php
$text = get_field('vision_text');
$image = get_field('vision_image');
?>

<section class="padding-xl-top wow fadeIn new-effect">
    <div class="container ">
        <div class="row margin-md-top vertically-middle">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom "
                 data-wow-delay="0.1s" >
                <div class="h5 primary-color uppercase">Our Vision</div>
                <div class="h3 left-border primary-color"><?php echo $text; ?></div>
            </div>
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom "
                 data-wow-delay="0.2s" >
                <img class="rounded-edges" src="<?php echo $image; ?>"/>
            </div>
        </div>
    </div>
</section>
<div class="bg1"></div>
        <?php
        $values = get_field('values');
        $repeater = $values['value'];
        ?>
<section class="section padding-xl-top  padding-lg-bottom purple-background">
    <div class="container wow fadeIn new-effect">
        <div class="row vertically-middle ">
            <div class="col-md-12 ">
                <div class="h3 white-text">Our Values</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 hidden-md "
                 data-wow-delay="0.1s" >
                <div id="scene">
                    <div id="left-zone">
                        <ul class="list">
                            <?php
                            $index = 0;
                            foreach ($repeater as $row) {
                                $index++;
                            ?>
                            <li class="item">
                                <input type="radio" id="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>" name="basic_carousel" value="" <?php if($index==1){echo 'checked="checked"';} ?>/>
                                <label class="label_value<?php echo $index; ?>" for="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>"><?php echo $row['title']; ?></label>
                                <div class="content content_value<?php echo $index; ?>">
                                    <div class="row vertically-middle">
                                        <div class="col-md-12">
                                            <div class="image-background"
                                                 style="background-image:url('<?php echo $row['image']; ?>')"></div>

                                            <div class="h4 white-text"><?php echo $row['title']; ?></div>
                                            <p class=" white-text"><?php echo $row['text']; ?></p>
                                        </div>

                                    </div>

                                </div>
                            </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div id="middle-border"></div>
                    <div id="right-zone"></div>
                </div>
            </div>
            <div class="col-md-12 visible-md">

                            <?php
                            $index = 0;
                            foreach ($repeater as $row) {
                                $index++;
                                ?>
                                <div class="row vertically-middle margin-md-top">
                                    <div class="col-md-12">
                                        <img src="<?php echo $row['image']; ?>" class="margin-sm-bottom" style="max-width: 60px; max-height: 48px;">

                                        <div class="h4 white-text"><?php echo $row['title']; ?></div>
                                        <p class=" white-text"><?php echo $row['text']; ?></p>
                                    </div>

                                </div>
                                <?php
                            }
                            ?>

                </div>
            </div>
        </div>

    </div>
</section>
<?php
$impact = get_field('impact');
?>
<section class="padding-xl-top">
    <div class="container ">
        <div class="row margin-md-top vertically-middle wow fadeIn new-effect">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom padding-right-desktop "
                 data-wow-delay="0.1s" >
                <a class="h5 green-text uppercase no-underline" href="/our-impact/">Our Impact</a>
                <div class="h3 primary-color margin-md-bottom margin-xs-top"><?php echo $impact['heading']; ?></div>
                <p><?php echo $impact['text']; ?></p>
                <div>
                    <a href="<?php echo $impact['cta_link']; ?>"
                       class="button button--transparent"><?php echo $impact['cta_text']; ?></a>
                </div>
            </div>

            <div class="col-md-6 margin-lg-bottom "
                 data-wow-delay="0.2s" >
                <img class="rounded-edges" src="<?php echo $impact['image']; ?>"/>
            </div>
        </div>
    </div>
</section>

<section class="section padding-lg-top wow fadeIn new-effect">
    <div class="container">
        <div class="row vertically-middle ">
            <div class="col-md-12 padding-sm-bottom wow fadeIn new-effect"
                 data-wow-delay="0.1s" >
                <div class="h3 primary-color">You may also like <a href="/insights" class="button button--transparent margin-md-left">View all</a></div>
            </div>
        </div>
        <div class="row  margin-md-top padding-lg-bottom border-bottom">
            <?php
            $args = array('post_type' => 'post', 'posts_per_page' => 3, 'order' => "desc", 'category_name' => 'culture');
            $loop = new WP_Query($args);
            $index=1;
            while ($loop->have_posts()) : $loop->the_post();
                $title = get_the_title();
                $permalink = get_the_permalink();
                $index++;
                ?>
                <div class="col-md-4 equal padding-md-bottom "
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
get_footer();
?>
