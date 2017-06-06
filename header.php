<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */
?>
<!DOCTYPE html>

<!-- WordPress Theme by AJ Clarke (http://www.wpexplorer.com) -->
<html <?php language_attributes(); ?>>
<head>
<?php wpex_hook_head_top(); ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php
//add viewport meta if responsive enabled
if(of_get_option('responsive')) { ?>
<!-- Mobile Specific
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<?php } ?>

<!-- Title Tag
================================================== -->
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

<?php
//set favicon if defined in admin
if(of_get_option('custom_favicon')) { ?>
<!-- Favicon
================================================== -->
<link rel="icon" type="image/png" href="<?php echo of_get_option('custom_favicon'); ?>" />
<?php } ?>


<!-- Browser dependent stylesheets
================================================== -->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen" />
<![endif]-->

<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/awesome_font_ie7.css.css" media="screen" />
/>
<![endif]-->


<!-- Load HTML5 dependancies for IE
================================================== -->
<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/>
<![endif]-->

<!-- WP Head
================================================== -->
<?php
//WordPress head hook <== DO NOT DELETE ME
wp_head(); ?>

<?php wpex_hook_head_bottom(); ?>
</head><!-- /end head -->

<!-- Begin Body
================================================== -->

<?php $no_sidebar = (of_get_option('sidebar_layout') == 'none') ? 'no-sidebar' : ''; ?>
<body <?php body_class('body '. $no_sidebar .''); ?>>

<?php wpex_hook_header_before(); ?>
<div id="header-wrap">
    <header id="header" class="outerbox clearfix">
    <?php wpex_hook_header_top(); ?>
    	<div id="header-top">
            <div id="logo" class="clearfix">
                <a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home">
                    <?php
                    //show custom image logo if defined in the admin
                    if(of_get_option('custom_logo')) { ?>
                        <img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" />
                    <?php }
                    //no custom img logo - show text logo
                        else { ?>
                         <h2><?php echo get_bloginfo( 'name' ); ?></h2>
                    <?php } //end logo check ?>
                </a>
            </div><!-- /logo -->
            <?php
            //show social icons if not disabled
            if(of_get_option('social')) { ?>
            <ul id="header-social">
                <?php
                //get social links from array
                $social_links = wpex_get_social();
                //social loop
                foreach($social_links as $social_link) {
                    if(of_get_option($social_link)) {
                        echo '<li><a href="'. of_get_option($social_link) .'" title="'. $social_link .'" target="_blank" class="wpex-tooltip"><img src="'. get_template_directory_uri() .'/images/social/'.$social_link.'.png" alt="'. $social_link .'" /></a></li>';
                    } //option empty
                } //end foreach ?>
                </ul><!-- /header-social -->
            <?php } //social disabled ?>
        </div><!-- /header-top -->
        <nav id="navigation">
            <?php
                //output main navigation menu
                wp_nav_menu( array(
                    'theme_location' => 'main_menu',
                    'sort_column' => 'menu_order',
                    'menu_class' => 'sf-menu',
                    'fallback_cb' => false
                )); ?>
            <?php get_search_form(); ?>
       </nav><!-- /navigation -->
       <?php wpex_hook_header_bottom(); ?>
	</header><!-- /header -->
</div><!-- /header-wrap -->
<?php wpex_hook_header_after(); ?>
    
<div id="wrap">

<?php wpex_hook_content_before(); ?>
<div id="main-content" class="outerbox clearfix fitvids">
<?php wpex_hook_content_top(); ?>  

	<?php
	//run code only on pages
	if(is_page() && !is_attachment()) {
		
		//show large featured images on pages
		$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
		if($full_img) { echo '<div id="page-featured-img" class="container"><img src="'. $full_img[0] .'" alt="'. get_the_title() .'" /></div>'; }
		
	} ?>