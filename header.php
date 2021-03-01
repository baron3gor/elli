<?php if(isset($_POST['contact'])) { $error = ale_send_contact($_POST['contact']); }?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" >
	<?php  global $ale_red_option, $woocommerce;
    $ale_theme_nav = $ale_red_option['theme_pages_nav'];
    $ale_page_nav  = '';

    if(!ale_get_meta('navigation_type')) : $ale_page_nav = $ale_theme_nav;
    else : $ale_page_nav = ale_get_meta('navigation_type'); endif; wp_head();?>
</head>
<body <?php body_class(); ?><?php if(!empty(ale_get_meta('color_body'))) : echo esc_attr(' data-color=' . ale_get_meta('color_body'), 'elli'); endif; ?>>
    <?php wp_body_open(); ?>
    <div class="elli_main_container">
        <div class="elli_wrapper"><!-- Wrapper start -->
            <div class="site_wrapper cf"><!-- Main Container Start -->
                <?php if(!is_page_template('template-left-sidebar.php')) : ?>  
                    <?php if ( is_active_sidebar( 'side-menu-toggle' ) ) { ?>
                        <section class="elli-side-menu elli-sidebar-wrapper elli-side-desktop">
                            <aside class="side-menu-wrapper">
                                <i class="ti-close"></i>
                                <?php dynamic_sidebar( 'side-menu-toggle' ); ?>
                            </aside>
                        </section>
                    <?php } ?>
                 <?php endif; ?> 
                    <section class="elli-side-menu elli-sidebar-wrapper elli-side-mobile">
                        <div class="elli-panel-contents">
                            <aside class="side-menu-wrapper">
                                <i class="ti-close"></i>
                                <?php if ( has_nav_menu( 'mobile_menu' ) ) { ?>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'mobile_menu',
                                            'menu_id'         => 'mobile-navigation',
                                            'menu'            => 'Mobile Menu',
                                            'menu_class'      => 'menu',
                                            'walker'          => new aleframework_menu_walker,
                                            'container'       => 'nav',
                                            'container_class' => 'mobile-nav',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'container_id'    => '',
                                        )); ?>
                                    <?php } ?>
                            </aside>
                        </div>
                    </section>
                    <div class="ale-search-fullscreen-wrapper">
                        <div class="search-layer-one"></div>
                        <div class="search-layer-two"></div>
                        <div class="search-layer-three">
                            <i class="ti-close"></i>
                            <?php get_template_part( "popup-search" ); ?>
                        </div>
                    </div> 
                <div class="elli-container<?php if(is_page_template('template-left-sidebar.php')) : echo esc_attr(' elli-stickyleft-template', 'elli'); endif; ?>">
                    <?php if(!is_page_template('template-left-sidebar.php')) : ?>  
                        <header class="header_wrapper">
                            <div class="header_top_line_wrapper ale-container-appear">
                                <div class="header_top_line ale-megamenu-container <?php if($ale_page_nav == 'boxnav' || $ale_page_nav == '2') : echo esc_attr('wrapper', 'elli'); else : echo esc_attr('wrapper-full-width'); endif; ?>">
                                    <div class="top_line_logo_wrapper">
                                        <a href="<?php echo esc_url(home_url("/")); ?>">
                                            <?php if(!empty($ale_red_option['logo-img']['url'])) { ;?>
                                                <img src="<?php echo esc_url($ale_red_option['logo-img']['url']); ?>" alt="<?php the_title(); ?>" srcset="<?php echo esc_url($ale_red_option['logo-img']['url']) . ' 2x'; ?>">
                                            <?php } else { ?>
                                                <h1><?php esc_html(bloginfo('title')); ?></h1>
                                            <?php } ;?>
                                        </a>
                                    </div>
                                    <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'header_menu',
                                            'menu'            => 'Header Menu',
                                            'menu_class'      => 'ale-navigation-list',
                                            'walker'          => new aleframework_menu_walker,
                                            'container'       => 'nav',
                                            'container_class' => 'ale-nav-wrapper',
                                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                            'container_id'    => '',
                                        )); ?>
                                    <?php } ?>
                                    <div class="top_line_icons_wrapper">
                                        <div class="top_line_icons_search">
                                            <span class="top_line_search"></span>
                                        </div>
                                        <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                                            <div class="alewoo-icon-shop-header">
                                                <a href="<?php echo esc_url(wc_get_cart_url() , 'elli'); ?>" class="top_line_icons_shop">
                                                    <span class="top_line_shop"><span class="top_line_count_shop">0</span></span> 
                                                </a>
                                                <div class="alewoo-cart-wrapper-header alewoo-cart-fn-wrapper">
                                                    <?php  woocommerce_mini_cart() ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="top_line_menu_icon<?php if(!is_active_sidebar( 'side-menu-toggle' )) : echo esc_attr(' ale-check-sidemenu-content ale-side-menu-empty', 'elli'); endif;?><?php if(!has_nav_menu( 'mobile_menu' )) : echo esc_attr(' ale-check-mobile-menu ale-mobile-menu-empty', 'elli'); endif;?>">
                                            <span class="top_line_sidemenu_icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                                <circle fill="#4e413b" cx="4" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="4" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="4" cy="20" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="20" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="20" r="2"/>
                                                </svg>            
                                            </span>
                                        </div>                                  
                                    </div>
                                </div>
                            </div>
                            <div class="header_top_line_sticky" <?php if(!empty(ale_get_meta('color_body'))) : echo ale_wp_kses('data-color="' . ale_get_meta('color_sticky') . '"', 'elli'); endif; ?>>
                               <div class="header_top_line wrapper">
                                    <div class="top_line_logo_wrapper">
                                        <a href="<?php echo esc_url(home_url("/")); ?>">
                                            <?php if(!empty($ale_red_option['logo-img']['url'])) { ;?>
                                                <img src="<?php echo esc_url($ale_red_option['logo-img']['url']); ?>" alt="<?php the_title(); ?>" srcset="<?php echo esc_url($ale_red_option['logo-img']['url']) . ' 2x'; ?>">
                                            <?php } else { ?>
                                                <h1><?php esc_html(bloginfo('title')); ?></h1>
                                            <?php } ;?>
                                        </a>
                                    </div>
                                    <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                                                <?php
                                                wp_nav_menu(array(
                                                    'theme_location'  => 'header_menu',
                                                    'menu_id'         => 'sticky-navigation',
                                                    'menu'            => 'Header Menu',
                                                    'menu_class'      => 'ale-navigation-list',
                                                    'walker'          => new aleframework_menu_walker,
                                                    'container'       => 'nav',
                                                    'container_class' => 'ale-nav-wrapper',
                                                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                                    'container_id'    => '',
                                                )); ?>
                                    <?php } ?>
                                    <div class="top_line_icons_wrapper">
                                        <div class="top_line_icons_search">
                                            <span class="top_line_search"></span>
                                        </div>
                                        <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                                            <div class="alewoo-icon-shop-header">
                                                <a href="<?php echo esc_url(wc_get_cart_url() , 'elli'); ?>" class="top_line_icons_shop">
                                                    <span class="top_line_shop"><span class="top_line_count_shop">0</span></span> 
                                                </a>
                                                <div class="alewoo-cart-wrapper-header alewoo-cart-fn-wrapper">
                                                    <?php  woocommerce_mini_cart() ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="top_line_menu_icon">
                                            <span class="top_line_sidemenu_icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                                <circle fill="#4e413b" cx="4" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="4" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="4" cy="20" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="20" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="20" r="2"/>
                                                </svg>            
                                            </span>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                        </header>
                    <?php elseif(is_active_sidebar( 'ale-template-sidebar' )) : ?>
                        <header class="ale-sidebar-template-header">
                            <div class="header_top_line_sticky">
                               <div class="header_top_line wrapper">
                                    <div class="top_line_logo_wrapper">
                                        <a href="<?php echo esc_url(home_url("/")); ?>">
                                            <?php if($ale_red_option['logo-img']) { ;?>
                                                <img src="<?php echo esc_url($ale_red_option['logo-img']['url']); ?>" alt="<?php the_title(); ?>" srcset="<?php echo esc_url($ale_red_option['logo-img']['url']) . ' 2x'; ?>">
                                            <?php } else { ?>
                                                <h1><?php esc_html(bloginfo('title')); ?></h1>
                                            <?php } ;?>
                                        </a>
                                    </div>
                                    <div class="top_line_icons_wrapper">
                                        <div class="top_line_icons_search">
                                            <span class="top_line_search"></span>
                                        </div>
                                        <div class="top_line_menu_icon">
                                            <span class="top_line_sidemenu_icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                                <circle fill="#4e413b" cx="4" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="4" r="2"/>
                                                <circle fill="#4e413b" cx="4" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="12" r="2"/>
                                                <circle fill="#4e413b" cx="4" cy="20" r="2"/>
                                                <circle fill="#4e413b" cx="12" cy="20" r="2"/>
                                                <circle fill="#4e413b" cx="20" cy="20" r="2"/>
                                                </svg>            
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="ale-sidear-template-container ale-megamenu-container onload-fade-animation">
                            <div class="ale-container-appear ale-vertical-navigation-wrapper">
                                <div class="ale-logo-wrapper">
                                    <a href="<?php echo esc_url(home_url("/")); ?>">
                                        <?php if($ale_red_option['logo-img']) { ;?>
                                            <img src="<?php echo esc_url($ale_red_option['logo-img']['url']); ?>" alt="<?php the_title(); ?>" srcset="<?php echo esc_url($ale_red_option['logo-img']['url']) . ' 2x'; ?>">
                                        <?php } else { ?>
                                            <h1><?php esc_html(bloginfo('title')); ?></h1>
                                        <?php } ;?>
                                    </a>
                                </div>
                                <?php if ( has_nav_menu( 'sticky_left' ) ) { ?>
                                    <div class="ale-vertical-menu-wrapper">
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'sticky_left',
                                            'menu'            => 'Sticky Sidebar Menu',
                                            'menu_id'         => 'sticky-left',
                                            'menu_class'      => 'ale-navigation-list',
                                            'walker'          => new aleframework_menu_walker,
                                            'container'       => 'nav',
                                            'container_class' => 'ale-nav-wrapper',
                                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                            'container_id'    => '',
                                        )); ?>
                                    </div>
                                <?php } ?>
                                <?php if(is_active_sidebar( 'ale-template-sidebar' )) : ?>
                                    <aside class="ale-sidebar-template-wrapper">
                                        <?php dynamic_sidebar( 'ale-template-sidebar' ); ?>
                                    </aside>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif;  ?>
                    <?php if( did_action( 'elementor/loaded' )) : ?>
                        <?php if ( \Elementor\Plugin::$instance->preview->is_preview_mode() || ale_get_meta('preloader_page') == 'disable' ) { ?>
                        <?php } elseif(ale_get_meta('preloader_page') == 'enable') { ?>
                            <aside class="ale-theme-loading logo-animation">
                                <div class="preload-logo-wrapper">
                                    <div class="preload-logo">
                                        <?php if($ale_red_option['logo-img']) { ;?>
                                            <img src="<?php echo esc_url($ale_red_option['logo-img']['url']); ?>" alt="<?php the_title(); ?>" srcset="<?php echo esc_url($ale_red_option['logo-img']['url']) . ' 2x'; ?>">
                                            <div class="loader-circle"></div>
                                            <div class="loader-line-mask">
                                                <div class="loader-line"></div>
                                            </div>
                                        <?php } else { ?>
                                            <h1><?php esc_html(bloginfo('title')); ?></h1>
                                        <?php } ;?>
                                    </div>
                                </div>
                            </aside>
                        <?php } ?>
                    <?php endif; ?>
                    <div class="site-content-wrapper">