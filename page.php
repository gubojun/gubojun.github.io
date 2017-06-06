<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get template header
get_header();

//start post loop
if (have_posts()) : while (have_posts()) : the_post(); ?>
    
<article id="post" class="container clearfix">
    <header id="single-heading">
        <h1><?php the_title(); ?></h1>		
    </header><!-- /single-heading -->
    <div class="entry clearfix">	
        <?php the_content(); ?>
    </div><!-- /entry -->
</article><!-- /post -->
 
<?php
//end post loop
endwhile; endif;

//get sidebar template
get_sidebar();

//get footer template
get_footer(); ?>