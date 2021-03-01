<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Menu_Item_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-menu-item';
    }

    public function get_title() {
        return esc_html__( 'Elli Menu Items', 'elli' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Menu Items', 'elli'),
            ]
        );

        $this->add_control(
            'item_sub', [
                'label'          => esc_html__( 'Sub Title', 'elli' ),
                'type'           => Controls_Manager::TEXT,
                'label_block'    => true,
            ]
        );

        $this->add_control(
            'item_title', [
                'label'          => esc_html__( 'Heading Title', 'elli' ),
                'type'           => Controls_Manager::TEXT,
                'label_block'    => true,
            ]
        );

        $this->add_control(
            'item_price', [
                'label'          => esc_html__( 'Item Price', 'elli' ),
                'type'           => Controls_Manager::TEXT,
                'label_block'    => true,
            ]
        );

        $this->add_control(
            'item_descr', [
                'label'          => esc_html__( 'Item Description', 'elli' ),
                'type'           => Controls_Manager::TEXTAREA,
                'label_block'    => true,
            ]
        );        

        $this->end_controls_section();
    
        //Title Style
        $this->start_controls_section(
            'section_title_style',
            [
                'label'     => esc_html__( 'Title', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .menu-list-top-title h5',
            ]
        );

        $this->add_control(
            'title_margin_bottom',
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
                    '{{WRAPPER}} .menu-list-top-title h5' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        //Title Style

        $this->start_controls_section(
            'section_price_style',
            [
                'label'     => esc_html__( 'Price', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .menu-list-top-title span',
            ]
        );

        $this->add_control(
            'price_margin_bottom',
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
                    '{{WRAPPER}} .menu-list-top-title span' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        //Subtitle Style
        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label'     => esc_html__( 'Subtitle', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .menu-list-subtitle > h6',
            ]
        );

        $this->add_control(
            'subtitle_margin_bottom',
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
                    '{{WRAPPER}} .menu-list-subtitle > h6' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();


        //Separate Line
        $this->start_controls_section(
            'separte',
            [
                'label'     => esc_html__( 'Separator', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'separate_color',
            [
                'label' => esc_html__( 'Separator Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-item-separator' => 'background-color: {{COLOR}};',
                ],
            ]
        );

        $this->add_control(
            'separate_bottom',
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
                    '{{WRAPPER}} .menu-item-separator' => 'margin-bottom: {{SIZE}}px;',
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
                'selector' => '{{WRAPPER}} .menu-list-bottom > p',
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
                    '{{WRAPPER}} .menu-list-bottom > p' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render( ) {
        $settings         = $this->get_settings();
        $ale_title        = $settings['item_title'];
        $ale_sub_title    = $settings['item_sub'];
        $ale_price        = $settings['item_price'];
        $ale_description  = $settings['item_descr'];   ?>

            <div class="menu-list-item fade-animation single-menu-list-item">
                <div class="menu-list-top">
                    <?php if( !empty($ale_sub_title) ) : ?>
                        <div class="menu-list-subtitle">
                            <h6><?php echo esc_html( $ale_sub_title ); ?></h6>
                        </div>
                    <?php endif;?>
                    <div class="menu-list-top-title">
                        <?php if( !empty($ale_title) ) : ?>
                            <h5><?php echo esc_html( $ale_title ); ?></h5>
                        <?php endif;?>
                        <?php if( !empty($ale_price) ) : ?>
                            <span><?php echo esc_html( $ale_price ); ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <?php if( !empty($ale_description) ) : ?>
                    <div class="menu-item-separator"></div>
                    <div class="menu-list-bottom">
                        <p><?php echo esc_html( $ale_description, 'elli' ); ?></p>
                    </div>
                <?php endif;?>
            </div>
        <?php 


    }

    protected function _content_template() { }
}
?>