<div class="elli-menu-wrapper-container <?php if($ale_menu_align == 'right') : echo esc_attr('st1-menu-wrap-right', 'elli'); endif; ?>">    
    <div class="menu-list-wrapper fade-animation classic-menulist-wrapper">
        <?php $args = array(
            'post_type'      => 'restaurant-menu',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'tax_query'      => array(
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
            $ale_subtitle       = ale_get_meta('subtitle');
            $ale_price          = ale_get_meta('item_price');
            $ale_description    = get_the_content(); ?>

            <div class="menu-list-item<?php if($ale_items_width == 'adapt') : echo esc_attr(' list-item-adapt', 'elli'); endif; ?>">
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
    <?php if(!empty($ale_img_cat)) : ?>
        <div class="style1-img-wrapper">
            <?php if($ale_dots_show == 'yes') : ?> 
                <div class="ale-dott-bg"></div>
            <?php endif; ?>
            <div class="gallery-animation-item">        
                <?php if($ale_img_cat != '') : ?>                           
                    <div class="fade-image">
                        <img src="<?php echo esc_url($ale_img_cat, 'elli') ?>" alt="<?php echo esc_attr($ale_alt, 'elli'); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>