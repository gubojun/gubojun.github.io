<?php
/**
 * Enqueue jQuery Scripts
*/
add_action('wp_enqueue_scripts','wpex_framework_scripts_function');
function wpex_framework_scripts_function() {
	
	 //current directory
	$js_dir = WPEX_FRAMEWORK_URL . '/scripts/js';
	
	//core
	wp_enqueue_script('jquery');
	
	//site wide
	wp_enqueue_script('easing', $js_dir .'/easing.js', array('jquery'), '1.3', true);
	wp_enqueue_script('superfish', $js_dir .'/superfish.js', array('jquery'), '1.4.8', true);

	//comment replies
	if(is_single() || is_page()) {
		wp_enqueue_script('comment-reply');
	}
	
} //end wpex_framework_scripts_function()
?>