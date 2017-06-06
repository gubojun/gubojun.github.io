<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Video Post Format
 */

wpex_hook_entry_before(); ?>
 
<article <?php post_class('loop-entry container'); ?>> 
	<?php wpex_hook_entry_top(); ?> 
	<?php
	//get video meta
	$post_video = get_post_meta($post->ID, 'wpex_post_video', true);
	if($post_video) echo '<div class="post-video fitvids">'. do_shortcode($post_video) .'</div>'; ?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-text">
            <?php
            //show blog excerpt <= excerpt length controlled via functions.php
            the_excerpt(); ?>
             <ul class="loop-entry-meta clearfix">
                <li><span class="wpex-icon-calendar"></span><?php echo get_the_date(); ?></li>    
                <li><span class="wpex-icon-comment"></span> <?php comments_popup_link(__('0 comments', 'wpex'), __('1 comment', 'wpex'), __('% comments', 'wpex'), 'comments-link', __('comments closed', 'wpex')); ?></li>
                <?php if( function_exists('zilla_likes') ) { ?><li><?php zilla_likes(); ?></li><?php } ?>
           </ul> 
        </div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /loop-entry -->

<?php wpex_hook_entry_after(); ?>