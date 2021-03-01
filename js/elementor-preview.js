jQuery(function($) {
    
    "use strict";

    var $window = $(window);

    /* ******************************************************************************

    DISABLE EVENTS

    ********************************************************************************* */

    $('.projects-gallery-wrapper').off('click', '.loadmore_gallery');

    $('.header_top_line').velocity({
        opacity: 1,
    });

    $('.header_top_line_sticky').css({
        display: 'none',
    });

    $('.projects-gallery-wrapper').off();

    $('.elli-blog-list-wrapper').off('click', '.blog-tabs');

    $('.ale-blog-orderby').prop('disabled', 'disabled');



    if($('.animate-img-slider-food').length){
        $('.animate-img-slider-food').each(function(){
            $(this).addClass('animate-img-loaded');
        })
    }



    /* ******************************************************************************

    ANIMATIONS

    ********************************************************************************* */

    // Images animations

    var animateImages = function() {
        $('.fade-image:not(.loaded-img-wrapper):not(.progress-animation)').each(function(){
            var el = this;
            if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                $(el).addClass('loaded-img-wrapper');
            }
        });
    };

    function bindImageAnimations() {
        requestAnimationFrame(animateImages);
        $window.on('scroll', function(){
            requestAnimationFrame(animateImages);
        });
    }

    // Text animations

    var animateText = function() {
        $('.fade-animation:not(.loaded-animation):not(.progress-animation)').each(function(){
            var el = this;
            if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                $(el).addClass('loaded-animation');
            }
        });
    };

    function bindTextAnimations() {
        requestAnimationFrame(animateText);
        $window.on('scroll', function(){
            requestAnimationFrame(animateText);
        });
    }

    // Fade animations

    var animateFade = function() {
        $('.animate-fade:not(.loaded-item):not(.progress-animation)').each(function(){
            var el = this;
                if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                    $(el).addClass('loaded-item');
                }
        });
    };


    function bindFadeAnimations() {        
        requestAnimationFrame(animateFade);
        $window.on('scroll', function(){
            requestAnimationFrame(animateFade);
        });
    }

    // Mosaic animation

    function arrayShuffle(a) {
        var j, x, i;
        for (i = a.length; i; i--) {
            j = Math.floor(Math.random() * i);
            x = a[i - 1];
            a[i - 1] = a[j];
            a[j] = x;
        }
    }

    function animateMosaic() {
        if($('.mosaic-item').length > 0) {
            var items = [];
            $('.mosaic-item').each(function(){
                items.push($(this));
            });

            arrayShuffle(items);
            $(items).each(function(i, el){
                setTimeout(function(){
                    $(el).addClass('mosaic-loaded');
                }, 100*i);
            });
        }
    }

    // Reload animation

    function reloadAnimation(){
        $('.fade-image:not(.loaded-img-wrapper):not(.progress-animation)').each(function(){
            var el = $(this);
            if(el.offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {                
                el.addClass('loaded-img-wrapper');
            }
        });

        $('.fade-animation:not(.loaded-animation):not(.progress-animation)').each(function(){
            var el = $(this);
            if(el.offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {                
                el.addClass('loaded-animation');
            }
        });
    }

    setTimeout(function(){
        reloadAnimation();
    }, 550);  

    bindTextAnimations();
    bindImageAnimations();
    bindFadeAnimations();
    animateMosaic();  

    elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {

        if($('.elli-team-slider-wrapper').length){
            $('.elli-team-slider-wrapper').each(function(){
                $(this).ale_team_slider();
            });
        }

        if($('.content-wrapper-gallery').length){            
            $('.content-wrapper-gallery').ale_masonry_run();               
        }

        if($('.elli-menu-grid').length) {
            $('.elli-menu-grid').ale_masonry_menu_cl('reinit');
        } 

        if($('.ale-woocom-masonry-wrapper').length){
            $('.ale-woocom-masonry-wrapper').ale_masonry_shop();
        }

        if($('.elli-partner-wrapper-slider').length){
            $('.elli-partner-wrapper-slider').ale_partner_sl();
        }

        if($('.gallery-post-slider').length){
            $('.gallery-post-slider').owlCarousel({
                items: 1,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3500,
                loop: true,
                autoplaySpeed: 500,
                navSpeed: 500,
                navText: ["<i class=\"ion-ios-arrow-thin-left\"></i>","<i class=\"ion-ios-arrow-thin-right\"></i>"],
            });
        }

        $.fn.ale_menufood_slider = function(){
            var $this = $(this),
                mySwiper = new Swiper ('.ale-menu-slider-container', {
                // Optional parameters
                direction: 'horizontal',
                loop: false,
                effect: 'fade',
                mousewheelControl: false,
                keyboardControl: false,
                runCallbacksOnInit: true,
                simulateTouch: false,
                fadeEffect: {
                    crossFade: true
                },    
                navigation: {
                  nextEl: '.disable-slide',
                  prevEl: '.disable-slide',
                },

            });
        }        

        if($('.ale-menu-slider-container').length){
            $('.ale-menu-slider-container').each(function(){
                $(this).ale_menufood_slider();
                var getImgs =  $(this).find('.animate-img-slider-food');

                getImgs.each(function(){
                    $(this).addClass('animate-img-loaded');
                });
            });
        }

    /********************************************************************************

    * HEADER SLIDER 1

    ********************************************************************************/

    $.fn.ale_header_slider_1 = function(){
        var $this         = $(this),
            $container    = $this.find('.ale-header-swiper-slider'),
            $descr        = $this.find('.ale-header-slider-descr'),
            navRight      = $this.find('.ti-angle-right'),
            navLeft       = $this.find('.ti-angle-left'),
            headerDescr = new Swiper ($descr,{
                direction: "horizontal",
                loop: false,
                speed: 500,
                grabCursor: true,
                paginationClickable: true,
                parallax: true,
                effect: "fade",
                mousewheelControl: 1,
                runCallbacksOnInit: true,
                navigation: {
                    nextEl: navRight,
                    prevEl: navLeft,
                },   
                simulateTouch: false,
                autoplayDisableOnInteraction: false,
                paginationClickable: false,          
                controller: {
                    control: headerSlider1,
                }    
            }),
            headerSlider1 = new Swiper ($container, {
            // Image Slider Parameters
                direction: "horizontal",
                loop: false,
                speed: 500,
                grabCursor: true,
                paginationClickable: true,
                parallax: true,
                effect: "slide",
                mousewheelControl: 1,
                runCallbacksOnInit: true,
                navigation: {
                    nextEl: navRight,
                    prevEl: navLeft,
                },
                controller: {
                    control: headerDescr,
                },
            });
    }

    if($('.ale-header-slider-container').length){
        $('.ale-header-slider-container').each(function(){
            $(this).ale_header_slider_1();
        });
    }

    /********************************************************************************

    * HEADER SLIDER 2

    ********************************************************************************/

    $.fn.ale_header_slider_2 = function(){
        var $this         = $(this),
            $container    = $this.find('.ale-header-slider-st2'),
            $containerDes = $this.find('.ale-header-slider-descr'),
            navRight      = $this.find('.ti-angle-right'),
            navLeft       = $this.find('.ti-angle-left');

            var Slide1 = new Swiper($containerDes, {
                direction: "horizontal",
                loop: false,
                speed: 500,
                grabCursor: true,
                paginationClickable: true,
                parallax: true,
                effect: "fade",
                mousewheelControl: 1,
                runCallbacksOnInit: true,
                navigation: {
                    nextEl: navRight,
                    prevEl: navLeft,
                },   
                simulateTouch: false,
                autoplayDisableOnInteraction: false,
                paginationClickable: false,          
                controller: {
                    control: Slide2,
                }       
            });

            var Slide2 = new Swiper($container, {
                direction: "horizontal",
                loop: false,
                speed: 500,
                grabCursor: true,
                paginationClickable: true,
                parallax: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false

                  },
                effect: "slide",
                mousewheelControl: 1,
                runCallbacksOnInit: true,
                navigation: {
                    nextEl: navRight,
                    prevEl: navLeft,
                },                
                simulateTouch: true,
                slideToClickedSlide: true,
                controller: {
                    control: Slide1,
                },      
                pagination: {
                    el: '.header-swiper-pagination',
                    type: 'bullets',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">' + '0' + (index + 1) + '.' +'</span>';
                    }
                },          
            });
        }

        if($('.ale-header-slider-container-st2').length){
            $('.ale-header-slider-container-st2').each(function(){
                $(this).ale_header_slider_2();
            });
        }

        if($('.gallery-wrapper-imgs').length){
            $('.gallery-wrapper-imgs').ale_masonry_run_menu();
        }
    });
});