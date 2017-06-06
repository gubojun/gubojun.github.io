<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file loads custom css and js for our theme
 */

//hook function
add_action('wp_enqueue_scripts','theme_specific_scripts');

//start function
function theme_specific_scripts() {

	/*******
	*** jQuery
	*******************/
	
	//isotope
	wp_enqueue_script('isotope', WPEX_JS_DIR .'/jquery.isotope.min.js', array('jquery'), '1.5.19', true);
	wp_enqueue_script('wpex-isotope-init', WPEX_JS_DIR . '/isotope_init.js', array('jquery','isotope'), '1.0', true);
	
	//jplayer
	wp_enqueue_script('jplayer', get_template_directory_uri() .'/js/jquery.jplayer.min.js', array('jquery'), '2.1.0', true);
	
	//tipsy
	if(of_get_option('social')) {
		wp_enqueue_script('tipsy', WPEX_JS_DIR .'/tipsy.js', array('jquery'), '1.0.0a', true);
	}
	
	//lightbox
	wp_enqueue_script('prettyphoto', WPEX_JS_DIR .'/prettyphoto.js', array('jquery'), '3.1.4', true);
	
	//localize lightbox
	$lightbox_params = array(
		'theme' => of_get_option('lightbox_theme')
	);
	wp_localize_script( 'prettyphoto', 'lightboxLocalize', $lightbox_params );

	//responsive
	wp_enqueue_script('fitvids', WPEX_JS_DIR .'/fitvids.js', array('jquery'), 1.0, true);
	if(of_get_option('responsive')) {
		wp_enqueue_script('uniform', WPEX_JS_DIR .'/uniform.js', array('jquery'), '1.7.5', true);
		wp_enqueue_script('wpex-responsive', WPEX_JS_DIR .'/responsive.js', array('jquery'), '', true);
	}
	
	//localize responsive nav
	$nav_params = array(
		'text' => __('Browse','wpex'),
	);
	wp_localize_script( 'wpex-responsive', 'responsiveLocalize', $nav_params );

	
	//initialize
	wp_enqueue_script('initialize', WPEX_JS_DIR .'/initialize.js', false, '1.0', true);
	
	//localize hovers/ajax
	$wpex_param = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'loading' => __('loading...','wpex'),
		'loadmore' => __('load more','wpex')
	);
	wp_localize_script( 'initialize', 'wpexvars', $wpex_param );



	/*******
	*** CSS
	*******************/
	
	//responsive
	if(of_get_option('responsive')) {
		wp_enqueue_style('responsive', WPEX_CSS_DIR . '/responsive.css', 'style', true);
	}
	
	//font awesome
	wp_enqueue_style('awesome-font', WPEX_CSS_DIR . '/awesome_font.css', 'style');
	
	//prettyphoto
	wp_enqueue_style('prettyphoto', WPEX_CSS_DIR . '/prettyphoto.css', 'style', true);
	
	//flexslider
	wp_enqueue_style('wpex-flexslider', WPEX_CSS_DIR . '/flexslider.css', 'style', true);
	
	//jPlayer
	wp_enqueue_style( 'wpex-audioplayer', WPEX_CSS_DIR .'/audioplayer.css' );
	
	//Google fonts
	wp_enqueue_style('wpex-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic', 'style', true);
	wp_enqueue_style('wpex-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,300,600,700&subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext', 'style', true);
	
	
} //end theme_specific_scripts()
?>