<?php if ( ! defined( 'ABSPATH' ) ) exit;

class ale_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */

     
	public static $_instance;

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){
		add_action('elementor/init', array($this, 'ale_elementor_init'));
        add_action('elementor/widgets/widgets_registered', array($this, 'ale_shortcode_elements'));
        add_action('elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ));
	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */
    
     public function enqueue_scripts() {
       wp_enqueue_script( 'ale-main-elementor', ALETHEME_THEME_URL . '/js/elementor.js',array( 'jquery', 'elementor-frontend' ), ALETHEME_THEME_VERSION, true );              
    }

    

	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function ale_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'elli-elements',
            [
                'title' => esc_html__( 'Elli', 'elli' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    public function ale_shortcode_elements($widgets_manager){
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-image-sign.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-heading.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-image-box.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-button.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-menu-item.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-stats.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-team.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-partners.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-sidebar.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-list.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-skills.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-gallery.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-blog-list.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-google-maps.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-opentable.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-woocommerce-list.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-social-links.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-menu-list.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-image.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-menu-slider.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-video.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-dot-bg.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-text-editor.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-woocommerce-masonry.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-header-slider.php');
        require_once (ALETHEME_PATH. '/elementor/shortcodes/ale-quote-slider.php');


        $widgets_manager->register_widget_type(new Elementor\Ale_Image_Signature_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Heading_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Image_Box_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Button_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Menu_Item_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Stats());
        $widgets_manager->register_widget_type(new Elementor\Ale_Team_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Partner_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Sidebar());
        $widgets_manager->register_widget_type(new Elementor\Ale_List());
        $widgets_manager->register_widget_type(new Elementor\Ale_Skills());
        $widgets_manager->register_widget_type(new Elementor\Ale_Menu_List());
        $widgets_manager->register_widget_type(new Elementor\Ale_Gallery_Widget_Two());
        $widgets_manager->register_widget_type(new Elementor\Ale_Post_List_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Google_Maps());
        $widgets_manager->register_widget_type(new Elementor\Ale_Open_Table());
        $widgets_manager->register_widget_type(new Elementor\Ale_Woocommerce_List());
        $widgets_manager->register_widget_type(new Elementor\Ale_Social_Links_Widget());
        $widgets_manager->register_widget_type(new Elementor\ale_Widget_Image());
        $widgets_manager->register_widget_type(new Elementor\ale_Menu_Slider_Widget());
        $widgets_manager->register_widget_type(new Elementor\ale_Widget_Video());
        $widgets_manager->register_widget_type(new Elementor\Ale_Dot_Bg_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Widget_Text_Editor());
        $widgets_manager->register_widget_type(new Elementor\Ale_Woo_Masonry_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Header_Slider_Widget());
        $widgets_manager->register_widget_type(new Elementor\Ale_Quote_Slider_Widget());
    }
    
	public static function ale_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new ale_Shortcode();
        }
        return self::$_instance;
    }

}
$ale_Shortcode = ale_Shortcode::ale_get_instance();
