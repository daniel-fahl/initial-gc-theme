<?php
// Template Name: Reviews
?>

<?php
//set theme options
$oswc_ad_shuffle=$oswc_ads['ad_shuffle'];
$oswc_ad1 = $oswc_ads['ad1'];
$oswc_ad2 = $oswc_ads['ad2'];
$oswc_ad3 = $oswc_ads['ad3'];
$oswc_ad4 = $oswc_ads['ad4'];
$oswc_ad5 = $oswc_ads['ad5'];
$oswc_ad6 = $oswc_ads['ad6'];
$oswc_ad7 = $oswc_ads['ad7'];
$oswc_ad8 = $oswc_ads['ad8'];
$oswc_ad9 = $oswc_ads['ad9'];
$oswc_ad10 = $oswc_ads['ad10'];
$oswc_featured_ad_hide = $oswc_ads['featured_ad_hide'];
$oswc_featured_ad = $oswc_ads['featured_ad'];
$oswc_trending_ad_hide = $oswc_ads['trending_ad_hide'];
$oswc_trending_ad = $oswc_ads['trending_ad'];
$oswc_categorypanels_ad_hide = $oswc_ads['categorypanels_ad_hide'];
$oswc_categorypanels_ad = $oswc_ads['categorypanels_ad'];
$oswc_review_sidebar_unique = $oswc_other['review_sidebar_unique'];
$oswc_review_num = $oswc_other['review_num'];

//setup ad array
$ads = array($oswc_ad1,$oswc_ad2,$oswc_ad3,$oswc_ad4,$oswc_ad5,$oswc_ad6,$oswc_ad7,$oswc_ad8,$oswc_ad9,$oswc_ad10);
if($oswc_ad_shuffle) {
	shuffle($ads);
}
?>

<?php

get_header(); // show header

$postTypeName = oswc_get_review_meta($post->ID);

