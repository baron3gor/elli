jQuery(function($) {

    "use strict";

    var $window = $(window);

    /********************************************************************************

    * COLOR THEMES

    ********************************************************************************/
    var getBody = $('body'),
        getBodyColor = getBody.attr('data-color'),
        getSticky = $('.header_top_line_sticky'),
        getStickyColor = getSticky.attr('data-color'),
        getFooter = $('footer.elli-main-footer'),
        getFooterColor = getFooter.attr('data-color');

    if (typeof getBodyColor !== typeof undefined && getBodyColor !== false) {
        getBody.css('background-color', getBodyColor);
    }

    if (typeof getStickyColor !== typeof undefined && getStickyColor !== false) {
        getSticky.css({
            'background-color': getStickyColor,
            'border-color': getStickyColor,
        });
    }

    if (typeof getFooterColor !== typeof undefined && getFooterColor !== false) {
        getFooter.css('background-color', getFooterColor);
    }
    


    /********************************************************************************

    * IMG ANIMATION HEADER

    ********************************************************************************/

    var animateImagesHeader = function() {
        $('.fade-image-header-slide:not(.loaded-header-slide):not(.progress-animation)').each(function(){
            var el = this;
            if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                $(el).addClass('loaded-header-slide');
            }
        });
    };

    function bindImageAnimationsHeader() {
        requestAnimationFrame(animateImagesHeader);
        $window.on('scroll', function(){
            requestAnimationFrame(animateImagesHeader);
        });
    }



    /********************************************************************************

    * IMG ANIMATION

    ********************************************************************************/

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



    /********************************************************************************

    * IMG ANIMATION 2

    ********************************************************************************/

    var animateImagesFade = function() {
        $('.animate-img:not(.animate-img-loaded):not(.progress-animation)').each(function(){
            var el = this,
            getImg = $(el).find('img');

            
                if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                    $(el).addClass('animate-img-loaded');
                }
            
        });
    };

    function bindImageAnimationsFade() {
        requestAnimationFrame(animateImagesFade);
        $window.on('scroll', function(){
             requestAnimationFrame(animateImagesFade);
        });
    }



   /********************************************************************************

    * TEXT ANIMATION

    ********************************************************************************/

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



    /********************************************************************************

    * FADE UP ANIMATION

    ********************************************************************************/

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



    /********************************************************************************

    * FADE IN ANIMATION ON SCROLL

    ********************************************************************************/

    var animateFadeIn = function() {
        $('.animate-in-fade:not(.loaded-fade-item):not(.progress-animation)').each(function(){
            var el   = this,
                prnt = $(this).parent();
                if($(prnt).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                    $(el).addClass('loaded-fade-item');
                }
        });
    };


    function bindFadeInAnimations() {        
        requestAnimationFrame(animateFadeIn);
        $window.on('scroll', function(){
            requestAnimationFrame(animateFadeIn);
        });
    }



    /********************************************************************************

    * MOSAIC ANIMATION

    ********************************************************************************/

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



    /********************************************************************************

    * TEXTAREAS AND SCROLL UP

    ********************************************************************************/

    $('.form-message').textareaAutoSize();
    $('#comment').textareaAutoSize();

    $(function () {
        $.scrollUp({
            animation: 'fade',
            scrollText: '<span><i class=\"ion-ios-arrow-up\"></i></span>',
            zIndex: 9998,
        });
    });



    /********************************************************************************

    * TOP LINE

    ********************************************************************************/

    $(window).scroll(function() {
        var getStickyHeight = '';
        if($('.banner-area').length) {
            getStickyHeight = $('.ale-banner-area-wrapper').height() + $('header').height();
        } else {
            getStickyHeight = $('header').height();
        }

        if($(document).scrollTop() > getStickyHeight) {
            $('.header_top_line_sticky').addClass('ale-container-appear');
        } else {
            $('.header_top_line_sticky').removeClass('ale-container-appear');   
        }
    });

    $(function(){
      var $ppc = $('.progress-pie-chart'),
        percent = parseInt($ppc.data('percent')),
        deg = 360*percent/100;
      if (percent > 50) {
        $ppc.addClass('gt-50');
      }
      $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
      $('.ppc-percents span').html(percent+'%');
    });



   /********************************************************************************

    * TABS

    ********************************************************************************/

    if($('.ale-project-lightbox').length){
        lightbox.option({
          'resizeDuration': 300,
          'wrapAround': true,
          'fadeDuration': 400,
          'imageFadeDuration': 400,
          'maxWidth': 1300,
        })
    }



    /********************************************************************************

    * MASONRY MENU

    ********************************************************************************/

     $.fn.ale_masonry_menu_cl = function(d){
        var a = d;
        $(this).each(function(){
            if(a == 'reinit') {
                $(this).masonry('destroy');
            }

            var $grid = $(this).masonry({          
              // options
                itemSelector: '.elli-menu-grid-item',
                gutter: '.elli-menu-gutter-sizer',
                percentPosition: true,
                resize: true,
            }).masonry('reload');
            
        })
     }

    if($('.elli-menu-grid').length) {
        $('.elli-menu-grid').ale_masonry_menu_cl();
    }



    /********************************************************************************

    * MASONRY GALLERY

    ********************************************************************************/

    $.fn.ale_masonry_run = function() {
        $(this).each(function(){
            var $galleryGrid = $(this).imagesLoaded(function(){
                $galleryGrid.masonry({
                  // options
                  itemSelector: '.grid-gallery',
                  gutter: '.gutter-gallery',
                  percentPosition: true,
                  resize: true,
                });
            })
        })
    }

    if($('.content-wrapper-gallery').length){
        $('.content-wrapper-gallery').ale_masonry_run();
    }



    /********************************************************************************

    * MASONRY MENU GALLERY

    ********************************************************************************/

    $.fn.ale_masonry_run_menu = function() {
        $(this).each(function(){
            var $galleryGridMenu = $(this).imagesLoaded(function(){
                $galleryGridMenu.masonry({
                  // options
                  itemSelector: '.menu-grid-gallery',
                  gutter: '.gutter-menu-gallery',
                  percentPosition: true,
                  resize: true,
                });
            })
        })
    }

    if($('.gallery-wrapper-imgs').length){
        $('.gallery-wrapper-imgs').ale_masonry_run_menu();
    }



    /********************************************************************************

    * MASONRY SHOP

    ********************************************************************************/

    $.fn.ale_masonry_shop = function() { 
        $(this).each(function(){
            var $shopMasonry = $(this).imagesLoaded(function(){
                $shopMasonry.masonry({
                  // options
                  itemSelector: '.ale-shop-grid',
                  percentPosition: true,
                  resize: true,
                  fitWidth: true,
                  columnWidth: '.ale-grid-shop-sizer',
                });
            })
        })
    }

    if($('.ale-woocom-masonry-wrapper').length){
        $('.ale-woocom-masonry-wrapper').ale_masonry_shop();
    }



    /********************************************************************************

    * OFFSET ELEMENTOR

    ********************************************************************************/

    $.fn.ale_offset_position = function(){
        $(this).each(function(){
            var $this = $(this),
                getOffset = $('.elementor-container').offset(),
                getLeft   = - getOffset.left;

            $this.css('left', getLeft);
        })
    }



    /********************************************************************************

    * ONLOAD ANIMATION

    ********************************************************************************/

    $window.load(function(){
        if($('aside.ale-theme-loading').length){
            setTimeout(function(){
                $('.elli_wrapper').velocity({ begin : function(){
                    $('aside.ale-theme-loading').addClass('loaded');
                    $('aside.ale-theme-loading .preload-logo-wrapper').addClass('logo-animation');
                }}, {duration: 570, complete: function(){
                    $('.onload-fade-animation').animate({
                        opacity: 1,
                    }, 200);
                    $('.ale-dott-left-background').animate({
                        opacity: 1,
                    }, 200);
                    $('.ale-dott-right-background').animate({
                        opacity: 1,
                    }, 200);
                    $('.ale-dott-bg-right').animate({
                        opacity: 1,
                    }, 200);
                    $('.ale-dott-bg').animate({
                        opacity: 1,
                    }, 200);
                    $('.ale-header-dott-background').animate({
                        opacity: 1,
                    }, 200);
                    setTimeout(function(){
                        $('.ale-img-animation').addClass('ale-image-loaded');
                    }, 1300);

                    setTimeout(function(){
                        $('.animate-img-slider-food').addClass('animate-img-loaded');
                    }, 570);

                    setTimeout(function(){  
                        $('body').addClass('content-loaded');
                        $(this).remove();
                        animateMosaic();
                        bindImageAnimations();
                        bindTextAnimations();
                        bindFadeAnimations();
                        bindFadeInAnimations();   
                        bindImageAnimationsHeader();        
                        $('.page-intro').addClass('intro-loaded');
                    },500);
                }});
            },200);
        } else {
            $('.elli_wrapper').velocity({ begin : function(){
                $('aside.ale-theme-loading').addClass('loaded');
                $('aside.ale-theme-loading .preload-logo-wrapper').addClass('logo-animation');
            }}, {duration: 270, complete: function(){
                $('.onload-fade-animation').animate({
                    opacity: 1,
                }, 200);
                $('.ale-dott-left-background').animate({
                    opacity: 1,
                }, 200);
                $('.ale-dott-right-background').animate({
                    opacity: 1,
                }, 200);
                $('.ale-dott-bg-right').animate({
                    opacity: 1,
                }, 200);
                $('.ale-dott-bg').animate({
                    opacity: 1,
                }, 200);
                $('.ale-header-dott-background').animate({
                    opacity: 1,
                }, 200);
                setTimeout(function(){
                    $('.ale-img-animation').addClass('ale-image-loaded');
                }, 1000);

                setTimeout(function(){
                    $('.animate-img-slider-food').addClass('animate-img-loaded');
                }, 270);

                setTimeout(function(){  
                    $('body').addClass('content-loaded');
                    $(this).remove();
                    animateMosaic();
                    bindImageAnimations();
                    bindTextAnimations();
                    bindFadeAnimations();
                    bindFadeInAnimations();   
                    bindImageAnimationsHeader();        
                    $('.page-intro').addClass('intro-loaded');
                },300);
            }});
        }
        
    });



    /********************************************************************************

    * SEARCH ANIMATION

    ********************************************************************************/
 
    if($('.top_line_search').length){

        $('.top_line_search').on('click', function(){
            $('.search-layer-one').velocity({
                right: '0'
            }, {duration: 550});

            $('.search-layer-two').velocity({
                right: '0'
            }, {delay: 200, duration: 600});

            $('.search-layer-three').velocity({
                    right: '0'
            }, {delay:400, duration: 650, complete: function(){
                $('.search-bottom-line').velocity({
                    width: '100%'
                }, {duration: 350})

                $('.ion-ios-search').velocity({
                    opacity: '1'
                }, {delay: 300, duration: 100})
            }});
        });


        $('.ale-search-fullscreen-wrapper .ti-close').on('click', function(){

            $('.search-layer-one').velocity({
                right: '-100%'
            }, {duration: 400});

            $('.search-layer-two').velocity({
                right: '-75%'
            }, {duration: 400});

            if($(window).width() > 782){
                $('.search-layer-three').velocity({
                    right: '-50%'
                }, {duration: 400});

            } else {
                $('.search-layer-three').velocity({
                    right: '-100%'
                }, {duration: 400});
            }
            
            $('.ale-popup-search').velocity({
                opacity: '0'
            }, {duration: 100, complete: function(){
                $('.ale-popup-search').velocity({
                    opacity: '1'
                })

                $('.search-bottom-line').velocity({
                    width: '0'
                })

                $('.ion-ios-search').velocity({
                    opacity: '0'
                });

                $('.pop-up-search').attr('value', '');
            }})
        })

        $(document).mouseup(function(e) {
            var getSearchPopup = $('.search-layer-three');

            if (!getSearchPopup.is(e.target) && getSearchPopup.has(e.target).length === 0 && $('.search-layer-three').css('right') == '0px') 
            {
                $('.search-layer-one').velocity({
                right: '-100%'
            }, {duration: 400});

            $('.search-layer-two').velocity({
                right: '-75%'
            }, {duration: 400});

            if($(window).width() > 782){
                $('.search-layer-three').velocity({
                    right: '-50%'
                }, {duration: 400});

            } else {
                $('.search-layer-three').velocity({
                    right: '-100%'
                }, {duration: 400});
            }

            $('.ale-popup-search').velocity({
                opacity: '0'
            }, {duration: 100, complete: function(){
                $('.ale-popup-search').velocity({
                    opacity: '1'
                })

                $('.search-bottom-line').velocity({
                    width: '0'
                })

                $('.ion-ios-search').velocity({
                    opacity: '0'
                });

                $('.pop-up-search').attr('value', '');
            }})
            }
        });

    }

   

    /********************************************************************************

    * SELECT AND DATEPICKER

    ********************************************************************************/

    if (typeof $.fn.selectpicker == 'function') {
        $('.otw-selectpicker').selectpicker();
    }

    //Party Size Change
    $('.otw-party-size-select').on('change', function () {
        $('.PartySize').val($(this).val());
    });

    var now = (Date.now() - 86400000); //allow today to be selected

    //Datepicker Initialization
    if($(".select-date-ot").length){
        $(".select-date-ot").datepicker({
            autohide : true,
            autopick : true,
            format: "mm/dd/yyyy",
            weekStart: 0,
            filter: function ( date ) {
                return date.valueOf() >= now;
            },
            template: (
                '<div class="open-table-widget-datepicker datepicker-container">' +
                '<div class="datepicker-panel" data-view="years picker">' +
                '<ul>' +
                '<li data-view="years prev">&lsaquo;</li>' +
                '<li data-view="years current"></li>' +
                '<li data-view="years next">&rsaquo;</li>' +
                '</ul>' +
                '<ul data-view="years"></ul>' +
                '</div>' +
                '<div class="datepicker-panel" data-view="months picker">' +
                '<ul>' +
                '<li data-view="year prev">&lsaquo;</li>' +
                '<li data-view="year current"></li>' +
                '<li data-view="year next">&rsaquo;</li>' +
                '</ul>' +
                '<ul data-view="months"></ul>' +
                '</div>' +
                '<div class="datepicker-panel" data-view="days picker">' +
                '<ul>' +
                '<li data-view="month prev">&lsaquo;</li>' +
                '<li data-view="month current"></li>' +
                '<li data-view="month next">&rsaquo;</li>' +
                '</ul>' +
                '<ul data-view="week"></ul>' +
                '<ul data-view="days"></ul>' +
                '</div>' +
                '</div>'
            )
        });

        $.fn.datepicker.noConflict();
    }   

    $(document.body).on("click",".social_share_list li a", function( event ) {

        //if email button clicked do nothing
        if( $(this).hasClass("icon-mail") ){
            return ;
        }

        //for other buttons open a popup window
        var newwindow=window.open($(this).attr("data-url"),'name','height=400,width=400');

        if (newwindow == null || typeof(newwindow)=='undefined') {
            console.log('error');
        }else{
            newwindow.focus();
        }

        event.preventDefault();
    });


    $(document.body).on("click",".quantity span.quantity-down,.quantity span.quantity-up", function( e ) { 
            e.preventDefault();

            var $this = $(this),
                plus = $this.hasClass("quantity-up"),
                input = $this.parent().find(".qty"),
                step = parseInt(input.attr("step")),
                min = parseInt(input.attr("min")),
                max = parseInt(input.attr("max")),
                val = parseInt(input.attr("value")),
                new_val = 0;

            if( plus ){
                new_val = val + step;
            }else{
                new_val = val - step;
            }
            new_val = min ? Math.max(min,new_val) : new_val;
            new_val = max ? Math.min(max,new_val) : new_val;
            new_val = Math.max(0,new_val);

            input.val( new_val );
            input.trigger("change");
    });



    /********************************************************************************

    * SIDE MENU

    ********************************************************************************/

    if($('.top_line_sidemenu_icon').length){

        $('.top_line_sidemenu_icon').on('click', function(){
            if($('.elli-side-menu.elli-side-mobile').is(':visible')){
                $('body').css('overflow', 'hidden');
            }
            $('.elli-side-menu').addClass('elli-side-menu-open');
        })

        $('.ti-close').on('click', function(){
            $('.elli-side-menu').removeClass('elli-side-menu-open');
            $('body').css('overflow', 'auto');
        })

        if($('.elli-side-menu.elli-side-desktop.elli-side-menu-open')){
           $window.on('scroll', function(){
                $('.elli-side-menu.elli-side-desktop').removeClass('elli-side-menu-open');
                $('body').css('overflow', 'auto');
            })
        }        
    }  


    $(document).mouseup(function(e) 
    {
        var sidemenu = $('.elli-side-menu');

        if (!sidemenu.is(e.target) && sidemenu.has(e.target).length === 0) 
        {
            sidemenu.removeClass('elli-side-menu-open');
            $('body').css('overflow', 'auto');
        }
    });



    /********************************************************************************

    * RESPONSIVE STYLES

    ********************************************************************************/

    if($(window).width() < 1024){
        $('.elli-side-menu.elli-side-desktop').css('display', 'none');
        $('.elli-side-menu.elli-side-mobile').css('display', 'block');
        $('.ale-nav-wrapper').css('display', 'none');
        $('.ale-sidebar-template-header').css('display', 'block');
        $('.top_line_logo_wrapper').css('width', '100%');
        $('.ale-check-sidemenu-content').removeClass('ale-side-menu-empty');
        $('.ale-check-mobile-menu').addClass('ale-mobile-menu-empty');
    } else {
        $('.elli-side-menu.elli-side-mobile').css('display', 'none');
        $('.elli-side-menu.elli-side-desktop').css('display', 'block');
        $('.ale-nav-wrapper').css('display', 'flex');
        $('.top_line_logo_wrapper').css('width', 'auto');
        $('.ale-sidebar-template-header').css('display', 'none');
        $('.ale-check-sidemenu-content').addClass('ale-side-menu-empty');
        $('.ale-check-mobile-menu').removeClass('ale-mobile-menu-empty');
    }

    if($(window).width() > 782){
        $('.search-layer-three').css({
            right: '-50%'
        });

    } else {
        $('.search-layer-three').css({
            right: '-100%'
        });
    }

    $(window).resize(function() {
        $('.search-layer-two').css({
            right: '-75%'
        });
        $('.search-layer-one').css({
            right: '-100%'
        });
        if($(window).width() > 782){
            $('.search-layer-three').css({
                right: '-50%'
            });

        } else {
            $('.search-layer-three').css({
                right: '-100%'
            });
        }
        if($(window).width() < 1024){
            $('.elli-side-menu.elli-side-desktop').css('display', 'none');
            $('.elli-side-menu.elli-side-mobile').css('display', 'block');
            $('.ale-nav-wrapper').css('display', 'none');
            $('.ale-sidebar-template-header').css('display', 'block');
            $('.top_line_logo_wrapper').css('width', '100%');
            $('.ale-check-sidemenu-content').removeClass('ale-side-menu-empty');
            $('.ale-check-mobile-menu').addClass('ale-mobile-menu-empty');
        } else {
            $('.elli-side-menu.elli-side-mobile').css('display', 'none');
            $('.elli-side-menu.elli-side-desktop').css('display', 'block');
            $('.ale-nav-wrapper').css('display', 'flex');
            $('.top_line_logo_wrapper').css('width', 'auto');
            $('.ale-sidebar-template-header').css('display', 'none');
            $('.ale-check-sidemenu-content').addClass('ale-side-menu-empty');
            $('.ale-check-mobile-menu').removeClass('ale-mobile-menu-empty');
        }
    })



    /********************************************************************************

    * DROP DOWN MENU

    ********************************************************************************/

    if( ! $.fn.ale_drop_down ){

        $.fn.ale_drop_down = function()
        {

            var $this = $(this);

            $this.each(function(){

                var menu_items_with_sub = $(this).find(".menu-item-has-children"),
                    max_depth = 0;

                menu_items_with_sub.each(function(){
                    max_depth = Math.max( max_depth, $(this).data("depth") );
                });

                if( ! is_rtl ){

                    var right_space = window_width - $(this).offset().left,
                    left_space = $(this).offset().left,
                    menu_total_width = left_space + ( ( max_depth + 1 ) * 240 );

                     if( right_space < left_space && window_width < menu_total_width ){
                        $(this).addClass("o-direction");
                     }

                }else{

                    var right_space = window_width - $(this).offset().left,
                    left_space = $(this).offset().left,
                    menu_total_width = right_space + ( ( max_depth + 1 ) * 240 );

                    if( left_space < right_space && window_width < menu_total_width ){
                        $(this).addClass("o-direction");
                    }
                }

                $(this).addClass("submenu-loaded");                 
            });

        };
    }

    $window.load(function(){
        $(".ale-navigation-list > li:not(.multicolumn).menu-item-has-children").ale_drop_down();
    })


   
    /* *******************************************************************************

    MEGA MENU

    ********************************************************************************** */

    var is_rtl = $("body").hasClass("rtl");
    var window_width = $(window).width();
    var window_height = $(window).height();

    $('.ale-navigation-list .multicolumn > ul > li.menu-item-has-children > a').each(function(){

        if( $(this).attr("href") == "#" || $(this).attr("href") == "" ){
            var $this = $(this);
            $('<span>'+$(this).html()+'</span>').insertAfter($this);
            $this.remove();
        }

    });


    if( ! $.fn.ale_mega_menu ){

        $.fn.ale_mega_menu = function(action)
        {

            if( $(this).length === 0 ){
                return;
            }

            var $this = $(this),
                header = $(".ale-megamenu-container"),
                header = $(".ale-megamenu-container").length > 0 ? header : $(".ale-nav-wrapper").parents(".elementor-row:eq(0)"),
                header_width = header[0].getBoundingClientRect().width - 40,
                new_col = "",
                ew_line;

            $this.each(function(){

                var $this = $(this),
                      menu = $this.find("> ul"),
                      col_size = $this.data("col-size");
                      
                if(header.hasClass('ale-sidear-template-container')) {
                    var menu_width = Math.min( col_size * 310 );
                } else {
                    var menu_width = Math.min( col_size * 310, header_width );
                }

                if( ! menu.hasClass("multicolumn-holder") ){
                    $("<ul class='sub-menu multicolumn-holder' />").appendTo($(this));

                    var  group;
                    var lists_length = Math.ceil( menu.find('> li').length / col_size );

                    while( ( group = menu.find('> li:lt('+ lists_length  +')').remove() ).length){
                        $('<li/>').append($("<ul class='sub-menu'/>").append(group)).appendTo($(this).find("> .multicolumn-holder"));
                    }
                    menu.remove();
                    menu = $this.find("> ul");//menu updated
                }

                $(this).addClass("submenu-loaded");
                
                if( ! is_rtl ){

                    var leftPos  = $this.offset().left,
                         leftMargin = Math.ceil( header_width + header.offset().left ) - ( leftPos + menu_width) + 20;

                    //set width
                    menu.css({
                        "width" : menu_width
                    });

                    if( leftMargin > 0 ){
                        return;
                    }

                    if(header.hasClass('ale-sidear-template-container')) {
                        menu.css({
                            "margin-left" : 0
                        });
                    } else {
                        menu.css({
                            "margin-left" : parseFloat(leftMargin)
                        });
                    }

                }else{
                    var item_width = $this.outerWidth(),
                        leftPos  = $this.offset().left + item_width,
                        leftMargin  = Math.min(0, - 1 * (  header.offset().left - (leftPos - menu_width)) - 20 );

                    //set width
                    menu.css({
                        "width" : menu_width
                    });

                    if( leftMargin == 0 ){
                        return;
                    }

                    menu.css({
                        "margin-right" : leftMargin
                    });
                } 
            });
        };
    }

    var ale_mega_menu = $(".ale-navigation-list > li.multicolumn.menu-item-has-children");

    $window.load(function(){
        ale_mega_menu.ale_mega_menu();
    });

    

    if($('.gallery-post-slider').length){
        $('.gallery-post-slider').owlCarousel({
            items: 1,
            nav: true,
            autoplay: true,
            autoplayTimeout: 4500,
            loop: false,
            autoplaySpeed: 500,
            navSpeed: 500,
            autoHeight: true,
            navText: ["<i class=\"ion-ios-arrow-thin-left\"></i>","<i class=\"ion-ios-arrow-thin-right\"></i>"],
        });
    }



    /********************************************************************************

    * RESTAURANT MENU SLIDER

    ********************************************************************************/

    if($('.ale-menu-slider-container').length){
        if(elementorFrontend.hooks){
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
                    navigation: {
                      nextEl: '.disable-slide',
                      prevEl: '.disable-slide',
                    },
                });
            }        

            
            $('.ale-menu-slider-container').each(function(){
                $(this).ale_menufood_slider();
            });
           
        } else {
            $.fn.ale_menufood_slider = function(){
                var $this = $(this),
                    mySwiper = new Swiper ('.ale-menu-slider-container', {
                    // Optional parameters
                    direction: 'horizontal',
                    loop: false,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },    
                    navigation: {
                      nextEl: '.ion-ios-arrow-thin-left',
                      prevEl: '.ion-ios-arrow-thin-right',
                    },
                });
            }

            $('.ale-menu-slider-container').each(function(){
                $(this).ale_menufood_slider();
            });
        }
    }



    /********************************************************************************

    * TESTIMONIALS SLIDER

    ********************************************************************************/

    $.fn.ale_quote_slider = function(){
        var $this = $(this),
            mySwiper = new Swiper ('.ale-quote-slider', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            effect: 'slide',
            watchSlidesProgress: true,
            mousewheelControl: true,
            keyboardControl: true,
            runCallbacksOnInit: true,
            fadeEffect: {
                crossFade: true
            },   
            speed: 450,
            spaceBetween: 170,
            pagination: {
                el: '.ale-quote-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                  return '<span class="ale-quote-bullet ' + className + '"><i class=" fa fa-circle ale-quote-pag-dots"></i></span>';
                },
            },
          });
    }

    if($('.ale-quote-slider').length){
        $('.ale-quote-slider').each(function(){
            $(this).ale_quote_slider();
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
                pagination: {
                    el: '.ale-header-pagination',
                    type: 'fraction',
                },
                renderCustom: function (swiper, current, total) {
                    return current + ' of ' + total;
                }
            });



            setTimeout(function(){
               headerSlider1.params.autoplay.delay = 5000;
               headerSlider1.params.autoplay.disableOnInteraction = false;
               headerSlider1.autoplay.start();
            }, 2000);
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
            $containerDes = $this.find('.ale-header-slider-descr');

            var slide1 = new Swiper($containerDes, {
                direction: "horizontal",
                loop: false,
                speed: 500,
                grabCursor: true,
                paginationClickable: true,
                parallax: true,
                effect: "fade",
                mousewheelControl: 1,
                runCallbacksOnInit: true,
                simulateTouch: false,
                autoplayDisableOnInteraction: false,
                controller: {
                    control: slide2,
                }       
            });

            var slide2 = new Swiper($container, {
                direction: "horizontal",
                loop: false,
                speed: 500,
                grabCursor: true,
                paginationClickable: true,
                parallax: true,
                effect: "slide",
                mousewheelControl: 1,
                runCallbacksOnInit: true,
                simulateTouch: true,
                slideToClickedSlide: true,
                controller: {
                    control: slide1,
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

            setTimeout(function(){
               slide2.params.autoplay.delay = 5000;
               slide2.params.autoplay.disableOnInteraction = false;
               slide2.autoplay.start();
            }, 2000);
    }

    if($('.ale-header-slider-container-st2').length){
        $('.ale-header-slider-container-st2').each(function(){
            $(this).ale_header_slider_2();
        });
    }



    /********************************************************************************

    * HEADER SLIDER SCROLL BUTTON

    ********************************************************************************/

    $.fn.ale_header_slider_scroll = function(){
        var $this        = $(this),
            getWinHeight = $this.offset();

        $(window).resize(function(){
            getWinHeight = $this.offset();
        })

        $this.on('click', function() {
            $(window).scrollTop(getWinHeight.top + 10);
        })
    }

    if($('.ale-header-mouse-wrapper').length){
        $('.ale-header-mouse-wrapper').each(function(){
            $(this).ale_header_slider_scroll();
        })
    }



    /********************************************************************************

    * SIDEBAR MOBILE MENU

    ********************************************************************************/

    if( ! $.fn.rt_panel_menu ){

        $.fn.rt_panel_menu = function()
        {

            $(this).on("click",function(e){

                var $this = $(this).parent("li");
                
                //if the link is only # then toggle the sub menu
                if( $(this).attr("href") == "#" ){
                    e.preventDefault();
                    $this.find(">ul").slideToggle('fast');
                    $this.toggleClass("current-menu-item");
                    return;
                }

           
                if( !$this.hasClass("menu-item-has-children")){
                    return ;
                }


                e.preventDefault();
                $this.find(">ul").slideToggle('fast');
                $this.toggleClass("current-menu-item");
                
                return false;

            });

        };
    }

    $(window).on('load', function() {
        $('.elli-panel-contents .menu li').each(function(){
                if( $(this).hasClass("current-menu-ancestor") ){
                    $(this).removeClass("current-menu-item current-menu-ancestor"); 
                }
        }).promise().done( function(){ 
            $('.elli-panel-contents .menu li a, .elli-panel-contents .menu li > span').rt_panel_menu();
        });
    });



     /********************************************************************************

    * WOOCOMMERCE ARROWS

    ********************************************************************************/

    $.fn.ale_woocommerce_arrows = function(){
        var getDiv = $(this).find('div.quantity input.input-text.qty');

        getDiv.after('<span class="quantity-up"></span><span class="quantity-down"></span>');
        
    }
    

    $('body.woocommerce-page').ale_woocommerce_arrows();


});


