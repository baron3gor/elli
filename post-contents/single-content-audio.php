<?php $ale_audio_url_mp3   = esc_url(ale_get_meta('mp3_link'));
		$ale_audio_url_ogg = esc_url(ale_get_meta('ogg_link')); 
		$ale_audio_check   = ale_get_meta('check_audio');

		if(has_post_thumbnail()) : ?>
	<figure class="ale-post-thumb-wrapper fade-image">
		<div class="ale-single-audio">
	 		<?php the_post_thumbnail();
	 		ale_create_media_output(array(
					'id' 	   => 'audio-'.get_the_ID(),
					'type' 	   => "audio",
					'file_mp3' => $ale_audio_url_mp3,
					'file_oga' => $ale_audio_url_ogg,
					'poster'   => ''	
			)); ?>
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