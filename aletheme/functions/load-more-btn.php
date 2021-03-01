<?php
/**
 * Javascript for Load More
 *
 */
function ale_load_more_js() {
	
	if ( get_template_part( 'ale-gallery-two' ) ) {
		return;
	}

	global $wp_query;

	$args = array(
		'nonce'       => wp_create_nonce( 'ale-load-more-nonce' ),
		'url'         => admin_url( 'admin-ajax.php' ),
		'button_text' => esc_html__( 'Load More', 'elli' ),
	);

	wp_enqueue_script( 'ale-load-more',
		get_stylesheet_directory_uri() . '/js/libs/load-more-btn.js',
		array( 'jquery' ),
		'1.0',
		true );

	wp_localize_script( 'ale-load-more', 'aleloadmore', $args );

}

add_action( 'wp_enqueue_scripts', 'ale_load_more_js' );

/**
 * AJAX Load More
 *
 */
function ale_ajax_load_more() {
	check_ajax_referer( 'ale-load-more-nonce', 'nonce' );

	$ale_current_page  = $_POST['page'];
	$ale_per_page	   = $_POST['perpage'];
	$ale_gallery_style = $_POST['style'];
	$ale_gallery_cat   = $_POST['cat'];

	if($ale_gallery_cat == 0) {
	$args = array(
        'post_type' 	 => 'projects',
        'post_status' 	 => 'publish',
        'posts_per_page' => $ale_per_page,
        'paged' 	 	 => $ale_current_page,
    );
	}  else {
		$args = array(
            'post_type' 	 => 'projects',
            'post_status'	 => 'publish',
            'posts_per_page' => $ale_per_page,
            'paged' 		 => $ale_current_page,
            'tax_query' => array(
                    array(
                        'taxonomy'  => 'project-category',
                        'field'     => 'term_id',
                        'terms'     => $ale_gallery_cat,
                    )
                ),
      	    );
	}

	ob_start();
	$ale_loop = new WP_Query( $args );
	if ( $ale_loop->have_posts() ): while ( $ale_loop->have_posts() ): $ale_loop->the_post();

		$ale_img_id = get_post_thumbnail_id();
        $ale_term_list = get_the_term_list(get_the_ID(), 'project-category', '', ' / ', ''); ?>

        <?php	switch ($ale_gallery_style) {

        case '1':
        	$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
            if( !empty($ale_img_url)) : ?>
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

        case '3':
        	$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
            if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style3 grid-gallery grid-gallery--width2">
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

        case '4':
      	    $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
			if( !empty($ale_img_url)) : ?>
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
      	    $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
				if( !empty($ale_img_url)) : ?>
					<div class="content-wrapper-img current_gallery fade-animation style5 grid-gallery">
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

		case '6':
      	    $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
            if( !empty($ale_img_url)) : ?>
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

		case '7':
       		$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
			if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style7 grid-gallery">
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

    	case '8':
      	    $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
            if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style8 grid-gallery">
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

	<?php endwhile; endif;
	wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_load_more', 'ale_ajax_load_more' );
add_action( 'wp_ajax_nopriv_ale_ajax_load_more', 'ale_ajax_load_more' );