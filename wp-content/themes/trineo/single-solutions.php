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
?>

<section class="padding-xl-top">
    <div class="container ">
        <div class="row margin-md-top">
            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom padding-right-desktop">
                <div class="h3 left-border primary-color"><?php echo $section_1_quote; ?></div>
            </div>

            <div class="col-md-6 has-margin-bottom-lg margin-md-bottom padding-right-desktop">
                <?php echo $section_1_intro_text ?>
            </div>
        </div>
    </div>
</section>
<div class="bg1"></div>
<?php
$section_2 = get_field('section_2');
$section_2_image = $section_2['left_image'];
$section_2_text = $section_2['text'];
?>

<section class="padding-md-bottom padding-lg-top">
    <div class="container ">
        <div class="row margin-md-top vertically-middle">
            <div class="col-md-8 has-margin-bottom-lg margin-md-bottom">
                <img class="rounded-edges" src="<?php echo $section_2_image; ?>" />
            </div>

            <div class="col-md-4 has-margin-bottom-lg margin-md-bottom">
                <div class="h3 primary-color"><?php echo $section_2_text ?></div>
            </div>
        </div>
    </div>
</section>

<?php
$section_3 = get_field('section_3');
$repeater = $section_3['column'];
$limit_to_3_columns = true;
?>
<section
        class="section  padding-lg-top  padding-md-bottom">
    <div class="container">
        <div class="row  wow fadeIn new-effect align-left">
            <?php
            foreach ($repeater as $row) {
                ?>
                <div class="col-md-4 col-icon-text padding-md-bottom">
                    <div class="col-content left-border max-width-320">
                        <div class="col-heading">
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
<div class="bg2">
<section class="section section-7 padding-xl-top ">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect padding-lg-top  ">
            <div class="col-md-4 padding-lg-bottom">
                <div class="h2 primary-color">Related case studies</div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</p>
                <div>
                    <a href="/case-studies" class="button button--transparent">View all</a></div>
            </div>
            <div class="col-md-8 padding-lg-bottom">
                <div class="case-studies-carousel wow fadeIn new-effect" data-wow-delay="0.3s">
                    <div class="col-md-12" style="margin-left:20px">
                        <?php

                        $terms = get_terms( array(
                            'taxonomy' => 'case_study_category',
                            'hide_empty' => true,
                        ) );

                        foreach($terms as $term){
                            ?>
                            <a class="url case-study-urls" href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                            <?php
                        }
                        ?>
                        <br/><br/>
                    </div>
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
<?php
get_footer();

?>
