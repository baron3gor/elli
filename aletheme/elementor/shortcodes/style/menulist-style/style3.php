<?php wp_enqueue_script('jquery-masonry');
    foreach ( $ale_cat as $term ) { 
    $category = get_term_by('slug', $term, 'restaurant-menu-category' ); ?>
        <div class="elli-menu-grid-sizer"></div>
        <div class="elli-menu-gutter-sizer"></div>
        <?php if($category) : ?>
            <div class="elli-tab-descr fade-animation elli-menu-grid-item<?php if($ale_ms_cols == 'three') : echo esc_attr(' elli-grid-item--width2', 'elli'); elseif($ale_ms_cols == 'one') : echo esc_attr(' elli-grid-item--width3', 'elli'); endif; if($ale_check_ids[0] === $item['_id']) : echo esc_attr(' current', 'elli'); endif; ?>" data-tab="<?php echo esc_attr($ale_item_ID, 'elli') ; ?>">
                <div class="elli-menu-wrapper-container menu-wrapper-container-masonry">
            
                    <div class="menu-list-wrapper">         
                        <div class="details-content-descr">
                            <h4><?php echo esc_html($category->name); ?></h4>
                            <span class="separate_dots">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <i class="fa fa-circle" aria-hidden="true"></i>
                            </span>
                            <?php echo ale_wp_kses(category_description($category)); ?>
                        </div>      
                        <?php

                        $args = array(
                            'post_type'      => 'restaurant-menu',
                            'post_status'    => 'publish',
                            'posts_per_page' => -1,
                            'tax_query'      => array(
                                array(
                                    'taxonomy'  => 'restaurant-menu-category',
                                    'field'     => 'slug',
                                    'terms'     => $term,
                                )
                            ),
                        );

                        $ale_menuitem = new \WP_Query($args);

                        if ($ale_menuitem->have_posts()) : while ($ale_menuitem->have_posts()) : $ale_menuitem->the_post(); 
                            $ale_menuitem_title = get_the_title();
                            $ale_subtitle       = ale_get_meta('subtitle');
                            $ale_price          = ale_get_meta('item_price');
                            $ale_description    = get_the_content(); ?>

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
            </div>
        <?php endif; ?>
    <?php } ?>