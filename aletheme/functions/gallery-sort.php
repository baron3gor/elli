<?php
/**
 * Javascript for Gallery Sorting
 *
 */
function ale_gallery_sort_js() {

	global $wp_query;

	$args = array(
		'nonce'       => wp_create_nonce( 'ale-gallery-sort-nonce' ),
		'url'         => admin_url( 'admin-ajax.php' ),
	);
	wp_enqueue_script( 'ale-gallery_sort',
		get_stylesheet_directory_uri() . '/js/libs/gallery-sort.js',
		array( 'jquery' ),
		'1.0',
		true );
	wp_localize_script( 'ale-gallery_sort', 'alegallerysort', $args );

}

add_action( 'wp_enqueue_scripts', 'ale_gallery_sort_js' );

/**
 * AJAX Load More
 *
 */
function ale_ajax_gallery_sort() {
	check_ajax_referer( 'ale-gallery-sort-nonce', 'nonce' );



	$ale_cat_id 		= $_POST['post'];
	$ale_style_gallery1 = $_POST['galstyle'];
	$ale_post_count1 	= $_POST['galpostcount'];


	if($ale_cat_id == 0) {
		$args = array(
	        'post_type' => 'projects',
	        'post_status'    => 'publish',
	        'posts_per_page' => '3',
	    );
	} else {
		$args = array(
	        'post_type' 	 => 'projects',
	        'post_status'    => 'publish',
	        'posts_per_page' => '3',
	        'tax_query' 	 => array(
	        	array(
	        		'taxonomy' => 'project-category',
	        		'field' => 'id',
	        		'terms' => $ale_cat_id
	        	)
	        )
	    );
	}

    $ale_gallery = new \WP_Query($args);

    $ale_max_cat_page = $ale_gallery->max_num_pages;

	ob_start(); ?>

	<div class="content-wrapper-gallery" data-perpage="<?php echo esc_attr($ale_post_count1, 'elli'); ?>" data-maxpage="<?php echo esc_attr($ale_max_cat_page, 'elli') ?>" data-btn="<?php echo esc_attr($ale_style_gallery1, 'elli') ?>">
	<?php if ($ale_gallery->have_posts()) : while ($ale_gallery->have_posts()) : $ale_gallery->the_post() ;
			  $ale_img_id = get_post_thumbnail_id();
	          
	          $ale_term_list = get_the_term_list(get_the_ID(), 'project-category', '', ' / ', ''); ?>

	<?php	switch ($ale_style_gallery1) {
            case '1': 
            	$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
                if( !empty($ale_img_url)) : ?>
                	<div class="gallery-sizer"></div>
    				<div class="gutter-gallery"></div>
					<div class="content-wrapper-img current_gallery fade-animation style1 grid-gallery grid-gallery--width2">
				        <div class="fade-image gallery-img">
				            <a href="<?php the_permalink() ;?>"><img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery"></a>
				        </div>
				        <div class="title-wrapper">
				            <?php if(taxonomy_exists('project-category')) : ?>
				                <h6 class="gallery-cat-list"><?php echo ale_wp_kses($ale_term_list, 'elli');  ?></h6>
				            <?php endif; ?>
				            <h5><a class="gallery-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				        </div>
				    </div>
				<?php endif;
                break;

            case '2':
                $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
				if( !empty($ale_img_url)) : ?>
					<div class="gallery-sizer"></div>
    				<div class="gutter-gallery"></div>
					<div class="content-wrapper-img current_gallery fade-animation style2 grid-gallery grid-gallery--width2">
						<div class="gallary-style-wrapper">
					        <div class="fade-image gallery-img">
					            <img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery">
					        </div>
					        <a class="project_link" href="<?php the_permalink() ;?>"></a>
					        <div class="project-title">
					            <h5><?php echo get_the_title() .'<span class="gallery-dott-title">.</span>'; ?></h5>
					        </div>
					    </div>
				    </div>
			    <?php endif;
                break;

				case '5': 
				$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full');
					if( !empty($ale_img_url)) : ?>
						<div class="gallery-sizer"></div>
    					<div class="gutter-gallery"></div>
						<div class="content-wrapper-img current_gallery fade-animation style5 grid-gallery">
					     	<div class="fade-image gallery-img">
					            <a href="<?php the_permalink() ;?>"><img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery"></a>
					        </div>
					        <div class="title-wrapper">
					        	<h6 class="gallery-cat-list"><?php  echo print_r($ale_term_list, 'elli');  ?></h6>
					            <h5><a class="gallery-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					        </div>
					    </div>
				    <?php endif;
		    	break;

		    	case '6':
	           		$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
	                 if( !empty($ale_img_url)) : ?>
	                 	<div class="gallery-sizer"></div>
    					<div class="gutter-gallery"></div>
						<div class="content-wrapper-img current_gallery fade-animation style6 grid-gallery">
							<div class="gallary-style-wrapper">
						        <div class="fade-image gallery-img">
						            <img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery">
						        </div>
						        <a class="project_link" href="<?php the_permalink() ;?>"></a>
						        <div class="project-title">
						            <h5><?php echo get_the_title() .'<span class="gallery-dott-title">.</span>'; ?></h5>
						        </div>
						    </div>
					    </div>
					<?php endif;
				break;
        } ?>
	 <?php endwhile;
        else: ?>
	        <?php get_template_part('partials/notfound')?>
	    <?php endif; ?>
</div>
	<?php
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_gallery_sort', 'ale_ajax_gallery_sort' );
add_action( 'wp_ajax_nopriv_ale_ajax_gallery_sort', 'ale_ajax_gallery_sort' );