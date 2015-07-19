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

//Template Name: live video
?>

<?php get_header(); // show header ?>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content">

    <div class="page-content">
        
        <div class="content-panel">
        	
        	<div id="live_content">
        	
        		<div class="embed">
        	
        			<object type="application/x-shockwave-flash" height="540" width="940" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=gamechurch" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=www.twitch.tv&channel=gamechurch&auto_play=true&start_volume=25" /></object><a href="http://www.twitch.tv/gamechurch" class="trk" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline; text-align:center;">Watch live video from gamechurch on www.twitch.tv</a>
        			
        		</div>
        		
        		<div class="live_meta">
        		
        			<div class="chat left">
        			
        				<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=gamechurch&amp;popout_chat=true" height="378" width="480"></iframe>
        			
        			</div>	
        			
        			<div class="info right">
        			
        				<h1>ABOUT THIS FEED</h1>
        				
        				This is our very own Gamechurch live feed, broadcasting everything from game-a-thons, live tournaments, and more.
        			
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