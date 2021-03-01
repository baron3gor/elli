<?php wp_enqueue_script('masonry');?>
<div class="elli-menu-wrapper-container<?php if($ale_align == 'left') : echo esc_attr('left-menu-align', 'elli'); endif; ?> <?php if($style == 'style2') : echo esc_attr('menu-wrapper-container-gallery','elli'); endif; ?>">
    <div class="details-content">
        <?php if($ale_dots_show == 'yes') : ?>
            <div class="ale-dott-bg" <?php echo ale_wp_kses($ale_dotsstyle, 'elli'); ?>></div>
                <?php if($ale_line1['1']['width'] != '') : ?><span class="line1" <?php ale_linebg_style($ale_line1['1']['color'], $ale_line1['1']['width'], $ale_line1['0']['bottom'], $ale_line1['0']['left'], $ale_line1['0']['unit']); ?>></span><?php endif; ?>
                <?php if($ale_line2['1']['width'] != '') : ?><span class="line2" <?php ale_linebg_style($ale_line2['1']['color'], $ale_line2['1']['width'], $ale_line2['0']['bottom'], $ale_line2['0']['left'], $ale_line2['0']['unit']); ?>></span><?php endif; ?>
                <?php if($ale_line3['1']['width'] != '') : ?><span class="line3" <?php ale_linebg_style($ale_line3['1']['color'], $ale_line3['1']['width'], $ale_line3['0']['bottom'], $ale_line3['0']['left'], $ale_line3['0']['unit']); ?>></span><?php endif; ?>
                <?php if($ale_line4['1']['width'] != '') : ?><span class="line4" <?php ale_linebg_style($ale_line4['1']['color'], $ale_line4['1']['width'], $ale_line4['0']['bottom'], $ale_line4['0']['left'], $ale_line4['0']['unit']); ?>></span><?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="details-content-descr fade-animation">
            <?php if(!empty($ale_m_title)) : ?>
                <h4><?php echo esc_html($ale_m_title); ?></h4>
                <span class="separate_dots">
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </span>
            <?php endif; ?>
            <?php echo ale_wp_kses($ale_m_descr); ?>
        </div> 
        <div class="gallary-wrapper cf">
            <div class="gallery-wrapper-imgs">
                <?php if($ale_galleryArr) : foreach ( $ale_galleryArr as $image ) { ?>
                    <div class="menu-gallery-sizer"></div>
                    <div class="gutter-menu-gallery"></div>
                    <div class="gallery-item-wrapper cf gallery-animation menu-grid-gallery">
                        <div class="gallery-animation-item">
                        <div class="fade-image gallery-item gallery-portfolio"><?php echo wp_get_attachment_image( $image['id'], 'full' ); ?></div></div></div>
                <?php }; endif; ?>
            </div>   
        </div>
    </div>
    <div class="menu-list-wrapper fade-animation">
        <?php

        $args = array(
            'post_type' => 'restaurant-menu',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'restaurant-menu-category',
                    'field'     => 'slug',
                    'terms'     => $ale_cat,
                )
            ),
        );

        $ale_menuitem = new \WP_Query($args);

        if ($ale_menuitem->have_posts()) : while ($ale_menuitem->have_posts()) : $ale_menuitem->the_post(); 
            $ale_menuitem_title = get_the_title();
            $ale_subtitle = ale_get_meta('subtitle');
            $ale_price = ale_get_meta('item_price');
            $ale_description = get_the_content(); ?>

            <div class="menu-list-item">
                <div class="menu-list-top">
                    <?php if( !empty($ale_subtitle) ) : ?>
                        <div class="menu-list-subtitle">
                            <h6><?php echo esc_html( $ale_subtitle ); ?></h6>
                        </div>
                    <?php endif;?>
                    <div class="menu-list-top-title">
                        <?php if( !empty($ale_menuitem_title) ) : ?>
                            <h5><?php echo esc_html( $ale_menuitem_title ); ?></h5>
                        <?php endif;?>
                        <?php if( !empty($ale_price) ) : ?>
                            <span><?php echo esc_html( $ale_price ); ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <?php if( !empty($ale_description) ) : ?>
                    <div class="menu-item-separator"></div>
                    <div class="menu-list-bottom">
                        <p><?php echo esc_html( $ale_description ); ?></p>
                    </div>
                <?php endif;?>
            </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</div>