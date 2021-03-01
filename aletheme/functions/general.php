<?php ob_start();
/**
 * Echo meta for post
 * @param string $key
 * @param boolean $single
 * @param mixed $post_id 
 */
function ale_meta($key, $single = true, $post_id = null) {
	echo ale_get_meta($key, $single, $post_id);
}
/**
 * Find meta for post
 * @param string $key
 * @param boolean $single
 * @param mixed $post_id 
 */
function ale_get_meta($key, $single = true, $post_id = null) {
	if (null === $post_id) {
		$post_id = get_the_ID();
	}
	$key = 'ale_' . $key;
	return get_post_meta($post_id, $key, $single);
}
/**
 * Apply filters to post meta
 * @param string $key
 * @param string $filter
 * @param mixed $post_id 
 */
function ale_filtered_meta($key, $filter = 'the_content', $post_id = null) {
	echo apply_filters($filter, ale_get_meta($key, true, $post_id));
}


function ale_return( $s ) {
    return $s;
}

/**
 * Display permalink 
 * 
 * @param int|string $system
 * @param int $isCat 
 */
function ale_permalink($system, $isCat = false) {
    echo ale_get_permalink($system, $isCat);
}
/**
 * Get permalink for page, post or category
 * 
 * @param int|string $system
 * @param bool $isCat
 * @return string
 */
function ale_get_permalink($system, $isCat = 0)  {
    if ($isCat) {
        if (!is_numeric($system)) {
            $system = get_cat_ID($system);
        }
        return get_category_link($system);
    } else {
        $page = ale_get_page($system);
        
        return null === $page ? '' : get_permalink($page->ID);
    }
}

/**
 * Display custom excerpt
 */
function ale_excerpt() {
    echo ale_get_excerpt();
}
/**
 * Get only excerpt, without content.
 * 
 * @global object $post
 * @return string 
 */
function ale_get_excerpt() {
    global $post;
	$excerpt = trim($post->post_excerpt);
	$excerpt = $excerpt ? apply_filters('the_content', $excerpt) : '';
    return $excerpt;
}

/**
 * Display first category link
 */
function ale_first_category() {
    $cat = ale_get_first_category();
	if (!$cat) {
		echo '';
		return;
	}
    echo '<a href="' . ale_get_permalink($cat->cat_ID, true) . '">' . esc_attr($cat->name) . '</a>';
}
/**
 * Parse first post category
 */
function ale_get_first_category() {
    $cats = get_the_category();
    return isset($cats[0]) ? $cats[0] : null;
}

/**
 * Get page by name, id or slug. 
 * @global object $wpdb
 * @param mixed $name
 * @return object 
 */
function ale_get_page($slug) {
    global $wpdb;
    
    if (is_numeric($slug)) {
        $page = get_page($slug);
    } else {
        $page = $wpdb->get_row($wpdb->prepare("SELECT DISTINCT * FROM $wpdb->posts WHERE post_name=%s AND post_status=%s", $slug, 'publish'));
    }
    
    return $page;
}

/**
 * Find all subpages for page
 * @param int $id
 * @return array
 */
function ale_get_subpages($id) {
    $query = new WP_Query(array(
        'post_type'         => 'page',
        'orderby'           => 'menu_order',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
        'post_parent'       => (int) $id,
    ));

    $entries = array();
    while ($query->have_posts()) : $query->the_post();
        $entry = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'link' => get_permalink(),
            'content' => get_the_content(),
        );
        $entries[] = $entry;
    endwhile;

    return $entries;
}




/**
 * Generate random number
 *
 * Creates a 4 digit random number for used
 * mostly for unique ID creation. 
 * 
 * @return integer 
 */
function ale_get_random_number() {
	return substr( md5( uniqid( rand(), true) ), 0, 4 );
}

function ale_array_put_to_position(&$array, $object, $position, $name = null) {
	$count = 0;
	$return = array();
	foreach ($array as $k => $v) {  
			// insert new object
			if ($count == $position) {  
					if (!$name) $name = $count;
					$return[$name] = $object;
					$inserted = true;
			}  
			// insert old object
			$return[$k] = $v;
			$count++;
	}  
	if (!$name) $name = $count;
	if (!$inserted) $return[$name];
	$array = $return;
	return $array;
}

/**
 * Add combined actions for AJAX.
 * 
 * @param string $tag
 * @param string $function_to_add
 * @param integer $priority
 * @param integer $accepted_args 
 */
function ale_add_ajax_action($tag, $function_to_add, $priority = 10, $accepted_args = 1) {
	add_action('wp_ajax_' . $tag, $function_to_add, $priority, $accepted_args);
	add_action('wp_ajax_nopriv_' . $tag, $function_to_add, $priority, $accepted_args);
}

