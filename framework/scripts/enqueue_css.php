<?php
/**
 * Enqueue Framework CSS
*/
add_action('wp_enqueue_scripts', 'wpex_enqueue_css');
function wpex_enqueue_css() {
	
	//theme specific style.css
	wp_enqueue_style( 'style', get_stylesheet_uri() );

}
?>