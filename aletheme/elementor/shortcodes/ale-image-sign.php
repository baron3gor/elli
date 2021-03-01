<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Image_Signature_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-image-sign';
    }

    public function get_title() {
        return esc_html__( 'Elli Image Signature', 'elli' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Image Signature', 'elli'),
            ]
        );


        $this->add_control(
            'image_photo',
            [
                'label' => esc_html__( 'Image', 'elli' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'image_name',
            [
                'name'          => 'img_name',
                'label'         => esc_html__('Name', 'elli'),
                'label_block'   => true,
                'type'          => Controls_Manager::TEXT,
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

        $this->add_control(
            'image_sign',
            [
                'label' => esc_html__( 'img_sign', 'elli' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        //Decription Style
        $this->start_controls_section(
            'section_desc_style',
            [
                'label'     => esc_html__( 'Description', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'descr_typography',
                'label' => esc_html__( 'Typography', 'elli' ),
                'selector' => '{{WRAPPER}} .img-sign-info > p',
            ]
        );

        $this->add_control(
            'description_margin_bottom',
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
                    '{{WRAPPER}} .img-sign-info > p' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );


        $this->end_controls_section();

        //Title Style
        $this->start_controls_section(
            'section_title_style',
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
                'selector' => '{{WRAPPER}} h5.img-sign-info-name',
            ]
        );

        $this->end_controls_section();

        //Image Style
        $this->start_controls_section(
            'section_image_style',
            [
                'label'     => esc_html__( 'Image', 'elli' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'imgwidth',
            [
                'label' => __( 'Image Width', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .img-sign-wrapper .img-sign-photo img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                ],
            ]
        );

        $this->add_control(
            'img_margin_right',
            [
                'label' => esc_html__( 'Margin Right', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .img-sign-wrapper .img-sign-photo' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'bgoptions',
            [
                'label' => esc_html__('Background Options', 'elli'),
            ]            
        );

        $this->add_control(
            'dots_head',
            [
                'label' => __( 'Dots Background Options', 'elli' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'bg_dots',
            [
                'label' => __( 'Show Dots Background', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elli' ),
                'label_off' => esc_html__( 'Hide', 'elli' ),
                'return_value' => 'yes',
                'default' => 'no',        
            ]
        );

        $this->add_control(
            'bg_dots_width',
            [
                'label' => __( 'Dots Background Max Width', 'elli' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'bg_dots' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'bg_dots_height',
            [
                'label' => __( 'Dots Background Max Height', 'elli' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'bg_dots' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'bg_dots_color',
            [
                'label' => __( 'Dots Color', 'elli' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'background: radial-gradient({{VALUE}},12.8%,transparent 13%); background-size: 21px 21px;',
                ],
                'condition' => [
                    'bg_dots'   =>  ['yes'],
                ],
            ]
        );

        $this->add_control(
            'bg_dots_position',
            [
                'label' => __( 'Dots Background Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['top', 'left'],
                'default' => [
                    'unit' => 'px',
                ],
                'condition' => [
                    'bg_dots'   =>  ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
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

    protected function render( ) {

        $settings            = $this->get_settings();
        $ale_img_photo       = $settings['image_photo'];
        $ale_img_name        = $settings['image_name'];
        $ale_img_description = $settings['image_description'];
        $ale_img_sign        = $settings['image_sign'];
        $ale_alt_photo       = get_post_meta($ale_img_photo['id'], '_wp_attachment_image_alt', true);
        $ale_alt_sign        = get_post_meta($ale_img_sign['id'], '_wp_attachment_image_alt', true);  
        $ale_bg_on           = $settings['bg_dots']; ?>        

        <div class="img-sign-wrapper">
            <?php if($ale_bg_on == 'yes') : ?>
                <div class="ale-dott-bg"></div>
            <?php endif; ?>
            <?php  if($ale_img_photo['url']) : ?>
                <div class="img-sign-photo fade-image">
                    <img src="<?php echo esc_url($ale_img_photo['url'], 'elli') ;?>" alt="<?php echo esc_attr($ale_alt_photo, 'elli') ;?>">
                </div>
            <?php endif; ?>
            <div class="img-sign-info fade-animation">
                <?php if(!empty($ale_img_description)) { ?>
                        <?php echo ale_wp_kses($ale_img_description, 'elli'); ?>
                <?php } ;?>
                <?php if(!empty($ale_img_name)) { ?>
                    <span class="separate_dots">
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                        <h5 class="img-sign-info-name"><?php echo esc_html($ale_img_name, 'elli'); ?></h5>
                <?php } ;?>
            </div>
            <?php  if($ale_img_sign['url'] ) { ?>
                <div class="img-sign-sign fade-animation">
                    <img src="<?php echo esc_url($ale_img_sign['url'], 'elli') ;?>" alt="<?php echo esc_attr($ale_alt_photo, 'elli') ;?>">
                </div>
            <?php } ?>

            <!-- Team Info end -->
        </div>

        <!-- Team Box End -->
        <?php

    }

    protected function _content_template() { }
}