/**
 * Get contact form 7 from content
 * @param string $content
 * @return string 
 */
function ale_contact7_form($content) {
	$matches = array();
	preg_match('~(\[contact\-form\-7.*\])~simU', $content, $matches);
	return $matches[1];
}

/**
 * Remove contact form from content
 * @param string $content
 * @return string
 */
function ale_remove_contact7_form($content) {
	$content = preg_replace('~(\[contact\-form\-7.*\])~simU', '', $content);
	return $content;
}

/**
 * Check if it's a blog page
 * @global object $post
 * @return boolean 
 */
function ale_is_blog () {
	global  $post;
	$posttype = get_post_type($post);
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ($posttype == 'post')) ? true : false ;
}

add_action( 'widgets_init', 'elli_theme_sidebars' );

function elli_theme_sidebars() {
    if ( function_exists('register_sidebar') ) {

        $my_sidebars = array(
            array(
                'name' => 'Footer (Column 1)',
                'id' => 'footer1',
                'description' => 'Appears on Footer. (Column 1)',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>'
            ),
            array(
                'name' => 'Footer (Column 2)',
                'id' => 'footer2',
                'description' => 'Appears on Footer. (Column 2)',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>'
            ),
            array(
                'name' => 'Footer (Column 3)',
                'id' => 'footer3',
                'description' => 'Appears on Footer. (Column 3)',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>'
            ), 
            array(
                'name' => 'Footer (Column 4)',
                'id' => 'footer4',
                'description' => 'Appears on Footer. (Column 4)',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>'
            ), 
            array(
                'name' => 'Blog Sidebar',
                'id' => 'blog-sidebar',
                'description' => 'Appears on Blog pages',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>',
            ), 
            array(
                'name' => 'Side Panel Menu',
                'id' => 'side-menu-toggle',
                'description' => 'Appears in the Side Menu.',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>',
            ), 
            array(
                'name' => 'WooCommerce',
                'id' => 'alewoo-shop-sidebar',
                'description' => 'Appears in the WooCommerce page.',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>',
            ), 
            array(
                'name' => 'Sidebar Template Homepage',
                'id' => 'ale-template-sidebar',
                'description' => 'Appears as the left sidebar on Left Sidebar Template',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget_title">',
                'after_title' => '</h5>',
            ),
        );

        foreach( $my_sidebars as $sidebar ) {
            $args = $sidebar;
            register_sidebar( $args );
          }
    }
}

//Support automatic-feed-links
add_theme_support( 'automatic-feed-links' );

//Unreal construction to passed/hide "Theme Checker Plugin" recommendation about Header nad Background
if('Theme Checke' == 'Hide') {
    add_theme_support( 'custom-header');
    add_theme_support( 'custom-background');
}


function ale_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ( '' == $explicit_excerpt ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    }
    else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes( $text ); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
        array_pop($words);
        array_push($words, '[&hellip;]');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt',$text);
    }
    return $text;
}



// Breadcrumbs Custom Function

