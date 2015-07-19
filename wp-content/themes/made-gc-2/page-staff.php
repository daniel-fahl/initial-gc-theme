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

//Template Name: Staff Page
?>

<?php get_header(); // show header ?>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content">

    <div class="page-content">
        
        <div class="content-panel">
        
        	<?php
        	
        	// Get the authors from the database ordered by user nicename
        		global $wpdb;
        		$query = "SELECT ID, user_nicename from $wpdb->users ORDER BY user_nicename";
        		$author_ids = $wpdb->get_results($query);
        	
        	// Loop through each author
        		foreach($author_ids as $author) :
        	
        		// Get user data
        			$curauth = get_userdata($author->ID);
        	
        		// If user level is above 0 or login name is "admin", display profile
        			if($curauth->user_level > 0 || $curauth->user_login == 'admin') :
        	
        			// Get link to author page
        				$user_link = get_author_posts_url($curauth->ID);
        	
        			// Set default avatar (values = default, wavatar, identicon, monsterid)
        				$avatar = 'identicon';
        	?>
        	
        	<div class="main authorbox clearfix">
        		<div class="authbox_left">
        			<a href="<?php echo $curauth->user_url; ?>" title="<?php echo $curauth->display_name; ?>">
        			<?php echo get_avatar($curauth->user_email, '96', $avatar); ?></a>
        			<div class="auth_buttons">
        				<?php if ( !empty ( $curauth->facebook )  ) : ?>
        					<a href="<?php echo $curauth->facebook; ?>"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png"></a>
        				<?php endif; ?>
        				<?php if ( !empty ( $curauth->twitter )  ) : ?>			
        					<a href="<?php echo $curauth->twitter; ?>"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png"></a>
        				<?php endif; ?>						
        			</div>
        		</div>
        		<div class="authbox_right clearfix">
        			<h2>
        				<a href="<?php echo $curauth->user_url; ?>" title="<?php echo $curauth->display_name; ?>"><?php echo $curauth->first_name; ?>&nbsp;<?php echo $curauth->last_name; ?></a>
        			</h2>
        			
        			<h4><?php echo $curauth->address; ?></h4>
        			        			
        			<?php /*<p style="margin-bottom:4px;"><strong>Twitter: </strong><a href="<?php echo $curauth->jabber; ?>"><?php echo $curauth->jabber; ?></a></p><?php */ ?>
        			<p style="margin-bottom:0;"><?php echo $curauth->description; ?></p>
        		</div>
        	</div> <!-- end post -->
        	<?php endif; ?>
        	<?php endforeach; ?>
            
        </div>      
        
    </div>
    
    <?php if(!$oswc_trending_hide) { ?>
    
    	<br class="clearer" />
    
    	<?php oswc_get_template_part('trending'); // show trending ?>
        
    <?php } ?>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>