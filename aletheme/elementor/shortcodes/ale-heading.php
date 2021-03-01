<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Ale_Heading_Widget extends Widget_Base {

	public function get_name() {
		return 'ale-heading';
	}

	public function get_title() {
		return esc_html__( 'Elli Heading', 'elli' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return [ 'elli-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Elli Heading', 'elli' ),
			]
		);

		$this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'default' => 'style1',
                'options' => [
                	'header1' => esc_html__('H1', 'elli'),
                	'header' => esc_html__('H2', 'elli'),
                    'style1' => esc_html__('H3', 'elli'),
                    'style4' => esc_html__('H4', 'elli'),
                    'style2' => esc_html__('H5', 'elli'),
                    'style3' => esc_html__('Long Heading', 'elli'),
                ],
            ]
        );

        

        $this->add_control(
            'sub_title', [
                'label'			 => esc_html__( 'Sub Title', 'elli' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Put here short title', 'elli' ),
                'default'        => esc_html__('Add a short title here', 'elli'),
                'condition' => [
                    'style'   =>  ['style1', 'header', 'header1'],
                ],
            ]
        );

		$this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'elli' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Add title here', 'elli' ),
                'default'        => esc_html__( 'Add a title here', 'elli'),
                'condition' => [
                    'style'   =>  ['style1', 'style2', 'style4', 'header', 'header1'],
                ],
			]
		);

		$this->add_control(
			'title_text2', [
				'label'			 => esc_html__( 'Heading Title', 'elli' ),
				'type'			 => Controls_Manager::WYSIWYG,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Add title here', 'elli' ),
                'default'        => esc_html__( 'Add a title here', 'elli'),
                'condition' => [
                    'style'   =>  ['style3'],
                ],
			]
		);
                    

		$this->add_responsive_control(
			'title_align', [
				'label'			 => esc_html__( 'Alignment', 'elli' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 => esc_html__( 'Left', 'elli' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 => esc_html__( 'Center', 'elli' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 => esc_html__( 'Right', 'elli' ),
						'icon'	 => 'fa fa-align-right',
					],
				],
				'default'		 => 'left',
				'prefix_class'   => 'ale-head-text elementor%s-align-',
			]
		);
		$this->end_controls_section();

		//Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Title color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .elli-heading-title > .elli-title-style' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elli-title-long-style > *' 		      => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_margin_bottom', [
				'label'			 => esc_html__( 'Margin Bottom', 'elli' ),
				'type'			 => Controls_Manager::SLIDER,
				'size_units'	 => ['px'],
				'selectors'		 => [
					'{{WRAPPER}} .elli-heading-title .elli-title-style'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'		 => 'title_typography',
				'selector'	 => '{{WRAPPER}} .elli-heading-title .elli-title-style',
				'condition'  => [
					'style' => ['style1', 'header', 'style2', 'style4'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'		 => 'title_typography_long',
				'selector'	 => '{{WRAPPER}} .elli-title-long-style > *',
				'condition'  => [
					'style' => ['style3'],
				],
			]
		);

		$this->end_controls_section();

		//Subtitle Style Section
		$this->start_controls_section(
			'section_subtitle_style', [
				'label'	 => esc_html__( 'Sub Title', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
				'condition' => [
                    'style'   =>  ['style1', 'header'],
                ],
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label'		 => esc_html__( 'Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .elli-heading-title h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'subtitle_typography',
			'selector'	 => '{{WRAPPER}} .elli-heading-title h6',
			]
		);

		$this->add_control(
			'subtitle_margin_bottom', [
				'label'			 => esc_html__( 'Margin Bottom', 'elli' ),
				'type'			 => Controls_Manager::SLIDER,
				'size_units'	 => ['px'],
				'selectors'		 => [
					'{{WRAPPER}} .elli-heading-title h6'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//Separate Line
        $this->start_controls_section(
            'separte_dots',
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
                    '{{WRAPPER}} i.fa-circle' => 'color: {{COLOR}};',
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
                    '{{WRAPPER}} span.separate_dots' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'separate_size',
            [
                'label' => esc_html__( 'Separator Size', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} i.fa-circle' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );



        $this->end_controls_section();
	}

	protected function render() {
		$settings  = $this->get_settings();
		$ale_style = $settings['style'];

		if($ale_style == 'style1' || $ale_style == 'style2' || $ale_style == 'style4' || $ale_style == 'header' || $ale_style == 'header1') :
			$ale_title = $settings[ 'title_text' ];
		elseif($ale_style == 'style3') :
			$ale_title = $settings['title_text2'];
		endif;
		
		$ale_sub_title = $settings[ 'sub_title' ];

        switch ($ale_style) {
        	case 'header':
                require ALETHEME_PATH. '/elementor/shortcodes/style/heading-style/hdstyle.php';
                break;

            case 'header1':
                require ALETHEME_PATH. '/elementor/shortcodes/style/heading-style/hdstyle1.php';
                break;

            case 'style1':
                require ALETHEME_PATH. '/elementor/shortcodes/style/heading-style/style1.php';
                break;

            case 'style2':
                require ALETHEME_PATH. '/elementor/shortcodes/style/heading-style/style2.php';
                break;

            case 'style3':
                require ALETHEME_PATH. '/elementor/shortcodes/style/heading-style/style3.php';
                break;

            case 'style4':
                require ALETHEME_PATH. '/elementor/shortcodes/style/heading-style/style4.php';
                break;
        }

	}

	protected function _content_template() {}
}
