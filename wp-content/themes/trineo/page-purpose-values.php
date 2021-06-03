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
<div class="bg1">
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
                        <div class="h5 green-text uppercase"><?php echo $subheading; ?></div>
                    <?php } ?>
                    <h1 class="<?php if ($light_purple_background) {
                        echo 'primary-color';
                    } else {
                        echo 'white-text';
                    } ?>"> <?php echo $pageHeading ?></h1>
                    <div class="page-subtitle max-width-430 <?php if ($light_purple_background) {
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
</div>
    <div class="bg2">
<section class="padding-xl-top">
    <div class="container ">
        <div class="row margin-md-top vertically-middle">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom">
                <div class="h5 primary-color uppercase">Our Vision</div>
                <div class="h3 left-border primary-color"><?php echo $text; ?></div>
            </div>
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom">
                <img class="rounded-edges" src="<?php echo $image; ?>"/>
            </div>
        </div>
    </div>
</section>
        <?php
        $values = get_field('values');
        $repeater = $values['value'];
        ?>
<section class="section padding-xl-top  padding-lg-bottom">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 padding-sm-bottom">
                <div class="h3 primary-color">Our Values</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="scene">
                    <div id="left-zone">
                        <ul class="list">
                            <?php
                            $index = 0;
                            foreach ($repeater as $row) {
                                $index++;
                            ?>
                            <li class="item">
                                <input type="radio" id="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>" name="basic_carousel" value="" checked="checked"/>
                                <label class="label_value<?php echo $index; ?> green-text" for="radio_The garden <?php echo $row['title']; ?> <?php echo $row['text']; ?>"><?php echo $row['title']; ?></label>
                                <div class="content content_value<?php echo $index; ?>">
                                    <div class="row vertically-middle">
                                        <div class="col-md-6">
                                            <div class="h4"><?php echo $row['title']; ?></div>
                                            <p><?php echo $row['text']; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="rounded-edges" src="<?php echo $row['image']; ?>"/>
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
        </div>

    </div>
</section>
    </div>
<?php
$impact = get_field('impact');
?>
<section class="padding-xl-top">
    <div class="container ">
        <div class="row margin-md-top vertically-middle">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom">
                <div class="h5 green-text uppercase">Our Impact</div>
                <div class="h3 primary-color margin-md-bottom"><?php echo $impact['heading']; ?></div>
                <p><?php echo $impact['text']; ?></p>
                <div>
                    <a href="/<?php echo $join_the_team['cta_link']; ?>"
                       class="button button--secondary"><?php echo $impact['cta_text']; ?></a>
                </div>
            </div>

            <div class="col-md-6 margin-lg-bottom">
                <img class="rounded-edges" src="<?php echo $impact['image']; ?>"/>
            </div>
        </div>
    </div>
</section>

<section class="section padding-lg-top ">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 padding-sm-bottom">
                <div class="h3 primary-color">You may also like <a href="/insights" class="button button--transparent margin-md-left">View all</a></div>
            </div>
        </div>
        <div class="row  wow fadeIn new-effect margin-md-top padding-lg-bottom border-bottom">
            <?php
            $args = array('post_type' => 'post', 'posts_per_page' => 3, 'order' => "asc",);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                $title = get_the_title();
                $permalink = get_the_permalink();
                ?>
                <div class="col-md-4 equal padding-md-bottom">
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
