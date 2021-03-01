<?php 
    if (post_password_required()) : ?>
    <p class="comments-protected fade-animation"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'elli'); ?></p>
<?php   return; endif; ?>
<div class="ale-comments-wrapper" id="comments">
    <?php if (have_comments()) : ?>
        <div class="ale_comments_container cf fade-animation">
            <div class="comments_name cf">
                <div class="comments_title"><h4><?php echo esc_html__('Comments','elli') ?></h4></div>
            </div>

            <?php if (have_comments()) : ?>

                <?php wp_list_comments(array('callback' => 'ale_comment_default','style' => 'div', 'max_depth' => 2,'avatar_size' => 66,)); ?>


                <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                    <nav class="comments-nav" class="pager">
                        <div class="previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'elli')); ?></div>
                        <div class="next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'elli')); ?></div>
                    </nav>
                <?php endif; // check for comment navigation ?>
            <?php  endif; ?>
        </div>
    <?php  endif; ?>


    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'elli' ); ?></p>
    <?php endif; ?>

    <?php if(comments_open()){ ?>
    <div id="respond" class="leave-a-comment fade-animation">
        <div class="comments_name cf">
            <h4 class="ale_comments_title"><?php esc_html_e('Leave a comment','elli');?> <?php echo cancel_comment_reply_link('Cancel Reply'); ?></h4>
            <div class="comments_separator"></div>
            <a name="respond"></a>
        </div>

        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
            <p class="loginforcomment"><?php printf(ale_wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'elli')), wp_login_url(get_permalink())); ?></p>
        <?php else : ?>
            <form action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" id="comment-form" method="post" class="ale-comment-form cf">

                <?php if (is_user_logged_in()) : ?>
                    <div class="loginforcomment cf">
                        <p class="ale-4rd-btn"><?php printf(ale_wp_kses(__('<a class="login_link" href="%s/wp-admin/profile.php">Logged in as %s</a>.', 'elli')), get_option('siteurl'), $user_identity); ?> <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>" title="<?php esc_html__('Log out of this account', 'elli'); ?>"><?php esc_html_e('Log out', 'elli'); ?></a></p>
                    </div>
                <?php else : ?>
                    <?php echo esc_html('Your email address will not be published.', 'elli'); ?>
                <?php endif; ?>
                <div class="ale_comment_wrapper"> 
                    <?php if (!is_user_logged_in()) : ?>
                    <div class="line-item cf">
                        <div class="ale_comment_info_wrapper">
                            <div class="third_item">
                                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" placeholder="<?php esc_attr_e('Your name*','elli'); ?>" />
                            </div>                        
                            <div class="third_item">
                                <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> required="required"  placeholder="<?php esc_attr_e('Your e-mail*','elli'); ?>" />
                            </div>
                        </div>                      
                        
                    </div>
                    <?php endif; ?>
                     <div class="line-item ale_comment_container">
                        <textarea id="comment" name="comment" tabindex="1" class="ale_comment_message" required="required" placeholder="<?php esc_attr_e('Type here your comment','elli'); ?>"></textarea>
                    </div>

                    <div class="line-item submit_container cf">
                        <input type="submit" name="submit" tabindex="5" value="<?php esc_attr_e('Post a Comment','elli'); ?>"/>
                    </div>
                </div>
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; // if registration required and not logged in ?>

    <?php if(isset($wp_default_form)){ comment_form(); } ?>
    </div>
    <?php } ?>
</div>