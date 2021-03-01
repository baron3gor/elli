<?php if (class_exists( 'woocommerce')) {

    /*
    *Declare WooCommerce support
    */

    add_action( 'after_setup_theme', 'woocommerce_support' );

    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }


    /*
    *Wrap the sale on archive page
    */

    function ale_sale_woo_wrapper(){
        global $post, $product;
        ?>
        <?php if ( $product->is_on_sale() ) : ?>

            <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="alewoo-onsale-wrapper animate-fade"><span class="onsale">' . esc_html__( 'Sale', 'elli' ) . '</span></span>', $post, $product ); ?>

        <?php endif;
    }



    /*
    *Get category
    */

    function ale_get_woo_cat() {
        global $product;
        echo '<h6>' . wc_get_product_category_list(get_the_ID()) . '</h6>';
    }



    /*
    * Change the title to h3
    */

    function ale_woo_content_title() {
        echo '<h5 class="woocommerce-loop-product_title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
    }


    /*
    * Change  single page title to h2
    */

    function ale_woo_content_title_single() {
        echo '<h4 class="woocommerce-loop-product_title">' . get_the_title() . '</h4>';
    }



    /*
    * Woocommerce position layout class
    */

    function ale_woo_layout_class() {
        global $ale_red_option;

        if($ale_red_option['woocommerce-sidebar-position'] == 'woo-left-sidebar'){
            echo esc_html('alewoo-left-sidebar-layout');
        } else {
            echo esc_html('alewoo-right-sidebar-layout');
        }
    }


    
    /*
    * Filter WooCommerce  Search Field
    */

    function ale_custom_product_searchform( $form ) {
        
        $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
                    <div class="alewoo-search-product-wrapper">
                        <label class="screen-reader-text" for="s">' . __( 'Search for:', 'elli' ) . '</label>
                        <input class="alewoo-search-field" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search products...', 'elli' ) . '" />     
                        <button class="alewoo-btn-searchform" type="submit" id="searchsubmit">
                                <span class="icon_search"></span>   
                        </button>  
                                              
                        <input type="hidden" name="post_type" value="product" />
                    </div>
                </form>';
        return $form;
    }



    /*
    *Display header container
    */

    function ale_woocommerce_header(){
        global $ale_red_option;
        $ale_bg_image          = '';
        $ale_page_global_image = '';
        $ale_header_image_2    = '';
        $ale_header_image_3    = '';

        ///Global optipn
        if(!empty($ale_red_option['elli-bg-header']['url'])) :
            $ale_page_global_image = $ale_red_option['elli-bg-header']['url'];
            $ale_mainImg_alt       = get_post_meta($ale_red_option['elli-bg-header']['id'], '_wp_attachment_image_alt', true);
        endif;
        if(!empty($ale_red_option['elli-bg-header2']['url'])) :
            $ale_header_image_2  = $ale_red_option['elli-bg-header2']['url'];
            $ale_img2_alt        = get_post_meta($ale_red_option['elli-bg-header2']['id'], '_wp_attachment_image_alt', true);
        endif;
        if(!empty($ale_red_option['elli-bg-header3']['url'])) :
            $ale_header_image_3  = $ale_red_option['elli-bg-header3']['url'];
            $ale_img3_alt        = get_post_meta($ale_red_option['elli-bg-header3']['id'], '_wp_attachment_image_alt', true);
        endif;

        $ale_page_title = get_the_title();

        //Page settings
        $ale_page_heading = ale_get_meta('banner_title');
        $ale_header_image = ale_get_meta('page_header');

        if(!empty($ale_red_option['elli-bg-header']['url']) || !empty($ale_red_option['elli-bg-header2']['url']) || !empty($ale_red_option['elli-bg-header3']['url'])){
            $ale_header_img_1 = ale_app_transform_img($ale_red_option['header-image-animation1']);
            $ale_header_img_2 = ale_app_transform_img($ale_red_option['header-image-animation2']);
            $ale_header_img_3 = ale_app_transform_img($ale_red_option['header-image-animation3']);
        }
        $ale_heading  = $ale_page_heading != '' ? $ale_page_heading : $ale_page_title;
        if ( $ale_header_image == '' ) {
            $ale_bg_image = $ale_page_global_image != '' ? $ale_page_global_image : '';
        } else {
            $ale_bg_image = $ale_header_image != '' ? $ale_header_image : '';
        } ?>
        <div>
            <div id="banner-area" class="banner-area ale-banner-area-wrapper">  
                <?php if(!empty($ale_header_image_2)) : ?>  
                    <div class="ale-bg-header-img2 ale-img-animation" <?php echo ale_wp_kses($ale_header_img_2, 'elli'); ?>><img src="<?php echo esc_url($ale_header_image_2, 'elli') ?>" alt="<?php echo esc_attr($ale_img2_alt, 'elli'); ?>"></div>
                <?php endif; ?>
                <?php if(!empty($ale_header_image_3)) : ?>
                    <div class="ale-bg-header-img3 ale-img-animation" <?php echo ale_wp_kses($ale_header_img_3, 'elli'); ?>><img src="<?php echo esc_url($ale_header_image_3, 'elli') ?>" alt="<?php echo esc_attr($ale_img3_alt, 'elli'); ?>"></div>
                <?php endif; ?> 
                <div class="wrapper ale-header-title-wrapper">
                <?php if($ale_bg_image != '') : ?>
                    <div class="ale-bg-header-img ale-img-animation" <?php echo ale_wp_kses($ale_header_img_1, 'elli'); ?>><img src="<?php echo esc_url($ale_bg_image, 'elli') ?>" alt="<?php echo esc_attr($ale_mainImg_alt, 'elli'); ?>"></div>
                <?php endif; ?>
                <div class="ale-header-dott-background"></div>
                    <div class="banner-heading fade-animation">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                            <h4 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h4>
                        <?php endif; ?>
                        <?php echo woocommerce_breadcrumb(); ?>                            
                    </div>
                </div><!-- Col end -->
            </div><!-- Banner area end -->
        <?php
    }


    /*
    * Change number or products per row to 3
    */

    if (!function_exists('loop_columns')) {
        function loop_columns() {
            
            global $ale_red_option;

            $shop_col = $ale_red_option['elli-woocommerce-columns'];

            if($shop_col == 'threecol') {
                return 3; 
            } else {
                return 2;
            }

        }
    }



    /*
    * Out of stock display
    */

    function alewoo_template_loop_stock() {
        global $product;
        if ( ! $product->managing_stock() && ! $product->is_in_stock() )
            echo '<span class="alewoo-sold-wrapper animate-fade"><span class="sold">' . esc_html__( 'Sold', 'elli' ) . '</span></span>';
    }


   
    /*
    * Remove sidebar function from single page
    */

    function ale_woo_remove_single_sidebar() {
        if ( is_product() ) {
            remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
        }
    }



    /*
    * Upsell columns and view
    */

    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
            woocommerce_upsell_display( 3, 3 );
        }
    }



    /*
    *Delete zoom effect
    */

    function ale_remove_image_zoom_support() {
        remove_theme_support( 'wc-product-gallery-zoom' );
    }



    /*
    * Related columns and view
    */

    function ale_related_products_args( $args ) {

        $args['posts_per_page'] = 3;
        $args['columns']        = 3;

        return $args;
    }



    /*
    *Social media share
    */

    if ( ! function_exists( 'ale_woo_social_share' ) ) {

        function ale_woo_social_share( $fragments ) {
            ?>
            <div class="alewoo-social-wrapper">
                <span><?php echo esc_html('Share:', 'elli'); ?></span><?php echo ale_social_media_share( $atts = array("postid" => get_the_ID()) );?></div>
            <?php
        }
    }



    /*
    *Cart cross sells per row
    */

    function ale_cross_sale_per_row_cart( $columns ) {
        return 3;
    }



    /*
     * Change number of products that are displayed per page (shop page)
     */

    function ale_new_loop_shop_per_page( $cols ) {
        global $ale_red_option;
        if($ale_red_option['woocommerce-product-pp'] != '') :
            $cols = $ale_red_option['woocommerce-product-pp'];
        else :
            $cols = 9;
        endif;

        return $cols;
    }



    /*
     * Single page gallery size
     */

     add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
        return array(
            'width'  => 300,
            'height' => 300,
            'crop'   => 1,
        );
    } );



    /*
     * Function wrap image and thumbnails
     */

    function ale_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
       
        $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
        $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
        $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
        $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
        $image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
            'title'                   => get_post_field( 'post_title', $attachment_id ),
            'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
            'data-src'                => $full_src[0],
            'data-large_image'        => $full_src[0],
            'data-large_image_width'  => $full_src[1],
            'data-large_image_height' => $full_src[2],
            'class'                   => $main_image ? 'wp-post-image' : '',
        ) );

        return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image fade-image"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
    }



    /*
    *Header Mini-cart AJAX
    */

    add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

        ob_start();
        global $woocommerce;
        ?>
        <div class="alewoo-icon-shop-header">
            <a href="<?php echo esc_url($woocommerce->cart->get_cart_url(), 'elli'); ?>" class="top_line_icons_shop">
                <span class="top_line_shop"><span id="mini-cart-count" class="top_line_count_shop"><?php echo WC()->cart->get_cart_contents_count(); ?></span></span> 
            </a>
            <div class="alewoo-cart-wrapper-header alewoo-cart-fn-wrapper">
                <?php  woocommerce_mini_cart() ?>
            </div>
        </div>


        <?php $fragments['div.alewoo-icon-shop-header'] = ob_get_clean();

        return $fragments;

    } );



    /*
    *Function return wrap single image
    */

    function alewoo_single_main_thumb(){
        global $product;

        $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
        $post_thumbnail_id = $product->get_image_id();
        $wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
            'woocommerce-product-gallery',
            'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
            'woocommerce-product-gallery--columns-' . absint( $columns ),
            'images',
        ) );
        ?>
        <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
            <figure class="woocommerce-product-gallery__wrapper">
                <?php
                if ( has_post_thumbnail() ) {
                    $html  = ale_wc_get_gallery_image_html( $post_thumbnail_id, true );
                } else {
                    $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                    $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'elli' ) );
                    $html .= '</div>';
                }

                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

                do_action( 'woocommerce_product_thumbnails' );
                ?>
            </figure>
        </div><?php
    }



    /*
    *Function return wrap gallery images
    */

    function alewoo_single_gallery_thumb(){
        global $product;

        $attachment_ids = $product->get_gallery_image_ids();

        if ( $attachment_ids && has_post_thumbnail() ) {
            foreach ( $attachment_ids as $attachment_id ) {
                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', ale_wc_get_gallery_image_html( $attachment_id  ), $attachment_id );
            }
        }
    }



    /*
    *General functions
    */
    
    add_action('woocommerce_before_shop_loop', function() { echo '<div class="alewoo-topline-wrapper fade-animation">' ;}, 9);
    add_action( 'woocommerce_before_shop_loop', function() { echo '</div>';}, 33  );

    //Theme support
    add_action( 'after_setup_theme', 'woocommerce_support' );

    //Loop columns
    add_filter('loop_shop_columns', 'loop_columns');
   
        

    /*
    * Archive page settings
    */

    //Add Header Container
    add_action( 'woocommerce_before_main_content', 'ale_woocommerce_header', 5 );

    //Remove notice from topline
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 ); 
    add_action( 'woocommerce_archive_description' ,'woocommerce_output_all_notices', 7 );

    //Notice wrapper fade-animation
    add_action('woocommerce_before_single_product', function() { echo '<div class="fade-animation">';}, 9);
    add_action( 'woocommerce_before_single_product', function() { echo '</div>';}, 11  );


    //Content product link wrapper img
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 25 );

    //Add category in content product
    add_action( 'woocommerce_shop_loop_item_title', 'ale_get_woo_cat', 9 );

    //Change the title h2
    remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
    add_action('woocommerce_shop_loop_item_title', 'ale_woo_content_title', 10 );

    //Style the button add to cart
    add_action( 'woocommerce_after_shop_loop_item', function() { echo '<div class="alewoo-btn">';}, 5  );
    add_action( 'woocommerce_after_shop_loop_item' , function() { echo '</div>';}, 15  );

    //Change thumbnail position
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 ); 
    add_action( 'woocommerce_before_shop_loop_item_title' ,'woocommerce_template_loop_product_thumbnail', 20 );

    //Change sale wrapper
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'ale_sale_woo_wrapper', 10 );

    //Change search widget
    add_filter( 'get_product_search_form' , 'ale_custom_product_searchform' );

    //Add out of stock
    add_action( 'woocommerce_before_shop_loop_item_title', 'alewoo_template_loop_stock', 10, 2 );

    //Remove rating
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

    //Change post per page / pagination
    add_filter( 'loop_shop_per_page', 'ale_new_loop_shop_per_page', 20 );

    //Add fade-animation to pagination
    add_action( 'woocommerce_after_shop_loop', function() { echo '<div class="fade-animation">';}, 9   );
    add_action( 'woocommerce_after_shop_loop' , function() { echo '</div>';}, 15  );

    //Add fade-animation to not-found
    add_action( 'woocommerce_no_products_found', function() { echo '<div class="fade-animation">';}, 9   );
    add_action( 'woocommerce_no_products_found' , function() { echo '</div>';}, 15  );

    //Add img-wrapper class archive page
    add_action( 'woocommerce_before_shop_loop_item', function() { echo '<div class="alewoo-thumb-cat fade-image">';}, 2);
    add_action( 'woocommerce_shop_loop_item_title', function() { echo '</div>';}, 8  );



     /*
    * Single page settings
    */

     //Change title
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    add_action( 'woocommerce_single_product_summary', 'ale_woo_content_title_single', 5 );

     //Change sale wrapper
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'woocommerce_before_single_product_summary', 'ale_sale_woo_wrapper', 19, 1 );

    //Remove sidebar from single page
    add_action( 'wp', 'ale_woo_remove_single_sidebar' );

    //Related columns and view settings
    add_filter( 'woocommerce_output_related_products_args', 'ale_related_products_args' );

    //Change rating position
    remove_action( 'woocommerce_single_product_summary' ,'woocommerce_template_single_rating', 10 );
    add_action( 'woocommerce_single_product_summary' ,'woocommerce_template_single_rating', 12 );

    //Remove zoom effect
    add_action( 'after_setup_theme', 'ale_remove_image_zoom_support', 100 );

    //Add social sharing
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    add_action( 'woocommerce_single_product_summary', 'ale_woo_social_share', 35 );

    //Wrap Title and Price
    add_action( 'woocommerce_single_product_summary', function() { echo '<div class="alewoo-title-single-wrapper">';}, 4 );
    add_action( 'woocommerce_single_product_summary' , function() { echo '</div>';}, 10 );

    //Upsells columns and rows
    add_filter('woocommerce_upsell_display_args', 'ale_related_products_args');

    //Data tabs single page fade-animation
    add_action('woocommerce_after_single_product_summary', function() { echo '<div class="alewoo-tabs-wrapper fade-animation">';}, 9);
    add_action( 'woocommerce_after_single_product_summary', function() { echo '</div>';}, 11 );

    //Add Wrapper to gallery thumbnails
    add_action('woocommerce_product_thumbnails', function() { echo '<div class="alewoo-gallery-wrapper cf">';}, 9   );
    add_action('woocommerce_product_thumbnails' ,function() { echo '</div>';}, 55   );

    //Main image wrapper
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    add_action( 'woocommerce_before_single_product_summary', 'alewoo_single_main_thumb', 20 );

    //Gallery thumbs wrapper
    remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
    add_action( 'woocommerce_product_thumbnails', 'alewoo_single_gallery_thumb', 20 );


    /*
    *Custom Pages
    */

    //Change cross sells row on cart page
    add_filter( 'woocommerce_cross_sells_columns', 'ale_cross_sale_per_row_cart' );

    //SHOP WRAPPER
    add_action('woocommerce_before_main_content', function() { echo '<div class="alewoo-fullshop-wrapper wrapper">';}, 6 );
    add_action('woocommerce_after_main_content', function() { echo '</div>';}, 44 );

    //My account addresses change position notice
    remove_action('woocommerce_account_content' , 'woocommerce_output_all_notices', 10);
    add_action('woocommerce_account_content', 'woocommerce_output_all_notices', 5);


    //Cart first table fade-animation wrapper
    add_action('woocommerce_before_cart', function() { echo '<div class="fade-animation">';}, 9);
    add_action('woocommerce_after_cart_table', function() { echo '</div>';}, 11 );


    //Cart total table
    add_action('woocommerce_cart_collaterals', function() { echo '<div class="fade-animation">';}, 9);
    add_action('woocommerce_cart_collaterals', function() { echo '</div>';}, 11 );

    //Cart cross sells wrapper fade-animation
    add_action('woocommerce_cart_collaterals', function() { echo '<div class="fade-animation">';}, 4);
    add_action('woocommerce_cart_collaterals', function() { echo '</div>';}, 6 );


    //Switch position cross sells cart page
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10);
    add_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 5);

    //Checkout notice fade-animation
    add_action('woocommerce_before_checkout_form', function() { echo '<div class="fade-animation">';}, 9);
    add_action('woocommerce_before_checkout_form', function() { echo '</div>';}, 11 );

    //Checkout billing, shipping and notes fade-animation
    add_action('woocommerce_checkout_before_customer_details', function() { echo '<div class="fade-animation">';}, 15);
    add_action('woocommerce_checkout_after_customer_details', function() { echo '</div>';}, 8 );

    //Checkout your order fade-animation
    add_action('woocommerce_checkout_after_customer_details', function() { echo '<div class="fade-animation">';}, 9);
    add_action('woocommerce_checkout_after_order_review', function() { echo '</div>';}, 11 );

    //Thank you page message fade-animation wrapper
    add_action('woocommerce_thankyou_cheque', function() { echo '<div class="alewoo-thankyou-message fade-animation">';}, 9);
    add_action('woocommerce_thankyou', function() { echo '</div>';}, 8 );

    //Thank you page order detail fade-animation wrapper
    add_action('woocommerce_thankyou', function() { echo '<div class="fade-animation">';}, 9);
    add_action('woocommerce_order_details_after_customer_details', function() { echo '</div>';}, 8 );

    //Wrap payment page
    add_action('before_woocommerce_pay', function() { echo '<div class="alewoo-payment-page fade-animation">';}, 9);
    add_action('after_woocommerce_pay', function() { echo '</div>';}, 11 );



    /*
    *Custom Styles
    */
    function ale_custom_woo_styles() {
        echo "<style type='text/css'>";

        echo "
            /*
            *Shop page
            */

            .alewoo-shop-wrapper{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }

            .woocommerce .alewoo-loop-wrapper ul.products.columns-2 li.product{
                width: 50%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0 15px;
            }

            .woocommerce .banner-heading nav.woocommerce-breadcrumb{
                color:#ff6d24;
            }

            .woocommerce nav.woocommerce-breadcrumb a{
                color: #ff6d24;
                -webkit-transition: all 200ms ease-in-out;
                -moz-transition: all 200ms ease-in-out;
                -ms-transition: all 200ms ease-in-out;
                -o-transition: all 200ms ease-in-out;
                transition: all 200ms ease-in-out;
            }

            .woocommerce nav.woocommerce-breadcrumb a:hover{
                color: #ff6d24;
                -webkit-transition: all 200ms ease-in-out;
                -moz-transition: all 200ms ease-in-out;
                -ms-transition: all 200ms ease-in-out;
                -o-transition: all 200ms ease-in-out;
                transition: all 200ms ease-in-out;
                opacity: .7;
            }

            .woocommerce ul.products li.product .alewoo-btn .button, .woocommerce ul.products li.product .alewoo-btn .added_to_cart{
                background-color: transparent;
                padding: 15px 40px;
                color: #ff6d24;
                border: 1px solid #ff6d24;
                margin-top: 0;
                border-radius: 0;
                text-transform: uppercase;
                font-size: 11px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                line-height: 11px;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
                z-index: 10;
            }

            .woocommerce ul.products li.product .alewoo-btn:hover .button, .woocommerce ul.products li.product .alewoo-btn:hover .added_to_cart{
                color: #fff;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                background-color: #ff6d24;
            }

            .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content{
                background-color: #e2ded3;
                width: calc(100% - 9px);
            }

            .woocommerce-loop-product_title a{
                color: inherit;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .woocommerce-loop-product_title a:hover{
                color: #ff6d24;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .alewoo-loop-wrapper .term-description{
                padding: 20px 30px;
                background-color: #f8f7f5;
                margin-bottom: 30px;
            }

            

            /*
            *Hover button fadein
            */

            .woocommerce-page ul.products.columns-3 li.product:hover .alewoo-btn, .woocommerce ul.products li.product:hover .alewoo-btn{
                margin-top: 12px;
                -webkit-transition: all 200ms ease-in-out;
                -moz-transition: all 200ms ease-in-out;
                -ms-transition: all 200ms ease-in-out;
                -o-transition: all 200ms ease-in-out;
                transition: all 250ms ease-in-out;
                margin-bottom: 13px;
                opacity: 1;
            }

            .woocommerce ul.products li.product span.price{
                position: absolute;
                margin-top: 5px;
                -webkit-transition: all 100ms ease-in-out !important;
                -moz-transition: all 100ms ease-in-out !important;
                -ms-transition: all 100ms ease-in-out !important;
                -o-transition: all 100ms ease-in-out !important;
                transition: all 100ms ease-in-out !important;
            }

            .woocommerce-page ul.products.columns-3 li.product .alewoo-btn, .woocommerce ul.products li.product .alewoo-btn{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                overflow: hidden;
                position: relative;
                display: inline-block;
                opacity: 0;
                margin-top: 25px;
            }

            .alewoo-products-container .woocommerce ul.products li.product{
                padding: 0 15px;
            }

            .alewoo-products-container .woocommerce ul.products{
                margin: 0 -15px;
            }

            .woocommerce-page ul.products.columns-3 li.product:hover span.price, .woocommerce ul.products li.product:hover span.price{
                margin-top: -5px;
                opacity: 0;
                -webkit-transition: all 100ms ease-in-out !important;
                -moz-transition: all 100ms ease-in-out !important;
                -ms-transition: all 100ms ease-in-out !important;
                -o-transition: all 100ms ease-in-out !important;
                transition: all 100ms ease-in-out !important;
            }


            .woocommerce .alewoo-loop-wrapper ul.products{
                margin: 0 -15px 15px -15px;
            }

            .woocommerce ul.products li.product .price{
                margin-bottom: 0;
            }


            .woocommerce ul.products li.product .price ins{
                font-weight: 300;
                text-decoration: none;
            }

            .woocommerce ul.products li.product .alewoo-onsale-wrapper, .woocommerce ul.products li.product .alewoo-sold-wrapper{
                position: absolute;
                top: 0;
                margin: 0;
                padding: 0;
                color: #fff;
                text-transform: uppercase;
                z-index: 10;
                font-weight: 400;
                line-height: 24px;
                letter-spacing: 1px;
                text-align: center;
                box-sizing: border-box;
                right: 0;
                display: block;
            }

            .woocommerce ul.products li.product .alewoo-onsale-wrapper .onsale, .woocommerce ul.products li.product .alewoo-sold-wrapper .sold{
                position: relative;
                top: 0px;
                left: 0px;
                background-color: transparent;
                font-size: 11px !important;
                color: #fff !important;
                z-index: 40;
                display: block;
                padding: 9px 23px;
                background-color: #ff6d24;
            }

            input.alewoo-search-field{
                border: none;
                border-bottom: 1px solid #4e413b;
                padding: 12px 0;
                width: 100%;
            }

            .alewoo-search-product-wrapper{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }

            .alewoo-btn-searchform{
                border-bottom: 1px solid #4e413b;
            }

            .alewoo-btn-searchform .icon_search{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .alewoo-btn-searchform:hover .icon_search{
                    color: #ff6d24;
                    -webkit-transition: all 100ms ease-in-out;
                    -moz-transition: all 100ms ease-in-out;
                    -ms-transition: all 100ms ease-in-out;
                    -o-transition: all 100ms ease-in-out;
                    transition: all 100ms ease-in-out;
            }

            .woocommerce .widget_price_filter .ui-slider-horizontal{
                height: 3px;
            }

            .woocommerce .widget_price_filter .ui-slider .ui-slider-range{
                background-color: #ff6d24;
            }

            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
                height: 8px;
                width: 8px;
            }

            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
                top: -3px;
                background-color: #ff6d24;
                margin: 0 0 0 -2px;
                cursor: pointer;
            }

            .woocommerce .widget_price_filter .ui-slider{
                margin-right: 3px;
                margin-left: 3px;
            }


            .price_slider_amount{
                font-size: inherit;
                justify-content: space-between;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                flex-direction: row-reverse;
            }

            .woocommerce .widget_price_filter .price_slider_amount .button{
                background-color: transparent;
                padding: 15px 40px;
                color: #ff6d24;
                border: 1px solid #ff6d24;
                margin-top: 0;
                border-radius: 0;
                text-transform: uppercase;
                font-size: 11px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                line-height: 11px;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
                z-index: 10;
                float: none;
            }


            .woocommerce .widget_price_filter .price_slider_amount .price_label{
                display: inline-block;
                line-height: inherit;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                align-items: center;
                order:1;
            }

            .woocommerce .widget_price_filter .price_slider{
                margin-bottom: 22px;
            }

            .woocommerce .widget_price_filter .price_slider_amount .button:hover{
                color: #fff;
                background-color: #ff6d24;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .woocommerce ul.products li.product .price del{
                margin-right: 8px;
            }

            .woocommerce .woocommerce-ordering select{
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-appearance: none;
                -moz-appearance: none;
                width: 100%;
                background-color: transparent;
                padding: 12px 60px 12px 12px;
                height: 100%;
                letter-spacing: .02em;
                border: none;
                border-bottom: 1px solid #4e413b;
            }


            .woocommerce .woocommerce-ordering{
                position: relative;
            }

            .woocommerce .woocommerce-ordering:before{
                content: '\\e64b';
                font-size: 12px;
                position: absolute;
                top: calc(50% - 6px);
                right: 0;
                font-family: 'themify';
                z-index: -1;
                line-height: 12px;
            }

            .woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count{
                float: none;
            }

            .woocommerce .woocommerce-ordering, .woocommerce-page .woocommerce-ordering{
                float: none;
            }

            .alewoo-topline-wrapper{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .woocommerce .woocommerce-ordering{
                margin: 0 0 30px;
            }

            .woocommerce .woocommerce-result-count{
                margin: 0 0 30px;
            }

            .woocommerce ul.products li.product, .woocommerce-page ul.products li.product{
                margin: 0 0 11px;
            }

            .woocommerce ul.products.columns-3 li.product, .woocommerce-page ul.products.columns-3 li.product{
                width: 33.333%;
                padding: 0 15px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .alewoo-loop-wrapper{
                width: 100%;
            }

            .woocommerce ul.products li.product h6 a{
                color: inherit;
                -webkit-transition: all 200ms ease-in-out;
                -moz-transition: all 200ms ease-in-out;
                -ms-transition: all 200ms ease-in-out;
                -o-transition: all 200ms ease-in-out;
                transition: all 200ms ease-in-out;
            }

            .woocommerce ul.products li.product h6 a:hover{
                -webkit-transition: all 200ms ease-in-out;
                -moz-transition: all 200ms ease-in-out;
                -ms-transition: all 200ms ease-in-out;
                -o-transition: all 200ms ease-in-out;
                transition: all 200ms ease-in-out;
                color: #ff6d24;
            }

            .woocommerce-loop-product_title{
                text-transform: uppercase;
            }


            .woocommerce nav.woocommerce-pagination{
                text-align: center;
                margin-bottom: 68px;
                margin-top: 58px;
            }

            .woocommerce nav.woocommerce-pagination ul{
                display: inline-block;
                padding: 0 12px;
                border: none;
                margin: 0;
            }

            .woocommerce nav.woocommerce-pagination ul li{
                display: inline-block;
                margin: 0 12px;
                border: none;
            }

            .woocommerce nav.woocommerce-pagination ul li a{
                font-size: 16px;
            }

            .woocommerce nav.woocommerce-pagination ul li a.page-numbers{
                color: inherit;
            }

            .woocommerce nav.woocommerce-pagination ul li a.prev, .woocommerce nav.woocommerce-pagination ul li a.next{
                font-size: 0;
                width: 20px;
            }

            .woocommerce nav.woocommerce-pagination ul li a.prev:before{
                content: '\\f3d5';
                font-family: 'ionicons';
                font-size: 27px;
                position: relative;
                bottom: -3px;
                line-height: 10px;
            }

            .woocommerce nav.woocommerce-pagination ul li a.next:before{
                content: '\\f3d6';
                font-size: 27px;
                position: relative;
                bottom: -3px;
                line-height: 10px;
                font-family: 'ionicons';
            }

            .woocommerce nav.woocommerce-pagination ul li span.current{
                font-size: 16px;
                color: #ff6d24;
                background-color: transparent;
            }


            .woocommerce nav.woocommerce-pagination ul li a.page-numbers:hover{
                color: #ff6d24;
                background-color: transparent;
            }

            .woocommerce nav.woocommerce-pagination ul li a.page-numbers:focus{
                background-color: transparent;
            }

            .woocommerce .woocommerce-pagination ul.page-numbers::after, .woocommerce-page .woocommerce-pagination ul.page-numbers::after{
                display: none;
            }

            .woocommerce .woocommerce-pagination ul.page-numbers::after, .woocommerce .woocommerce-pagination ul.page-numbers::before, .woocommerce-page .woocommerce-pagination ul.page-numbers::after, .woocommerce-page .woocommerce-pagination ul.page-numbers::before{
                display: none;
            }

            .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span{
                font-weight: 300;
                padding: 0;
                min-width: auto;
            }

            .woocommerce ul.products li.product .onsale{
                margin: 0;
                min-width: auto;
            }


            /*
            *Single page style
            */

            .woocommerce div.product form.cart{
                margin-bottom: 43px;
            }

            .alewoo-onsale-wrapper{
                position: absolute;
                top: 0;
                margin: 0;
                padding: 0;
                color: #fff;
                text-transform: uppercase;
                z-index: 10;
                font-weight: 400;
                line-height: 24px;
                letter-spacing: 1px;
                text-align: center;
                box-sizing: border-box;
                right: 0;
                display: block;
            }

            .woocommerce .alewoo-onsale-wrapper .onsale{
                position: relative;
                top: 0px;
                left: 0px;
                background-color: #ff6d24;
                font-size: 11px !important;
                color: #fff !important;
                z-index: 40;
                display: block;
                padding: 9px 23px;
                border-radius: 0;
            }

            .woocommerce span.onsale{
                line-height: inherit;
                min-height: inherit;
                min-width: inherit;
            }


            .woocommerce div.product div.images{
                float: none;
                width: 100%;
            }

            .alewoo-thumb-wrapper{
                width: 50%;
                float: left;
                position: relative;
                overflow: hidden;
            }

            .alewoo-title-single-wrapper{
                margin-bottom: 48px;
            }

            .woocommerce .alewoo-fullshop-wrapper .alewoo-title-single-wrapper h4{
                margin-bottom: 18px;
            }

            .woocommerce div.product p.price, .woocommerce div.product span.price{
                font-size: 19px;
                line-height: 19px;
                color: #4e413b;
            }

            .woocommerce div.product p.price, .woocommerce div.product p.price del{
                margin-right: 12px;
            }

            .woocommerce div.product p.price del, .woocommerce div.product span.price del{
                opacity: 0.7;
            }


            .woocommerce-message{
                border-top-color: transparent;
            }

            .woocommerce-message:before{
                content: '';
            }

            .woocommerce-error::before, .woocommerce-info::before, .woocommerce-message::before{
                color: #ff6d24;
            }

            .woocommerce-error, .woocommerce-info, .woocommerce-message{
                padding: 20px 30px;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin: 0 0 30px;
                border: none;
                background-color: #f8f7f5;
                min-height: 51px;
            }

            .woocommerce-error a, .woocommerce-info a, .woocommerce-message a{
                color: inherit;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            }

            .woocommerce-error a:hover, .woocommerce-info a:hover, .woocommerce-message a:hover{
                color: #ff6d24;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            }

            .woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button, .woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button{
                float: none;
            }

            .woocommerce-error:after, .woocommerce-info:after, .woocommerce-message:after{
                display: none;
            }


            .woocommerce div.product form.cart div.quantity{
                margin: 0 20px 0 0;
            }

            .input-text.qty{
                line-height: 3.012em !important;
            }

            .woocommerce div.product form.cart div.quantity input.qty, .woocommerce .quantity input.qty{
                background-color: transparent;
                border: 1px solid #e2ded3;
                padding-right: 21px;
                font-size: 16px;
                overflow: hidden;
            }

            input.qty::-webkit-outer-spin-button,
            input.qty::-webkit-inner-spin-button {
                -webkit-appearance: none;
            }

            .quantity span.quantity-down{
                line-height: 10px;
                position: absolute;
                right: 0;
                bottom: 7px;
                padding: 2px;
                margin-right: 10px;
                z-index: 99;
                display: inline-block;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                cursor: pointer;
            }

            .quantity span.quantity-down:before{
                content: '\\e64b';
                font-family: 'themify';
                font-size: 10px;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .quantity span.quantity-up{
                line-height: 10px;
                position: absolute;
                right: 0;
                top: 7px;
                padding: 2px;
                margin-right: 10px;
                z-index: 99;
                display: inline-block;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                cursor: pointer;
            }

            .quantity span.quantity-up:before{
                content: '\\e648';
                font-family: 'themify';
                font-size: 10px;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .woocommerce div.product form.cart div.quantity{
                position: relative;
            }

            .quantity span.quantity-up:hover:before{
                color: #ff6d24;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .quantity span.quantity-down:hover:before{
                color: #ff6d24;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }

            .woocommerce .star-rating::before{
                color: #ff6d24;
            }

            .woocommerce .star-rating{
                color: #ff6d24;
            }

            a.woocommerce-review-link{
                display: none;
            }

            .woocommerce div.product .woocommerce-product-rating{
                padding: 20px 0;
                border-bottom: 1px solid #e2ded3;
                border-top: 1px solid #e2ded3;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                margin-bottom: 42px;
            }

            .woocommerce .woocommerce-product-rating{
                line-height: 100%;
            }

            .woocommerce .woocommerce-product-rating .star-rating{
                margin: 0;
                font-size: 14px;
                letter-spacing: 6px;
                float: none;
                width: auto;
            }

            .alewoo-social-wrapper{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }

            .alewoo-social-wrapper ul.social_share_list li{
                display: inline-block;
                margin-right: 8px;
                margin-left: 8px;
            }

            .alewoo-social-wrapper ul.social_share_list li a{
                color: #ff6d24;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            }

            .alewoo-social-wrapper ul.social_share_list li a:hover{
                opacity: 0.8;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            }

            .alewoo-social-wrapper ul.social_share_list li:last-child{
                margin-right: 0;
            }

            .alewoo-social-wrapper ul.social_share_list li:first-child{
                margin-left: 16px;
            }

            .woocommerce div.product p.price ins, .woocommerce div.product span.price ins{
                font-weight: 300;
                text-decoration: none;
            }

            .alewoo-social-wrapper span{
                text-transform: uppercase;
            }

            .woocommerce div.product .alewoo-social-wrapper{
                margin-bottom: 35px;
            }

            .product_meta > span{
                display: block;
                margin-top: 6px;
            }

            .woocommerce div.product .woocommerce-product-details__short-description{
                margin-bottom: 44px;
            }

            span.posted_in a:hover, span.tagged_as a:hover{
                color: #ff6d24;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            }

            span.posted_in, span.tagged_as{
                text-transform: uppercase;
                letter-spacing: 0.08em;
            }

            span.posted_in a, span.tagged_as a{
                -webkit-transition: all 150ms ease-in-out !important;
                -moz-transition: all 150ms ease-in-out !important;
                -ms-transition: all 150ms ease-in-out !important;
                -o-transition: all 150ms ease-in-out !important;
                transition: all 150ms ease-in-out !important;
                text-transform: none;
                letter-spacing: 0;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs{
                padding: 0 0 14px 0;
                list-style: none;
                clear: both;
                outline: 0;
                position: relative;
                margin: 0;
                overflow: auto;
                border-bottom: 0.102em solid #e2ded3;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs:before{
                display: none;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li{
                margin: 0 19px;
                background-color: transparent;
                border: none;
                display: inline-block;
                white-space: nowrap;
                padding: 0;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li a{
                padding: 0;
                -webkit-transition: all 150ms ease-in-out !important;
                -moz-transition: all 150ms ease-in-out !important;
                -ms-transition: all 150ms ease-in-out !important;
                -o-transition: all 150ms ease-in-out !important;
                transition: all 150ms ease-in-out !important;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li:after{
                display: none;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li:before{
                display: none;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li:first-child{
                margin: 0 19px 0 0;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li:last-child{
                margin: 0 0 0 19px;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li.active{
                color: #ff6d24;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover{
                color: #ff6d24;
                -webkit-transition: all 150ms ease-in-out;
                -moz-transition: all 150ms ease-in-out;
                -ms-transition: all 150ms ease-in-out;
                -o-transition: all 150ms ease-in-out;
                transition: all 150ms ease-in-out;
            }

            .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel--description h2{
                display: none;
            }

            .woocommerce #reviews #comments h2.woocommerce-Reviews-title{
                text-transform: uppercase;
            }

            .woocommerce div.product .woocommerce-tabs .panel.woocommerce-Tabs-panel--description{
                margin-bottom: 74px;
            }

            .woocommerce div.product .woocommerce-tabs .panel{
                padding-top: 19px;
            }

            .woocommerce div.product .woocommerce-tabs .panel.woocommerce-Tabs-panel--reviews{
                padding-top: 30px;
                margin-bottom: 71px;
            }

            .woocommerce p.stars a::before{
                color: #4e413b;
            }

            .woocommerce #reviews #comments ol.commentlist li .comment-text{
                border: none;
                padding: 0 0 0 80px;
                display: block;
                flex-direction: column;
                margin: 0;
            }

            .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta{
                display: none;
            }

            .woocommerce #reviews #comments ol.commentlist li .comment_container{
                display: inline-block;
                position: relative;
                width: 100%;
            }

            .woocommerce #reviews #comments ol.commentlist li img.avatar{
                height: 60px;
                width: 60px;
                border-radius: 100%;
                border: none;
                padding: 0;
                position: relative;
            }

            .woocommerce #reviews #comments ol.commentlist li .comment-text p:last-child{
                margin: 0;
            }

            .woocommerce .star-rating{
                float: none;
                display: inline-block;
                margin-bottom: 2px;
                font-size: 14px;
                letter-spacing: 6px;
                width: auto;
            }

            .woocommerce .star-rating span{
                float: none;
            }

            .woocommerce #reviews #comments ol.commentlist li .comment-text:before{
                display: none;
            }

            .woocommerce #reviews #comments ol.commentlist li .comment-text:after{
                display: none;
            }

            .woocommerce .star-rating:before{
                position: relative;
            }

            .woocommerce p.stars a{
                margin-right: 2px;
            }

            .woocommerce p.stars a:before{
                font-size: 14px;
            }

            .woocommerce #reviews #comments h2.woocommerce-Reviews-title{
                margin-bottom: 31px;
            }

            .woocommerce #reviews #comments ol.commentlist li{
                margin: 0 0 21px;
            }

            .woocommerce #reviews #comments p.woocommerce-noreviews{
                margin: -9px 0 24px 0;
            }

            .woocommerce #review_form #respond form.comment-form{
                display:flex;
                flex-wrap: wrap;
            }

            .woocommerce #review_form #respond form.comment-form .comment-form-rating label{
                margin-bottom: 10px;
                display: inline-block;
            }

            .woocommerce #review_form #respond form.comment-form .comment-form-rating{
                margin-bottom: 13px;
                flex-basis: 100%;
            }

            .woocommerce #review_form #respond textarea{
                border: none;
                border-bottom: 1px solid #4e413b;
                padding: 15px 0;
                resize: none;
            }

            .woocommerce #review_form #respond p.comment-form-author{
                display: inline-block;
                flex-basis: 50%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding-right: 15px;
                margin: 0 0 35px;
                line-height: 0.9;
            }

            .woocommerce #review_form #respond p.comment-form-author input{
                border: none;
                border-bottom: 1px solid #4e413b;
                line-height: initial !important;
                padding: 18px 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                width: 100%;
                box-shadow: none;
            }

            .woocommerce #review_form #respond p.comment-form-email{
                display: inline-block;
                flex-basis: 50%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding-left: 15px;
                margin: 0 0 35px;
                line-height: 0.9;
            }

            .woocommerce #review_form #respond p.comment-form-email input{
                border: none;
                border-bottom: 1px solid #4e413b;
                line-height: initial !important;
                padding: 18px 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                width: 100%;
                box-shadow: none;
            }

            .woocommerce #review_form #respond p.comment-form-comment{
                margin: 0 0 35px;
                line-height: 0.9;
                display: inline-block;
                width: 100%;
            }

            .woocommerce #review_form #respond p.comment-form-comment textarea{
                height: 56px;
                resize: none;
                overflow: hidden;
                box-shadow: none;
            }

            .woocommerce #review_form #respond p.comment-form-comment textarea::-webkit-scrollbar{
                display: none;
            }

            .woocommerce #review_form #respond p.comment-notes{
                margin: 0 0 23px;
                flex-basis: 100%;
            }

            .woocommerce #reviews #comments ol.commentlist{
                margin-bottom: 9px;
            }

            .woocommerce #review_form #respond form.comment-form .comment-form-rating label{
                display: block;
            }

            .woocommerce #review_form #respond p.stars{
                display: inline-block;
            }

            .woocommerce #review_form #respond p.form-submit{
                text-align: right;
                margin-top: 2px;
                flex-basis: 100%;
            }

            .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel--additional_information > h2{
                display: none;
            }

            .woocommerce table.shop_attributes{
                margin-bottom: 6px;
            }

            .woocommerce table.shop_attributes td{
                font-style: normal;
                color: #4e413b;
                background: transparent !important;
            }

            .woocommerce table.shop_attributes tr td, .woocommerce table.shop_attributes tr th{
                padding: 2px 0;
            }

            .woocommerce table.shop_attributes tr td{
                background: transparent !important;
                border: none;
            }

            .woocommerce table.shop_attributes tr th{
                font-weight: 400;
                background: transparent !important;
                border: none;
                padding: 2px 30px 2px 0;
            }

            .woocommerce table.shop_attributes{
                border: none;
            }

            .woocommerce table.shop_attributes tr{
                padding: 2px 0;
            }

            .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel--additional_information{
                padding-top: 26px;
                margin-bottom: 70px;
            }

            .woocommerce div.product div.summary{
                width: 50%;
                padding-left: 90px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                margin-bottom: 76px;
            }

            .woocommerce div.product div.images .flex-control-thumbs li{
                width: 33.33%;
                padding: 15px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .woocommerce-product-gallery .flex-viewport{
                margin-bottom: 30px;
            }

            .woocommerce div.product div.images .flex-control-thumbs{
                margin: -15px;
            }

            .woocommerce div.product div.images{
                margin-bottom: 0;
            }

            .woocommerce div.product div.images.woocommerce-product-gallery{
                margin-bottom: 83px;
            }

            .woocommerce div.product section.related > h2{
                text-transform: uppercase;
                margin-bottom: 29px;
            }

            .woocommerce div.product section.related ul.products{
                margin: 0 -15px;
            }

            .woocommerce #content div.product .woocommerce-tabs, .woocommerce div.product .woocommerce-tabs, .woocommerce-page #content div.product .woocommerce-tabs, .woocommerce-page div.product .woocommerce-tabs{
                margin-bottom: 66px;
            }

            .woocommerce div.product section.related{
                padding-bottom: 16px;
            }

            .woocommerce div.product p.stock{
                color: #ff6d24;
                margin: -7px 0 14px 0 ;
            }

            .woocommerce div.product p.stock.out-of-stock{
                margin-bottom: 35px;
            }

            .alewoo-shop-wrapper ul.woocommerce-error li{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: space-between;
            }

            .alewoo-shop-wrapper ul.woocommerce-error li a{
                order: 2;
            }

            .woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button, .woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button{
                order: 2;
            }

            .woocommerce div.product-type-grouped table.woocommerce-grouped-product-list{
                width: 100%;
                max-width: 100%;
            }

            .woocommerce div.product-type-grouped table.woocommerce-grouped-product-list .quantity{
                display: inline-block;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td:first-child{
                text-align:left;
                margin-bottom: 0;
                width: 36%;
            }

            .woocommerce div.product-type-grouped form.cart > .single_add_to_cart_button {
                margin: 37px 0 0 0;
            }

            .woocommerce div.product-type-grouped table.woocommerce-grouped-product-list tbody td.woocommerce-grouped-product-list-item__quantity{
                text-align: left;
            }

            .woocommerce div.product-type-grouped table.woocommerce-grouped-product-list tbody tr td:first-child{
                padding: 0 20px 0 0;
            }

            .woocommerce div.product-type-grouped table.woocommerce-grouped-product-list tbody tr td:last-child{
                padding: 0 0 0 20px;
                width: 24%;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td.woocommerce-grouped-product-list-item__price del{
                margin-right: 8px;
                opacity: 0.5;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td.woocommerce-grouped-product-list-item__price ins{
                text-decoration: none;
            }

            .woocommerce div.product-type-grouped p.stock.out-of-stock{
                margin-bottom: 0;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td:first-child a{
                background-color: transparent;
                padding: 15px 40px;
                color: #ff6d24;
                border: 1px solid #ff6d24;
                margin-top: 0;
                border-radius: 0;
                text-transform: uppercase;
                font-size: 11px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                line-height: 11px;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                z-index: 10;
                float: none;
            }

            .woocommerce .quantity span.quantity-up, .woocommerce .quantity span.quantity-down{
                color: #4e413b;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td:first-child a:hover{
                background-color: #ff6d24;
                color: #fff;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td.woocommerce-grouped-product-list-item__label{
                padding-right: 0;
                padding-left: 0;
                padding-bottom: 20px;
                padding-top: 20px;
            }

            .woocommerce div.product-type-grouped form.cart .group_table tr:first-child td.woocommerce-grouped-product-list-item__label{
                padding-top: 0;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td.woocommerce-grouped-product-list-item__quantity{
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .woocommerce div.product-type-grouped form.cart .group_table tr:first-child td.woocommerce-grouped-product-list-item__quantity{
                padding-top: 0;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td.woocommerce-grouped-product-list-item__price{
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .woocommerce div.product-type-grouped form.cart .group_table tr:first-child td.woocommerce-grouped-product-list-item__price{
                padding-top: 0;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td{
                padding-bottom: 0;
                vertical-align: middle;
                border-bottom: 1px solid #e2ded3;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td a{
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce div.product-type-grouped form.cart .group_table td a:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce div.product-type-grouped p.stock{
                margin: 0;
            }

            .alewoo-tabs-wrapper {
                clear: both;
            }

            .woocommerce table.shop_table.woocommerce-checkout-review-order-table{
                border: none;
                margin: 0 0 5px 0;
            }

            .woocommerce table.shop_table td{
                padding: 20px 20px 20px 0;
            }

            .woocommerce table.shop_table tr.cart_item{
                border: 1px solid #e2ded3;
            }

            .woocommerce table.shop_table td.actions{
                padding: 37px 0 0 0;
            }

            #add_payment_method table.cart img, .woocommerce-cart table.cart img, .woocommerce-checkout table.cart img{
                width: 100%;
                max-width: 80px;
            }

            .woocommerce table.shop_table th{
                padding: 20px 0;
            }

            .woocommerce table.shop_table th.woocommerce-table__product-name{
                min-width: 50%;
            }

            .woocommerce table.shop_table  td.product-quantity .quantity{
                display: inline-block;
                position: relative;
            }

            .woocommerce-page table.cart td.actions .coupon input.input-text::placeholder{
                color: #000;
                font-weight: 300;
            }

            .woocommerce-page table.cart td.actions .coupon{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }


            .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]{
                color: #ff6d24;
                opacity: 1;
                padding: 15px 50px;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover{
                color: #fff;
                background-color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text{
                background-color: transparent;
                border: 1px solid #e2ded3;
                padding-right: 21px;
                font-size: 17px;
                color: #000;
                line-height: 2.835em;
                width: 200px;
                padding: 0 20px;
                margin: 0 24px 0 0;
            }

            .woocommerce a.remove, .alewoo-cart-wrapper-header a.remove{
                font-size: 0;
                display: inline-block;
            }

            .woocommerce a.remove:before, .alewoo-cart-wrapper-header a.remove:before{
                content: '\\f404';
                font-size: 27px;
                font-family: 'ionicons';
                line-height: 27px;
                color: #4e413b;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .product-remove{
                padding: 0 12px !important;
            }

            .woocommerce a.remove:hover:before, .alewoo-cart-wrapper-header a.remove:hover:before{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce table.shop_table td.product-name > a {
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                color: inherit;
            }

            .woocommerce table.shop_table td.product-thumbnail{
                width: 180px;
            }

            .woocommerce table.shop_table td.product-remove{
                width: 30px;
            }

            .woocommerce table.shop_table td.product-name > a:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals{
                float: none;
                width: 100%;
            }

            .woocommerce .cart-collaterals .cart_totals > h2, .woocommerce-page .cart-collaterals .cart_totals > h2{
                text-transform: uppercase;
                margin-bottom: 10px;
            }

            .woocommerce table.shop_table tbody:first-child tr:first-child td, .woocommerce table.shop_table tbody:first-child tr:first-child th{
                vertical-align: middle;
            }

            #add_payment_method .cart-collaterals .cart_totals tr td, #add_payment_method .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-checkout .cart-collaterals .cart_totals tr td, .woocommerce-checkout .cart-collaterals .cart_totals tr th{
                vertical-align: middle;
            }

            .woocommerce-cart .cart-collaterals .cart_totals tr th{
                width: 25%;
            }

            .woocommerce-cart .cart-collaterals .cart_totals table tr.order-total th, .woocommerce-cart .cart-collaterals .cart_totals table tr.order-total td{
                border-bottom: 1px solid #e2ded3;
            }

            .wcppec-checkout-buttons__separator{
                margin: 0 20px;
            }

            .wcppec-checkout-buttons{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                margin: 0;
            }

            .wcppec-checkout-buttons__button{
                padding: 0;
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .wcppec-checkout-buttons__button:hover{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                color: #ff6d24;
            }

            #add_payment_method .wc-proceed-to-checkout, .woocommerce-cart .wc-proceed-to-checkout, .woocommerce-checkout .wc-proceed-to-checkout{
                padding: 37px 0 0 0;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }

            .wcppec-checkout-buttons__separator{
                line-height: 2.82em;
            }

            .wcppec-checkout-buttons__button img{
                line-height: 2.82em;
            }

            #add_payment_method .cart-collaterals .cart_totals table, .woocommerce-cart .cart-collaterals .cart_totals table, .woocommerce-checkout .cart-collaterals .cart_totals table{
                margin: 0;
            }

            p.cart-empty, p.alewoo-error-cart{
                font-size: 23px;
                line-height: 35px;
                margin-bottom: 25px;
                max-width: 63%;
                margin-top: -7px;
            }

            p.cart-empty + p.return-to-shop{
                margin: 10px 0 0;
            }

            .alewoo-emptycart-wrapper .woocommerce-message a.restore-item{
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .alewoo-emptycart-wrapper .woocommerce-message a.restore-item:hover{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                color: #ff6d24;
            }

            .woocommerce-error{
                border: none;
            }

            .woocommerce-error::before, .woocommerce-info::before, .woocommerce-message::before{
                display: none;
            }

            .alewoocart-page-wrapper ul.woocommerce-error{
                margin-top: 17px;
            }

            .woocommerce .cart-collaterals .cross-sells, .woocommerce-page .cart-collaterals .cross-sells{
                float: none;
                width: 100%;
                margin-bottom: 20px;
            }

            .woocommerce .cart-collaterals .cross-sells .products, .woocommerce-page .cart-collaterals .cross-sells .products{
                margin: 0 -15px;
            }

            .cart-collaterals .cross-sells > h2, .woocommerce-page .cart-collaterals .cross-sells > h2{
                text-transform: uppercase;
                margin-bottom: 29px;
                display: inline-block;
            }

            .woocommerce form .form-row-last, .woocommerce-page form .form-row-last{
                float: none;
            }

            .woocommerce form .form-row-first, .woocommerce-page form .form-row-first{
                float: none;
            }

            .woocommerce form .form-row::after, .woocommerce form .form-row::before, .woocommerce-page form .form-row::after, .woocommerce-page form .form-row::before{
                display: none;
            }

            .woocommerce form .form-row::after, .woocommerce-page form .form-row::after{
                display: none;
            }


            .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register{
                border: none;
                padding: 0;
                margin: 0 0 30px 0;
            }

            ul.woocommerce-error{
                display: block;
            }

            ul.woocommerce-error li{
                min-height: 51px;
            }

            .alewoo-notice-wrapper .woocommerce-notices-wrapper .woocommerce-message{
                min-height: 51px;
            }

            .woocommerce form .form-row-first, .woocommerce form .form-row-last, .woocommerce-page form .form-row-first, .woocommerce-page form .form-row-last{
                width: 100%;
            }

            .woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select{
                border-color: #e2ded3;
            }

            .woocommerce form .form-row.woocommerce-invalid .select2-container, .woocommerce form .form-row.woocommerce-invalid input.input-text, .woocommerce form .form-row.woocommerce-invalid select{
                border-color: #e2ded3;
            }

            .woocommerce form .form-row.woocommerce-invalid label{
                color: #ff6d24;
            }

            .woocommerce form .form-row .required{
                color: #ff6d24;
            }

            .select2-container--default .select2-selection--single{
                border-radius: 0;
                border: 1px solid #e2ded3;
            }

            .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea{
                border: 1px solid #e2ded3;
            }


            .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text{
                letter-spacing: 0;
            }

            .woocommerce form .form-row .input-text::placeholder, .woocommerce-page form .form-row .input-text::placeholder{
                letter-spacing: 0;
            }

            .woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus{
                border: 1px solid #4e413b;
            }

            .woocommerce form .form-row{
                margin: 0 0 15px;
            }

            .woocommerce form .form-row span.woocommerce-input-wrapper textarea{
                padding: 11px 20px;
                height: 152px;
            }

            .woocommerce .alewoo-checkout-wrapper form .form-row input.input-text{
                padding: 11px 0 11px 20px;
            }

            .select2-container .select2-selection--single{
                height: auto;
                border: none;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered{
                line-height: 26px;
                border: 1px solid #e2ded3;
                padding: 11px 0 11px 20px;
                height: 26px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow{
                height: 3.1em;
                right: 15px;
            }

            .select2-dropdown{
                border: 1px solid #e2ded3;
                border-radius: 0;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow b{
                border-color: #4e413b transparent transparent transparent
            }

            .select2-container--default .select2-results__option[aria-selected='true'], .select2-container--default .select2-results__option[data-selected='true']{
                background-color: #f8f7f5;
                color: #4e413b;
            }

            .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{
                border-color: transparent transparent #4e413b transparent;
            }

            .select2-results__option{
                padding: 6px 20px;
            }

            .woocommerce form .form-row label{
                margin-bottom: 6px;
            }

            .woocommerce form .form-row{
                padding: 0;
            }

            .select2-search--dropdown{
                padding: 20px;
            }

            .select2-search--dropdown .select2-search__field{
                padding: 5px 10px;
            }

            .woocommerce ul#shipping_method{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                flex-direction: column;
            }

            .woocommerce ul#shipping_method li input{
                width: auto;
                display: inline-block;
                vertical-align: baseline;
            }

            .woocommerce ul#shipping_method li input{
                margin: 0 5px 0 0;
            }


            .woocommerce form.woocommerce-form-login .form-row label.woocommerce-form__label-for-checkbox{
                display: inline-block;
            }

            .woocommerce form.woocommerce-form-login .form-row label.woocommerce-form__label-for-checkbox input.woocommerce-form__input-checkbox{
                position: relative;
                top: 2px;
                margin: 0 4px;
            }

            .woocommerce form.login p.lost_password a{
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce form.login p.lost_password a:hover{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                color: #ff6d24;
            }

            .woocommerce form.login p.lost_password{
                margin: 0;
            }

            .woocommerce form.login p{
                margin: 0 0 15px;
            }

            #add_payment_method #payment .payment_method_paypal .about_paypal, .woocommerce-cart #payment .payment_method_paypal .about_paypal, .woocommerce-checkout #payment .payment_method_paypal .about_paypal{
                float: none;
                line-height: inherit;
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            #add_payment_method #payment .payment_method_paypal .about_paypal:hover, .woocommerce-cart #payment .payment_method_paypal .about_paypal:hover, .woocommerce-checkout #payment .payment_method_paypal .about_paypal:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            #add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment{
                background-color: transparent;
            }

            #add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods, .woocommerce-checkout #payment ul.payment_methods{
                padding: 0;
                border-bottom: 0;
            }

            #add_payment_method #payment ul.payment_methods li, .woocommerce-cart #payment ul.payment_methods li, .woocommerce-checkout #payment ul.payment_methods li{
                font-weight: 300;
                border-bottom: 1px solid #e2ded3;
                padding: 15px 0;
            }

            #add_payment_method #payment div.payment_box, .woocommerce-cart #payment div.payment_box, .woocommerce-checkout #payment div.payment_box{
                padding: 0;
                background-color: transparent;
                margin: 0;
            }

            #add_payment_method #payment div.payment_box::before, .woocommerce-cart #payment div.payment_box::before, .woocommerce-checkout #payment div.payment_box::before{
                display: none;
            }

            #add_payment_method #payment div.payment_box p:last-child, .woocommerce-cart #payment div.payment_box p:last-child, .woocommerce-checkout #payment div.payment_box p:last-child{
                margin-bottom: 10px;
            }

            #add_payment_method #payment ul.payment_methods li img, .woocommerce-cart #payment ul.payment_methods li img, .woocommerce-checkout #payment ul.payment_methods li img{
                margin: -2px 10px 0 10px;
            }

            .woocommerce table.shop_table{
                margin: 0;
                border: none;
            }

            .woocommerce #payment #place_order, .woocommerce-page #payment #place_order{
                float: none;
            }

            .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
                background-color: transparent;
            }

            #add_payment_method #payment div.form-row, .woocommerce-cart #payment div.form-row, .woocommerce-checkout #payment div.form-row{
                padding: 37px 0;
            }

            #add_payment_method .cart-collaterals .shipping-calculator-button, .woocommerce-cart .cart-collaterals .shipping-calculator-button, .woocommerce-checkout .cart-collaterals .shipping-calculator-button{
                margin-top: 0;
            }

            .woocommerce-checkout #payment ul.payment_methods li.woocommerce-notice--info.woocommerce-info{
                border-bottom: none;
                padding: 20px 30px;
                margin-top: 4px;
            }

            .woocommerce table.shop_attributes td p{
                padding: 0;
            }

            .woocommerce-cart .cart-collaterals .shipping-calculator-form{
                margin: 20px 0 0 0;
            }

            .woocommerce-cart .cart-collaterals .shipping-calculator-form input{
                padding: 11px 0 11px 20px;
            }

            .woocommerce-cart .cart-collaterals .shipping-calculator-button{
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-cart .cart-collaterals .shipping-calculator-button:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-cart .cart-collaterals .shipping-calculator-button:after{
                content: '\\f35d';
                font-family: 'ionicons';
                font-size: 18px;
                position: relative;
                top: 1px;
            }

            section.up-sells.upsells.products > h2{
                text-transform: uppercase;
                margin-bottom: 29px;
            }

            .woocommerce div.product section.up-sells ul.products{
                margin: 0 -15px;
            }

            .woocommerce div.product section.up-sells{
                padding-bottom: 21px;
            }

            .woocommerce div.product section.related{
                padding-bottom: 19px;
            }

            .woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button, .woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .alewoo-cart-wrapper-header a.button{
                display: inline-block;
                width: auto;
                background-color: transparent;
                padding: 15px 50px;
                color: #ff6d24;
                border: 1px solid #ff6d24;
                margin-top: 0;
                border-radius: 0;
                text-transform: uppercase;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: all 100ms ease-in-out !important;
                -moz-transition: all 100ms ease-in-out !important;
                -ms-transition: all 100ms ease-in-out !important;
                -o-transition: all 100ms ease-in-out !important;
                transition: all 100ms ease-in-out !important;
                line-height: 1.4em;
                z-index: 10;
                margin-bottom: 0;
            }

            .woocommerce button.button:hover, .woocommerce #review_form #respond p.form-submit input:hover, .woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover, .woocommerce-page .woocommerce-error .button:hover, .woocommerce-page .woocommerce-info .button:hover, .woocommerce-page .woocommerce-message .button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .alewoo-cart-wrapper-header p.buttons .button:hover{
                background-color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out !important;
                -moz-transition: all 100ms ease-in-out !important;
                -ms-transition: all 100ms ease-in-out !important;
                -o-transition: all 100ms ease-in-out !important;
                transition: all 100ms ease-in-out !important;
                color: #fff;
            }

            .woocommerce form.checkout_coupon p{
                margin: 0 0 15px;
            }

            .woocommerce form.checkout_coupon p.form-row-last{
                margin: 0;
            }
            .woocommerce-page table.cart td.actions .coupon input.input-text:focus{
                border-color: #4e413b;
            }

            .woocommerce form .form-row input.input-text:focus{
                border-color: #4e413b;
            }

            .woocommerce form.woocommerce-cart-form{
                margin-bottom: 61px;
            }

            .woocommerce-cart .cart-collaterals .cart_totals .woocommerce-shipping-destination{
                margin-bottom: 7px;
            }

            .woocommerce #respond input#submit.added::after, .woocommerce a.button.added::after, .woocommerce button.button.added::after, .woocommerce input.button.added::after{
                display: none;
            }

            .alewoo-btn a.button.added{
                display: none;
            }

            .woocommerce #respond input#submit.loading, .woocommerce a.button.loading, .woocommerce button.button.loading, .woocommerce input.button.loading{
                opacity: 1;
            }

            .woocommerce ul.order_details li{
                font-size: 16px;
                line-height: 26px;
                margin-top: 20px;
            }

            .woocommerce ul.order_details li strong{
                font-size: 16px;
                line-height: 26px;
            }

            p.woocommerce-thankyou-order-received{
                min-height: 51px;
                background-color: #f8f7f5;
                padding: 20px 30px;
                margin: 0 0 30px 0;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                align-items: center;
            }

            .woocommerce .woocommerce-order-details > h2{
                text-transform: uppercase;
                margin-bottom: 7px;
            }

            .woocommerce ul.order_details{
                margin: 37px 0 74px 0;
            }

            .woocommerce .woocommerce-customer-details section .woocommerce-column > h2, .woocommerce .woocommerce-order-details section .woocommerce-column > h2, .woocommerce .woocommerce-order-downloads section .woocommerce-column > h2{
                text-transform: uppercase;
                margin-bottom: 18px;
            }

            .woocommerce .woocommerce-customer-details section .woocommerce-column > address, .woocommerce .woocommerce-order-details section .woocommerce-column > address, .woocommerce .woocommerce-order-downloads section .woocommerce-column > address{
                margin-top: 20px;
                border: none;
                padding: 0;
            }

            .woocommerce div section.woocommerce-order-details{
                margin-bottom: 53px;
            }

            .woocommerce .woocommerce-customer-details .woocommerce-customer-details--phone::before, .woocommerce .woocommerce-customer-details .woocommerce-customer-details--email::before{
                display: none;
                margin-left: 0;
            }

            .woocommerce .woocommerce-customer-details .woocommerce-customer-details--email, .woocommerce .woocommerce-customer-details .woocommerce-customer-details--phone{
                padding-left: 0;
            }

            .woocommerce ul#shipping_method li:last-child{
                margin: 0;
            }

            .woocommerce-account .woocommerce-MyAccount-navigation{
                float: none;
                flex-basis: 30%;

            }

            .woocommerce-account .woocommerce-MyAccount-content{
                float: none;
                flex-basis: 70%;
            }

            .alewoo-container nav ul{
                padding-right: 60px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .alewoo-container nav ul li.woocommerce-MyAccount-navigation-link{
                padding: 20px 0;
                width: 100%;
                border-top: 1px solid #e2ded3;
                border-right: 1px solid #e2ded3;
            }

            .alewoo-container nav ul li.woocommerce-MyAccount-navigation-link:first-child{
                border-top: none;
            }

            .alewoo-container nav ul li.woocommerce-MyAccount-navigation-link a{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                color: inherit;
            }

            .alewoo-container nav ul li.woocommerce-MyAccount-navigation-link.is-active a{
                color: #ff6d24;
            }

            .alewoo-container nav ul li.woocommerce-MyAccount-navigation-link:hover a{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-account .woocommerce-MyAccount-content p > a{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-account .woocommerce-MyAccount-content p > a:hover{
                opacity: 0.8;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .alewoo-container{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
            }

            .woocommerce-account .woocommerce-MyAccount-content form > p:last-child{
                margin: 10px 0 0 0;
            }

            .woocommerce-account .addresses .title h3{
                text-transform: uppercase;
            }

            .woocommerce-account .addresses .title .edit{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-account .addresses .title .edit:hover{
                opacity: 0.8;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-account .addresses address{
                font-style: normal;
                margin-top: 2px;
            }

            .woocommerce-account .woocommerce-MyAccount-content form .woocommerce-address-fields > p:last-child{
                margin: 10px 0 0 0;
            }

            .woocommerce-account .woocommerce-MyAccount-content form .woocommerce-address-fields input{
                padding: 11px 0 11px 20px;
            }

            .woocommerce form .form-row input.input-text{
                padding: 11px 0 11px 20px;
            }

            .woocommerce table.my_account_orders{
                font-size: 16px;
            }

            .woocommerce table.my_account_orders td.woocommerce-orders-table__cell-order-number a{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce table.my_account_orders td.woocommerce-orders-table__cell-order-number a:hover{
                opacity: 0.8;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce .woocommerce-order-downloads td.download-product{
                width: 20%;
            }

            .woocommerce .woocommerce-order-downloads td.download-product a{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
                color: inherit;
            }

            .woocommerce .woocommerce-order-downloads td.download-product a:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce .woocommerce-order-downloads td.download-remaining{
                width: 25%;
            }

            .woocommerce .woocommerce-order-downloads{
                margin-bottom: 59px;
            }

            .woocommerce-account .woocommerce-MyAccount-content > p{
                margin: 10px 0 21px;
            }

            .woocommerce-MyAccount-content > h2{
                margin-bottom: 28px;
            }

            .woocommerce-account ol.commentlist.notes li.note p.meta{
                margin-top: 20px;
            }

            .woocommerce .woocommerce-OrderUpdates.notes{
                margin-bottom: 74px;
            }

            .alewoo-fullshop-wrapper{
                padding: 124px 30px 49px 30px;
            }

            .woocommerce div.product section.related > h2, .woocommerce form.woocommerce-checkout .woocommerce-billing-fields > h3, .woocommerce form.woocommerce-checkout .woocommerce-additional-fields > h3, .woocommerce form.woocommerce-checkout div > h3, .woocommerce form.woocommerce-checkout .woocommerce-shipping-fields > h3, .woocommerce h2, .woocommerce-account .addresses .title h3, .woocommerce-MyAccount-content form > h3{
                text-transform: uppercase;
            }

            .woocommerce .alewoo-fullshop-wrapper h2{
                text-transform: uppercase;
                margin-bottom: 18px;
            }

            .woocommerce-account .addresses .title h3, .woocommerce form.woocommerce-checkout .woocommerce-billing-fields > h3, .woocommerce form.woocommerce-checkout .woocommerce-additional-fields > h3, .woocommerce form.woocommerce-checkout div > h3, .woocommerce form.woocommerce-checkout .woocommerce-shipping-fields > h3{
                margin-bottom: 18px;
            }

            .woocommerce form.woocommerce-checkout div > h3{
                margin-bottom: 7px;
            }

            .woocommerce-account-fields p.create-account.woocommerce-validated{
                margin: 0 0 5px 0;
            }

            .woocommerce form.woocommerce-checkout #customer_details{
                margin-bottom: 66px;
            }

            .woocommerce-checkout #payment div.form-row{
                padding: 37px 0 0 0;
            }

            .woocommerce form .form-row:last-child{
                margin: 0;
            }

            .woocommerce form .woocommerce-shipping-fields .form-row:last-child, .woocommerce form .woocommerce-billing-fields .form-row:last-child{
                margin: 0 0 15px;
            }

            .woocommerce form.checkout_coupon p:not(.form-row){
                display: none;
            }

            .woocommerce form.woocommerce-ResetPassword.lost_reset_password p:first-child{
                margin: 0 0 10px;
            }

            .woocommerce form.woocommerce-ResetPassword.lost_reset_password .clear + p.woocommerce-form-row{
                margin: 0;
            }

            .woocommerce-MyAccount-content section:last-child{
                margin-bottom: 0;
            }

            .woocommerce-account h3{
                margin-bottom: 18px;
            }

            .woocommerce .woocommerce-order section:last-child{
                margin-bottom: 0;
            }

            .woocommerce .alewoo-fullshop-wrapper h2, .woocommerce #customer_login h2{
                margin-bottom: 18px;
            }

            .woocommerce .woocommerce-customer-details address{
                border: none;
                padding: 0;
                margin-top: 20px;
            }

            .woocommerce .woocommerce-customer-details .woocommerce-customer-details--phone, .woocommerce .woocommerce-customer-details .woocommerce-customer-details--email{
                margin-top: 0;
            }

            .woocommerce .woocommerce-OrderUpdates.notes li{
                margin-bottom: 25px;
            }

            .woocommerce .woocommerce-OrderUpdates.notes li:last-child{
                margin-bottom: 0;
            }

            .woocommerce h2.woocommerce-order-downloads__title{
                margin-bottom: 8px;
            }

            .woocommerce-account .woocommerce-MyAccount-content p>a:hover{
                opacity: 1;
            }

            .woocommerce .woocommerce-order-details p.order-again a{
                margin-bottom: 29px;
            }

            .woocommerce table.shop_table td.woocommerce-orders-table__cell-order-actions a{
                padding: 15px 40px;
                font-size: 11px;
                box-sizing: border-box;
                line-height: 11px;
            }

            .woocommerce-store-notice, p.demo_store{
                background-color: #ff6d24;
                height: 90px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0;
                line-height: 90px;
            }

            .alewoo-fullshop-wrapper .wcppec-checkout-buttons{
                line-height: 16px;
                margin-bottom: 12px;
            }

            .alewoo-fullshop-wrapper .wcppec-checkout-buttons__button img, .alewoo-fullshop-wrapper .wcppec-checkout-buttons__separator{
                line-height: inherit;
            }

            .alewoo-fullshop-wrapper .wcppec-checkout-buttons__button{
                margin-top: 2px;
            }

            .alewoo-fullshop-wrapper ul.woocommerce-error > li{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: space-between;
            }

            .woocommerce ul.products li.product a img{
                display: inherit;
                margin: 0;
            }

            .woocommerce ul.products li.product .alewoo-thumb-cat{
                margin-bottom: 23px;
            }

            .woocommerce ul.products li.product .alewoo-thumb-cat > a{
                height: 100%;
            }

            .woocommerce div.product div.images .alewoo-gallery-wrapper .woocommerce-product-gallery__image a{
                display: block;
            }


            .woocommerce div.product div.images .alewoo-gallery-wrapper .woocommerce-product-gallery__image{
                width: calc(33.33% - 20px);
                margin: 30px 30px 0 0;
                float: left;
            }

            .woocommerce div.product div.images .alewoo-gallery-wrapper .woocommerce-product-gallery__image:nth-child(3n){
                margin: 30px 0 0 0;
            }

            .animate-fade{
                opacity: 0;
                transition: transform 0.7s 0s cubic-bezier(0.77, 0, 0.175, 1), opacity 0.7s 0s;
                transform: translate(78px);
            }

            .animate-fade.loaded-item {
                transition-delay: 1.05s;
                transform: translate(0);
                opacity: 1;
            }

            .woocommerce .alewoo-fullshop-wrapper h2.fade-animation{
                opacity: 0;
            }

            .woocommerce .alewoo-fullshop-wrapper h2.fade-animation.loaded-animation{
                opacity: 1;
            }

            .woocommerce .woocommerce-breadcrumb{
                margin: 6px 0 0 0;
            }

            .woocommerce div.product section.related > h2.fade-animation{
                opacity: 0;
            }

            .woocommerce div.product section.related > h2.fade-animation.loaded-animation{
                opacity: 1;
            }

            .woocommerce-pagination--without-numbers{
                margin-top: 37px;
            }

            .woocommerce-remove-coupon{
                color: inherit;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-remove-coupon:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .woocommerce-terms-and-conditions-wrapper{
                margin-bottom: 37px;
            }

            .woocommerce-privacy-policy-text a.woocommerce-privacy-policy-link{
                color: #ff6d24;
            }

            .alewoo-cart-wrapper-header{
                position: absolute;
                right: 0;
                top: calc(100% - 1px);
                width: 370px;
                background-color: #fff;
                border: 1px solid #efede7;
                padding: 30px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img, .alewoo-cart-fn-wrapper ul.product_list_widget li img{
                width: 80px;
                height: 80px;
                float: none;
            }

            .woocommerce .widget_shopping_cart .cart_list li, .woocommerce.widget_shopping_cart .cart_list li{
                padding: 0;
                margin-bottom: 20px;
            }

            .woocommerce .widget_shopping_cart .cart_list li a.remove, .woocommerce.widget_shopping_cart .cart_list li a.remove{
                right: 10px;
                left: initial;
            }

            .woocommerce ul.cart_list li > a, .woocommerce ul.product_list_widget li > a{
                float: left;
                margin-right: 20px;
            }

            .alewoo-minicart-title-wrapper{
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                flex-direction: column;
                margin-right: 40px;
            }

            .woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a{
                font-weight: initial;
            }

            .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total{
                border-top: none;
                padding: 0;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: space-between;
            }

            .woocommerce .widget_shopping_cart .buttons a, .woocommerce.widget_shopping_cart .buttons a{
                margin-right: 0;
                margin-bottom: 0;
                margin-top: 9px;
                font-size: 11px;
                line-height: 11px;
                padding: 15px 40px;
            }

            a.alewoo-mini-title:hover{
                color: #ff6d24;
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            a.alewoo-mini-title{
                -webkit-transition: all 100ms ease-in-out;
                -moz-transition: all 100ms ease-in-out;
                -ms-transition: all 100ms ease-in-out;
                -o-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }

            .widget_shopping_cart_content p.woocommerce-mini-cart__buttons{
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .woocommerce .widget_shopping_cart .buttons::after, .woocommerce .widget_shopping_cart .buttons::before, .woocommerce.widget_shopping_cart .buttons::after, .woocommerce.widget_shopping_cart .buttons::before{
                display: none;
            }

            .woocommerce ul.cart_list, .woocommerce ul.product_list_widget, .alewoo-cart-wrapper-header ul.product_list_widget{
                margin-bottom: 22px;
            }

            .woocommerce.widget_shopping_cart .widget_shopping_cart_content > p.woocommerce-mini-cart__total{
                margin: 10px 0 16px 0;
            }

            .woocommerce.widget_shopping_cart .widget_shopping_cart_content > p.woocommerce-mini-cart__buttons{
                margin: 10px 0 0 0;
            }

            .alewoo-products-container .woocommerce.columns-2 ul.products li.product{
                width: 50%;
            }

            .alewoo-products-container .woocommerce.columns-4 ul.products li.product{
                width: 25%;
            }

            .alewoo-left-sidebar-layout{
                flex-direction: row-reverse;
            }

            .alewoo-shop-wrapper.alewoo-left-sidebar-layout aside.sidebar{
                margin-left: 0;
                margin-right: 60px;
            }

            .cart-collaterals .cross-sells > h2.fade-animation, .woocommerce-page .cart-collaterals .cross-sells > h2.fade-animation{
                opacity: 0;
            }

            .cart-collaterals .cross-sells > h2.fade-animation.loaded-animation, .woocommerce-page .cart-collaterals .cross-sells > h2.fade-animation.loaded-animation{
                opacity: 1;
            }

            .woocommerce-account-fields{
                margin-bottom: 6px;
            }

            .alewoo-thankyou-message{
                margin-bottom: 73px;
                margin-top: 76px;
            }

            .alewoo-payment-page ul:last-child{
                margin-bottom: 0;
            }

            .woocommerce-products-header__title{
                text-transform: uppercase;
            }

            .alewoo-shop-wrapper aside.sidebar{
                margin-left: 90px;
                max-width: 254px;
                width: 100%;
            }

            .alewoo-shop-wrapper .content-area{
                flex: 1;
            }

            input[type='text'].searchinput{
                border: none;
                border-bottom: 1px solid #4e413b;
            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper .cart_list li.mini_cart_item{
                padding: 0;
                margin-bottom: 20px;
                position: relative;
            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper .cart_list li a.remove{
                right: 10px;
                left: initial;
                position: absolute;

            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper ul.cart_list li > a{
                float: left;
                margin-right: 20px;
            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper ul.cart_list li > a.remove{
                margin-right: 0;
                display: block;
                height: 1em;
                width: 1em;
            }

            .alewoo-cart-wrapper-header .cart_list li a.remove{
                margin-right: 0;
            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper .total{
                border-top: none;
                padding: 0;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: space-between;
                margin: 10px 0 16px 0;
            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper .buttons a.button, .alewoo-cart-wrapper-header .buttons a{
                margin-right: 0;
                margin-bottom: 0;
                margin-top: 9px;
                font-size: 11px;
                line-height: 11px;
                padding: 15px 40px;
            }

            .alewoo-cart-wrapper-header.alewoo-cart-fn-wrapper p.woocommerce-mini-cart__buttons{
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .woocommerce ul.cart_list li img, .woocommerce ul.product_list_widget li img{
                margin-left: 0;
            }

            .alewoo-cart-wrapper-header p:last-child{
                margin: 10px 0 0 0;
            }

            .woocommerce.widget_products .product_list_widget .star-rating, .woocommerce.widget_top_rated_products .product_list_widget .star-rating, .woocommerce.widget_recent_reviews .product_list_widget .star-rating, .woocommerce.widget_recently_viewed_products .product_list_widget .star-rating {
                 margin-right: 100%;
                 margin-top: 8px;
            }
             .woocommerce.widget_products .product_list_widget .product-title, .woocommerce.widget_top_rated_products .product_list_widget .product-title, .woocommerce.widget_recent_reviews .product_list_widget .product-title, .woocommerce.widget_recently_viewed_products .product_list_widget .product-title {
                 display: block;
                 margin-bottom: 2px;
                 color: inherit;
            }
             .woocommerce.widget_products .product_list_widget .product-title:hover, .woocommerce.widget_top_rated_products .product_list_widget .product-title:hover, .woocommerce.widget_recent_reviews .product_list_widget .product-title:hover, .woocommerce.widget_recently_viewed_products .product_list_widget .product-title:hover {
                 color: #ff6d24;
            }
             .woocommerce.widget_products .product_list_widget del, .woocommerce.widget_top_rated_products .product_list_widget del, .woocommerce.widget_recent_reviews .product_list_widget del, .woocommerce.widget_recently_viewed_products .product_list_widget del {
                 color: inherit;
                 opacity: .5;
                 display: inline-block;
                 margin-right: 8px;
            }
             .woocommerce.widget_products .product_list_widget ins, .woocommerce.widget_top_rated_products .product_list_widget ins, .woocommerce.widget_recent_reviews .product_list_widget ins, .woocommerce.widget_recently_viewed_products .product_list_widget ins {
                 text-decoration: none;
            }
             .woocommerce.widget_products .product_list_widget li, .woocommerce.widget_top_rated_products .product_list_widget li, .woocommerce.widget_recent_reviews .product_list_widget li, .woocommerce.widget_recently_viewed_products .product_list_widget li {
                 margin: 0 0 10px 100px;
                 min-height: 80px;
            }
             .woocommerce.widget_products .product_list_widget li img, .woocommerce.widget_top_rated_products .product_list_widget li img, .woocommerce.widget_recent_reviews .product_list_widget li img, .woocommerce.widget_recently_viewed_products .product_list_widget li img {
                 left: 0;
                 position: absolute;
            }
             .woocommerce.widget_products .product_list_widget li a, .woocommerce.widget_top_rated_products .product_list_widget li a, .woocommerce.widget_recent_reviews .product_list_widget li a, .woocommerce.widget_recently_viewed_products .product_list_widget li a {
                 display: block;
                 width: 100%;
                 color: inherit;
            }
             .woocommerce.widget_product_tag_cloud .tagcloud a {
                 font-size: 17px !important;
                 line-height: 27px !important;
                 color: inherit;
                 margin-bottom: 4px !important;
                 display: inline-block;
                 margin: 0 0 2px;
            }
             .woocommerce.widget_product_tag_cloud .tagcloud a:after {
                 content: '\\/';
                 position: relative;
                 right: -9px;
                 bottom: 0;
                 margin: 0 18px 0 0;
            }
             .woocommerce.widget_product_tag_cloud .tagcloud a:hover {
                 color: #ff6d24;
            }
             .woocommerce.widget_product_tag_cloud .tagcloud a:last-child:after {
                 content: '';
            }
             .woocommerce.widget_product_categories ul li {
                 padding-left: 19px;
                 margin: 4px 0;
            }
             .woocommerce.widget_product_categories ul li a {
                 position: relative;
                 color: inherit;
            }
             .woocommerce.widget_product_categories ul li a:hover {
                 color: #ff6d24;
            }
             .woocommerce.widget_product_categories ul li a:before {
                 content: '\\f111';
                 font-family: Fontawesome;
                 font-size: 6px;
                 position: absolute;
                 top: calc(50% - 12px);
                 left: -18px;
                 color: #ff6d24;
                 font-style: normal;
            }
             
            .woocommerce-input-wrapper select{
                font-style: inherit;
                font-family: inherit;
                font-weight: inherit;
                font-size: inherit;
                border: 1px solid #e2ded3;
                padding: 13px 0 14px 15px;
            }

            .woocommerce table.shop_table_responsive tr:nth-child(2n) td, .woocommerce-page table.shop_table_responsive tr:nth-child(2n) td{
                background: none;
            }

            .woocommerce table.shop_table tr.cart_item{
                border: none;
            }

            .alewoo-shop-wrapper{
                padding: 0 30px;
            }
            .wc-block-product-search .wc-block-product-search__button{
              color: #4e413b;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }
            .wp-block-woocommerce-all-products .wc-block-grid .wc-block-grid__product .wc-block-grid__product-price del {
                font-size: inherit;
                display: inline-block;
                color: inherit
            }
            .wc-block-grid__product .wc-block-grid__product-title{
              text-transform: uppercase;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wc-block-grid__product .wc-block-grid__product-add-to-cart, .wc-block-grid__product .wc-block-grid__product-image, .wc-block-grid__product .wc-block-grid__product-price, .wc-block-grid__product .wc-block-grid__product-rating, .wc-block-grid__product .wc-block-grid__product-title{
              margin-bottom: 6px;
            }

            .wc-block-grid__product .wc-block-grid__product-title:hover{
              color: #ff6d24;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wc-block-grid__product .wc-block-grid__product-add-to-cart{
              margin-top: 23px;
            }

            .wc-block-grid__product-add-to-cart .add_to_cart_button, .wc-block-grid__product-add-to-cart .added_to_cart{
              background-color: transparent;
              padding: 15px 40px !important;
              color: #ff6d24;
              border: 1px solid #ff6d24;
              margin-top: 0;
              border-radius: 0;
              text-transform: uppercase;
              font-size: 11px;
              -webkit-box-sizing: border-box;
              -moz-box-sizing: border-box;
              box-sizing: border-box;
              line-height: 11px !important;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wc-block-price-filter .wc-block-price-filter__controls .wc-block-price-filter__amount{
              border-radius: 0;
            }

            .wc-block-grid__product-add-to-cart .added_to_cart:hover{
              color: #fff;
              background-color: #ff6d24;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wc-block-grid__product-rating .star-rating span:before, .wc-block-grid__product-rating .wc-block-grid__product-rating__stars span:before{
              color: orange;
            }

            .wc-block-featured-product .wc-block-featured-product__price .woocommerce-Price-amount{
              font-size: 23px;
            }

            .wp-block-woocommerce-product-search{
              margin-bottom: 30px;
            }

            .wc-block-grid a img.attachment-woocommerce_thumbnail{
              margin-bottom: 23px;
            }

            .wc-block-grid__product .wc-block-grid__product-image{
              margin-bottom: 0;
            }
            .ale-single-page-template h2.wc-block-grid__product-title{
                margin: 0 0 6px 0;
            }

            .wc-block-grid__product-price .wc-block-grid__product-price__value{
              letter-spacing: inherit;
              font-weight: inherit;
              font-size: inherit;
              line-height: inherit;
              color: inherit;
              display: inline-block;
            }

            .wp-block-woocommerce-all-products .wc-block-grid__product .wc-block-grid__product-image{
              margin-bottom: 23px;
            }

            body.elli-theme-body .elli_main_container .wp-block-woocommerce-all-products .wc-block-grid__product-title a{
              color: inherit;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wp-block-woocommerce-all-products .wc-block-grid__product-title a:hover{
              color: #ff6d24;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wp-block-woocommerce-all-products .wc-block-grid__product-add-to-cart button.wp-block-button__link{
              position: relative;
            }

            .wp-block-woocommerce-all-products .wc-block-grid__product-add-to-cart button.wp-block-button__link:after{
              right: 14px;
              position: absolute;
            }

            .wp-block-woocommerce-all-products .wc-block-grid__product-price .wc-block-grid__product-price__regular{
              line-height: inherit;
              margin-top: auto;
            }

            .wc-block-grid .wc-block-grid__product .wc-block-grid__product-onsale{
              position: absolute;
              top: 0;
              right: 0;
              font-size: 11px !important;
              color: #fff !important;
              z-index: 40;
              display: block;
              padding: 9px 23px;
              background-color: #ff6d24;
              border-radius: unset;
              margin: 0;
              border: none;
            }

            .wc-block-grid .wc-block-grid__product .wc-block-grid__product-price del{
               opacity: 0.5;
               margin-right: 8px;
            }

            .wc-block-grid .wc-block-grid__product .wc-block-grid__product-price ins{
              text-decoration: none;
            }

            .wc-block-product-categories{
              margin-bottom: 30px;
            }

            .wc-block-product-categories.is-list .wc-block-product-categories-list li.wc-block-product-categories-list-item{ 
              padding-left: 19px;
              margin: 4px 0;
            }

            .wc-block-product-categories.is-list .wc-block-product-categories-list li.wc-block-product-categories-list-item a{
              color: inherit;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
              position: relative;
            }

            .wc-block-product-categories.is-list .wc-block-product-categories-list li.wc-block-product-categories-list-item a:before{
              content: '\\f111';
              font-family: 'Fontawesome';
              font-size: 6px;
              position: absolute;
              top: calc(50% - 12px);
              left: -18px;
              color: #ff6d24;
              font-style: normal;
            }

            .wc-block-product-categories.is-list .wc-block-product-categories-list li.wc-block-product-categories-list-item a:hover{
              color: #ff6d24;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wc-block-review-list-item__rating>.wc-block-review-list-item__rating__stars span:before{
              color: orange;
            }

            .wc-block-review-list-item__product{
              width: 100%;
              margin-bottom: 3px;
              text-transform: uppercase;
            }

            .wp-block-woocommerce-price-filter{
              margin-bottom: 30px;
            }

            body.elli-theme-body .elli_main_container .wc-block-review-list-item__product a{
              color: inherit;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            body.elli-theme-body .elli_main_container .wc-block-review-list-item__product a:hover{
              color: #ff6d24;
              -webkit-transition: all 200ms ease-in-out;
              -moz-transition: all 200ms ease-in-out;
              -ms-transition: all 200ms ease-in-out;
              -o-transition: all 200ms ease-in-out;
              transition: all 200ms ease-in-out;
            }

            .wc-block-review-list-item__rating{
              margin-bottom: 3px;
            }

            .wc-block-review-list-item__info{
              margin-bottom: 15px;
            }

            .wc-block-review-list-item__image{
              border-radius: 100%;
            }

            .wc-block-sort-select{
              margin-bottom: 20px;
            }

            body.elli-theme-body .elli_main_container .ale-default-page .wc-block-grid__products, body.elli-theme-body .elli_main_container .story .wc-block-grid__products{
                margin: 0 0 30px 0;  
            }

            body.elli-theme-body .elli_main_container .ale-default-page .wc-block-grid__products .wc-block-grid__product, body.elli-theme-body .elli_main_container .story .wc-block-grid__products .wc-block-grid__product{
                list-style: none;
            }

            body.elli-theme-body .elli_main_container .ale-default-page .wc-block-product-categories-list-item, body.elli-theme-body .elli_main_container .story .wc-block-product-categories-list-item{
                list-style: none;
            }

            body.elli-theme-body .elli_main_container .ale-default-page .wc-block-review-list-item__item, body.elli-theme-body .elli_main_container .story .wc-block-review-list-item__item{
                list-style: none;
            }

            body.elli-theme-body .elli_main_container .ale-default-page .wc-block-review-list, body.elli-theme-body .elli_main_container .story .wc-block-review-list{
                margin: 0;
            }

        ";

        echo "</style>";
    }

    add_action( 'wp_head', 'ale_custom_woo_styles' );

    //Remove breadcrumb
    add_action( 'init', 'ale_remove_wc_breadcrumbs' );
    function ale_remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }

    

   // Single Product Slider for WooCommerce
    add_action( 'after_setup_theme', 'ale_woocommerse_plugin_setup' );

    function ale_woocommerse_plugin_setup() {
        add_theme_support( 'wc-product-gallery-lightbox' );
    }
}