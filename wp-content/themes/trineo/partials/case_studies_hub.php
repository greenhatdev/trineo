<link href="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/css/vendor/select2.min.css"
      rel="stylesheet"/>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/js/select2.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/js/isotope.pkgd.min.js"></script>
<section class="margin-lg-top">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 padding-md-bottom padding-left-zero">
                <div class="button-group filters-button-group">
                    <button class="button is-checked button--tags margin-sm-right" data-filter="*">Show All</button>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'case_study_category',
                        'hide_empty' => true,
                    ));
                    foreach ($categories as $category): ?>
<!--                        <button class="button button--tags margin-sm-right"-->
<!--                                data-filter=".--><?php //echo $category->slug; ?><!--">--><?php //echo $category->name ?><!--</button>-->
                    <?php
                    endforeach;
                    ?>
                    <?php
                    $services = get_terms(array(
                        'taxonomy' => 'case_study_services',
                        'hide_empty' => true,
                    ));
                    foreach ($services as $category): ?>
                        <button class="button button--tags margin-sm-right"
                                data-filter=".<?php echo $category->slug; ?>" id="<?php echo $category->slug; ?>"><?php echo $category->name ?></button>
                    <?php
                    endforeach;
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="bg1"></div>
<section class="margin-md-bottom">
    <div class="container">
        <div class="row d-flex justify-content-center  grid padding-lg-bottom border-bottom ">
            <div class=" equal">
                <?php
                $newslist = new WP_Query(array(
                    'post_type' => 'case-studies',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                $i = 1;

                if ($newslist->have_posts()):
                    while ($newslist->have_posts()): $newslist->the_post();
                        $imgUrl = get_the_post_thumbnail_url();
                        $post_slug = get_post_field('post_name', get_the_ID());
                        $cats = array();
                        $ser = array();
                        $cs_cat = get_the_terms(get_the_ID(), 'case_study_category');
                        $cs_ser = get_the_terms(get_the_ID(), 'case_study_services');

                        foreach ($cs_cat as $c) {
                            array_push($cats, strtolower($c->slug));
                        }

                        if (sizeOf($cats) > 0) {
                            $post_categories = implode(' ', $cats);
                        } else {
                            $post_categories = "";
                        }

                        foreach ($cs_ser as $ser2) {
                            array_push($ser, strtolower($ser2->slug));
                        }

                        if (sizeOf($ser) > 0) {
                            $post_services = implode(' ', $ser);
                        } else {
                            $post_services = "";
                        }


                        $postURL = get_the_permalink();
                        ?>
                        <div class="col-md-4 insights-element <?php echo $post_categories; ?> <?php echo $post_services; ?> grid-item "
                             id="<?php echo get_the_ID() ?>">

                            <?php
                            get_template_part('partials/single-case-study2', get_post_format());
                            ?>

                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function () {
        var $grid = jQuery('.grid').isotope({
            // options
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
            transitionDuration: 300,
            masonry: {
                columnWidth: '.grid-sizer'
            },
            fitRows: {
                gutter: 20
            }

        });


        // filter functions
        var filterFns = {};
        // bind filter button click
        jQuery('.filters-button-group').on('click', 'button', function () {
            var filterValue = jQuery(this).attr('data-filter');

            // use filterFn if matches value
            filterValue = filterFns[filterValue] || filterValue;
            $grid.isotope({filter: filterValue});
        });
        // change is-checked class on buttons
        jQuery('.button-group').each(function (i, buttonGroup) {
            var $buttonGroup = jQuery(buttonGroup);
            $buttonGroup.on('click', 'button', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });


        function getParameterByName( name ) {
            query = window.location.search.toString();
            name = name.replace( /[\[]/, "\\\[" ).replace( /[\]]/, "\\\]" );
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp( regexS );
            results = regex.exec( query );
            if ( results == null ) return "";
            else return decodeURIComponent( results[ 1 ].replace( /\+/g, " " ) );
        }

        function checkforUTMs(){
            var hasServiceParameter = getParameterByName('tag');

            if(hasServiceParameter){
                jQuery("#"+hasServiceParameter).trigger("click");
            }

        }

        checkforUTMs();

    });

</script>