function ale_get_breadcrumbs() {

    $text['home']     = esc_html__('Home','elli');
    $text['category'] = esc_html__('Archive','elli').' "%s"';
    $text['search']   = esc_html__('Search results','elli').' "%s"';
    $text['tag']      = esc_html__('Tag','elli').' "%s"';
    $text['author']   = esc_html__('Author','elli').' %s';
    $text['404']      = esc_html__('Error 404','elli');

    $show_current   = 1;
    $show_on_home   = 0;
    $show_home_link = 1;
    $show_title     = 1;
    $delimiter      = ' / ';
    $before         = '<span class="current">';
    $after          = '</span>';

    global $post;
    $home_link    = esc_url(home_url('/'));
    $link_before  = '<span typeof="v:Breadcrumb">';
    $link_after   = '</span>';
    $link_attr    = ' rel="v:url" property="v:title"';
    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        if(isset($post->post_parent)){$my_post_parent = $post->post_parent;}else{$my_post_parent=1;}
        $parent_id    = $parent_id_2 = $my_post_parent;
    $frontpage_id = get_option('page_on_front');

    if (is_home() || is_front_page()) {

        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

        if(get_option( 'page_for_posts' )){
                echo '<div class="breadcrumbs"><a href="' . esc_url($home_link) . '">' . esc_attr($text['home']) . '</a>'.ale_wp_kses($delimiter).' '.__('Blog','elli').'</div>';
        }
    }
    else {

        echo '<div class="breadcrumbs">';
        if ($show_home_link == 1) {
            echo sprintf($link, $home_link, $text['home']);
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo ale_wp_kses($delimiter);
        }

        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo ale_wp_kses($cats);
            }
            if ($show_current == 1) echo ale_wp_kses($before) . sprintf($text['category'], single_cat_title('', false)) . ale_wp_kses($after);

        } elseif ( is_search() ) {
            echo ale_wp_kses($before) . sprintf($text['search'], get_search_query()) . ale_wp_kses($after);

        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . ale_wp_kses($delimiter);
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . ale_wp_kses($delimiter);
            echo ale_wp_kses($before) . get_the_time('d') . ale_wp_kses($after);

        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . ale_wp_kses($delimiter);
            echo ale_wp_kses($before) . get_the_time('F') . ale_wp_kses($after);

        } elseif ( is_year() ) {
            echo ale_wp_kses($before) . get_the_time('Y') . ale_wp_kses($after);

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo ale_wp_kses($delimiter) . ale_wp_kses($before) . get_the_title() . ale_wp_kses($after);
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo ale_wp_kses($cats);
                if ($show_current == 1) echo ale_wp_kses($before) . get_the_title() . ale_wp_kses($after);
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo ale_wp_kses($before) . esc_attr($post_type->labels->singular_name) . ale_wp_kses($after);

        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
            echo ale_wp_kses($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo ale_wp_kses($delimiter) . ale_wp_kses($before) . get_the_title() . ale_wp_kses($after);

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo ale_wp_kses($before) . get_the_title() . ale_wp_kses($after);

        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo ale_wp_kses($breadcrumbs[$i]);
                    if ($i != count($breadcrumbs)-1) echo ale_wp_kses($delimiter);
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo ale_wp_kses($delimiter);
                echo ale_wp_kses($before) . get_the_title() . ale_wp_kses($after);
            }

        } elseif ( is_tag() ) {
            echo ale_wp_kses($before) . sprintf($text['tag'], single_tag_title('', false)) . ale_wp_kses($after);

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo ale_wp_kses($before) . sprintf($text['author'], $userdata->display_name) . ale_wp_kses($after);

        } elseif ( is_404() ) {
            echo ale_wp_kses($before) . esc_attr($text['404']) . ale_wp_kses($after);
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__('Page','elli') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div><!-- .breadcrumbs -->';

    }
}


// TGM Script code

/**
 * Load translations for TGMPA.
 */

function ale_load_textdomain() {
        load_theme_textdomain( 'tgmpa', get_template_directory() . '/lang/tgm' );
}
add_action( 'init', 'ale_load_textdomain', 1 );



/**
 * Init TGM Activation
 */

add_action( 'tgmpa_register', 'ale_register_required_plugins' );
function ale_register_required_plugins() {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            array(
                'name'      => 'Redux Framework',
                'slug'      => 'redux-framework',
                'required'  => true,
            ), 
            array(
                'name'             => 'Contact Form 7',
                'slug'             => 'contact-form-7',
                'force_activation' => false,
                'required'         => true,
            ),
            array(
                'name'             => 'Elementor',
                'slug'             => 'elementor',
                'force_activation' => false,
                'required'         => true,
            ),
            array(
                'name'                  => 'Elli Core',
                'slug'                  => 'cpt-elli',
                'source'                => get_template_directory() . '/plugins/cpt-elli.zip',
                'required'              => true,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
        );

        // Change this to your theme text domain, used for internationalising strings
        $theme_text_domain = 'elli';

        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */

        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );

}

function ale_return_esc($ale_value){
    return translate( $ale_value, 'elli' );
}

function ale_wp_kses($ale_string){
        $allowed_tags = array(
            'img' => array(
                'src' => array(),
                'alt' => array(),
                'width' => array(),
                'height' => array(),
                'class' => array(),
            ),
            'a' => array(
                'href' => array(),
                'title' => array(),
                'class' => array(),
            ),
            'span' => array(
                'class' => array(),
            ),
            'div' => array(
                'class' => array(),
                'id' => array(),
            ),
            'h1' => array(
                'class' => array(),
                'id' => array(),
            ),
            'h2' => array(
                'class' => array(),
                'id' => array(),
            ),
            'h3' => array(
                'class' => array(),
                'id' => array(),
            ),
            'h4' => array(
                'class' => array(),
                'id' => array(),
            ),
            'h5' => array(
                'class' => array(),
                'id' => array(),
            ),
            'h6' => array(
                'class' => array(),
                'id' => array(),
            ),
            'p' => array(
                'class' => array(),
                'id' => array(),
            ),
			'strong' => array(
				'class' => array(),
				'id' => array(),
			),
			'i' => array(
				'class' => array(),
				'id' => array(),
			),
			'del' => array(
				'class' => array(),
				'id' => array(),
			),
			'ul' => array(
				'class' => array(),
				'id' => array(),
			),
			'li' => array(
				'class' => array(),
				'id' => array(),
			),
			'ol' => array(
				'class' => array(),
				'id' => array(),
			),
            'input' => array(
                'class' => array(),
                'id' => array(),
                'type' => array(),
                'style' => array(),
                'name' => array(),
                'value' => array(),
            ),
            'blockquote' => array(
                'class' => array(),
                'id' => array(),
            ),
        );
        if (function_exists('wp_kses')) {
                return wp_kses($ale_string,$allowed_tags);
        }
}


