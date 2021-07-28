<?php
$testimonial = get_field('testimonials');
?>
<section class="section padding-xl-top  padding-lg-bottom light-purple-background">
    <div class="container">
        <div class="testimonials-carousel wow fadeIn new-effect" data-wow-delay="0.3s">
            <div class="vertically-top testimonials-owl-carousel owl-carousel  owl-theme">
                <?php
                $postarg1 = array('post_type' => 'testimonials','posts_per_page' => 3, 'post_status' => 'publish', 'order' => "desc",'p' => $testimonial );
                $team = new WP_Query($postarg1);

                if ($team->have_posts()) :
                    while ($team->have_posts()) : $team->the_post();
                        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $quote = get_field("quote");
                        $name = get_field("name");
                        $job_title = get_field("job_title");
                        ?>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?php echo $image; ?>" class="rounded-edges" />
                        </div>
                    <div class="col-md-1"></div>
                        <div class="col-md-6 wow fadeInUp testimonial-section ">
                            <div class="quote h3"><?php echo $quote; ?></div>
                            <div class="name"><?php echo $name; ?></div>
                            <div class="job-title"><?php echo $job_title; ?></div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="owl-theme">
                <div class="owl-controls">
                    <div class="custom-nav owl-nav"></div>
                </div>
            </div>
        </div>
    </div>
</section>
