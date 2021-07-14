<?php
$backgroundColor = get_sub_field('background_color');
$hasTopMargin = get_sub_field('has_top_margin');

$image_on_left = get_sub_field('image_on_left');
$layoutColumn1 = "col-md-6";
$layoutColumn2 = "col-md-6";
$custom_class = get_sub_field('custom_class');
$custom_id = get_sub_field('custom_id');
$add_wings_background= get_sub_field('add_wings_background');
?>

<section class="post margin-lg-bottom <?php echo $custom_class; ?>" <?php if($backgroundColor) { ?>style="background-color:<?php echo $backgroundColor;?>"<?php } ?> id="<?php echo $custom_id; ?>">
    <div class="container <?php if($hasTopMargin) { ?>padding-lg-top<?php } ?>">
        <div class="row vertically-middle">
            <?php if($image_on_left){ ?>
                <div class="<?php echo $layoutColumn2 ?> margin-md-bottom " style="">
                    <img src="<?php echo get_sub_field( 'col2_image' ); ?>" class="rounded-edges" />
                </div>
                <div class="<?php echo $layoutColumn1 ?> margin-md-bottom padding-left-desktop" style="text-align: <?php echo $textAlignLeftCol ?>">
                    <?php echo get_sub_field( 'content_left' ); ?>
                </div>
            <?php } ?>

            <?php if(!$image_on_left){ ?>
                <div class="<?php echo $layoutColumn1 ?> margin-md-bottom padding-right-desktop" style="text-align: <?php echo $textAlignLeftCol ?>">
                    <?php echo get_sub_field( 'content_left' ); ?>
                </div>
            <div class="<?php echo $layoutColumn2 ?> margin-md-bottom order-first order-md-last" style="">
                <img src="<?php echo get_sub_field( 'col2_image' ); ?>" class="rounded-edges" />
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php  if($add_wings_background){ ?>
    <div class="bg1"></div>
<?php } ?>