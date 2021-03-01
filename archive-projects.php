<?php get_header(); 
    get_template_part('partials/content-page-header');
    wp_enqueue_script('jquery-masonry'); ?>
<div>
<div class="ale-projects-page-wrapper wrapper">
    <div class="projects-gallery-wrapper">
        <div class="project-cats">
            <div>
                <div class="categories-wrapper-list">
                    <?php
                        $categories = get_terms( array(
                            'taxonomy'   => 'project-category',
                            'hide_empty' => true,
                            'orderby'    => 'name',
                            'order'      => 'ASC'
                        )); ?>

                        <div class="gallery-tab-item current_gallery fade-animation" data-id="0"><h6><?php echo esc_html_e('All','elli'); ?></h6></div>

                        <?php foreach( $categories as $category ) {
                            $ale_curid   = $category->term_id;
                            $ale_curname = $category->name;?><div class='gallery-tab-item fade-animation' data-id='<?php echo esc_attr($ale_curid); ?>'><h6><?php echo esc_html($ale_curname, 'elli') ?></h6></div><?php
                        } 

                        $args = array(
                            'post_type'   => 'projects',
                            'post_status' => 'publish',
                        );

                        $ale_style_gallery = '5';
                        $ale_post_count    = get_option( 'posts_per_page' ); 
                        $ale_gallery  = new \WP_Query($args);
                        $ale_max_page = $ale_gallery->max_num_pages; ?>
                </div>
                <div class="projects-content-wrapper-container">
                    <div class="content-wrapper-gallery" data-perpage="<?php echo esc_attr($ale_post_count, 'elli'); ?>" data-maxpage="<?php echo esc_attr($ale_max_page, 'elli') ?>" data-btn="<?php echo esc_attr($ale_style_gallery, 'elli') ?>">
                        <?php if ($ale_gallery->have_posts()) : while ($ale_gallery->have_posts()) : $ale_gallery->the_post() ;?>
                        <?php
                            $ale_img_id = get_post_thumbnail_id();
                            $ale_term_list = get_the_term_list($post->ID, 'project-category', '', ' / ', '');
                            $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);

                            if( !empty($ale_img_url)) : ?>
                                <div class="gallery-sizer"></div>
                                <div class="gutter-gallery"></div>
                                <div class="content-wrapper-img current_gallery fade-animation style5 grid-gallery">
                                    <div class="fade-image gallery-img">
                                        <a href="<?php the_permalink() ;?>"><img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery"></a>
                                    </div>
                                    <div class="title-wrapper">
                                        <h6 class="gallery-cat-list"><?php  echo print_r($ale_term_list, 'elli');  ?></h6>
                                        <h5><a class="gallery-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile;
                        else: ?>
                            <?php get_template_part('partials/notfound')?>
                        <?php endif; wp_reset_postdata();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>