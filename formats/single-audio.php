<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Audio Post Format
 */

//get full URL to image
$img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full');

//resize & crop the featured image
$img_width = (of_get_option('sidebar_layout') != 'none') ? '620' : '970';
$featured_image = $featured_image = aq_resize( $img_url, $img_width, 9999, false );

//show featured image if available
if($featured_image) {  ?>
	<img src="<?php echo $featured_image; ?>" alt="<?php echo the_title(); ?>" id="post-thumbnail" class="audio-thumb" />
<?php } //featured image not set

//get video meta
$post_audio_mp3 = get_post_meta($post->ID, 'wpex_post_audio_mp3', true);
$post_audio_ogg = get_post_meta($post->ID, 'wpex_post_audio_ogg', true);
if($post_audio_mp3 || $post_audio_ogg) {
	
	//load js for the audio player
	wp_enqueue_style( 'wpex-audioplayer', get_template_directory_uri() .'/css/audioplayer.css' );
	wp_enqueue_script('jplayer', get_template_directory_uri() .'/js/jquery.jplayer.min.js', array('jquery'), '2.1.0', true);
	?>

	<script type="text/javascript">
	//<![CDATA[
	jQuery(function($){
		jQuery(document).ready(function($){
			if( $().jPlayer ) {
				  $("#jquery_jplayer_<?php echo $post->ID; ?>").jPlayer({
					  ready: function () {
						  $(this).jPlayer("setMedia", {
								mp3: "<?php echo $post_audio_mp3; ?>",
								oga: "<?php echo $post_audio_ogg; ?>",
						  });
						  },
					  cssSelectorAncestor: "#jp_interface_<?php echo $post->ID; ?>",
					  swfPath: "<?php get_template_directory_uri(); ?>/js/",
					  supplied: "<?php if($post_audio_ogg) echo 'oga'; ?><?php if($post_audio_mp3) echo ',mp3'; ?>"
				  });
			  
			  }
		  });
	  });
	//]]>
	</script>
	<div id="jquery_jplayer_<?php echo $post->ID; ?>" class="jp-jplayer"></div>
	<div id="jp_container_<?php echo $post->ID; ?>" class="jp-audio">
		<div id="jp_interface_<?php echo $post->ID; ?>" class="jp-gui jp-interface">
			<ul class="jp-controls">
				<li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
				<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
				<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
				<li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
				<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
				<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
				<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
				<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
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