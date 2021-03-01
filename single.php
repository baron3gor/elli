<?php
/*
*Template for display all single posts
*/

 get_header();
 global $ale_red_option;
 $ale_sidebar_position = $ale_red_option['single_page_sidebar']; ?>

<div>
<?php if($ale_red_option['blog_single_show'] == 'yes') : get_template_part('partials/content-page-header'); endif; ?>
	<div class="ale-single-page-wrapper wrapper<?php if($ale_sidebar_position == '3')  : echo esc_attr(' sidebar-blog-left'); elseif($ale_sidebar_position == '1') : echo esc_attr(' sidebar-blog-no', 'elli'); endif;?>">
		<div class="ale-singlepage-content-wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    <article <?php post_class(); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
			    	<?php get_template_part( '/post-contents/single-content', get_post_format() ); ?>
				</article>
				<?php endwhile;
			else:
			    get_template_part( 'partials/notfound' );
			endif; ?>			
			<div class="ale-singlepost-bottom-wrapper fade-animation">
				<div class="ale-single-bottom-left">
					<span class="auth-info"><span><?php echo esc_html('By ', 'elli'); ?></span><?php the_author_posts_link(); ?></span>
					<span class="blog-cats"><i class="fa fa-circle blog-post-separate-dott" aria-hidden="true"></i></span>
					<span class="month"><?php echo get_the_date(); ?></span>
				</div>
				<div class="ale-single-bottom-right">
					<div class="ale-single-right-fst">
						<span class="comment-blog-s"><?php echo get_comments_number(get_the_ID()); ?><span class="blog-comment icon_comment_alt"></span></span><?php if(function_exists('ale_getPostLikeLink')) : echo ale_getPostLikeLink(get_the_ID()); endif; ?>
					</div>
					<?php if(get_the_tags()) : ?>
						<div class="ale-single-right-sec">
							<div class="ale-tags-wrapper"><?php echo ale_show_tags(); ?></div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		</div>
		<?php if ( is_active_sidebar( 'blog-sidebar' ) && $ale_red_option['single_page_sidebar'] != '1'  ) { ?>
		    <aside class="elli-sidebar-wrapper blog-sidebar-wrapper fade-animation">
		        <div class="sidebar_container">
		            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
		        </div>
		    </aside>
		<?php } ?>	
	</div>
    
<?php get_footer(); ?>