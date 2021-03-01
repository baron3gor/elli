<?php function true_load_posts(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] 		 = $_POST['page'] + 1; 
	$args['post_status'] = 'publish';
 
	query_posts( $args );

	$ale_style_gallery1 = $_POST['galstyle'];

	if( have_posts() ) :
 
		while( have_posts() ): the_post(); 
            $ale_img_id    = get_post_thumbnail_id();
            $ale_term_list = get_the_term_list($post->ID, 'project-category', '', ' / ', ''); ?>

    <?php	switch ($ale_style_gallery1) {

        case 'style1':
        	$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'projects-gallery-big', true);
            if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style1">
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

        case 'style2':
            $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'projects-gallery-big', true);
			if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style2">
					<div class="gallary-style-wrapper">
				        <div class="fade-image gallery-img">
				            <img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery">
				        </div>
				        <a class="project_link" href="<?php the_permalink() ;?>"></a>
				        <div class="project-title">
				            <h5><?php the_title(); ?></h5>
				        </div>
				    </div>
			    </div>
		    <?php endif;
            break;

        case 'style3':
        	$ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'projects-gallery', true);
			if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style3">
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

        case 'style4':
      	    $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'projects-gallery', true);
            if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style4">
					<div class="gallary-style-wrapper">
				        <div class="fade-image gallery-img">
				            <img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery">
				        </div>
				        <a class="project_link" href="<?php the_permalink() ;?>"></a>
				        <div class="project-title">
				            <h5><?php the_title(); ?></h5>
				        </div>
				    </div>
			    </div>
			<?php endif;
			break;

		case 'style5':
      	    $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'projects-gallery', true);
            if( !empty($ale_img_url)) : ?>
				<div class="content-wrapper-img current_gallery fade-animation style4">
					<div class="gallary-style-wrapper">
				        <div class="fade-image gallery-img">
				            <img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery">
				        </div>
				        <a class="project_link" href="<?php the_permalink() ;?>"></a>
				        <div class="project-title">
				            <h5><?php the_title(); ?></h5>
				        </div>
				    </div>
			    </div>
			<?php endif;
			break; 

		} ?>
	<?php endwhile;  else: ?>
        <?php get_template_part('partials/notfound')?>
    <?php endif; ?>
	<?php die();
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');