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
class Ale_Quote_Slider_Widget extends Widget_Base {

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
		return 'ale-quote-slider';
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
		return __( 'Elli Quotes Slider', 'elli' );
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
		return ' eicon-blockquote';
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
				'label' => __( 'Quotes', 'elli' ),
			]
		);



		$repeater = new \Elementor\Repeater();		

				
		$repeater->add_control(
			'item_position',
			[
				'label' => __( 'Position', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type position here', 'elli' ),
			]
		);

		$repeater->add_control(
			'item_name',
			[
				'label' => __( 'Name', 'elli' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type name here', 'elli' ),
			]
		);

		$repeater->add_control(
			'item_description',
			[
				'label' => __( 'Description', 'elli' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your description here', 'elli' ),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Portrait', 'elli' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'imgslider',
			[
				'label' => __( 'Repeater List', 'elli' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
	$settings   = $this->get_settings();	
	$ale_slider = $this->get_settings_for_display('imgslider'); 

	if(!empty($ale_slider)) : ?>	
		<div class="ale-quote-slider fade-animation">
			<div class="ale-quote-slider-wrapper">
				<div class="swiper-container ale-quote-slider">							
					<div class="swiper-wrapper">	
						<?php foreach ($ale_slider as $ale_slider_item) : 						
							$ale_img_alt = get_post_meta($ale_slider_item['image']['id'], '_wp_attachment_image_alt', true);
							$ale_quote_desc = $ale_slider_item['item_description'];
							$ale_quote_posa = $ale_slider_item['item_position'];
							$ale_quote_name = $ale_slider_item['item_name']; ?>
							
							<div class="swiper-slide">
								<div class="ale-quote-wrapper-slide">
									<?php if(!empty($ale_quote_desc)) : ?>
										<div class="ale-quote-desc-wrapper">
											<div class="ale-quote-svg-wrapper">
												<svg class="ale-quote-slider-icon" version="1.1" id="ale-quote" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
														 viewBox="0 0 66 57.4" xml:space="preserve">
													<path class="st0" d="M65.6,23.2c-0.6,8.4-4.4,20.9-19.4,33c-0.8,0.6-1.5,0.9-2.5,0.9c-1.2,0-2.3-0.6-3.2-1.5
														c-1.3-1.7-0.9-4.4,0.8-5.7c12.3-9.9,15.8-19.8,16.3-26.4c-1.7,0.9-3.6,1.7-5.9,1.7c-6.7,0-12-5.5-12-12.5s5.3-12.5,12-12.5
														c1.5,0,2.9,0.4,4.2,0.9c0.2,0,0.8,0.2,1.3,0.6c0,0,0,0,0.2,0C58,2.1,58.6,2.5,59.4,3c0.4,0.2,0.6,0.6,0.8,0.8
														C63.2,6.8,66.4,12.5,65.6,23.2z M20.6,3.8c-0.2-0.2-0.4-0.6-0.8-0.8c-0.8-0.6-1.3-0.9-1.9-1.3c-0.2,0-0.2,0-0.2,0
														c-0.8-0.4-1.1-0.6-1.3-0.6c-1.3-0.6-2.7-0.9-4.2-0.9c-6.7,0-12,5.5-12,12.5s5.3,12.5,12,12.5c2.1,0,4.2-0.8,5.9-1.7
														c-0.6,6.6-4,16.5-16.3,26.4c-1.7,1.3-2.1,4-0.8,5.7c0.8,0.9,1.9,1.5,3,1.5c0.9,0,1.7-0.4,2.5-0.9c15-12.2,18.8-24.7,19.4-33
														C26.9,12.5,23.7,6.8,20.6,3.8z"/>
													</svg>
												</div>
											<span class="ale-blockquote-slider"><?php echo ale_wp_kses($ale_quote_desc, 'elli'); ?></span>
										</div>
									<?php endif; ?>
									<?php if(!empty($ale_quote_name) || !empty($ale_quote_posa)) : ?>
										<div class="ale-quote-bottom-line">
											<?php if(($ale_slider_item['image']['url']) != '') : ?>
												<div class="ale-quote-person">
													<img src="<?php echo esc_url($ale_slider_item['image']['url'], 'elli') ?>" alt="<?php echo esc_attr($ale_img_alt, 'elli') ?>">
												</div>
											<?php endif; ?>
											<div class="ale-quote-name-wrapper">
												<?php if(!empty($ale_quote_posa)) : ?>
													<h6><?php echo esc_html($ale_quote_posa, 'elli'); ?></h6>
												<?php endif; ?>
												<?php if(!empty($ale_quote_name)) : ?>
													<h5><?php echo esc_html($ale_quote_name, 'elli'); ?></h5>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									
								</div>
							</div>	
						<?php endforeach;?>	
					</div>
				</div>
			</div>
			<div class="ale-quote-pagination"></div>
		</div>
	<?php endif; ?>
	<?php if($settings['show_dots'] == 'yes') : ?>
		<div class="ale-dott-left-background"></div>
	<?php endif; ?>
	<?php if($settings['show_dots_right'] == 'yes') : ?>
		<div class="ale-dott-right-background"></div>
	<?php endif; 

        
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
