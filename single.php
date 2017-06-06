<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 */

//get template header
get_header();

//start post loop
if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post" class="clearfix">
	<div class="container clearfix">
		<?php
		$format = get_post_format();
		if ( false === $format ) $format = 'standard';
		
		if($format == 'quote') { ?>
			<div id="single-quote"><?php the_content(); ?><div class="entry-quote-author">- <?php the_title(); ?> -</div></div>
		<?php } elseif($format == 'link'){
			$post_url = get_post_meta($post->ID, 'wpex_post_url', true); ?>
			<div id="single-media-wrap">
				<?php get_template_part( '/formats/single', $format ); ?>
        	</div><!-- /single-media-wrap -->
			<div id="single-link">
                <header id="single-heading">
                <h1><a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h1>
            </header><!-- /single-meta -->
            <article class="entry clearfix">
                <?php the_content(); ?>
                <a href="<?php echo $post_url; ?>" title="<?php the_title(); ?>" target="_blank"><span class="wpex-icon-link"></span><?php echo $post_url; ?></a>
        	</article><!-- /entry -->
           </div><!-- /single-link -->
		<?php } else { ?>
        <div id="single-media-wrap">
			<?php get_template_part( '/formats/single', $format ); ?>
        </div><!-- /single-media-wrap -->
        
        <header id="single-heading">
            <h1><?php the_title(); ?></h1>
            <section class="meta clearfix" id="single-meta">
                <ul>
                    <li><span class="wpex-icon-calendar"></span><?php the_date(); ?></li>    
                    <li><span class="wpex-icon-folder-open"></span><?php the_category(' / '); ?></li>
                    <li><span class="wpex-icon-user"></span><?php the_author_posts_link(); ?></li>
                    <li class="comment-scroll"><span class="wpex-icon-comment"></span> <?php comments_popup_link(__('Leave a comment', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link', __('Comments closed', 'wpex')); ?></li>
                    <?php if( function_exists('zilla_likes') ) { ?><li><?php zilla_likes(); ?></li><?php } ?>
               </ul>
            </section><!--/meta -->
		</header><!-- /single-meta -->
        
        <article class="entry clearfix">
            <?php the_content(); ?>
        </article><!-- /entry -->
        
        <?php wp_link_pages(' '); ?>
        
        <?php
        //post tags
        if(of_get_option('blog_tags') =='1') {
            the_tags('<div class="post-tags clearfix">','','</div>');
        }
        ?>
        
        <?php
        //author bio
        if(of_get_option('blog_bio') == '1') { ?>
        <div id="single-author" class="clearfix">
            <div id="author-image">
               <?php echo get_avatar( get_the_author_meta('user_email'), '60', '' ); ?>
            </div><!-- author-image --> 
            <div id="author-bio">
                <h4><?php the_author_posts_link(); ?></h4>
                <p><?php the_author_meta('description'); ?></p>
            </div><!-- author-bio -->
        </div><!-- /single-author -->
        <?php } ?>
        
		<?php
        //share post
        if(of_get_option('blog_social') == '1') { ?>
        <div id="single-share" class="clearfix">
        	<h4><span class="wpex-icon-plus"></span><?php _e('Share This Post','wpex') ?></h4>
            <div class="share-btns">
                <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a>
                <div class="fb-like" data-send="false" data-show-faces="false" data-layout="button_count"></div>
                <div class="g-plusone" data-size="medium"></div>
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
            </div><!-- /share-btns -->
        </div><!-- /single-share -->
        <?php } ?>
        
	<?php } ?>
        
	</div><!-- /container -->
        
        <nav id="single-nav" class="clearfix"> 
            <?php next_post_link('<div id="single-nav-left">%link</div>', '<span class="wpex-icon-chevron-left"></span>'.__('Previous Post','wpex').'', false); ?>
            <?php previous_post_link('<div id="single-nav-right">%link</div>', ''.__('Next Post','wpex').'<span class="wpex-icon-chevron-right"></span>', false); ?>
        </nav><!-- /single-nav -->
        
        <?php
        //show comments if not disabled
        if(of_get_option('blog_comments','1')) {
			comments_template(); } ?>
        
</div><!-- /post -->

<?php
//end post loop
endwhile; endif;

//get template sidebar
get_sidebar(); ?>

  <?php
        //start related posts section if not disabled
        if(of_get_option('related_random_show') =='1') {
			
			if(of_get_option('related') == 'related') {
            	$category = get_the_category(); //get first current category ID
				$category = $category[0]->cat_ID;
			} else { $category = NULL; }
			
            $this_post = $post->ID; // get ID of current post
            
            $args = array(
                'numberposts' => of_get_option('related_random_count', '10'),
                'orderby' => 'rand',
                'category' => $category,
                'exclude' => $this_post,
                'offset' => null
            );
            $posts = get_posts($args);
            if($posts) { ?>
            	<div class="clear"></div>
                <section id="related-posts">
                	<div id="related-heading">
                    	<?php $related_random_title = (of_get_option('related') == 'related') ? __('Related Posts','wpex') : __('More Posts','wpex') ?>
                    	<h4><span><?php echo $related_random_title; ?></span></h4>
                    </div>
                    <div id="wpex-grid-wrap">
						<?php
                        foreach($posts as $post) : setup_postdata($post);
                        $format = get_post_format();
                        if ( false === $format ) $format = 'standard';
                        get_template_part( '/formats/entry', $format ); endforeach; wp_reset_postdata(); ?>
                        </div><!-- /wpex-grid-wrap -->
				</section> 
				<!-- /related-posts --> 
            <?php } // no posts found
        } //related posts section disabled
        ?>

<?php
//get template footer
get_footer(); ?>