<?php get_header(); ?>

<div class="template" role="main">

    <?php get_template_part('partials/content-page-header'); ?>

    <div class="elli-wrapper-template wrapper elli-boxed-template-wrapper<?php if ( WC()->cart->get_cart_contents_count() == 0 && is_cart() || is_account_page() ) { echo esc_attr(' fade-animation', 'elli');} ?>">
        <div class="builder-content">       
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="padding story cf">                    
                    <div class="ale-attachment-wrapper entry-attachment">
                        <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
                            <p class="attachment"><a class="fade-image" href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo esc_url($att_image[0]);?>" width="<?php echo esc_attr($att_image[1]);?>" height="<?php echo esc_attr($att_image[2]);?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
                            </p>
                        <?php else : ?>
                            <a href="<?php echo wp_get_attachment_url($post->ID) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
                        <?php endif; ?>
                    </div>
                    <h3 class="ale-attachment-title fade-animation"><?php esc_html(the_title(), 'elli'); ?></h3>
                    <div class="ale-attachment-desc fade-animation">
                        <div class="ale-attachment-caption entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
                        <?php the_content( esc_html__( 'Continue reading <span class="meta-nav">&amp;raquo;</span>', 'elli' )  ); ?>
                        <?php wp_link_pages('before=<div class="page-link">' . esc_html__( 'Pages:', 'elli' ) . '&amp;after=</div>') ?>
                    </div>
                    <div class="breadcrumb fade-animation">
                        <div class="btn-wrapper">
                            <a class="ale-btn" href="<?php echo esc_js('javascript:history.go(-1)'); ?>"><span class="ale-btn-text"><?php esc_html_e('Go Back','elli'); ?></span><div class="overlay"></div></a>
                        </div>
                    </div>
                    
                </div>
            <?php endwhile; else: ?>
                <?php get_template_part('partials/notfound')?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>