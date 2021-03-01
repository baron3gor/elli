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
class Ale_Header_Slider_Widget extends Widget_Base {

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
		return 'ale-header-slider';
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
		return __( 'Elli Header Slider', 'elli' );
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
		return ' eicon-slider-push';
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
			'header_slider',
			[
				'label' => __( 'Header Slider', 'elli' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => __( 'Slider Style 1', 'elli' ),
					'style2'  => __( 'Slider Style 2', 'elli' ),
				],
			]
		);

		$this->add_responsive_control(
			'imgheight',
			[
				'label' => __( 'Slider Height', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 40,
						'max' => 2000,
					],
				],
				'default' =>[
					'size' => ['100'],
				],
				'selectors' => [
					'{{WRAPPER}} .ale-header-slider-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$repeater3 = new \Elementor\Repeater();	

		$repeater3->add_control(
			'image2',
			[
				'label' => __( 'Choose Image', 'elli' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
			]
		);

		$this->add_control(
			'headerslider1',
			[
				'label' => __( 'Repeater List', 'elli' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'condition' => [
                    'header_slider' =>  ['style1'],
                ],
			]
		);



		$repeater2 = new \Elementor\Repeater();	

		$repeater2->add_control(
			'image2',
			[
				'label' => __( 'Choose Image', 'elli' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
			]
		);

		$repeater2->add_control(
			'list_subtitle',
			[
				'label' => __( 'Sub Title', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Type your sub title here', 'elli' ),
			]
		);

		$repeater2->add_control(
			'list_title',
			[
				'label' => __( 'Title', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Type your title here', 'elli' ),
			]
		);

		$repeater2->add_control(
			'list_descr',
			[
				'label' => __( 'Description', 'elli' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'placeholder' => __( 'Type your title here', 'elli' ),
			]
		);

		$repeater2->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Primary Button', 'elli' ),
				'label_block'   => true,
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn more ', 'elli' ),
				'placeholder' => esc_html__( 'Learn more ', 'elli' ),
			]
		);

		$repeater2->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Link', 'elli' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__('http://your-link.com','elli' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'headerslider2',
			[
				'label' => __( 'Repeater List', 'elli' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'condition' => [
                    'header_slider' =>  ['style2'],
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
				'default' => '#d5cfc0',
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
					'show_dots_right' => 'yes',
					'header_slider' => 'style1',
				],
			]
		);

		$this->add_responsive_control(
			'dotsposition_right2',
			[
				'label' => __( 'Dots Background Position', 'elli' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'allowed_dimensions' => ['bottom', 'right'],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .ale-dott-right-background' => 'bottom: {{BOTTOM}}{{UNIT}}; right: {{RIGHT}}{{UNIT}};',
				],
				'condition' => [
					'show_dots_right' => 'yes',
					'header_slider' => 'style2',
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
				'default' => '#d5cfc0',
				'selectors' => [
					'{{WRAPPER}} .ale-dott-right-background' => 'background: radial-gradient(circle, {{VALUE}} 12.8%, transparent 13%); background-size: 21px 21px; background-position: 0;',
				],
				'condition' => [
					'show_dots_right' => 'yes'
				],
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

		$this->add_responsive_control(
			'bgwidth',
			[
				'label' => __( 'Background Width', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
					],
				],
				'default' =>[
					'size' => ['100'],
				],
				'selectors' => [
					'{{WRAPPER}} .ale-bg-section-color' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bg_switch' => 'yes'
				],
			]
		);

		$this->add_responsive_control(
			'bgheight',
			[
				'label' => __( 'Background Height', 'elli' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
					],
				],
				'default' =>[
					'size' => ['100'],
				],
				'selectors' => [
					'{{WRAPPER}} .ale-bg-section-color' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bg_switch' => 'yes'
				],
			]
		);

		$this->add_responsive_control(
			'dotspositiontop',
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
			'dotspositionleft',
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

		$this->end_controls_section();

		//Subtitle Style Section
		$this->start_controls_section(
			'header_style_section', [
				'label'	 => esc_html__( 'Header Slider Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'slider_margin',
			[
				'label' => __( 'Slider Margin', 'elli' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ale-header-slider-container-st2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'header_slider' => 'style2',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() { 
		$settings 		   = $this->get_settings();			
		$ale_slider_style  = $this->get_settings('header_slider');
		
		if($ale_slider_style == 'style1') : 
			$ale_header_slider = $this->get_settings_for_display('headerslider1'); 
		elseif($ale_slider_style == 'style2') :
			$ale_header_slider = $this->get_settings_for_display('headerslider2'); 
		endif;

        switch ($ale_slider_style) {
            case 'style1':
                require ALETHEME_PATH. '/elementor/shortcodes/style/headerslider-style/style1.php';
                break;

            case 'style2':
                require ALETHEME_PATH. '/elementor/shortcodes/style/headerslider-style/style2.php';
                break;
        }
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

	}

}
