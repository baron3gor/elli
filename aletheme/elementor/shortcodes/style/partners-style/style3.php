<div class="ale-multi-partners-wrapper-row fade-animation">
    <div class="ale-multi-partners-row">
        <?php    
        foreach($ale_part as $partner => $item) : 
            $ale_i_link    = $item['url_link']['url'];
            $ale_i_targ    = ($item['url_link']['is_external']) ? '_blank' : '_self';
            $ale_i_img     = $item['part_img']['url'];
            $ale_i_alt     = get_post_meta($item['part_img']['id'], '_wp_attachment_image_alt', true);

            if(isset($ale_i_link) && !empty($ale_i_link)) : ?>
                <div class="partner-wrapper-item">
                    <a class="ale-partner-link-wrapper-row" href="<?php echo esc_url($ale_i_link, 'elli'); ?>" target="<?php echo esc_attr( $ale_i_targ ); ?>">
                        <img src="<?php echo esc_url($ale_i_img, 'elli'); ?>" alt="<?php echo esc_attr($ale_i_alt, 'elli'); ?>">
                    </a>
                </div>
            <?php endif; 
        endforeach; ?>
    </div>
</div>