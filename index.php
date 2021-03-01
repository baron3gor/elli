<?php session_start(); get_header(); ?>

<div>
    
<?php	get_template_part('partials/content-page-header');

	$widgetID = 'index';
	

	global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

	$ale_pag_style  = 'pag';
    $ale_length_exc = $ale_red_option['blog_exce'];
    $ale_orderby    = $ale_red_option['blog_order'];
    $ale_layout     = $ale_red_option['blog_layout'] == 'list' ? $ale_layout = 0 : $ale_layout = 1;
    if(isset($_SESSION['blogstyle' . $widgetID])) {    	
        $ale_tab_id = esc_html($_SESSION['blogstyle' . $widgetID]);        
    } else {
        $ale_tab_id = $ale_layout;
    }
    if(isset($_SESSION['blogsort' . $widgetID])) {
        $ale_sort_opt = esc_html($_SESSION['blogsort' . $widgetID]);
    } else {
        $ale_sort_opt = $ale_orderby;
    }
    $ale_select_date = 'date';
    $ale_select_auth = 'author';
    $ale_select_titl = 'title';
    $ale_select_modi = 'modified';
    $ale_select_type = 'type';
    $ale_show_exc    = ale_get_value($ale_red_option['blog_show_exc']);
    $ale_show_media  = ale_get_value($ale_red_option['blog_image']);
    $ale_show_cat    = ale_get_value($ale_red_option['blog_cat']);
    $ale_show_auth   = ale_get_value($ale_red_option['blog_author']);
    $ale_show_comm   = ale_get_value($ale_red_option['blog_comment']);
    $ale_show_likes  = ale_get_value($ale_red_option['blog_likes']);
    $ale_show_sepp   = ale_get_value($ale_red_option['blog_separate']);
    $ale_blog_style  = $ale_red_option['blog_sidebar'];
    $ale_cols_number = 'three';
    $ale_post_count  = get_option('posts_per_page');

	$paged = 1;
	if ( get_query_var('paged') ) $paged = get_query_var('paged');
	if ( get_query_var('page') ) $paged = get_query_var('page');

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
        'post_type' 	   => 'post',
        'post_status'      => 'publish',
        'orderby'          =>  'post__in',
        'posts_per_page'   => $ale_post_count,
        'paged' 		   => $paged,
        'post__in'		   => $ale_getPosts,
    );

	$query 		  = new \WP_Query( $args );
	$ale_max_page = $query->max_num_pages;

	wp_enqueue_style('wp-mediaelement');
	wp_enqueue_script('wp-mediaelement'); ?>

	<div class="ale-index-wrapper">
		<div class="wrapper">
			<div class="elli-blog-list-wrapper-index<?php if($ale_cols_number == 'three') : echo esc_attr(' blog-list-wrapper-three-columns', 'elli'); endif; ?>" data-widgid="<?php echo esc_attr($widgetID, 'elli'); ?>" data-curpage="1" data-colsnumber="<?php echo esc_attr($ale_cols_number, 'elli'); ?>" data-sidebar="<?php echo esc_attr($ale_blog_style, 'elli'); ?>" data-pagination="<?php echo esc_attr($ale_pag_style, 'elli'); ?>"  data-maxpage="<?php echo esc_attr($ale_max_page, 'elli'); ?>" data-perpage="<?php echo esc_attr($ale_post_count, 'elli') ?>" data-exc="<?php echo esc_attr($ale_length_exc, 'elli') ?>" data-pagpage="<?php echo esc_attr($paged, 'elli'); ?>" data-display-media="<?php echo esc_attr($ale_show_media, 'elli'); ?>" data-display-cat="<?php echo esc_attr($ale_show_cat, 'elli'); ?>"   data-display-sepp="<?php echo esc_attr($ale_show_sepp, 'elli'); ?>" data-display-auth="<?php echo esc_attr($ale_show_auth, 'elli'); ?>" data-display-comm="<?php echo esc_attr($ale_show_comm, 'elli'); ?>"   data-display-likes="<?php echo esc_attr($ale_show_likes, 'elli'); ?>" data-display-exc="<?php echo esc_attr($ale_show_exc, 'elli'); ?>">
			    <div class="ale-blog-tabs-wrap">
			        <div class="elli-blog-tabs">
			            <div class="view-wrapper">
			                <div class="view-list blog-tabs <?php if($ale_tab_id == 0) : echo esc_attr('current-postview-tab', 'elli'); endif; ?>" data-tab="0"><i class="icon-list4"></i></div><div class="view-grid blog-tabs <?php if($ale_tab_id == 1) : echo esc_attr('current-postview-tab', 'elli'); endif; ?>" data-tab="1"><i class="icon-grid"></i></div>
			                </div>
			            <div class="form-wrapper">
			                <div class="form-container" data-sort="date">
			                    <form class="ale-form-sortby" method="post">
			                        <select name="aleorderby1" class="ale-blog-orderby">
			                            <option value="date"<?php if($ale_sort_opt == $ale_select_date) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by date', 'elli'); ?></option>
			                            <option value="author"<?php if($ale_sort_opt == $ale_select_auth) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by author', 'elli'); ?></option>
			                            <option value="title"<?php if($ale_sort_opt == $ale_select_titl) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by title', 'elli'); ?></option>
			                            <option value="modified"<?php if($ale_sort_opt == $ale_select_modi) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by modified', 'elli'); ?></option>
			                            <option value="type"<?php if($ale_sort_opt == $ale_select_type) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by type', 'elli'); ?></option>
			                        </select>
			                    </form>
			                </div>
			            </div>    
			        </div>
			    </div>
			    <div class="elli-blog-content <?php if($ale_blog_style == 'style2') : echo esc_attr('elli-blog-left-sidebar'); elseif($ale_blog_style == 'style3') : echo esc_attr('no-sidebar-style', 'elli'); endif; ?>">
			        <div class="elli-blog-wrapper<?php if(!is_active_sidebar( 'blog-sidebar' )) : echo esc_attr(' elli-blog-empty-side', 'elli'); endif; ?>" data-page="<?php echo esc_attr($paged) ?>">
			            <div class="current-postview-content blog-list-wrapper">
			                <div class="blog-wrapper-style <?php if($ale_tab_id == 0) : echo esc_attr('post-list-style', 'elli'); else : echo esc_attr('post-grid-style', 'elli'); endif;?>">
			                    <?php if($query->have_posts()):  while ($query->have_posts()) : $query->the_post() ?>
			                        <article <?php post_class() ?>>
			                            <div class="post-list-container">                                
			                                <?php get_template_part( '/post-contents/content', get_post_format() ); ?>
			                            </div>
			                        </article>
			                    <?php endwhile; else: ?>
			                        <?php get_template_part('partials/notfound')?>
			                    <?php endif; wp_reset_postdata();?>
			                </div>
			            </div>
		                <div class="blog-pagination-animate">
		                    <?php ale_widget_get_pagination($query); ?>
		                </div>
			        </div>
			        <?php if($ale_blog_style != 'style3' && is_active_sidebar( 'blog-sidebar' )) : ?>
				        <aside class="elli-sidebar-wrapper <?php echo esc_attr($ale_blog_style, 'elli') . '-wrapper' ;?>">
				            <div class="alesticky-sidebar sticky-sidebar">
				                <div class="sidebar_container">
				                    <div class="fade-animation">
				                        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
				                    </div>
				                </div>
				            </div>
				        </aside>
			       <?php endif; ?>
			    </div>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>