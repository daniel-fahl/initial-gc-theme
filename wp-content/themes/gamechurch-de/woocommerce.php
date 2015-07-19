<?php get_header(); ?>

<div id="feature" class="page" data-stellar-background-ratio="0.5" style="background-image:  url(<?php bloginfo('template_url'); ?>/img/store-bg.jpg);">
	<div class="dots"></div>
	<div class="tri" data-stellar-background-ratio="0.75"></div>
	
	<div class="col-lg-10 transition float-block <?php if ( get_post_meta($post->ID, 'dark_text', true) != '' ) { echo "dark"; } ?> ">
	
		<h1 class="transition">The Gamechurch Store</h1>
	
	</div>
	
</div>

<div class="store container">

	<div class="page-block clearfix col-lg-12">
					
		<?php woocommerce_content(); ?>
	
	</div>

</div>
				
<?php get_footer(); ?>