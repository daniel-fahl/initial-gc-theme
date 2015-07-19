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

//Template Name: Video Page
?>

<?php
require_once( simplepie . '/autoloader.php');

require_once( simplepie . '/simplepie_youtube.php');

$feed = new SimplePie(); // Create a new instance of SimplePie
$feed->set_feed_url('http://gdata.youtube.com/feeds/api/users/gamechurch/uploads?alt=rss');
$feed->set_item_class('SimplePie_Item_YouTube');

$feed->enable_cache(false);


$success = $feed->init(); // Initialize SimplePie

$feed->handle_content_type(); // Take care of the character encoding

// Set our paging values
$start = (isset($_GET['start']) && !empty($_GET['start'])) ? $_GET['start'] : 0; // Where do we start?
$length = (isset($_GET['length']) && !empty($_GET['length'])) ? $_GET['length'] : 9; // How many per page?
$max = $feed->get_item_quantity(); // Where do we end?

?>

<?php get_header(); // show header ?>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content">

                
	        <div class="post-loop clearfix">
	        
	        	
	        	
	        	
	        	<?php
	        			// get_items() will accept values from above.
	        			foreach($feed->get_items($start, $length) as $item):
	        				$feed = $item->get_feed();
	        			?>
	        	
		        	<div class="post-panel video">
		        	
		        	
		        		<a href="<?php echo $item->get_youtube_player_url(); ?>" class="darken colorboxiframe item video launch">
		        			<img src="<?php echo $item->get_youtube_thumbnail_url(); ?>" class="vid_thumb">
		        		</a>
		        		
		        		
		        		<div class="inner">
		        		
		        			<a href="<?php echo $item->get_youtube_player_url(); ?>" class="colorboxiframe item video launch">
		        			
		        				<h2><?php echo $item->get_title(); ?></h2>
		        				
		        			</a>	
		        						            			            
		        			<div class="excerpt">
		        						                    
		        				<?php echo $item->get_description(); ?>
		        		
		        			</div>
		        			
		        		</div>	
		        	
		        	</div>
		        	
		        <?php endforeach; ?>
		        
		        <?php
		        	// Let's do our paging controls
		        	$next = (int) $start + (int) $length;
		        	$prev = (int) $start - (int) $length;
		         
		        	// Create the NEXT link
		        	$nextlink = '<a href="?start=' . $next . '&length=' . $length . '">Older &raquo; </a>';
		        	if ($next > $max)
		        	{
		        		$nextlink = '';
		        	}
		         
		        	// Create the PREVIOUS link
		        	$prevlink = '<a href="?start=' . $prev . '&length=' . $length . '">&laquo; Newer</a>';
		        	if ($prev < 0 && (int) $start > 0)
		        	{
		        		$prevlink = '<a href="?start=0&length=' . $length . '">&laquo; Newer</a>';
		        	}
		        	else if ($prev < 0)
		        	{
		        		$prevlink = '';
		        	}
		         
		        	// Normalize the numbering for humans
		        	$begin = (int) $start + 1;
		        	$end = ($next > $max) ? $max : $next;
		        	?>

    		</div>
    		
    		<div class="pagination video">
    		
    			<span class="left"><?php echo $prevlink; ?></span> <span class="right"><?php echo $nextlink; ?></span>
    		
    		</div>
    
    <?php if(!$oswc_trending_hide) { ?>
    
    	<br class="clearer" />
    
    	<?php oswc_get_template_part('trending'); // show trending ?>
        
    <?php } ?>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>