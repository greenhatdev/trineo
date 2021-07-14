<?php
get_header();
$cats = get_the_terms(get_the_ID(),'case_study_category');
$logo = get_field("logo");
$casestudypdf = get_field("case_study_pdf");
$light_purple_background = true;
if (has_post_thumbnail()) {
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
}
?>

<div class="blog">

    <?php while (have_posts()) : the_post(); ?>
        <section class="page-header <?php if($light_purple_background){echo 'light-purple-background';}else { echo 'purple-background';} ?>">
            <div class="basic-heading vertically-middle header-menu-padding">

                <div class="row vertically-middle ">
                    <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect " data-wow-delay="0.0s">
                        <div class=" padding-right-col-1 max-width-750px">
                            <div class=" max-width-750px">
                                <a href="<?php bloginfo('url') ?>/case-studies/"
                                   class="blog-main__back button button--transparent button--transparent--prev margin-md-bottom">Back to all case studies</a>
                                <div class="blog-header__title">
                                    <div class="category primary-color">CASE STUDY: <?php echo $cats[0]->name; ?></div>
                                    <div class="blog-header__title" style="padding-bottom:0px;"><?php the_title(); ?></div>
                                    <a class="h5 green-text no-underline single-download" href="<?php echo $casestudypdf; ?>" download>DOWNLOAD THIS CASE STUDY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 background-image-cover"
                         style="background-image: url('<?php echo $image[0]; ?>'); min-height: 350px;">
                    </div>
                </div>
            </div>
        </section>

        <div class="bg1"></div>
        <!-- END Blog Header -->

        <!-- START Blog Main -->
        <section class="section blog-main">
            <div class="container no-padding">
                <div class="row no-gutters padding-lg-top">
                    <div class="col-md-3 padding-lg-top">
                        <div class="logo">
                            <div class="image-background" style="background-image: url(<?php echo $logo; ?>)"></div>
                        </div>
                        <div class="blog-header__social">
                        <span class="js-social-icons-cta social-icons-cta share-text">
                            Share:
                            </span>
                            <span class="social-icons">
                        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>"
                           class="js-social-icon social-icon social-icon--twitter" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                                          <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=website"
                                             class="js-social-icon social-icon social-icon--linkedin" target="_blank">
                            <i class="fa fa-linkedin-square"></i>
                        </a>

                        <a href="mailto:?&subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>"
                           class="js-social-icon social-icon social-icon--email">
                            <i class="fa fa-envelope"></i>
                        </a>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-main__content padding-md-bottom  ">
                            <div class="h6 primary-color padding-sm-bottom"><?php echo get_field('company_details'); ?></div>
                            <div class=""><?php the_content(); ?></div>
                        </div>
                        <div class="blog-main__content  padding-md-bottom">
                            <div class="case-study-section-title">The challenge</div>
                            <p><?php echo get_field('challenge'); ?></p>
                        </div>
                        <div class="blog-main__content  padding-md-bottom">
                            <div class="case-study-section-title">The solution</div>
                            <p><?php echo get_field('solution'); ?></p>
                        </div>
                        <div class="blog-main__content  padding-md-bottom">
                            <div class="case-study-section-title">The result</div>
                            <p><?php echo get_field('results'); ?></p>
                        </div>


                        <?php
                        $section6_testimonial = get_field('testimonial');
                        $quote = get_field("quote", $section6_testimonial);
                        $name = get_field("name", $section6_testimonial);
                        $job_title = get_field("job_title", $section6_testimonial);

                        ?>
                        <div class="padding-md-top padding-lg-bottom single-testimonial">

                            <div class="quote h3"><?php echo $quote; ?></div>
                            <div class="name"><?php echo $name; ?></div>
                            <div class="job-title"><?php echo $job_title; ?></div>

                        </div>


                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
                    <div class="col-md-3">
                    </div>
            </div>
        </section>
    <?php
    $section_5 = get_field('record_breaking_results');
    $repeater = $section_5['columns'];

    ?>
        <section class="section section-5 padding-xl-top padding-sm-bottom purple-background">
            <div class="container">
                <div class="row vertically-middle wow fadeIn new-effect">
                    <div class="col-md-12 padding-lg-bottom">
                        <div class="h3 white-text">Record-Breaking Results</div>
                    </div>
                </div>
                <div class="row vertically-middle2 wow fadeIn new-effect">
                    <?php
                    foreach ($repeater as $row) {
                        ?>
                        <div class="col-md-3 col-icon-text padding-md-bottom  white-text">
                            <div class="image-background"
                                 style="background-image:url('<?php echo $row['icon']; ?>'); "></div>
                            <div class="margin-sm-top heading">
                                <p class="white-text  ">
                                    <?php echo $row['text']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </section>
    <?php endwhile;
    ?>
    <?php
    $teams = get_field('project_team');
    ?>
    <section class="white-background padding-xl-top  padding-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin-md-bottom">
                    <div class="h3 primary-color">Meet the Project Team</div>
                </div>
            </div>
            <div class="team-members">
                <div class="row">
                    <?php
                    foreach($teams as $team){
                        ?>
                        <?php
                        $postarg1 = array('post_type' => 'team-members', 'post_status' => 'publish', 'order' => "asc",'p' => $team );
                        $team = new WP_Query($postarg1);
                        $index = 0.5;
                        if ($team->have_posts()) :
                            while ($team->have_posts()) : $team->the_post();
                                $index = $index + 0.2;
                                ?>
                                <div class="col-lg-3 team-member margin-md-bottom wow fadeInUp"
                                     data-wow-delay="<?php echo $index; ?>s">
                                    <div class="team-member-image rounded-edges">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>
                                    <div class="content">
                                        <div class="team-name case-study-section-title primary-color"><?php the_title(); ?></div>
                                        <div class="team-position "><?php echo get_field("position"); ?>, <?php echo get_field("city"); ?></div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <div class="bg2">
        <section class="section section-7 padding-xl-top ">
            <div class="container">
                <div class="row vertically-middle wow fadeIn new-effect padding-lg-top  ">
                    <div class="col-md-4 padding-lg-bottom">
                        <div class="h2 primary-color">Explore our case studies</div>
                        <p>Our combined experience and hard work pioneers transformative initiatives that make a lasting impact for our customers</p>
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
    <?php
    get_footer();
    ?>
