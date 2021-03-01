jQuery(function($){

    var $window = $(window);


    $.fn.ale_loadmore_blog = function(){
        var $this          = $(this),
            getBlogWrap    = $this.find('.elli-blog-wrapper'),
            getMaxPage     = $this.data('maxpage'),
            getCurrentPage = $this.data('curpage'),
            getPagStyle    = $this.attr('data-pagination'),
            getBlogParrent = $this.find('.blog-wrapper-style'),
            loading        = false;

        if(getMaxPage > 1 && getPagStyle == 'loadmore'){
            getBlogParrent.append('<div class="load-wrapper"><div class="loadmore_blog fade-animation btn-style" id="true_loadmore"><span>' + aleloadmoreblog.button_text + '</span>' + '<div class="overlay"></div>' + '</div></div>');
        }

        if(elementorFrontend.hooks){
            $this.on('click', '.loadmore_blog', function(){
                return false;
            });
        } else {  
            $this.on('click', '.load-wrapper .loadmore_blog', function(){

                $(this).parent().css({
                    opacity: '0',
                    transition: 'opacity 20ms ease-in-out'
                });


                var getNewPage  = $this.attr('data-curpage'),
                    getPage     = parseInt(getNewPage) + 1,
                    getTabId    = $this.find('.current-postview-tab').data('tab'),
                    getPostWrap = $this.find('.post-list-wrapper'),
                    getImgWrap  = $this.find('.thumba-list-wrapper.fade-image'),
                    getImg      = $this.find('.thumba-list-wrapper.fade-image img'),
                    getPostPP   = $this.data('perpage'),
                    getExc      = $this.data('exc'),
                    getSidebar  = $this.data('sidebar'),
                    getTabs     = $this.find('.blog-tabs'),
                    getSortVal  = $this.find('.ale-blog-orderby').val(),
                    getMedia    = $this.data('display-media'),
                    getCat      = $this.data('display-cat'),
                    getSepp     = $this.data('display-sepp'),
                    getAuth     = $this.data('display-auth'),
                    getComm     = $this.data('display-comm'),
                    getLikes    = $this.data('display-likes'),
                    getExcShow  = $this.data('display-exc'),
                    getCols     = $this.data('colsnumber');

                if(!loading){
                    loading = true;
                    var data = {
                            action: 'ale_ajax_load_more_blog',
                            nonce: aleloadmoreblog.nonce,
                            tabid: getTabId,
                            posperpage: getPostPP,
                            exclength: getExc,
                            maxpage: getMaxPage,
                            page: getPage,
                            sidebar: getSidebar,
                            sortopt: getSortVal,
                            colsnumber: getCols,
                            showmedia: getMedia,
                            showcat: getCat,
                            showsepp: getSepp,
                            showauth: getAuth,
                            showcomm: getComm,
                            showlikes: getLikes,
                            showexc: getExcShow,
                        };
                    $.post(aleloadmoreblog.url, data, function (res) {
                        //console.log(res);
                        if (res.success) {
                            var $content = $(res.data),
                                getBtn      = $this.find('.elli-blog-wrapper .load-wrapper'),
                                getMaxPage  = $this.data('maxpage'),
                                getLoadWrap = $this.find('.load-wrapper');
                                

                            getBtn.fadeTo(1, 1);                        
                            getLoadWrap.before($content);

                            var getSliders  = $this.find('.gallery-post-slider'),
                                getPostWrap = $this.find('.post-list-wrapper');

                            if(getSliders.length){
                                getSliders.owlCarousel({
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

                            getLoadWrap.find('#true_loadmore').removeClass('loaded-animation');

                            setTimeout(function(){
                                getPostWrap.each(function(){
                                    if($(this).offset().top < $window.scrollTop() + ($window.height() / 10)*8  ) {
                                        $(this).addClass('loaded-animation');
                                        $(this).find('.fade-image').addClass('loaded-img-wrapper');
                                        $(this).find('.blog-icon-grid-style').addClass('loaded-item');
                                        $(this).find('.animate-in-fade').addClass('loaded-fade-item');
                                    }
                                });
                            }, 200);

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
                            
                            //Hide the Load More button if no more posts to load
                            if (getPage == getMaxPage) {
                                getBtn.hide();
                            }

                            var getCurrentNew = getPage;

                            $this.attr("data-curpage", getCurrentNew);

                            getPage = getPage + 1;
                            
                            loading = false;
                            return;
                        } else {
                             //console.log('2');
                        }
                    }).fail(function (xhr, textStatus, e) {
                         console.log(xhr.responseText);
                    });
                }
            });
        }
    }

    if($('.elli-blog-list-wrapper').length){
        $('.elli-blog-list-wrapper').each(function(){
            $(this).ale_loadmore_blog();
        })
    }   
});