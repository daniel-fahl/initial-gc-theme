<?php //get theme options
global $oswc_front, $oswc_ads, $oswcPostTypes;

//set theme options
$oswc_front_sidebar_unique = $oswc_front['sidebar_unique'];
$oswc_front_sidebar_show = $oswc_front['sidebar_show'];
$oswc_featured_ad_hide = $oswc_ads['featured_ad_hide'];
$oswc_featured_ad = $oswc_ads['featured_ad'];
$oswc_spotlight_ad_hide = $oswc_ads['spotlight_ad_hide'];
$oswc_spotlight_ad = $oswc_ads['spotlight_ad'];
$oswc_tabs_ad_hide = $oswc_ads['tabs_ad_hide'];
$oswc_tabs_ad = $oswc_ads['tabs_ad'];
$oswc_trending_ad_hide = $oswc_ads['trending_ad_hide'];
$oswc_trending_ad = $oswc_ads['trending_ad'];
$oswc_categorypanels_ad_hide = $oswc_ads['categorypanels_ad_hide'];
$oswc_categorypanels_ad = $oswc_ads['categorypanels_ad'];
$oswc_featured_show = $oswc_front['featured_show'];
$oswc_featured_size = $oswc_front['featured_size'];
$oswc_spotlight_show = $oswc_front['spotlight_show'];
$oswc_tabs_show = $oswc_front['tabs_show'];
$oswc_latestposts_show = $oswc_front['latestposts_show'];
$oswc_trending_show = $oswc_front['trending_show'];
$oswc_categorypanels_show = $oswc_front['categorypanels_show'];
?>

<?php //setup variables
$sidebar="Default Sidebar";
if($oswc_front_sidebar_unique) { $sidebar="Frontpage Sidebar"; } //which sidebar to display
?>

<?php get_header(); // show header ?>

<?php /*
<div class="site_message">

	Welcome to the new and improved version of Gamechurch.com!  We are still working out a few minor bugs, so please be patient with us.  If you have an comments or suggestions,
	please let us know <a href="http://gamechurch.com/forums/topic/gamechurch-3-0-is-here/">here.</a>

	<a href="#" class="dismiss">
		Dismiss this message
	</a>
	
</div>

*/ ?>

<div class="cat-menu tax">
	
	<ul id="quickjump">
		<li class="title">Quick Jump:</li>
		<li><a href="#feature-wrapper">Features</a></li>
		<li><a href="#video-wrapper">Videos</a></li>
	
	</ul>

</div>

<?php
		   		
