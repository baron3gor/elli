<?php if ( is_active_sidebar( 'alewoo-shop-sidebar' ) && is_woocommerce()) { ?>
    <aside class="sidebar woo cf fade-animation">
        <div class="sidebar_container">
            <?php dynamic_sidebar( 'alewoo-shop-sidebar' ); ?>
        </div>
    </aside>
<?php } else if(is_active_sidebar( 'blog-sidebar' )) { ?>
	<aside class="sidebar cf fade-animation">
        <div class="sidebar_container">
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
    </aside>
<?php } ?>