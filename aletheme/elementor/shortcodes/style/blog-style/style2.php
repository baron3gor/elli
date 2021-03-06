<div class="elli-blog-list-wrapper" data-widgid="<?php echo esc_attr($widgetID, 'elli'); ?>" data-curpage="1" data-maxpage="<?php echo esc_attr($ale_max_page, 'elli'); ?>" data-perpage="<?php echo esc_attr($ale_post_count, 'elli') ?>" data-exc="<?php echo esc_attr($ale_length_exc, 'elli') ?>" data-pagination="<?php echo esc_attr($ale_pag_style, 'elli'); ?>" data-sidebar="<?php echo esc_attr($ale_blog_style, 'elli'); ?>" data-pagpage="<?php echo esc_attr($paged, 'elli'); ?>" data-display-media="<?php echo esc_attr($ale_show_media, 'elli'); ?>"  data-display-cat="<?php echo esc_attr($ale_show_cat, 'elli'); ?>"   data-display-sepp="<?php echo esc_attr($ale_show_sepp, 'elli'); ?>" data-display-auth="<?php echo esc_attr($ale_show_auth, 'elli'); ?>" data-display-comm="<?php echo esc_attr($ale_show_comm, 'elli'); ?>"   data-display-likes="<?php echo esc_attr($ale_show_likes, 'elli'); ?>" data-display-exc="<?php echo esc_attr($ale_show_exc, 'elli'); ?>">
    <div class="ale-blog-tabs-wrap">
        <div class="elli-blog-tabs left-sidebar-style">
            <div class="form-wrapper">
                <div class="form-container" data-sort="date">
                    <form class="ale-form-sortby" method="post">
                        <select name="aleorderby1" class="ale-blog-orderby">
                            <option value="date"<?php if($ale_sort_opt == $ale_select_date) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by date', 'elli'); ?></option>
                            <option value="author"<?php if($ale_sort_opt == $ale_select_auth) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by author', 'elli'); ?></option>
                            <option value="title"<?php if($ale_sort_opt == $ale_select_titl) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by title', 'elli'); ?></option>
                            <option value="modified"<?php if($ale_sort_opt == $ale_select_modi) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by modified', 'elli'); ?></option>
                            <option value="type"<?php if($ale_sort_opt == $ale_select_type) : echo esc_attr(' selected', 'elli'); endif; ?>><?php echo esc_html('Sort by type', 'elli'); ?></option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="view-wrapper">
                <div class="view-list blog-tabs <?php if($ale_tab_id == 0) : echo esc_attr('current-postview-tab', 'elli'); endif; ?>" data-tab="0"><i class="icon-list4"></i></div><div class="icon-grid blog-tabs <?php if($ale_tab_id == 1) : echo esc_attr('current-postview-tab', 'elli'); endif; ?>" data-tab="1"><i class="icon-grid"></i></div>
            </div>             
        </div>
    </div>
    <div class="elli-blog-content left-sidebar-style">
        <?php if(is_active_sidebar( 'blog-sidebar' )) : ?>
            <?php if ( empty( $sidebar ) ) {
                return;
            }?>
            <aside class="elli-sidebar-wrapper <?php echo esc_attr($sidebar) . '-wrapper' ;?> fade-animation">
                <div class="sidebar_container">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </aside>
        <?php endif; ?>
        <div class="elli-blog-wrapper<?php if(!is_active_sidebar( 'blog-sidebar' )) : echo esc_attr(' elli-blog-empty-side', 'elli'); endif; ?>" data-page="<?php echo esc_attr($paged) ?>">
            <div class="current-postview-content blog-list-wrapper">
                <div class="blog-wrapper-style <?php if($ale_tab_id == 0) : echo esc_attr('post-list-style', 'elli'); else : echo esc_attr('post-grid-style', 'elli'); endif;?>">
                    <?php if($query->have_posts()):  while ($query->have_posts()) : $query->the_post() ?>
                        <article <?php post_class() ?>>
                            <div class="post-list-container">
                                <?php get_template_part( '/post-contents/content', get_post_format() ); ?>
                            </div>
                            <!-- End Tw Latest Post -->
                        </article>

                    <?php endwhile; else: ?>
                        <?php get_template_part('partials/notfound')?>
                    <?php endif; ?>
                </div>
                <!-- End Col -->
            </div>
            <?php if($ale_pag_style == 'pag') : ?>
                <div class="blog-pagination-animate">
                    <?php ale_widget_get_pagination($query); ?>
                </div>
            <?php endif; ?>
        </div>
        
    </div>
</div>