if(empty($postTypeName) || !$oswcPostTypes->has_type($postTypeName) || $oswcPostTypes->has_type(strtolower($postTypeName))){ ?>

	<br /><br />
	<h3><?php _e('The specified review type ' . $postTypeName . ' does not match a review type in the system. Make sure you capitalize the name of the review type when you create it in Review Options, and then match the capitalization when you add the custom field to your review page.'); ?></h3>
 
<?php }else{
    $postType = $oswcPostTypes->get_type_by_name($postTypeName);
    $primaryTaxonomy = $postType->get_primary_taxonomy();
	//echo "USING TEMPLATE FOR $postType->name";
	$oswc_posttype_enable = $postType->enabled;
	//echo "SAFE NAME = $postType->safe_name";
	?>
    
    <?php if($oswc_posttype_enable) { ?>
		<?php //set theme options
		
		//get review type options
		$reviewLayout=$postType->layout;
		$reviewFeaturedEnabled=$postType->featured_enabled;
		$reviewSidebarEnabled=$postType->front_sidebar_enabled;
		$reviewFeaturedSize=$postType->featured_size;
		$reviewMetaEnabled=$postType->meta_enabled;
		$reviewExcerptEnabled=$postType->excerpt_enabled;
		$reviewTrendingEnabled=$postType->trending_enabled;	
		$reviewHideReviewVerbiage=$postType->hide_review_verbiage;	
		
		//set defaults
		if(empty($reviewLayout)) $reviewLayout='A';		
        ?>
    
        <?php // user specified a unique review sidebar
        if ($oswc_review_sidebar_unique) {
            $sidebar=$postType->name . " Sidebar";
        } else {
            $sidebar="Default Sidebar";
        }
		//get proper thumbnail size based on layout
		switch ($reviewLayout) {
			case "A":
				$thumbnailsize="spotlight";
				if($reviewSidebarEnabled) {
					$cols=2;
				} else {
					$cols=3;
					$sidebar=$postType->name . " Featured Sidebar";	
				}
				break;
			case "B":
				$thumbnailsize="loop-large";
				if(!$reviewSidebarEnabled) {
					$thumbnailsize="loop-large-full";
					$sidebar=$postType->name . " Featured Sidebar";
				}
				$cols=1;
				break;
			case "C":
				$thumbnailsize="spotlight";
				if(!$reviewSidebarEnabled) {
					$sidebar=$postType->name . " Featured Sidebar";
				}
				$cols=1;
		}
        ?>
    
        <?php // setup the query
        $args='&posts_per_page='.$oswc_review_num.'&post_type=' . $postType->id . '&paged='.$paged;
        ?>
    
        <?php $review_loop = new WP_Query($args); ?>
        
        <?php if($reviewFeaturedEnabled && $reviewFeaturedSize=="large") { ?>
    
			<?php oswc_get_template_part('featured'); // show featured area ?>
            
            <?php if(!$reviewSidebarEnabled) { ?><br class="clearer" /><?php } ?>
            
        <?php } ?>
	
		<div class="main-content<?php if($reviewSidebarEnabled) { ?>-left<?php } ?>">       
        
        	<?php if($reviewFeaturedEnabled && $reviewFeaturedSize=="small") { ?>
            
            	<?php oswc_get_template_part('featured'); // show featured area ?>
                
				<?php if(!$reviewSidebarEnabled) { ?>
                
                    <div id="featured-sidebar" class="sidebar">
                    
                        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else : ?>
                    
                            <div class="widget-wrapper">
        
                                <div class="widget">
                        
                                    <div class="section-wrapper"><div class="section">
                                    
                                        <?php _e(' Made Magazine ', 'made' ); ?>
                                    
                                    </div></div> 
                                    
                                    <div class="textwidget">  
                                                                  
                                        <p><?php _e( 'This is a widget panel. To remove this text, login to your WordPress admin panel and go to Appearance >> Widgets, and drag &amp; drop a widget into the corresponding widget panel.', 'made' ); ?></p>
                                        
                                    </div>
                                                
                                </div>
                            
                            </div>
                        
                        <?php endif; ?>
                    
                    </div>
                    
                <?php } ?>
                
                <br class="clearer" />
                
                <?php if($oswc_featured_ad_show) { //the ad below the featured slider ?>
                
                    <div class="<?php if(!$reviewSidebarEnabled) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
                    
                        <?php echo $oswc_featured_ad; ?>
                        
                    </div>
                
                <?php } ?>
                
            <?php } ?> 
            
            <div class="post-loop">

        		<div class="ribbon-shadow-left">&nbsp;</div>       
                
                <div class="section-wrapper">
                
                    <div class="section">
                    
                        <?php echo $postType->name; ?>
                        <?php if(!$reviewHideReviewVerbiage) _e(' Reviews','made'); ?>
                    
                    </div>        
                
                </div>
                
                <div class="ribbon-shadow-right">&nbsp;</div>   
            
                <div class="section-arrow">&nbsp;</div>           
                    
				<?php if ($review_loop->have_posts()) : while ($review_loop->have_posts()) : $review_loop->the_post(); $postcount++;
				
					$counts = oswc_ad($ads, $cols, $postcount, $adcount, $reviewLayout); //show ads in the loop
					$postcount = $counts[0]; //get updated post count
					$adcount = $counts[1]; //get updated ad count	
					//show rating?
					$rating_hide = get_post_meta($post->ID, "Hide Rating", $single = true); 
                    //check if this is a video post
                    $isvideo=false;
                    $video = get_post_meta($post->ID, "Video", $single = true);
                    if($video!="") $isvideo=true;	
                    ?>
                    
                    <div class="post-panel<?php if($postcount % $cols == 0) { ?> right<?php } ?><?php if($reviewLayout=="B") { ?> layout-b<?php } elseif($reviewLayout=="C") { ?> layout-c<?php } ?><?php if(!$reviewMetaEnabled) { ?> no-more<?php } ?>">
				
                		<div class="article-image">
                            <a class="thumbnail darken<?php if($isvideo) { ?> video<?php } ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumbnailsize, array( 'title'=> '' )); ?></a>
                        </div>
                        
                        <div class="article-image responsive-large">
                            <a class="thumbnail darken<?php if($isvideo) { ?> video<?php } ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('loop-large', array( 'title'=> '' )); ?></a>
                        </div>
                        
                        <div class="article-image responsive">
                            <a class="thumbnail darken<?php if($isvideo) { ?> video<?php } ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('spotlight', array( 'title'=> '' )); ?></a>
                        </div>
                                            
                        <?php if($reviewLayout=="A" || $reviewLayout=="B") { //layout A ?>
                            
                            <div class="inner">
                                                       
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                
                                <?php if($reviewExcerptEnabled) { ?>
                                
                                    <div class="excerpt">
                                    
                                        <?php if(!$reviewSidebarEnabled && $reviewLayout=="B") { ?>
                                    
                                            <?php oswc_long_excerpt(); ?>
                                            
                                        <?php } else { ?>
                                        
                                            <?php oswc_standard_excerpt(); ?>
                                        
                                        <?php } ?>
                                        
                                    </div>
                                    
                                <?php } ?>
                          
                            </div>
                            
                            <?php if($reviewMetaEnabled) { ?>
                            
                                <div class="more-bar">
                                        
                                    <div class="arrow-catpanel-top">&nbsp;</div>
                                    
                                    <?php if($rating_hide!="true") { ?>
                                
                                        <div class="rating-wrapper small"><?php $oswcPostTypes->the_rating($postType); // show the rating ?></div>  
                                        
                                    <?php } ?> 
                                    
                                    <?php if(comments_open()) { ?>
                                        
                                        <div class="comments">
                                        
                                            <?php comments_popup_link('0 comments', '1 comment', '% comments', '', '-'); ?>
                                        
                                        </div>
                                        
                                    <?php } ?>
                                    
                                    <?php if($reviewLayout=="B") { ?>
                                    
                                        <br class="clearer" />
                                
                                        <div class="date">
                                        
                                            <?php echo get_the_date(); ?>
                                            
                                        </div>
                                                                    
                                        <div class="tags">
                                        
                                            <div class="label"><?php _e('Tags:','made'); ?></div>
                                        
                                            <?php echo oswc_get_tags($post->ID, '<br />'); //list tags excluding template tags ?> 
                                        
                                        </div>
                                        
                                    <?php } ?>
                                    
                                    <div class="more"><a href="<?php the_permalink(); ?>"><?php _e('More','made'); ?></a></div>
                                    
                                    <?php if($reviewLayout=="B") { ?>
                                
                                        <br class="clearer" />
                                        
                                    <?php } ?>
                                
                                </div> 
                                
                                <?php if($reviewLayout=="B") { ?>
                                
                                    <br class="clearer" />
                                    
                                <?php } ?>
                                
                            <?php } ?> 
                        
                        <?php } else { //layout C ?>
                        
                            <?php if($reviewMetaEnabled) { ?>
                                
                                <div class="more-bar">
                                        
                                    <div class="arrow-catpanel-top">&nbsp;</div>
                                    
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    
                                    <?php if($rating_hide!="true") { ?>
                                
                                        <div class="rating-wrapper small"><?php $oswcPostTypes->the_rating($postType); // show the rating ?></div>  
                                        
                                    <?php } ?>
                                    
                                    <div class="clear-responsive">&nbsp;</div>
                                    
                                    <div class="date">
                                    
                                        <?php echo get_the_date(); ?>
                                        
                                    </div> 
                                    
                                    <?php if(comments_open()) { ?>
                                    
                                    	<div class="clear-responsive">&nbsp;</div>
                                        
                                        <div class="comments">
                                        
                                            <?php comments_popup_link('0 comments', '1 comment', '% comments', '', '-'); ?>
                                        
                                        </div>
                                        
                                    <?php } ?>
                                    
                                    <br class="clearer" />                        
                                                                
                                    <div class="tags">
                                    
                                        <?php echo oswc_get_tags($post->ID, ', '); //list tags excluding template tags ?> 
            
                                    
                                    </div>
                                    
                                    <br class="clearer" />
                                
                                </div> 
                                
                                <br class="clearer" />
                                
                            <?php } ?> 
                            
                            <div class="inner">
                            
                                <?php if(!$reviewMetaEnabled) { ?>
                            
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    
                                <?php } ?>
                                
                                <?php if($reviewExcerptEnabled) { ?>
                                
                                    <div class="excerpt">
                                    
                                        <?php if(!$reviewSidebarEnabled) { ?>
                                        
                                            <?php oswc_long_excerpt(); ?>
                                            
                                        <?php } else { ?>
                                        
                                            <?php oswc_standard_excerpt(); ?>
                                        
                                        <?php } ?>
                                        
                                    </div>
                                    
                                <?php } ?>
                                
                                <div class="more"><a href="<?php the_permalink(); ?>"><?php _e('More','made'); ?></a></div>
                          
                            </div>
                        
                        <?php } ?>                       
                        
                    </div>
                    
                    <?php if($postcount % $cols == 0) { ?> <div class="clearer"></div><?php } ?>
                    
                <?php endwhile; 
                endif; ?>
                
                <br class="clearer" />  
                    
				<?php // pagination
                pagination($review_loop->max_num_pages);
                ?> 
                
            </div>
            
            <div class="clearer"></div>
            
            <?php if($oswc_categorypanels_ad_show) { //the ad below the featured slider ?>
                
                <div class="<?php if($reviewLayout=="D" || $reviewLayout=="E") { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
                
                    <?php echo $oswc_categorypanels_ad; ?>
                    
                </div>
            
            <?php } ?>
            
            <?php if($reviewTrendingEnabled) { ?>
    
				<?php oswc_get_template_part('trending'); // show trending ?>
                
                <?php if($oswc_trending_ad_show) { //the ad below the featured slider ?>
                
                    <div class="<?php if($reviewLayout=="D" || $reviewLayout=="E") { ?>full-width-ad<?php } else { ?>left-ad<?php } ?>">  
                    
                        <?php echo $oswc_trending_ad; ?>
                        
                    </div>
                
                <?php } ?>
                
            <?php } ?>
        
        </div>
        
        <?php if($reviewSidebarEnabled) { ?>
        
            <div class="sidebar">
        
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else : ?>
                
                    <div class="widget-wrapper">
        
                        <div class="widget">
                
                            <div class="section-wrapper"><div class="section">
                            
                                <?php _e(' Made Magazine ', 'made' ); ?>
                            
                            </div></div> 
                            
                            <div class="textwidget">  
                                                          
                                <p><?php _e( 'This is a widget panel. To remove this text, login to your WordPress admin panel and go to Appearance >> Widgets, and drag &amp; drop a widget into the corresponding widget panel.', 'made' ); ?></p>
                                
                            </div>
                                        
                        </div>
                    
                    </div>
                
                <?php endif; ?>
            
            </div>
            
        <?php } ?>	
            
	<?php } else { ?>
    
        <br /><br />
        <h3><?php _e('Please enable ' . ucwords($postType->name) . ' Reviews in the Theme Options panel'); ?></h3>
        <br /><br /><br /><br />
    
    <?php } ?> 
    
<?php } ?>

<div class="clearer"></div>

<?php get_footer(); // show footer ?>