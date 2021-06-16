<!--<link href="--><?php //echo get_site_url(); ?><!--/wp-content/themes/trineo/assets/css/vendor/select2.min.css" rel="stylesheet" />-->
<!--<script src="--><?php //echo get_site_url(); ?><!--/wp-content/themes/trineo/assets/js/select2.min.js"></script>-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/js/isotope.pkgd.min.js"></script>
<section class="margin-lg-top">
    <div class="container">
        <div class="row d-flex justify-content-center ">
                <div class="col-sm-1 pff-filters-label title"><div>Filter:</div></div>
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-sm-3 pff-filters-label">
                        <select class="filter-dropdown filters-select" name="topic" id="filters-select-topic" data-filter-group="topic">
                            <option></option>
                            <?php
                            $categories = get_terms( 'category', array( 'hide_empty' => '1' ) );
                            foreach ( $categories as $category ): ?>
                                <option value=".<?php echo $category->slug; ?>" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3 pff-filters-label">
                        <select class="filter-dropdown filters-select" name="solutions" data-filter-group="solutions" id="filters-select-solutions">
                            <option></option>
                            <?php

                            $categories = get_terms( 'post_solutions', array( 'hide_empty' => '1' ) );
                            foreach ( $categories as $category ): ?>
                                <option value=".<?php echo $category->slug; ?>" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name ?></option>
                                <?php

                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3 pff-filters-label">
                        <select class="filter-dropdown filters-select" name="media_type" data-filter-group="media_type" id="filters-select-media_type">
                            <option></option>
                            <?php

                            $categories = get_terms( 'post_media_type', array( 'hide_empty' => '1' ) );
                            foreach ( $categories as $category ): ?>
                                <option value=".<?php echo $category->slug; ?>" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name ?></option>
                                <?php

                            endforeach;
                            ?>
                        </select>
                        </select>
                    </div>
                    <div class="col-sm-3 pff-filters-label quicksearchicon">
                        <i class="fa fa-search quick-search-icon"></i>
                        <input type="text" class="quicksearch" placeholder="Search articles" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="pff-activefilters margin-md-bottom">
    <div  class="container">
        <div class="row2">
            <div class="activeFilters"></div>
            <div class="clearFilters" id="clearFilters">Clear Filters</div>
        </div>
    </div>
</div>
</div>
<section class="margin-md-bottom">
    <div class="container">
        <div class="row d-flex justify-content-center  grid">
            <div class="col-md-12   border-bottom">
                    <?php
                    $newslist = new WP_Query( array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ) );
                    $i = 1;

                    if ( $newslist->have_posts() ):
                        while ( $newslist->have_posts() ): $newslist->the_post();
                            $imgUrl = get_the_post_thumbnail_url();
                            $post_slug = get_post_field( 'post_name', get_the_ID() );
                            $cats = array();
                            foreach ( get_the_category( get_the_ID() ) as $c ) {
                                $cat = get_category( $c );
                                array_push( $cats, strtolower( $cat->name ) );
                            }

                            if ( sizeOf( $cats ) > 0 ) {
                                $post_categories = implode( ' ', $cats );
                            } else {
                                $post_categories = " ";
                            }

                            $postURL = get_the_permalink();
                            $term_list_solutions = wp_get_post_terms( $post->ID, 'post_solutions', array( "fields" => "all" ) );
                            $solutionss = '';
                            foreach ( $term_list_solutions as $solutions ) {
                                $solutionss .= $solutions->slug . ' ';
                            }

                            $term_list_industries = wp_get_post_terms( $post->ID, 'post_media_type', array( "fields" => "all" ) );
                            $industries = '';
                            foreach ( $term_list_industries as $media_type ) {
                                $industries .= $media_type->slug . ' ';

                            }

                            ?>
                            <div class="insights-element <?php echo $post_categories; ?> grid-item" id="<?php echo get_the_ID() ?>">

                                    <?php
                                    get_template_part('partials/single-insight', get_post_format());
                                    ?>

                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                <br/><br/>
            </div>
        </div>
    </div>
</section>


