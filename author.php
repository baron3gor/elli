<?php get_header(); ?>

<div>

<?php    get_template_part('partials/content-page-header'); 

    global $ale_show_exc, $ale_length_exc, $ale_sort_opt, $ale_blog_style, $ale_cols_number, $ale_show_media, $ale_show_cat, $ale_show_auth, $ale_show_comm, $ale_show_likes, $ale_show_sepp;

    $ale_pag_style   = 'pag';
    $ale_length_exc  = $ale_red_option['arch_exce'];
    $ale_orderby     = $ale_red_option['blog_order'];
    $ale_select_date = 'date';
    $ale_select_auth = 'author';
    $ale_select_titl = 'title';
    $ale_select_modi = 'modified';
    $ale_select_type = 'type';
    $ale_show_exc    = ale_get_value($ale_red_option['arch_show_exc']);
    $ale_show_media  = ale_get_value($ale_red_option['blog_image']);
    $ale_show_cat    = ale_get_value($ale_red_option['blog_cat']);
    $ale_show_auth   = ale_get_value($ale_red_option['blog_author']);
    $ale_show_comm   = 'no';
    $ale_show_likes  = 'no';
    $ale_show_sepp   = ale_get_value($ale_red_option['blog_separate']);
    $ale_blog_style  = 'style3'; ?>
    
<div class="ale-archive-wrapper">
    <div class="wrapper">
        <div class="elli-blog-list-wrapper-index">
            <div class="elli-blog-content no-sidebar-style">
                <div class="elli-blog-wrapper">
                    <div class="current-postview-content blog-list-wrapper">
                        <div class="blog-wrapper-style post-list-style">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <article <?php post_class() ?>>
                                    <div class="post-list-container">                                
                                        <?php get_template_part( '/post-contents/content', get_post_format() ); ?>
                                    </div>
                                </article>
                            <?php endwhile; else: ?>
                                <?php get_template_part('partials/notfound')?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="blog-pagination-animate fade-animation">
                        <?php ale_page_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>