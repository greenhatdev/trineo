<?php
$backgroundColor = get_sub_field('background_color');
$hasTopMargin = get_sub_field('has_top_margin');

$textAlignLeftCol = get_sub_field('text_alignment_left');
$textAlignRightCol = get_sub_field('text_alignment_right');
$layoutColumns = get_sub_field('layout');

if ($layoutColumns) {
    switch ($layoutColumns) {
        case '75-25':
            $layoutColumn1 = "col-md-9";
            $layoutColumn2 = "col-md-3";
            break;
        case '66-33':
            $layoutColumn1 = "col-md-8";
            $layoutColumn2 = "col-md-4";
            break;
        case '50-50':
            $layoutColumn1 = "col-md-6";
            $layoutColumn2 = "col-md-6";
            break;
        case '33-66':
            $layoutColumn1 = "col-md-4";
            $layoutColumn2 = "col-md-8";
            break;
        case '25-75':
            $layoutColumn1 = "col-md-3";
            $layoutColumn2 = "col-md-9";
    }
} else {
    $layoutColumn1 = "col-md-6";
    $layoutColumn2 = "col-md-6";
}


$custom_class = get_sub_field('custom_class');
$add_wings_background= get_sub_field('add_wings_background');
?>

<section class="post margin-lg-bottom <?php if ($custom_class) { echo $custom_class; } ?>"
         <?php if ($backgroundColor) { ?>style="background-color:<?php echo $backgroundColor; ?>"<?php } ?>>
    <div class="container <?php if ($hasTopMargin) { ?>padding-lg-top<?php } ?>">
        <!--        <div class="row">-->
        <!--            <div class="col-md-12">-->
        <!--        <div class="--><?php //echo $custom_class; ?><!--">-->
        <div class="row margin-md-top">
            <div class="<?php echo $layoutColumn1 ?> has-margin-bottom-lg margin-md-bottom"
                 style="text-align: <?php echo $textAlignLeftCol ?>">
                <?php echo get_sub_field('content_left'); ?>
            </div>
            <div class="<?php echo $layoutColumn2 ?> has-margin-bottom-lg margin-md-bottom"
                 style="text-align: <?php echo $textAlignRightCol ?>">
                <?php echo get_sub_field('content_right'); ?>
            </div>
        </div>
        <!--        </div>-->
        <!--        </div>-->
        <!--        </div>-->
    </div>
</section>


<?php  if($add_wings_background){ ?>
    <div class="bg1"></div>
<?php } ?>