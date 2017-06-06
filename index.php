<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get template header
get_header();

//get sidebar wrap
if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) echo '<div id="post" class="home-sidebar">'; ?>

    <div id="home-wrap" class="clearfix">
         <div id="wpex-grid-wrap">
           <?php
            if (have_posts()) { 
                while (have_posts()) {
                    the_post( );
                    $format = get_post_format();
                    if ( false === $format ) $format = 'standard';
                    get_template_part( '/formats/entry', $format );
                }
            }
            ?>
        </div><!-- /wpex-grid-wrap -->  
        <?php
        if($ajax_loading == 1) {
            echo aq_load_more();
        } else {
            wpex_paginate_pages();
        }
        ?>
    </div><!-- /home-wrap -->
    
<?php
// Get Sidebar
if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) {
	echo '</div>';
	get_sidebar();
}
//get template footer
get_footer(); ?>