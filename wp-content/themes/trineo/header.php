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
    <!-- overlay !-->
    <div id="search" class="fade">
        <a href="#" class="close-btn" id="close-search"></a>
        <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input id="searchbox" type="search" name="s" placeholder="What can we help you with?" value="<?php echo get_search_query(); ?>">
            <button type="submit" class="searchsubmit">
                <i class='fa fa-search'></i>
            </button>

            <div class="align-left tags margin-xl-top">
                <div class="white-text margin-md-bottom"><b>SUGGESTED AND TRENDING</b></div>
                <a href="/?s=tag1" class="search-tags">Tag 1</a>
            </div>
        </form>






    </div>
    <!--- /overlay -->
</div>

<style>

    /**********************/
    /* Full screen search */
    /**********************/
    #search {
        align-items: center;
        background-image: url('<?php echo get_site_url();?>/wp-content/themes/trineo/assets/images/search-bg.svg');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        height: 0;
        display: flex;
        justify-content: center;
        opacity: 0;
        position: fixed;
        transition: all 0.5s;
        width: 100vw;

        top:0px;
        will-change: transform, opacity;
        z-index: -1;
    }
    #search:target {
        height: 100vh !important;
        opacity:1;
        width: 100vw !important;
        z-index: 99;
    }
    #search:target .close-btn {
        display: block;
    }
    #searchbox {
        background: transparent;
        font-size: 30px;
        line-height: 32px;
        padding: 18px 52px 18px 30px;
        margin-top: 20px;
        border-radius: 0px;
        margin-right:-60px;
        width: calc(100% - 150px);
        max-width: 812px;
        color: white;
        border:0px solid white !important;
        border-bottom:2px solid white !important;
        font-family: 'Poppins';

    }

    #searchbox::placeholder {
        font-size: 30px;
        line-height: 32px;
        color: white !important;
        font-family: 'Poppins';

    }
    .close-btn {
        display: none;
        color: #fff;
        font-size: 2rem;
        position: absolute;
        top: 50px;
        right: 50px;
        background-image: url('<?php echo get_site_url();?>/wp-content/themes/trineo/assets/images/close.svg');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
        width: 20px;
        height: 20px;
    }

    #searchform{
        width: 80%;
        text-align: center;
        max-width: 970px;

    }

    .tags{
        width: 80%;
        margin: 50px auto;
        text-align: left;
        max-width: 970px;
    }

    .search-tags{
        background: transparent;
        color: #4AB590 !important;
        padding: 10px 50px;
        letter-spacing: 0;
        margin-top:5px;
        text-transform: uppercase;
        border: 1px solid #4AB590 !important;
        border-radius: 40px;
        text-decoration: none;
    }

    .search-tags:hover{
        background: #4AB590;
        color: #fff !important;
    }

    @media (max-width: 996px){
        #searchform {
            width: 100%;
        }
    }

    /**********************/
    /* fly in directions  */
    /**********************/
    #search.left,
    #nav ul.left {
        left: 0;
        height: 100vh;
        width: 0;
    }
    #search.right,
    #nav ul.right {
        height: 100vh;
        width: 0;
        right: 0;
        left: auto !important;
    }
    #search.bottom.left,
    #nav ul.bottom.left,
    #search.bottom.right,
    #nav ul.bottom.right,
    #search.top.left,
    #nav ul.top.left,
    #search.top.right,
    #nav ul.top.right {
        height: 0;
    }
    #search.bottom,
    #nav ul.bottom {
        bottom: 0;
        top: auto !important;
    }
    #search.fade,
    #nav ul.fade {
        height: 100vh;
        width: 100vw;
        transition: opacity 0.5s;
    }

    .searchsubmit{
        background: transparent;
        font-size:25px;
        vertical-align: middle;
    }

    .searchsubmit:hover{
        background: transparent !important;
    }

    input:-internal-autofill-selected {
        appearance: none;
        background-color: inherit !important;
        background-image: none !important;
        color: inherit !important;
    }

</style>