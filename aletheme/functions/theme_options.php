<?php
/**
* ReduxFramework Sample Config File
* For full documentation, please visit: http://docs.reduxframework.com/
*/

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    require_once (ALETHEME_PATH. '/functions/theme_options/typography/field_typography.php');


    // This is your option name where all the Redux data is stored.
    $opt_name = "ale_red_option";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'elli' ),
        'page_title'           => esc_html__( 'Theme Options', 'elli' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

// -> START General
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'elli' ),
        'desc'             => esc_html__( 'General Settings', 'elli' ),
        'id'               => 'general-section',
        'fields'           => array(
            array(
                'id'       => 'logo-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo image', 'elli' ),
                'subtitle'     => __( 'Upload the logo image. ', 'elli' ),
            ),
            array(
                'id'       => 'pre-logo-img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Preload Logo image', 'elli' ),
                'subtitle'     => __( 'Upload the logo image to display in preload. ', 'elli' ),
            ),
            
            array(
                'id'       => 'share-multi-check',
                'type'     => 'checkbox',
                'title'    => __( 'Share Options', 'elli' ),
                'subtitle' => __( 'Choose socials for sharing. Displayed for a single post and product page.', 'elli' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    'mail' => 'Email',
                    'twitter' => 'Twitter',
                    'facebook' => 'Facebook',
                    'pinterest' => 'Pinterest',
                    'tumblr' => 'Tumblr',
                    'linkedin' => 'Linkedin',
                    'stumbleupon' => 'StumbleUpon',
                    'vkontakte' => 'Vkontakte',
                    'delicious' => 'Delicious',
                    'reddit' => 'Reddit',
                ),
                //See how std has changed? you also don't need to specify opts that are 0.
                'default'  => array(
                    'email' => '1',
                    'twitter' => '0',
                    'facebook' => '0'
                )
            ),
        )
    ) );

    

    // -> START Header Line Info
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Settings', 'elli' ),
        'desc'             => esc_html__( 'Header Settings', 'elli' ),
        'id'               => 'header-line-section',
        'fields'           => array(

            array(
                'id'       => 'theme_pages_nav',
                'type'     => 'select',
                'title'    => __('Theme Navigation', 'elli'),
                'subtitle' => __('Choose Type of Navigation', 'elli'),
                'options' => array(
                    '1' => __('Full Width Navigation', 'elli'),
                    '2' => __('Boxed Navigation', 'elli'),
                ),
                'default'  => '2',
            ),

            array(
                'id'       => 'theme_inner_breadcrumbs',
                'type'     => 'switch',
                'title'    => __('Innher Header Breadcrumbs', 'elli'),
                'subtitle' => __('Show or Hide Breadcrumbs on Inner Header.', 'elli'),
                'default'  => true,       
            ),  

            array(
                'id'       => 'page-bg-image-height',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__( 'Header Page Background Height', 'elli' ),
                'subtitle'     => __( 'Insert the background height for page\'s header. (default: 296px)', 'elli' ),
                'default'  => array(
                    'min-height'  => '296px'
                ),
                'width'    => false,
                'output'   => array(
                    'min-height' => '.ale-banner-area-wrapper'
                ),
            ),

            array(
                'id'       => 'header-bg-color',
                'type'     => 'color',
                'title'    => __('Header Pages Background Color', 'elli'),
                'subtitle' => __('Pick a background color for the header. (default: #f8f7f5)', 'elli'),
                'default'  => '#f8f7f5',
                'validate' => 'background-color',
                'output'   => array(
                    'background-color' => '.ale-banner-area-wrapper'
                ),
            ),

            array(
                'id'       => 'page-bg-dots-size',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__( 'Header Page Dots Size.', 'elli' ),
                'subtitle'     => __( 'Insert the size for dots section in page\'s header. (default: 479x96)', 'elli' ),
                'default'  => array(
                    'height'  => '96px',
                    'width'   => '479px',
                ),
                'output'   => array(
                    'height' => '.ale-header-dott-background',
                    'width'  => '.ale-header-dott-background'
                ),
            ),

            array(
                'id'             => 'elli-bg-header-dots',
                'title'          => esc_html__( 'Background Dots Position', 'elli' ),
                'type'           => 'spacing',
                'top'            => false,     
                'right'          => true,     
                'bottom'         => true,     
                'left'           => false,                  
                'output'         => array( '.ale-header-dott-background' ),
                'mode'           => 'absolute',
                'units'          => array('em', 'px', '%'),
                'units_extended' => 'false',
                'subtitle'       => __('Set the position and units for dots background section.', 'elli'),
                'required' => array( 'elli-bg-header', '!=', '' ),
                'default'       => array(
                    'units' => 'px',
                    'bottom'   => '-17px',
                    'right'   => '-126px',
                )
            ),      

            array(
               'id' => 'section-header-imgs-start',
               'type' => 'section',
               'title' => __('Header Images', 'elli'),
               'subtitle' => __('With the "section" field you can create indent option sections.', 'elli'),
               'indent' => true 
           ),

            array(
                'id'       => 'elli-bg-header',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Main Header Image. (Right Position)', 'elli' ),
                'subtitle'     => __( 'Upload the image #1.', 'elli' ),
            ),

            array(
                'id'             => 'elli-header-position',
                'type'           => 'spacing',
                'top'           => true,     
                'right'         => true,     
                'bottom'        => false,     
                'left'          => false,                  
                'output'         => array( '.ale-bg-header-img' ),
                'mode'           => 'absolute',
                'units'          => array('em', 'px', '%'),
                'units_extended' => 'false',
                'title'          => __('Position for Image #1', 'elli'),
                'subtitle'       => __('Set the position and units for image #1.', 'elli'),
                'default'       => array(
                    'units' => 'px',
                    'top'   => '-54px',
                    'right' => '-61px',
                )
            ),

            array(
                'id'       => 'elli-header-size',
                'type'     => 'dimensions',
                'units'    => array('em','px','%'),
                'output'   => array( '.ale-bg-header-img img' ),
                'title'    => __('Size for Image #1', 'elli'),
                'subtitle' => __('Set the size for image #1. (default: 367)', 'elli'),
                'default'  => array(
                    'width' => '367px',
                    'units' => 'px',
                ),
            ),

            array(
                'id'       => 'header-animation1',
                'type'     => 'switch',
                'title'    => esc_html__( 'Switch Animation for Image #1 (On / Off)', 'elli' ),
                'subtitle' => esc_html__( 'Enable or disable header animation for image #1.', 'elli' ),
                'on'       => 'Enabled',
                'off'      => 'Disable',
                'default'  => true,
            ),

            array(
                'id'       => 'header-image-animation1',
                'type'     => 'radio',
                'title'    => __( 'Image Animation Direction #1', 'elli' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    'top'         => 'Appear from Top',
                    'right'       => 'Appear from Right',
                    'left'        => 'Appear from Left',
                    'bottom'      => 'Appear from Bottom',
                    'topleft'     => 'Appear from Top-Left',
                    'topright'    => 'Appear from Top-Right',
                    'bottomleft'  => 'Appear from Bottom-Left',
                    'bottomright' => 'Appear from Bottom-Right',
                ),
                'default'  => 'topright',
                'required' => array('header-animation1', '=', '1'),
            ),

            array(
                'id'       => 'elli-bg-header2',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Header Page Image #2', 'elli' ),
                'subtitle' => __( 'Upload the image #2.', 'elli' ),
            ),

            array(
                'id'             => 'elli-header-position2',
                'type'           => 'spacing',
                'top'            => true,     
                'right'          => false,     
                'bottom'         => false,     
                'left'           => true,                
                'output'         => array( '.ale-bg-header-img2' ),
                'mode'           => 'absolute',
                'units'          => array('em', 'px', '%'),
                'units_extended' => 'false',
                'title'          => __('Position for Image #2', 'elli'),
                'subtitle'       => __('Set the position and units for image #2.', 'elli'),
                'default'        => array(
                    'units' => 'px',
                ),
                'default'       => array(
                    'units' => 'px',
                    'top'   => '0',
                    'left' => '0',
                )
            ),

            array(
                'id'       => 'elli-header-size2',
                'type'     => 'dimensions',
                'units'    => array('em','px','%'),
                'output'   => array( '.ale-bg-header-img2 img' ),
                'title'    => __('Size for Image #2', 'elli'),
                'subtitle' => __('Set the size for image #2. (default: 52)', 'elli'),
                'default'  => array(
                    'width' => '52px',
                    'units' => 'px',
                ),
            ),

            array(
                'id'       => 'header-animation2',
                'type'     => 'switch',
                'title'    => esc_html__( 'Switch Animation for Image #2 (On / Off)', 'elli' ),
                'subtitle' => esc_html__( 'Enable or disable header animation for image #2.', 'elli' ),
                'on'       => 'Enabled',
                'off'      => 'Disable',
                'default'  => true,
            ),

            array(
                'id'       => 'header-image-animation2',
                'type'     => 'radio',
                'title'    => __( 'Image Animation Direction #2', 'elli' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    'top'         => 'Appear from Top',
                    'right'       => 'Appear from Right',
                    'left'        => 'Appear from Left',
                    'bottom'      => 'Appear from Bottom',
                    'topleft'     => 'Appear from Top-Left',
                    'topright'    => 'Appear from Top-Right',
                    'bottomleft'  => 'Appear from Bottom-Left',
                    'bottomright' => 'Appear from Bottom-Right',
                ),
                'default'  => 'left',
            ),

            array(
                'id'       => 'elli-bg-header3',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Header Page Image #3', 'elli' ),
                'subtitle'     => __( 'Upload the image #3.', 'elli' ),
            ),

            array(
                'id'             => 'elli-header-position3',
                'type'           => 'spacing',
                'top'           => false,     
                'right'         => false,     
                'bottom'        => true,     
                'left'          => true,                  
                'output'         => array( '.ale-bg-header-img3' ),
                'mode'           => 'absolute',
                'units'          => array('em', 'px', '%'),
                'units_extended' => 'false',
                'title'          => __('Position for Image #3', 'elli'),
                'subtitle'       => __('Set the position and units for image #3.', 'elli'),
                'required' => array( 'elli-bg-header3', '!=', '' ),
                'default'       => array(
                    'units' => 'px',
                )
            ),

            array(
                'id'       => 'elli-header-size3',
                'type'     => 'dimensions',
                'units'    => array('em','px','%'),
                'output'   => array( '.ale-bg-header-img3 img' ),
                'title'    => __('Size for Image #3', 'elli'),
                'subtitle' => __('Set the size for image #3.', 'elli'),
                'required' => array( 'elli-bg-header3', '!=', '' ),
            ),

            array(
                'id'       => 'header-animation3',
                'type'     => 'switch',
                'title'    => esc_html__( 'Switch Animation for Image #3 (On / Off)', 'elli' ),
                'subtitle' => esc_html__( 'Enable or disable header animation for image #3.', 'elli' ),
                'on'       => 'Enabled',
                'off'      => 'Disable',
                'default'  => true,
                'required' => array( 'elli-bg-header', '!=', '' ),
            ),

            array(
                'id'       => 'header-image-animation3',
                'type'     => 'radio',
                'title'    => __( 'Image Animation Direction #3', 'elli' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    'top'         => 'Appear from Top',
                    'right'       => 'Appear from Right',
                    'left'        => 'Appear from Left',
                    'bottom'      => 'Appear from Bottom',
                    'topleft'     => 'Appear from Top-Left',
                    'topright'    => 'Appear from Top-Right',
                    'bottomleft'  => 'Appear from Bottom-Left',
                    'bottomright' => 'Appear from Bottom-Right',
                ),
                'default'  => 'bottom',
                'required' => array('header-animation3', '=', '1'),
            ),

            array(
                'id'     => 'section-end',
                'type'   => 'section',
                'indent' => false,
            ),
        )
    ) );

    

    // -> START Footer Line Info
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Settings', 'elli' ),
        'id'               => 'footer-line-section',
        'fields'           => array(
            array(
               'id' => 'footer-dots1-start',
               'type' => 'section',
               'title' => __('Footer Left-Bottom Dots', 'elli'),
               'indent' => true 
           ),

            array(
                'id'       => 'page-footer-dots-size',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__( 'Footer Page Dots Size #1', 'elli' ),
                'subtitle'     => __( 'Insert the size for dots section in page\'s footer. (default: 108x267)', 'elli' ),
                'default'  => array(
                    'height'  => '108px',
                    'width'   => '267px',
                ),
                'output'   => array(
                    'height' => '.ale-footer-dott-background',
                    'width'  => '.ale-footer-dott-background'
                ),
            ),

            array(
                'id'             => 'elli-bg-footer-dots',
                'title'          => esc_html__( 'Background Dots Position #1', 'elli' ),
                'type'           => 'spacing',
                'top'            => false,     
                'right'          => false,     
                'bottom'         => true,     
                'left'           => true,                  
                'output'         => array( '.ale-footer-dott-background' ),
                'mode'           => 'absolute',
                'units'          => array('px'),
                'units_extended' => 'false',
                'subtitle'       => __('Set the position and units for footer dots background section.', 'elli'),
                'default'       => array(
                    'units' => 'px',
                    'bottom'   => '-25px',
                    'left'   => '-2px',
                )
            ),  

            array(
               'id' => 'footer-dots2-start',
               'type' => 'section',
               'title' => __('Footer Right Dots', 'elli'),
               'indent' => true 
           ),

            array(
                'id'       => 'page-footer-dots-size2',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__( 'Footer Page Dots Size #2', 'elli' ),
                'subtitle'     => __( 'Insert the size for dots section in page\'s footer. (default: 230x63)', 'elli' ),
                'default'  => array(
                    'height'  => '230px',
                    'width'   => '63px',
                ),
                'output'   => array(
                    'height' => '.ale-footer-dott-background2',
                    'width'  => '.ale-footer-dott-background2'
                ),
            ),

            array(
                'id'             => 'elli-bg-footer-dots2',
                'title'          => esc_html__( 'Background Dots Position #2', 'elli' ),
                'type'           => 'spacing',
                'top'            => true,     
                'right'          => true,     
                'bottom'         => false,     
                'left'           => false,                  
                'output'         => array( '.ale-footer-dott-background2' ),
                'mode'           => 'absolute',
                'units'          => array('px'),
                'units_extended' => 'false',
                'subtitle'       => __('Set the position and units for footer dots background section.', 'elli'),
                'default'       => array(
                    'units' => 'px',
                    'top'   => '55px',
                    'right'   => '0px',
                )
            ),  
        )
    ) );

    // -> START Socials
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Profiles', 'elli' ),
        'desc'             => esc_html__( 'Insert the social profiles', 'elli' ),
        'id'               => 'social-profiles',
        'fields'           => array(
            array(
                'id'       => 'fb',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the facebook link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.facebook.com/'
            ),
            array(
                'id'       => 'twi',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the twitter link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://twitter.com/'
            ),
            array(
                'id'       => 'pin',
                'type'     => 'text',
                'title'    => esc_html__( 'Pinterest Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the pinterest link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.pinterest.com/'
            ),
            array(
                'id'       => 'utb',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the youtube link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.youtube.com/'
            ),
            array(
                'id'       => 'lnkin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the linkedin link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.linkedin.com/'
            ),
            array(
                'id'       => 'bhnc',
                'type'     => 'text',
                'title'    => esc_html__( 'Behance Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the behance link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.behance.net/'
            ),
            array(
                'id'       => 'flkr',
                'type'     => 'text',
                'title'    => esc_html__( 'Flickr Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the flickr link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.flickr.com/'
            ),
            array(
                'id'       => 'git',
                'type'     => 'text',
                'title'    => esc_html__( 'Github Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the github link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://github.com/'
            ),
            array(
                'id'       => 'stmb',
                'type'     => 'text',
                'title'    => esc_html__( 'Stumbleupon Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the stumbleupon link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.stumbleupon.com/'
            ),
            array(
                'id'       => 'tmb',
                'type'     => 'text',
                'title'    => esc_html__( 'Tumblr Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the tumblr link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.tumblr.com/'
            ),
            array(
                'id'       => 'vmo',
                'type'     => 'text',
                'title'    => esc_html__( 'Vimeo Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the vimeo link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://vimeo.com/'
            ),
            array(
                'id'       => 'vk',
                'type'     => 'text',
                'title'    => esc_html__( 'VK Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the vk link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://vk.com/'
            ),
            array(
                'id'       => 'yelp',
                'type'     => 'text',
                'title'    => esc_html__( 'Yelp Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the yelp link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'https://www.yelp.com/'
            ),
            array(
                'id'       => 'insta',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram Profile', 'elli' ),
                'desc'     => esc_html__( 'Insert the instagram link profile.', 'elli' ),
                'validate' => 'url',
                'placeholder' => 'http://instagram.com/'
            ),
        )
    ) );

// -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'elli' ),
        'desc'   => esc_html__( 'Typography Settings', 'elli'),
        'id'     => 'typography-section',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'ale-font-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'elli' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'elli' ),
                'desc'     => esc_html__( 'Insert the font for body.', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'text-align'  => false,
                'visibility'  => false,
                'opacity' => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'body, .elementor-widget-text-editor, .woocommerce ul.products li.product .price, span.sku, span.posted_in a, span.tagged_as a, .woocommerce #review_form #respond p.comment-form-comment textarea, .woocommerce #review_form #respond p.comment-form-author input, .woocommerce #review_form #respond p.comment-form-email input, .woocommerce input.button, input.input-text.qty, .woocommerce-page table.cart td.actions .coupon input.input-text, .select2-search--dropdown .select2-search__field, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, span.number_box, input.pop-up-search, .ale-icon-text-content, .footer-widget-subtitle, .wc-block-grid__product-price__value' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'body, .elementor-widget-text-editor, .woocommerce ul.products li.product .price, span.sku, span.posted_in a, span.tagged_as a, .woocommerce #review_form #respond p.comment-form-comment textarea, .woocommerce #review_form #respond p.comment-form-author input, .woocommerce #review_form #respond p.comment-form-email input, .woocommerce input.button, input.input-text.qty, .woocommerce-page table.cart td.actions .coupon input.input-text, .select2-search--dropdown .select2-search__field, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, span.number_box, input.pop-up-search, .ale-icon-text-content, .footer-widget-subtitle, .wc-block-grid__product-price__value' ),
                'default'  => array(
                    'color'       => '#4e413b',
                    'font-size'   => '16px',
                    'font-family' => 'Lato',
                    'font-weight' => '300',
                    'line-height' => '26px'

                ),
            ),

            array(
                'id'          => 'ale-font-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography h1', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'letter-spacing' => true,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h1' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h1' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for H1 title.', 'elli' ),
                'default'     => array(
                    'color'       => '#000000',
                    'font-weight' => '400',
                    'font-family' => 'Muli',
                    'font-size'   => '68px',
                    'line-height' => '84px',
                    'letter-spacing' => '0.08em',
                ),
            ),

            array(
                'id'          => 'ale-font-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography h2', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'letter-spacing' => true,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h2' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h2' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for H2 title.', 'elli' ),
                'default'     => array(
                    'color'       => '#000000',
                    'font-weight' => '400',
                    'font-family' => 'Muli',
                    'font-size'   => '47px',
                    'line-height' => '56px',
                    'letter-spacing' => '0.08em',
                ),
            ),
            array(
                'id'          => 'ale-font-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography h3', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'letter-spacing' => true,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h3, .woocommerce .alewoo-fullshop-wrapper .alewoo-title-single-wrapper h3, h2.ale-single-post-title, h1.banner-title, .woocommerce-products-header__title' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h3, .woocommerce .alewoo-fullshop-wrapper .alewoo-title-single-wrapper h3, h2.ale-single-post-title, h1.banner-title, .woocommerce-products-header__title' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for H3 title.', 'elli' ),
                'default'     => array(
                    'color'       => '#000000',
                    'font-weight'  => '400',
                    'font-family' => 'Muli',
                    'font-size'   => '36px',
                    'line-height' => '47px',
                    'letter-spacing' => '0.08em',
                ),
            ),
            array(
                'id'          => 'ale-font-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography h4', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'text-align'  => false,
                'letter-spacing' => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h4, .woocommerce div.product section.related > h2, .woocommerce form.woocommerce-checkout .woocommerce-billing-fields > h3, .woocommerce form.woocommerce-checkout .woocommerce-additional-fields > h3, .woocommerce form.woocommerce-checkout div > h3, .woocommerce form.woocommerce-checkout .woocommerce-shipping-fields > h3, .woocommerce .alewoo-fullshop-wrapper h2, .woocommerce-account .addresses .title h3, .woocommerce-MyAccount-content form > h3, .woocommerce .alewoo-fullshop-wrapper h3, .elli-boxed-template-wrapper .woocommerce h2, span.instafeed-name, .ale-single-project-title' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h4, .woocommerce div.product section.related > h2, .woocommerce form.woocommerce-checkout .woocommerce-billing-fields > h3, .woocommerce form.woocommerce-checkout .woocommerce-additional-fields > h3, .woocommerce form.woocommerce-checkout div > h3, .woocommerce form.woocommerce-checkout .woocommerce-shipping-fields > h3, .woocommerce .alewoo-fullshop-wrapper h2, .woocommerce-account .addresses .title h3, .woocommerce-MyAccount-content form > h3, .woocommerce h3, .elli-boxed-template-wrapper .woocommerce h2, span.instafeed-name, .ale-single-project-title' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for H4 title.', 'elli' ),
                'default'     => array(
                    'color'       => '#000000',
                    'font-weight'  => '400',
                    'font-family' => 'Muli',
                    'font-size'   => '27px',
                    'line-height'   => '38px',
                    'letter-spacing' => '0.08em',
                ),
            ),
            array(
                'id'          => 'ale-font-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography h5', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'text-align'  => false,
                'letter-spacing' => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h5, .alewoo-social-wrapper span, span.sku_wrapper, span.posted_in, span.tagged_as, .woocommerce #reviews #comments h2.woocommerce-Reviews-title, .wc-block-grid__product-title, .wc-block-review-list-item__product' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h5, .alewoo-social-wrapper span, span.sku_wrapper, span.posted_in, span.tagged_as, .woocommerce #reviews #comments h2.woocommerce-Reviews-title, .wc-block-grid__product-title, .wc-block-review-list-item__product' ),
                // An array of CSS selectors to apply this font style to dynamically
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for H5 title.', 'elli' ),
                'default'     => array(
                    'color'       => '#000000',
                    'font-weight' => '400',
                    'font-family' => 'Muli',
                    'font-size'   => '19px',
                    'line-height' => '28px',
                    'letter-spacing' => '0.06em',
                ),
            ),
            array(
                'id'          => 'ale-font-h6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography h6', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'letter-spacing' => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h6, .breadcrumbs, .post-list-date, .widget li.cat-item, .widget.widget_recent_entries ul li a, .widget.widget_meta li, .widget_tag_cloud a, .woocommerce nav.woocommerce-breadcrumb, .woocommerce div.product .woocommerce-tabs ul.tabs li a, a.alewoo-mini-title, .elli-avatar-wrapper span.ava-info, .comment-blog-s, .like-blog-s, .menu-item-has-children > span, select, span.ale-team-rating-count, span.ale-quote-position-title, ul.header-list-ul, span.number_box, span.blog-cats, .ale-single-bottom-left, .ale-tags-wrapper, .ale-reply-link, .ale-project-side-info, .ale-large-pag, table#wp-calendar caption, .widget_archive ul li, .widget_nav_menu .menu-item-object-custom, .woocommerce.widget_products .product-title, .woocommerce.widget_product_tag_cloud a, .ale-header-pagination, .footer-widget-latestpost-title, .wp-block-categories li, .wp-block-latest-posts li > a, .wp-block-archives > li, .wp-block-tag-cloud > a, li.wc-block-product-categories-list-item' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h6, .breadcrumbs, .post-list-date, .widget li.cat-item, .widget.widget_recent_entries ul li a, .widget.widget_meta li, .widget_tag_cloud a, nav.woocommerce-breadcrumb, .woocommerce div.product .woocommerce-tabs ul.tabs li a, a.alewoo-mini-title, .elli-avatar-wrapper span.ava-info, .comment-blog-s, .like-blog-s, .menu-item-has-children > span, select, span.ale-team-rating-count, span.ale-quote-position-title, ul.header-list-ul, .number_box, span.blog-cats, .ale-single-bottom-left, .ale-tags-wrapper, .ale-reply-link, .ale-project-side-info, .ale-large-pag, table#wp-calendar caption, .widget_archive ul li, .widget_nav_menu .menu-item-object-custom, .woocommerce.widget_products .product-title, .woocommerce.widget_product_tag_cloud a, .ale-header-pagination, .footer-widget-latestpost-title, .wp-block-categories li, .wp-block-latest-posts li > a, .wp-block-archives > li, .wp-block-tag-cloud > a, li.wc-block-product-categories-list-item' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for H6 title.', 'elli' ),
                'default'     => array(
                    'color'       => '#4e413b',
                    'font-weight'  => '400',
                    'font-family' => 'Lato',
                    'font-style'  => 'italic',
                    'font-size'   => '17px',
                    'line-height' => '24px',
                    'letter-spacing' => '0.02em',
                ),
            ),

            array(
                'id'          => 'ale-header-subtitle',
                'type'        => 'typography',
                'title'       => esc_html__( 'Header Subtitle', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => false,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'span.midblock-subtitle' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'span.midblock-subtitle' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for subtitles.', 'elli' ),
                'default'     => array(
                    'color'       => '#4e413b',
                    'font-weight'  => '400',
                    'font-family' => 'Lato',
                    'font-style'  => 'italic',
                    'font-size'   => '21px',
                ),
            ),

            array(
                'id'          => 'ale-menu-navigations',
                'type'        => 'typography',
                'title'       => esc_html__( 'Menu Navigations', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'letter-spacing' => true,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'nav.ale-nav-wrapper li, nav.ale-sidebar-navigation li, span.scroll-down-button, .header-swiper-pagination, .widget_pages ul li, .widget_nav_menu ul li, .mobile-nav .menu li, .ale-scroll-button' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'nav.ale-nav-wrapper li, nav.ale-sidebar-navigation li, span.scroll-down-button, .header-swiper-pagination, .widget_pages ul li, .widget_nav_menu ul li, .mobile-nav .menu li, .ale-scroll-button' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for navigations.', 'elli' ),
                'default'     => array(
                    'color'       => '#4e413b',
                    'font-weight' => '400',
                    'font-family' => 'Muli',
                    'font-size'   => '14px',
                    'line-height'   => '14px',
                    'letter-spacing' => '0.06em',
                ),
            ),

            array(
                'id'          => 'ale-inputs',
                'type'        => 'typography',
                'title'       => esc_html__( 'Inputs and Textarea', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'letter-spacing' => true,
                'line-height' => true,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'input.form-control, textarea.form-control, input.searchinput, input, input.select-date-ot, select.select-time-ot, select.select-party-ot, .woocommerce-ordering select, input.alewoo-search-field, textarea' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'input.form-control, textarea.form-control, input.searchinput, input, input.select-date-ot, select.select-time-ot, select.select-party-ot, .woocommerce-ordering select, input.alewoo-search-field, textarea' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for Inputs and Textareas.', 'elli' ),
                'default'     => array(
                    'color'       => '#4e413b',
                    'font-weight'  => '400',
                    'font-family' => 'Lato',
                    'font-style'  => 'italic',
                    'font-size'   => '17px',
                    'line-height' => '27px',
                    'letter-spacing' => '0.02em',
                ),
            ),

            array(
                'id'          => 'ale-blockquotes',
                'type'        => 'typography',
                'title'       => esc_html__( 'Blockquotes', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'text-align'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'blockquote, p.ale-testimonials-text, span.ale-blockquote-slider' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'blockquote, p.ale-testimonials-text, span.ale-blockquote-slider' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for blockquotes', 'elli' ),
                'default'     => array(
                    'color'       => '#4e413b',
                    'font-weight'  => '300',
                    'font-family' => 'Lato',
                    'font-style'  => 'italic',
                    'font-size'   => '19px',
                    'line-height' => '29px',
                ),
            ),

            array(
                'id'          => 'ale-buttons',
                'type'        => 'typography',
                'title'       => esc_html__( 'Buttons', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => false,
                'text-align'  => false,
                'letter-spacing' => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'a.midblock-btn, .loadmore_gallery, .loadmore_blog, .number_box, .ale-btn, input.submit-btn, input[type=\'submit\'], a.product_type_simple, .woocommerce ul.products li.product .onsale, .price_slider_amount .button, .woocommerce div.product form.cart .alewoobtn-big .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce #review_form #respond p.form-submit input, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form .alewoobtn-big .form-row-first .button, .woocommerce form .alewoobtn-big .form-row-last .button, .woocommerce-page form .alewoobtn-big .form-row-first .button, .woocommerce-page form .alewoobtn-big .form-row-last .button, .alewoo-onsale-wrapper span.onsale, .ale-btn-small .ale-btn-text-small, .alewoo-cart-wrapper-header p.buttons .button, .ale-btn-big, .ale-playvideo-button, .ale-4rd-btn, button.single_add_to_cart_button, div.product-type-grouped form.cart .group_table td:first-child, input.button.alt, button.button.alt, a.button.alt, input#submit.alt, .button, .buttons a, .ale-btn-form input[type=\'submit\'], a.added_to_cart, .loadmore_woo, a#cancel-comment-reply-link, .ale-button-404, .wp-block-button__link, .wp-block-file a.wp-block-file__button, span.wc-block-grid__product-onsale' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'a.midblock-btn, .loadmore_gallery, .number_box, .ale-btn, input.submit-btn, input[type=\'submit\'], a.product_type_simple, .woocommerce ul.products li.product .onsale, .price_slider_amount .button, .woocommerce div.product form.cart .alewoobtn-big .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce #review_form #respond p.form-submit input, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce form .alewoobtn-big .form-row-first .button, .woocommerce form .alewoobtn-big .form-row-last .button, .woocommerce-page form .alewoobtn-big .form-row-first .button, .woocommerce-page form .alewoobtn-big .form-row-last .button, .alewoo-onsale-wrapper span.onsale, .ale-btn-small .ale-btn-text-small, .alewoo-cart-wrapper-header p.buttons .button, .ale-btn-big, .ale-playvideo-button, .ale-4rd-btn, button.single_add_to_cart_button, div.product-type-grouped form.cart .group_table td:first-child, input.button.alt, button.button.alt, a.button.alt, input#submit.alt, .button, .buttons a, .ale-btn-form input[type=\'submit\'], a.added_to_cart, .loadmore_woo, a#cancel-comment-reply-link, .ale-button-404, .wp-block-button__link, .wp-block-file a.wp-block-file__button, span.wc-block-grid__product-onsale' ),
                // An array of CSS selectors to apply this font style to dynamically
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for buttons.', 'elli' ),
                'default'     => array(
                    'color'       => '#ff6d24',
                    'font-weight'  => '600',
                    'font-family' => 'Muli',
                    'font-size'   => '14px',
                    'letter-spacing' => '0.08',   
                ),
            ),

            array(
                'id'          => 'ale-skills',
                'type'        => 'typography',
                'title'       => esc_html__( 'Skills Value', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => false,
                'text-align'  => false,
                'font-size'   => true,
                'letter-spacing' => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'text.percentage' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'text.percentage' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'em',
                // Defaults to px
                'subtitle'    => esc_html__( 'Insert the font for skill value widget.', 'elli' ),
                'default'     => array(
                    'font-size'      => '0.4em',
                    'color'          => '#4e413b',
                    'font-weight'    => '400',
                    'font-family'    => 'Lato',
                    'font-style'     => 'italic',
                    'letter-spacing' => '0.02em',
                ),
            ),
            array(
                'id'       => 'ale-font-header',
                'type'     => 'typography',
                'title'    => esc_html__( 'Header Text Font', 'elli' ),
                'subtitle' => esc_html__( 'Specify the headers font properties.', 'elli' ),
                'google'   => true,
                'all_styles'  => true,
                'line-height' => true,
                'text-align'  => false,
                'visibility'  => false,
                'opacity' => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( '.ale-header-descr-wrapper' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( '.ale-header-descr-wrapper' ),
                'default'  => array(
                    'color'       => '#4e413b',
                    'font-size'   => '19px',
                    'font-family' => 'Lato',
                    'font-weight' => '300',
                    'line-height' => '29px'
                ),
            ),
        )
    ) );

    // -> Google maps settings
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Google Maps', 'elli' ),
        'desc'             => esc_html__( 'Google Maps Settings', 'elli' ),
        'id'               => 'google-maps-section',
        'icon'             => 'fa fa-map-marker',
        'fields'           => array(
            array(
                'id'       => 'google-maps-api',
                'type'     => 'text',
                'title'    => esc_html__( 'Google API Key', 'elli' ),
                'desc'     => esc_html__( 'Enter your Google API key. Refer online documentation of the theme to learn how to get your API key.', 'elli' ),
            ),

            array(
                'id'       => 'google-maps-marker',
                'type'     => 'color',
                'title'    => esc_html__( 'Google Map Marker Color', 'elli' ),
                'desc'     => esc_html__( 'Insert the color for google maps markers.', 'elli' ),
                'default'  => '#ff6d24',
            ),

            array(
                'id'       => 'google-maps-marker-stroke',
                'type'     => 'color',
                'title'    => esc_html__( 'Google Map Marker Stroke Color', 'elli' ),
                'desc'     => esc_html__( 'Insert the stroke color for google maps markers.', 'elli' ),
                'default'  => '#4e413b',
            ),
        )
    ) );

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        // -> Woocommerce settings
        Redux::setSection( $opt_name, array(
            'title'            => esc_html__( 'Elli Woocommerce', 'elli' ),
            'desc'             => esc_html__( 'Woocommerce settings', 'elli' ),
            'icon'             => 'fa fa-shopping-cart',
            'id'               => 'woocommerce-section',
            'fields'           => array(
                array(
                    'id'       => 'woocommerce-product-pp',
                    'type'     => 'spinner',
                    'min'      => '1',
                    'max'      => '9999',
                    'step'     => '1',
                    'title'    => esc_html__( 'Products per page on the store page.', 'elli' ),
                    'desc'     => esc_html__( 'Insert а number to display products per page on the store page.', 'elli' ),
                    'default'  => '9',
                ),
                array(
                    'id'       => 'woocommerce-sidebar-position',
                    'type'     => 'radio',
                    'title'    => esc_html__( 'Sidebar position on the shop page.', 'elli' ),
                    'desc'     => esc_html__( 'Select the position of the sidebar on the shop page', 'elli' ),
                    'options'  => array(
                        'woo-right-sidebar' => 'Right Sidebar',
                        'woo-left-sidebar' => 'Left Sidebar',
                    ),
                    'default'  => 'woo-right-sidebar',
                ),
                array(
                    'id'       => 'elli-woocommerce-columns',
                    'type'     => 'radio',
                    'title'    => esc_html__( 'Shop columns', 'elli' ),
                    'desc'     => esc_html__( 'Select the number of columns.', 'elli' ),
                    'options'  => array(
                        'twocol' => '2 Columns',
                        'threecol' => '3 Columns',
                    ),
                    'default'  => 'threecol',
                ),
            )
        ));
    }

    $pages = [];  
    $allpages = get_pages();
    if(!$allpages) {
        $pages[''] = __( 'No pages were found', 'elli' );
    } else {
        foreach($allpages as $pageone) {
           $pages[$pageone->post_name] = $pageone->post_title;
        }
    }

    // -> Project Pages settings
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Project Pages', 'elli' ),
        'desc'             => esc_html__( 'Project Pages Settings', 'elli' ),
        'icon'             => 'fa fa-th',
        'id'               => 'projects-section',
        'fields'           => array(                
            array(
                'id'       => 'project_single_show',
                'type'     => 'select',
                'title'    => __('Header on Single Project Pages', 'elli'),
                'subtitle' => __('Show or Hide Inner Header on Single Project Pages.', 'elli'),
                'default'  => 'yes',   
                'options' => array(          
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),    
                ),         
            ),  

            array(
                'id'       => 'project_pages',
                'type'     => 'select',
                'title'    => __('Project Main Page', 'elli'),
                'subtitle' => __('Select the Project Main Page.', 'elli'),
                'options' => $pages,
            ),              
        )
    ));

    // -> Blot settings
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog and Archive Settings', 'elli' ),
        'desc'             => esc_html__( 'Blog and Archive Settings', 'elli' ),
        'id'               => 'blog-section',
        'icon'             => 'fa fa-list-ul',
        'fields'           => array(  

            array(
                'id'       => 'blog_single_show',
                'type'     => 'select',
                'title'    => __('Header on Single Blog Pages', 'elli'),
                'subtitle' => __('Show or Hide Inner Header on Single Blog Pages.', 'elli'),
                'default'  => 'yes',   
                'options' => array(          
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),    
                ),         
            ),               

            array(
                'id'       => 'arch_show_exc',
                'type'     => 'select',
                'title'    => __('Display Excerpt on Archive Pages', 'elli'),
                'subtitle' => __('Show or Hide Excerpt on Archive Pages.', 'elli'),
                'default'  => 'yes',   
                'options' => array(          
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),    
                ),         
            ),  

            array(
                'id'       => 'arch_exce',
                'type'     => 'spinner', 
                'title'    => __('Excerpt Length on Archive Pages', 'elli'),
                'subtitle' => __('Customize the excerpt length on Archive Pages. Leave blank for the default value.','elli'),
                'default'  => '260',
                'min'      => '40',
                'step'     => '1',
                'max'      => '400',
                'required' => array('arch_show_exc', '=', 'yes'),
            ),

            array(
                'id'       => 'blog_show_exc',
                'type'     => 'select',
                'title'    => __('Display Excerpt on Blog Page', 'elli'),
                'subtitle' => __('Show or Hide Excerpt on Blog List Page.', 'elli'),
                'default'  => 'yes',   
                'options' => array(          
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),    
                ),         
            ),  

            array(
                'id'       => 'blog_exce',
                'type'     => 'spinner', 
                'title'    => __('Excerpt Length on Blog List Page', 'elli'),
                'subtitle' => __('Customize the excerpt length on Blog List Page. Leave blank for the default value.','elli'),
                'default'  => '120',
                'min'      => '40',
                'step'     => '1',
                'max'      => '400',
                'required' => array('blog_show_exc', '=', 'yes'),
            ),    

            array(
                'id'       => 'blog_layout',
                'type'     => 'select',
                'title'    => __('Default Layout Style', 'elli'),
                'subtitle' => __('Default Layout the Posts by This Parameter.', 'elli'),
                'default'  => 'list',             
                'options' => array(
                    'list' => __( 'List', 'elli' ),
                    'grid'  => __( 'Grid', 'elli' ),
                ),                
            ),        

            array(
                'id'       => 'blog_order',
                'type'     => 'select',
                'title'    => __('Default List Order By', 'elli'),
                'subtitle' => __('Default Sorts the Posts by This Parameter.', 'elli'),
                'default'  => 'date',             
                'options' => array(
                    'date' => __( 'Date', 'elli' ),
                    'author'  => __( 'Author', 'elli' ),
                    'title'  => __( 'Title', 'elli' ),
                    'modified'  => __( 'Modified', 'elli' ),
                    'type'  => __( 'Type', 'elli' ),
                ),                
            ),  

            array(
                'id'       => 'blog_sidebar',
                'type'     => 'select',
                'title'    => __('Blog Page Sidebar Position', 'elli'),
                'subtitle' => __('Choose the Sidebar Position on Blog Page.', 'elli'),
                'default'  => 'style1',             
                'options' => array(
                    'style1'  => __( 'Right Sidebar', 'elli' ),
                    'style2'  => __( 'Left Sidebar', 'elli' ),
                    'style3'  => __( 'No Sidebar', 'elli' ),
                ),                
            ), 

            array(
                'id'       => 'single_page_sidebar',
                'type'     => 'select',
                'title'    => __('Single Page Sidebar Position', 'elli'),
                'subtitle' => __('Choose the Sidebar Position on Single Post Pages', 'elli'),
                'options' => array(
                    '1' => __('No Sidebar', 'elli'),
                    '2' => __('Right Sidebar', 'elli'),
                    '3' => __('Left Sidebar', 'elli'),
                ),
                'default'  => '2',
            ),                          

            array(
                'id'       => 'blog_image',
                'type'     => 'select',
                'title'    => __('Display Image/Media', 'elli'),
                'subtitle' => __('Show or Hide Image/Media on Archive and Blog List Page.', 'elli'),
                'default'  => 'yes',             
                'options' => array(
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),
                ),                
            ),

            array(
                'id'       => 'blog_cat',
                'type'     => 'select',
                'title'    => __('Display Category', 'elli'),
                'subtitle' => __('Show or Hide Category on Archive and Blog List Page.', 'elli'),
                'default'  => 'yes',             
                'options' => array(
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),
                ),                
            ),

            array(
                'id'       => 'blog_separate',
                'type'     => 'select',
                'title'    => __('Display Separator Line', 'elli'),
                'subtitle' => __('Show or Hide Separator Line on Archive and Blog List Page.', 'elli'),
                'default'  => 'yes',             
                'options' => array(
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),
                ),                
            ),

            array(
                'id'       => 'blog_author',
                'type'     => 'select',
                'title'    => __('Display Author', 'elli'),
                'subtitle' => __('Show or Hide Author on Archive and Blog List Page.', 'elli'),
                'default'  => 'yes',             
                'options' => array(
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),
                ),                
            ),

            array(
                'id'       => 'blog_comment',
                'type'     => 'select',
                'title'    => __('Number of Comments', 'elli'),
                'subtitle' => __('Show or Hide Number of Comments on Blog List Page.', 'elli'),
                'default'  => 'yes',             
                'options' => array(
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),
                ),                
            ),

            array(
                'id'       => 'blog_likes',
                'type'     => 'select',
                'title'    => __('Likes', 'elli'),
                'subtitle' => __('Show or Hide Likes on Blog List Page.', 'elli'),
                'default'  => 'yes',             
                'options' => array(
                    'yes' => __('Show', 'elli'),
                    'no' => __('Hide', 'elli'),
                ),                
            ),
        )
    ));