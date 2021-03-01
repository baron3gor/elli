<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Ale_Woo_Masonry_Widget extends Widget_Base {

    public function get_name() {
        return 'ale-projects';
    }

    public function get_title() {
        return esc_html__( 'Elli Woocommerce Masonry', 'elli' );
    }

    public function get_icon() {
        return 'eicon-gallery-masonry';
    }

    public function get_categories() {
        return [ 'elli-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Elli Products', 'elli'),
            ]
        );

        $this->add_control(
            'product_count', [
                'label' => __( 'Product count', 'elli' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 12,
                'step' => 1,
                'default' => 8,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'ale_woo_product',
            [
                'label'    => esc_html__( 'Select Product', 'elli' ),
                'type'     => Controls_Manager::SELECT2,
                'options'  => ale_product_massonry(),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'image', [
                'label' => __( 'Choose Image', 'elli' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'woo_list',
            [
                'label' => __( 'Product List', 'elli' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        

        $this->end_controls_section();
	}

    protected function render( ) {

        global $product;

        $settings      = $this->get_settings();
        $ale_products  = $settings['woo_list']; 
        $ale_woo_count = $settings['product_count'];
        $ale_max_page  = ceil(count($ale_products) / $ale_woo_count);

        wp_enqueue_script('jquery-masonry');
        wp_localize_script( 'ale-restaurant-sort', 'alewoomasonry', $ale_products );

        if ( class_exists( 'woocommerce' )) {
            $ale_woo_list = array_slice($ale_products, 0, $ale_woo_count); ?>
            <div class="ale-woocom-masonry-container">
                <div class="ale-woocom-masonry" data-maxpage="<?php echo esc_attr($ale_max_page, 'elli'); ?>" data-current="1" data-count="<?php echo esc_attr($ale_woo_count, 'elli'); ?>">
                    <div class="ale-woocom-masonry-wrapper grid">
                        <?php foreach ($ale_woo_list as $ale_product) : ?>
                            <?php   $ale_product_ID       = ale_check_productid($ale_product['ale_woo_product']);
                                    $ale_get_title        = get_the_title($ale_product_ID);
                                    $ale_get_product_byID = wc_get_product($ale_product_ID);
                                    $ale_cats             = wc_get_product_cat_ids($ale_product_ID);
                                    $ale_num_cats         = count($ale_cats);
                                    $ale_img_alt          = get_post_meta($ale_product['image']['id'], '_wp_attachment_image_alt', true);
                                    $i                    = 0 ; ?>
                            <div class="ale-gutter-shop"></div>
                            <div class="ale-grid-shop-sizer"></div>
                            <?php if(!empty($ale_product_ID)) : ?>
                                <div class="ale-woocom-item-wrapper ale-shop-grid">
                                    <div class="fade-animation ale-init-animation">
                                        <?php if(!empty($ale_product['image']['url'])) : ?>    
                                            <div class="ale-woocom-img-wrapper fade-image">
                                                <a class="ale-woocom-product-img" href="<?php echo esc_url(get_permalink( $ale_product_ID), 'elli'); ?>">
                                                    <img src="<?php echo esc_url($ale_product['image']['url'], 'elli'); ?>" alt="<?php echo esc_attr($ale_img_alt, 'elli'); ?>">                    
                                                    <?php if($ale_get_product_byID->is_on_sale()) : ?>
                                                        <span class="ale-woocom-onsale-wrapper animate-fade"><span class="onsale"><?php echo esc_html('sale', 'elli'); ?></span></span>
                                                    <?php endif; ?>
                                                    <?php if(!$ale_get_product_byID->is_in_stock()) : ?>
                                                        <span class="ale-woocom-sold-wrapper animate-fade"><span class="sold"><?php echo esc_html('sold', 'elli'); ?></span></span>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <h6><?php foreach ($ale_cats as $ale_cat) {
                                                if(++$i == $ale_num_cats) {
                                                    echo ale_get_category_byID($ale_cat);
                                                } else {
                                                    echo esc_html( ale_get_category_byID($ale_cat) . ', ', 'elli'); }} ?>
                                        </h6>
                                        <h5 ><a href="<?php echo esc_url(get_permalink( $ale_product_ID), 'elli'); ?>"><?php echo esc_html($ale_get_product_byID->get_name(), 'elli') ?></a></h5>
                                        <span class="price"><?php echo ale_wp_kses($ale_get_product_byID->get_price_html(), 'elli'); ?></span>
                                        <div class="alewoo-btn"><?php ale_get_add_to_cart_btn($ale_get_product_byID) ;?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php 
    }

    protected function _content_template() { }
}
?>