jQuery(function($){

    var $window = $(window);

    $.fn.ale_load_more_woo = function() {

        var $this         = $(this),
            getContainer  = $this.find('.ale-woocom-masonry'),
            getCurrent    = 1,
            getMaxPage    = getContainer.data('maxpage'),
            getCount      = getContainer.data('count'),
            loading       = false;

        if(getMaxPage > 1) {
            getContainer.after('<div class="loadmore-container"><div class="load-wrapper"><div class="loadmore_woo fade-animation" id="true_loadmore"><span>' + aleloadmorewoo.button_text + '</span>' + '<div class="overlay"></div>' + '</div></div></div>');
        }

        if(elementorFrontend.hooks){
            $this.on('click', '.loadmore_woo', function(){
                return false;
            });
        } else {        
            $this.on('click', '.loadmore_woo', function(){

                var getBtn = $this.find('.loadmore_woo'),
                    getBtnParent = getBtn.parent();

                getBtnParent.css('opacity', '0');

                if(!loading){
                    loading = true;

                    var data = {
                        action: 'ale_ajax_load_more_woo',
                        nonce: aleloadmorewoo.nonce,
                        wooarray: alewoomasonry,
                        count: getCount,
                        current: getCurrent
                    };
                };

                $.post(aleloadmorewoo.url, data, function (res) {
                    
                    if (res.success) {  

                        var $content = $(res.data),
                            getMasonry = getContainer.find('.ale-woocom-masonry-wrapper'),
                            $grid = getMasonry.masonry({
                                // options
                                itemSelector: '.ale-shop-grid',
                                percentPosition: true,
                                resize: true,
                                fitWidth: true,
                                columnWidth: '.ale-grid-shop-sizer',
                            });


                        $grid.append( $content ).imagesLoaded(function(){

                            $grid.masonry( 'appended', $content , true);

                            var getMaxPage = getContainer.data('maxpage'),
                                getBtn = $this.find('.loadmore_woo'),
                                getBtnContainer = getBtn.parent().parent();

                            getCurrent = getCurrent + 1;
                            getContainer.attr('data-current', getCurrent);

                            //Hide the Load More button if no more posts to load
                            if (getCurrent == getMaxPage) {
                                getBtn.hide();
                            } else {
                                getBtnContainer.html('<div class="load-wrapper"><div class="loadmore_woo fade-animation" id="true_loadmore"><span>' + aleloadmorewoo.button_text + '</span>' + '<div class="overlay"></div>' + '</div></div>');

                                if(getBtnContainer.find('.loadmore_woo.fade-animation').offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                                    getBtnContainer.find('.loadmore_woo.fade-animation').addClass('loaded-animation');
                                }
                            }
                        });                     
                        
                        var getImg = getContainer.find('.ale-init-animation'); 
                        setTimeout(function(){
                            getImg.each(function(){
                                if($(this).offset().top < $window.scrollTop() + ($window.height() / 10)*8  ) {
                                    $(this).addClass('loaded-animation');
                                    $(this).find('.fade-image').addClass('loaded-img-wrapper');
                                }
                            });
                        }, 200)                   
                        
                        loading = false;
                        return false;
                    } else {
                        // console.log(res);
                    }
                }).fail(function (xhr, textStatus, e) {
                    // console.log(xhr.responseText);
                });
            }) 
        }      
    }

    if($('.ale-woocom-masonry-container').length) {
        $('.ale-woocom-masonry-container').each(function(){
            $(this).ale_load_more_woo();
        });
    }
    
});