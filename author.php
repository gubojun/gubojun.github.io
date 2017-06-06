<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * This file is used for author pages
 */

//get template header
get_header();

//start post loop
if(have_posts()) :

//get theme options
$sidebar_homepage_archive = of_get_option( 'sidebar_homepage_archive' );
?>

<?php if( $sidebar_homepage_archive == '1' ) echo '<div id="post" class="home-sidebar">'; ?>
    <header id="page-heading">
        <?php
        if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
        else :
        $curauth = get_userdata(intval($author));
        endif;
        ?>
         <h1><span><?php _e('Posts by','wpex'); ?>: <?php echo $curauth->display_name; ?></span></h1>
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
if( $sidebar_homepage_archive == '1' ) echo '</div>';

//end loop
endif;

if( $sidebar_homepage_archive == '1' ) get_sidebar();

//get footer template
get_footer(); ?>