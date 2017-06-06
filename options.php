<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_wpex_themes';
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'wpex'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$related_random_posts = array(
		'random' => __('Random Posts', 'wpex'),
		'related' => __('Related Posts', 'wpex'),
	);

	// Multicheck Array <= SAMPLE
	$multicheck_array = array(
		'one' => __('French Toast', 'wpex'),
		'two' => __('Pancake', 'wpex'),
		'three' => __('Omelette', 'wpex'),
		'four' => __('Crepe', 'wpex'),
		'five' => __('Waffle', 'wpex')
	);

	// Multicheck Defaults 
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
	
	//prettyPhoto themes
	$lightbox_themes = array(
		'pp_default' => 'Default',
		'light_rounded' => 'Light Rounded',
		'dark_rounded' => 'Dark Rounded',
		'light_square' => 'Light Square',
		'dark_square' => 'Dark Square',
		'facebook' => 'Facebook'
	);

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/options/';

	$options = array();
	
	
	//GENERAL
	
	$options[] = array(
		'name' => __('General', 'wpex'),
		'type' => 'heading');
		
	$options['custom_logo'] = array(
		'name' => __('Custom Logo', 'wpex'),
		'desc' => __('Upload your custom logo.', 'wpex'),
		'id' => 'custom_logo',
		'type' => 'upload');
		
	$options['custom_favicon'] = array(
		'name' => __('Custom Favicon', 'wpex'),
		'desc' => __('Upload your custom site favicon.', 'wpex'),
		'id' => 'custom_favicon',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Entry Thumbnail Hover Background Color', 'options_framework_theme'),
		'desc' => __('Select your color for the hover effect on the entry thumbnails.', 'options_framework_theme'),
		'id' => 'entry_hover_color',
		'std' => '#000000',
		'type' => 'color' );
		
	$options['entry_hover_opacity'] = array(
		'name' => __('Entry Thumbnail Hover Opacity', 'wpex'),
		'desc' => __('Enter your desired opacity for the entry hovers.', 'wpex'),
		'id' => 'entry_hover_opacity',
		'std' => '0.5',
		'class' => 'mini',
		'type' => 'text');
		
	$options['responsive'] = array(
		'name' => __('Responsive?', 'wpex'),
		'desc' => __('Check box to enable the responsive layout.', 'wpex'),
		'id' => 'responsive',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['ajax_loading'] = array(
		'name' => __('AJAX Loading Instead of Pagination?', 'wpex'),
		'desc' => __('Check box to enable the load more ', 'wpex'),
		'id' => 'ajax_loading',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['static_header'] = array(
		'name' => __('Disable Fixed Header', 'wpex'),
		'desc' => __('Check box to disable the fixed header. Prevents it from staying at the top when you scroll down the page.', 'wpex'),
		'id' => 'static_header',
		'std' => '',
		'type' => 'checkbox');
		
	$options['sidebar_homepage_archive'] = array(
		'name' => __('Show Sidebar On The Homepage & Archive Pages?', 'wpex'),
		'desc' => __('Check box to enable the sidebar on the homepage and archive (category, tags, format and author pages).', 'wpex'),
		'id' => 'sidebar_homepage_archive',
		'std' => '',
		'type' => 'checkbox');
		
	$options['sidebar_responsive'] = array(
		'name' => __('Show Sidebar On Mobile Screens?', 'wpex'),
		'desc' => __('Check box to enable the sidebar on Mobile Screens (this option won\'t affect Table displays).', 'wpex'),
		'id' => 'sidebar_responsive',
		'std' => '',
		'type' => 'checkbox');
		
	$options['widgetized_footer'] = array(
		'name' => __('Widgetized Footer?', 'wpex'),
		'desc' => __('Check box to enable the widgetized footer area.', 'wpex'),
		'id' => 'widgetized_footer',
		'std' => '1',
		'type' => 'checkbox');
				
	$options['sidebar_layout'] = array(
		'name' => "Sidebar Location",
		'desc' => "Select if you want a right side or left side sidebar.",
		'id' => "sidebar_layout",
		'std' => "left",
		'type' => "images",
		'options' => array(
			'left' => $imagepath . '2cl.png',
			'right' => $imagepath . '2cr.png',
			'none' => $imagepath . '1column.png')
	);
	
		
	$options['lightbox_theme'] = array(
		'name' => __('PrettyPhoto Theme', 'wpex'),
		'desc' => __('Choose your PrettyPhoto theme.', 'wpex'),
		'id' => 'lightbox_theme',
		'std' => 'default',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $lightbox_themes );
		
		
	//BLOG
	
	$options[] = array(
		'name' => __('Blog', 'wpex'),
		'type' => 'heading');
		
	$options['excerpt_length'] = array(
		'name' => __('Excerpt Length?', 'wpex'),
		'desc' => __('Enter your custom excerpt length.', 'wpex'),
		'id' => 'excerpt_length',
		'std' => '15',
		'class' => 'mini',
		'type' => 'text');
		
	$options['blog_tags'] = array(
		'name' => __('Show Tags?', 'wpex'),
		'desc' => __('Check box to enable the tag links on single blog posts.', 'wpex'),
		'id' => 'blog_tags',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['blog_bio'] = array(
		'name' => __('Show Author Bio?', 'wpex'),
		'desc' => __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id' => 'blog_bio',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['blog_tags'] = array(
		'name' => __('Show Social Share', 'wpex'),
		'desc' => __('Check box to enable the social sharing section on single posts.', 'wpex'),
		'id' => 'blog_social',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['related_random_show'] = array(
		'name' => __('Show Related/Random Posts Section?', 'wpex'),
		'desc' => __('Check box to enable the related posts or random posts on single blog posts.', 'wpex'),
		'id' => 'related_random_show',
		'std' => '1',
		'type' => 'checkbox');
		
	$options['related_random'] = array(
		'name' => __('Show Random or Related Posts?', 'wpex'),
		'desc' => __('Choose your PrettyPhoto theme.', 'wpex'),
		'id' => 'related_random',
		'std' => 'random',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $related_random_posts );
						
	$options['related_random_count'] = array(
		'name' => __('How many posts do you want to show on the Related/Random Posts Section?', 'wpex'),
		'desc' => __('Enter an integer for how many posts you want to show.', 'wpex'),
		'id' => 'related_random_count',
		'std' => '10',
		'class' => 'mini',
		'type' => 'text');
		
	$options['blog_comments'] = array(
		'name' => __('Show Comments?', 'wpex'),
		'desc' => __('Check box to enable comments on single blog posts.', 'wpex'),
		'id' => 'blog_comments',
		'std' => '1',
		'type' => 'checkbox');
	
		
	//SOCIAL

	$options[] = array(
		'name' => __('Social', 'wpex'),
		'type' => 'heading');
		
		
	$options['social'] = array(
		'name' => __('Social?', 'wpex'),
		'desc' => __('Check box to enable the social in the theme header.', 'wpex'),
		'id' => 'social',
		'std' => '1',
		'type' => 'checkbox');
		
	if(function_exists('wpex_get_social')) {	
	$social_links = wpex_get_social();
		foreach($social_links as $social_link) {
			$options[] = array( "name" => ucfirst($social_link),
								'desc' => ' '. __('Enter your ','wpex') . $social_link . __(' url','wpex') .' <br />'. __('Include http:// at the front of the url.', 'wpex'),
								'id' => $social_link,
								'std' => '',
								'type' => 'text');
		}
	}
	
	
	//CSS
	$options[] = array(
		'name' => __('CSS', 'wpex'),
		'type' => 'heading');
		
	$options['custom_css'] = array(
		'name' => __('Custom CSS', 'wpex','wpex'),
		'desc' => __('Use this area to add custom css to your theme\'s header for making small customizations', 'wpex','wpex'),
		'id' => 'custom_css',
		'std' => '',
		'type' => 'textarea');

	return $options;
}


/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php } ?>