/*
 * Title tag support now required / August 25, 2015
 * */
add_action( 'after_setup_theme', 'ale_theme_slug_setup' );
function ale_theme_slug_setup() {

        add_theme_support( 'title-tag' );
}

/*
 * Check if exist next page to show the pagination
 * */
function ale_show_posts_nav() {
        global $wp_query;
        return ($wp_query->max_num_pages > 1);
}


/*
 * Custom Excerpt length
 */
function ale_limit_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}


//Create a container with border hover style
function ale_hover_border_wrapper_start(){
        echo "<div class='border_style'>";
}
function ale_hover_border_wrapper_end(){
        echo "<div class='top_border'></div><div class='bottom_border'></div><div class='left_border'></div><div class='right_border'></div> </div>";
}


function ale_product_massonry( $args = null ) {
    $posts = get_posts( ['post_type' => 'product', 'posts_per_page' => -1]);

    $select_posts = [];

    foreach( $posts as $post ) {
        $select_posts[$post->ID] = ucfirst( $post->post_title );
        /*
        // Also need to check for $post->status == 'publish' and post-password == "" (empty)
        //guid is the link.
        //check if 'post_type' is post;
        */
    }
    return $select_posts;
}

function ale_check_productid($product_id){
    $posts = get_posts( array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
    ));

    $select_post = '';
    $get_id = strpos($product_id, 'alewoo');
    $check_id = in_array ($product_id, $posts);
    
    if ($check_id === true && $get_id === false) {
        $select_post = $product_id;
    } elseif($get_id === 0) {
        $product_id = str_replace('alewoo','', $product_id);
        $product_id = intval($product_id);
        $select_post = $posts[$product_id];

    }

    return $select_post;
}


function ale_category_list( $cat ){
    $query_args = array(
        'orderby'       => 'ID',
        'order'         => 'DESC',
        'hide_empty'    => 1,
        'taxonomy'      => $cat
    );

    $categories = get_categories( $query_args );
    $options = array( esc_html__('0', 'elli') => 'All Category');
    if(is_array($categories) && count($categories) > 0){
        foreach ($categories as $cat){
            $options[$cat->term_id] = $cat->name;
        }
        return $options;
    }
}

function ale_taxonomy_list( $cat ){

    $query_args = array(
        'taxonomy'      => $cat,
        'orderby'       => 'ID',
        'order'         => 'DESC',
        'hide_empty'    => 1        
    );

    $categories = get_categories( $query_args );
    if(is_array($categories) && count($categories) > 0){
        foreach ($categories as $cat){
            $options[$cat->slug] = $cat->name;
        }
        return $options;
    }
}

function ale_excerpt_twi( $num ) {

    $excerpt         = get_the_excerpt();
    $trimmed_content = wp_html_excerpt( $excerpt, $num_words = $num, $more   = null );

    echo ale_wp_kses( $trimmed_content . '...' );
}


if ( class_exists( 'Ale_Resize' ) ) {
    function ale_resize( $url, $width = false, $height = false, $crop = false ) {
        $fw_resize = Ale_Resize::getInstance();
        $response  = $fw_resize->process( $url, $width, $height, $crop );
        return ( ! is_wp_error( $response ) && ! empty( $response['src'] ) ) ? $response['src'] : $url;
    }
}

function ale_check_escape( $output = "" , $esc = false ) {
    if( $esc ){
        $output = ale_wp_kses( $output );
    }

    return $output;
}


function ale_widget_get_pagination($wp_query = false, $range = 8, $before = false, $after = false, $echo = true ){
        global $paged,$page;

        if( empty( $paged )){
            $paged = $page;
        }

        $array = array(
            'current' => max( 1, $paged ),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'show_all' => false,
            'prev_next' => true,
            'prev_text' => ale_wp_kses("<i class=\"ion-ios-arrow-thin-left\"></i>", "elli"),
            'next_text' => ale_wp_kses("<i class=\"ion-ios-arrow-thin-right\"></i>", "elli"),
        );      

        $pagination = paginate_links( $array );

        if( empty( $pagination ) ){
            return;
        }

        $output = '<div class="pagination-wrapper">';
        $output .= $pagination;
        $output .= '</div>'; 

        if( $echo ){
            echo ale_check_escape($output);
        }else{
            return $output;
        }
    }

