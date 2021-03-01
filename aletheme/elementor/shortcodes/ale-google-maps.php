<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Google_Maps extends Widget_Base {

    public function get_name() {
        return 'ale-google-maps';
    }

    public function get_title() {
        return esc_html__( 'Elli Google Maps', 'elli' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        
        // Content Controls
        $this->start_controls_section(
            'map_content',
            [
                'label' => esc_html_x( 'Google Maps','Admin Panel','elli' )
            ]
        ); 
  
        $this->add_control(
            'map_warning',
            [
                'name'            => 'map_warning',
                'raw'             => sprintf(_x('%1$sPlease note:%2$s Google Maps require an API key that provided by Google. Enter the key to the field inside the %1$sTheme Options > Google Maps%2$s. If you have not created an API key yet, refer the online documentation of the theme to learn how to create one.', 'Admin Panel','elli' ),"<strong>",'</strong>'),
                'type'            => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning'
            ]
        ); 

        $this->add_control(
            'height',
            [
                'label'   => esc_html_x("Height", 'Admin Panel','elli'),
                'type'    =>  Controls_Manager::NUMBER, 
                'default' => 500,
                'min'     => 100,
                'max'     => 2000,      
                'description' => esc_html_x('Map Height', 'Admin Panel','elli' ),
            ]
        ); 

        $this->add_control(
            'zoom',
            [
                'label'   => esc_html_x("Zoom Level", 'Admin Panel','elli'),
                'type'    =>  Controls_Manager::NUMBER, 
                'default' => 16,
                'min'     => 1,
                'max'     => 21,        
                'description' => esc_html_x('Zoom level. Works only with single map location. Enter a zoom level between 1 and 18', 'Admin Panel','elli' ),
            ]
        ); 

        $this->add_control(
            'ellicolor',
            [
                'label' => esc_html_x("Elli Map", 'Admin Panel','elli'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html_x('Make the map only elli colors', 'Admin Panel','elli' ),
                'label_on' => esc_html_x("ON", 'Admin Panel','elli'),
                'label_off' => esc_html_x("OFF", 'Admin Panel','elli'),
                'return_value' => 'true',
            ]
        );      

 

            $this->add_control(
                'locations',
                [
                    'label' => esc_html_x( 'Locations','Admin Panel','elli' ),
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'lat' => '51.5007046',
                            'lon' => '-0.12457480000000487',        
                            'title' => 'Big Ben'
                        ]
                    ],                  
                    'fields' => [
                        [
                            'name'            => 'map_warning',
                            'raw'             => sprintf(_x('Please check this %1$sdocumentation%2$s to learn how to find the latitude and the longitude values of a place.', 'Admin Panel','elli' ),'<a href="https://support.google.com/maps/answer/18539?co=GENIE.Platform%3DDesktop&hl=en" target="_blank">','</a>'),
                            'type'            => Controls_Manager::RAW_HTML,
                            'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning'
                        ],
                        [
                            'name' => 'lat',
                            'label' => esc_html_x( 'Latitude', 'Admin Panel', 'elli' ),
                            'type' => Controls_Manager::TEXT, 
                            'placeholder' => esc_html_x( 'Latitude', 'Admin Panel', 'elli' ),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'lon',
                            'label' => esc_html_x( 'Longitude', 'Admin Panel', 'elli' ),
                            'type' => Controls_Manager::TEXT, 
                            'placeholder' => esc_html_x( 'Longitude', 'Admin Panel', 'elli' ),
                            'label_block' => true,
                        ],
                        [   
                            'name' => 'title',
                            'label' => esc_html_x("Location Title", 'Admin Panel','elli'),
                            'type' => Controls_Manager::TEXT,
                            'return_value' => 'true',           
                        ],                      
                        [
                            'name' => 'content',
                            'placeholder' => esc_html_x( 'Location Description', 'Admin Panel', 'elli' ),
                            'type' => Controls_Manager::TEXTAREA,
                            'show_label' => false,
                        ]

                    ],
                ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
        $settings  = $this->get_settings(); 
        $locations = ""; 


        foreach ( $settings["locations"] as $location ) {
            $locations .= sprintf('[location title="%s" lat="%s" lon="%s"]%s[/location]',$location["title"],$location["lat"],$location["lon"],$location["content"]); 
        } ?>

        <?php $map = sprintf('[google_maps height="%s" zoom="%s" ellicolor="%s"]%s[/google_maps]',$settings["height"],$settings["zoom"],$settings["ellicolor"],$locations); 

        echo do_shortcode( $map, false ) ;
    }

    protected function _content_template() {}
}

