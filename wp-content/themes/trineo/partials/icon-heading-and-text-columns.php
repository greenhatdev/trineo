<?php
$section2_heading = get_sub_field('heading');
$repeater = get_sub_field('columns');
$limit_to_3_columns = get_sub_field('limit_to_3_columns');

$remove_left_border = get_sub_field('remove_left_border');
$light_purple_background = get_sub_field('light_purple_background');
?>
<section class="section  padding-xl-top padding-lg-bottom <?php if ($light_purple_background) {
    echo 'light-purple-background';
} ?>">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect">
            <div class="col-md-12 no-padding padding-xl-bottom">
                <div class="section-heading"><?php echo $section2_heading; ?></div>
            </div>
        </div>
        <div class="row vertically-middle2s wow fadeIn new-effect align-left">
            <?php
            foreach ($repeater as $row) {
                ?>
                <div class="<?php if($limit_to_3_columns) { echo 'col-md-4'; } else { echo 'col-md-3'; } ?> col-icon-text  margin-md-bottom <?php if(!$remove_left_border){ ?>left-border left-border-chevron<?php } ?> ">
                    <div class="image-background"
                         style="background-image:url('<?php echo $row['icon']; ?>')"></div>
                    <div class="col-content max-width-320">
                        <div class="col-heading h4">
                            <?php echo $row['heading']; ?>
                        </div>
                        <div class="col-text">
                            <?php echo $row['text']; ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>