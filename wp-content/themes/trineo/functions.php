<?php

add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', '/wp-content/themes/twentynineteen/style.css');
    wp_enqueue_style('', '/wp-content/themes/trineo/styles.css');
    wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/assets/css/vendor/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri() . '/assets/css/vendor/owl.theme.default.min.css');
//    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/vendor/animate.css');

    wp_enqueue_script('jqueryui', get_stylesheet_directory_uri() . '/assets/js/jqueryui.js', array('jquery'), false, true);

    wp_enqueue_style('jqueryui-theme', get_stylesheet_directory_uri() . '/assets/css/vendor/jquery-ui.css');
    wp_enqueue_script('owlcarousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);
//    wp_enqueue_script('select2', get_stylesheet_directory_uri() . '/assets/js/select2.min.js', array('jquery'), false, false);
//    wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/assets/js/wow.min.js', array('jquery'), false, true);
    wp_enqueue_script('trineo', get_stylesheet_directory_uri() . '/assets/js/trineo.js', array('jquery'), false, true);
//    wp_localize_script('tablelandsnzjs', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

}


add_image_size( 'post-content-image', 980, 9999, false );

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

function ft_footer_wdgs()
{


    register_sidebar(array(
        'name' => __('Footer 1', 'ft'),
        'id' => 'footer_sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Footer 2', 'ft'),
        'id' => 'footer_sidebar-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'ft'),
        'id' => 'footer_sidebar-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Footer 4', 'ft'),
        'id' => 'footer_sidebar-4',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Footer 5', 'ft'),
        'id' => 'footer_sidebar-5',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));


}

add_action('widgets_init', 'ft_footer_wdgs');

function register_my_menus() {
    register_nav_menus(
        array(
            'services-menu' => __( 'Services Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

}


function create_clients() {
    register_post_type('clients', array(
            'labels' => array(
                'name' => __('Clients'),
                'singular_name' => __('Client'),
                'menu_name' => __('Clients')
            ),
            'show_in_nav_menus' => 'true',
            'menu_icon' => 'dashicons-exerpt-view',
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'rewrite' => array('slug' => 'client', 'with_front' => false),
        )
    );
}

add_action('init', 'create_clients');

function create_testimonials() {
    register_post_type('testimonials', array(
            'labels' => array(
                'name' => __('Testimonials'),
                'singular_name' => __('Testimonial'),
                'menu_name' => __('Testimonials')
            ),
            'show_in_nav_menus' => 'true',
            'menu_icon' => 'dashicons-exerpt-view',
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'rewrite' => array('slug' => 'testimonial', 'with_front' => false),
        )
    );
}

add_action('init', 'create_testimonials');

function create_case_studies() {
    register_post_type('case-studies', array(
            'labels' => array(
                'name' => __('Case Studies'),
                'singular_name' => __('Case Study'),
                'menu_name' => __('Case Studies')
            ),
            'show_in_nav_menus' => 'true',
            'menu_icon' => 'dashicons-exerpt-view',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'rewrite' => array('slug' => 'case-study', 'with_front' => false),
        )
    );
}

add_action('init', 'create_case_studies');

add_action( 'init', 'create_case_study_cat_taxonomy' );

function create_case_study_cat_taxonomy() {
    register_taxonomy(
        'case_study_category',
        'case-studies',
        array(
            'label' => 'Category',
            'hierarchical' => true,
        )
    );
}

function create_solutions() {
    register_post_type('solutions', array(
            'labels' => array(
                'name' => __('Solutions'),
                'singular_name' => __('Solution'),
                'menu_name' => __('Solutions')
            ),
            'show_in_nav_menus' => 'true',
            'menu_icon' => 'dashicons-exerpt-view',
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'rewrite' => array('slug' => 'solution', 'with_front' => false),
        )
    );
}

add_action('init', 'create_solutions');
//
//add_action( 'init', 'create_product_type_taxonomy' );
//
//function create_product_type_taxonomy() {
//    register_taxonomy(
//        'product_type',
//        'product',
//        array(
//            'label' => 'Product Type',
//            'hierarchical' => true,
//        )
//    );
//}
//
//
//
//if (function_exists('acf_add_options_page')) {
//
//    acf_add_options_page(array(
//        'page_title' => 'Theme General Settings',
//        'menu_title' => 'Theme Settings',
//        'menu_slug' => 'theme-general-settings',
//        'capability' => 'edit_posts',
//        'redirect' => false
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' => 'Theme Header Settings',
//        'menu_title' => 'Header',
//        'parent_slug' => 'theme-general-settings',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' => 'Theme Footer Settings',
//        'menu_title' => 'Footer',
//        'parent_slug' => 'theme-general-settings',
//    ));
//
//}
//
//
//
//function create_faqs() {
//    register_post_type('faq', array(
//            'labels' => array(
//                'name' => __('FAQs'),
//                'singular_name' => __('FAQ'),
//                'menu_name' => __('FAQs')
//            ),
//            'show_in_nav_menus' => 'true',
//            'menu_icon' => 'dashicons-exerpt-view',
//            'public' => true,
//            'has_archive' => false,
//            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
//            'rewrite' => array('slug' => 'faq', 'with_front' => false),
//        )
//    );
//}
//
//add_action('init', 'create_faqs');
//
//add_action( 'init', 'create_faqs_cat_taxonomy' );
//
//function create_faqs_cat_taxonomy() {
//    register_taxonomy(
//        'faq_category',
//        'faq',
//        array(
//            'label' => 'Category',
//            'hierarchical' => true,
//        )
//    );
//}
//
//function create_forms() {
//    register_post_type('form', array(
//            'labels' => array(
//                'name' => __('Forms'),
//                'singular_name' => __('Form'),
//                'menu_name' => __('Forms')
//            ),
//            'show_in_nav_menus' => 'true',
//            'menu_icon' => 'dashicons-exerpt-view',
//            'public' => true,
//            'has_archive' => false,
//            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
//            'rewrite' => array('slug' => 'form', 'with_front' => false),
//        )
//    );
//}
//
//add_action('init', 'create_forms');
//
//add_action( 'init', 'create_forms_cat_taxonomy' );
//
//function create_forms_cat_taxonomy() {
//    register_taxonomy(
//        'form_category',
//        'form',
//        array(
//            'label' => 'Category',
//            'hierarchical' => true,
//        )
//    );
//}
//

function create_team() {
    register_post_type('team-members', array(
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member'),
                'menu_name' => __('Team Members')
            ),
            'show_in_nav_menus' => 'true',
            'menu_icon' => 'dashicons-id-alt',
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
            'rewrite' => array('slug' => 'team-members', 'with_front' => false),
        )
    );
}

add_action('init', 'create_team');

function wpdocs_custom_excerpt_length( $length ) {
    return 12;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

add_action( 'init', 'create_solutions_taxonomy' );

function create_solutions_taxonomy() {
    register_taxonomy(
        'post_solutions',
        'post',
        array(
            'label' => 'Solutions',
            'hierarchical' => true,
        )
    );
}

add_action( 'init', 'create_media_type_taxonomy' );

function create_media_type_taxonomy() {
    register_taxonomy(
        'post_media_type',
        'post',
        array(
            'label' => 'Media Type',
            'hierarchical' => true,
        )
    );
}

