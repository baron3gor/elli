<?php $ale_alt = get_post_meta($ale_image['id'], '_wp_attachment_image_alt', true); ?>
    <div class="image-box-block-wrapper">
        <div class="image-box-animation fade-animation">
            <div class="image-box">            
                <?php if( ! empty($ale_image['url'])) : ?>
                    <div class="image-box-frontimg">
                        <div class="image-wrapper fade-image">
                            <img src="<?php echo esc_url($ale_image['url'], 'elli'); ?>" alt="<?php echo esc_attr($ale_alt, 'elli'); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if( !empty($ale_title) ) : ?>
                <h5 class="image-box-title"><?php echo esc_html( $ale_title, 'elli' ); ?></h5>
            <?php endif;
            if( !empty($ale_description) ) : ?>
                <div class="image-box-descr-wrapper">
                    <?php echo  ale_wp_kses($ale_description, 'elli') ; ?>
                </div>
            <?php endif;?>
        </div>
        <?php if($ale_left_dots == 'yes') : ?>
            <div class="ale-dott-left-background"></div>
        <?php endif; ?>
        <?php if($ale_right_dots == 'yes') : ?>
            <div class="ale-dott-right-background"></div>
        <?php endif; ?>
    </div>