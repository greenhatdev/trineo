<?php
$cats = get_the_terms(get_the_ID(),'case_study_category');
$slug = $cats[0]->slug;
?>

<div class="item single-case-study-item" data-hash="<?php echo $slug; ?>" style="width:500px">
    <div class="item-overlay">
        <?php
        $pageHeading = get_the_title();
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $excerpt = get_the_excerpt();

        $logo = get_field("logo");

        ?>
        <div class="single-case-study-image background-image-cover"
             style="background-image: url('<?php echo $image; ?>')" cat="<?php echo $cats[0]->slug; ?>">
        </div>
        <div class="single-case-study-content margin-lg-bottom">
            <div class="row">
                <div class="category col-md-6">CASE STUDY: <?php echo $cats[0]->name; ?></div>
                <div class="logo col-md-6">
                    <div class="image-background" style="background-image: url(<?php echo $logo; ?>)"></div>
                </div>
            </div>

            <div class="title"><?php echo $pageHeading; ?></div>
            <p><?php echo $excerpt; ?></p>
            <div class="button-arrow-div inline-50">
                <a href="<?php echo get_the_permalink(); ?>" class="button-arrow"> </a>
            </div>
        </div>
    </div>
</div>
