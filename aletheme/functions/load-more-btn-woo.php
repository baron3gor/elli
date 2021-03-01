<?php
/**
 * Javascript for Load More Woocommerce
 *
 */
function ale_load_more_woo_js() {

	$args = array(
		'nonce'       => wp_create_nonce( 'ale-load-more-nonce-woo' ),
		'url'         => admin_url( 'admin-ajax.php' ),
		'button_text' => esc_html__( 'Load More', 'elli' ),
	);


	wp_enqueue_script( 'ale-load-more-woo',
		get_stylesheet_directory_uri() . '/js/libs/load-more-woo.js',
		array( 'jquery' ),
		'1.0',
		true );

	wp_localize_script( 'ale-load-more-woo', 'aleloadmorewoo', $args );

}

add_action( 'wp_enqueue_scripts', 'ale_load_more_woo_js' );

/**
 * AJAX Load More
 *
 */
function ale_ajax_load_more_woo() {
	check_ajax_referer( 'ale-load-more-nonce-woo', 'nonce' );

	global $products;

	$ale_products  = $_POST['wooarray'];
	$ale_woo_count = $_POST['count'];
	$ale_current   = $_POST['current'];
	$ale_start_woo = $ale_woo_count * $ale_current;
	$ale_woo_list  = array_slice($ale_products, $ale_start_woo, $ale_woo_count, true);

	ob_start(); ?>
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
                <h5 ><a href="<?php echo esc_url(get_permalink( $ale_product_ID), 'elli'); ?>"><?php echo esc_html($ale_get_product_byID->name, 'elli') ?></a></h5>
                <span class="price"><?php echo ale_wp_kses($ale_get_product_byID->get_price_html(), 'elli'); ?></span>
                <div class="alewoo-btn"><?php ale_get_add_to_cart_btn($ale_get_product_byID) ;?></div>
            </div>
        </div>
    <?php endforeach; ?>
	
	<?php wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_load_more_woo', 'ale_ajax_load_more_woo' );
add_action( 'wp_ajax_nopriv_ale_ajax_load_more_woo', 'ale_ajax_load_more_woo' );