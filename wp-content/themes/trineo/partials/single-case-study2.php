<?php

$link = get_the_permalink();
?>

<div class="item single-case-study-item">
    <div class="item-overlay" onclick="location.href='<?php echo $link; ?>'">
        <?php
        $pageHeading = get_the_title();
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $excerpt = get_the_excerpt();
        $cats = get_the_terms(get_the_ID(), 'case_study_category');
        $logo = get_field("logo");
        ?>
        <div class="single-case-study-image background-image-cover"
             style="background-image: url('<?php echo $image; ?>')">
        </div>
        <div class="single-case-study-content">
            <div class="align-top">
                <div class="row">
                    <div class="category">CASE STUDY: <?php echo $cats[0]->name; ?></div>
                </div>

                <div class="title"><?php echo $pageHeading; ?></div>
                <p><?php echo $excerpt; ?></p>
            </div>
            <div class="align-bottom">
                <div class="button-arrow-div inline-50">
                    <a href="<?php echo $link; ?>" class="button-arrow"> </a>
                </div>
                <div class="logo inline-50" style="margin-bottom:15px">
                    <div class="image-background"
                         style="background-image: url(<?php echo $logo; ?>);margin-bottom: 0px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
