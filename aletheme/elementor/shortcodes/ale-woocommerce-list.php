<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Woocommerce_List extends Widget_Base {

    public function get_name() {
        return 'ale-woocommerce-products';
    }

    public function get_title() {
        return esc_html__( 'Elli Woocommerce Products', 'elli' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {

        // Content Controls
        $this->start_controls_section(
            'wc_content',
            [
                'label' => esc_html_x( 'WooCommerce Products','Admin Panel','elli' )
            ]
        ); 

        $this->add_control(
            'cat_slugs',
            [
                'label'       => esc_html_x( 'Categories', 'Admin Panel','elli' ),
                'description' => esc_html_x('Filter the posts by selected categories.', 'Admin Panel','elli' ),
                'type'        =>  Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => ale_get_woo_product_categories_slugs(),
                'label_block' => true,
            ]
         
        ); 

        $this->add_control(
            'columns',
            [
                'label'     => esc_html_x( 'Layout', 'Admin Panel','elli' ),
                'description' => esc_html_x('Column layout for the list', 'Admin Panel','elli' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "4",
                "options"    => array(
                    "1" => "1",
                    "2" => "2",                                                 
                    "3" => "3",                                                 
                    "4" => "4",
                ),              
            ]
         
        );
 
        $this->add_control(
            'orderby',
            [
                'label'     => esc_html_x( 'List Order By', 'Admin Panel','elli' ),
                'description' => esc_html_x('Sorts the posts by this parameter', 'Admin Panel','elli' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "date",
                "options"    => array(
                    'date' => esc_html_x('Date',"Admin Panel","elli"),
                    'author' => esc_html_x('Author',"Admin Panel","elli"),
                    'title' => esc_html_x('Title',"Admin Panel","elli"),
                    'modified' => esc_html_x('Modified',"Admin Panel","elli"),
                    'ID' => esc_html_x('ID',"Admin Panel","elli"),
                    'rand' => esc_html_x('Randomized',"Admin Panel","elli"),
                )                           
            ]
         
        ); 


        $this->add_control(
            'order',
            [
                'label'     => esc_html_x( 'List Order', 'Admin Panel','elli' ),
                'description' => esc_html_x('Designates the ascending or descending order of the list_orderby parameter', 'Admin Panel','elli' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "DESC",
                "options"    => array(
                    "DESC" => esc_html_x('Descending',"Admin Panel","elli"),
                    "ASC" => esc_html_x('Ascending',"Admin Panel","elli"),
                )                           
            ]
         
        ); 

        $this->add_control(
            'per_page',
            [
                'label'   => esc_html_x("Products Count", 'Admin Panel','elli'),
                'type'    =>  Controls_Manager::NUMBER, 
                'default' => 9,
                'min'     => 1,
                'max'     => 300,        
            ]
        ); 

        $this->add_control(
            'pagination',
            [
                'label'     => esc_html_x( 'Pagination', 'Admin Panel','elli' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  "false",
                "options"   => array(
                    "true"  =>  esc_html_x( 'Pagination on', 'Admin Panel','elli' ),
                    "false" =>  esc_html_x( 'Pagination off', 'Admin Panel','elli' ),
                ),              
            ]
        );
    
        $this->end_controls_section();      
    }

    protected function render( ) {
        $settings   = $this->get_settings(); 
        $categories = is_array(  $settings["cat_slugs"] ) && ! empty( $settings["cat_slugs"] ) ? implode(",", $settings["cat_slugs"]) : "";
        $shortcode  = sprintf('[products columns="%s" category="%s" orderby="%s" order="%s" limit="%s" paginate="%s"]', $settings["columns"], $categories, $settings["orderby"], $settings["order"], $settings["per_page"], $settings["pagination"]); ?>
        <div class="alewoo-products-container">
        <?php echo do_shortcode($shortcode); ?>
        </div>
        <?php 
    }

    protected function content_template() {
    }
}