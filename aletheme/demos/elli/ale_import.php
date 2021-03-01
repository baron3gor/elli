<?php

/**
 * Categories and Custom Taxonomies
 */

//Categories for Posts
$preview_post_cat_1_id = ale_demo_category::add_category(array(
    'category_name' => 'Restaurants',
    'parent_id' => 0,
    'description' => '',
));
$preview_post_cat_2_id = ale_demo_category::add_category(array(
	'category_name' => 'Recipes',
	'parent_id' => 0,
	'description' => '',
));
$preview_post_cat_3_id = ale_demo_category::add_category(array(
	'category_name' => 'Breakfast',
	'parent_id' => 0,
	'description' => '',
));
$preview_post_cat_4_id = ale_demo_category::add_category(array(
	'category_name' => 'Accesories',
	'parent_id' => 0,
	'description' => '',
));
$preview_post_cat_5_id = ale_demo_category::add_category(array(
	'category_name' => 'Fresh',
	'parent_id' => 0,
	'description' => '',
));
$preview_post_cat_6_id = ale_demo_category::add_category(array(
	'category_name' => 'Cooking',
	'parent_id' => 0,
	'description' => '',
));


//Categories for Projects
$preview_project_cat_1_id = ale_demo_category::add_term(array(
    'term_name' => 'Branding',
    'taxonomy'=>'project-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_project_cat_2_id = ale_demo_category::add_term(array(
    'term_name' => 'Restaurants',
    'taxonomy'=>'project-category',
    'parent_id' => 0,
    'description' => '',
));
$preview_project_cat_3_id = ale_demo_category::add_term(array(
    'term_name' => 'Accesories',
    'taxonomy'=>'project-category',
    'parent_id' => 0,
    'description' => '',
));


//Categories for Restaurant Menu
$preview_restaurant_cat_1_id = ale_demo_category::add_term(array(
    'term_name' => 'Tasty',
    'taxonomy'=>'restaurant-menu-category',
    'parent_id' => 0,
    'description' => 'In hac habitasse platea dictumst. Maecenas ex quam, eleifend ut mauris in, hendrerit tempor ipsum. Donec sed mauris aliquam, semper massa, bibendum libero. Nunc sollicitudin orci sed lectus bibendum',
));
$preview_restaurant_cat_2_id = ale_demo_category::add_term(array(
    'term_name' => 'Pasta',
    'taxonomy'=>'restaurant-menu-category',
    'parent_id' => 0,
    'description' => 'Maecenas ex quam, eleifend ut mauris in, hendrerit tempor ipsum. Donec sed mauris aliquam, semper massa, bibendum libero. Nunc sollicitudin orci sed lectus bibendum',
));
$preview_restaurant_cat_3_id = ale_demo_category::add_term(array(
    'term_name' => 'Mains',
    'taxonomy'=>'restaurant-menu-category',
    'parent_id' => 0,
    'description' => 'In hac habitasse platea dictumst. Maecenas ex quam, eleifend ut mauris in, hendrerit tempor ipsum. Donec sed mauris aliquam, semper massa, bibendum libero. Nunc sollicitudin orci sed lectus bibendum',
));
$preview_restaurant_cat_4_id = ale_demo_category::add_term(array(
    'term_name' => 'Delicious',
    'taxonomy'=>'restaurant-menu-category',
    'parent_id' => 0,
    'description' => 'In hac habitasse platea dictumst. Maecenas ex quam, eleifend ut mauris in, hendrerit tempor ipsum. Donec sed mauris aliquam, semper massa, bibendum libero. Nunc sollicitudin orci sed lectus bibendum',
));
$preview_restaurant_cat_5_id = ale_demo_category::add_term(array(
    'term_name' => 'Coffee',
    'taxonomy'=>'restaurant-menu-category',
    'parent_id' => 0,
    'description' => 'In hac habitasse platea dictumst. Maecenas ex quam, eleifend ut mauris in, hendrerit tempor ipsum. Donec sed mauris aliquam, semper massa, bibendum libero. Nunc sollicitudin orci sed lectus bibendum',
));
$preview_restaurant_cat_6_id = ale_demo_category::add_term(array(
    'term_name' => 'Appetizers',
    'taxonomy'=>'restaurant-menu-category',
    'parent_id' => 0,
    'description' => 'In hac habitasse platea dictumst. Maecenas ex quam, eleifend ut mauris in, hendrerit tempor ipsum. Donec sed mauris aliquam, semper massa, bibendum libero. Nunc sollicitudin orci sed lectus bibendum',
));



/**
 * Posts Settings
 */

// Blog posts
ale_demo_content::add_post(array(
    'title' => "Get Rich quick",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_1_id, $preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_post_gettherich',
    'post_type' => 'post',
    'tags_input' => 'Food, Aroma, Herbs',
    'ale_ext_link' => '',
    'ale_quote_text' => '',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => ''
));
ale_demo_content::add_post(array(
    'title' => "Awaken the Senses",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id, $preview_post_cat_4_id),
    'featured_image_ale_id' => 'ale_service_orange',
    'post_type' => 'post',
    'ale_ext_link' => '',
    'ale_quote_text' => '',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => '',
));

