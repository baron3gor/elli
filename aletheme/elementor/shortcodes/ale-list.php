<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_List extends Widget_Base {

    public function get_name() {
        return 'ale-list';
    }

    public function get_title() {
        return esc_html__( 'Elli List', 'elli' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli List', 'elli'),
            ]
        );

        $this->add_control(
            'list_style',
            [
                'label' => __( 'List Style', 'elli' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => __( 'Style 1', 'elli' ),
                    'style2' => __( 'Icon List', 'elli' ),
                    'style3' => __( 'Header List', 'elli' ),
                ],
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('List', 'elli'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',

                'fields' => [

                    [
                        'name'          => 'item',
                        'label'         => esc_html__('List Title', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],
                ],
                'condition' => [
                    'list_style' => [ 'style1', 'style3' ],
                ],
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => __( 'Layout', 'elli' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'traditional',
                'options' => [
                    'traditional' => [
                        'title' => __( 'Default', 'elli' ),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'inline' => [
                        'title' => __( 'Inline', 'elli' ),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                ],
                'render_type' => 'template',
                'classes' => 'elementor-control-start-end',
                'label_block' => false,
                'style_transfer' => true,
                'prefix_class' => 'elementor-icon-list--layout-',
                'condition' => [
                    'list_style' => 'style2',
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'text',
            [
                'label' => __( 'Text', 'elli' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'List Item', 'elli' ),
                'default' => __( 'List Item', 'elli' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'elli' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default' => 'fa fa-check-circle',
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => __( 'Link', 'elli' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
                'placeholder' => __( 'https://your-link.com', 'elli' ),
            ]
        );

        $this->add_control(
            'icon_list',
            [
                'label' => '',
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'text' => __( 'List Item #1', 'elli' ),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __( 'List Item #2', 'elli' ),
                        'icon' => 'fa fa-times',
                    ],
                    [
                        'text' => __( 'List Item #3', 'elli' ),
                        'icon' => 'fa fa-dot-circle-o',
                    ],
                ],
                'title_field' => '<i class="{{ icon }}" aria-hidden="true"></i> {{{ text }}}',
                'condition' => [    
                    'list_style' => 'style2',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon_list',
            [
                'label' => __( 'List', 'elli' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'list_style' => ['style2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'space_between',
            [
                'label' => __( 'Space Between', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child)' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
                    '{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2)',
                    '{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item' => 'margin-right: calc({{SIZE}}{{UNIT}}/2); margin-left: calc({{SIZE}}{{UNIT}}/2)',
                    '{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items' => 'margin-right: calc(-{{SIZE}}{{UNIT}}/2); margin-left: calc(-{{SIZE}}{{UNIT}}/2)',
                    'body.rtl {{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after' => 'left: calc(-{{SIZE}}{{UNIT}}/2)',
                    'body:not(.rtl) {{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after' => 'right: calc(-{{SIZE}}{{UNIT}}/2)',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_align',
            [
                'label' => __( 'Alignment', 'elli' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elli' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elli' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elli' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
            ]
        );

        $this->add_control(
            'divider',
            [
                'label' => __( 'Divider', 'elli' ),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __( 'Off', 'elli' ),
                'label_on' => __( 'On', 'elli' ),
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'content: ""',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'divider_style',
            [
                'label' => __( 'Style', 'elli' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'solid' => __( 'Solid', 'elli' ),
                    'double' => __( 'Double', 'elli' ),
                    'dotted' => __( 'Dotted', 'elli' ),
                    'dashed' => __( 'Dashed', 'elli' ),
                ],
                'default' => 'solid',
                'condition' => [
                    'divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child):after' => 'border-top-style: {{VALUE}}',
                    '{{WRAPPER}} .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:not(:last-child):after' => 'border-left-style: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'divider_weight',
            [
                'label' => __( 'Weight', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
                'condition' => [
                    'divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child):after' => 'border-top-width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .elementor-inline-items .elementor-icon-list-item:not(:last-child):after' => 'border-left-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'divider_width',
            [
                'label' => __( 'Width', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'condition' => [
                    'divider' => 'yes',
                    'view!' => 'inline',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'divider_height',
            [
                'label' => __( 'Height', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px' ],
                'default' => [
                    'unit' => '%',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'divider' => 'yes',
                    'view' => 'inline',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => __( 'Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ddd',
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'condition' => [
                    'divider' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:not(:last-child):after' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon_style',
            [
                'label' => __( 'Icon', 'elli' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'list_style' => ['style2'],
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff6d24',
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-icon i' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => __( 'Hover', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:hover .elementor-icon-list-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Size', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 14,
                ],
                'range' => [
                    'px' => [
                        'min' => 6,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-icon' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elementor-icon-list-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_text_style',
            [
                'label' => __( 'Text', 'elli' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'list_style' => ['style2'],
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-text' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_2,
                ],
            ]
        );

        $this->add_control(
            'text_color_hover',
            [
                'label' => __( 'Hover', 'elli' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-item:hover .elementor-icon-list-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_indent',
            [
                'label' => __( 'Text Indent', 'elli' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon-list-text' => is_rtl() ? 'padding-right: {{SIZE}}{{UNIT}};' : 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'selector' => '{{WRAPPER}} .elementor-icon-list-item',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section(); 

    }

    protected function render( ) {
        $settings       = $this->get_settings();
        $ale_items      = $settings['items'];
        $ale_list_style = $settings['list_style'];
        $ale_items_st2  = $settings['icon_list'];

        if(is_array($ale_items) && !empty($ale_items) && $ale_list_style == 'style1'): ?>
            <div class="list-wrapper fade-animation">
                <ul>
                <?php foreach($ale_items as $item): ?>
                    <?php  
                        $ale_item = $item['item'];
                    ?>
                    <?php if( !empty ($ale_item)) : ?>
                       <li><?php echo esc_html($ale_item) ;?></li>
                    <?php endif ?>
                <?php  endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(is_array($ale_items_st2) && !empty($ale_items_st2) && $ale_list_style == 'style2') : ?>
            <div class="ale-icon-list-st2 fade-animation">
                <?php 

                $this->add_render_attribute( 'icon_list', 'class', 'elementor-icon-list-items' );
                $this->add_render_attribute( 'list_item', 'class', 'elementor-icon-list-item' );

                if ( 'inline' === $settings['view'] ) {
                    $this->add_render_attribute( 'icon_list', 'class', 'elementor-inline-items' );
                    $this->add_render_attribute( 'list_item', 'class', 'elementor-inline-item' );
                }
                ?>
                <ul <?php echo ale_return_esc($this->get_render_attribute_string( 'icon_list' )); ?>>
                    <?php
                    foreach ( $settings['icon_list'] as $index => $item ) :
                        $repeater_setting_key = $this->get_repeater_setting_key( 'text', 'icon_list', $index );

                        $this->add_render_attribute( $repeater_setting_key, 'class', 'ale-icon-text-content elementor-icon-list-text' );

                        $this->add_inline_editing_attributes( $repeater_setting_key );
                        ?>
                        <li class="elementor-icon-list-item" >
                            <?php
                            if ( ! empty( $item['link']['url'] ) ) {
                                $link_key = 'link_' . $index;

                                $this->add_render_attribute( $link_key, 'href', $item['link']['url'] );

                                if ( $item['link']['is_external'] ) {
                                    $this->add_render_attribute( $link_key, 'target', '_blank' );
                                }

                                if ( $item['link']['nofollow'] ) {
                                    $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                }

                                echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
                            }

                            if ( ! empty( $item['icon'] ) ) :
                                ?>
                                <span class="elementor-icon-list-icon">
                                    <i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
                                </span>
                            <?php endif; ?>
                            <span <?php echo ale_return_esc($this->get_render_attribute_string( $repeater_setting_key )); ?>><?php echo esc_html($item['text'], 'elli'); ?></span>
                            <?php if ( ! empty( $item['link']['url'] ) ) : ?>
                                </a>
                            <?php endif; ?>
                        </li>
                        <?php
                    endforeach;
                ?>
            </ul>
        </div>
        <?php endif; 
        if(is_array($ale_items) && !empty($ale_items) && $ale_list_style == 'style3'): ?>
            <div class="header-list-wrapper fade-animation">
                <ul class="header-list-ul">
                <?php foreach($ale_items as $item): ?>
                    <?php  
                        $ale_item = $item['item'];
                    ?>
                    <?php if( !empty ($ale_item)) : ?>
                       <li><?php echo esc_html($ale_item) ;?></li>
                    <?php endif ?>
                <?php  endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php
    }

    protected function _content_template() { }
}