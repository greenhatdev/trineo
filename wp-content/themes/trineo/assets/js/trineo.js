/** Accordion Behaviours **/

jQuery('.js-accordion-trigger').click(function (e) {
    var $currentItem = jQuery(this);
    var $parentItem = $currentItem.parent().parent();
    var $rootItem = $currentItem.parent().parent().parent();
    // jQuery('.grid').isotope("reloadItems");
    if (($parentItem).hasClass('is-expanded')) {
        $parentItem.removeClass('is-expanded');
        $rootItem.find('.js-accordion-subcontent').slideUp();
        // jQuery('.grid').delay(2000 ).isotope('layout');
        e.preventDefault();
    } else {
        $rootItem.find('.accordion__item').removeClass('is-expanded');
        $rootItem.find('.js-accordion-subcontent').slideUp();
        $parentItem.find('.js-accordion-subcontent').slideToggle('fast');  // apply the toggle to the ul
        $parentItem.addClass('is-expanded');


        // jQuery('.grid').delay(2000 ).isotope('layout');
        e.preventDefault();
    }

    setTimeout(function(){  jQuery('.grid').isotope();
    }, 500);

    // jQuery('.grid').isotope({
    //     itemSelector: '.grid-item2',
    //     layoutMode: 'vertical',
    //     transitionDuration: 100,
    //
    // });


});

jQuery(document).ready(function() {
    // new WOW().init();
    jQuery('.home-case-study-owl-carousel').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 20,
        navText: [
            '<i class="owl-carousel-prev" aria-hidden="true"></i>',
            '<i class="owl-carousel-next" aria-hidden="true"></i>'
        ],
        navContainer: '.case-studies-carousel .custom-nav',
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            769: {
                items: 2,

            },
            1000: {
                items: 2,
            }
        }
    })



        var focused = jQuery('input:first'); //this is just to have a starting point
        jQuery('button').on('click', function () {
            focused.next('input').trigger('touchstart'); //trigger touchstart
        });
    jQuery('input').on('touchstart', function () {
        jQuery(this).focus();
            focused = jQuery(this);
        });


    // /** Masonry Grid Component **/
    //
    // var $imageGridContainer = jQuery('.js-image-grid');
    // var htlml5Videos = jQuery('.js-image-grid').find('video');
    //
    // var $grid = $imageGridContainer.masonry({
    //     // options...
    //     columnWidth: '.grid-sizer',
    //     itemSelector: '.image-grid__item',
    //     gutter: '.gutter-sizer'
    // });
    //
    // function waitForvidLoad(vids, callback) {
    //     if(vids.length === 0){
    //         callback();
    //     }
    //     var vidsLoaded = 0;
    //     vids.on('loadeddata', function() {
    //         vidsLoaded++;
    //         if (vids.length === vidsLoaded) {
    //             callback();
    //         }
    //     });
    // }
    //
    // //Fixes alignment issues for video elements
    // waitForvidLoad(htlml5Videos, function() {
    //     $grid.imagesLoaded(function () {
    //         $grid.masonry('layout');
    //     });
    // });

    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

// Get the header
    var header = document.getElementById("main-header");

// Get the offset position of the navbar
    var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {

        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }


});








