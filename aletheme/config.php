<?php
/**
 * Get current theme options
 * 
 * @return array
 */

/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
















function ale_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

    $prefix = "ale_";

    $meta_boxes[] = array(
        'id'         => 'page_settings',
        'title'      => esc_html__('Page Settings','elli'),
        'pages'      => array( 'page' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-full-width.php')),
        'show_names' => true, // Show field names on the left
        'fields' => array(
             array(
                'name' => esc_html__('Navigation Type','elli'),
                'desc' => esc_html__('Select Type of Navigation','elli'),
                'id'   => $prefix . 'navigation_type',
                'type' => 'select',
                'std'  => 'boxnav',
                'options' => array(
                    array( 'name' => esc_html__('Boxed','elli'), 'value' => 'boxnav', ),
                    array( 'name' => esc_html__('Full Width','elli'), 'value' => 'fullnav', ),
                ),
            ),

            array(
                'name' => esc_html__('Theme Preloader','elli'),
                'desc' => esc_html__('Enable or disable Preloader on This Page','elli'),
                'id'   => $prefix . 'preloader_page',
                'type'    => 'radio',
                'std'  => 'disable',
                'options' => array(
                    array( 'name' => esc_html__('Enable','elli'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','elli'), 'value' => 'disable', ),
                ),
            ),
            array(
                'name' => esc_html__('Body Background Color','elli'),
                'desc' => esc_html__('Insert the color for body.','elli'),
                'id'   => $prefix . 'color_body',
                'type'    => 'colorpicker',
            ),
            array(
                'name' => esc_html__('Footer Background Color','elli'),
                'desc' => esc_html__('Insert the color for footer.','elli'),
                'id'   => $prefix . 'color_footer',
                'type'    => 'colorpicker',
            ),
            array(
                'name' => esc_html__('Sticky Navigation Background Color','elli'),
                'desc' => esc_html__('Insert the color for sticky navigation.','elli'),
                'id'   => $prefix . 'color_sticky',
                'type'    => 'colorpicker',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'title_heading_metabox',
        'title'      => esc_html__('Inner Page Settings','elli'),
        'pages'      => array( 'page' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-full-width.php')),
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Inner Page Title Block','elli'),
                'desc' => esc_html__('Enable or disable Title Block','elli'),
                'id'   => $prefix . 'inner_page',
                'type'    => 'radio',
                'std'  => 'disable',
                'options' => array(
                    array( 'name' => esc_html__('Enable','elli'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','elli'), 'value' => 'disable', ),
                ),
            ),
            array(  
                'name' => esc_html__('Banner Title','elli'),
                'desc' => esc_html__('Add your Page hero title','elli'),
                'id'   => $prefix . 'banner_title',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Banner Image','elli'),
                'desc' => esc_html__('Upload a Page header image','elli'),
                'id'   => $prefix . 'page_header',
                'std'  => '',
                'type'    => 'file',
            ),
            
            array(
                'name' => esc_html__('Breadcrumb','elli'),
                'desc' => esc_html__('Enable or disable Breadcrumbs','elli'),
                'id'   => $prefix . 'page_breadcrumb',
                'type'    => 'radio',
                'std'  => 'disable',
                'options' => array(
                    array( 'name' => esc_html__('Enable','elli'), 'value' => 'enable', ),
                    array( 'name' => esc_html__('Disable','elli'), 'value' => 'disable', ),
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'title_heading_metabox',
        'title'      => esc_html__('Page Settings','elli'),
        'pages'      => array( 'projects' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => false,
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Single Page Title','elli'),
                'desc' => esc_html__('Insert the title for single project page.','elli'),
                'id'   => $prefix . 'project_single',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'title_heading_metabox',
        'title'      => esc_html__('Page Settings','elli'),
        'pages'      => array( 'restaurant-menu' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_on'    => false,
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Subtitle','elli'),
                'desc' => esc_html__('Insert the menu products subtitle.','elli'),
                'id'   => $prefix . 'subtitle',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Price','elli'),
                'desc' => esc_html__('Insert the menu products price.','elli'),
                'id'   => $prefix . 'item_price',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'video-settings',
        'title'      => esc_html__('Video Format Options','elli'),
        'pages'      => array( 'post' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('MP4 or WEBM File URL','elli'),
                'id'   => $prefix . 'mp4_link',
                'desc' => esc_html__('Note: Upload a Featured Image to use it as a placeholder/poster image for the video.', 'elli'),
                'std'  => '',
                'type'    => 'file',
            ),
            array(
                'name' => esc_html__('YouTube or Vimeo URL','elli'),
                'id'   => $prefix . 'external_link',
                'desc' => esc_html__('Provide and paste a correct url to the video at vimeo or youtube. Do not include the embed code as the theme will generate the embed code automatically.', 'elli'),
                'std'  => '',
                'type'    => 'text',
            ),
            array(
                'name' => esc_html__('Video in Listing Page','elli'),
                'desc' => esc_html__('Usage of the Video in Listing Pages','elli'),
                'id'   => $prefix . 'video_usage',
                'type'    => 'radio',
                'std'  => 'thumb',
                'options' => array(
                    array( 'name' => esc_html__('Display the Featured Image','elli'), 'value' => 'thumb', ),
                    array( 'name' => esc_html__('Display the Video','elli'), 'value' => 'video', ),
                    
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'audio-settings',
        'title'      => esc_html__('Audio Format Options','elli'),
        'pages'      => array( 'post' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('MP3 File URL','elli'),
                'id'   => $prefix . 'mp3_link',
                'std'  => '',
                'type' => 'file',
            ),
            array(
                'name' => esc_html__('OGG File URL','elli'),
                'id'   => $prefix . 'ogg_link',
                'std'  => '',
                'type' => 'file',
            ),
            array(
                'name' => esc_html__('Audio Player in Listing Pages','elli'),
                'desc' => esc_html__('Usage of the Audio in Listing Pages', 'elli'),
                'id'   => $prefix . 'check_audio',
                'std'  => 'hide',
                'type' => 'radio',
                'options' => array(
                    array( 'name' => esc_html__('Display', 'elli'), 'value' => 'display', ),
                    array( 'name' => esc_html__('Hide', 'elli'), 'value' => 'hide', ),
                    
                ),
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'quote-settings',
        'title'      => esc_html__('Quote Format Options','elli'),
        'pages'      => array( 'post' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('Insert Text for Quotes','elli'),
                'id'   => $prefix . 'quote_text',
                'std'  => '',
                'type'    => 'textarea',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'link-settings',
        'title'      => esc_html__('Link Format Options','elli'),
        'pages'      => array( 'post' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => esc_html__('External Link','elli'),
                'id'   => $prefix . 'ext_link',
                'desc' => esc_html__('Link the Post to any valid (external) URL. Use a full and correct URL f.e.: (http://yourwebsite.com/yourlink)', 'elli'),
                'std'  => '',
                'type'    => 'text',
            ),
        )
    );

	return $meta_boxes;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function ale_get_images_sizes() {
	return array(

        'post' => array(
            array(
                'name'      => 'post-grid2',
                'width'     => 836,
                'height'    => 520,
                'crop'      => true,
            ),

            array(
                'name'      => 'post-list',
                'width'     => 836,
                'height'    => 610,
                'crop'      => true,
            ),            

            array(
                'name'      => 'post-grid-col2',
                'width'     => 1270,
                'height'    => 790,
                'crop'      => true,
            ),

            array(
                'name'      => 'post-list-st3',
                'width'     => 950,
                'height'    => 645,
                'crop'      => true,
            ),

            array(
                'name'      => 'post-single-thumb',
                'width'     => 1940,
                'height'    => 1320,
                'crop'      => true,
            ),
        ),

        'projects' => array(
            array(
                'name'      => 'projects-gallery',
                'width'     => 826,
                'height'    => 550,
                'crop'      => true,
            ),
            array(
                'name'      => 'projects-gallery-big',
                'width'     => 1300,
                'height'    => 864,
                'crop'      => true,
            ),

            array(
                'name'      => 'projects-gallery-single',
                'width'     => 660,
                'height'    => 660,
                'crop'      => true,
            ),
        ),
    );
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function ale_get_post_formats() {
	return array('gallery','video','audio', 'quote', 'link');
}

/**
 * Get sidebars list
 * 
 * @return array
 */
function ale_get_sidebars() {
	$sidebars = array();
	return $sidebars;
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function ale_get_post_types_with_gallery() {
	return array('gallery');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function ale_media_custom_fields() {
	return array();
}


