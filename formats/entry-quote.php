<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Quote Post Format
 */

wpex_hook_entry_before(); ?>

<article <?php post_class('loop-entry entry-quote'); ?>>  
	<?php wpex_hook_entry_top(); ?>
	<?php if( $post->post_excerpt ) { the_excerpt(); } else { the_content(); } ?>
	<div class="entry-quote-author">- <?php the_title(); ?> -</div>
    <?php wpex_hook_entry_bottom(); ?>
</article><!-- /loop-entry -->

<?php wpex_hook_entry_after(); ?>