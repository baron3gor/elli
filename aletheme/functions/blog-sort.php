<?php
/*
 * Javascript for Blog Sorting
 */
function ale_blog_sort() {

	global $wp_query;

	$args = array(
		'nonce'       => wp_create_nonce( 'ale-blog-sort-nonce' ),
		'url'         => admin_url( 'admin-ajax.php' ),
	);
	wp_enqueue_script( 'ale-blog-sort',
		get_stylesheet_directory_uri() . '/js/libs/blog-sort.js',
		array( 'jquery' ),
		'1.0',
		true );
	wp_localize_script( 'ale-blog-sort', 'aleblogsort', $args );

}

add_action( 'wp_enqueue_scripts', 'ale_blog_sort' );

/*
 * AJAX Load More
 */

function ale_ajax_blog_sort() {
	session_start(); global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

	check_ajax_referer( 'ale-blog-sort-nonce', 'nonce' );
	$ale_tab_id 	 = $_POST['tabid'];
	$widgetID		 = $_POST['widgid'];
	$ale_pp_page 	 = $_POST['posperpage'];
	$ale_cur_page 	 = $_POST['page'];
	$ale_length_exc  = $_POST['exclength'];
	$ale_blog_style	 = $_POST['sidebar'];
	$ale_pagpage 	 = $_POST['pagpage'];
	$ale_pagstyle	 = $_POST['pagstyle'];
	$ale_sort_opt 	 = $_POST['sortopt'];
	$ale_cols_number = $_POST['colsnumber'];
	$ale_show_exc    = $_POST['showexc'];
    $ale_show_media  = $_POST['showmedia'];
    $ale_show_cat    = $_POST['showcat'];
    $ale_show_auth   = $_POST['showauth'];
    $ale_show_comm   = $_POST['showcomm'];
    $ale_show_likes  = $_POST['showlikes'];
    $ale_show_sepp   = $_POST['showsepp'];

	$_SESSION['blogstyle' . $widgetID] = $ale_tab_id;
	$_SESSION['blogsort' . $widgetID]  = $ale_sort_opt;

	$ale_post_class = '';
	$ale_post_class = $ale_blog_style == 'style3' && $ale_tab_id == 1 ? $ale_post_class = ' sidebar-post-style3' : $ale_post_class = '';
	$ale_post_style_clas = $ale_post_class;
	
	if($ale_pagstyle == 'pag'){
		$paged = $ale_pagpage;
	} else {
		$paged = $ale_cur_page;
	}

	$ale_nonstickyIDs = get_posts(array(
	    'fields'          => 'ids', // Only get post IDs
	    'posts_per_page'  => -1,
	    'orderby'         => $ale_sort_opt,
	));

	$ale_stickyID = get_posts(array(
	    'fields'          => 'ids', // Only get post IDs
	    'posts_per_page'  => -1,
	    'orderby'         => $ale_sort_opt,
	    'post__in' 	  =>  get_option( 'sticky_posts' )
	));

	$ale_getPosts = array_merge ($ale_stickyID, $ale_nonstickyIDs);

	$args = array(
        'post_type' 	 => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'post__in',
        'posts_per_page' => $ale_pp_page,
        'paged' 		 => $paged,
        'post__in'		 => $ale_getPosts,
    );

    $ale_blog = new \WP_Query($args);
	ob_start(); ?>

	<div class="blog-wrapper-style <?php if($ale_tab_id == 0) : echo esc_attr('post-list-style', 'elli'); else : echo esc_attr('post-grid-style', 'elli'); endif; ?>">
		<?php if ($ale_blog->have_posts()) : while ($ale_blog->have_posts()) : $ale_blog->the_post() ;?>
			<article <?php post_class() ?>>
	            <div class="post-list-container<?php echo esc_attr($ale_post_style_clas, 'elli') ?>">                    
                    <?php get_template_part( '/post-contents/content', get_post_format() ); ?>
                </div>
	        </article>
	 	<?php endwhile; else: ?>
	        <?php get_template_part('partials/notfound')?>
	    <?php endif;  wp_reset_postdata(); ?>
    </div>

	<?php
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_blog_sort', 'ale_ajax_blog_sort' );
add_action( 'wp_ajax_nopriv_ale_ajax_blog_sort', 'ale_ajax_blog_sort' );