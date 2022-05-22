$ = jQuery.noConflict();

jQuery(window).on("load", function () {
    "use strict";

    /*  ===================================
        Loading Timeout
     ====================================== */
    $(".loader-area").fadeOut(800);

});

jQuery(function ($) {
    "use strict";


    //************************* SCROLL FUNCTIONS***********************//
// Navbar Scroll Function
    var $window = $(window);
    $window.scroll(function () {
        var $scroll = $window.scrollTop();
        var $navbar = $(".sidemenu-nav");
        if (!$navbar.hasClass("sticky-bottom")) {
            if ($scroll > 250) {
                $navbar.addClass("fixed-menu");
            } else {
                $navbar.removeClass("fixed-menu");
            }
        }
    });

// Navbar Scroll Function
    var $window = $(window);
    $window.scroll(function () {
        var $scroll = $window.scrollTop();
        var $navbar = $(".fixed-navbar");
        if (!$navbar.hasClass("sticky-bottom")) {
            if ($scroll > 250) {
                $navbar.addClass("fixed-menu1");
            } else {
                $navbar.removeClass("fixed-menu1");
            }
        }
    });


    $(".scroll").on("click", function (event) {
        event.preventDefault();
        $("html,body").animate({
            scrollTop: $(this.hash).offset().top - 100
        }, 1200);
    });


    //***************** MENU AND CLOSE BUTTON OFSIDE NAVBAR*********************//
    $('.menu-btn').on("click", function () {
        $('.outer-wrapper').removeClass('end-anm1');
        $('.outer-wrapper').addClass('inner-wrapper');
        $('.main-content').addClass('main-content-hide');
        $('body').css({overflow:'hidden'});
        $('.outer-wrapper').addClass('start-anm1');

    });
    $('.close-outerwindow').on("click", function () {
        $('.outer-wrapper').removeClass('start-anm1');
        $('.outer-wrapper').addClass('end-anm1');
        $('body').css({overflow:'visible'});
        $('.main-content').removeClass('main-content-hide');
        setTimeout(function () {
            $('.outer-wrapper').removeClass('inner-wrapper');
        }, 800);
    });
    $('.outer-wrapper ul li a').click(function () {
        $('.outer-wrapper').removeClass('inner-wrapper');
    });


    //*******************TESTIMONIAL OWL CAROUSAL*********************//
    $('.owl-testimonial').owlCarousel({
        items:3,
        loop:true,
        center:false,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });


    //*******************INITIALIZE FANCY BOX*************************//
    $(document).ready(function() {
        $(".vimeo").fancybox({
            width: 740,
            height: 425,
            type: 'iframe',
            fitToView : false
        });
    });



//******************PLAY AUDIO AND VIDEO************************//
    $('video, audio').mediaelementplayer({
        // Do not forget to put a final slash (/)
        pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
        // this will allow the CDN to use Flash without restrictions
        // (by default, this is set as `sameDomain`)
        shimScriptAccess: 'always'
        // more configuration
    });

});


(function($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#js-grid-masonry-projects').cubeportfolio({
        filters: '#js-filters-masonry-projects',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 35,
        gapVertical: 25,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 5,
        }, {
            width: 1100,
            cols: 3,
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 1,
            options: {
                caption: '',
                gapHorizontal: 35,
                gapVertical: 10,
            }
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function(url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 30000
            })
                .done(function(result) {
                    t.updateSinglePage(result);
                })
                .fail(function() {
                    t.updateSinglePage('AJAX Error! Please refresh the page!');
                });
        },

        plugins: {
            loadMore: {
                element: '#js-loadMore-masonry-projects',
                action: 'click',
                loadItems: 3,
            }
        },
    });
})(jQuery, window, document);











