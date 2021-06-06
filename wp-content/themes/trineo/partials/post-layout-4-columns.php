<?php
$backgroundColor = get_sub_field('background_color');
$hasTopMargin = get_sub_field('has_top_margin');

$textAlignLeftCol = get_sub_field('text_alignment_left');
$textAlignRightCol = get_sub_field('text_alignment_right');


$custom_class = get_sub_field('custom_class');

?>
<section class="post margin-lg-bottom"
         <?php if ($backgroundColor) { ?>style="background-color:<?php echo $backgroundColor; ?>"<?php } ?>>
    <div class="container <?php if ($hasTopMargin) { ?>padding-lg-top<?php } ?>">
        <div class="row margin-md-top">
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?>"
                 style="text-align: <?php echo $textAlignLeftCol ?>">
                <?php echo get_sub_field('content_one'); ?>
            </div>
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?>"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_two'); ?>
            </div>
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?>"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_three'); ?>
            </div>
            <div class="col-md-3 has-margin-bottom-lg margin-md-bottom <?php echo $custom_class; ?>"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_four'); ?>
            </div>
        </div>
    </div>
</section>