ale_demo_content::add_post(array(
    'title' => "Best Food Essential",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_5_id),
    'featured_image_ale_id' => 'ale_post_bestfood',
    'post_type' => 'post',
    'tags_input' => 'Gastronomy, Traditional',
    'post_format' => 'video',
    'ale_ext_link' => '',
    'ale_quote_text' => '',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => 'https://www.youtube.com/watch?v=f9vEp04JCsw&list=PLscWlCNVlB-w75gdDrVDE4iZmoFcY3mbt&index=3',
    'ale_video_usage' => 'thumb'
));
ale_demo_content::add_post(array(
    'title' => "William M. Albright",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_6_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'tags_input' => 'Healthy',
    'post_format' => 'quote',
    'ale_ext_link' => '',
    'ale_quote_text' => 'Nullam imperdiet sem lorem, id venenatis dolor hendrerit ornare. In metus augue, ultrices vitae eros a, auctor gravida nisl. Pellentesque odio est, finibus at ornare at!',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => ''
));
ale_demo_content::add_post(array(
    'title' => "Mmmmm… Toasty!",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_5_id),
    'featured_image_ale_id' => 'ale_post_mmmm',
    'post_type' => 'post',
    'tags_input' => 'Food, Spices',
    'post_format' => 'gallery',
    'ale_ext_link' => '',
    'ale_quote_text' => '',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => array('ale_post_mmmmm'),
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => ''
));
ale_demo_content::add_post(array(
    'title' => "You Deserve a Break Today",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_4_id),
    'featured_image_ale_id' => 'ale_post_yourdeserve',
    'post_type' => 'post',
    'tags_input' => 'Food, Spices',
    'post_format' => 'link',
    'ale_ext_link' => 'http://ellitheme.pixrow.co/',
    'ale_quote_text' => '',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => ''
));
ale_demo_content::add_post(array(
    'title' => "James J. Green",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_6_id),
    'featured_image_ale_id' => '',
    'post_type' => 'post',
    'tags_input' => 'Tasty',
    'post_format' => 'quote',
    'ale_ext_link' => '',
    'ale_quote_text' => 'Phasellus rutrum tempor nibh vulputate convallis. Cras ornare purus vel nunc consequat, vel aliquet risus commodo. Nunc eget tincidunt dolor, id feugiat mi.',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => ''
));
ale_demo_content::add_post(array(
    'title' => "The Good Side of the Food",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/post_default.dat',
    'post_excerpt' => '',
    'categories_id_array' => array($preview_post_cat_2_id),
    'featured_image_ale_id' => 'ale_post_goodside',
    'post_type' => 'post',
    'tags_input' => 'Gastronomy',
    'ale_ext_link' => '',
    'ale_quote_text' => '',
    'ale_mp3_link' => '',
    'ale_ogg_link' => '',
    'ale_check_audio' => '',
    'gallery_images' => '',
    'ale_mp4_link' => '',
    'ale_external_link' => '',
    'ale_video_usage' => ''
));

// Projects Posts
ale_demo_content::add_post(array(
    'title' => "Food Magic",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_1_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_post_goodside',
    'post_type' => 'projects',
    'ale_project_single' => 'Choose and taste to your place',
));
ale_demo_content::add_post(array(
    'title' => "Homemade",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_3_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_header_slider1',
    'post_type' => 'projects',
    'ale_project_single' => 'Where the flavor inebriates you',
));
ale_demo_content::add_post(array(
    'title' => "Food Design",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_2_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_project_fooddesign',
    'post_type' => 'projects',
    'ale_project_single' => 'You can’t it eat just one',
));
ale_demo_content::add_post(array(
    'title' => "Breakfast",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_1_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_project_breakfast',
    'post_type' => 'projects',
    'ale_project_single' => 'Paradise on your plate',
));
ale_demo_content::add_post(array(
    'title' => "Gastronomy",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_3_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_project_gastronomy',
    'post_type' => 'projects',
    'ale_project_single' => 'Choose and taste to your place',
));
ale_demo_content::add_post(array(
    'title' => "Traditional",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_2_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_project_traditional',
    'post_type' => 'projects',
    'ale_project_single' => 'We speak the good food language',
));
ale_demo_content::add_post(array(
    'title' => "Amazing",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/project_default.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_project_cat_1_id),
    'taxonomy_name' => 'project-category',
    'featured_image_ale_id' => 'ale_project_amazing',
    'post_type' => 'projects',
    'ale_project_single' => 'Beyond the boundaries of taste',
));

