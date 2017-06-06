<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file contains custom CSS For wp_head Hook = wpex_custom_css()
 */

//it would be silly to run function in the admin.
if (!is_admin()) {
	
	//hook function
	add_action('wp_head', 'wpex_custom_css');
	
	//begin wpex_custom_css()
	function wpex_custom_css() {
		
		$custom_css ='';
		
		//custom css field
		if(of_get_option('custom_css')) {
			$custom_css .= of_get_option('custom_css');
		}
		
		//static header
		if( of_get_option('static_header') == '1' ) {
			$custom_css .= '#header-wrap{ position: inherit !important; } #wrap{ padding-top: 0 !important; }';
		}
				
		//sidebar location
		if(of_get_option('sidebar_layout') == 'left') {
			$custom_css .= '#sidebar {float: left} #post{float: right}';
		}
		
		//opacity hovers
		$hover_color = of_get_option('entry_hover_color','#000000');
		$hover_opacity = of_get_option('entry_hover_opacity','0.5');
		
		if($hover_color) $custom_css .= '.loop-entry-img-link{ background: '.$hover_color.'; }';
		if($hover_opacity) $custom_css .= '.loop-entry-img-link:hover img{ opacity: '.$hover_opacity.'; -moz-opacity: '.$hover_opacity.'; -webkit-opacity: '.$hover_opacity.'; }';
		
		/**echo all css**/
		$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css . "\n</style>";
		if(!empty($custom_css)) { echo $css_output;}
		
	} //end wpex_custom_css()

} //is admin
?>