<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Image_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-elli-image-box';
    }

    public function get_title() {
        return esc_html__( 'Elli Image Box', 'elli' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Image Box', 'elli'),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'elli'),
                    'style2' => esc_html__('Style 2', 'elli'),
                    'style3' => esc_html__('Style 3', 'elli'),
                    'style4' => esc_html__('Style 4', 'elli'),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Front Image', 'elli' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
                'condition' => [
                    'style'   =>  ['style1', 'style3', 'style4'],
                ],
            ]
        );


        $this->add_control(
            'number',
            [
                'label'         => esc_html__( 'Number', 'elli' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'placeholder'   => esc_html__( 'Add number', 'elli' ),
                'default'       => esc_html__( '1.', 'elli' ),
                'condition' => [
                    'style'   =>  ['style2'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'elli' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'placeholder'   => esc_html__( 'Add title', 'elli' ),
                'default'       => esc_html__( 'Add Title', 'elli' ),
            ]
        );

        $this->add_control(
            'image_description',
            [
                'name'          => 'img_description',
                'label'         => esc_html__('Description', 'elli'),
                'label_block'   => true,
                'type'          => Controls_Manager::WYSIWYG,
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
                'default'        => 'left',
                'prefix_class'   => 'ale-head-text elementor%s-align-',
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Primary Button', 'elli' ),
                'label_block'   => true,
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Learn more ', 'elli' ),
                'placeholder' => esc_html__( 'Learn more ', 'elli' ),
                'condition' => [
                    'style'   =>  ['style2'],
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
                'condition' => [
                    'style'   =>  ['style2'],
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_dots',
            [
                'label' => __( 'Left Dots Background', 'elli' ),
                'condition' => [
                    'style'   =>  ['style4'],
                ],
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
                'default' =>[
                    'size' => ['0'],
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
                'default' =>[
                    'size' => ['0'],
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
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dots_right',
            [
                'label' => __( 'Right Dots Background', 'elli' ),
                'condition' => [
                    'style'   =>  ['style4'],
                ],
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
                'default' =>[
                    'size' => ['0'],
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
                'default' =>[
                    'size' => ['0'],
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
            ]
        );

        $this->end_controls_section();




        /**
         *
         *Image Style
         *
        */

        $this->start_controls_section(
            'section_image_tab',
            [
                'label' => esc_html__( 'Image', 'elli' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style'   =>  ['style1'],
                ],
            ]
        );


        $this->add_control(
            'image_margin_bottom',
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
                    '{{WRAPPER}} .icon-wrapper' => 'margin-bottom: {{SIZE}}px;',
                    '{{WRAPPER}} .image-box-icon' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         *
         *Number Style
         *
        */
        $this->start_controls_section(
            'features_style_number',
            [
                'label'     => esc_html__( 'Numbers', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style'   =>  ['style2'],
                ],
            ]
        );

        $this->add_control(
            'feature_number',
            [
                'label' => esc_html__( 'Numbers Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-box-icon span' => 'color: {{COLOR}};',
                ],
            ]
        );

        $this->add_control(
            'feature_bottom_number',
            [
                'label' => esc_html__( 'Numbers Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .image-box-icon span' => 'margin-bottom: {{SIZE}}px;',
                ],
                
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
            'name'       => 'number_typography',
            'selector'   => '{{WRAPPER}} .image-box-icon span',
            ]
        );


        $this->end_controls_section();
        /**
		 *
		 *Title Style
		 *
		*/

        $this->start_controls_section(
			'section_title_tab',
			[
				'label' => esc_html__( 'Title', 'elli' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'elli' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image-box-wrapper h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .description-wrapper h5' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .image-box-wrapper h5, {{WRAPPER}} .description-wrapper h5',
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
                    '{{WRAPPER}} .image-box-wrapper h5' => 'margin-bottom: {{SIZE}}px;',
                    '{{WRAPPER}} .description-wrapper h5' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

		$this->end_controls_section();

        /**
         *
         *Description Style
         *
        */



        $this->start_controls_section(
            'section_description_tab',
            [
                'label' => esc_html__( 'Description', 'elli' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__( 'Description Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-box-wrapper p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .description-wrapper p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'descr_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .image-box-wrapper p, {{WRAPPER}} .description-wrapper p',
            ]
        );

        $this->add_control(
            'descr_margin_bottom',
            [
                'label' => esc_html__( 'Description Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .image-box-wrapper p' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();



    }

    protected function render( ) {
        $settings        = $this->get_settings();
        $ale_image       = $settings['image'];
        $ale_title       = $settings['title'];
        $ale_description = $settings['image_description'];
        $ale_number      = $settings['number'];
        $ale_left_dots   = $settings['show_dots'];
        $ale_right_dots  = $settings['show_dots_right'];
        $btn_text        = $settings['btn_text'];
        $btn_link        = (! empty( $settings['btn_link']['url'])) ? $settings['btn_link']['url'] : '';
        $btn_target      = ( $settings['btn_link']['is_external']) ? '_blank' : '_self';
        $style           = $settings['style'];

        switch ($style) {
            case 'style1':
                require ALETHEME_PATH. '/elementor/shortcodes/style/box-style/style1.php';
                break;

            case 'style2':
                require ALETHEME_PATH. '/elementor/shortcodes/style/box-style/style2.php';
                break;

            case 'style3':
                require ALETHEME_PATH. '/elementor/shortcodes/style/box-style/style3.php';
                break;

            case 'style4':
                require ALETHEME_PATH. '/elementor/shortcodes/style/box-style/style4.php';
                break;
        }


    

    }

    protected function _content_template() { }
}