function ale_page_links() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
 
    $pagination = array(
        'base'               => '%_%',
        'format'             => '?paged=%#%',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'type' => 'list',
        'prev_next' => true,
        'next_text' => '<i class="ion-ios-arrow-thin-right"></i>',
        'prev_text' => '<i class="ion-ios-arrow-thin-left"></i>'
        );
 
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
 
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    $pag = paginate_links($pagination);

    if( empty( $pag ) ){
        return;
    }

    $output = '<div class="pagination-wrapper">';
    $output .= $pag;
    $output .= '</div>'; 

    echo ale_check_escape($output);

}    


if( ! function_exists("ale_elementor_addons_js")){
    /**
     * JS Elementor Files
     */ 
    function ale_elementor_addons_js(){

        //load google api
        global $ale_red_option;
        if(!empty($ale_red_option['google-maps-api'])) :
            $api_key = $ale_red_option['google-maps-api'];
        endif;

        if( ! empty( $api_key ) ){
            $googlemaps_url = add_query_arg( 'key', urlencode( $api_key ), "//maps.googleapis.com/maps/api/js" );
            wp_enqueue_script('googlemaps',$googlemaps_url,array(), '1.0.0');
        }else{
            wp_enqueue_script('googlemaps','//maps.googleapis.com/maps/api/js');
        }

    }
}
add_action( "elementor/preview/enqueue_scripts", "ale_elementor_addons_js", 10, 1 );

if( ! function_exists("ale_social_media_share") ){
    /**
     * Social Media Share Function
     * 
     * @global class $post 
     * 
     * @param  array $atts
     * @param  string $content
     * @return string $output
     */
    function ale_social_media_share( $atts = array(), $content = null ) {
         global $ale_red_option;
            
        //defaults
        extract(shortcode_atts(array(  
            "postid"  => ''
        ), $atts));

        if( empty( $postid) ){
            global $post;   
            $postid = $post->ID;
        }

        //Available Social Media Icons
        $ale_social_share_list = apply_filters("ale_social_share_list",array(  
                     "Email"       => array("icon_name" => "mail", "url" => "mailto:?body=[URL]", "popup" => false ),
                    "Facebook"    => array("icon_name" => "facebook", "url" => "http://www.facebook.com/sharer/sharer.php?u=[URL]&amp;title=[TITLE]", "popup" => true ), 
                    "Twitter"     => array("icon_name" => "twitter", "url" => "http://twitter.com/home?status=[TITLE]+[URL]", "popup" => true ), 
                    "Pinterest"   => array("icon_name" => "pinterest", "url" => "http://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&amp;url=[URL]&amp;is_video=false&amp;description=[TITLE]", "popup" => true ), 
                    "Tumblr"      => array("icon_name" => "tumblr", "url" => "http://tumblr.com/share?url=[URL]&amp;title=[TITLE]", "popup" => true ), 
                    "Linkedin"    => array("icon_name" => "linkedin", "url" => "http://www.linkedin.com/shareArticle?mini=true&amp;url=[URL]&amp;title=[TITLE]&amp;source=", "popup" => true ),   
                    "StumbleUpon" => array("icon_name" => "stumbleupon", "url" => "http://www.stumbleupon.com/submit?url=[URL]&amp;title=[TITLE]", "popup" => true ),  
                    "Vkontakte"   => array("icon_name" => "vkontakte", "url" => "http://vkontakte.ru/share.php?url=[URL]", "popup" => true ), 
                    "Delicious"   => array("icon_name" => "delicious", "url" => "http://del.icio.us/post?url=[URL]&amp;title=[TITLE]]&amp;notes=", "popup" => true ), 
                    "Reddit"    => array("icon_name" => "reddit", "url" => "http://www.reddit.com/submit?url=[URL]&amp;title=[TITLE]", "popup" => true )
            ));



        $title = urlencode(get_the_title( $postid ));
        $permalink = urlencode(get_the_permalink( $postid ));
        $image = urlencode(ale_get_attachment_image_src(get_post_thumbnail_id( $postid )));
        $output = "";

        foreach ($ale_social_share_list as $key => $value){

                $value["url"] = str_replace("[URL]", $permalink, $value["url"] );
                $value["url"] = str_replace("[TITLE]", $title, $value["url"] );
                $value["url"] = str_replace("[MEDIA]", $image, $value["url"] );

                $i_name = $value["icon_name"];

                if($ale_red_option['share-multi-check'][$i_name] == 1) :
                $output .= '<li class="'.$value["icon_name"].'">';
                $output .= $value["popup"] ?
                            '<a class="icon-'.$value["icon_name"].' " href="#" data-url="'. $value["url"] .'" title="'. $key .'">':
                            '<a class="icon-'.$value["icon_name"].' " href="'. $value["url"] .'" title="'. $key .'">';          
                $output .= '<span>'. $key .'</span>';

                $output .= '</a>';
                $output .= '</li>';
                endif;
        }

        return '<ul class="social_share_list">'.$output.'</ul>';
    }
}




