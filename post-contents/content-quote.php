<?php global $ale_tab_id, $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

$ale_quote_text = ale_get_meta('quote_text');
$ale_quote_name = get_the_title(); ?>

<div class="ale-quotestyle-wrapper<?php if($ale_blog_style == 'style3') : echo esc_attr(' ale-quote-nosidebar-wrapper', 'elli'); endif;?><?php if(isset($ale_cols_number) && $ale_cols_number == 'two') : echo esc_attr(' ale-quote-2col', 'elli'); endif; ?>">
    <div class="ale-iconstyle-wrapper">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="66px" height="66px" viewBox="0 0 82 82" overflow="scroll" xml:space="preserve">
            <path fill="#FF6D24" d="M41,0C18.4,0,0,18.4,0,41s18.4,41,41,41s41-18.4,41-41S63.6,0,41,0z M37.3,38.1c-0.3,4.4-2.3,11-10.2,17.4
            c-0.4,0.3-0.8,0.5-1.3,0.5c-0.6,0-1.2-0.3-1.6-0.8c-0.7-0.9-0.5-2.3,0.4-3c6.5-5.2,8.3-10.4,8.6-13.9c-0.9,0.5-2,0.9-3.1,0.9
            c-3.5,0-6.3-2.9-6.3-6.6s2.8-6.6,6.3-6.6c0.8,0,1.5,0.2,2.2,0.5l0,0c0.1,0,0.3,0.1,0.7,0.3c0,0,0,0,0.1,0l0,0c0.3,0.2,0.6,0.4,1,0.7
            c0.2,0.1,0.3,0.3,0.4,0.4C36.1,29.5,37.8,32.5,37.3,38.1z M58.2,38.1c-0.3,4.4-2.3,11-10.2,17.4c-0.4,0.3-0.8,0.5-1.3,0.5
            c-0.6,0-1.2-0.3-1.7-0.8c-0.7-0.9-0.5-2.3,0.4-3c6.5-5.2,8.3-10.4,8.6-13.9c-0.9,0.5-1.9,0.9-3.1,0.9c-3.5,0-6.3-2.9-6.3-6.6
            s2.8-6.6,6.3-6.6c0.8,0,1.5,0.2,2.2,0.5l0,0c0.1,0,0.4,0.1,0.7,0.3c0,0,0,0,0.1,0c0,0,0,0,0,0c0.3,0.2,0.6,0.4,1,0.7
            c0.2,0.1,0.3,0.3,0.4,0.4C56.9,29.5,58.6,32.5,58.2,38.1z"/>
        </svg>     
        <h6><i class="fa fa-circle blog-post-separate-dott" aria-hidden="true"></i><?php echo get_the_date(); ?></h6>
    </div>
    <div class="post-list-body">
        <div class="post-list-info">
            <div class="post-list-top">
                <div class="post-list-title">
                    <h5 class="post-list-name">
                        <a href="<?php echo esc_url(get_the_permalink() );  ?>"><?php echo ale_wp_kses('"' . $ale_quote_text . '"'); ?></a></h5>
                </div>
            </div>
            <div class="post-list-bottom">
                <h6 class="ale-quote-title"><span class="ava-middle-line"></span><?php echo esc_html($ale_quote_name, 'elli'); ?></h6>
                <?php if($ale_show_comm == 'yes' || $ale_show_likes =='yes') : ?>
                    <div class="post-bottom-icon-wrapper">
                        <?php if($ale_show_comm == 'yes') : ?>
                            <span class="comment-blog-s"><?php echo get_comments_number(get_the_ID()); ?><span class="blog-comment icon_comment_alt"></span></span>
                        <?php endif; ?>
                        <?php if($ale_show_likes && function_exists('ale_getPostLikeLink')) : echo ale_getPostLikeLink(get_the_ID()); endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>