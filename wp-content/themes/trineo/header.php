<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_front_page()) { ?>
        <title><?php echo get_bloginfo('name'); ?></title>
    <?php } else { ?>
        <title><?php echo get_bloginfo('name'); ?> | <?php the_title(); ?></title>
    <?php } ?>
    <script src="https://use.fontawesome.com/8f2fd7bba9.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php wp_head(); ?>

</head>
<body  <?php body_class(); ?>>
<div id="wrapper">
    <header class="main-header" id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="<?php echo get_site_url(); ?>"><img
                                    src="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/images/logo.svg"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <nav id="menu" class="custom-menu">
                        <?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>
                    </nav>

                </div>
            </div>
        </div>
    </header>
</div>

