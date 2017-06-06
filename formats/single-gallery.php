<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Standard Post Format
 */

//load slider script
wp_enqueue_style( 'flexslider-style', get_template_directory_uri() .'/css/flexslider.css' );
wp_enqueue_script('flexslider', get_template_directory_uri() .'/js/flexslider.js', array('jquery'), '1.0', true);
wp_enqueue_script('flexslider-gallery-init', get_template_directory_uri() .'/js/flexslider_gallery_init.js', array('jquery','flexslider'), '1.0', true);
	
	//get img attachments
	$img_attachments = get_children( array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'post_mime_type' =>	'image',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'numberposts' => 999
	) );
	if ( $img_attachments ) { ?>
		<div class="flexslider-container">
			<div id="slider-<?php echo $post->ID ?>" class="flexslider flexslider-gallery">
				<ul class="slides">
					<?php foreach ( $img_attachments as $img_attachment ) : // Loop through img attachments
					
							//get featured image url
							$thumb = $img_attachment->ID;
							$img_url = wp_get_attachment_url($thumb,'full'); //get full URL to image							

							//resize & crop the featured image
							$img_width = (of_get_option('sidebar_layout') != 'none') ? '630' : '970';
							$featured_image = $featured_image = aq_resize( $img_url, $img_width, 9999, false );
							
							//include image in slider/gallery
							$be_rotator_include = get_post_meta($img_attachment->ID, 'be_rotator_include', true);
							
							if($be_rotator_include != '1') {
						?>
						<li class="slide"><img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" id="post-thumbnail" /></li>
					<?php } //not included 
					endforeach; //end $img_attachment ?>
			</ul><!-- /slides -->
		</div><!-- /portfolio-slider -->
	</div><!-- /flex-slider-container -->
<?php } //end if $img_attachments ?>