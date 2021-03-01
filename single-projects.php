<?php
/*
*Template for display archive single project posts
*/

 get_header();
 global $ale_red_option; ?>
 <div>

 <?php if($ale_red_option['project_single_show'] == 'yes') : get_template_part('partials/content-page-header'); endif; ?>
	<div class="ale-single-page-wrapper wrapper ale-single-project">
		<div class="ale-singlepage-content-container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php 	$ale_term_list = get_the_term_list($post->ID, 'project-category', '', ' / ', ''); 
						$ale_tag_list  = get_the_terms(get_the_ID(), 'post_tag');
				?>

			    <article <?php post_class(); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
			    	<?php if(has_post_thumbnail()) : ?>
			    		<div class="ale-single-project-content">
							<div class="ale-single-details">
								<div class="fade-animation">
									<?php if(!empty(ale_get_meta('project_single'))) : ?>
										<div class="ale-singlegallery-title-wrapper">
									    	<h4 class="ale-single-project-title"><?php echo esc_html(ale_get_meta('project_single'), 'elli'); ?></h4>
											<span class="separate_dots">
									            <i class="fa fa-circle" aria-hidden="true"></i>
									            <i class="fa fa-circle" aria-hidden="true"></i>
									            <i class="fa fa-circle" aria-hidden="true"></i>
									        </span>
									    </div>
									<?php endif; ?>
								    <div class="ale-single-content-wrapper">
								    	<?php the_content(); ?>
								    </div>
								</div>
							    <div class="ale-single-project-sidebar fade-animation">
							    	<div class="ale-single-sidebar">
								    	<div class="ale-single-sidebar-date">
								    		<h5><?php echo esc_html('Date', 'elli'); ?></h5>
								    		<span class="ale-project-side-info"><?php echo get_the_date(); ?></span>
								    	</div>
								    	<?php if($ale_term_list != '') : ?>
									    	<div class="ale-single-sidebar-category">
									    		<h5><?php echo esc_html('Category', 'elli'); ?></h5>
									    		<h6 class="gallery-cat-list"><?php  echo print_r($ale_term_list, 'elli');  ?></h6>
									    	</div>
									    <?php endif; ?>
								    	<?php if(in_array ('1', $ale_red_option['share-multi-check'])) : ?>
									    	<div class="ale-single-sidebar-share">
									    		<h5><?php echo esc_html('Share', 'elli'); ?></h5>
									    		<?php echo ale_social_media_share_shortcode(); ?>
									    	</div>
									    <?php endif; ?>
							    	</div>
							    </div>	
						    </div>
						</div>
						<figure class="ale-post-thumb-wrapper">
				 			<div class="ale-main-thumb-wrapper">
				 				<a class="ale-project-lightbox fade-image" data-lightbox="project" href="<?php echo esc_url(the_post_thumbnail_url(), 'elli') ?>"><?php the_post_thumbnail('projects-thumb-single'); ?></a>
				 			</div>
			 			    <?php $images     = get_post_meta($post->ID, 'ale_gallery_id', true);
				 			    $total_images = '';
			 			    if(!empty($images)) : ?> 
			 			    	<div class="ale-gallery-thumbs-wrapper">
					 			    <div class="ale-gallery-thumbs">
						 			    <?php foreach ( $images as $attachment ) { ?>	
			                                <div class="ale-gallery-img">
			                                	<a href="<?php echo esc_url(wp_get_attachment_url($attachment), 'elli'); ?>" class="ale-project-lightbox fade-image" data-lightbox="project"><?php echo wp_get_attachment_image($attachment, 'projects-gallery-single'); ?></a>

			                                </div>
			                            <?php }  ?>
		                            </div>
		                        </div>
	                        <?php endif; ?>	                 
						</figure>
					<?php endif; ?>
				</article>
				<?php endwhile;
			else:
			    get_template_part( 'partials/notfound' );
			endif; ?>	
		</div>
	</div>
	<?php ale_framework_get_project_navigation(); ?>

	
<?php get_footer(); ?>