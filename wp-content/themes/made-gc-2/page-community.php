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

//Template Name: Community Page
?>

<?php get_header(); // show header ?>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content">

    <div class="page-content">
    
    	<div class="comm_welcome">
    	
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
    	
    		<?php the_content(); ?>
    	
    	<?php endwhile; endif; ?>
    	
    	</div>
        
        <div class="content-panel">
        
        	<div class="comm_column left">
        	
        		<h1>Updates from Gannon</h1>
        	
        		<?php
        		
        			// The Query
        			$the_query = new WP_Query( array('post_type' => 'community', 'author_name' => 'gannon', 'showposts' => 10));
        		
        			// The Loop
        			while ( $the_query->have_posts() ) : $the_query->the_post();
        			
        		?>
        		
        		<div class="comm_post_wrap clearfix">
        		
        			<div class="comm_author_block clearfix">
        			
        				<?php echo get_avatar( get_the_author_email(), '40' ); ?>
        	
        			    <?php echo '<div class="time clearfix">' . better_human_time_diff( get_the_time('U'), current_time('timestamp') ) . '</div>'; ?>
        				
        				
        			</div>
        			
        			<div class="comm_author_body">
        			
        				<?php the_content(); ?>
        			
        			</div>
        			
        		</div>	
        			
        		
        		<?php endwhile;	wp_reset_postdata(); ?>
        	
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