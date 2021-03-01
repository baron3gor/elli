<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Ale_Team_Widget extends Widget_Base {

	public function get_name() {
		return 'ale-team';
	}

	public function get_title() {
		return esc_html__( 'Elli Team', 'elli' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'elli-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
		'section_tab', [
			'label' => esc_html__( 'Elli Team', 'elli' ),
		]
		);

		$this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'default' => 'style2',
                'options' => [
                	'style2' => esc_html__('Main Style', 'elli'),
                    'style1' => esc_html__('Single Style 1', 'elli'),
                ],
            ]
        );	

		$this->add_control(
			'member_name', [
				'label'			 => esc_html__( 'Team Member', 'elli' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
			]
		);

		$this->add_control(
			'member_position', [
				'label'			 => esc_html__( 'Position', 'elli' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
			]
		);

		$this->add_control(
			'team_descr', [
				'label'			 => esc_html__( 'Description', 'elli' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
			]
		);



		$this->add_control(
			'image', [
				'label'		 => esc_html__( 'Thumbnail Image', 'elli' ),
				'type'		 => Controls_Manager::MEDIA,
				'default'	 => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_responsive_control(
            'team_align', [
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
            ]
        );

		$this->add_control(
			'member_show_social', [
				'label'		 => esc_html__( 'Show Social', 'elli' ),
				'type'		 => Controls_Manager::SWITCHER,
				'label_on'	 => esc_html__( 'Yes', 'elli' ),
				'label_off'	 => esc_html__( 'No', 'elli' ),
			]
		);

		$this->add_control(
			'facebook_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Facebook URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Facebook URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);

		$this->add_control(
			'twitter_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Twitter URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Twitter URL.', 'elli' ),
				'default'		 => '#',
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);

		$this->add_control(
			'instagram_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Instagram URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Instagram URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);

		$this->add_control(
			'linkedin_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Linkedin URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Linkedin URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);
		$this->add_control(
			'vk_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Vk URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Vk URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);
		$this->add_control(
			'youtube_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Youtube URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s youtube URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);
		$this->add_control(
			'pinterest_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Pinterest URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Pinterest URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);
		$this->add_control(
			'tumblr_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Tumblr URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Tumblr URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
				],
			]
		);
		$this->add_control(
		'behance_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'behance URL', 'elli' ),
			'description'	 => esc_html__( 'Team member\'s Behance URL.', 'elli' ),
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);

		$this->add_control(
			'yelp_url', [
				'type'			 => Controls_Manager::TEXT,
				'label'			 => esc_html__( 'Yelp URL', 'elli' ),
				'description'	 => esc_html__( 'Team member\'s Yelp URL.', 'elli' ),
				'condition'		 => [
					'member_show_social' => 'yes',
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
				'default' => 'yes',
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
				'default' => 'yes',
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
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Name Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'member_name_color', [
				'label'		 => esc_html__( 'Name Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ale-team-name-styles' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .ale-team-name-styles',
            ]
        );

        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-team-name-styles' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

		$this->end_controls_section();

		//Position Style
		$this->start_controls_section(
			'section_position_style', [
				'label'	 => esc_html__( 'Position Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'member_position_color', [
				'label'		 => esc_html__( 'Position Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ale-team-position-styles' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .ale-team-position-styles',
            ]
        );

        $this->add_control(
            'position_margin',
            [
                'label' => esc_html__( 'Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-team-position-styles' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

		$this->end_controls_section();

		//Description Style
		$this->start_controls_section(
			'section_description_style', [
				'label'	 => esc_html__( 'Description Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'member_description_color', [
				'label'		 => esc_html__( 'Description Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .ale-team-descr-wrapper p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'descr_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .ale-team-descr-wrapper p',
            ]
        );

        $this->add_control(
			'descr_padding',
			[
				'label' => __( 'Description Padding', 'elli' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .ale-team-descr-wrapper p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'descr_margin',
            [
                'label' => esc_html__( 'Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ale-team-descr-wrapper p' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

		$this->end_controls_section();

		//Separator Style
		$this->start_controls_section(
			'section_separator_style', [
				'label'	 => esc_html__( 'Separator Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => ['style2'],
				],
			]
		);

        $this->add_control(
            'separator_margin',
            [
                'label' => esc_html__( 'Margin Bottom', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .line-item-separator' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );


        $this->add_control(
            'sparator_width',
            [
                'label' => esc_html__( 'Width ', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['%'],
                'selectors' => [
                    '{{WRAPPER}} .line-item-separator' => 'width: {{SIZE}}%;',
                ],
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings 				= $this->get_settings_for_display();
		$ale_image 				= $settings['image'];
		$ale_alt 				= get_post_meta($ale_image['id'], '_wp_attachment_image_alt', true);
		$ale_member_name 		= $settings[ 'member_name' ];
		$ale_member_descr 		= $settings[ 'team_descr' ];
		$ale_member_position 	= $settings[ 'member_position' ];
		$ale_member_show_social = $settings[ 'member_show_social' ];
		$ale_style 			 	= $settings[ 'style' ];
		$ale_fb				    = $settings[ 'facebook_url' ];
		$ale_tw				    = $settings[ 'twitter_url' ];
		$ale_instagram		    = $settings[ 'instagram_url' ];
		$ale_linkedin		    = $settings[ 'linkedin_url' ];
		$ale_vk_url			    = $settings[ 'vk_url' ];
		$ale_youtube_url	    = $settings[ 'youtube_url' ];
		$ale_pinterest_url	    = $settings[ 'pinterest_url' ];
		$ale_tumblr_url		    = $settings[ 'tumblr_url' ];
		$ale_behance_url	    = $settings[ 'behance_url' ];
		$ale_yelp_url		    = $settings[ 'yelp_url' ];

			switch ($ale_style) {
	            case 'style1':
	                require ALETHEME_PATH. '/elementor/shortcodes/style/team-style/style1.php';
	                break;

	            case 'style2':
	                require ALETHEME_PATH. '/elementor/shortcodes/style/team-style/style2.php';
	                break;
	                
	        }
		}

		protected function _content_template() {
			
		}

	}
	