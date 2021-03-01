<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Post_List_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'ale-blog-list';
    }

    public function get_title() {
        return esc_html__( 'Elli Blog List', 'elli' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        global $wp_registered_sidebars;

        $options = [];

        if ( ! $wp_registered_sidebars ) {
            $options[''] = __( 'No sidebars were found', 'elli' );
        } else {
            foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
                $options[ $sidebar_id ] = $sidebar['name'];
            }
        }

        $this->start_controls_section(
            'section_sidebar',
            [
                'label' => __( 'Sidebar', 'elli' ),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'elli'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Right Sidebar', 'elli'),
                    'style2' => esc_html__('Left Sidebar', 'elli'),
                    'style3' => esc_html__('No Sidebar', 'elli'),
                ],
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label'   => esc_html__( 'Post Count', 'elli' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => esc_html__( '6', 'elli' ),

            ]
        );

        $this->add_control(
            'show_exc',
            [
                'label' => __( 'Display Excerpt', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'description'   => esc_html__( 'Customize the excerpt length. Leave blank for the default value.', 'elli' ),
                'label'         => esc_html__( 'Excerpt Length', 'elli' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '120', 'elli' ),
                'condition' => [
                    'show_exc' => 'yes',
                ]
            ]
        );

        $this->add_control( 'sidebar', [
            'label' => __( 'Choose Sidebar', 'elli' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'blog-sidebar',
            'options' => $options,
            'condition' => [
                'style'   =>  ['style1', 'style2'],
            ],
        ]);

        $this->add_control(
            'blog_cols',
            [
                'label' => __( 'Number of Columns for Grid Layout', 'elli' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'two' => __( '2', 'elli' ),
                    'three'  => __( '3', 'elli' ),
                ],
                'default' => 'three',
                'condition' => [
                    'style' => ['style3'],
                ],
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __( 'Pagination Style', 'elli' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'loadmore' => __( 'Load More', 'elli' ),
                    'pag'  => __( 'Classic Pagination', 'elli' ),
                ],
                'default' => 'loadmore',
            ]
        );

        $this->add_control(
            'listorder',
            [
                'label' => __( 'Default List Order By', 'elli' ),
                'description'   => esc_html__( 'Default sorts the posts by this parameter', 'elli' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'date' => __( 'Date', 'elli' ),
                    'author'  => __( 'Author', 'elli' ),
                    'title'  => __( 'Title', 'elli' ),
                    'modified'  => __( 'Modified', 'elli' ),
                    'type'  => __( 'Type', 'elli' ),
                ],
                'default' => 'date',
            ]
        );

        $this->add_control(
            'style_layout',
            [
                'label' => __( 'Default Layout Style', 'elli' ),
                'description'   => esc_html__( 'Default Layout the posts by this parameter', 'elli' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'list' => __( 'List', 'elli' ),
                    'grid'  => __( 'Grid', 'elli' ),
                ],
                'default' => 'list',
            ]
        );

        $this->add_control(
            'show_image',
            [
                'label' => __( 'Display Image / Media', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_category',
            [
                'label' => __( 'Display Category', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_separator',
            [
                'label' => __( 'Display Separator Line', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_author',
            [
                'label' => __( 'Display Post Author', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_comment',
            [
                'label' => __( 'Display Comment Numbers', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_likes',
            [
                'label' => __( 'Display Likes Number', 'elli' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'ON', 'elli' ),
                'label_off' => __( 'OFF', 'elli' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {
        $sidebar  = $this->get_settings_for_display( 'sidebar' );
        $settings = $this->get_settings();
        $widgetID = $this->get_id();

        global $paged, $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp, $wp_query;

        $ale_pag_style  = $settings['pagination'];
        $ale_post_count = $settings['post_count'];
        $ale_length_exc = $settings['excerpt_length'];
        $ale_orderby    = $settings['listorder'];
        $ale_layout     = $settings['style_layout'] == 'list' ? $ale_layout = 0 : $ale_layout = 1;
        if(isset($_SESSION['blogstyle' . $widgetID])) {
            $ale_tab_id = esc_html($_SESSION['blogstyle' . $widgetID]);
        } else {
            $ale_tab_id = $ale_layout;
        }
        if(isset($_SESSION['blogsort' . $widgetID])) {
            $ale_sort_opt = esc_html($_SESSION['blogsort' . $widgetID]);
        } else {
            $ale_sort_opt = $ale_orderby;
        }
        $ale_blog_style  = $settings['style'];
        $ale_cols_number = $settings['blog_cols'];
        $ale_select_date = 'date';
        $ale_select_auth = 'author';
        $ale_select_titl = 'title';
        $ale_select_modi = 'modified';
        $ale_select_type = 'type';
        $ale_show_exc    = ale_get_value($settings['show_exc']);
        $ale_show_media  = ale_get_value($settings['show_image']);
        $ale_show_cat    = ale_get_value($settings['show_category']);
        $ale_show_auth   = ale_get_value($settings['show_author']);
        $ale_show_comm   = ale_get_value($settings['show_comment']);
        $ale_show_likes  = ale_get_value($settings['show_likes']);
        $ale_show_sepp   = ale_get_value($settings['show_separator']);

         $ale_nonstickyIDs = get_posts(array(
            'fields'          => 'ids', // Only get post IDs
            'posts_per_page'  => -1,
            'orderby'         => $ale_sort_opt,
            'post__not_in'        =>  get_option( 'sticky_posts' )
        ));

        $ale_stickyID = get_posts(array(
            'fields'          => 'ids', // Only get post IDs
            'posts_per_page'  => -1,
            'orderby'         => $ale_sort_opt,
            'post__in'        =>  get_option( 'sticky_posts' )
        ));

        $ale_getPosts = array_merge ($ale_stickyID, $ale_nonstickyIDs);


        if( $ale_pag_style == 'pag' ) {
            $paged = 1;
            if ( get_query_var('paged') ) $paged = get_query_var('paged');
            if ( get_query_var('page') ) $paged = get_query_var('page');
            $args = array(
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'orderby'          => 'post__in',
                'posts_per_page'   => $ale_post_count,
                'paged'            => $paged,
                'post__in'         => $ale_getPosts
            );

        } elseif($ale_pag_style == 'loadmore'){
            $args = array(
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'orderby'          => 'post__in',
                'posts_per_page'   => $ale_post_count,
                'post__in'         => $ale_getPosts
            );
        }

        $query        = new \WP_Query( $args );

        $ale_max_page = $query->max_num_pages;

        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_script('wp-mediaelement');

        switch ($ale_blog_style) {

            case 'style1':
                require ALETHEME_PATH. '/elementor/shortcodes/style/blog-style/style1.php';
                break;

            case 'style2':
                require ALETHEME_PATH. '/elementor/shortcodes/style/blog-style/style2.php';
                break;

            case 'style3':      
                require ALETHEME_PATH. '/elementor/shortcodes/style/blog-style/style3.php';
                break;
        }
    }

    protected function _content_template() {}

    public function render_plain_content() {}
}
