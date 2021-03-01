( function ( $ ) {
    
    "use strict";
    
    /* ******************************************************************************

    ALE GOOGLE MAPS

    ********************************************************************************* */
    $.ale_maps = function(el, locations, zoom){

        var base = this;
        base.init = function(){

            if(locations.length>0) google.maps.event.addDomListener(window, 'load', $.fn.ale_maps());
        };

        if(locations.length>0) base.init();
    };

    $.fn.ale_maps = function(locations, zoom){
        

        var map_id = $(this).attr("id");

        var height = $('[data-scope="#'+map_id+'"]').attr("data-height");

        if ( height > 0 ){
            $(this).css({'height':height+"px"});
        }

       if (typeof google === 'object' && typeof google.maps === 'object') {

        var myOptions = {
            zoom: zoom,
            panControl: true,
            zoomControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            scrollwheel : false,
            navigationControl: false,
            mapTypeControl: false,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map( document.getElementById(map_id), myOptions);

        //Elli Map
        var ellimap = $('[data-scope="#'+map_id+'"]').attr("data-elli");

        if ( typeof ellimap !== "undefined" && ellimap != "" ){
            // Create an array of styles.
            var styles = [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#4e413b"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f8f7f5"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#efede7"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#4e413b"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "weight": "1.69"
                        },
                        {
                            "hue": "#ff5500"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#4e413b"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#ff5500"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e2ded3"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#ff5100"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e2ded3"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ff6d24"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "hue": "#ff5500"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e2ded3"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#4e413b"
                        }
                    ]
                }
            ];
            var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
        }

        $.fn.setMarkers(map, locations);

        $.fn.fixTabs(map,map_id,zoom);
        $.fn.fixAccordions(map,map_id,zoom);
    }
    };

    $.fn.setMarkers = function (map, locations) {


        if(locations.length>1){
            var bounds = new google.maps.LatLngBounds();
        }else{
            var center = new google.maps.LatLng(locations[0][1], locations[0][2]);
            map.panTo(center);
        }

        var mrk_str = $('.google_map_holder').data('markerstr');
        var mrk_clr = $('.google_map_holder').data('marker');

        function pinSymbol(color) {
            return {
                path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
                fillColor: color,
                fillOpacity: 1,
                strokeColor: mrk_str,
                strokeWeight: 1.1,
                scale: 1.3
           };
        }
        
        for (var i = 0; i < locations.length; i++) {
            if (locations[i] instanceof Array) {
                var location = locations[i];
                var myLatLng = new google.maps.LatLng(location[1], location[2]);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    icon: pinSymbol(mrk_clr),
                    map: map,
                    draggable: false,
                    title: location[0]
                });

                $.fn.add_new_event(map,marker,location[4]);
                if(locations.length>1) bounds.extend(myLatLng);
            }
        }

        if(locations.length>1)  map.fitBounds(bounds);
    };

    $.fn.add_new_event = function (map,marker,content) {

      if(content){
            var infowindow = new google.maps.InfoWindow({
                content: content,
                maxWidth: 300
            });
            google.maps.event.addListener(marker, 'click', function() {;
            infowindow.open(map,marker);
        });
      }
    };

    $.fn.fixTabs = function (map,map_id,zoom) {
        var tabs = $("#"+map_id).parents(".ale_tabs:eq(0)"),
            desktop_nav_element = tabs.find("> .tab_nav > li"),
            mobile_nav_element = tabs.find("> .tab_contents > .tab_content_wrapper > .tab_title");

        desktop_nav_element.on("click",  { map: map } , function() {
            var c = map.getCenter();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(zoom);
            map.setCenter(c);
        });

        mobile_nav_element.on("click",  { map: map } , function() {
            var c = map.getCenter();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(zoom);
            map.setCenter(c);
        });
    };

    $.fn.fixAccordions = function (map,map_id,zoom) {
        var panes = $("#"+map_id).parents(".ale-toggle:eq(0) > ol > li");

        panes.on("click",  { map: map } , function() {
            var c = map.getCenter();
            google.maps.event.trigger(map, 'resize');
            map.setZoom(zoom);
            map.setCenter(c);
        });
    }


}( jQuery, window.elementorFrontend ) );