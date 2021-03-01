<?php
class ale_global {

    //generate unique_ids
    private static $ale_unique_counter = 0;

    static function ale_generate_unique_id() {
        self::$ale_unique_counter++;
        return 'ale_uid_' . self::$ale_unique_counter . '_' . uniqid();
    }

    // Demo and plugins list
    public static $ale_demo_list = array ();
    public static $ale_plugins_list = array();

    static $ale_options;
}

//Demos Base
ale_global::$ale_demo_list = array (
    'ellitheme' => array(
        'text' => 'Elli Theme',
        'folder' => get_template_directory() . '/aletheme/demos/elli/',
        'demo_url' => ALETHEME_DEMOS_HOST,
        'category' => array('all','micro-niche'),
        'date-create' => '2020-11-1',
        'demo_preview' => ALETHEME_DEMOS_HOST .'demopreview/ellinowoo.jpg',
        'required_plugins' => array('cpt-elli','contact-form-7','elementor', 'redux-framework')
    ),
    'elliwoo' => array(
        'text' => 'Elli Theme + Woocommerce',
        'folder' => get_template_directory() . '/aletheme/demos/elli-woo/',
        'demo_url' => ALETHEME_DEMOS_HOST,
        'category' => array('all','micro-niche', 'shop'),
        'date-create' => '2020-11-2',
        'demo_preview' => ALETHEME_DEMOS_HOST .'demopreview/ellipreload.jpg',
        'required_plugins' => array('cpt-elli','contact-form-7','woocommerce','elementor', 'redux-framework')
    ),
);

ale_global::$ale_plugins_list = array(
    'woocommerce' => array(
        'name'=>'WooCommerce',
        'location'=>'wp_repo',
        'slug'=>'woocommerce'
    ),
    'cpt-elli' => array(
        'name'=>'Elli Core',
        'location'=>'bundled',
        'slug'=>'cpt-elli',
        'source' => ALETHEME_THEME_URL . '/plugins/cpt-elli.zip'
    ),
    'contact-form-7' => array(
        'name'=>'Contact Form 7',
        'location'=>'wp_repo',
        'slug'=>'contact-form-7'
    ),
    'redux-framework' => array(
        'name' => 'Redux Framework',
        'location'=>'wp_repo',
        'slug'=>'redux-framework',
    ),
    'elementor' => array(
        'name'=>'Elementor',
        'location'=>'wp_repo',
        'slug'=>'elementor'
    ),
);