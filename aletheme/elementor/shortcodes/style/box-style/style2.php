<div class="image-box-wrapper fade-animation">
    <div class="image-box-icon">
        <?php if( ! empty($ale_number)) : ?>
            <span class="number_box"><?php echo esc_html($ale_number, 'elli') ;?></span>
            <div class="separate-box"></div>
        <?php endif; ?>
        <!-- End Features icon inner -->
    </div>
    <!-- End Features Icon -->
    <?php if( !empty($ale_title) ) : ?>
        <h5 class="image-box-title image-box-title-number"><?php echo esc_html( $ale_title, 'elli' ); ?></h5>
    <?php endif;
    if( !empty($ale_description) ) : ?>
        <?php echo ale_wp_kses( $ale_description, 'elli' ); ?>
    <?php endif;?>
    <?php if(!empty($btn_text) && !empty($btn_link)) : ?>
        <div class="ale-4rd-btn image-box-number-btn">
            <a  class="ale-4rd-btn" href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_attr( $btn_target, 'elli' ); ?>">
                <span class="ale-btn-text"><?php echo esc_html( $btn_text ); ?></span>
            </a>
        </div>
    <?php endif; ?>
</div>