// Menu Restaurant Posts
ale_demo_content::add_post(array(
    'title' => "Americano",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Today\'s special',
    'ale_item_price' => '$19.00',
));
ale_demo_content::add_post(array(
    'title' => "Croissant",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 8.50',
));
ale_demo_content::add_post(array(
    'title' => "Ristretto",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 8.80',
));
ale_demo_content::add_post(array(
    'title' => "Latte",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 11.20',
));
ale_demo_content::add_post(array(
    'title' => "Espresso",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Try the best',
    'ale_item_price' => '$ 19.90',
));
ale_demo_content::add_post(array(
    'title' => "Irish Coffee",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 7.70',
));
ale_demo_content::add_post(array(
    'title' => "Macchiato",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 5.90',
));
ale_demo_content::add_post(array(
    'title' => "Jalapeno Poppers",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Something New',
    'ale_item_price' => '$ 8.70',
));
ale_demo_content::add_post(array(
    'title' => "Guacamole",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_1_id, $preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 15.50',
));
ale_demo_content::add_post(array(
    'title' => "Cucumber",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Recommended',
    'ale_item_price' => '$ 8.70',
));
ale_demo_content::add_post(array(
    'title' => "Meatballs",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_1_id, $preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 6.30',
));
ale_demo_content::add_post(array(
    'title' => "Party Bread",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Best offer',
    'ale_item_price' => '$ 3.30',
));
ale_demo_content::add_post(array(
    'title' => "Salsa",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_6_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Best offer',
    'ale_item_price' => '$ 7.40',
));
ale_demo_content::add_post(array(
    'title' => "Cappuccino",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_5_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Recommended',
    'ale_item_price' => '$ 5.50',
));
ale_demo_content::add_post(array(
    'title' => "Irish Cream",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_4_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 8.80',
));
ale_demo_content::add_post(array(
    'title' => "French-press",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_4_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 11.50',
));
ale_demo_content::add_post(array(
    'title' => "Mochaccino",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_4_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Delicious',
    'ale_item_price' => '$ 18.60',
));
ale_demo_content::add_post(array(
    'title' => "Goat Cheese",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_1_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 7.60',
));
ale_demo_content::add_post(array(
    'title' => "Meaty Bites",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_1_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Seasonal Dish',
    'ale_item_price' => '$ 11.50',
));
ale_demo_content::add_post(array(
    'title' => "Artichoke Pasta",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_2_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 11.00',
));
ale_demo_content::add_post(array(
    'title' => "Tortellini with Broccolini",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_2_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'New',
    'ale_item_price' => '$ 9.40',
));
ale_demo_content::add_post(array(
    'title' => "Fettuccine Alfredo",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_1_id, $preview_restaurant_cat_2_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 7.20',
));
ale_demo_content::add_post(array(
    'title' => "Bolognese Lasagna",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_2_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 9.90',
));
ale_demo_content::add_post(array(
    'title' => "Carbonara",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_2_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Tasty',
    'ale_item_price' => '$ 17.50',
));
ale_demo_content::add_post(array(
    'title' => "Pasta Cacio e Pepe",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_2_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 14.40',
));
ale_demo_content::add_post(array(
    'title' => "Basil Beef",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_3_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 8.80',
));
ale_demo_content::add_post(array(
    'title' => "Cheesy Taco",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_3_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 5.60',
));
ale_demo_content::add_post(array(
    'title' => "Cheesy Taco",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_short.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_3_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => '',
    'ale_item_price' => '$ 11.50',
));
ale_demo_content::add_post(array(
    'title' => "Philly Cheesesteak",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/restaurant_long.dat',
    'post_excerpt' => '',
    'taxonomy_id_array' => array($preview_restaurant_cat_3_id),
    'taxonomy_name' => 'restaurant-menu-category',
    'featured_image_ale_id' => '',
    'post_type' => 'restaurant-menu',
    'ale_subtitle' => 'Delicious',
    'ale_item_price' => '$ 6.50',
));

//Contact form 7
ale_demo_content::add_post(array(
	'title' => "Contact form",
	'file' => get_template_directory() . '/aletheme/demos/elli/data/contact_form.dat',
	'post_excerpt' => '',
	'post_type' => 'wpcf7_contact_form',
	'form_id' => 'contactpage_form',
	'_form' => '<div class="reservation-form-wrapper fade-animation">
<div class="row50">
   <div class="form-group">
[text your-name id:name class:form-control class:form-name placeholder "Name"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text your-email id:email class:form-control class:form-email placeholder "Email"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text your-phone id:phone class:form-control class:form-phone placeholder "Phone"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text your-position id:position class:form-control class:form-position placeholder "Position"]
   </div>
</div>
<div class="row100">
   <div class="form-group">
[textarea your-message id:message rows:1 class:form-control class:form-message placeholder "Message"]
   </div>
</div>
<div class="row100">
<div class="ale-btn-form">
[submit class:btn class:btn-primary class:ale-btn-form class:tw-mt-30 class:submit-btn "Submit"]<div class="overlay"></div>
</div>
</div>
</div>',
	'_mail' =>
		array (
			'active' => true,
			'subject' => 'Elli "Contact Form"',
			'sender' => '[your-name] <hello@pixrow.co>',
			'recipient' => get_option('admin_email'),
			'body' => 'From: [your-name]
Subject: Elli "Contact Form"
Phone: [your-phone]
Email: [your-email]
Position: [your-position]

Message Body:
[your-message]

-- 
This e-mail was sent from a contact form on ' . get_bloginfo( 'name' ) .' (' . get_home_url() . ')',
			'additional_headers' => '',
			'attachments' => '',
			'use_html' => false,
			'exclude_blank' => false,
		),
	'_mail_2' =>
		array (
			'active' => true,
			'subject' => 'Elli "Contact Form"',
			'sender' => '[your-name] <hello@pixrow.co>',
			'recipient' => 'hello@pixrow.co',
			'body' => 'From: [your-name]
Subject: Elli "Contact Form"
Phone: [your-phone]
Email: [your-email]
Position: [your-position]

Message Body:
[your-message]

-- 
This e-mail was sent from a contact form on ' . get_bloginfo( 'name' ) .' (' . get_home_url() . ')',
			'additional_headers' => '',
			'attachments' => '',
			'use_html' => false,
			'exclude_blank' => false,
		),
));

