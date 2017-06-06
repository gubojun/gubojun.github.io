<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Audio Post Format
 */
 
wpex_hook_entry_before(); ?>
 
<article <?php post_class('loop-entry container'); ?>>
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
        	<div class="entry-overlay"><span class="wpex-icon-music"></span></div>
        </a>
    <?php } //featured image not set
	
	//get video meta
	$post_audio_mp3 = get_post_meta($post->ID, 'wpex_post_audio_mp3', true);
	$post_audio_ogg = get_post_meta($post->ID, 'wpex_post_audio_ogg', true);
	if($post_audio_mp3 || $post_audio_ogg) { ?>
    
		<script type="text/javascript">
		jQuery(function($){
			jQuery(document).ready(function($){
				if( $().jPlayer ) {
					  $("#jquery_jplayer_<?php echo $post->ID; ?>").jPlayer({
						  ready: function () {
							  $(this).jPlayer("setMedia", {
								    poster: "<?php echo $featured_image; ?>",
									mp3: "<?php echo $post_audio_mp3; ?>",
									oga: "<?php echo $post_audio_ogg; ?>"
							  });
							  },
						  cssSelectorAncestor: "#jp_interface_<?php echo $post->ID; ?>",
						  swfPath: "<?php echo get_template_directory_uri(); ?>/js",
						  supplied: "<?php if($post_audio_ogg) echo 'oga'; ?><?php if($post_audio_mp3 && $post_audio_ogg) echo','; ?><?php if($post_audio_mp3) echo 'mp3'; ?>"
					  });
				  
				  }
			  });
		  });
		</script>
        <div id="jquery_jplayer_<?php echo $post->ID; ?>" class="jp-jplayer"></div>
        <div id="jp_container_<?php echo $post->ID; ?>" class="jp-audio">
            <div id="jp_interface_<?php echo $post->ID; ?>" class="jp-gui jp-interface">
                <ul class="jp-controls">
                    <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                    <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                    <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                    <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                </ul>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
            </div><!-- /jp_interface_<?php echo $post->ID; ?> -->
        </div><!-- .jp-jplayer -->
    <?php } ?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-text">
            <?php the_excerpt(); ?>
             <ul class="loop-entry-meta clearfix">
                <li><span class="wpex-icon-calendar"></span><?php echo get_the_date(); ?></li>    
                <li><span class="wpex-icon-comment"></span> <?php comments_popup_link(__('0 comments', 'wpex'), __('1 comment', 'wpex'), __('% comments', 'wpex'), 'comments-link', __('comments closed', 'wpex')); ?></li>
                <?php if( function_exists('zilla_likes') ) { ?><li><?php zilla_likes(); ?></li><?php } ?>
           </ul> 
        </div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /loop-entry -->

<?php wpex_hook_entry_after(); ?>