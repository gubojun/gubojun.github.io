<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */
?>
<?php wpex_hook_sidebar_before(); ?>
<?php if(of_get_option('sidebar_layout') != 'none') { ?>
<div id="sidebar" class=" container <?php if(of_get_option('sidebar_responsive','') !='1') { echo 'hide-mobile-portrait hide-mobile-landscape'; } ?>">
	<?php wpex_hook_sidebar_top(); ?>
	<?php dynamic_sidebar('sidebar'); ?>
    <?php wpex_hook_sidebar_bottom(); ?>
</div>
<!-- /sidebar -->
<?php } ?>
<?php wpex_hook_sidebar_after(); ?>