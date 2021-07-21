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
    jQuery('.home-case-study-owl-carousel').on('initialized.owl.carousel', function(event) {

        jQuery( "a[href='#"+jQuery(".owl-item.active.center").find('.single-case-study-image').attr("cat")+"'" ).addClass( "active" )
    })

    jQuery('.home-case-study-owl-carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        margin: 20,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
        center:true,
        navText: [
            '<i class="owl-carousel-prev" aria-hidden="true"></i>',
            '<i class="owl-carousel-next" aria-hidden="true"></i>'
        ],
        navContainer: '.case-studies-carousel .custom-nav',
        autoWidth:true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            769: {
                items: 1,

            },
            1000: {
                items: 1,
            }
        }
    });

    jQuery('.home-case-study-owl-carousel').on('translated.owl.carousel', function(event) {
        jQuery(".case-study-urls").removeClass("active");
        jQuery( "a[href='#"+jQuery(".owl-item.active.center").find('.single-case-study-image').attr("cat")+"'" ).addClass( "active" )
    })


    jQuery('.testimonials-owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        margin: 20,
        navText: [
            '<i class="owl-carousel-prev" aria-hidden="true"></i>',
            '<i class="owl-carousel-next" aria-hidden="true"></i>'
        ],
        navContainer: '.testimonials-carousel .custom-nav2',
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            769: {
                items: 1,

            },
            1000: {
                items: 1,
            }
        }
    })

    jQuery('.image-owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        margin: 20,
        navText: [
            '<i class="owl-carousel-prev" aria-hidden="true"></i>',
            '<i class="owl-carousel-next" aria-hidden="true"></i>'
        ],
        navContainer: '.image-carousel .custom-nav3',
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            769: {
                items: 3,

            },
            1000: {
                items: 4,
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

    $(document).on('click', 'a.anchor', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 100
            // 100 is the sticky nav height
        }, 500);
    });


});


$(document).ready(function() {
   $(window).scroll(function () {

        // console.log($(window).scrollTop());

        if ($(window).scrollTop() > 350) {
            $('.impact_navigation').addClass('navbar-fixed-top');
        }

        if ($(window).scrollTop() < 351) {
            $('.impact_navigation').removeClass('navbar-fixed-top');
        }
    });


});

$("body").on('click', ".whr-item",function(event) {
    var careerlink = $(this).find("a").attr("href");
    // console.log(careerlink);
    // document.location.href = careerlink;
    window.open(careerlink, '_blank');
});




$(document).ready(function() {

    // The function
    var background_image_parallax = function ($object, multiplier) {
        multiplier = typeof multiplier !== "undefined" ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({ "background-attatchment": "fixed" });
        $(window).scroll(function () {
            var from_top = $doc.scrollTop(),
                bg_css = "0px " + multiplier * from_top + "px";
            $object.css({ "background-position": bg_css });
        });
    };

    background_image_parallax($(".col-sm-5.background-image-cover"), 0.25);

});