//Reservation hompage
ale_demo_content::add_post(array(
    'title' => "Homepage reservation form",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/contact_form.dat',
    'post_excerpt' => '',
    'post_type' => 'wpcf7_contact_form',
    'form_id' => 'reservehome_form',
    '_form' => '<div class="reservation-form-wrapper fade-animation reservation-form-homepage">
<div class="row50">
   <div class="form-group">
[text* your-phone id:phone class:form-control class:form-phone placeholder "Phone"]      
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text* your-date id:date class:form-control class:form-date placeholder "Date"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text* your-time id:time class:form-control class:form-time placeholder "Time"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text your-seats id:seats class:form-control class:form-seats placeholder "Seats"]
   </div>
</div>
<div class="row100">
<div class="ale-btn-form">
[submit class:btn class:btn-primary class:tw-mt-30 class:submit-btn "Book now"]<div class="overlay"></div>
</div>
</div>
</div>',
    '_mail' =>
        array (
            'active' => true,
            'subject' => 'Elli "Contact Form"',
            'sender' => '[your-name] <hello@pixrow.co>',
            'recipient' => get_option('admin_email'),
            'body' => 'Subject: Elli "Contact Form"
Phone: [your-phone]
Date: [your-date]
Time: [your-time]
Seats: [your-seats]

-- 
This e-mail was sent from a contact form on ' . get_bloginfo( 'name' ) .' (' . get_home_url() . ')',
            'additional_headers' => '',
            'attachments' => '',
            'use_html' => false,
            'exclude_blank' => false,
        ),
    '_mail_2' =>
        array (
            'active' => true,
            'subject' => 'Elli "Contact Form"',
            'sender' => '[your-name] <hello@pixrow.co>',
            'recipient' => 'hello@pixrow.co',
            'body' => 'Subject: Elli "Contact Form"
Phone: [your-phone]
Date: [your-date]
Time: [your-time]
Seats: [your-seats]

-- 
This e-mail was sent from a contact form on ' . get_bloginfo( 'name' ) .' (' . get_home_url() . ')',
            'additional_headers' => '',
            'attachments' => '',
            'use_html' => false,
            'exclude_blank' => false,
        ),
));


//Reservation
ale_demo_content::add_post(array(
    'title' => "Reservation form",
    'file' => get_template_directory() . '/aletheme/demos/elli/data/contact_form.dat',
    'post_excerpt' => '',
    'post_type' => 'wpcf7_contact_form',
    'form_id' => 'reserve_form',
    '_form' => '<div class="reservation-form-wrapper fade-animation">
<div class="row50">
   <div class="form-group">
      [text* your-name id:name class:form-control class:form-name placeholder "Name"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text* your-phone id:phone class:form-control class:form-phone placeholder "Phone"]      
   </div>
</div>
<div class="row50">
   <div class="form-group">
[email* your-email id:email class:form-control class:form-email placeholder "Email"]      
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text* your-date id:date class:form-control class:form-date placeholder "Date"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text* your-time id:time class:form-control class:form-time placeholder "Time"]
   </div>
</div>
<div class="row50">
   <div class="form-group">
[text your-seats id:seats class:form-control class:form-seats placeholder "Seats"]
   </div>
</div>
<div class="row100">
   <div class="form-group">
[textarea* your-message id:message rows:1 class:form-control class:form-message placeholder "Notes"]
   </div>
</div>
<div class="row100">
<div class="ale-btn-form">
[submit class:btn class:btn-primary class:tw-mt-30 class:submit-btn "Book now"]<div class="overlay"></div>
</div>
</div>
</div>',
    '_mail' =>
        array (
            'active' => true,
            'subject' => 'Elli "Contact Form"',
            'sender' => '[your-name] <hello@pixrow.co>',
            'recipient' => get_option('admin_email'),
            'body' => 'From: [your-name]
Subject: Elli "Contact Form"
Phone: [your-phone]
Email: [your-email]
Date: [your-date]
Time: [your-time]
Seats: [your-seats]

Message Body:
[your-message]

-- 
This e-mail was sent from a contact form on ' . get_bloginfo( 'name' ) .' (' . get_home_url() . ')',
            'additional_headers' => '',
            'attachments' => '',
            'use_html' => false,
            'exclude_blank' => false,
        ),
    '_mail_2' =>
        array (
            'active' => true,
            'subject' => 'Elli "Contact Form"',
            'sender' => '[your-name] <hello@pixrow.co>',
            'recipient' => 'hello@pixrow.co',
            'body' => 'From: [your-name]
Subject: Elli "Contact Form"
Phone: [your-phone]
Email: [your-email]
Date: [your-date]
Time: [your-time]
Seats: [your-seats]

Message Body:
[your-message]

-- 
This e-mail was sent from a contact form on ' . get_bloginfo( 'name' ) .' (' . get_home_url() . ')',
            'additional_headers' => '',
            'attachments' => '',
            'use_html' => false,
            'exclude_blank' => false,
        ),
));



/**
 * Pages
 */

