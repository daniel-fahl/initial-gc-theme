<?php //get theme options
global $oswc_single, $oswc_ads;

//set theme options
$oswc_text_ad_hide = $oswc_ads['single_text_ad_hide'];
$oswc_text_ad = $oswc_ads['single_text_ad'];
$oswc_comments_ad_hide = $oswc_ads['single_comments_ad_hide'];
$oswc_comments_ad = $oswc_ads['single_comments_ad'];
$oswc_post_sidebar_unique = $oswc_single['post_sidebar_unique']; 
$oswc_post_sidebar_hide = $oswc_single['post_sidebar_hide']; 
$oswc_featured_image_video_show = $oswc_single['post_featured_image_video_show'];
$oswc_featured_image_hide = $oswc_single['post_featured_image_hide'];
$oswc_trending_hide = $oswc_single['post_trending_hide']; 
$oswc_tags_hide = $oswc_single['post_tags_hide']; 
?>

<?php // use variables from page custom fields instead of made options page (if they exist)
$override = get_post_meta($post->ID, "Featured Image Size", $single = true);
if($override!="" && $override!="null") {
	$oswc_post_featured_image_size=$override;	
}
$override = get_post_meta($post->ID, "Hide Sidebar", $single = true);
if($override!="" && $override!="null") {
	$oswc_sidebar_hide=$override;
	if($oswc_sidebar_hide=="false") {
		$oswc_post_sidebar_hide=true;	
	} else {
		$oswc_post_sidebar_hide=false;
	}
}
$override = get_post_meta($post->ID, "Hide Trending", $single = true);
if($override!="" && $override!="null") {
	$oswc_trending_hide=$override;
	if($oswc_trending_hide=="false") {
		$oswc_trending_hide=false;	
	} else {
		$oswc_trending_hide=true;
	}
}
$override = get_post_meta($post->ID, "Hide Text Ad", $single = true);
if($override!="" && $override!="null") {
	$oswc_text_ad_hide=$override;
	if($oswc_text_ad_hide=="false") {
		$oswc_text_ad_hide=false;	
	} else {
		$oswc_text_ad_hide=true;
	}
}
$override = get_post_meta($post->ID, "Hide Comments Ad", $single = true);
if($override!="" && $override!="null") {
	$oswc_comments_ad_hide=$override;
	if($oswc_comments_ad_hide=="false") {
		$oswc_comments_ad_hide=false;	
	} else {
		$oswc_comments_ad_hide=true;
	}
}
?>

<?php // user specified a unique single post sidebar
if ($oswc_post_sidebar_unique) {
	$sidebar="Single Post Sidebar";
} else {
	$sidebar="Default Sidebar";
}
//if we're not showing the sidebar, the large featured image size (600px) changes to full (900px)
switch ($oswc_post_featured_image_size) {
	case "small":
		$featured_image_size="single-small";
		$featured_image_size_responsive="single-small";
		break;
	case "medium":
		$featured_image_size="single-medium";
		$featured_image_size_responsive="single-medium";
		break;
	case "full":
		$featured_image_size="single-thumb";
		$featured_image_size_responsive="single-medium";
		break;
	default:
		$featured_image_size="single-thumb";
		$featured_image_size_responsive="single-medium";
		break;
}

if ($oswc_post_sidebar_hide && $oswc_post_featured_image_size=="full") {
	$featured_image_size="single-full";
}

?>

<?php get_header(); // show header ?>

<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'single-mustread'); $image_url = $image_url[0]; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		 
<div id="mustread" data-slide="1" data-stellar-background-ratio="0.7" class="clearfix" style="background-image: url(<?php echo $image_url; ?>)">

	<div class="mr-content">
			
		<h1><?php the_title(); ?></h1>
		
		<?php the_excerpt(); ?>
		
	</div>	
	
	<div class="mr-fade"></div>
				
</div>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>
       
<div class="main-content<?php if(!$oswc_post_sidebar_hide) { ?>-left<?php } else { ?> full-width<?php } ?>">
    
    <div class="page-content review single-post">
    
            
            <?php
            // Featured Image for FB Like
            $featured_image = get_the_post_thumbnail($post->ID);
            
            // Get image source
            if($featured_image) {
                $doc = new DOMDocument();
                $doc->loadHTML($featured_image);
                $imageTags = $doc->getElementsByTagName('img');
                
                foreach($imageTags as $tag) {
                    $image_url = $tag->getAttribute('src');
                }
            }				
            ?>
            <link rel="image_src" href="<?php echo $image_url; ?>" />
            
            <?php //check if this is a video post
            $isvideo=false;
            $video = get_post_meta($post->ID, "Video", $single = true);
            if($video!="") $isvideo=true;
            ?> 
            
            <div class="review-content">
                
                <div id="post-<?php the_ID(); ?>" <?php post_class('content-panel'); ?>>
                        
                    
                    <?php if($oswc_post_featured_image_size=="full") { ?><br class="clearer" /><?php } ?>   
                    
                    <div class="the-content">       
        
                    	<?php the_content(); ?>
                        
                    </div>
                    
                    <?php $pagination_args = array(
                        'before'           => '<div class="pagination-wrapper"><div class="pagination">',
                        'after'			   => '</div></div>',
                        'link_before'	   => '<span class="current">',
                        'link_after'       => '</span>',
                        'next_or_number'   => 'number',
                        'nextpagelink'     => '&raquo;',
                        'previouspagelink' => '$laquo;',
                        'pagelink'         => '%',
                        'echo'             => 1 ); ?>
                            
                    <?php wp_link_pages($pagination_args); ?> 
                    
                    <div class="clearer"></div><br />
                    
                    <?php if(!$oswc_tags_hide) { ?>
                    
                        <div class="tags">
                        
                            <?php echo oswc_get_tags($post->ID, ' '); //list tags excluding template tags ?>
                        
                        </div> 
                        
                        <div class="clearer"></div>  
                    
                    <?php } ?>
                    
                    <?php if(!$oswc_text_ad_hide) { //the ad below the body text ?>
                
                        <div class="<?php if($oswc_post_sidebar_hide) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?> no-margin">  
                        
                            <?php echo $oswc_text_ad; ?>
                            
                        </div>
                    
                    <?php } ?>   
                
                    <?php oswc_get_template_part('authorbox'); //show authorbox ?> 
                    
                    <?php oswc_get_template_part('related-normal'); //show related articles ?> 
                    
                    <div class="clearer"></div> 
                    
                    <?php if(!$oswc_comments_ad_hide) { //the ad above the comments ?>
                
                        <div class="<?php if($oswc_post_sidebar_hide) { ?>full-width-ad<?php } else { ?>left-ad<?php } ?> no-margin">  
                        
                            <?php echo $oswc_comments_ad; ?>
                            
                        </div>
                    
                    <?php } ?>  
                    
                </div>
            
          	</div>
        
        <?php endwhile;
        endif; ?>        

    </div>      
    
    <?php if(comments_open()) { ?>

		<?php comments_template(); // show comments ?>
        
    <?php } ?>    
    
    <?php if(!$oswc_trending_hide) { ?>
    
        <?php oswc_get_template_part('trending'); // show trending ?>
        
    <?php } ?>

</div>

<?php if(!$oswc_post_sidebar_hide) { ?>

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

<div class="clearer"></div>

<?php get_footer(); // show footer ?>