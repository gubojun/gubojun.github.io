<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Video Post Format
 */

//get video meta
$post_video = get_post_meta($post->ID, 'wpex_post_video', true);
if($post_video) echo '<div class="post-video fitvids">'. do_shortcode($post_video) .'</div>'; ?>