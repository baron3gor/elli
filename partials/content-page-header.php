<?php
/**
 * Page Header
 *
 */
global $ale_red_option;
$ale_bg_image 		   = '';
$ale_page_global_image = '';
$ale_header_image_2    = '';
$ale_header_image_3    = '';

///Global optipn
if(!empty($ale_red_option['elli-bg-header']['url'])) :
	$ale_page_global_image = $ale_red_option['elli-bg-header']['url'];
	$ale_mainImg_alt 	   = get_post_meta($ale_red_option['elli-bg-header']['id'], '_wp_attachment_image_alt', true);
endif;
if(!empty($ale_red_option['elli-bg-header2']['url'])) :
	$ale_header_image_2  = $ale_red_option['elli-bg-header2']['url'];
	$ale_img2_alt		 = get_post_meta($ale_red_option['elli-bg-header2']['id'], '_wp_attachment_image_alt', true);
endif;
if(!empty($ale_red_option['elli-bg-header3']['url'])) :
	$ale_header_image_3  = $ale_red_option['elli-bg-header3']['url'];
	$ale_img3_alt 		 = get_post_meta($ale_red_option['elli-bg-header3']['id'], '_wp_attachment_image_alt', true);
endif;

$ale_page_title = get_the_title();

//Page settings
$ale_page_heading = ale_get_meta('banner_title');
$ale_header_image = ale_get_meta('page_header');

if(!empty($ale_red_option['elli-bg-header']['url']) || !empty($ale_red_option['elli-bg-header2']['url']) || !empty($ale_red_option['elli-bg-header3']['url'])){
	$ale_header_img_1 = ale_app_transform_img($ale_red_option['header-image-animation1']);
	$ale_header_img_2 = ale_app_transform_img($ale_red_option['header-image-animation2']);
	$ale_header_img_3 = ale_app_transform_img($ale_red_option['header-image-animation3']);
}
$ale_heading  = $ale_page_heading != '' ? $ale_page_heading : $ale_page_title;
if ( $ale_header_image == '' ) {
	$ale_bg_image = $ale_page_global_image != '' ? $ale_page_global_image : '';
} else {
	$ale_bg_image = $ale_header_image != '' ? $ale_header_image : '';
} ?>
<div id="banner-area" class="banner-area ale-banner-area-wrapper">
	<?php if(!empty($ale_header_image_2)) : ?>	
		<div class="ale-bg-header-img2 ale-img-animation" <?php echo ale_wp_kses($ale_header_img_2, 'elli'); ?>><img src="<?php echo esc_url($ale_header_image_2, 'elli') ?>" alt="<?php echo esc_attr($ale_img2_alt, 'elli'); ?>"></div>
	<?php endif; ?>
	<?php if(!empty($ale_header_image_3)) : ?>
		<div class="ale-bg-header-img3 ale-img-animation" <?php echo ale_wp_kses($ale_header_img_3, 'elli'); ?>><img src="<?php echo esc_url($ale_header_image_3, 'elli') ?>" alt="<?php echo esc_attr($ale_img3_alt, 'elli'); ?>"></div>
	<?php endif; ?>	
	<div class="wrapper ale-header-title-wrapper">
		<?php if($ale_bg_image != '') : ?>
			<div class="ale-bg-header-img ale-img-animation" <?php echo ale_wp_kses($ale_header_img_1, 'elli'); ?>><img src="<?php echo esc_url($ale_bg_image, 'elli') ?>" alt="<?php echo esc_attr($ale_mainImg_alt, 'elli'); ?>"></div>
		<?php endif; ?>
		<div class="ale-header-dott-background"></div>
		<div class="banner-heading fade-animation">
			<h1 class="banner-title">
                <?php
                if(is_home() || is_singular('post')) :
                	echo esc_html('Blog', 'elli');
                elseif(is_archive()) :
                	wp_title('');
            	elseif (is_search()) :
            		printf( esc_html__( 'Search Results for: %s', 'elli' ), '<span>' . get_search_query() . '</span>' );
                else :
                	echo ale_wp_kses(sprintf($ale_heading, '<span>', '</span>' ));
                endif; ?>
            </h1>
			<?php $ale_page_breadcrumb = ale_get_meta('page_breadcrumb');

				if ( $ale_page_breadcrumb == 'enable'):
					echo ale_get_breadcrumbs(); 
				elseif($ale_red_option['theme_inner_breadcrumbs'] == 1 && $ale_page_breadcrumb != 'enable' && !is_attachment()) :
					echo ale_get_breadcrumbs(); 
				endif; ?>
		</div>
	</div><!-- Col end -->
</div><!-- Banner area end -->