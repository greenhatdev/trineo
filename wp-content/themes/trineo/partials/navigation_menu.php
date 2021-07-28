<?php
$section2_heading = get_sub_field('heading');
$repeater = get_sub_field('columns');
$limit_to_3_columns = get_sub_field('limit_to_3_columns');
$limit_to_3_columns = true;
$light_purple_background = get_sub_field('light_purple_background');
$add_top_border = get_sub_field('add_top_border');
$menu_id = get_sub_field('menu_id');
?>
<section class="section padding-md-bottom <?php if($light_purple_background){ echo 'light-purple-background'; } ?>">
    <div class="container">
        <div class="row vertically-middle wow fadeIn new-effect padding-lg-top">
            <div class="col-md-12 padding-xl-bottom <?php if($add_top_border){ ?>border-top-grey<?php } ?>  padding-xl-top">
                <div class="small-subheading padding-md-top"><?php echo $section2_heading; ?></div>
                <div class="menu-links no-link-menu">
                    <?php
                    wp_nav_menu(array(
                            'menu' => $menu_id,
                            'container' => 'ul')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>