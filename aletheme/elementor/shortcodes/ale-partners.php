<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Partner_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-partner';
    }

    public function get_title() {
        return esc_html__( 'Elli Partner', 'elli' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Partner', 'elli'),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'default' => 'single',
                'options' => [
                    'single' => esc_html__('Single Partner', 'elli'),
                    'row' => esc_html__('Multi Partners', 'elli'),
                    'multi' => esc_html__('Multi Partners 2', 'elli'),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Front Image', 'elli' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition'  => [
                    'style' => ['single'],
                ],
            ]            
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__( 'Link', 'elli' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('http://your-link.com','elli' ),
                'default' => [
                    'url' => '#',
                ],
                'condition'  => [
                    'style' => ['single'],
                ],
            ]
        );

        $this->add_control(
            'margin_items',
            [
                'label' => __( 'Margin Items', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner-wrapper-item' => 'margin: 60px {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => ['row'],
                ],
            ]
        );


        $this->add_responsive_control(
            'title_align', [
                'label'          => esc_html__( 'Alignment', 'elli' ),
                'type'           => Controls_Manager::CHOOSE,
                'options'        => [

                    'left'       => [
                        'title'  => esc_html__( 'Left', 'elli' ),
                        'icon'   => 'fa fa-align-left',
                    ],
                    'center'     => [
                        'title'  => esc_html__( 'Center', 'elli' ),
                        'icon'   => 'fa fa-align-center',
                    ],
                    'right'      => [
                        'title'  => esc_html__( 'Right', 'elli' ),
                        'icon'   => 'fa fa-align-right',
                    ],
                    'justify'    => [
                        'title'  => esc_html__( 'Justified', 'elli' ),
                        'icon'   => 'fa fa-align-justify',
                    ],
                ],
                'default'        => 'center',
                'prefix_class'   => 'ale-head-text elementor%s-align-',
                'condition'  => [
                    'style' => ['single'],
                ],
            ]
        );

        $this->add_control(
            'partner_multi',
            [
                'label' => __( 'Repeater List', 'elli' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition'  => [
                    'style' => ['multi', 'row']
                ],
                'fields' => [ 
                    [
                        'name'          => 'part_img',
                        'label'         => esc_html__('Image', 'elli'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [
                        'name'          => 'url_link',
                        'label'         => esc_html__('Link', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::URL,
                        'placeholder' => esc_html__('http://your-link.com','elli' ),
                        'default' => [
                            'url' => '#',
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
        $settings      = $this->get_settings();
        $ale_style     = $settings['style'];
        $ale_partner   = $settings['image'];
        $ale_link      = $settings['btn_link'];
        $ale_target    = ($settings['btn_link']['is_external']) ? '_blank' : '_self';
        $ale_alt       = get_post_meta($ale_partner['id'], '_wp_attachment_image_alt', true);
        $ale_part      = $settings['partner_multi'];
        $style         = $settings['style'];

        switch ($style) {
            case 'single':
                require ALETHEME_PATH. '/elementor/shortcodes/style/partners-style/style1.php';
                break;

            case 'multi':
                require ALETHEME_PATH. '/elementor/shortcodes/style/partners-style/style2.php';
                break;

            case 'row':
                require ALETHEME_PATH. '/elementor/shortcodes/style/partners-style/style3.php';
                break;
        }
    }

    protected function _content_template() {

     }
}