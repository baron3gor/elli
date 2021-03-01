<?php global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_col_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

$ale_thumb_url_content = get_the_post_thumbnail_url(get_the_ID());
$ale_external_link     = esc_url(ale_get_meta('external_link'));
$ale_mp4_link          = esc_url(ale_get_meta('mp4_link'));
$ale_check_video       = ale_get_meta('video_usage');

//display featured image
if(has_post_thumbnail() &&  $ale_show_media == 'yes' && $ale_check_video == 'thumb' && get_the_post_thumbnail_url(get_the_ID()) != '') : ?>
    <figure class="media-list-wrapper">    	
        <?php if($ale_tab_id == 0) : ?>
        	<svg version="1.1" class="ale-video-svg animate-in-fade" id="ale-video" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	         	width="66px" height="66px" viewBox="0 0 82 82" enable-background="new 0 0 82 82" xml:space="preserve">
	        	<path fill="#fff" stroke="#fff" d="M40.999,0.542C18.656,0.542,0.542,18.655,0.542,41c0,22.344,18.114,40.458,40.458,40.458
	            c22.345,0,40.459-18.114,40.459-40.458C81.458,18.655,63.344,0.542,40.999,0.542z M31.421,58.268V23.732L58.395,41L31.421,58.268z"/>
		    </svg>
            <div class="thumba-list-wrapper fade-image">
                <a href="<?php echo esc_url(get_the_permalink()); ?>">                	
                    <?php if($ale_blog_style == 'style3') : echo get_the_post_thumbnail(get_the_ID(), 'post-list-st3'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-list'); endif;?>
                </a>
            </div>
        <?php  else : ?>
        	<svg version="1.1" class="ale-video-svg animate-in-fade" id="ale-video" xmlns="http://www.w3.org/2000/svg" 		xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	         	width="66px" height="66px" viewBox="0 0 82 82" enable-background="new 0 0 82 82" xml:space="preserve">
	        	<path fill="#fff" stroke="#fff" d="M40.999,0.542C18.656,0.542,0.542,18.655,0.542,41c0,22.344,18.114,40.458,40.458,40.458
	            c22.345,0,40.459-18.114,40.459-40.458C81.458,18.655,63.344,0.542,40.999,0.542z M31.421,58.268V23.732L58.395,41L31.421,58.268z"/>
		    </svg>
            <div class="thumba-list-wrapper fade-image">
                <?php if(!is_sticky(get_the_ID())) : ?>
                    <a href="<?php echo esc_url(get_the_permalink()); ?>">                	
                        <?php if($ale_blog_style == 'style3' && $ale_col_number = '2') : echo get_the_post_thumbnail(get_the_ID(), 'post-grid-col2'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-grid2'); endif;?>
                    </a>
                <?php else: ?>
                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php if($ale_blog_style == 'style3') : echo get_the_post_thumbnail(get_the_ID(), 'post-list-st3'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-list'); endif;?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </figure>    
<?php else : ?>
    <div class="non-img-post"></div>
<?php endif; ?> 
<?php
//Display the video
 if( $ale_check_video == 'video' && ( $ale_mp4_link || $ale_external_link) ) : ?> 
	 <div class="media-list-wrapper">	 	
		<?php
		if( $ale_mp4_link ) : ?>
			<div class="alevideo-wrapper fade-image">
			<?php   ale_create_media_output(array(
					'id'        => 'video-'.get_the_ID(),
					'type'      => "video",
					'file_mp4'  => $ale_mp4_link,
					'file_webm' => $ale_mp4_link,
					'poster'    => $ale_thumb_url_content,
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
<?php endif;?>
<div class="post-list-body<?php if(!has_post_thumbnail()): echo esc_attr(' no-thumb-style', 'elli'); endif;?>">
    <div class="post-list-info">
        <div class="post-list-top">
            <div class="post-list-title">
              <h4 class="post-list-name"><a href="<?php echo esc_url(get_the_permalink() );  ?>"><?php the_title(); ?></a></h4>
            </div>
            <div class="post-list-item-meta">
                <div class="post-list-date">
                    <?php if(get_the_title()) : ?><span class="month"><?php echo get_the_date(); ?></span><?php elseif(!get_the_title()) : ?><a href="<?php echo esc_url(get_the_permalink(), 'elli'); ?>"><span class="month"><?php echo get_the_date(); ?></span></a><?php endif; ?><?php if(has_category() && $ale_show_cat == 'yes') : ?><span class="blog-cats"><i class="fa fa-circle blog-post-separate-dott" aria-hidden="true"></i><?php echo the_category(', ');?></span><?php elseif(has_category() && $ale_show_cat == 'yes') : ?><span class="blog-cats"><?php echo the_category(', ');?></span><?php endif; ?>
                </div>
            </div>
            <?php if($ale_show_sepp == 'yes') : ?>
                <div class="menu-item-separator"></div>
            <?php endif; ?>
        </div>
        <?php if($ale_show_exc == 'yes') : ?>
            <div class="entry-list-content">
                <p><?php ale_excerpt_twi(esc_html($ale_length_exc, 'elli')); ?></p>
            </div>
        <?php endif; ?>
        <?php if($ale_show_comm == 'yes' || $ale_show_likes == 'yes' || $ale_show_auth == 'yes' || $ale_tab_id == 0) : ?>
            <div class="show-post-bottom-line">
                <div class="elli-avatar-wrapper">
                    <?php if($ale_tab_id == 0) : ?>
                        <div class="ale-4rd-btn ale-sml-btn-blog">
                            <a  class="ale-4rd-btn" href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <span class="ale-btn-text"><?php echo esc_html( 'Read more', 'elli' ); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if($ale_show_auth == 'yes' && $ale_tab_id == 1) : ?>
                        <div class="avatar-wrapper">
                            <?php $author_ID = get_the_author_meta('ID') ?>
                            <?php echo get_avatar($author_ID, '72'); ?>
                        </div>
                    <span class="ava-info"><span><?php echo esc_html('by ', 'elli'); ?></span><?php the_author_posts_link(); ?></span><?php endif; ?><?php if($ale_tab_id == 1 && $ale_show_auth == 'yes' && ($ale_show_comm == 'yes' || $ale_show_likes =='yes')) : ?><span class="ava-middle-line"></span>
                    <div class="post-bottom-icon-wrapper blog-icon-grid-style">
                        <?php if($ale_show_comm == 'yes') : ?>
                            <span class="comment-blog-s"><?php echo get_comments_number(get_the_ID()); ?><span class="blog-comment icon_comment_alt"></span></span>
                        <?php endif; ?>
                        <?php if($ale_show_likes =='yes' && function_exists('ale_getPostLikeLink')) : echo ale_getPostLikeLink(get_the_ID()); endif; ?>
                    </div>
                <?php elseif($ale_tab_id == 1 && $ale_show_auth != 'yes') : ?>
                    <div class="post-bottom-icon-wrapper blog-icon-grid-style">
                        <?php if($ale_show_comm == 'yes') : ?>
                            <span class="comment-blog-s"><?php echo get_comments_number(get_the_ID()); ?><span class="blog-comment icon_comment_alt"></span></span>
                        <?php endif; ?>
                        <?php if($ale_show_likes =='yes' && function_exists('ale_getPostLikeLink')) : echo ale_getPostLikeLink(get_the_ID()); endif; ?> 
                    </div>
                <?php endif; ?>
                </div>
                <?php if($ale_tab_id == 0 && ($ale_show_comm == 'yes' || $ale_show_likes =='yes')) : ?>
                    <div class="post-bottom-icon-wrapper">
                        <?php if($ale_show_comm == 'yes') : ?>
                            <span class="comment-blog-s"><?php echo get_comments_number(get_the_ID()); ?><span class="blog-comment icon_comment_alt"></span></span>
                        <?php endif; ?>
                        <?php if($ale_show_likes && function_exists('ale_getPostLikeLink')) : echo ale_getPostLikeLink(get_the_ID()); endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>