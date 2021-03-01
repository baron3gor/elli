<?php global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_col_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

$ale_thumb_url_content = get_the_post_thumbnail_url(get_the_ID());
$ale_audio_url_mp3     = esc_url(ale_get_meta('mp3_link'));
$ale_audio_url_ogg     = esc_url(ale_get_meta('ogg_link')); 
$ale_audio_check       = ale_get_meta('check_audio');

//display featured image
if(has_post_thumbnail() && get_the_post_thumbnail_url(get_the_ID()) != '' ): ?>
	<figure class="media-list-wrapper">
	    <?php if($ale_tab_id == 0) : ?>
	        <div class="thumba-list-wrapper fade-image">
	            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                    <?php if($ale_blog_style == 'style3') : echo get_the_post_thumbnail(get_the_ID(), 'post-list-st3'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-list'); endif;?>
                </a>
	        </div>
	    <?php  else : ?>
            <?php if(!is_sticky(get_the_ID())) : ?>
    	        <div class="thumba-list-wrapper fade-image">
    	            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php if($ale_blog_style == 'style3' && $ale_col_number = '2') : echo get_the_post_thumbnail(get_the_ID(), 'post-grid-col2'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-grid2'); endif;?>
                    </a>
    	        </div>
            <?php else: ?>
                <a href="<?php echo esc_url(get_the_permalink()); ?>">
                    <?php if($ale_blog_style == 'style3') : echo get_the_post_thumbnail(get_the_ID(), 'post-list-st3'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-list'); endif;?>
                </a>
            <?php endif; ?>
	    <?php endif; ?>
	</figure>
<?php else : ?>
    <div class="non-img-post"></div>
<?php endif; ?>
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
        <?php if($ale_audio_check == 'display' && ($ale_audio_url_mp3 != '' || $ale_audio_url_ogg != '')) : ale_create_media_output(array(
				'id'       => 'audio-'.get_the_ID(),
				'type'     => "audio",
				'file_mp3' => $ale_audio_url_mp3,
				'file_oga' => $ale_audio_url_ogg,
				'poster'   => $ale_thumb_url_content	
		)); endif; ?>
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