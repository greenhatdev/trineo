<!--<link href="--><?php //echo get_site_url(); ?><!--/wp-content/themes/trineo/assets/css/vendor/select2.min.css" rel="stylesheet" />-->
<!--<script src="--><?php //echo get_site_url(); ?><!--/wp-content/themes/trineo/assets/js/select2.min.js"></script>-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/trineo/assets/js/isotope.pkgd.min.js"></script>
<div class="bg1"></div>
<section class="margin-md-bottom padding-md-top margin-lg-top">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-2">
                <div class="row d-flex justify-content-center" id="filters">
                    <div class="pff-filters-label ">
                        <div class="filterTitle"><b>FILTER:</b></div>
                        <div class="clearFilters" id="clearFilters">Clear all</div>
                    </div>

                    <div class="pff-filters-label" id="filters-topic">
                        <div class="accordion" id="accordion1">
                            <div class="accordion__item is-expanded">
                                <div class="accordion__heading">
                                    <h6 class="accordion-trigger js-accordion-trigger">Topics</h6>
                                </div>
                                <div class="accordion__subcontent js-accordion-subcontent">
                                    <div class="control-group">
                                    <?php
                                    $categories = get_terms(array(
                                        'taxonomy'			=> 'category',
                                        'meta_query'		=> array(
                                            'relation'		=> 'AND',
                                            array(
                                                'key'			=> 'show_as_a_filter',
                                                'value'			=> true,
                                                'compare'		=> '='
                                            )
                                        )
                                    ));
                                    foreach ($categories as $category): ?>
                                            <label class="control control-checkbox">
                                                <?php echo $category->name ?>
                                                <input type="checkbox" value=".<?php echo $category->slug; ?>"
                                                       data-filter=".<?php echo $category->slug; ?>"/>
                                                <div class="control_indicator"></div>
                                            </label>

                                    <?php
                                    endforeach;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pff-filters-label">
                        <div class="accordion" id="accordion2">
                            <div class="accordion__item is-expanded">
                                <div class="accordion__heading">
                                    <h6 class="accordion-trigger js-accordion-trigger">Solutions</h6>
                                </div>
                                <div class="accordion__subcontent js-accordion-subcontent">
                                    <div class="control-group">
                                    <?php
                                    $categories = get_terms('post_solutions', array('hide_empty' => '1'));
                                    foreach ($categories as $category): ?>
                                        <label class="control control-checkbox">
                                            <?php echo $category->name ?>
                                            <input type="checkbox" value=".<?php echo $category->slug; ?>"
                                                   data-filter=".<?php echo $category->slug; ?>"/>
                                            <div class="control_indicator"></div>
                                        </label>
                                    <?php
                                    endforeach;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pff-filters-label">
                        <div class="accordion" id="accordion3">
                            <div class="accordion__item is-expanded">
                                <div class="accordion__heading">
                                    <h6 class="accordion-trigger js-accordion-trigger">Media Type</h6>
                                </div>
                                <div class="accordion__subcontent js-accordion-subcontent">
                                    <div class="control-group">
                                    <?php
                                    $categories = get_terms(array(
                                        'taxonomy'			=> 'post_media_type',
                                        'meta_query'		=> array(
                                            'relation'		=> 'AND',
                                            array(
                                                'key'			=> 'show_as_a_filter',
                                                'value'			=> true,
                                                'compare'		=> '='
                                            )
                                        )
                                    ));
                                    foreach ($categories as $category): ?>
                                        <label class="control control-checkbox">
                                            <?php echo $category->name ?>
                                            <input type="checkbox" value=".<?php echo $category->slug; ?>"
                                                   data-filter=".<?php echo $category->slug; ?>"/>
                                            <div class="control_indicator"></div>
                                        </label>
                                    <?php
                                    endforeach;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>

