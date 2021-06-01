<?php
$heading = get_sub_field('heading');
$text = get_sub_field('text');
$cta_text = get_sub_field('cta_text');
$cta_link = get_sub_field('cta_link');
$image = get_sub_field('image');
$background_image = get_sub_field('background_image');
$reduced_padding = get_sub_field('reduced_padding');
$full_width = get_sub_field('full_width');
?>
<section class="section cta_block padding-md-top padding-md-bottom <?php if ($reduced_padding) {
    echo 'reduced_padding';
} ?>">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect <?php if (!$background_image) {
            echo ' ';
        } ?> " style=" <?php if ($background_image) {
            echo 'background-image:url(\'' . $background_image . '\');background-size: cover; background-position: center center;';
        } ?> ">
            <div class="<?php if ($full_width) {
                echo 'col-md-12 align-center';
            } else {
                echo 'col-md-6';
            } ?> equal">
                <div class="h3  margin-sm-bottom primary-color "><?php echo $heading; ?></div>
                <?php if ($text) { ?>
                    <div class="h6  max-width-50 margin-sm-bottom white-text "><?php echo $text; ?></div>
                <?php } ?>
                <?php if ($cta_text) { ?>
                    <div>
                    <a href="/<?php echo $cta_link; ?>"
                       class="button"><?php echo $cta_text; ?></a>
                    </div>
                <?php } ?>
            </div>
            <?php if (!$full_width) { ?>
                <div class="col-md-6 equal">
                    <img src="<?php echo $image; ?>"/>
                </div>
            <?php } ?>
        </div>
</section>