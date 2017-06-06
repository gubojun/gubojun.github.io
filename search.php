<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get tempate header
get_header();

//results found
if (have_posts()) : ?>
   
<?php if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) echo '<div id="post" class="home-sidebar">'; ?>   
    <header id="page-heading">
        <h1><span><?php _e('Search Results For','wpex'); ?>: &ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
    </header><!-- /page-heading -->
    
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

<?php
//no results found
else : ?>

    <header id="page-heading">
        <h1 id="archive-title"><?php _e('Search Results For','wpex'); ?>: &ldquo;<?php the_search_query(); ?>&rdquo;</h1>
    </header><!-- /page-heading -->
    
    <div id="search-more">
        <form method="get" id="searchbar" action="<?php echo home_url( '/' ); ?>">
            <input type="search" name="s" placeholder="Didn't find what you were looking for? Try again!">
        </form>
    </div><!-- /search-more -->

<?php
//end loop
endif;

// Get Sidebar
if( of_get_option( 'sidebar_homepage_archive' ) == '1' ) {
	echo '</div>';
	get_sidebar();
}

//get template footer
get_footer(); ?>