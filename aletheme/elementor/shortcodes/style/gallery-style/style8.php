<?php $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
	if( !empty($ale_img_url)) : ?>
	<div class="gallery-sizer"></div>
    <div class="gutter-gallery"></div>
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
<?php endif; ?>