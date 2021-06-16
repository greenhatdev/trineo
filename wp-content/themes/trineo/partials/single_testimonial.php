<?php
$testimonial = get_sub_field('testimonial');
?>
<div class="bg1">
<section class="section padding-xl-top  padding-lg-bottom purple-background ">
    <div class="container">
            <div class="row">
                <?php
                $postarg1 = array('post_type' => 'testimonials', 'post_status' => 'publish', 'order' => "asc",'p' => $testimonial );
                $team = new WP_Query($postarg1);

                if ($team->have_posts()) :
                    while ($team->have_posts()) : $team->the_post();
                        $quote = get_field("quote");
                        $name = get_field("name");
                        $job_title = get_field("job_title");
                        ?>
                    <div class="col-md-3"></div>
                        <div class="col-md-6 wow fadeInUp testimonial-section">
                            <div class="quote h3"><?php echo $quote; ?></div>
                            <div class="name"><?php echo $name; ?></div>
                            <div class="job-title"><?php echo $job_title; ?></div>
                        </div>
                        <div class="col-md-3"></div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
        </div>
    </div>
</section>
