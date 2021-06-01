<?php if( have_rows('post_page_builder') ):
    while ( have_rows('post_page_builder') ) : the_row();

        if( get_row_layout() == 'products' )
            get_template_part('partials/products', 'products');

        if( get_row_layout() == 'icon_heading_and_text_columns' )
            get_template_part('partials/icon-heading-and-text-columns', 'icon_heading_and_text_columns');

        if( get_row_layout() == 'icon_heading_with_link_and_text_columns' )
            get_template_part('partials/icon-heading-with-link-and-text-columns', 'icon_heading_with_link_and_text_columns');

        if( get_row_layout() == 'layout-2-columns-image-text' )
            get_template_part('partials/post-layout-2-columns-image-text', 'layout-2-columns-image-text');

        if( get_row_layout() == 'layout-2-columns' )
            get_template_part('partials/post-layout-2-columns', 'layout-2-columns');

        if( get_row_layout() == 'video_section' )
            get_template_part('partials/video-section', 'video_section');

        if( get_row_layout() == 'case_studies' )
            get_template_part('partials/case-studies', 'case-studies');

        if( get_row_layout() == 'faqs' )
            get_template_part('partials/faqs', 'faqs');

        if( get_row_layout() == 'forms' )
            get_template_part('partials/forms', 'forms');

        if( get_row_layout() == 'fuel_site_locator' )
            get_template_part('partials/fuel_site_locator', 'fuel_site_locator');

        if( get_row_layout() == 'cta_block' )
            get_template_part('partials/cta_block', 'cta_block');

        if( get_row_layout() == 'layout-centered' )
            get_template_part('partials/post-layout-1-column', 'layout-centered');

        if( get_row_layout() == 'insights_hub' )
            get_template_part('partials/insights_hub', 'insights_hub');

        if( get_row_layout() == 'case_studies_hub' )
            get_template_part('partials/case_studies_hub', 'case_studies_hub');

        if (get_row_layout() == 'faqs_row')
            get_template_part('partials/accordions', 'accordions');

        if( get_row_layout() == 'layout-3-columns' )
            get_template_part('partials/post-layout-3-columns', 'layout-3-columns');

        if( get_row_layout() == 'navigation_menu' )
            get_template_part('partials/navigation_menu', 'navigation_menu');
//
//        if( get_row_layout() == 'full_width_text_cta' )
//            get_template_part('partials/full_width_text_cta', 'full_width_text_cta');
//
//        if( get_row_layout() == 'testimonial' )
//            get_template_part('partials/testimonial', 'testimonial');
//
//        if( get_row_layout() == 'masonry_grid' )
//            get_template_part('partials/post-masonry-grid', 'masonry_grid');
//
//        if( get_row_layout() == 'form_embed' )
//            get_template_part('partials/post-form', 'form_embed');
//
//        if( get_row_layout() == 'image_slider' )
//            get_template_part('partials/post-image-slider', 'image_slider');
//
//        if( get_row_layout() == 'relevant_insights' )
//            get_template_part('partials/post-relevant-insights', 'relevant_insights');
//
//        if( get_row_layout() == 'related_case_studies' )
//            get_template_part('partials/post-related-case-studies', 'related_case_studies');

    endwhile; // close the loop of flexible content
    wp_reset_postdata();
endif;
?>