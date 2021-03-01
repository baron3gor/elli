<?php
/****************************************************************
 * System Functions
 ****************************************************************/

/**
 * Load Theme Variable Data
 * @param string $var
 * @return string 
 */
function ale_theme_data_variable($var) {
	if (!is_file(STYLESHEETPATH . '/style.css')) {
		return '';
	}

	$theme_data = wp_get_theme();
	return $theme_data->{$var};
}

/****************************************************************
 * Define Constants
 ****************************************************************/
define('ALETHEME_MODE', 'test');
define('ALETHEME_THEME_VERSION', ale_theme_data_variable('Version'));
define('ALETHEME_PREFIX',			'ale_');
define('ALETHEME_THEME_PREFIX',		ALETHEME_PREFIX . get_template().'_');
define('ALE_SHORTNAME', 'elli');
define("ALETHEME_THEME_OPTIONS_NAME", "elli");
define("ALETHEME_THEME_URL", get_template_directory_uri());
define("ALETHEME_DEMOS_HOST", "http://ellitheme.pixrow.co/");


/****************************************************************
 * Find The Configuration File
 ****************************************************************/
require_once ALETHEME_PATH . '/config.php';

/****************************************************************
 * Require Needed Files & Libraries
 ****************************************************************/

require_once (ALETHEME_PATH. '/etc/admin.php');
require_once (ALETHEME_PATH. '/etc/front.php');
require_once (ALETHEME_PATH. '/etc/global.php');
require_once (ALETHEME_PATH. '/etc/nav.php');
require_once (ALETHEME_PATH. '/etc/system.php');

require_once (ALETHEME_PATH. '/functions/general.php');
require_once (ALETHEME_PATH. '/functions/images_media.php');
require_once (ALETHEME_PATH. '/functions/class-tgm-plugin-activation.php');
require_once (ALETHEME_PATH. '/functions/woocommerce.php');
require_once (ALETHEME_PATH. '/functions/load-more-btn.php');
require_once (ALETHEME_PATH. '/functions/load-more-btn-woo.php');
require_once (ALETHEME_PATH. '/functions/load-more-btn-blog.php');
require_once (ALETHEME_PATH. '/functions/gallery-sort.php');
require_once (ALETHEME_PATH. '/functions/blog-view.php');
require_once (ALETHEME_PATH. '/functions/blog-sort.php');
require_once (ALETHEME_PATH. '/functions/restaurant-sort.php');
require_once (ALETHEME_PATH. '/functions/theme_options.php');

require_once (ALETHEME_PATH. '/elementor/elementor.php');

