<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Menu_List extends Widget_Base {

    public function get_name() {
        return 'ale-menu-list';
    }

    public function get_title() {
        return esc_html__( 'Elli Menu List', 'elli' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Menu List', 'elli'),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'elli'),
                    'style2' => esc_html__('Style 2', 'elli'),
                    'style3' => esc_html__('Style 3', 'elli'),
                ],
            ]
        );

        $this->add_control(
            'position_tab', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Select Tab Position', 'elli'),
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Left', 'elli'),
                    'right' => esc_html__('Right', 'elli'),
                ],
            ]
        );

        $this->add_control(
            'menu_items_width', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Menu Items Width', 'elli'),
                'default' => 'adapt',
                'options' => [
                    'adapt' => esc_html__('Adaptive', 'elli'),
                    'full' => esc_html__('Full', 'elli'),
                ],
                'condition' => [
                    'style' => ['style1', 'style2'],
                ],
            ]
        );

        $this->add_control(
            'menualign', [
                'label' => esc_html__('Menu Align', 'elli'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left'       => [
                        'title'  => esc_html__( 'Left', 'elli' ),
                        'icon'   => 'fa fa-align-left',
                    ],

                    'right'       => [
                        'title'  => esc_html__( 'Right', 'elli' ),
                        'icon'   => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'condition' => [
                    'style' => ['style1'],
                ],
            ]
        );

        $this->add_control(
            'columnsmas', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Select the Number of Columns', 'elli'),
                'default' => 'two',
                'options' => [
                    'one' => esc_html__('One Column', 'elli'),
                    'two' => esc_html__('Two Columns', 'elli'),
                    'three' => esc_html__('Three Columns', 'elli'),
                ],
                'condition' => [
                    'style'   =>  ['style3'],
                ],
            ]
        );

        $this->add_control(
            'menuitems',
            [
                'label' => esc_html__('Menu Items', 'elli'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'fields' => [
                    [
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [
                        'name'          => 'image',
                        'label'         => esc_html__('Image', 'elli'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [  
                        'name'     => 'term',
                        'label'    => esc_html__( 'Select category', 'elli' ),
                        'type'     => Controls_Manager::SELECT2,
                        'multiple' => true,
                        'options'  => ale_taxonomy_list('restaurant-menu-category'),
                        'default'  => '0',
                        'label_block' => true,
                    ],
                ],
                'condition' => [
                    'style'   =>  ['style1'],
                ],
            ]
        );


        $this->add_control(
            'menugallery',
            [
                'label' => esc_html__('Menu Items', 'elli'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'fields' => [

                    [
                        'name' => 'galleryimages',
                        'label' => esc_html__('Gallery Images', 'elli'),
                        'type' => Controls_Manager::GALLERY,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'galleryalign',
                        'label' => esc_html__('Gallery Align', 'elli'),
                        'type' => Controls_Manager::CHOOSE,
                        'options' => [
                            'left'       => [
                                'title'  => esc_html__( 'Left', 'elli' ),
                                'icon'   => 'fa fa-align-left',
                            ],

                            'right'       => [
                                'title'  => esc_html__( 'Right', 'elli' ),
                                'icon'   => 'fa fa-align-right',
                            ],
                        ],
                        'default' => 'left',
                    ],

                    [
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [
                        'name'          => 'description',
                        'label'         => esc_html__('Description', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::WYSIWYG,
                    ],

                    [  
                        'name'     => 'term',
                        'label'    => esc_html__( 'Select category', 'elli' ),
                        'type'     => Controls_Manager::SELECT,
                        'multiple' => true,
                        'options'  => ale_taxonomy_list('restaurant-menu-category'),
                        'default'  => '0',
                        'label_block' => true,
                    ],


                    [
                        'name' => esc_html__('dots_bg_opt', 'elli'),
                        'label' => __( 'Dots Background Options', 'elli' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ],


                    [
                        'name'  => 'show_dots',
                        'label' => __( 'Show Dots Background', 'elli' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'elli' ),
                        'label_off' => esc_html__( 'Hide', 'elli' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ],

                    
                    [
                        'name'  => 'dotswidth',
                        'label' => __( 'Dots Background Max Width', 'elli' ),
                        'type' => Controls_Manager::NUMBER,
                        'condition' => [
                            'show_dots'   =>  ['yes'],
                        ],
                    ],

                    [
                        'name'  => 'dotsheight',
                        'label' => __( 'Dots Background Max Height', 'elli' ),
                        'type' => Controls_Manager::NUMBER,
                        'condition' => [
                            'show_dots'   =>  ['yes'],
                        ],
                    ],

                    [
                        'name'  => 'dotscolor',
                        'label' => esc_html__( 'Dots Color', 'elli' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'condition' => [
                            'show_dots'   =>  ['yes'],
                        ],
                    ],

                    [
                        'name'  => 'dotsposition',
                        'label' => __( 'Dots Background Position', 'elli' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'allowed_dimensions' => ['top', 'left'],
                        'default' => [
                            'unit' => 'px',
                        ],
                        'condition' => [
                            'show_dots'   =>  ['yes'],
                        ],
                    ],
                ],
                'condition' => [
                    'style'   =>  ['style2'],
                ],
            ]
        );


        $this->add_control(
            'menumas',
            [
                'label' => esc_html__('Menu Items', 'elli'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'fields' => [
                   
                    [
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'elli'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [  
                        'name'     => 'term',
                        'label'    => esc_html__( 'Select category', 'elli' ),
                        'type'     => Controls_Manager::SELECT2,
                        'multiple' => true,
                        'options'  => ale_taxonomy_list('restaurant-menu-category'),
                        'default'  => '0',
                        'label_block' => true,
                    ],
                ],
                'condition' => [
                    'style'   =>  ['style3'],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'bgoptions',
            [
                'label' => esc_html__('Background Options', 'elli'),
                'condition' => [
                    'style' => ['style1'],
                ],
            ]            
        );

        $this->add_control(
            'st1_dots_head',
            [
                'label' => __( 'Dots Background Options', 'elli' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'st1_dots',
            [
                'label' => __( 'Show Dots Background', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'elli' ),
                'label_off' => esc_html__( 'Hide', 'elli' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'style' => ['style1'],
                ],                
            ]
        );

        $this->add_control(
            'st1_dots_width',
            [
                'label' => __( 'Dots Background Max Width', 'elli' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'st1_dots' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'st1_dots_height',
            [
                'label' => __( 'Dots Background Max Height', 'elli' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'st1_dots' => ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'st1_dots_color',
            [
                'label' => __( 'Dots Color', 'elli' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'background: radial-gradient(circle, {{VALUE}} 12.8%, transparent 13%); background-size: 21px 21px; background-position: 0;',
                ],
                'condition' => [
                    'st1_dots'   =>  ['yes'],
                ],
            ]
        );

        $this->add_control(
            'st1_dots_position',
            [
                'label' => __( 'Dots Background Position', 'elli' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'allowed_dimensions' => ['top', 'left'],
                'default' => [
                    'unit' => 'px',
                ],
                'condition' => [
                    'st1_dots'   =>  ['yes'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ale-dott-bg' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Menu Style Options
        $this->start_controls_section(
            'section_title_style', [
                'label'  => esc_html__( 'Separator Lines Color', 'elli' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'lines_color', [
                'label'      => esc_html__( 'Separator lines color', 'elli' ),
                'type'       => Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .elli-tabs-wrapper-menu' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .menu-item-separator'    => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render( ) {
        $settings        = $this->get_settings();
        $style           = $settings['style'];
        $ale_tab_posa    = $settings['position_tab'];
        $ale_ms_cols     = $settings['columnsmas'];
        $ale_items_width = $settings['menu_items_width'];
        $ale_menu_align  = $settings['menualign'];
        $ale_check_ids   = [];

        if($style == 'style1') :
            $ale_restaurant_tabs = $this->get_settings_for_display( 'menuitems' );
        elseif($style == 'style2') : 
            $ale_restaurant_tabs = $this->get_settings_for_display( 'menugallery' );
        else : 
            $ale_restaurant_tabs = $this->get_settings_for_display( 'menumas' );
        endif; 

        foreach ($ale_restaurant_tabs as $index => $item) {
            $ale_tabid = $item['_id'];
            array_push($ale_check_ids, $ale_tabid);
        } ?>
        
        <div class="elli-tabs-container" role="tablist">
            <?php if(!empty($ale_restaurant_tabs)) : ?>
                <div class="elli-tabs-wrapper-menu<?php if($ale_tab_posa == 'right') : echo esc_attr(' menu-right-tabs', 'elli'); endif; ?>">
                <?php if($style == 'style2') : ?>
                <div class="elli-tabs-menu current elli-tabs-all fade-animation" data-tab='0'><h6><?php echo esc_html('All', 'elli') ?></h6></div><?php endif;
                    foreach ( $ale_restaurant_tabs as $index => $item ) : ?>
                        <div class="elli-tabs-menu fade-animation<?php if($style != 'style2' && $ale_check_ids[0] === $item['_id']) : echo esc_attr(' current', 'elli'); endif; ?>" data-tab='<?php echo esc_attr($item['_id'], 'elli'); ?>'><h6><?php echo esc_attr($item['title']) ?></h6></div>
                    <?php endforeach;?>
                </div>
            <?php endif; ?>
            <div class="elli-tabs-content-wrapper<?php if($style == 'style3') : echo esc_attr(' elli-menu-grid elli-menu-wrapper-container'); endif; ?>">
                <?php foreach ($ale_restaurant_tabs as $index => $item) :
                    $ale_cat        = $item['term'];
                    $ale_img_cat    = !empty($item['image']['url']) ? $item['image']['url'] : '';
                    $ale_alt        = !empty($item['image']['url']) ? get_post_meta($item['image']['id'], '_wp_attachment_image_alt', true) : '';
                    $ale_m_title    = !empty($item['title']) ? $item['title'] : '';
                    $ale_m_descr    = !empty($item['description']) ? $item['description'] : '';
                    $dataID         = array();
                    $ale_galleryArr = !empty($item['galleryimages']) ? $item['galleryimages'] : '';
                    $ale_gallaryIds = json_encode($ale_galleryArr);   
                    $ale_item_ID    = $item['_id'];
                    $ale_gallery_al = !empty($item['galleryalign']) ? $item['galleryalign'] : '';
                    $ale_dots_show  = '';
                    if($style == 'style2') {
                        $ale_dots_show = !empty($item['show_dots']) ? $item['show_dots'] : '';
                    } elseif($style == 'style1') {
                        $ale_dots_show = !empty($settings['st1_dots']) ? $settings['st1_dots'] : '';
                    }
                    $ale_dots_color  = !empty($item['dotscolor']) ? $item['dotscolor'] : '';
                    $ale_dots_width  = !empty($item['dotswidth']) ? $item['dotswidth'] : '';
                    $ale_dots_height = !empty($item['dotsheight']) ? $item['dotsheight'] : '';
                    $ale_dots_top    = !empty($item['dotsposition']['top']) ? $item['dotsposition']['top'] : '';
                    $ale_dots_left   = !empty($item['dotsposition']['left']) ? $item['dotsposition']['left'] : '';
                    $ale_dots_unit   = !empty($item['dotsposition']['unit']) ? $item['dotsposition']['unit'] : '';

                    $ale_restaurant_args = array(
                        'title'        => $ale_m_title,
                        'descr'        => $ale_m_descr,
                        'cat'          => $ale_cat,
                        'img'          => $ale_img_cat,
                        'alt'          => $ale_alt,
                        'tabid'        => $ale_item_ID,
                        'style'        => $style,
                        'iwidth'       => $ale_items_width,
                        'gallery'      => $ale_gallaryIds,
                        'cols'         => $ale_ms_cols,
                        'galleryalign' => $ale_gallery_al,
                        'menualign'    => $ale_menu_align,
                        'dotsshow'     => $ale_dots_show,
                        'dotscolor'    => $ale_dots_color,
                        'dotswidth'    => $ale_dots_width,
                        'dotsheight'   => $ale_dots_height,
                        'dotstop'      => $ale_dots_top,
                        'dotsleft'     => $ale_dots_left,
                        'dotsunit'     => $ale_dots_unit,
                    );                    

                    wp_localize_script( 'ale-restaurant-sort', 'alefoodtab_' . $ale_item_ID, $ale_restaurant_args ); 

                    if($ale_dots_width != '' || $ale_dots_height != '' || $ale_dots_top != '' || $ale_dots_color != '' || $ale_dots_left != '') {
                        $ale_dotsstyle  = 'style="';
                        $ale_dotsstyle .= $ale_dots_width != '' ? 'width: ' . $ale_dots_width . 'px; ' : '';
                        $ale_dotsstyle .= $ale_dots_height != '' ? 'height: ' . $ale_dots_height . 'px; ' : '';
                        $ale_dotsstyle .= $ale_dots_top != '' ? 'top: ' . $ale_dots_top . $ale_dots_unit . ';' : '';
                        $ale_dotsstyle .= $ale_dots_color != '' ? 'background: radial-gradient(' . $ale_dots_color . ',12.8%,transparent 13%); background-size: 21px 21px;' : '';
                        $ale_dotsstyle .= $ale_dots_left != '' ? 'left: ' . $ale_dots_left . $ale_dots_unit . ';' : '';
                        $ale_dotsstyle .= '"';
                    } ?>    

                    <?php if($style == 'style1' || $style == 'style2') : ?>
                        <div class="elli-tab-descr<?php if($style != 'style2' && $ale_check_ids[0] === $item['_id']) : echo esc_attr(' current', 'elli'); elseif($style == 'style2') : echo esc_attr(' current', 'elli'); endif; ?><?php if($style == 'style2') : echo esc_attr(' tab-descr-gallery', 'elli'); elseif($style == 'style1') : echo esc_attr(' tab-descr-classic', 'elli'); endif; ?>" data-tab="<?php echo esc_attr($ale_item_ID, 'elli') ; ?>" <?php if($style == 'style2') : echo ale_wp_kses('data-gallery-align="' . esc_attr($ale_gallery_al, 'elli') . '"'); endif; ?>>  
                    <?php endif; ?>    

                        <?php switch ($style) {
                            case 'style1':
                                require ALETHEME_PATH. '/elementor/shortcodes/style/menulist-style/style1.php';
                                break;

                            case 'style2':
                                require ALETHEME_PATH. '/elementor/shortcodes/style/menulist-style/style2.php';
                                break;

                            case 'style3':
                                require ALETHEME_PATH. '/elementor/shortcodes/style/menulist-style/style3.php';
                                break;
                            case 'style4':
                                require ALETHEME_PATH. '/elementor/shortcodes/style/menulist-style/style4.php';
                                break;
                        } ?>   
                    <?php if($style == 'style1' || $style == 'style2') : ?>  
                        </div>
                    <?php endif; ?>              
                <?php endforeach; ?>
            </div>
        </div>

    <?php wp_reset_postdata();
    }

    protected function _content_template() {  }
}
?>