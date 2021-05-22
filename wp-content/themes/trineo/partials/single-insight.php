<?php
?>

<div class="item single-insight" >
        <?php
        $pageHeading = get_the_title();
        $image = get_the_post_thumbnail_url(get_the_ID(),'full');
        $excerpt = get_the_excerpt();
        $cats = get_the_category();
        ?>
        <div class="single-insight-image background-image-cover" style="background-image: url('<?php echo $image; ?>')">
        </div>
        <div class="single-insight-content margin-lg-bottom">
            <div class="category"><?php echo $cats[0]->name; ?></div>
            <div class="title"><?php echo $pageHeading; ?></div>
            <div class="button-arrow-div inline-50">
                <a href="<?php echo get_the_permalink(); ?>"  class="button-arrow"> </a>
            </div>
            <div class="inline-50 align-right">
                <?php echo do_shortcode('[rt_reading_time label="" postfix="min read" postfix_singular="min read"]'); ?>
            </div>

        </div>

</div>
