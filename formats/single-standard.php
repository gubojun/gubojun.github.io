<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Standard Post Format
 */

//get full URL to image
$img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full');
//resize & crop the featured image
$img_width = (of_get_option('sidebar_layout') != 'none') ? '630' : '970';
$featured_image = $featured_image = aq_resize( $img_url, $img_width, 9999, false );
//show featured image if available
if($featured_image) {  ?>
	<img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" id="post-thumbnail" />
<?php } //featured image not set ?>