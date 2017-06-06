<?php
/**
 * 
 * Load key functions for this theme
 *
 */

//define current directory
$current_dir = get_template_directory() .'/framework/';


/*--------------------------------------*/
/* Includes
/*--------------------------------------*/

//call in the global variables first
require_once( $current_dir .'functions/variables.php');

//css & jquery
require_once( $current_dir .'scripts/enqueue_css.php');
require_once( $current_dir .'scripts/enqueue_js.php');

//hooks
require_once( $current_dir .'functions/hooks.php');

//functions
require_once( $current_dir .'functions/img_resizer.php');
require_once( $current_dir .'functions/better_comments.php');
require_once( $current_dir .'functions/page_nav.php');

//theme options
if(!function_exists( 'optionsframework_init')) { //load only if plugin doesn't already exist
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/framework/admin/' ); //define options directory
	require_once ($current_dir . '/admin/options-framework.php'); //get theme options framework
}

//widgets
require_once( $current_dir . 'widgets/flickr.php');
require_once( $current_dir . 'widgets/video.php');
require_once( $current_dir . 'widgets/recent-posts-thumb.php');


// Load files ONLY in the back-end
if(defined('WP_ADMIN') && WP_ADMIN ) {
	
	//meta
	require_once( $current_dir .'meta/meta_class.php');	
}


/*--------------------------------------*/
/* Filters
/*--------------------------------------*/

//shortcode support
add_filter('the_content', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');


/*--------------------------------------*/
/* Misc
/*--------------------------------------*/

// add home link to menu
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

// functions run on activation --> flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}
?>