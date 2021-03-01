<?php $ale_alt = get_post_meta($ale_image['id'], '_wp_attachment_image_alt', true); ?>
<div class="image-box-wrapper-style3 fade-animation">
    <div class="image-box-icon">
        <?php if( ! empty($ale_image['url'])) : ?>
            <div class="icon-wrapper">
                <img src="<?php echo esc_url($ale_image['url']); ?>" alt="<?php echo esc_attr($ale_alt, 'elli'); ?>">
            </div>
        <?php endif; ?>
        <!-- End Features icon inner -->
    </div>
    <!-- End Features Icon -->
    <div class="description-wrapper">
        <?php if( !empty($ale_title) ) : ?>
            <h5 class="image-box-title"><?php echo esc_html( $ale_title, 'elli' ); ?></h5>
        <?php endif;
        if( !empty($ale_description) ) : ?>
            <?php echo ale_wp_kses( $ale_description, 'elli' ); ?>
        <?php endif;?>
    </div>
</div>