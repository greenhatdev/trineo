<?php
$section2_heading = get_sub_field('heading');
$repeater = get_sub_field('columns');
$limit_to_4_columns = get_sub_field('limit_to_4_columns');
$light_purple_background = get_sub_field('light_purple_background');
$remove_bottom_margin = get_sub_field('remove_bottom_margin');
?>
<section
        class="section  padding-xl-top <?php if (!$remove_bottom_margin) { ?>margin-lg-bottom<?php } ?> <?php if ($light_purple_background) {
            echo 'light-purple-background';
        } ?>">
    <div class="container">
        <?php if ($section2_heading) { ?>
            <div class="row vertically-middle wow fadeIn new-effect">
                <div class="col-md-12 padding-lg-bottom">
                    <div class="h2 primary-color"><?php echo $section2_heading; ?></div>
                </div>
            </div>
        <?php } ?>
        <div class="row  wow fadeIn new-effect align-left">
            <?php
            foreach ($repeater as $row) {
                ?>
                <div class="<?php if ($limit_to_4_columns) {
                    echo 'col-md-3';
                } else {
                    echo 'col-md-4';
                } ?> col-icon-text padding-md-bottom">
                    <div class="image-background"
                         style="background-image:url('<?php echo $row['icon']; ?>')"></div>
                    <div class="col-content">
                        <div class="col-heading">
                            <?php echo $row['heading']; ?>
                        </div>
                        <div class="col-text">
                            <?php echo $row['text']; ?>
                        </div>
                        <?php if ($row['link']) { ?>
                            <a href="<?php echo $row['link']; ?>"
                               class="button button--transparent"><?php echo $row['cta_text']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>