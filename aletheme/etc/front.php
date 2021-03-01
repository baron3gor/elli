<?php
/**
 * Enqueue Theme Styles
 */
function ale_enqueue_styles() {

	//Add general css files
	wp_register_style( 'aletheme-general-css', ALETHEME_THEME_URL . '/css/general.css', array(), ALETHEME_THEME_VERSION, 'all');

	//Register libs
	wp_register_style( 'font-awesome', ALETHEME_THEME_URL . '/css/font-awesome.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'elegant-icons', ALETHEME_THEME_URL . '/css/elegant-icons.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'ion-icons', ALETHEME_THEME_URL . '/css/ionicons.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'themify-icons', ALETHEME_THEME_URL . '/css/themify-icons.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'ale-icon-font', ALETHEME_THEME_URL . '/css/ale-icon-font.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'aledatepicker', ALETHEME_THEME_URL . '/css/libs/opendatepicker.css', array(), ALETHEME_THEME_VERSION, 'all');
	wp_register_style( 'owlstyles', ALETHEME_THEME_URL . '/css/libs/owl.carousel.min.css', array(), ALETHEME_THEME_VERSION, 'all');
	 wp_register_style( 'lightstyles', ALETHEME_THEME_URL . '/css/libs/lightbox.css', array(), ALETHEME_THEME_VERSION, 'all');


	//Load general css
	wp_enqueue_style('aletheme-general-css');

	//Load Icon Fonts and Libraries
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('elegant-icons');
	wp_enqueue_style('ion-icons');
	wp_enqueue_style('themify-icons');
	wp_enqueue_style('ale-icon-font');
	wp_enqueue_style('aledatepicker');
	wp_enqueue_style('owlstyles');
	wp_enqueue_style('lightstyles');	

	
}

add_action( 'wp_enqueue_scripts', 'ale_enqueue_styles' );



/**
 * Enqueue Theme Scripts
 */
function ale_enqueue_scripts() {

	// add html5 for old browsers.
	wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), ALETHEME_THEME_VERSION, false );

    //Libs Register
    wp_register_script( 'textarea-auto', ALETHEME_THEME_URL . '/js/libs/jquery.textarea_autosize.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'velocity-js', ALETHEME_THEME_URL . '/js/libs/velocity.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'scrollup', ALETHEME_THEME_URL . '/js/libs/jquery.scrollUp.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'owl-slider', ALETHEME_THEME_URL . '/js/libs/owl.carousel.min.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
    wp_register_script( 'ale-elementor-preview', ALETHEME_THEME_URL . '/js/elementor-preview.js',array( 'ale-load-more' ), ALETHEME_THEME_VERSION, true );  
    wp_register_script( 'ale-parallax', ALETHEME_THEME_URL . '/js/libs/parallax.min.js',array( 'jquery' ), ALETHEME_THEME_VERSION, true );  
    wp_register_script( 'ale-lightbox', ALETHEME_THEME_URL . '/js/libs/lightbox.min.js',array( 'jquery' ), ALETHEME_THEME_VERSION, true );  

    if(did_action( 'elementor/loaded' )) :
		if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) :
	        wp_enqueue_script('jquery-masonry');
	        wp_enqueue_script( 'ale-datepickerjs', ALETHEME_THEME_URL . '/js/libs/opendatepicker.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );
	        wp_enqueue_script( 'ale-elementor-preview' );
	   	endif;
	endif;

	//Custom JS Code
	wp_register_script( 'ale-scripts', ALETHEME_THEME_URL . '/js/scripts.js', array( 'jquery' ), ALETHEME_THEME_VERSION, true );

	wp_enqueue_script( 'jquery-form' );
	wp_enqueue_script( 'html5-shim' );
	wp_script_add_data( 'html5-shim', 'conditional', 'lt IE 9' );

	//Load Libs
	wp_enqueue_script( 'velocity-js' );
	wp_enqueue_script( 'textarea-auto' );
	wp_enqueue_script( 'scrollup' );
	wp_enqueue_script( 'owl-slider' );
	wp_enqueue_script( 'ale-parallax' );	
	wp_enqueue_script( 'ale-lightbox' );	
	wp_enqueue_script( 'ale-scripts' );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script('like_post', get_template_directory_uri().'/js/libs/post-like.js', array('jquery'), '1.0', true );
	wp_localize_script('like_post', 'ajax_var', array(
	    'url' => admin_url('admin-ajax.php'),
	    'nonce' => wp_create_nonce('ajax-nonce')
	));
}

add_action( 'wp_enqueue_scripts', 'ale_enqueue_scripts');


/**
 * Comment callback function
 * @param object $comment
 * @param array $args
 * @param int $depth
 */


function ale_comment_default($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
<<?php echo esc_attr($tag) ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
    <?php if ($depth > 1) { ?>
        <div class="ale-comment-item comment2 second-level cf">
            <div class="response"></div>
    <?php } else { ?>
        <div class="ale-comment-item comment1 first-level cf">
    <?php } ?>

        <div class="commenter-avatar">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
        <div class="comment-box">
            <div class="ale-info-meta">
                <?php printf("<h5 class='author'>".esc_html__('%s','elli')."</h5>", get_comment_author_link()); ?>
            </div>
            <div class="info-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','elli') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>                
            </div>
            <?php if($depth == 1){ ?><span class="ale-reply-link"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span><?php } ?>
        </div>

    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
    <?php
}

/**
 * Add OpenGraph attributes to html tag
 * @param type $output
 * @return string 
 */
/**
 * Get image for Open Graph Meta 
 * 
 * @return string
 */
function ale_og_meta_image() {
	echo ale_get_og_meta_image();
}
function ale_get_og_meta_image() {
	global $post;
	$thumbdone=false;
	$og_image='';
	
	//Featured image
	if (function_exists('get_post_thumbnail_id')) {
		$attachment_id = get_post_thumbnail_id($post->ID);
		if ($attachment_id) {
			$og_image = wp_get_attachment_url($attachment_id, false);
			$thumbdone = true;
		}
	}
	
	//From post/page content
	if (!$thumbdone) {
		$image = ale_parse_first_image($post->post_content);
		if ($image) {
			preg_match('~src="([^"]+)"~si', $image, $matches);
			if (isset($matches[1])) {
				$image = $matches[1];
				$pos = strpos($image, site_url());
				if ($pos === false) {
					if (stristr($image, 'http://') || stristr($image, 'https://')) {
						$og_image = $image;
					} else {
						$og_image = site_url() . $image;
					}
				} else {
					$og_image = $image;
				}
				$thumbdone=true;
			}
		}
	}
	
	//From media gallery
	if (!$thumbdone) {
		$image = ale_get_first_attached_image($post->ID);
		if ($image) {
			$og_image = wp_get_attachment_url($image->ID, false);
			$thumbdone = true;
		}
	}
	
	return $og_image;
}