<br/><br/>
                        <div class="pff-filters-label quicksearchicon">
                            <i class="fa fa-search quick-search-icon"></i>
                            <input type="text" class="quicksearch" placeholder="Search articles"/>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-10">
                <div class=" grid">
                    <?php
                    $newslist = new WP_Query(array(
                        'post_type' => 'post',
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
                            foreach (get_the_category(get_the_ID()) as $c) {
                                $cat = get_category($c);
                                array_push($cats, str_replace("!", "", strtolower($cat->slug)));
                            }

                            if (sizeOf($cats) > 0) {
                                $post_categories = implode(' ', $cats);
                            } else {
                                $post_categories = " ";
                            }

                            $postURL = get_the_permalink();
                            $term_list_solutions = wp_get_post_terms($post->ID, 'post_solutions', array("fields" => "all"));
                            $solutionss = '';
                            foreach ($term_list_solutions as $solutions) {
                                $solutionss .= $solutions->slug . ' ';
                            }

                            $term_list_industries = wp_get_post_terms($post->ID, 'post_media_type', array("fields" => "all"));
                            $industries = '';
                            foreach ($term_list_industries as $media_type) {
                                $industries .= $media_type->slug . ' ';

                            }

                            ?>
                            <div class="insights-element <?php echo $post_categories; ?> <?php echo $solutionss; ?> <?php echo $industries; ?>grid-item"
                                 id="<?php echo get_the_ID() ?>">

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
        <div class="row">
            <button class="button  showMore" id="showMore">Load more</button>
        </div>
    </div>
</section>


<script>

    // flatten object by concatting values
    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += obj[prop];
        }
        return value;
    }

    // debounce so filtering doesn't happen every millisecond
    function debounce(fn, threshold) {
        var timeout;
        threshold = threshold || 100;
        return function debounced() {
            clearTimeout(timeout);
            var args = arguments;
            var _this = this;

            function delayed() {
                fn.apply(_this, args);
            }

            timeout = setTimeout(delayed, threshold);
        };
    }

    jQuery(document).ready(function () {

        var qsRegex;
        var filters = {};
        var filterValue;
        var activeFilters = "";
        var initial_items = 15;
        var next_items = 15;
        var $grid = jQuery('.grid').isotope({
            // options
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
            transitionDuration: '0s',
            hiddenStyle: {
                opacity: 0
            },
            visibleStyle: {
                opacity: 1
            },
            transitionDuration: 100,
            masonry: {
                columnWidth: '.grid-sizer'
            },
            fitRows: {
                gutter: 20
            },
            filter: function () {
                var $this = jQuery(this);
                var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                var selectResult = filterValue ? $this.is(filterValue) : true;
                return searchResult && selectResult;
            }
        });

        var $checkboxes = $('#filters input');

        $checkboxes.change( function() {
            // map input values to an array
            var inclusives = [];
            // inclusive filters from checkboxes
            $checkboxes.each( function( i, elem ) {
                // if checkbox, use value if checked
                if ( elem.checked ) {
                    inclusives.push( elem.value );
                }
            });

            // combine inclusive filters
            filterValue = inclusives.length ? inclusives.join(', ') : '*';
            showAllItems();
            // $grid.isotope({ filter: filterValue })
            $grid.isotope();
        });

        var $quicksearch = jQuery('.quicksearch').keyup(debounce(function () {
            qsRegex = new RegExp($quicksearch.val(), 'gi');
            jQuery('#showMore').hide();
            if ($quicksearch.val() == "") {
                jQuery('#showMore').show();
            }

            showAllItems();
            $grid.isotope();

        }, 200));


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

        function showAllItems() {
            jQuery('.grid-item').each(function () {
                jQuery(this).removeClass('visible_item');
            });
            jQuery('#showMore').hide();
        }

        jQuery('#showMore').on('click', function (e) {
            e.preventDefault();
            showNextItems(next_items);
        });

        // hideItems(initial_items);

        function updateActiveFilters() {

        }

        document.getElementById('clearFilters').onclick = function changeContent() {
            var $checkboxes = $('#filters input');
            $checkboxes.each( function( i, elem ) {
                elem.checked = false;
            });
            jQuery('.quicksearch').val("");
            hideItems(initial_items);
            jQuery('#showMore').show();
            $grid.isotope({ filter: "" });

        }


        hideItems(initial_items);



    });

</script>