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

//Template Name: Woocommerce
?>

<?php get_header(); // show header ?>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div> 

<div class="store-title clearfix">

	<h1>THE GAMECHURCH STORE</h1>
	
	<ul class="shop_actions clearfix">
	
		<li><a class="gc-cart-3 button" href="<?php echo site_url('/cart/'); ?>">Cart</a></li>
		<li><a class="gc-credit button" href="<?php echo site_url('/checkout/'); ?>">Checkout</a></li>
		
	</ul>
	
</div>
 

<div class="main-content">

    <div class="page-content">
        
        <div class="content-panel">
        
        	<?php woocommerce_content(); ?>
        	            
        </div>      
        
    </div>
    
    <?php if(!$oswc_trending_hide) { ?>
    
    	<br class="clearer" />
    
    	<?php oswc_get_template_part('trending'); // show trending ?>
        
    <?php } ?>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>