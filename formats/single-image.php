<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Standard Image Format
 */

//get full URL to image
$img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full');

//resize & crop the featured image
$img_width = (of_get_option('sidebar_layout') != 'none') ? '630' : '970';
$featured_image = $featured_image = aq_resize( $img_url, $img_width, 9999, false );

//show featured image if available
if($featured_image) {  ?>
	<a href="<?php echo $img_url; ?>" title="<?php the_title(); ?>"  id="post-thumbnail" class="loop-entry-img-link prettyphoto-link">
		<img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" />
		<div class="entry-overlay"><span class="wpex-icon-fullscreen"></span></div>
	</a>
<?php } //featured image not set ?>