//Homepage 1
$ale_homepage_id = ale_demo_content::add_page(array(
	'title' => 'Homepage 1',
	'homepage' => true,
	'file' => get_template_directory() . '/aletheme/demos/elli/data/homepage1.dat',
	'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/homepage1.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'fullnav',
    'ale_preloader_page' => 'enable',
    'ale_inner_page' => 'disable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'disable',

));
//Homepage 2
$ale_homepage_id2 = ale_demo_content::add_page(array(
    'title' => 'Homepage 2',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/homepage2.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/homepage2.json', 
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'fullnav',
    'ale_preloader_page' => 'enable',
    'ale_color_body' => '#e2ded3',
    'ale_color_footer' => '#d5d0c2',
    'ale_color_sticky' => '#f8f7f5',
    'ale_inner_page' => 'disable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'disable',
));
//Homepage 3
$ale_homepage_id3 = ale_demo_content::add_page(array(
    'title' => 'Homepage Portfolio',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/homepage3.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/homepage3.json', 
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'fullnav',
    'ale_preloader_page' => 'enable',
    'ale_inner_page' => 'disable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'disable',
));
//About us
$ale_about_us = ale_demo_content::add_page(array(
    'title' => 'About Us',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/aboutus.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/aboutus.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'fullnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'disable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'disable',
));
//Blog - Left Sidebar
$ale_blog_left_sidebar = ale_demo_content::add_page(array(
    'title' => 'Blog - Left Sidebar',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/blog_left_sidebar.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/blog_left_sidebar.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Blog - No Sidebar
$ale_blog_no_sidebar = ale_demo_content::add_page(array(
    'title' => 'Blog - No Sidebar',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/blog_no_sidebar.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/blog_no_sidebar.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Blog - No Sidebar 2 Col.
$ale_blog_nosidebar_2 = ale_demo_content::add_page(array(
    'title' => 'Blog - No Sidebar 2 Col.',
    'file' => '',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/blog_no_sidebar_2.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Blog - Right Sidebar
$ale_blog_right_sidebar = ale_demo_content::add_page(array(
    'title' => 'Blog - Right Sidebar',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/blog_right_sidebar.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/blog_right_sidebar.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Blog - With Pagination
$ale_blog_with_pag = ale_demo_content::add_page(array(
    'title' => 'Blog - With Pagination',
    'file' => '',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/blog_with_pag.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Book a table
$ale_book_table = ale_demo_content::add_page(array(
    'title' => 'Book a Table',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/book_a_table.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/book_a_table.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Contacts
$ale_page_contacts = ale_demo_content::add_page(array(
    'title' => 'Contacts',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/contacts_page.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/contacts_page.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'fullnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'disable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'disable',
));
//Menu Classic
$ale_menu_classic = ale_demo_content::add_page(array(
    'title' => 'Menu Classic',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/menu_classic.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/menu_classic.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Menu Gallery
$ale_menu_gallery = ale_demo_content::add_page(array(
    'title' => 'Menu Gallery',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/menu_gallery.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/menu_gallery.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Menu Masonry 2 Col.
$ale_menu_masonry_2 = ale_demo_content::add_page(array(
    'title' => 'Menu Masonry 2 Col.',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/menu_mass.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/menu_mass.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Menu Masonry 3 Col.
$ale_menu_masonry_3 = ale_demo_content::add_page(array(
    'title' => 'Menu Masonry 3 Col.',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/menu_mass3.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/menu_mass3.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Our Team
$ale_our_team = ale_demo_content::add_page(array(
    'title' => 'Our Team',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/ourteam.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/ourteam.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'fullnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'disable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'disable',
));
//Reservation
$ale_reservation = ale_demo_content::add_page(array(
    'title' => 'Reservation',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/reservation.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/reservation.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Services
$ale_services = ale_demo_content::add_page(array(
    'title' => 'Services',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/services.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/services.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Three Columns 1.
$ale_three_col1 = ale_demo_content::add_page(array(
    'title' => 'Three Columns 1.',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/gallery_three1.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_three1.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Three Columns 2.
$ale_three_col2 = ale_demo_content::add_page(array(
    'title' => 'Three Columns 2.',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/gallery_three2.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_three2.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Three Columns 3.
$ale_three_col3 = ale_demo_content::add_page(array(
    'title' => 'Three Columns 3.',
    'file' => '',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_three3.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Three Columns 4.
$ale_three_col4 = ale_demo_content::add_page(array(
    'title' => 'Three Columns 4.',
    'file' => '',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_three4.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Two Columns 1.
$ale_two_col1 = ale_demo_content::add_page(array(
    'title' => 'Two Columns 1.',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/gallery_two1.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_two1.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Two Columns 2.
$ale_two_col2 = ale_demo_content::add_page(array(
    'title' => 'Two Columns 2.',
    'file' => get_template_directory() . '/aletheme/demos/elli/data/gallery_two2.dat',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_two2.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Two Columns 3.
$ale_two_col3 = ale_demo_content::add_page(array(
    'title' => 'Two Columns 3.',
    'file' => '',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_two3.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Two Columns 4.
$ale_two_col4 = ale_demo_content::add_page(array(
    'title' => 'Two Columns 4.',
    'file' => '',
    'file-elementor' => get_template_directory() . '/aletheme/demos/elli/data/gallery_two4.json',
    'template' => 'template-full-width.php',
    'ale_navigation_type' => 'boxnav',
    'ale_preloader_page' => 'disable',
    'ale_inner_page' => 'enable',
    'ale_banner_title' => '',
    'ale_page_header' => '',
    'ale_page_breadcrumb' => 'enable',
));
//Blog page
$ale_blog_id = ale_demo_content::add_page(array(
    'title' => 'Blog',
    'template' => 'index.php',
    'postspage'=> true,
));



/**
 * Navigation Settings
 */
$ale_demo_header_menu = ale_demo_menus::create_menu('Header Menu', 'header_menu');
$ale_demo_sticky_left_menu = ale_demo_menus::create_menu('Sticky Left Menu', 'sticky_left');
$ale_demo_mobile_menu = ale_demo_menus::create_menu('Mobile Menu', 'mobile_menu');


//Header Menu
$homepages = ale_demo_menus::add_page(array(
    'title' => 'Homepage 1',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'Homepage 2',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_homepage_id2,
    'parent_id' => $homepages,
));
ale_demo_menus::add_page(array(
    'title' => 'Homepage 3',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_homepage_id3,
    'parent_id' => $homepages,
));
$menupages = ale_demo_menus::add_link(array(
    'title' => 'Pages',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_header_menu,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'About Us',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_about_us,
    'parent_id' => $menupages,
));
ale_demo_menus::add_page(array(
    'title' => 'Book a Table',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_book_table,
    'parent_id' => $menupages,
));
ale_demo_menus::add_page(array(
    'title' => 'Contacts',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_page_contacts,
    'parent_id' => $menupages,
));
ale_demo_menus::add_page(array(
    'title' => 'Our Team',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_our_team,
    'parent_id' => $menupages,
));
ale_demo_menus::add_page(array(
    'title' => 'Reservation',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_reservation,
    'parent_id' => $menupages,
));
ale_demo_menus::add_page(array(
    'title' => 'Services',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_services,
    'parent_id' => $menupages,
));
$restmenu = ale_demo_menus::add_link(array(
    'title' => 'Restaurant Menu',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_header_menu,
    'parent_id' => $menupages,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Classic',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_menu_classic,
    'parent_id' => $restmenu,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Gallery',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_menu_gallery,
    'parent_id' => $restmenu,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Masonry 2 Col.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_menu_masonry_2,
    'parent_id' => $restmenu,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Masonry 3 Col.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_menu_masonry_3,
    'parent_id' => $restmenu,
));
$gallerypages = ale_demo_menus::add_link(array(
    'title' => 'Gallery',
    'url' => '#',
    'xfn' => 'nofollow',
    'classes' => 'multicolumn-2',
    'add_to_menu_id' => $ale_demo_header_menu,
    'parent_id' => '',
));
$gallery2col = ale_demo_menus::add_link(array(
    'title' => '2 Col.',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_header_menu,
    'parent_id' => $gallerypages,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 1.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_two_col1,
    'parent_id' => $gallery2col,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 2.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_two_col2,
    'parent_id' => $gallery2col,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 3.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_two_col3,
    'parent_id' => $gallery2col,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 4.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_two_col4,
    'parent_id' => $gallery2col,
));
$gallery3col = ale_demo_menus::add_link(array(
    'title' => '3 Col.',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_header_menu,
    'parent_id' => $gallerypages,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 1.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_three_col1,
    'parent_id' => $gallery3col,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 2.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_three_col2,
    'parent_id' => $gallery3col,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 3.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_three_col3,
    'parent_id' => $gallery3col,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 4.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_three_col4,
    'parent_id' => $gallery3col,
));
$blogpages = ale_demo_menus::add_link(array(
    'title' => 'Blog',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_header_menu,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - Left Sidebar',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_left_sidebar,
    'parent_id' => $blogpages,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - Right Sidebar',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_right_sidebar,
    'parent_id' => $blogpages,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - No Sidebar',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_no_sidebar,
    'parent_id' => $blogpages,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - No Sidebar 2 Col.',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_nosidebar_2,
    'parent_id' => $blogpages,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - With Pagination',
    'add_to_menu_id' => $ale_demo_header_menu,
    'page_id' => $ale_blog_with_pag,
    'parent_id' => $blogpages,
));

//Sticky Left Menu
$homepages_sticky = ale_demo_menus::add_page(array(
    'title' => 'Homepage 1',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'Homepage 2',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_homepage_id2,
    'parent_id' => $homepages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Homepage 3',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_homepage_id3,
    'parent_id' => $homepages_sticky,
));
$menupages_sticky = ale_demo_menus::add_link(array(
    'title' => 'Pages',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'About Us',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_about_us,
    'parent_id' => $menupages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Book a Table',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_book_table,
    'parent_id' => $menupages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Contacts',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_page_contacts,
    'parent_id' => $menupages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Our Team',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_our_team,
    'parent_id' => $menupages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Reservation',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_reservation,
    'parent_id' => $menupages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Services',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_services,
    'parent_id' => $menupages_sticky,
));
$restmenu_sticky = ale_demo_menus::add_link(array(
    'title' => 'Restaurant Menu',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'parent_id' => $menupages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Classic',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_menu_classic,
    'parent_id' => $restmenu_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Gallery',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_menu_gallery,
    'parent_id' => $restmenu_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Masonry 2 Col.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_menu_masonry_2,
    'parent_id' => $restmenu_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Masonry 3 Col.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_menu_masonry_3,
    'parent_id' => $restmenu_sticky,
));
$gallerypages_sticky = ale_demo_menus::add_link(array(
    'title' => 'Gallery',
    'url' => '#',
    'xfn' => 'nofollow',
    'classes' => 'multicolumn-2',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'parent_id' => '',
));
$gallery2col_sticky = ale_demo_menus::add_link(array(
    'title' => '2 Col.',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'parent_id' => $gallerypages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 1.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_two_col1,
    'parent_id' => $gallery2col_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 2.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_two_col2,
    'parent_id' => $gallery2col_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 3.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_two_col3,
    'parent_id' => $gallery2col_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 4.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_two_col4,
    'parent_id' => $gallery2col_sticky,
));
$gallery3col_sticky = ale_demo_menus::add_link(array(
    'title' => '3 Col.',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'parent_id' => $gallerypages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 1.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_three_col1,
    'parent_id' => $gallery3col_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 2.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_three_col2,
    'parent_id' => $gallery3col_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 3.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_three_col3,
    'parent_id' => $gallery3col_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 4.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_three_col4,
    'parent_id' => $gallery3col_sticky,
));
$blogpages_sticky = ale_demo_menus::add_link(array(
    'title' => 'Blog',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - Left Sidebar',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_blog_left_sidebar,
    'parent_id' => $blogpages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - Right Sidebar',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_blog_right_sidebar,
    'parent_id' => $blogpages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - No Sidebar',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_blog_no_sidebar,
    'parent_id' => $blogpages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - No Sidebar 2 Col.',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_blog_nosidebar_2,
    'parent_id' => $blogpages_sticky,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - With Pagination',
    'add_to_menu_id' => $ale_demo_sticky_left_menu,
    'page_id' => $ale_blog_with_pag,
    'parent_id' => $blogpages_sticky,
));


//Mobile Menu
$homepages_mobile = ale_demo_menus::add_page(array(
    'title' => 'Homepage 1',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_homepage_id,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'Homepage 2',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_homepage_id2,
    'parent_id' => $homepages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Homepage 3',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_homepage_id3,
    'parent_id' => $homepages_mobile,
));
$menupages_mobile = ale_demo_menus::add_link(array(
    'title' => 'Pages',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'About Us',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_about_us,
    'parent_id' => $menupages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Book a Table',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_book_table,
    'parent_id' => $menupages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Contacts',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_page_contacts,
    'parent_id' => $menupages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Our Team',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_our_team,
    'parent_id' => $menupages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Reservation',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_reservation,
    'parent_id' => $menupages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Services',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_services,
    'parent_id' => $menupages_mobile,
));
$restmenu_mobile = ale_demo_menus::add_link(array(
    'title' => 'Restaurant Menu',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'parent_id' => $menupages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Classic',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_menu_classic,
    'parent_id' => $restmenu_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Gallery',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_menu_gallery,
    'parent_id' => $restmenu_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Masonry 2 Col.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_menu_masonry_2,
    'parent_id' => $restmenu_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Menu Masonry 3 Col.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_menu_masonry_3,
    'parent_id' => $restmenu_mobile,
));
$gallerypages_mobile = ale_demo_menus::add_link(array(
    'title' => 'Gallery',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'parent_id' => '',
));
$gallery2col_mobile = ale_demo_menus::add_link(array(
    'title' => '2 Col.',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'parent_id' => $gallerypages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 1.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_two_col1,
    'parent_id' => $gallery2col_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 2.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_two_col2,
    'parent_id' => $gallery2col_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 3.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_two_col3,
    'parent_id' => $gallery2col_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Two Columns 4.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_two_col4,
    'parent_id' => $gallery2col_mobile,
));
$gallery3col_mobile = ale_demo_menus::add_link(array(
    'title' => '3 Col.',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'parent_id' => $gallerypages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 1.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_three_col1,
    'parent_id' => $gallery3col_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 2.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_three_col2,
    'parent_id' => $gallery3col_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 3.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_three_col3,
    'parent_id' => $gallery3col_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Three Columns 4.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_three_col4,
    'parent_id' => $gallery3col_mobile,
));
$blogpages_mobile = ale_demo_menus::add_link(array(
    'title' => 'Blog',
    'url' => '#',
    'xfn' => 'nofollow',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'parent_id' => '',
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - Left Sidebar',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_left_sidebar,
    'parent_id' => $blogpages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - Right Sidebar',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_right_sidebar,
    'parent_id' => $blogpages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - No Sidebar',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_no_sidebar,
    'parent_id' => $blogpages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - No Sidebar 2 Col.',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_nosidebar_2,
    'parent_id' => $blogpages_mobile,
));
ale_demo_menus::add_page(array(
    'title' => 'Blog - With Pagination',
    'add_to_menu_id' => $ale_demo_mobile_menu,
    'page_id' => $ale_blog_with_pag,
    'parent_id' => $blogpages_mobile,
));



/**
 * Sidebar Settings
 */

//Remove Widgets from all sidebars
ale_preview_widget::remove_widgets_from_sidebar('footer1');
ale_preview_widget::remove_widgets_from_sidebar('footer2');
ale_preview_widget::remove_widgets_from_sidebar('footer3');
ale_preview_widget::remove_widgets_from_sidebar('footer4');
ale_preview_widget::remove_widgets_from_sidebar('blog-sidebar');
ale_preview_widget::remove_widgets_from_sidebar('side-menu-toggle');
ale_preview_widget::remove_widgets_from_sidebar('ale-template-sidebar');

//Add widgets to Footer 1
ale_preview_widget::add_widget_to_sidebar('footer1', 'text', array ('title' => '', 'text' => '<a href="#"><img class="wp-image-2394" src="' . ale_demo_media::get_image_url_by_ale_id('ale_main_logo') . '" alt="elli" width="43" height="24" /></a>'));
ale_preview_widget::add_widget_to_sidebar('footer1', 'text', array ('text' => '© élli Restaurant & Cafe Theme by
Pixrow Design'));
ale_preview_widget::add_widget_to_sidebar('footer1', 'ale-social', array ('title' => '', 'facebook' => '#', 'twitter' => '#', 'pinterest' => '#', 'tumblr' => '#', 'instagram' => '#'));

//Add widgets to Footer 2
ale_preview_widget::add_widget_to_sidebar('footer2', 'ale_latestposts_widget', array ('title' => 'Latest Post', 'number' => '3'));

$ale_widget_contacts = array(
    'title' => 'How to find us',
    'text' => ale_wp_kses(
        '<p>
        <span>206 West Riverview St. Moses Lake</span>
        <br>
        <a href="#">E-mail: info@mtdesign.com</a>
        <br>
        <a href="#">Phone: 177 7778 763</a>
        <br>
        <a href="#">Phone: 177 227 76 35</a></p>'
    )
);

//Add widgets to Footer 3
ale_preview_widget::add_widget_to_sidebar('footer3', 'text', $ale_widget_contacts);

//Add widgets to Footer 4
ale_preview_widget::add_widget_to_sidebar('footer4', 'ale-workingshours', array ('title' => 'Working Hours', 'monday_hours' => '12:00 - 22:00', 'tuesday_hours' => '12:00 - 22:00', 'wednesday_hours' => '11:00 - 22:00', 'thursday_hours' => '11:00 - 22:00', 'friday_hours' => '11:00 - 23:30', 'saturday_hours' => '11:00 - 23:30', 'sunday_hours' => '11:00 - 23:30'));

//Add widgets to Blog Sidebar
ale_preview_widget::add_widget_to_sidebar('blog-sidebar', 'recent-posts', array ('title' => 'Recent Posts', 'number' => '5', 'show_date' => 'yes'));
ale_preview_widget::add_widget_to_sidebar('blog-sidebar', 'categories', array ('title' => 'Categories'));
ale_preview_widget::add_widget_to_sidebar('blog-sidebar', 'ale_instagram_widget', array ('title' => 'Instagram', 'token' => '9437899247.4e7f960.f6bc4f524c914b35bd073e41265452a7', 'number' => '6', 'columns' => '3'));
ale_preview_widget::add_widget_to_sidebar('blog-sidebar', 'tag_cloud', array ('title' => 'Tags','taxonomy'=>'post_tag'));
ale_preview_widget::add_widget_to_sidebar('blog-sidebar', 'ale-social', array ('title' => 'Follow Me', 'facebook' => '#', 'twitter' => '#', 'pinterest' => '#', 'tumblr' => '#', 'instagram' => '#'));
ale_preview_widget::add_widget_to_sidebar('blog-sidebar', 'meta', array ('title' => 'Meta'));


//Add widgets to Side Menu Toggle
ale_preview_widget::add_widget_to_sidebar('side-menu-toggle', 'ale_spacer_widget', array ('title' => '', 'height' => '30'));
ale_preview_widget::add_widget_to_sidebar('side-menu-toggle', 'text', array ('title' => '', 'text' => '<a href="#"><img class="wp-image-2394" src="' . ale_demo_media::get_image_url_by_ale_id('ale_main_logo') . '" alt="elli" width="43" height="24" /></a>'));
ale_preview_widget::add_widget_to_sidebar('side-menu-toggle', 'text', array ('text' => 'Proin mi nibh, tempus ut malesuada at, semper vitae dui. Aenean porta, magna vitae sodales convallis'));
ale_preview_widget::add_widget_to_sidebar('side-menu-toggle', 'ale_instagram_widget', array ('title' => '', 'token' => '9437899247.4e7f960.f6bc4f524c914b35bd073e41265452a7', 'number' => '6', 'columns' => '3'));
ale_preview_widget::add_widget_to_sidebar('side-menu-toggle', 'ale-social', array ('title' => 'Follow Us', 'facebook' => '#', 'twitter' => '#', 'pinterest' => '#', 'tumblr' => '#', 'instagram' => '#'));

//Add widgets to Template Sidebar
ale_preview_widget::add_widget_to_sidebar('ale-template-sidebar', 'ale-social', array ('title' => '', 'facebook' => '#', 'twitter' => '#', 'pinterest' => '#', 'tumblr' => '#', 'instagram' => '#'));
ale_preview_widget::add_widget_to_sidebar('ale-template-sidebar', 'ale_spacer_widget', array ('title' => '', 'height' => '47'));
ale_preview_widget::add_widget_to_sidebar('ale-template-sidebar', 'text', array ('text' => '© élli Restaurant & Cafe Theme by Pixrow Design'));



/**
 * WP Options Settings
 */
ale_demo_options::update_tagline('Restaurant & Cafe Theme');
ale_demo_options::update_posts_per_page(6);
update_option('elementor_disable_color_schemes', 'yes');
update_option('elementor_disable_typography_schemes', 'yes');
update_option('elementor_container_width', '1320');
update_option('elementor_space_between_widgets', '30');
update_option('elementor_global_image_lightbox', '');
update_option('elementor_stretched_section_container', 'body');

$ale_elementor_general_settings = array(
    'container_width' => '1320',
    'space_between_widgets' => '30',
);

update_option('_elementor_general_settings', $ale_elementor_general_settings);
