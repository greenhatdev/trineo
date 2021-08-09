<?php
$backgroundColor = get_sub_field('background_color');
$hasTopMargin = get_sub_field('has_top_margin');

$textAlignLeftCol = get_sub_field('text_alignment_left');
$textAlignRightCol = get_sub_field('text_alignment_right');
$use_background_image = get_sub_field('use_background_image');
$background_image = get_sub_field('background_image');
$custom_class = get_sub_field('custom_class');

?>
<section class="post padding-lg-bottom <?php if ($use_background_image) {
    echo 'section-background-image';
} ?> "  <?php if ($backgroundColor) { ?>style="background-color:<?php echo $backgroundColor; ?>"<?php } ?>
    <?php if ($use_background_image) {
        echo 'style="background-image:url(' . esc_url($background_image['url']) . ')"';
    } ?>>
    <div class="container <?php if ($hasTopMargin) { ?>padding-lg-top<?php } ?> wow fadeIn new-effect">
        <div class="row margin-md-top">
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?> "
                 data-wow-delay="0.1s"
                 style="text-align: <?php echo $textAlignLeftCol ?>">
                <?php echo get_sub_field('content_one'); ?>
            </div>
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?> "
                 data-wow-delay="0.2s"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_two'); ?>
            </div>
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?> "
                 data-wow-delay="0.32s"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_three'); ?>
            </div>
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?> "
                 data-wow-delay="0.4s"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_four'); ?>
            </div>
        </div>
    </div>
</section>