<?php
get_header();
the_post();
$header_image = '';
$pageHeading = get_the_title();
$icon = get_the_post_thumbnail_url(get_the_ID(), 'full');

?>

<section class="page-header light-purple-background">
    <div class="basic-heading vertically-middle header-menu-padding container">
        <div class="row vertically-middle ">
            <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect" data-wow-delay="0.0s">
                <div class=" padding-right-col-1 max-width-750px">
                    <a class="h5 green-text no-underline" href="/our-solutions">OUR SOLUTIONS</a>
                    <div class="row vertically-middle">
                        <div class="col-md-2">
                            <img src="<?php echo $icon; ?>" class="single-solution-icon"/>
                        </div>
                        <div class="col-md-10">
                            <h1 class="primary-color"><?php echo $pageHeading ?></h1>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-5"></div>

        </div>
    </div>
</section>

<?php
$section_1 = get_field('section_1');
$section_1_quote = $section_1['quote'];
$section_1_intro_text = $section_1['intro_text'];
$section_1_intro_image = $section_1['intro_image'];
?>

<section class="padding-xl-top">
    <div class="container wow fadeInUp new-effect">
        <div class="row margin-md-top vertically-middle">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom padding-right-desktop "
                 data-wow-delay="0.1s">
                <div class="h3 left-border primary-color margin-sm-bottom"><?php echo $section_1_quote; ?></div>
                <?php echo $section_1_intro_text ?>
            </div>

            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom padding-right-desktop "
                 data-wow-delay="0.2s">
                <img class="rounded-edges" src="<?php echo $section_1_intro_image; ?>" />
            </div>
        </div>
    </div>
</section>
<div class="bg1"></div>
<?php

$section_2 = get_field('section_2');
$section2_heading = $section_2['section2_heading'];
$repeater = $section_2['columns'];
?>
<section class="section  padding-xl-top padding-lg-bottom wow fadeInUp new-effect">
    <div class="container">
        <div class="row vertically-middle ">
            <div class="col-md-12 padding-xl-bottom">
                <div class="section-heading "><?php echo $section2_heading; ?></div>
            </div>
        </div>
        <div class="row vertically-middle2s align-left">
            <?php
            $index= 1;
            foreach ($repeater as $row) {
                $index++;
                ?>
                <div class="col-md-4 col-icon-text  margin-md-bottom left-border left-border-chevron "
                     data-wow-delay="0.<?php echo $index; ?>s">
                    <div class="col-content max-width-320">
                        <div class="col-heading h4">
                            <?php echo $row['heading']; ?>
                        </div>
                        <div class="col-text">
                            <?php echo $row['text']; ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
$section_3 = get_field('section_3');
$repeater = $section_3['column'];
$limit_to_3_columns = true;
?>
<section class="section  padding-lg-top  padding-md-bottom wow fadeInUp new-effect">
    <div class="container">
        <div class="row align-left">
            <div class="small-subheading margin-sm-bottom  ">SERVICES WE ALSO SUPPORT</div>
            <div class="service-links">
                <ul class="menu"  data-wow-delay="0.1s">
            <?php
            foreach ($repeater as $row) {
                ?>
                <li><?php echo $row['heading']; ?></li>
                <?php
            }
            ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="bg2">
<section class="section section-7 padding-xl-top wow fadeInUp new-effect">
    <div class="container">
        <div class="row vertically-middle  padding-lg-top  ">
            <div class="col-md-4 padding-lg-bottom">
                <div class="h2 primary-color">Related case studies</div>
                <p>Our combined experience and hard work pioneers transformative initiatives that make a lasting impact for our customers</p>
                <div>
                    <a href="/case-studies?tag=<?php global $post; echo $post->post_name; ?>" class="button button--transparent">View more</a></div>
            </div>
            <div class="col-md-8  hidden-md">
                <div class="case-studies-carousel " data-wow-delay="0.3s">
                     <?php
                        global $post;
                        $post_slug = $post->post_name;

                        $args = array('post_type' => 'case-studies', 'posts_per_page' => 3, 'order' => "desc",
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'case_study_services',
                                    'field' => 'slug',
                                    'terms' => $post_slug
                                )
                            ));

                        $terms = get_terms( array(
                            'taxonomy' => 'case_study_category',
                            'hide_empty' => true,
                        ) );


                        ?>

                    <div class="vertically-top home-case-study-owl-carousel owl-carousel  owl-theme">
                      <?php
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
            <div class="col-md-8  visible-md">

                    <div class="col-md-12" >
                        <?php
                        global $post;
                        $post_slug = $post->post_name;

                        $args = array('post_type' => 'case-studies', 'posts_per_page' => 1, 'order' => "asc",
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'case_study_services',
                                    'field' => 'slug',
                                    'terms' => $post_slug
                                )
                            ));

                        $terms = get_terms( array(
                            'taxonomy' => 'case_study_category',
                            'hide_empty' => true,
                        ) );


                        ?>

                    </div>
                        <?php
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            $title = get_the_title();
                            $permalink = get_the_permalink();

                            get_template_part('partials/single-case-study', get_post_format());

                        endwhile;
                        ?>
                        <?php wp_reset_postdata(); ?>



            </div>
        </div>
    </div>
</section>
</div>
<?php
get_footer();

?>
