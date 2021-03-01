<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Dot_Bg_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-dot-bg';
    }

    public function get_title() {
        return esc_html__( 'Elli Background', 'elli' );
    }

    public function get_icon() {
        return 'eicon-animation';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'bg_section',
            [
                'label' => __( 'Background Color', 'elli' ),
            ]
        );

        $this->add_control(
            'bg_switch',
            [
                'label' => __( 'Show / Background Color Section', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elli' ),
                'label_off' => esc_html__( 'Hide', 'elli' ),
                'return_value' => 'yes',
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Section Color', 'elli' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-left-background' => 'background: {{VALUE}} ',
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
                'default' => '#f8f7f5',
            ]
        );


        $this->add_responsive_control(
            'bgheight',
            [
                'label' => __( 'Background Height', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw'],
                'selectors' => [
                    '{{WRAPPER}} .ale-bg-section-color' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'bgwidth',
            [
                'label' => __( 'Background Width', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw'],
                'selectors' => [
                    '{{WRAPPER}} .ale-bg-section-color' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_top',
            [
                'label' => __( 'Background Top Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['top'],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-bg-section-color' => 'top: {{TOP}}{{UNIT}};',
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_left',
            [
                'label' => __( 'Background Left Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['left'],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-bg-section-color' => 'left: {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_right',
            [
                'label' => __( 'Background Right Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['right'],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-bg-section-color' => 'right: {{RIGHT}}{{UNIT}};',
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_bottom',
            [
                'label' => __( 'Background Bottom Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['bottom'],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-bg-section-color' => 'bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [
                    'bg_switch' => 'yes'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dots',
            [
                'label' => __( 'Left Dots Background', 'elli' ),
            ]
        );

        $this->add_control(
            'show_dots',
            [
                'label' => __( 'Show / Hide Left Dots Background', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elli' ),
                'label_off' => esc_html__( 'Hide', 'elli' ),
                'return_value' => 'yes',
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'dotswidth',
            [
                'label' => __( 'Left Dots Width', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 2000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-left-background' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_dots' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'dotsheight',
            [
                'label' => __( 'Dots Height', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 2000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-left-background' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_dots' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'dotsposition',
            [
                'label' => __( 'Dots Background Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['top', 'left'],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-left-background' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_dots' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'dots_color',
            [
                'label' => esc_html__( 'Dots Color', 'elli' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-left-background' => 'background: radial-gradient(circle, {{VALUE}} 12.8%, transparent 13%); background-size: 21px 21px; background-position: 0;',
                ],
                'condition' => [
                    'show_dots' => 'yes'
                ],
                'default' => '#d5cfc0',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dots_right',
            [
                'label' => __( 'Right Dots Background', 'elli' ),
            ]
        );

        $this->add_control(
            'show_dots_right',
            [
                'label' => __( 'Show / Hide Right Dots Background', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elli' ),
                'label_off' => esc_html__( 'Hide', 'elli' ),
                'return_value' => 'yes',
                'default' => 'no',
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'dotswidth_right',
            [
                'label' => __( 'Dots Width', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 2000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-right-background' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_dots_right' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'dotsheight_right',
            [
                'label' => __( 'Dots Height', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 2000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-right-background' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_dots_right' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'dotsposition_right',
            [
                'label' => __( 'Dots Background Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['top', 'right'],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-right-background' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_dots_right' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'dots_color_right',
            [
                'label' => esc_html__( 'Dots Color', 'elli' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-right-background' => 'background: radial-gradient(circle, {{VALUE}} 12.8%, transparent 13%); background-size: 21px 21px; background-position: 0;',
                ],
                'condition' => [
                    'show_dots_right' => 'yes'
                ],
                'default' => '#d5cfc0',
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings      = $this->get_settings();
        $ale_left_dot  = $settings['show_dots'];
        $ale_right_dot = $settings['show_dots_right'];
        $ale_bg_sec    = $settings['bg_switch']; ?>

        <div class="ale-dot-container"></div>

        <?php if($ale_bg_sec == 'yes') : ?>
            <div class="ale-bg-section-color"></div>
        <?php endif; ?>
        <?php if($ale_left_dot == 'yes') : ?>
            <div class="ale-dott-left-background"></div>
        <?php endif; ?>
        <?php if($ale_right_dot == 'yes') : ?>
            <div class="ale-dott-right-background"></div>
        <?php endif; 
    }

    protected function _content_template() { ?>

        <div class="ale-dot-container"></div>

        <# if ( settings.bg_switch ) { #>
            <div class="ale-bg-section-color"></div>
        <# } #>
        
        <# if ( settings.show_dots ) { #>
            <div class="ale-dott-left-background"></div>
        <# } #>

        <# if ( settings.show_dots_right ) { #>
            <div class="ale-dott-right-background"></div>
        <# } #>

    <?php 
    }
}