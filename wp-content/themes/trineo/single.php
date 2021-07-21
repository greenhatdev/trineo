<?php
get_header();
if (has_post_thumbnail()) {
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
}
$light_purple_background = true;
?>

<div class="blog">

    <?php while (have_posts()) : the_post(); ?>
        <section class="page-header <?php if($light_purple_background){echo 'light-purple-background';}else { echo 'purple-background';} ?>">
            <div class="basic-heading vertically-middle header-menu-padding">

                <div class="row vertically-middle ">
                    <div class="col-sm-7 padding-xl-top padding-xl-bottom wow fadeInUp new-effect " data-wow-delay="0.0s">
                        <div class=" padding-right-col-1 max-width-750px">
                            <div class=" max-width-750px">
                                <a href="<?php bloginfo('url') ?>/insights/"
                                   class="blog-main__back button button--transparent button--transparent--prev margin-md-bottom">Back to all insights</a>
                                <div class="blog-header__title">
                                    <div class="blog-header__title"><?php the_title(); ?></div>
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
        <?php

        $cats = get_the_category();

        ?>
    <!-- START Blog Main -->
    <section class="section blog-main ">
            <div class="container no-padding">
        <div class="row no-gutters padding-lg-top">
            <div class="col-md-3 padding-md-top">
                <div class="category green-text"><?php echo $cats[0]->name; ?></div>
                <p class="blog-meta"><span style="margin-right:20px">By</span> <strong><?php echo get_the_author(); ?></strong><br/>
                    <span style="margin-right:18px">On</span> <strong><?php echo get_the_time('d.m.Y', get_the_ID()); ?></strong></p>
                <p class="blog-meta"><?php echo do_shortcode('[rt_reading_time label="" postfix="minutes read" postfix_singular="minute read"]'); ?></p>
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
            <div class="col-md-6 ">
                <div class="blog-main__content padding-xl-top padding-md-bottom">
                <?php the_content(); ?>

                </div>


            </div>
            <div class="col-md-3">

            </div>
        </div>
            </div>
    </section>
    <!-- END Blog Main -->

    <!-- START Recommended Posts -->
    <section class="section blog-recommended margin-lg-top border-bottom padding-lg-bottom">
            <div class="container ">
                <div class="col-md-12 padding-lg-top padding-lg-bottom">
                    <div><span  class="h3 primary-color">You may also like</span> <a href="/resouces/insights" class="button button--transparent margin-md-left">View all</a></div>
                </div>
        <div class="blog-recommended__posts">
            <div class="row">

                <!-- Just querying the latest posts for now - though we can easily query based on similar posts with same tags etc -->
                <?php
                $cats = get_the_category();

                $args = array (
                    'cat'            => $cats[0]->term_id,
                    'posts_per_page'         => '3',
                    'post__not_in'           => array(get_the_ID())
                );

                $the_query = new WP_Query($args);
                    $post_count = 0;
//                    $total = count($the_query);
                ?>

                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <?php
                $cats = get_the_category($id);
                $firstCategory = $cats[0]->name;
                ?>
                    <div class="col-md-4">
                        <?php
                        get_template_part('partials/single-insight', get_post_format());
                        ?>
                    </div>
                <?php $post_count++; ?>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>

            </div>

        </div>
            </div>
    </section>
    <!-- END Recommended Posts -->

    <?php endwhile;
     ?>

<?php
get_footer();
 ?>