jQuery(function($){

    var $window = $(window);

    $.fn.ale_blog_sort = function(){
        var $this      = $(this),
            getMaxPage = $this.data('maxpage');

        $this.on('change', '.ale-blog-orderby', function(){
            var getTabId     = $this.find('.current-postview-tab').data('tab'),
                getPerPage   = $this.data('perpage'),
                getExcLength = $this.data('exc'),
                getSidebar   = $this.data('sidebar'),
                getPagPage   = $this.data('pagpage'),
                getPagStyle  = $this.data('pagination'),
                getPostWrap  = $this.find('.post-list-wrapper'),
                getThumbWrap = $this.find('.thumba-list-wrapper.fade-image'),
                getImg       = getThumbWrap.find('img'),
                getCurrent   = $this.find('.elli-blog-wrapper').data('page'),
                getPageData  = $this.find('.elli-blog-wrapper'),
                getTabs      = $this.find('.blog-tabs'),
                getCurrTab   = $(this),                
                getPagWrap   = $this.find('.blog-pagination-animate'),
                getSortVal   = $this.find('.ale-blog-orderby').val(),
                getMedia     = $this.data('display-media'),
                getCat       = $this.data('display-cat'),
                getSepp      = $this.data('display-sepp'),
                getAuth      = $this.data('display-auth'),
                getComm      = $this.data('display-comm'),
                getLikes     = $this.data('display-likes'),
                getExcShow   = $this.data('display-exc'),
                getColNumber = $this.data('colsnumber'),
                getWidgetID  = $this.data('widgid'),
                loading      = false;

            if(getPagStyle == 'loadmore'){
                $this.attr('data-curpage', '1');
            }

            function ale_sort_ajax(callback){                
                if(!loading){
                    loading = true;
                    var data = {
                        action: 'ale_ajax_blog_sort',
                        nonce: aleblogsort.nonce,
                        tabid: getTabId,
                        posperpage: getPerPage,
                        curpage: getCurrent,
                        exclength: getExcLength,
                        sidebar: getSidebar,
                        pagpage: getPagPage,
                        pagstyle: getPagStyle,
                        sortopt: getSortVal,
                        colsnumber: getColNumber,
                        widgid: getWidgetID,
                        showmedia: getMedia,
                        showcat: getCat,
                        showsepp: getSepp,
                        showauth: getAuth,
                        showcomm: getComm,
                        showlikes: getLikes,
                        showexc: getExcShow,
                    }
                    $.post(aleblogview.url, data, function(res){
                        //console.log(res);
                        if (res.success) {

                            var $content       = $(res.data),
                                getContentWrap = $this.find('.current-postview-content');

                            getContentWrap.html($content);

                            var getSlider = $this.find('.gallery-post-slider');

                            if(getSlider.length){
                                getSlider.owlCarousel({
                                    items: 1,
                                    nav: true,
                                    autoplay: true,
                                    autoplayTimeout: 3000,
                                    loop: true,
                                    autoplaySpeed: 500,
                                    navSpeed: 500,
                                    navText: ["<i class=\"ion-ios-arrow-thin-left\"></i>","<i class=\"ion-ios-arrow-thin-right\"></i>"],
                                });
                            }

                            var getCurrentPage = $this.attr('data-curpage'),
                                getPaginStyle  = $this.attr('data-pagination'),
                                getWrapperSt   = $this.find('.blog-wrapper-style');

                            if(getCurrentPage < getMaxPage && getPaginStyle =='loadmore' ){
                                getWrapperSt.append('<div class="load-wrapper"><div class="loadmore_blog fade-animation btn-style" id="true_loadmore"><span>' + aleloadmoreblog.button_text + '</span>' + '<div class="overlay"></div>' + '</div></div>');
                            }
                            
                            setTimeout(
                          function() {

                            // Remove any media elements currently initialised.
                            // Should change .sidebar-overlay to match the html on your site.
                            // This should be some sort of container that holds the hidden widgets.
                            // The container is used to ensure widgets in visible sidebars are not affected.
                            $( '.sidebar-overlay .mejs-container' ).each(
                              function( i, el ) {
                                // Remove the reference to the media player from the js object so that it will be reinitialized later.
                                if ( mejs.players[ el.id ] ) {
                                  mejs.players[ el.id ].remove();
                                }
                              }
                            );

                            // Initialize overlay.
                            if ( window.wp && window.wp.mediaelement ) {
                              window.wp.mediaelement.initialize();
                            }

                            // Trigger window resize event to fix video size issues.
                            // Don't use jqueries trigger event since that only triggers
                            // methods hooked to events, and not the events themselves.
                            if ( typeof( Event ) === 'function' ) {
                              window.dispatchEvent( new Event( 'resize' ) );
                            } else {
                              var event = window.document.createEvent( 'UIEvents' );
                              event.initUIEvent( 'resize', true, false, window, 0 );
                              window.dispatchEvent( event );
                            }

                          },
                          250
                        );

                            loading = false;
                            callback();
                        } else {
                             //console.log('2');
                        }
                    }).fail(function (xhr, textStatus, e) {
                         //console.log(xhr.responseText);
                    });
                }
            }

            if(getPostWrap.css('opacity') == '1'){
                getPostWrap.removeClass('loaded-animation').addClass('progress-animation');
                getThumbWrap.addClass('img-up-animation').addClass('progress-animation');
                getPagWrap.removeClass('fade-animation');

                ale_sort_ajax(function(){
                    var getThumbWrap = $this.find('.thumba-list-wrapper.fade-image'),
                        getPostWrap  = $this.find('.post-list-wrapper'),
                        getPagWrap   = $this.find('.blog-pagination-animate');

                    getPostWrap.each(function(){
                        if($(this).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                            $(this).addClass('loaded-animation');
                            $(this).find('.fade-image').addClass('loaded-img-wrapper');
                            $(this).find('.animate-in-fade').addClass('loaded-fade-item');
                        }
                    })

                    if(getPagWrap.length){
                        if(getPagWrap.offset().top < $window.scrollTop() + ($window.height() / 10)*8 ){
                            getPagWrap.addClass('loaded-animation');
                        }
                    }
                })
            }
        });
    }

    

    if($('.elli-blog-list-wrapper').length){
        $('.elli-blog-list-wrapper').each(function(){
            $(this).ale_blog_sort();
        })
    }    

     if($('.elli-blog-list-wrapper-index').length){
        $('.elli-blog-list-wrapper-index').each(function(){
            $(this).ale_blog_sort();
        })
    }    
});