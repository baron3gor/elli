<?php $ale_img_url = wp_get_attachment_image_src( $ale_img_id, 'full', true);
    if( !empty($ale_img_url)) : ?>
    <div class="gallery-sizer"></div>
    <div class="gutter-gallery"></div>
        <div class="content-wrapper-img current_gallery fade-animation style3 grid-gallery grid-gallery--width2">
            <div class="fade-image gallery-img">
                <a href="<?php the_permalink() ;?>"><img src="<?php echo esc_url($ale_img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-gallery"></a>
            </div>
            <div class="title-wrapper">
                <?php if(taxonomy_exists('project-category')) : ?>
                    <h6 class="gallery-cat-list"><?php echo ale_wp_kses($ale_term_list, 'elli');  ?></h6>
                <?php endif; ?>
                <h5><a class="gallery-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            </div>
        </div>
    <?php endif; ?>