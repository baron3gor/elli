<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Menu_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-menu-slider';
    }

    public function get_title() {
        return esc_html__( 'Elli Menu Slider', 'elli' );
    }

    public function get_icon() {
        return 'eicon-slider-3d';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Menu Slider', 'elli'),
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'label' => __( 'Choose Icon Image', 'elli' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'menu_sliders',
            [
                'label' => __( 'Repeater List', 'elli' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [ 
                    [
                        'name'          => 'image_slider',
                        'label'         => esc_html__('Image', 'elli'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [
                        'name'          => 'title_slider',
                        'label'         => esc_html__('Title', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXTAREA,
                        'placeholder' => __( 'Type your title here', 'elli' ),
                    ],

                    [
                        'name'          => 'description_slider',
                        'label'         => esc_html__('Description', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::WYSIWYG,
                        'placeholder'   => __( 'Type your description here', 'elli' ),
                    ],                    
                ],
            ]
        );


        $this->end_controls_section();


        //Decription Style
        $this->start_controls_section(
            'section_desc_style',
            [
                'label'     => esc_html__( 'Description', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'descr_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} p.img-sign-info-description',
            ]
        );

        $this->add_control(
            'description_margin_bottom',
            [
                'label' => esc_html__( 'Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} p.img-sign-info-description' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'bgoptions2',
            [
                'label' => esc_html__('Background Image Dots', 'elli'),
            ]            
        );

        $this->add_control(
            'dots_head2',
            [
                'label' => __( 'Dots Image Background Options', 'elli' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'bg_dots2',
            [
                'label' => __( 'Show Dots Background', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elli' ),
                'label_off' => esc_html__( 'Hide', 'elli' ),
                'return_value' => 'yes',
                'default' => 'no',        
            ]
        );

        $this->add_control(
            'bg_dots_width2',
            [
                'label' => __( 'Dots Background Max Width', 'elli' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'bg_dots2' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg-right' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'bg_dots_height2',
            [
                'label' => __( 'Dots Background Max Height', 'elli' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'bg_dots2' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg-right' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'bg_dots_color2',
            [
                'label' => __( 'Dots Color', 'elli' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg-right' => 'background: radial-gradient({{VALUE}},12.8%,transparent 13%); background-size: 21px 21px;',
                ],
                'condition' => [
                    'bg_dots2'   =>  ['yes'],
                ],
            ]
        );

        $this->add_control(
            'bg_dots_position2',
            [
                'label' => __( 'Dots Background Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['right', 'top'],
                'default' => [
                    'unit' => 'px',
                ],
                'condition' => [
                    'bg_dots2'   =>  ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg-right' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();        
    }

    protected function render( ) {
        $settings     = $this->get_settings();
        $ale_sliders  = $this->get_settings_for_display( 'menu_sliders' );
        $ale_bg_dots2 = $settings['bg_dots2'];
        $ale_img_icon = $settings['image_icon'];
        $ale_icon_alt = get_post_meta($ale_img_icon['id'], '_wp_attachment_image_alt', true);?>

        <div class="ale-menu-slider-wrp">
            <?php if($ale_bg_dots2 == 'yes') : ?>
                <div class="ale-dott-bg-right"></div>
            <?php endif; ?>
            <?php if(!empty($ale_img_icon)) : ?>
                    <div class="ale-menu-slider-icon fade-animation">
                        <img src="<?php echo esc_url($ale_img_icon['url'], 'elli'); ?>" alt="<?php echo esc_attr($ale_icon_alt, 'elli'); ?>">
                    </div>
                <?php endif; ?>
        
            <div class="ale-menu-slider-container swiper-container">      
            <?php if(!empty($ale_sliders)) : ?>
                <div class="ale-foodmenu-sliders swiper-wrapper">
                    <?php foreach( $ale_sliders as $index => $item) :
                        $ale_item_name = !empty($item['title_slider']) ? $item['title_slider'] : '';
                        $ale_item_desc = !empty($item['description_slider']) ? $item['description_slider'] : '';
                        $ale_image     = !empty($item['image_slider']) ? $item['image_slider'] : '';
                        $ale_alt_img   = get_post_meta($ale_image['id'], '_wp_attachment_image_alt', true); ?>         
                        <div class="ale-menu-slider-wrapper swiper-slide">
                            <?php if(!empty($ale_item_name) || !empty($ale_item_desc)) : ?>
                                <div class="ale-menu-slider-desc-wrapper fade-animation">
                                    <div class="ale-animate-fade-slider">
                                        <?php if(!empty($ale_item_name)) : ?>
                                            <div class="ale-slider-title-wrapper">
                                                <h4 class="ale-slider-title"><?php echo esc_html($ale_item_name, 'elli'); ?></h4>
                                                <span class="separate_dots">
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($ale_item_desc)) : ?>
                                            <div class="ale-slider-desc-wrapper">
                                                <?php echo ale_wp_kses($ale_item_desc, 'elli'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="ale-menu-btn-wrapper">
                                            <div class="ion-ios-arrow-thin-left"></div>
                                            <div class="ion-ios-arrow-thin-right"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($ale_image)) : ?>
                                <div class="ale-slider-img-wrapper">
                                    <div class="animate-img-slider-food">                                    
                                        <img src="<?php echo esc_url($ale_image['url'], 'elli'); ?>" alt="<?php echo esc_attr($ale_alt_img, 'elli'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            </div>
        </div>
        <?php


    }

    protected function _content_template() { }
}