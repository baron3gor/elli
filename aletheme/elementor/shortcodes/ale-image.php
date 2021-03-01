<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor image widget.
 *
 * Elementor widget that displays an image into the page.
 *
 * @since 1.0.0
 */
class ale_Widget_Image extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ale-image';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Elli Image', 'elli' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the image widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'elli-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'image', 'photo', 'visual' ];
	}

	/**
	 * Register image widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'elli' ),
			]
		);

		$this->add_control(
			'image_style',
			[
				'label' => __( 'Image Style', 'elli' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => __( 'Style 1', 'elli' ),
					'style2' => __( 'Fade Animation Style', 'elli' ),
				],
			]
		);


		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elli' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
		);

		$this->add_control(
			'app_direction',
			[
				'label' => __( 'Animation Direction', 'elli' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'label_block' => true,
				'options' => [
					'top'  => __( 'Appear from Top', 'elli' ),
					'right' => __( 'Appear from Right', 'elli' ),
					'left' => __( 'Appear from Left', 'elli' ),
					'bottom' => __( 'Appear from Bottom', 'elli' ),
					'topleft' => __( 'Appear from Top-Left', 'elli' ),
					'topright' => __( 'Appear from Top-Right', 'elli' ),
					'bottomleft' => __( 'Appear from Bottom-Left', 'elli' ),
					'bottomright' => __( 'Appear from Bottom-Right', 'elli' ),
				],
				'condition' => [
					'image_style' => 'style2',
				]
			]
		);

		$this->add_responsive_control(
			'imgposition',
			[
				'label' => __( 'Image Position', 'elli' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'allowed_dimensions' => ['top', 'left', 'right', 'bottom'],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .elli-pic-widget-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'condition' => [
					'image_style' => 'style2',
				]
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elli' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elli' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elli' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elli' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'image_style' => 'style1',
				],
			]
		);

		$this->add_control(
			'caption_source',
			[
				'label' => __( 'Caption', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => __( 'None', 'elli' ),
					'attachment' => __( 'Attachment Caption', 'elli' ),
					'custom' => __( 'Custom Caption', 'elli' ),
				],
				'default' => 'none',
			]
		);

		$this->add_control(
			'caption',
			[
				'label' => __( 'Custom Caption', 'elli' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your image caption', 'elli' ),
				'condition' => [
					'caption_source' => 'custom',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'link_to',
			[
				'label' => __( 'Link to', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => __( 'None', 'elli' ),
					'file' => __( 'Media File', 'elli' ),
					'custom' => __( 'Custom URL', 'elli' ),
				],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link to', 'elli' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'elli' ),
				'condition' => [
					'link_to' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'open_lightbox',
			[
				'label' => __( 'Lightbox', 'elli' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __( 'Default', 'elli' ),
					'yes' => __( 'Yes', 'elli' ),
					'no' => __( 'No', 'elli' ),
				],
				'condition' => [
					'link_to' => 'file',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elli' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
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
                    '{{WRAPPER}} .ale-bg-section-color' => 'background: {{VALUE}} ',
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
			'section_style_image',
			[
				'label' => __( 'Image', 'elli' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => __( 'Width', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => __( 'Max Width', 'elli' ) . ' (%)',
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'elli' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => __( 'Opacity', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .elementor-image img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'elli' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => __( 'Opacity', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}} .elementor-image:hover img',
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => __( 'Transition Duration', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-image img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'elli' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .elementor-image img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elli' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .elli-img-widget-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .elementor-image img',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_caption',
			[
				'label' => __( 'Caption', 'elli' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'caption!' => '',
				],
			]
		);

		$this->add_control(
			'caption_align',
			[
				'label' => __( 'Alignment', 'elli' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elli' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elli' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elli' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elli' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'elli' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'caption_typography',
				'selector' => '{{WRAPPER}} .widget-image-caption',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_responsive_control(
			'caption_space',
			[
				'label' => __( 'Spacing', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .widget-image-caption' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Check if the current widget has caption
	 *
	 * @access private
	 * @since 2.3.0
	 *
	 * @param array $settings
	 *
	 * @return boolean
	 */
	private function has_caption( $settings ) {
		return ( ! empty( $settings['caption_source'] ) && 'none' !== $settings['caption_source'] );
	}

	/**
	 * Get the caption for current widget.
	 *
	 * @access private
	 * @since 2.3.0
	 * @param $settings
	 *
	 * @return string
	 */
	private function get_caption( $settings ) {
		$caption = '';
		if ( ! empty( $settings['caption_source'] ) ) {
			switch ( $settings['caption_source'] ) {
				case 'attachment':
					$caption = wp_get_attachment_caption( $settings['image']['id'] );
					break;
				case 'custom':
					$caption = ! empty( $settings['caption'] ) ? $settings['caption'] : '';
			}
		}
		return $caption;
	}

	/**
	 * Render image widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings 		= $this->get_settings_for_display();
		$ale_img_style  = $settings['image_style'];
		$ale_app_direct = ale_app_transform_img($settings['app_direction']);

		if ( empty( $settings['image']['url'] ) ) {
			return;
		}

		$has_caption = $this->has_caption( $settings );

		$this->add_render_attribute( 'wrapper', 'class', 'elementor-image' );

		if ( ! empty( $settings['shape'] ) ) {
			$this->add_render_attribute( 'wrapper', 'class', 'elementor-image-shape-' . $settings['shape'] );
		}

		$link = $this->get_link_url( $settings );

		if ( $link ) {
			$this->add_render_attribute( 'link', [
				'href' => $link['url'],
				'data-elementor-open-lightbox' => $settings['open_lightbox'],
			] );

			if ( Plugin::$instance->editor->is_edit_mode() ) {
				$this->add_render_attribute( 'link', [
					'class' => 'elementor-clickable',
				] );
			}

			if ( ! empty( $link['is_external'] ) ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( ! empty( $link['nofollow'] ) ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}
		} ?>
		<div <?php echo ale_return_esc($this->get_render_attribute_string( 'wrapper' )); ?>>
			<?php if ( $has_caption ) : ?>
				<figure class="wp-caption">
			<?php endif; ?>
			<?php if ( $link ) : ?>
					<a <?php echo esc_url($this->get_render_attribute_string( 'link' ), 'elli'); ?>>
			<?php endif; ?>
			<?php if($ale_img_style == 'style1') : ?>
				<div class="elli-img-widget-wrapper fade-image">
					<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
				</div>
			<?php elseif($ale_img_style == 'style2') : ?>
				<div class="elli-pic-widget-wrapper ale-img-animation" <?php echo ale_wp_kses($ale_app_direct, 'elli'); ?>>
					<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
				</div>
			<?php endif; ?>
			<?php if($settings['bg_switch'] == 'yes') : ?>
				<div class="ale-bg-section-color"></div>
			<?php endif; ?>
			<?php if($settings['show_dots'] == 'yes') : ?>
				<div class="ale-dott-left-background"></div>
			<?php endif; ?>
			<?php if($settings['show_dots_right'] == 'yes') : ?>
				<div class="ale-dott-right-background"></div>
			<?php endif; ?>
			<?php if ( $link ) : ?>
					</a>
			<?php endif; ?>
			<?php if ( $has_caption ) : ?>
					<figcaption class="widget-image-caption wp-caption-text"><?php echo esc_html($this->get_caption( $settings ), 'elli'); ?></figcaption>
			<?php endif; ?>
			<?php if ( $has_caption ) : ?>
				</figure>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Render image widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<# if ( settings.image.url ) {
			var image = {
				id: settings.image.id,
				url: settings.image.url,
				size: settings.image_size,
				dimension: settings.image_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );

			if ( ! image_url ) {
				return;
			}

			var hasCaption = function() {
				if( ! settings.caption_source || 'none' === settings.caption_source ) {
					return false;
				}
				return true;
			}

			var ensureAttachmentData = function( id ) {
				if ( 'undefined' === typeof wp.media.attachment( id ).get( 'caption' ) ) {
					wp.media.attachment( id ).fetch().then( function( data ) {
						view.render();
					} );
				}
			}

			var getAttachmentCaption = function( id ) {
				if ( ! id ) {
					return '';
				}
				ensureAttachmentData( id );
				return wp.media.attachment( id ).get( 'caption' );
			}

			var getCaption = function() {
				if ( ! hasCaption() ) {
					return '';
				}
				return 'custom' === settings.caption_source ? settings.caption : getAttachmentCaption( settings.image.id );
			}

			var link_url;

			if ( 'custom' === settings.link_to ) {
				link_url = settings.link.url;
			}

			if ( 'file' === settings.link_to ) {
				link_url = settings.image.url;
			}

			#><div class="elementor-image{{ settings.shape ? ' elementor-image-shape-' + settings.shape : '' }}"><#
			var imgClass = '';

			if ( '' !== settings.hover_animation ) {
				imgClass = 'elementor-animation-' + settings.hover_animation;
			}

			if ( hasCaption() ) {
				#><figure class="wp-caption"><#
			}

			if ( link_url ) {
					#><a class="elementor-clickable" data-elementor-open-lightbox="{{ settings.open_lightbox }}" href="{{ link_url }}"><#
			}
						#><img src="{{ image_url }}" class="{{ imgClass }} ale-img-elementor-wrap" /><#

			if ( link_url ) {
					#></a><#
			}

			if ( settings.bg_switch ) { #>
           		 <div class="ale-bg-section-color"></div>
       		<# }

       		if ( settings.show_dots ) { #>
	            <div class="ale-dott-left-background"></div>
	        <# }

	        if ( settings.show_dots_right ) { #>
	            <div class="ale-dott-right-background"></div>
	        <# }

			if ( hasCaption() ) {
					#><figcaption class="widget-image-caption wp-caption-text">{{{ getCaption() }}}</figcaption><#
			}

			if ( hasCaption() ) {
				#></figure><#
			}

			#></div><#
		} #>
		<?php
	}

	/**
	 * Retrieve image widget link URL.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param array $settings
	 *
	 * @return array|string|false An array/string containing the link URL, or false if no link.
	 */
	private function get_link_url( $settings ) {
		if ( 'none' === $settings['link_to'] ) {
			return false;
		}

		if ( 'custom' === $settings['link_to'] ) {
			if ( empty( $settings['link']['url'] ) ) {
				return false;
			}
			return $settings['link'];
		}

		return [
			'url' => $settings['image']['url'],
		];
	}
}
