<?php
/**
 * Add admin scripts and styles
 */
function ale_add_scripts($hook) {
	
	// Add general scripts & styles
	wp_enqueue_style('aletheme-admin-css', ALETHEME_URL . '/assets/css/admin.css', array(), ALETHEME_THEME_VERSION);
	wp_register_style( 'fontawesome', ALETHEME_THEME_URL . '/css/font-awesome.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'ioni', ALETHEME_THEME_URL . '/css/ionicons.min.css', array(), ALETHEME_THEME_VERSION, 'all');

	wp_enqueue_script('aletheme-colorpicker', ALETHEME_URL.'/assets/js/colorpicker.js', array('jquery'));
	wp_enqueue_script('aletheme-admin-js', ALETHEME_URL . '/assets/js/admin.js', array('jquery', 'aletheme-colorpicker'), ALETHEME_THEME_VERSION);
    wp_enqueue_script( 'aletheme-metaboxes', ALETHEME_URL . '/assets/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
    wp_enqueue_script( 'megamenu-check', ALETHEME_URL . '/assets/js/megamenu.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );

    
    wp_enqueue_style('fontawesome');


	// Add scripts for metaboxes
  	if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
		wp_enqueue_script( 'aletheme-metaboxes', ALETHEME_URL . '/assets/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
		wp_enqueue_script( 'aletheme-shortcodes', ALETHEME_URL . '/assets/js/shortcodes.js', array( 'jquery', 'thickbox') );
	    wp_enqueue_script('aletheme-metabox-gallery', ALETHEME_URL . '/assets/js/metabox-gallery.js', array('jquery', 'jquery-ui-sortable'));
	   wp_enqueue_style('ioni');
    }
}

add_action( 'admin_enqueue_scripts', 'ale_add_scripts', 10 );



/**
 * Add custom post types to navigation 
 */
function ale_admin_custom_to_navigation() {
	$post_types = get_post_types(array(
		'show_in_nav_menus' => true
	), 'object' );
	
	foreach ( $post_types as $post_type ) {
		if ( $post_type->has_archive ) {
			add_filter( 'nav_menu_items_' . $post_type->name, 'ale_admin_custom_to_navigation_checkbox', null, 3 );
		}
	}
}
add_action( 'admin_head-nav-menus.php', 'ale_admin_custom_to_navigation');

/**
 * Add custom post type to navigation
 * @global int $_nav_menu_placeholder
 * @global object $wp_rewrite
 * @param array $posts
 * @param array $args
 * @param string $post_type
 * @return array 
 */
function ale_admin_custom_to_navigation_checkbox($posts, $args, $post_type) {
	global $_nav_menu_placeholder, $wp_rewrite;
	$_nav_menu_placeholder = ( 0 > $_nav_menu_placeholder ) ? intval($_nav_menu_placeholder) - 1 : -1;

	$archive_slug = $post_type->has_archive === true ? $post_type->rewrite['slug'] : $post_type->has_archive;
	if ( $post_type->rewrite['with_front'] )
		$archive_slug = substr( $wp_rewrite->front, 1 ) . $archive_slug;
	else
		$archive_slug = $wp_rewrite->root . $archive_slug;

	array_unshift( $posts, (object) array(
		'ID' => 0,
		'object_id' => $_nav_menu_placeholder,
		'post_content' => '',
		'post_excerpt' => '',
		'post_title' => $post_type->labels->all_items,
		'post_type' => 'nav_menu_item',
		'type' => 'custom',
		'url' => site_url( $archive_slug ),
	) );
	
	return $posts;
}


/**
 * Add custom columns to admin data tables 
 */
function ale_admin_table_columns() {
	if (function_exists('aletheme_get_post_types')) {
		foreach (aletheme_get_post_types() as $type => $config) {
			if (isset($config['columns']) && count($config['columns'])) {
				foreach ($config['columns'] as $column) {
					if (function_exists('ale_admin_posts_' . $column . '_column_head') && function_exists('ale_admin_posts_' . $column . '_column_content')) {
						add_filter('manage_' . $type . '_posts_columns', 'ale_admin_posts_' . $column . '_column_head', 10); 
						add_action('manage_' . $type . '_posts_custom_column', 'ale_admin_posts_' . $column . '_column_content', 10, 2);						
					}
				}
			}
		}
	}
}
add_action('admin_init', 'ale_admin_table_columns', 100);

/**
 * Add featured image header column to admin data-table
 * 
 * @param array $defaults
 * @return array 
 */
function ale_admin_posts_featured_column_head($defaults) {
	ale_array_put_to_position($defaults, 'Image', 1, 'featured-image');
	return $defaults;  
}

/**
 * Add featured image data column to admin data-table
 *
 * @param string $column_name
 * @param int $post_id 
 */
function ale_admin_posts_featured_column_content($column_name, $post_id) {
	if ($column_name == 'featured-image') {  
		$post_featured_image = ale_get_featured_image_src($post_id);  
		$ale_get_alt 		 = get_post_meta($post_id, '_wp_attachment_image_alt', true);
		if ($post_featured_image) {  
			echo '<img src="' . esc_url($post_featured_image) . '" alt="' . $ale_get_alt .'" width="60" />';
		}  
	}
}


/**
 * Add featured image header column to admin data-table
 * 
 * @param array $defaults
 * @return array 
 */
function ale_admin_posts_first_image_column_head($defaults) {  
	ale_array_put_to_position($defaults, 'Image', 1, 'first-image');
	return $defaults;  
}

/**
 * Add featured image data column to admin data-table
 *
 * @param string $column_name
 * @param int $post_id 
 */
function ale_admin_posts_first_image_column_content($column_name, $post_id) {


	if ($column_name == 'first-image') {  
		if (has_post_thumbnail($post_id)) :
			$ale_get_alt = get_post_meta($post_id, '_wp_attachment_image_alt', true);
			$image 		 = ale_get_featured_image_src($post_id);
		else :
			$ale_get_alt = get_post_meta($post_id, '_wp_attachment_image_alt', true);
			$image 		 = ale_get_first_attached_image_src($post_id);
		endif;	

		if ($image) {  
			echo '<img src="' . esc_url($image) . '" alt="' . esc_html($ale_get_alt) . '" width="60" />';
		}  
	}
}