if( ! function_exists("ale_get_attachment_image_src") ){

    /**
     * Get Attachment Image Source
     * Returns url of the attachment image by using native WP function
     * in some shortcode settins the image can be ID or URL. 
     * This function only works when ID provided
     *
     * @since 1.0
     *
     * @param  string $image image id or url
     * @param  string $size  thumbnail width
     * @return array $url 
     */
    function ale_get_attachment_image_src( $image = "", $size = "full" ) {

        $url = is_numeric(trim($image)) ? wp_get_attachment_image_src( $image, $size ) : $image ;
        $url = is_array( $url ) ? $url[0] : $url ;  

        return $url;
    }
}



if( ! function_exists("ale_social_media_share_shortcode") ){
    /**
     * Social Media Share Shortcode
     * 
     * @global class $post 
     * 
     * @param  array $atts
     * @param  string $content
     * @return string $output
     */
    function ale_social_media_share_shortcode( $atts = array(), $content = null ) {         
        if( function_exists( "ale_social_media_share" ) ){
         return ale_social_media_share(  $atts = array(), $content = null  );
        } 
    }
}



if( ! function_exists("ale_get_woo_product_categories_slugs") ){
    function ale_get_woo_product_categories_slugs(){

        if( ! taxonomy_exists("product_cat") ){
            return array();
        }

        // Product Categories       
        $product_args = array(
            'type'                     => 'post',
            'child_of'                 => 0, 
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 1,
            'hierarchical'             => 1,  
            'taxonomy'                 => 'product_cat',
            'pad_counts'               => false
            );
        
        
        $product_categories = get_categories($product_args);
        $ale_product_getcat = array();
        
        if(is_array($product_categories)){
            foreach ($product_categories as $category_list ) {
                $ale_product_getcat[$category_list->slug] = $category_list->cat_name;
            }
        }
        
        return $ale_product_getcat;
        
    }
}


if( ! function_exists("ale_create_media_output") ){
    /**
     * Create media players
     * @param  array $atts
     * @return html
     */
    function ale_create_media_output( $atts ){

        //defaults
        extract(shortcode_atts(array(  
            "id"  => 'player-'.rand(100000, 1000000), 
            "type" => "",
            "poster" => "",
            "file_mp3" => "",
            "file_oga" => "",
            "file_mp4" => "",
            "file_webm" => "",
        ), $atts)); 

        //audio output
        if( $type == "audio" ){
            $video_output = '[audio mp3="'.$file_mp3.'" ogg="'.$file_oga.'"]';
            echo do_shortcode( $video_output );
        }

        //video output
        if( $type == "video" ){
            $video_output = '[video poster="'.$poster.'" mp4="'.$file_mp4.'" webm="'.$file_mp4.'" width="1920" height="1080"]';
            echo do_shortcode( $video_output );
        }
    }
}
add_action( "ale_create_media_output", "ale_create_media_output", 10, 1 );


/*
 *Vimeo and youtube video id
 */
 
function ale_find_tube_video_id($url){
    $tubeID="";

    $url = esc_url( $url );
    
    if( strpos($url, 'youtube') || strpos($url, 'youtu.be')  ) {    
        $tubeID=parse_url($url);        

        isset( $tubeID['path'] ) && strpos($url, 'http://youtu.be') 
            and $tubeID=str_replace("/", "", $tubeID['path']);  

        isset( $tubeID['query'] ) 
            and parse_str($tubeID['query'], $url_parts);

        isset( $url_parts ) && is_array( $url_parts ) 
            and $tubeID=$url_parts["v"];
    }
    
    if( strpos($url, 'vimeo')  ) {
        $tubeID=parse_url($url, PHP_URL_PATH);          
        $tubeID=str_replace("/", "", $tubeID);  
    }   


    if( is_string( $tubeID ) ) return $tubeID;
}


