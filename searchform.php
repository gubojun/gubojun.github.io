<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */
?>
<form method="get" id="searchbar" action="<?php echo home_url( '/' ); ?>">
<input type="search" name="s" id="search" value="<?php _e('Search...','wpex') ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
<input type="submit" id="searchsubmit" value="" />
</form>