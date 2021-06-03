<section class="section padding-lg-top ">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 padding-sm-bottom">
                <div class="h3 primary-color">You may also like <a href="/insights" class="button button--transparent margin-md-left">View all</a></div>
            </div>
        </div>
        <div class="row  wow fadeIn new-effect margin-md-top  padding-lg-bottom  border-bottom">
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
</section>