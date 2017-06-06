<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Standard Post Format
 */

wpex_hook_entry_before(); ?>
 
<article <?php post_class('loop-entry grid-4 container clearfix'); ?>>  
	<?php wpex_hook_entry_top(); ?>
	<?php
    //get full URL to image
    $img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full');
	
	//resize & crop the featured image
	$featured_image = $featured_image = aq_resize( $img_url, 440, 9999, false ); 
	
    //show featured image if available
    if($featured_image) {  ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="loop-entry-img-link">
        	<img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" />
            <div class="entry-overlay"><span class="wpex-icon-picture"></span></div>
        </a>
    <?php } //featured image not set ?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-text">
			 <?php the_excerpt();?>
             <ul class="loop-entry-meta clearfix">
                <li><span class="wpex-icon-calendar"></span><?php echo get_the_date(); ?></li>    
                <li><span class="wpex-icon-comment"></span> <?php comments_popup_link(__('0 comments', 'wpex'), __('1 comment', 'wpex'), __('% comments', 'wpex'), 'comments-link', __('comments closed', 'wpex')); ?></li>
                <?php if( function_exists('zilla_likes') ) { ?><li><?php zilla_likes(); ?></li><?php } ?>
           </ul> 
        </div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /entry -->

<?php wpex_hook_entry_after(); ?>