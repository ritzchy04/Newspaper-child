<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css');

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
		wp_enqueue_style( 'font-awesome', trailingslashit(get_stylesheet_directory_uri() ). 'font-awesome/css/font-awesome.min.css', array ());
    }

endif;


// END ENQUEUE PARENT ACTION

//BE803 NEWSPAPER CHILD THEME

/**
 * Causes calendar to always show Google Map and Link, regardless of individual event settings
 */
add_filter( 'tribe_embed_google_map', '__return_true' );
add_filter( 'tribe_show_google_map_link', '__return_true' );

add_action ('after_setup_theme', 'be_image_setup');

function be_image_setup () {
	add_theme_support('post_thumbnails');
	add_image_size ('featured-image', 700, 750);
}

add_filter ('image_size_names_choose', 'custom_image_sizes_choose');
function custom_image_sizes_choose($sizes) {
	$custom_sizes = array (
		'featured-image' => 'Featured Image'
	);
	return array_merge($sizes, $custom_sizes);
}

add_filter('wp_ulike_count_box_template', 'wp_ulike_change_my_count_box_template', 10, 2);
function wp_ulike_change_my_count_box_template($string, $counter) {
  $num = preg_replace("/[^0-9,.]/", "", $counter);
  if($num == 0) return;
  else return $string;
}
