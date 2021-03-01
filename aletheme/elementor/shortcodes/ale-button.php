<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Button_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-button';
    }

    public function get_title() {
        return esc_html__( 'Elli Button', 'elli' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Button', 'elli'),
            ]
        );

        $this->add_control(
            'btn_size',
            [
                'label' => esc_html__( 'Button Size', 'elli' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'btnbig',
                'options' => [
                    'btnsmall' => esc_html__('Classic Small Button', 'elli'),
                    'btnbig' => esc_html__('Classic Large button', 'elli'),
                    '3rd' => esc_html__('Small Button Style 2', 'elli'),
                    '4rd' => esc_html__('Button With Arrow', 'elli'),
                ],
            ]
        );


        $this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Primary Button', 'elli' ),
				'label_block'   => true,
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'See more ', 'elli' ),
				'placeholder' => esc_html__( 'See more ', 'elli' ),
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
			]
		);

		$this->add_responsive_control(
			'btn_align',
			[
				'label' => esc_html__( 'Alignment', 'elli' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'elli' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elli' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elli' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
			]
		);

        $this->end_controls_section();

		 //Button Style
        $this->start_controls_section(
            'btn_settings',
            [
                'label'     => esc_html__( 'Button Style', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_label_color',
            [
                'label' => esc_html__( 'Button Label Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.ale-btn-text' => 'color: {{COLOR}};',
                ],
            ]
        );

        $this->add_control(
            'btn_label_hover',
            [
                'label' => esc_html__( 'Button Label Hover Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.ale-btn:hover span.ale-btn-text' => 'color: {{COLOR}};',
                ],
            ]
        );



        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_bd_style',
                'label' => esc_html__( 'Border Style', 'elli' ),
                'selector' => '{{WRAPPER}} a.ale-btn .ale-btn-text',
                'default' => [
                    'border' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.ale-btn' => 'background-color: {{COLOR}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__( 'Button Hover Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overlay' => 'background-color: {{COLOR}};',
                ],
            ]
        );

        $this->end_controls_section();   
    }


    protected function render( ) {
        $settings     = $this->get_settings();
        $btn_text     = $settings['btn_text'];
        $ale_btn_size = $settings['btn_size'];
		$btn_link     = (! empty( $settings['btn_link']['url'])) ? $settings['btn_link']['url'] : '';
		$btn_target   = ( $settings['btn_link']['is_external']) ? '_blank' : '_self'; ?>
        
        <?php switch ($ale_btn_size) {
        case 'btnsmall': if( !empty($btn_text)) : ?>
            <div class="small-btn-wrapper fade-animation">
            <a  class="ale-btn-small" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>">
                <span class="ale-btn-text-small"><?php echo esc_html( $btn_text ); ?></span>
                <div class="overlay"></div>
            </a>
            </div>
        <?php endif ; break;
        case 'btnbig': if( !empty($btn_text)) : ?>
            <div class="btn-wrapper fade-animation">
                <a  class="ale-btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>">
                    <span class="ale-btn-text"><?php echo esc_html( $btn_text ); ?></span>
                    <div class="overlay"></div>
                </a>
            </div>            
        <?php endif ; break;
        case '3rd': if( !empty($btn_text)) : ?>
            <div class="ale-4rd-btn fade-animation">
            <a  class="ale-4rd-btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>">
                <span class="ale-btn-text"><?php echo esc_html( $btn_text ); ?></span>
            </a>
            </div>
        <?php endif ; break;
        case '4rd': if( !empty($btn_text)) : ?>
            <div class="ale-4rd-btn fade-animation ale-button-arrow">
            <a  class="ale-4rd-btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target ); ?>">
                <span class="ale-btn-text"><i class="ti-arrow-right"></i><?php echo esc_html( $btn_text ); ?></span>
            </a>
            </div>
        <?php endif ; break;
        }

    }

    protected function _content_template() { }
}