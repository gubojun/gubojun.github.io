<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Link Post Format
 */
 
wpex_hook_entry_before(); ?>
 
<article <?php post_class('loop-entry container'); ?>>  
	<?php wpex_hook_entry_top(); ?>
	<?php
	//get post url
	$post_url = get_post_meta($post->ID, 'wpex_post_url', true);
	//resize & crop the featured image
	$img_width = (of_get_option('sidebar_layout') != 'none') ? '620' : '970';
	$wpex_featured_image = $featured_image = aq_resize( wp_get_attachment_url(get_post_thumbnail_id(),'full'), $img_width, 9999, false );
	//show featured image if available
	if($wpex_featured_image) {  ?>
		<a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php echo $wpex_featured_image; ?>" alt="<?php echo the_title(); ?>" id="post-thumbnail" /></a>
	<?php } //featured image not set ?>
		<h2><a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h2>
        <div class="entry-text">
            <?php if( $post->post_excerpt ) { the_excerpt(); } else { the_content(); } ?>
             <ul class="loop-entry-meta clearfix">
                <li><span class="wpex-icon-link"></span><a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><?php echo $post_url; ?></a></li>    
           </ul> 
        </div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /entry -->
<?php wpex_hook_entry_after(); ?>