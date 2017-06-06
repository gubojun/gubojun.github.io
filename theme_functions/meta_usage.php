<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file registers the theme's meta boxes
 */
 
$awesome_icons = wpex_get_awesome_icons();

$prefix = 'wpex_';
$wpex_meta_boxes = array();

// meta box ===> Post Options
$wpex_meta_boxes[] = array(
	'id' => 'wpex_post_meta',
	'title' => __('Post Format Options','wpex'),
	'pages' => array('post'),
	'fields' => array(
		array(
            'name' => __('Link Format URL', 'wpex'),
            'id' => $prefix . 'post_url',
			'desc' => __('Enter the url for your link format URL.', 'wpex'),
            'type' => 'text',
        ),
		array(
            'name' => __('Audio MP3', 'wpex'),
            'id' => $prefix . 'post_audio_mp3',
			'desc' => __('Enter the url for your mp3 audio file for your audio post format.', 'wpex'),
            'type' => 'text',
        ),
		array(
            'name' => __('Audio OGG', 'wpex'),
            'id' => $prefix . 'post_audio_ogg',
			'desc' => __('Enter the url for your ogg audio file for your audio post format. Required for Firefox.', 'wpex'),
            'type' => 'text',
        ),
		array(
            'name' => __('Video Format Embed', 'wpex'),
            'id' => $prefix . 'post_video',
			'desc' => __('Enter your embeded video code here for your video post format post.', 'wpex'),
            'type' => 'textarea',
        ),
	)
);

foreach ($wpex_meta_boxes as $meta_box) {
	new wpex_meta_box($meta_box);
}
?>