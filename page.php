<?php get_header(); ?>
    <div>
        <div class="template ale-page-template-wrapper" role="main">
    
            <?php get_template_part('partials/content-page-header'); ?>
    
            <div class="ale-single-page-template elli-wrapper-template wrapper elli-boxed-template-wrapper">
    
                <div class="builder-content">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="ale-page-thumb-wrapper fade-image">
                                <?php the_post_thumbnail(); ?>
                            </div>                            
                        <?php endif; ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                                <?php the_content(); ?>
                            </div>
                    <?php endwhile; else: ?>
                        <?php get_template_part('partials/notfound')?>
                    <?php endif; ?>
                </div>
    
                <?php if (comments_open() || get_comments_number()) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
            </div>
        </div>

<?php get_footer(); ?>