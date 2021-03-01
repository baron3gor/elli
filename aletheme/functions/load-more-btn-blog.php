<?php
/*
 * Javascript for Load More Blog Page
 */
function ale_load_more_blog_js() {		

	if ( get_template_part( 'ale-blog-list' ) ) {
		return;
	}

	global $wp_query;

	$args = array(
		'nonce'       => wp_create_nonce( 'ale-load-more-blog-nonce' ),
		'url'         => admin_url( 'admin-ajax.php' ),
		'button_text' => esc_html__( 'Load More', 'elli' ),
	);

	wp_enqueue_script( 'ale-load-more-blog',
		get_stylesheet_directory_uri() . '/js/libs/load-more-blog.js',
		array( 'jquery' ),
		'1.0',
		true );

	wp_localize_script( 'ale-load-more-blog', 'aleloadmoreblog', $args );
}

add_action( 'wp_enqueue_scripts', 'ale_load_more_blog_js' );

/*
 * AJAX Load More
 */

function ale_ajax_load_more_blog() {
	check_ajax_referer( 'ale-load-more-blog-nonce', 'nonce' );

	session_start(); global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

	$ale_tab_id 	  = $_POST['tabid'];
	$ale_pp_page 	  = $_POST['posperpage'];
	$ale_cur_page     = $_POST['curpage'];
	$ale_length_exc   = $_POST['exclength'];
	$ale_current_page = $_POST['page'];
	$ale_blog_style	  = $_POST['sidebar'];
	$ale_sort_opt 	  = $_POST['sortopt'];
	$ale_cols_number  = $_POST['colsnumber'];
	$ale_show_exc     = $_POST['showexc'];
    $ale_show_media   = $_POST['showmedia'];
    $ale_show_cat     = $_POST['showcat'];
    $ale_show_auth    = $_POST['showauth'];
    $ale_show_comm    = $_POST['showcomm'];
    $ale_show_likes   = $_POST['showlikes'];
    $ale_show_sepp    = $_POST['showsepp'];

	$_SESSION['blogstyle'] = $ale_tab_id;
	$_SESSION['blogsort']  = $ale_sort_opt;

	$ale_post_class = '';
	$ale_post_class = $ale_blog_style == 'style3' && $ale_tab_id == 1 ? $ale_post_class = ' sidebar-post-style3' : $ale_post_class = '';
	$ale_post_style_clas = $ale_post_class;

	$paged = $ale_cur_page;

	$ale_nonstickyIDs = get_posts(array(
	    'fields'          => 'ids', // Only get post IDs
	    'posts_per_page'  => -1,
	    'orderby'         => $ale_sort_opt,
	));

	$ale_stickyID = get_posts(array(
	    'fields'          => 'ids', // Only get post IDs
	    'posts_per_page'  => -1,
	    'orderby'         => $ale_sort_opt,
	    'post__in' 	  	  =>  get_option( 'sticky_posts' )
	));

	$ale_getPosts = array_merge ($ale_stickyID, $ale_nonstickyIDs);

	$args = array(
        'post_type' 	 => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'post__in',
        'posts_per_page' => $ale_pp_page,
        'paged' 		 => $ale_current_page,
        'post__in'		 => $ale_getPosts,
    );


    $ale_blog = new \WP_Query($args);

	ob_start(); ?>

		<?php if ($ale_blog->have_posts()) : while ($ale_blog->have_posts()) : $ale_blog->the_post() ;?>
			<article <?php post_class() ?>>
	            <div class="post-list-container<?php echo esc_attr($ale_post_style_clas, 'elli') ?>">                          
                    <?php get_template_part( '/post-contents/content', get_post_format() ); ?>
                </div>
	        </article>
	 	<?php endwhile; else: ?>
	        <?php get_template_part('partials/notfound')?>
	    <?php endif;  wp_reset_postdata(); ?>
	<?php
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_load_more_blog', 'ale_ajax_load_more_blog' );
add_action( 'wp_ajax_nopriv_ale_ajax_load_more_blog', 'ale_ajax_load_more_blog' );