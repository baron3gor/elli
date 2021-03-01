<?php
/*
 * Javascript for Restaurant Menu Sorting
 */
function ale_restaurant_sort_js() {

	global $wp_query;

	$args = array(
		'nonce'       => wp_create_nonce( 'ale-restaurant-sort-nonce' ),
		'url'         => admin_url( 'admin-ajax.php' ),
	);
	
	wp_enqueue_script( 'ale-restaurant-sort',
		get_stylesheet_directory_uri() . '/js/libs/restaurant-sort.js',
		array( 'jquery' ),
		'1.0',
		true );
	wp_localize_script( 'ale-restaurant-sort', 'alerestaurantsort', $args );
}

add_action( 'wp_enqueue_scripts', 'ale_restaurant_sort_js' );



/*
 * AJAX Load More
 */

function ale_ajax_restaurant_sort() {
	check_ajax_referer( 'ale-restaurant-sort-nonce', 'nonce' );

	$ale_m_title 	 = $_POST['title'];
	$ale_m_descr 	 = $_POST['descr'];
	$ale_item_ID 	 = $_POST['tabid'];
	$ale_alt     	 = $_POST['alt'];
	$ale_img_cat 	 = $_POST['img'];
	$ale_cat   	 	 = $_POST['cat'];
	$style 			 = $_POST['style'];
	$ale_items_width = $_POST['iwidth'];
	$ale_ms_cols 	 = $_POST['cols'];
	$ale_gallery_al  = $_POST['galleryalign'];
	$ale_menu_align  = $_POST['menualign'];
	$ale_galleryArr  = json_decode(stripslashes($_POST['gallery']), true);
	$ale_dots_show   = $_POST['dotsshow'];
	$ale_dots_color  = $_POST['dotscolor'];
    $ale_dots_width  = $_POST['dotswidth'];
    $ale_dots_height = $_POST['dotsheight'];
    $ale_dots_top 	 = $_POST['dotstop'];
    $ale_dots_left 	 = $_POST['dotsleft'];
    $ale_dots_unit 	 = $_POST['dotsunit'];

    if($ale_dots_width != '' || $ale_dots_height != '' || $ale_dots_top != '' || $ale_dots_color != '' || $ale_dots_left != '') {
        $ale_dotsstyle  = 'style="';
        $ale_dotsstyle .= $ale_dots_width != '' ? 'width: ' . $ale_dots_width . 'px; ' : '';
        $ale_dotsstyle .= $ale_dots_height != '' ? 'height: ' . $ale_dots_height . 'px; ' : '';
        $ale_dotsstyle .= $ale_dots_top != '' ? 'top: ' . $ale_dots_top . $ale_dots_unit . ';' : '';
        $ale_dotsstyle .= $ale_dots_color != '' ? 'background: radial-gradient(' . $ale_dots_color . ',12.8%,transparent 13%); background-size: 21px 21px;' : '';
        $ale_dotsstyle .= $ale_dots_left != '' ? 'left: ' . $ale_dots_left . $ale_dots_unit . ';' : '';
        $ale_dotsstyle .= '"';
    }

	ob_start(); ?>

	<?php if($style == 'style1' || $style == 'style2') : ?>
		<div class="elli-tab-descr current<?php if($style == 'style2') : echo esc_attr(' tab-descr-gallery', 'elli'); endif; ?>" data-tab="<?php echo esc_attr($ale_tab_count, 'elli') ; ?>">
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
	    } ?> 
	<?php if($style == 'style1' || $style == 'style2') : ?>
		</div>
	<?php endif; ?>
	<?php
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_restaurant_sort', 'ale_ajax_restaurant_sort' );
add_action( 'wp_ajax_nopriv_ale_ajax_restaurant_sort', 'ale_ajax_restaurant_sort' );