function ale_linebg_style($a, $b, $c, $d, $e) {
    $ale_bg_style  = 'style="';
    $ale_bg_style .= $a != '' ? 'background-color: ' . $a . ';' : '';
    $ale_bg_style .= $b != '' ? 'width: ' . $b . 'px;' : '';
    $ale_bg_style .= $c != '' ? 'margin: 0 0 ' . $c . $e . ' ' . $d . $e . ';' : '';
    $ale_bg_style .= '"';

    if($a != '' || $b != '' || $c != '' || $d != '') {
       echo ale_wp_kses($ale_bg_style, 'elli'); 
    }
}

function ale_get_value($val) {
    if($val) {
        $val = 'yes';
    } else {
        $val = 'no';
    }

    return $val;
}

function ale_app_transform_img($direct){
    $x = '';
    $y = '';
    if($direct == 'top'){
        $x = 0;
        $y = '-24px';
    } elseif($direct == 'right'){
        $x = '24px';
        $y = 0;
    } elseif($direct == 'left'){
        $x = '-24px';
        $y = 0;
    } elseif($direct == 'bottom'){
        $x = 0;
        $y = '24px';
    } elseif($direct == 'topleft'){
        $x = '-24px';
        $y = '-24px';
    } elseif($direct == 'topright'){
        $x = '24px';
        $y = '-24px';
    } elseif($direct == 'bottomleft'){
        $x = '-24px';
        $y = '24px';
    } elseif($direct == 'bottomright'){
        $x = '24px';
        $y = '24px';
    }

    $transform = 'style="transform: translate(' . $x . ',' . $y . ');"';

    return $transform;
}



function ale_get_category_byID( $cat_ID ) {
    $cat_ID   = (int) $cat_ID;
    $category = get_term( $cat_ID );
 
    if ( is_wp_error( $category ) ) {
        return $category;
    }
 
    return ( $category ) ? $category->name : '';
}

function ale_get_add_to_cart_btn( $item ) {
    global $product;
    $args = array(
        'quantity'   => 1,
        'class'      => implode(
            ' ',
            array_filter(
                array(
                    'button',
                    'product_type_' . $item->get_type(),
                    $item->is_purchasable() && $item->is_in_stock() ? 'add_to_cart_button' : '',
                    $item->supports( 'ajax_add_to_cart' ) && $item->is_purchasable() && $item->is_in_stock() ? 'ajax_add_to_cart' : '',
                )
            )
        ),
        'attributes' => array(
            'data-product_id'  => $item->get_id(),
            'data-product_sku' => $item->get_sku(),
            'aria-label'       => $item->add_to_cart_description(),
            'rel'              => 'nofollow',
        ),
    );

    echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
        sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $item->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            esc_html( $item->add_to_cart_text() )
        ),
    $item, $args );
}

function ale_header_slider_bg_parallax($url){
    $img = printf('<div class="ale-header-slider-img ale-header-slider-img swiper-image-inner" style="background-image: url(%s)"></div>', $url ); 
}

function ale_show_tags(){
    $post_tags = get_the_tags();
    $output = '';
    if (!empty($post_tags)) {
        foreach ($post_tags as $tag) {
            $output .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
        }
        return trim($output);
    }
}


function ale_show_taxonomy_tag(){
    $post_tags = get_the_terms(get_the_ID(), 'post_tag');
    $separator = ', ';
    $output = '';
    if (!empty($post_tags)) {
        foreach ($post_tags as $term) {
            $output .= '<span>' . $term->name . '</span>' . $separator;
        }
        return trim($output, $separator);
    }

}



