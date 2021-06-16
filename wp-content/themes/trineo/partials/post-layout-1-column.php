<?php
$textAlign = get_sub_field('text_alignment');
$layoutColumns = get_sub_field('columns');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
$backgroundColor = get_sub_field('background_color');
$heading1 = get_sub_field('heading');
$heading2 = get_sub_field('heading_2');
if ($layoutColumns) {
    switch ($layoutColumns) {
        case '4':
            $layoutColumn1 = "col-md-4";
            break;
        case '6':
            $layoutColumn1 = "col-md-6";
            break;
        case '8':
            $layoutColumn1 = "col-md-8";
            break;
        case '10':
            $layoutColumn1 = "col-md-9";
            break;
        case '12':
            $layoutColumn1 = "col-md-12";
    }
} else {
    $layoutColumn1 = "col-md-12";
}

$use_background_image = get_sub_field('use_background_image');
$background_image = get_sub_field('background_image');

$custom_class = get_sub_field('custom_class');

$top_border = get_sub_field('top_border');

?>
<section class="post <?php if ($use_background_image) {
    echo 'section-background-image';
} ?> margin-md-top margin-lg-bottom " style="background-color:<?php echo $backgroundColor; ?>; <?php if ($use_background_image) {
    echo 'background-image:url(' . esc_url($background_image['url']) . ')';
} ?>">
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="<?php echo $layoutColumn1 ?> <?php if (!$remove_bottom_margin) {
                echo 'has-margin-bottom-lg';
            }
            if ($top_border) {
                echo ' section-top-border';
            } ?> <?php echo $custom_class ?>" style="text-align: <?php echo $textAlign ?>;">
                <div class="h2"><?php echo $heading1; ?></div>
                <div class="h5 margin-md-bottom"><?php echo $heading2; ?></div>
                <?php echo get_sub_field('content'); ?>
            </div>
        </div>
    </div>
</section>