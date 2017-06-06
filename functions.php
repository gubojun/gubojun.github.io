<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
*/


/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'WPEX_FRAMEWORK_URL', get_template_directory_uri().'/framework' );
define( 'WPEX_JS_DIR', get_template_directory_uri().'/js' );
define( 'WPEX_CSS_DIR', get_template_directory_uri().'/css' );

$template_path = get_template_directory();

/*--------------------------------------*/
/* Include core functions & framework
/*--------------------------------------*/

//framework
require_once ( $template_path .'/framework/wpex_framework.php' );
require_once ( $template_path .'/options.php' );

//theme customizer
require_once( $template_path .'/theme_functions/theme_customizer.php' );

//load css and js
require_once( $template_path .'/theme_functions/scripts.php' );
require_once( $template_path .'/theme_functions/custom_css.php' );

//widgets
require_once( $template_path .'/theme_functions/widget_areas.php' );

//post formats
require_once( $template_path .'/theme_functions/post_formats.php' );

//load these functions only in the admin dashboard
if(defined('WP_ADMIN') && WP_ADMIN ) {
	require_once( $template_path .'/theme_functions/meta_usage.php' );
	require_once( $template_path .'/theme_functions/include_in_rotator.php' );
}

//aqua functions
require_once( $template_path .'/theme_functions/aq_functions.php' );

/*--------------------------------------*/
/* Theme Setup
/*--------------------------------------*/

//default width of primary content area
$content_width = 980;

//register navigation menus
register_nav_menus(
	array(
		'main_menu' => __('Main','wpex'),
		'footer_menu' => __('Footer','wpex')
	)
);
		
//localization support
load_theme_textdomain( 'wpex', get_template_directory() .'/lang' );

//automatic feed links
add_theme_support('automatic-feed-links');

//custom background
add_theme_support('custom-background');

//post thumbnails <= no custom image sized required due to the aqua image resizing script
add_theme_support('post-thumbnails');

//set a default post excerpt length
if( ! function_exists('wpex_new_excerpt_length')) {
	function wpex_new_excerpt_length($length) {
		return of_get_option('excerpt_length', '15');
	}
	add_filter('excerpt_length', 'wpex_new_excerpt_length');
}

//replace excerpt link
if( ! function_exists('wpex_new_excerpt_more')) {
	function wpex_new_excerpt_more($more) {
		global $post;
		return '...';
	}
}
add_filter('excerpt_more', 'wpex_new_excerpt_more');

//add thumbnails to post view
add_filter('manage_posts_columns', 'wpex_thumbnail_column', 5);
add_action('manage_posts_custom_column', 'wpex_custom_thumbnail_column', 5, 2);
function wpex_thumbnail_column($defaults){
    $defaults['wpex_post_thumbs'] = __('Thumbs','wpex');
    return $defaults;
}
function wpex_custom_thumbnail_column( $column_name, $id ){
    if( $column_name != 'wpex_post_thumbs' )
        return;
		if(has_post_thumbnail()) {
		//get atachment url
		$img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full'); //get full URL to image
		//resize & crop the featured image
		$featured_image = $featured_image = aq_resize( $img_url, 80, 80, true );
		echo '<img src="'. $featured_image .'" />';
	} else { echo '-'; }
}
?>
	<?php include('images/social.png'); ?>