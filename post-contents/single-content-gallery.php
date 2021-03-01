<?php $images = get_post_meta($post->ID, 'ale_gallery_id', true);
$total_images = '';

if(has_post_thumbnail() || $images != '') : ?>
	<figure class="ale-post-thumb-wrapper fade-image ale-single-post-gallery">
		<div class="thumba-list-wrapper">
            <div <?php if ( $images ){ echo ale_wp_kses('class="gallery-post-slider owl-carousel"', 'elli'); } ?>>
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-single-thumb');                 

                    if ( $images ){ $total_images = count($images); ?>

                        <?php foreach ( $images as $attachment ) { 
                            echo wp_get_attachment_image($attachment, 'post-single-thumb');
                        } ?>
                <?php } ?>
            </div>
        </div>
	</figure>
<?php endif; ?>
<div class="story cf">
	<div class="ale-single-title-wrapper fade-animation">
		<span class="blog-cats"><?php echo the_category(', ');?></span>
    	<h2 class="ale-single-post-title"><?php the_title(); ?></h2>
		<span class="separate_dots">
            <i class="fa fa-circle" aria-hidden="true"></i>
            <i class="fa fa-circle" aria-hidden="true"></i>
            <i class="fa fa-circle" aria-hidden="true"></i>
        </span>
    </div>
    <div class="ale-single-content-wrapper fade-animation">
    	<?php the_content(); ?>
    </div>
</div>