if( ! function_exists("ale_framework_get_project_navigation") ){
    /**
     * [get_post_navigation description]
     * @return [type] [description]
     */
    function ale_framework_get_project_navigation(){

        global $ale_red_option, $post;

        $theme_page = '';
        if(!empty($ale_red_option['project_pages'])) :
            $theme_page = $ale_red_option['project_pages'];
        endif;

        $all_button = '';

         $postlist_args = array(
           'posts_per_page'  => -1,
           'orderby'         => 'menu_order title',
           'order'           => 'ASC',
           'post_type'       => 'projects',
           'your_custom_taxonomy' => 'project-category'
        ); 

        $postlist = get_posts( $postlist_args );

        // get ids of posts retrieved from get_posts
        $ids = array();
        foreach ($postlist as $thepost) {
           $ids[] = $thepost->ID;
        }

        // get and echo previous and next post in the same taxonomy        
        $thisindex = array_search($post->ID, $ids);
        if(isset($ids[$thisindex-1])) :
            $previd = $ids[$thisindex-1];
        endif;
        if(isset($ids[$thisindex+1])) :
            $nextid = $ids[$thisindex+1];
        endif;
        $next_button = '';
        $prev_button = '';

        if(!empty($nextid)) :
            $next_button  = $nextid ? sprintf('<a href="%1$s" title="%2$s" class="rt-next-post">%3$s</a>',get_permalink($nextid), get_the_title($nextid), get_the_title($nextid) ) : "";
        endif;
        if(!empty($previd)) :
            $prev_button  = $previd ? sprintf('<a href="%1$s" title="%2$s" class="rt-prev-post">%3$s</a>',get_permalink($previd), get_the_title($previd) , get_the_title($previd)  ) : "";
        endif;

         if($theme_page != '') :
            $start_page = get_permalink( get_page_by_path($ale_red_option['project_pages']));
            $all_button  =  sprintf('<a href="%1$s" title="Our Projects" class="all-posts"><i class="icon-grid"></i></a>', get_permalink( get_page_by_path($ale_red_option['project_pages'])));
        else :
            $start_page = get_post_type_archive_link('projects');
            $all_button  =  sprintf('<a href="%1$s" title="Our Projects" class="all-posts"><i class="icon-grid"></i></a>', get_post_type_archive_link('projects'));
        endif;

        printf('
        <div class="ale-project-pagination-wrapper">
             <div class="ale-project-pag wrapper fade-animation">
                <div class="ale-large-pag">%1$s</div>
                <div class="ale-center-pag">%2$s</div>
                <div class="ale-large-pag">%3$s</div>
             </div>
        </div>
        ',$prev_button, $all_button, $next_button);
    }
}



if( ! function_exists("rtframework_mobile_menu") ){
    /**
     * Creates mobile  menu
     * @return output
     */
    function rtframework_mobile_menu( $string="" , $class="" ){
            if( ! rtframework_get_setting("mobile_menu") ){
                return;
            }    
        ?>       
                <?php
                /**
                 * rtframework_mobile_nav_before hook
                 * 
                 */
                do_action("rtframework_mobile_nav_before");
                ?>      
    
                <nav class="mobile-nav">
                    <?php
                        //call the main navigation      
                        if ( has_nav_menu( 'elli-mobile-navigation' ) ){ // check if user created a custom menu and assinged to the rt-theme's mobile location
                            $menuVars = array(
                                'menu_id'         => "mobile-navigation",
                                'class'           => "menu",
                                'echo'            => false,
                                'container'       => '', 
                                'container_class' => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'theme_location'  => 'elli-mobile-navigation',
                                'walker'          => new rtframework_menu_walker
                            );                          
                        }elseif ( rtframework_get_setting( "custom_main_menu" ) != "" ){ // check if the current post has a custom menu

                            $menuVars = array(
                                'menu'            => rtframework_get_setting( "custom_main_menu" ),
                                'menu_id'         => "mobile-navigation",
                                'class'           => "menu",
                                'echo'            => false,
                                'container'       => '', 
                                'container_class' => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'theme_location'  => 'elli-main-navigation',
                                'walker'          => new rtframework_menu_walker
                            );                                                   
                        }else{
                            
                            $menuVars = array(
                                'menu'            => esc_html_x('Main Navigation','Admin Panel','elli'),
                                'menu_id'         => "mobile-navigation",
                                'class'           => "menu",
                                'echo'            => false,
                                'container'       => '',  
                                'container_class' => '' ,
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'theme_location'  => 'elli-main-navigation',
                                'walker'          => new rtframework_menu_walker
                            );                          
                        }
                        echo wp_nav_menu( $menuVars );          
                    ?>    
                </nav>

                <?php
                /**
                 * rtframework_mobile_nav_after hook
                 * 
                 */
                do_action("rtframework_mobile_nav_after");
                ?>      
        <?php
    }
}   


function ale_sticky_class( $classes ) {
    global $post;
    if ( is_sticky( $post->ID ) ) {
        if ( is_archive() || is_category() || is_tag() || is_author() || is_search()) {
            
        } else {
            $classes[] = 'sticky';
        }
    }

    return $classes;
}
add_filter( 'post_class', 'ale_sticky_class' );


function ale_wp_body_classes( $classes ) {
    $classes[] = 'elli-theme-body';
      
    return $classes;
}
add_filter( 'body_class','ale_wp_body_classes' );

function ale_theme_slug_post_classes( $classes, $class, $post_id ) {

        if(get_post_type() == 'post' || is_search()):
            $classes[] = 'post-list-wrapper fade-animation';
        endif;

        if(is_page_template('template-left-sidebar.php')):
            $classes[] = 'ale-sidebar-template';
        endif;

        if(is_singular('projects')):
            $classes[] = 'ale-single-project-wrapper';
        endif;

        if(is_page()) :
            $classes[] = 'fade-animation full-width-content ale-default-page cf';
        endif;

    return $classes;
}
add_filter( 'post_class', 'ale_theme_slug_post_classes', 10, 3 );