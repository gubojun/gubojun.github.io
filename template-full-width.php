<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Template Name: Full Width
 */

//get template header
get_header();

//start page loop
if (have_posts()) : while (have_posts()) : the_post();
?>
   
    
<div id="full-width-page" class="container clearfix">

    <header id="single-heading">
        <h1><?php the_title(); ?></h1>
    </header>
    <!-- /single-heading -->

	<div class="entry">
    	<?php the_content(); ?>
    </div><!-- /entry -->
  
</div><!-- /full-width-page -->
  
<?php
//end page loop
endwhile; endif;

//get template footer
get_footer(); ?>