<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Ale_Skills extends Widget_Base {

	public function get_name() {
		return 'ale-skills';
	}

	public function get_title() {
		return esc_html__( 'Elli Skills', 'elli' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'elli-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Elli Skills', 'elli' ),
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
			'skill_value', [
				'label'			 => esc_html__( 'Skill Value', 'elli' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
			]
		);

		$this->add_control(
			'skill_title', [
				'label'			 => esc_html__( 'Skill Title', 'elli' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
			]
		);

		$this->add_control(
			'skill_descr', [
				'label'			 => esc_html__( 'Skill Description', 'elli' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
			]
		);

		$this->end_controls_section();

		//Title Style
		$this->start_controls_section(
			'title_style', [
				'label'	 => esc_html__( 'Title Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'		 => 'title_typography',
				'selector'	 => '{{WRAPPER}} .skill-title',
			]
		);

		$this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .skill-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_margin_bottom', [
				'label'			 => esc_html__( 'Margin Bottom', 'elli' ),
				'type'			 => Controls_Manager::SLIDER,
				'size_units'	 => ['px'],
				'selectors'		 => [
					'{{WRAPPER}} .skill-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//Description Style
		$this->start_controls_section(
			'desc_style', [
				'label'	 => esc_html__( 'Description Style', 'elli' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'		 => 'desc_typography',
				'selector'	 => '{{WRAPPER}} .single-chart p',
			]
		);

		$this->add_control(
			'desc_color', [
				'label'		 => esc_html__( 'Color', 'elli' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .single-chart p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render( ) {
        $settings 		 = $this->get_settings();
        $ale_skill_value = $settings['skill_value'];
        $ale_skill_title = $settings['skill_title'];
        $ale_skill_descr = $settings['skill_descr']; ?>
        
	        <?php if( !empty($ale_skill_value) & !empty($ale_skill_title)) : ?>
	            <div class="single-chart fade-animation">
				    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 36 36" class="circular-chart orange ale-skills-chart" xml:space="preserve">
				      <path class="circle-bg"
				        d="M18 2.0845
				          a 15.9155 15.9155 0 0 1 0 31.831
				          a 15.9155 15.9155 0 0 1 0 -31.831"
				      ></path>
				      <path class="circle"
				        stroke-dasharray="<?php echo esc_attr($ale_skill_value) ;?>, 100"
				        d="M18 2.0845
				          a 15.9155 15.9155 0 0 1 0 31.831
				          a 15.9155 15.9155 0 0 1 0 -31.831"
				      ></path>
				      <text x="18" y="20.30" class="percentage"><?php echo esc_html($ale_skill_value, 'elli') . '%' ;?></text>
				    </svg>
				    <h5 class="skill-title"><?php echo esc_html($ale_skill_title, 'elli') ;?></h5>
				    <?php if( !empty($ale_skill_descr)) : ?>
						<p><?php echo esc_html($ale_skill_descr) ;?></p>
				    <?php endif; ?>
				  </div>
	        <?php endif ;?>
        <?php
    }

    protected function _content_template() { }
}