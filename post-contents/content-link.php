<?php global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

$ale_external_link = ale_get_meta('ext_link');

//display featured image
if(has_post_thumbnail() && $ale_show_media == 'yes' && get_the_post_thumbnail_url(get_the_ID()) != '') : ?>
    <figure class="media-list-wrapper">     
        <?php if($ale_tab_id == 0) : ?>
            <svg version="1.1" class="ale-link-svg animate-in-fade" id="ale-link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="66px" height="66px" viewBox="0 0 82 82" overflow="scroll" xml:space="preserve">
                <path fill="#FFFFFF" d="M41,0C18.4,0,0,18.4,0,41s18.4,41,41,41s41-18.4,41-41S63.6,0,41,0z M40.8,49.5l-6.4,6.4
                    c-0.8,0.8-1.9,1.2-3.2,1.2c-1.6,0-3.3-0.7-4.4-1.8c-1.9-1.9-2.6-5.7-0.7-7.7l6.4-6.4c0.9-0.9,2.2-1.4,3.5-1.4c0.5,0,1,0.1,1.4,0.2
                    l-9.5,9.5c-1,1-0.1,3.2,0.7,4c0.6,0.6,1.7,1.1,2.6,1.1c0.5,0,1-0.2,1.3-0.5l9.5-9.5C42.5,46.3,42,48.2,40.8,49.5z M46,34.1
                    c0.3-0.3,0.6-0.4,1-0.4c0.4,0,0.7,0.1,1,0.4c0.5,0.5,0.5,1.4,0,1.9L36,47.9c-0.3,0.3-0.6,0.4-1,0.4c-0.4,0-0.7-0.1-1-0.4
                    c-0.5-0.5-0.5-1.4,0-1.9L46,34.1z M55.9,34.3l-6.4,6.4c-0.9,0.9-2.2,1.4-3.5,1.4c-0.5,0-1-0.1-1.4-0.2l9.5-9.5c1-1,0.1-3.2-0.7-4
                    c-0.6-0.6-1.7-1.1-2.6-1.1c-0.5,0-1,0.2-1.3,0.5L40,37.4c-0.5-1.7-0.1-3.6,1.2-4.9l6.4-6.4c0.8-0.8,1.9-1.2,3.2-1.2
                    c1.6,0,3.3,0.7,4.4,1.8C57.1,28.6,57.9,32.4,55.9,34.3z"/>
            </svg>
            <div class="thumba-list-wrapper fade-image">
                <a href="<?php echo esc_url($ale_external_link, 'elli'); ?>">                  
                    <?php if($ale_blog_style == 'style3') : echo get_the_post_thumbnail(get_the_ID(), 'post-list-st3'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-list'); endif;?>
                </a>
            </div>
        <?php  else : ?>
            <svg version="1.1" class="ale-link-svg animate-in-fade" id="ale-link" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="66px" height="66px" viewBox="0 0 82 82" overflow="scroll" xml:space="preserve">
                <path fill="#FFFFFF" d="M41,0C18.4,0,0,18.4,0,41s18.4,41,41,41s41-18.4,41-41S63.6,0,41,0z M40.8,49.5l-6.4,6.4
                    c-0.8,0.8-1.9,1.2-3.2,1.2c-1.6,0-3.3-0.7-4.4-1.8c-1.9-1.9-2.6-5.7-0.7-7.7l6.4-6.4c0.9-0.9,2.2-1.4,3.5-1.4c0.5,0,1,0.1,1.4,0.2
                    l-9.5,9.5c-1,1-0.1,3.2,0.7,4c0.6,0.6,1.7,1.1,2.6,1.1c0.5,0,1-0.2,1.3-0.5l9.5-9.5C42.5,46.3,42,48.2,40.8,49.5z M46,34.1
                    c0.3-0.3,0.6-0.4,1-0.4c0.4,0,0.7,0.1,1,0.4c0.5,0.5,0.5,1.4,0,1.9L36,47.9c-0.3,0.3-0.6,0.4-1,0.4c-0.4,0-0.7-0.1-1-0.4
                    c-0.5-0.5-0.5-1.4,0-1.9L46,34.1z M55.9,34.3l-6.4,6.4c-0.9,0.9-2.2,1.4-3.5,1.4c-0.5,0-1-0.1-1.4-0.2l9.5-9.5c1-1,0.1-3.2-0.7-4
                    c-0.6-0.6-1.7-1.1-2.6-1.1c-0.5,0-1,0.2-1.3,0.5L40,37.4c-0.5-1.7-0.1-3.6,1.2-4.9l6.4-6.4c0.8-0.8,1.9-1.2,3.2-1.2
                    c1.6,0,3.3,0.7,4.4,1.8C57.1,28.6,57.9,32.4,55.9,34.3z"/>
            </svg>
            <div class="thumba-list-wrapper fade-image">
                <?php if(!is_sticky(get_the_ID())) : ?>
                    <a href="<?php echo esc_url($ale_external_link, 'elli'); ?>">                  
                        <?php if($ale_blog_style == 'style3' && $ale_cols_number = '2') : echo get_the_post_thumbnail(get_the_ID(), 'post-grid-col2'); else : echo get_the_post_thumbnail(get_the_ID(), 'post-grid2'); endif;?>
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
        <?php if($ale_show_comm == 'yes' || $ale_show_likes == 'yes' || $ale_show_auth == 'yes' || $ale_tab_id == 0 ) : ?>
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