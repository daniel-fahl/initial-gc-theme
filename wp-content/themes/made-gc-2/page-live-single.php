<?php
//set theme options
$oswc_page_sidebar_unique = $oswc_other['page_sidebar_unique'];
$oswc_trending_hide = $oswc_other['page_trending_hide'];

// use variables from page custom fields instead of made options page (if they exist)
$override = get_post_meta($post->ID, "Featured Image Size", $single = true);
if($override!="" && $override!="null") $oswc_featuredimage_size=$override;
$override = get_post_meta($post->ID, "Hide Trending", $single = true);
if($override!="" && $override!="null") {
	$oswc_trending_hide=$override;
	if($oswc_trending_hide=="false") {
		$oswc_trending_hide=false;	
	} else {
		$oswc_trending_hide=true;
	}
}

//setup variables
$sidebar="Default Sidebar";
if($oswc_page_sidebar_unique) { $sidebar="Page Sidebar"; } //which sidebar to display

//Template Name: live video - single
?>

<?php get_header(); // show header ?>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content">

    <div class="page-content">
        
        <div class="content-panel">
        	
        	<div id="live_content">
        	
        		<div class="embed">
        	
        			<?php get_custom_field_2('embed1', TRUE) ?>
        			
        		</div>
        		
        		<div class="live_meta">
        		
        			<div class="chat left">
        			
        				<?php get_custom_field_2('embed2', TRUE) ?>
        			
        			</div>	
        			
        			<div class="info right">
        			
        				<?php the_post_thumbnail('square'); ?>
        			
        				<?php the_content(); ?>
        			
        			</div>
        			
        		</div>	
        	
        	</div>
            
        </div>      
        
    </div>
    
    <?php if(!$oswc_trending_hide) { ?>
    
    	<br class="clearer" />
    
    	<?php oswc_get_template_part('trending'); // show trending ?>
        
    <?php } ?>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>