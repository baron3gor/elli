<?php if(isset($ale_partner['url']) && !empty($ale_partner['url'] && $ale_style == 'single')){
    $ale_partner = $ale_partner['url']; ?>
    <div class="partner-wrapper fade-animation">
        <div class="wrapper-li-ale">
        <a href="<?php echo esc_url($ale_link['url'], 'elli'); ?>" target="<?php echo esc_attr( $ale_target ); ?>">
            <img class="front-img" src="<?php echo esc_url($ale_partner, 'elli'); ?>" alt="<?php echo esc_attr($ale_alt, 'elli'); ?>">
        </a>
        </div>
    </div>
<?php } ?>