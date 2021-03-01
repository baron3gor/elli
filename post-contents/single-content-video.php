<?php $ale_mp4_link        = esc_url(ale_get_meta('mp4_link'));
        $ale_external_link = esc_url(ale_get_meta('external_link'));

    if(!empty($ale_mp4_link) || !empty($ale_external_link)) : ?>
	<figure class="ale-post-thumb-wrapper fade-image">
            <div class="media-list-wrapper">       
                <?php
                if( $ale_mp4_link ) : ?>
                    <div class="alevideo-wrapper fade-image">
                    <?php   ale_create_media_output(array(
                            'id'        => 'video-'.get_the_ID(),
                            'type'      => "video",
                            'file_mp4'  => $ale_mp4_link,
                            'file_webm' => $ale_mp4_link,
                            'poster'    => '',
                    )); ?>
                    </div><?php
                endif;

                //external videos
                if ( $ale_external_link && $ale_mp4_link == ''){             
                    if( strpos($ale_external_link, 'youtube')  ) { //youtube
                        echo '<div class="video-container embed-responsive embed-responsive-16by9 fade-image"><iframe class="embed-responsive-item" src="//www.youtube.com/embed/'.ale_find_tube_video_id(esc_url($ale_external_link)).'?rel=0&amp;showinfo=0" allowfullscreen></iframe></div>';
                    }
                    
                    if( strpos($ale_external_link, 'vimeo')  ) { //vimeo
                        echo '<div class="video-container embed-responsive embed-responsive-16by9 fade-image"><iframe class="embed-responsive-item" src="//player.vimeo.com/video/'.ale_find_tube_video_id(esc_url($ale_external_link)).'?color=d6d6d6&title=0&amp;byline=0&amp;portrait=0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
                    }           
                } ?>
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