// The Query
$the_query = new WP_Query( array('posts_per_page' => 1, 'post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1 ));
		   		
// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();
		   		
?>

<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'single-mustread'); $image_url = $image_url[0]; ?>

		 
<div id="mustread" data-slide="1" data-stellar-background-ratio="0.7" class="clearfix" style="background-image: url(<?php echo $image_url; ?>)">

	<a href="<?php the_permalink(); ?>" class="mr-content">
	
		<h2 class="mr-tag gc-books">Must Read</h2>
			
		<h1><?php the_title(); ?></h1>
		
		<?php the_excerpt(); ?>
		
	</a>	
	
	<div class="mr-fade"></div>
				
</div>		
				
<?php endwhile; wp_reset_postdata(); ?>

<div id="feature-wrapper" class="features">

<div class="section-wrapper full">
		
    <div class="section">
    
        <span class="gc-bookmarks"></span>Features & News // <a href="<?php echo site_URL('/category/feature/'); ?>">View All</a>
        
        <a href="#" class="slidenav latest-prev">&nbsp;</a>
        <a href="#" class="slidenav latest-next">&nbsp;</a>
    
    </div> 
    
    <div class="ribbon-shadow-right">&nbsp;</div>
    <div class="ribbon-shadow-left">&nbsp;</div>       

</div>
    
    <div class="latest-scroller-wrapper">
    
            
        
            <div class="latest "> <!-- begin latest slider -->
            
                <ul class="clearfix"> 	
        
                   <?php
                   
                   	// The Query
                   	$the_query = new WP_Query( array('post__not_in' => get_option( 'sticky_posts' ), 'category_name' => 'feature', 'showposts' => 999));
                   
                   	// The Loop
                   	while ( $the_query->have_posts() ) : $the_query->the_post();
                   	
                   	?>	
                                
                        <li>
                        
                            <div class="post-panel"> 
                                    
                            
                                        <a class="feature-thumb clearfix" href="<?php the_permalink(); ?>">
                                        
                                        	<?php the_post_thumbnail('spotlight', array( 'title'=> '' )); ?>
                                        	
                                        	<h2><?php the_title(); ?></h2>
                                        	
                                        </a>
                                        
                                        <div class="inner">
                                                                                                               
                                            <div class="excerpt"><?php oswc_standard_excerpt(); ?></div>
                                            
                                        </div>
                                        
                                        <div class="more-bar">
                                        
                                        	<div class="arrow-catpanel-top">&nbsp;</div>
                                            
                                            <?php if($isreview && $rating_hide!="true") { ?>
                                        
                                                <div class="rating-wrapper small"><?php $oswcPostTypes->the_rating($reviewType); // show the rating ?></div>  
                                                
                                            <?php } ?> 
                                            
                                            <?php if(comments_open()) { ?>
                            					
                                                <div class="comments">
                                                
                                                    <?php comments_popup_link('0 comments', '1 comment', '% comments', '', '-'); ?>
                                                
                                                </div>
                                                
                                            <?php } ?>
                                            
                                            <div class="more"><a href="<?php the_permalink(); ?>"><?php _e('More','made'); ?></a></div>
                                        
                                        </div>
                                    
                                    </div>
  
                        
                        </li>
                        
                    <?php endwhile; wp_reset_postdata(); ?>
                    
                </ul>
        
            </div> <!-- end latest -->
            <br class="clearer" />
    </div>
    
    <div id="news-wrapper" class="clearfix">
 			
 			<?php
		     	// The Query
		     	$the_query = new WP_Query( array('post__not_in' => get_option( 'sticky_posts' ), 'category_name' => 'gaming-news', 'showposts' => 6));
		     
		     	// The Loop
		     	while ( $the_query->have_posts() ) : $the_query->the_post();
		     	
		     ?>	
		     
		     	<a href="<?php the_permalink(); ?>" class="grid_4 newspost">
		     	
		     		<?php the_post_thumbnail('news'); ?>
		     		
		     		<h3 class="bebas"><?php the_title(); ?></h3>
		     		
		     		<p><?php the_excerpt(); ?></p>
		     	
		     	</a>
                                  
                                                   
             <?php endwhile; wp_reset_postdata(); ?>

      </div>
    
</div>

<div id="video-wrapper">

	<div class="section-wrapper full">
			
	    <div class="section">
	    
	        <span class="gc-tv"></span>Videos // <a href="http://youtube.com/gamechurch" target="blank">Youtube Channel</a>
	        
	        <a href="#" class="slidenav latest-prev">&nbsp;</a>
	        <a href="#" class="slidenav latest-next">&nbsp;</a>
	    
	    </div>  
	    
	    <div class="ribbon-shadow-right">&nbsp;</div>
	    <div class="ribbon-shadow-left">&nbsp;</div>    
	
	</div>
	
	<div id="fp-videos" class="clearfix">
	
		<?php
		require_once( simplepie . '/autoloader.php');
		
		require_once( simplepie . '/simplepie_youtube.php');
		
		$feed = new SimplePie(); // Create a new instance of SimplePie
		$feed->set_feed_url('http://gdata.youtube.com/feeds/api/users/gamechurch/uploads?alt=rss');
		$feed->set_item_class('SimplePie_Item_YouTube');
		
		$feed->enable_cache(false);
		
		
		$success = $feed->init(); // Initialize SimplePie
		
		$feed->handle_content_type(); // Take care of the character encoding
		?>
	
		<div id="video_player" class="grid_8">
		
			<?php foreach($feed->get_items(0, 1) as $item): ?>
			
				<iframe name="vidplayer" frameborder="0" width="100%" height="360" src="<?php echo $item->get_youtube_player_url(); ?>"></iframe>
			
			<?php endforeach; ?>
		
		</div>
		
		<div id="video_playlist" class="grid_4">
		
			<ul>	
				
				<?php foreach($feed->get_items(0, 50) as $item): ?>
				
				    <li class="video-post">
				    
				    	<a href="<?php echo $item->get_youtube_player_url(); ?>?start=0&autoplay=1" target="vidplayer" class="clearfix">
				    		<img class="grid_4" src="<?php echo $item->get_youtube_thumbnail_url(); ?>" class="vid_thumb">
				    		<h2 class="vid-title grid_8"><span><?php echo $item->get_title(); ?></span></h2>
				    	</a>
				    	
				    
				    </li>
					
				<?php endforeach; ?>
				
			</ul>	
		
		</div>
	
	</div>

</div>

<?php /*

<div id="fp-wrapper">

	<div class="section-wrapper full">
			
	    <div class="section">
	    
	        <span class=""></span>Best Sellers
	        
	        <a href="#" class="slidenav latest-prev">&nbsp;</a>
	        <a href="#" class="slidenav latest-next">&nbsp;</a>
	    
	    </div>  
	    
	    <div class="ribbon-shadow-right">&nbsp;</div>
	    <div class="ribbon-shadow-left">&nbsp;</div>    
	
	</div>
	
	<div id="bestsellers">
	
		<?php echo do_shortcode('[best_selling_products per_page="4"]'); ?>
	
	</div>
	
	
	
</div>

*/ ?>	

<div id="responsive-feed">

	<div class="post-loop">

	<?php
		   		
		   // The Query
		   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		   $args = array(
		   		'posts_per_page' => 8,
		   		'post_type' => array('post', 'community'),
		   		'paged' => $paged,
		   		'post__in'  => get_option( 'sticky_posts' ),
		   		'ignore_sticky_posts' => 1
		   	);
		   $wp_query = new WP_Query( $args );
		   		
		   // The Loop
		   while ( $wp_query->have_posts() ) : $wp_query->the_post();
		   		
	?>
	
		<div class="post-panel"> 
		
		    <a class="feature-thumb clearfix" href="<?php the_permalink(); ?>">
		    
		    	<?php the_post_thumbnail('spotlight', array( 'title'=> '' )); ?>
		    	
		    	<h2><?php the_title(); ?></h2>
		    	
		    </a>
		    
		    <div class="inner">
		                                                                           
		        <div class="excerpt"><?php oswc_standard_excerpt(); ?></div>
		        
		    </div>
		    
		    <div class="more-bar">
		    
		    	<div class="arrow-catpanel-top">&nbsp;</div>
		        
		        <?php if($isreview && $rating_hide!="true") { ?>
		    
		            <div class="rating-wrapper small"><?php $oswcPostTypes->the_rating($reviewType); // show the rating ?></div>  
		            
		        <?php } ?> 
		        
		        <?php if(comments_open()) { ?>
					
		            <div class="comments">
		            
		                <?php comments_popup_link('0 comments', '1 comment', '% comments', '', '-'); ?>
		            
		            </div>
		            
		        <?php } ?>
		        
		        <div class="more"><a href="<?php the_permalink(); ?>"><?php _e('More','made'); ?></a></div>
		    
		    </div>
		
		</div>
		
	
	<?php endwhile; ?>
	
		 <?php // pagination
		 pagination($wp_query->max_num_pages);
		 ?> 
	
	<?php wp_reset_postdata(); ?>
	
	</div>

</div>

<? /*

<?php if($oswc_featured_show && $oswc_featured_size=="large") { ?>
    
	<?php oswc_get_template_part('featured'); // show featured area ?>
    
<?php } ?>

<div class="main-content<?php if($oswc_front_sidebar_show) { ?>-left<?php } ?> hide-responsive">

	<?php if($oswc_featured_show && $oswc_featured_size=="small") { // show featured area using small format ?>
    
		<?php oswc_get_template_part('featured'); ?>
                
		<?php if(!$oswc_front_sidebar_show) { // don't show main sidebar, only sidebar next to featured area (only if featured area is set to small format) ?>
        
            <div id="featured-sidebar" class="sidebar">
                        
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else : ?>
            
                    <div class="widget-wrapper">
            
                        <div class="widget">
                
                            <div class="section-wrapper"><div class="section">
                            
                                <?php _e('Made Magazine', 'made' ); ?>
                            
                            </div></div> 
                            
                            <div class="textwidget">  
                                                          
                                <p><?php _e( 'This is a widget panel. To remove this text, login to your WordPress admin panel and go to Appearance >> Widgets, and drag &amp; drop a widget into the corresponding widget panel.', 'made' ); ?></p>
                                
                            </div>
                                        
                        </div>
                    
                    </div>
                
                <?php endif; ?>
            
            </div>
            
        <?php } ?>
        
    <?php } ?>
    
    <br class="clearer" />
    
    <?php if(!$oswc_featured_ad_hide) { //the ad below the featured slider ?>
                
        <div class="<?php if(!$oswc_front_sidebar_show) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
        
            <?php echo $oswc_featured_ad; ?>
            
        </div>
    
    <?php } ?>
    
    <?php if($oswc_spotlight_show) { ?>
    
    	<?php oswc_get_template_part('spotlight'); // show spotlight articles ?>
        
    <?php } ?>
    
    <?php if(!$oswc_spotlight_ad_hide) { //the ad below the featured slider ?>
                
        <div class="<?php if(!$oswc_front_sidebar_show) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
        
            <?php echo $oswc_spotlight_ad; ?>
            
        </div>
    
    <?php } ?>
    
    <?php if($oswc_tabs_show) { ?>
    
    	<?php oswc_get_template_part('tabs'); // show tabbed articles ?>
        
    <?php } ?>
    
    <?php if(!$oswc_tabs_ad_hide) { //the ad below the tabs ?>
                
        <div class="<?php if(!$oswc_front_sidebar_show) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
        
            <?php echo $oswc_tabs_ad; ?>
            
        </div>
    
    <?php } ?>
    
    <?php if($oswc_trending_show) { ?>
    
    	<?php oswc_get_template_part('trending'); // show trending slider ?>
        
    <?php } ?>
    
    <?php if(!$oswc_trending_ad_hide) { //the ad below the trending slider ?>
                
        <div class="<?php if(!$oswc_front_sidebar_show) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
        
            <?php echo $oswc_trending_ad; ?>
            
        </div>
    
    <?php } ?>
    
    <?php if($oswc_categorypanels_show) { ?>
    
    	<?php oswc_get_template_part('category-panels'); // show category panels ?>
        
    <?php } ?>
    
    <?php if(!$oswc_categorypanels_ad_hide) { //the ad below the featured slider ?>
                
        <div class="<?php if(!$oswc_front_sidebar_show) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
        
            <?php echo $oswc_categorypanels_ad; ?>
            
        </div>
    
    <?php } ?>    
        
    <?php if($oswc_latestposts_show) { ?>
    
    	<?php oswc_get_template_part('front-latest-posts'); // show latest posts ?>
        
    <?php } ?>
    
    <?php oswc_get_template_part('frontpage-widgets'); // show frontpage widgets ?>

</div>

*/ ?>

<div id="fp-wrapper" class="image_btn_wrap clearfix">

	<a href="http://gamechurch.com/ministry/missions" class="image_button grid_4"><img src="<?php bloginfo('template_url'); ?>/images/img_btn_mission.jpg" /></a>
	<a href="http://facebook.com/groups/gamechurchcity" class="image_button grid_4"><img src="<?php bloginfo('template_url'); ?>/images/img_btn_city.jpg" /></a>
	<a href="http://gamechurch.com/wp-content/uploads/2013/04/JFTW-Web.pdf" class="image_button grid_4"><img src="<?php bloginfo('template_url'); ?>/images/img_btn_jftw.jpg" /></a>

</div>

<?php get_footer(); // show footer ?>