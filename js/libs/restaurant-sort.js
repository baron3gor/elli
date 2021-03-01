jQuery(function($){

    var $window = $(window);

    $.fn.ale_menusort_gl = function(){

        var $this        = $(this),
            getTabs      = $this.find('.elli-tabs-wrapper-menu'),
            getTab       = getTabs.find('.elli-tabs-menu'),
            getTabsNot   = getTabs.find('.elli-tabs-menu:not(.elli-tabs-all)'),
            getDataTabs  = [];

        getTabsNot.each(function(){
            var $this = $(this),
                getTabId = $this.data('tab'),
                getData  = window['alefoodtab_' + getTabId];
                getDataTabs.push(getData);    
        });

        $this.on('click', '.elli-tabs-all', function(){
            var getCurrent   = $(this),
                getWrapper   = $this.find('.elli-menu-wrapper-container'),
                getText      = getWrapper.find('.fade-animation'),
                getImages    = getWrapper.find('.fade-image img'),
                getImgWrap   = getWrapper.find('.gallery-animation-item'),
                loading      = false;

            function ale_menutab_all(callback){

                var i = 0,
                    $getContent = [];

                function ale_next_menu(){

                    var getCurrentData = getDataTabs[i];
                
                    if(!loading){
                        var data = {
                            action: 'ale_ajax_restaurant_sort',
                            nonce: alerestaurantsort.nonce,
                            title: getCurrentData.title,
                            img: getCurrentData.img,
                            descr: getCurrentData.descr,
                            cat: getCurrentData.cat,
                            alt: getCurrentData.alt,
                            tabid: getCurrentData.tabid,
                            align:getCurrentData.align,
                            style: getCurrentData.style,
                            iwidth: getCurrentData.iwidth,
                            gallery: getCurrentData.gallery,
                            menualign: getCurrentData.menualign,
                            cols: getCurrentData.cols,
                            dotscolor:getCurrentData.dotscolor,
                            dotswidth: getCurrentData.dotswidth,
                            dotsheight: getCurrentData.dotsheight,
                            dotstop: getCurrentData.dotstop,
                            dotsleft: getCurrentData.dotsleft,
                            galleryalign: getCurrentData.galleryalign,
                            dotsshow: getCurrentData.dotsshow,
                            dotsunit: getCurrentData.dotsunit
                        };

                        $.post(alerestaurantsort.url, data, function (res) {
                        //console.log(res);

                            if (res.success) {

                                var $content = $(res.data),
                                    getContainer = $this.find('.elli-tabs-content-wrapper');

                                $getContent.push($content);

                                i++;                                    

                                if(i == getDataTabs.length){
                                    getContainer.html($getContent);
                                    if($('.gallery-wrapper-imgs').length){
                                        $('.gallery-wrapper-imgs').ale_masonry_run_menu();
                                    }
                                    getTab.removeClass('current');
                                    getCurrent.addClass('current');
                                    callback(); 
                                    loading = false;                                              

                                } else {
                                    ale_next_menu();
                                }

                            } else {

                            }
                        }).fail(function (xhr, textStatus, e) {
                             console.log(xhr.responseText);
                        });
                    }
                }
                ale_next_menu();
            } 
            
            if(getText.css('opacity') == 1){

                function ale_bg_add(callback){
                    var getWrapper = $this.find('.elli-menu-wrapper-container'),
                        getDotsBg  = getWrapper.find('.ale-dott-bg');

                    getDotsBg.velocity({
                        opacity: 1
                    });

                    callback();
                }

                getWrapper.find('.ale-dott-bg').velocity({
                    opacity: 0
                });

                getText.removeClass('loaded-animation').addClass('progress-animation');
                getImgWrap.addClass('fade-animation').addClass('progress-animation');

                ale_menutab_all(function(){
                    var getWrapper   = $this.find('.elli-menu-wrapper-container'),
                        getText      = getWrapper.find('.fade-animation'),
                        getImages    = getWrapper.find('.fade-image'),
                        getImgWrap   = getWrapper.find('.gallery-animation-item');

                    ale_bg_add(function(){
                        setTimeout(function(){
                            getText.each(function(){
                                if($(this).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                                    $(this).addClass('loaded-animation');
                                }
                            });

                            getImgWrap.each(function(){
                                $(this).find('.fade-image:not(.loaded-img-wrapper):not(.progress-animation)').each(function(){
                                    var el = this;
                                    if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                                        $(el).addClass('loaded-img-wrapper');
                                    }
                                });
                            })
                        }, 550);
                    });
                });
            }
        })



        $this.on('click', '.elli-tabs-menu:not(.elli-tabs-all)', function(){
            var getCurrent   = $(this),
                getTabId     = getCurrent.data('tab'),
                getData      = window['alefoodtab_' + getTabId],
                getWrapper   = $this.find('.elli-menu-wrapper-container'),
                getText      = getWrapper.find('.fade-animation'),
                getImages    = getWrapper.find('.fade-image img'),
                getImgWrap   = getWrapper.find('.gallery-animation-item'),
                getDotsWrap  = getWrapper.find('.ale-dott-bg'),
                loading      = false;    

            function ale_menutab_gl(callback){
                if(!loading){
                    loading = true;
                    var data = {
                        action: 'ale_ajax_restaurant_sort',
                        nonce: alerestaurantsort.nonce,
                        title: getData.title,
                        descr: getData.descr,
                        cat: getData.cat,
                        img: getData.img,
                        alt: getData.alt,
                        tabid: getData.tabid,
                        align: getData.align,
                        style: getData.style,
                        iwidth: getData.iwidth,
                        gallery: getData.gallery,
                        cols: getData.cols,
                        galleryalign: getData.galleryalign,
                        menualign: getData.menualign,
                        dotscolor:getData.dotscolor,
                        dotswidth: getData.dotswidth,
                        dotsheight: getData.dotsheight,
                        dotstop: getData.dotstop,
                        dotsleft: getData.dotsleft,
                        dotsshow: getData.dotsshow,
                        dotsunit: getData.dotsunit
                    };

                    $.post(alerestaurantsort.url, data, function (res) {

                        if (res.success) {
                            var $content     = $(res.data),
                                getContainer = $this.find('.elli-tabs-content-wrapper');

                            getContainer.html($content);

                            if($('.gallery-wrapper-imgs').length){
                                $('.gallery-wrapper-imgs').ale_masonry_run_menu();
                            } 

                            if($('.elli-menu-grid').length) {
                                $('.elli-menu-grid').ale_masonry_menu_cl('reinit');
                            } 

                            loading = false;
                            callback();             

                            getTab.removeClass('current');
                            getCurrent.addClass('current');

                        } else {

                        }
                    }).fail(function (xhr, textStatus, e) {
                         console.log(xhr.responseText);
                    });
                }
            }



            if(getText.css('opacity') == 1){

                function ale_bg_add(callback){
                    var getWrapper = $this.find('.elli-menu-wrapper-container'),
                        getDotsBg  = getWrapper.find('.ale-dott-bg');

                    getDotsBg.velocity({
                        opacity: 1
                    });

                    callback();
                }

                getWrapper.find('.ale-dott-bg').velocity({
                    opacity: 0
                });
                getText.removeClass('loaded-animation').addClass('progress-animation');
                getImgWrap.addClass('fade-animation').addClass('progress-animation');

                ale_menutab_gl(function(){
                    
                    var getWrapper   = $this.find('.elli-menu-wrapper-container'),
                        getText      = getWrapper.find('.fade-animation'),
                        getImages    = getWrapper.find('.fade-image'),
                        getImgWrap   = getWrapper.find('.gallery-animation-item'); 


                            
                    ale_bg_add(function(){
                        getText.each(function(){
                            if($(this).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                                $(this).addClass('loaded-animation');
                            }
                        });

                        getImgWrap.each(function(){
                            $(this).find('.fade-image:not(.loaded-img-wrapper):not(.progress-animation)').each(function(){
                                var el = this;
                                if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
                                    $(el).addClass('loaded-img-wrapper');
                                }
                            });
                        });
                    });
                });
            }
        })
    }

    if($('.elli-tabs-container').length){
        $('.elli-tabs-container').each(function(){
            $(this).ale_menusort_gl();
        })
    }

});