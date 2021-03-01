<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Ale_Stats extends Widget_Base {

	public function get_name() {
		return 'ale-ststs';
	}

	public function get_title() {
		return esc_html__( 'Elli Stats', 'elli' );
	}

	public function get_icon() {
		return 'eicon-toggle';
	}

	public function get_categories() {
		return [ 'elli-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Elli Stats', 'elli' ),
			]
		);

        $this->add_control(
            'icon_st2',
            [
                'label' => __( 'Icon', 'elli' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'icontitle_st2',
            [
                'label' => __( 'Title', 'elli' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'value_st2',
            [
                'label' => __( 'Title', 'elli' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
			'star_st2',
			[
				'label' => __( 'Show Star', 'elli' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elli' ),
				'label_off' => __( 'Hide', 'elli' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'title_section_style',
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
                'selector' => '{{WRAPPER}} .ale-statval-wrapper h5',
            ]
        );

        $this->add_control(
            'title_margin_right',
            [
                'label' => esc_html__( 'Margin Right', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-statval-wrapper' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'separate_section_style',
            [
                'label'     => esc_html__( 'Separator', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'separate_margin',
            [
                'label' => esc_html__( 'Margin Right/Left', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-middle-separate' => 'margin: 0 {{SIZE}}px 0 {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'separate_width',
            [
                'label' => esc_html__( 'Separator Width', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-stat-style2-container .ale-middle-separate' => 'width: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'value_section_style',
            [
                'label'     => esc_html__( 'Value', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'value_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .ale-stat2-subtitel h6',
            ]
        );

        $this->add_control(
            'value_margin_right',
            [
                'label' => esc_html__( 'Margin Right', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-stat2-subtitel h6' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon_style_st2',
            [
                'label' => __( 'Icon', 'elli' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color_st2',
            [
                'label' => __( 'Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff6d24',
                'selectors' => [
                    '{{WRAPPER}} .ale-icon-stat-2.elementor-icon-list-icon i' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size_st2',
            [
                'label' => __( 'Size', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 25,
                ],
                'range' => [
                    'px' => [
                        'min' => 6,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-icon-stat-2.elementor-icon-list-icon' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ale-icon-stat-2.elementor-icon-list-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_margin_right',
            [
                'label' => esc_html__( 'Margin Right', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-icon-stat-2.elementor-icon-list-icon i' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings 	   = $this->get_settings();
        $ale_icon_st2  = $settings['icon_st2'];
        $ale_title_st2 = $settings['icontitle_st2'];
        $ale_value_st2 = $settings['value_st2'];
        $ale_star_st2  = $settings['star_st2']; ?>

        <?php if(!empty($ale_title_st2)) : ?>
			<div class="ale-stat-style2-container fade-animation">
				<?php if(!empty($ale_title_st2) || !empty($ale_icon_st2)) : ?>
					<div class="ale-stat-style2-wrapper">
						<?php if(!empty($ale_icon_st2)) : ?>
							<div class="ale-staticon-wrapper">
								<span class="ale-icon-stat-2 elementor-icon-list-icon">
	                                <i class="<?php echo esc_attr($ale_icon_st2, 'elli'); ?>" aria-hidden="true"></i>
	                            </span>
							</div>
						<?php endif; ?>
						<?php if(!empty($ale_title_st2)) : ?>
							<div class="ale-statval-wrapper">
								<h5><?php echo esc_html($ale_title_st2, 'elli'); ?></h5>
							</div>
						<?php endif; ?>
						
					</div>
				<?php endif; ?>
				<?php if(!empty($ale_value_st2) || $ale_star_st2 == 'yes') : ?>
					<?php if(!empty($ale_value_st2)) : ?>
						<div class="ale-middle-separate"></div>
						<div class="ale-stat2-subtitel">
							<h6><?php echo esc_html($ale_value_st2, 'elli'); ?></h6>
						</div>
					<?php endif; ?>
					<?php if($ale_star_st2 == 'yes') : ?>
						<div class="ale-staticon-val">
							<svg version="1.1" class="ale-starsvg-wrapper" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 49.1 49.1" xml:space="preserve">
								<path class="ale-star-stat" d="M35.3,31.1L35.3,31.1l4.6,15.6c0.1,0.4,0,0.8-0.3,1c-0.2,0.2-0.3,0.2-0.5,0.2c-0.2,0-0.4,0-0.6-0.2l-14-10.4	l-0.1,0l-14,10.4c-0.1,0.1-0.3,0.2-0.5,0.2s-0.4-0.1-0.5-0.2c-0.2-0.2-0.4-0.5-0.3-1l5.1-15.5c0-0.1,0-0.2,0-0.2L0.3,19.9 c-0.3-0.3-0.4-0.7-0.3-1c0.2-0.3,0.5-0.5,0.8-0.5l17.3-0.4c0,0,0,0,0.1,0l5.4-16.1c0.2-0.4,0.5-0.6,0.8-0.6c0,0,0.1,0,0.2,0 c0.3,0,0.5,0.2,0.6,0.5L30.9,18c0,0,0,0,0.1,0l17.1,0.3c0.4,0,0.7,0.2,0.8,0.5c0.2,0.5-0.1,0.8-0.2,1L35.3,31.1z"/>
                            </svg>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
        <?php endif; ?>


    <?php wp_reset_postdata();

	}

	protected function _content_template() {}
}