<script>

    // flatten object by concatting values
    function concatValues( obj ) {
        var value = '';
        for ( var prop in obj ) {
            value += obj[ prop ];
        }
        return value;
    }

    // debounce so filtering doesn't happen every millisecond
    function debounce( fn, threshold ) {
        var timeout;
        threshold = threshold || 100;
        return function debounced() {
            clearTimeout( timeout );
            var args = arguments;
            var _this = this;
            function delayed() {
                fn.apply( _this, args );
            }
            timeout = setTimeout( delayed, threshold );
        };
    }
    jQuery(document).ready(function() {
        jQuery("#filters-select-solutions").select2({
            placeholder: "Solutions",
            minimumResultsForSearch: -1,
        });
        jQuery("#filters-select-media_type").select2({
            placeholder: "Media Type",
            minimumResultsForSearch: -1,
        });
        jQuery("#filters-select-topic").select2({
            placeholder: "Topic",
            minimumResultsForSearch: -1,
        });

        var qsRegex;
        var filters = {};
        var filterValue;
        var activeFilters="";
        var initial_items = 15;
        var next_items = 15;
        var $grid = jQuery('.grid').isotope({
            // options
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
            transitionDuration: 100,
            masonry: {
                columnWidth: '.grid-sizer'
            },
            fitRows: {
                gutter: 20
            },
            filter: function() {
                var $this = jQuery(this);
                var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                var selectResult = filterValue ? $this.is(filterValue) : true;
                updateActiveFilters();
                return searchResult  && selectResult;
            }
        });


// bind filter on select change
        jQuery('.filters-select').on( 'change', function() {
            // get filter value from option value

            var $this = jQuery(this);
            var filterGroup = $this.attr('data-filter-group');
            console.log(filterGroup);
            // set filter for group
            filters[ filterGroup ] = $this.find('option:selected').val();

            updateActiveFilters();

            filterValue = concatValues( filters );
            showAllItems();

            $grid.isotope();

        });

        var $quicksearch = jQuery('.quicksearch').keyup( debounce( function() {
            qsRegex = new RegExp( $quicksearch.val(), 'gi' );
            jQuery('#showMore').hide();
            if($quicksearch.val()==""){
                jQuery('#showMore').show();
            }
            showAllItems();
            $grid.isotope();
        }, 200 ) );


        function showNextItems(pagination) {
            var itemsMax = jQuery('.visible_item').length;
            var itemsCount = 0;
            jQuery('.visible_item').each(function () {
                if (itemsCount < pagination) {
                    jQuery(this).removeClass('visible_item');
                    itemsCount++;
                }
            });
            if (itemsCount >= itemsMax) {
                jQuery('#showMore').hide();
            }
            $grid.isotope('layout');
        }
// function that hides items when page is loaded
        function hideItems(pagination) {
            var itemsMax = jQuery('.grid-item').length;
            var itemsCount = 0;
            jQuery('.grid-item').each(function () {
                if (itemsCount >= pagination) {
                    jQuery(this).addClass('visible_item');
                }
                itemsCount++;
            });
            if (itemsCount < itemsMax || initial_items >= itemsMax) {
                jQuery('#showMore').hide();
            }
            $grid.isotope('layout');
        }

        function showAllItems(){
            jQuery('.grid-item').each(function () {
                jQuery(this).removeClass('visible_item');
            });
            jQuery('#showMore').hide();
        }

        jQuery('#showMore').on('click', function (e) {
            e.preventDefault();
            showNextItems(next_items);
        });

        hideItems(initial_items);

        function updateActiveFilters(){
            var filtopic= jQuery("#filters-select-topic").find('option:selected').val();
            var filmedia_type = jQuery("#filters-select-media_type").find('option:selected').val();
            var filsolutions = jQuery("#filters-select-solutions").find('option:selected').val();
            activeFilters = "";
            if(filsolutions!=""){
                activeFilters = "<div class='active-filter-item' id='active-filter-solutions'>"+jQuery("#filters-select-solutions").find('option:selected').text()+" <i class='fa fa-times-circle'></i></div>";
            }

            if(filmedia_type!=""){
                activeFilters = activeFilters + "<div class='active-filter-item' id='active-filter-media_type'>"+jQuery("#filters-select-media_type").find('option:selected').text()+" <i class='fa fa-times-circle'></i></div>";
            }

            if(filtopic!=""){
                activeFilters = activeFilters + "<div class='active-filter-item' id='active-filter-topic'>"+jQuery("#filters-select-topic").find('option:selected').text()+" <i class='fa fa-times-circle'></i></div>";
            }

            if(activeFilters){
                jQuery(".activeFilters").html(activeFilters);
                jQuery(".clearFilters").show();
            }else{
                jQuery(".activeFilters").html("");
                jQuery(".clearFilters").hide();
            }


        }

        document.getElementById('clearFilters').onclick = function changeContent() {
            jQuery("#filters-select-solutions").val("").trigger("change");
            jQuery("#filters-select-media_type").val("").trigger("change");
            jQuery("#filters-select-topic").val("").trigger("change");
            updateActiveFilters();
            hideItems(initial_items);
            jQuery('#showMore').show();
            $grid.isotope();

        }

        jQuery(document).on("click","#active-filter-solutions",function() {
            jQuery("#filters-select-solutions").val("").trigger("change");
            updateActiveFilters();

            if(jQuery("#filters-select-solutions").val()=="" && jQuery("#filters-select-media_type").val()=="" && jQuery("#filters-select-topic").val()==""){
                hideItems(initial_items);
                jQuery('#showMore').show();
                $grid.isotope();
            };


        });

        jQuery(document).on("click","#active-filter-media_type",function() {
            jQuery("#filters-select-media_type").val("").trigger("change");
            updateActiveFilters();

            if(jQuery("#filters-select-solutions").val()=="" && jQuery("#filters-select-media_type").val()=="" && jQuery("#filters-select-topic").val()==""){
                hideItems(initial_items);
                jQuery('#showMore').show();
                $grid.isotope();
            };

        });

        jQuery(document).on("click","#active-filter-topic",function() {
            jQuery("#filters-select-topic").val("").trigger("change");
            updateActiveFilters();

            if(jQuery("#filters-select-solutions").val()=="" && jQuery("#filters-select-media_type").val()=="" && jQuery("#filters-select-topic").val()==""){
                hideItems(initial_items);
                jQuery('#showMore').show();
                $grid.isotope();
            };

        });
    });

</script>