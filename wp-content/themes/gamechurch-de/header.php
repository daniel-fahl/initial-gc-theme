<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<title><?php wp_title( '&middot;', TRUE, 'right'); ?><?php bloginfo('name'); ?> &middot; <?php bloginfo('description'); ?></title>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php
	// Enqueue
		// scripts
		wp_enqueue_script('jquery'); 
		wp_enqueue_script( 'bootstrap', get_bloginfo('template_url') . '/js/bootstrap.min.js');
		wp_enqueue_script( 'stellar', get_bloginfo('template_url') . '/js/jquery.stellar.min.js');
		//wp_enqueue_script( 'easing', get_bloginfo('template_url') . '/js/jquery.easing.1.3.js');
		wp_enqueue_script( 'infinitescroll', get_bloginfo('template_url') . '/js/jquery.infinitescroll.min.js');
		wp_enqueue_script( 'masonry', get_bloginfo('template_url') . '/js/masonry.pkgd.min.js');
		wp_enqueue_script( 'isotope', get_bloginfo('template_url') . '/js/isotope.pkgd.min.js');
		// wp_enqueue_script( 'ajax', get_bloginfo('template_url') . '/js/ajax.js');
		wp_enqueue_script( 'scripts', get_bloginfo('template_url') . '/js/scripts.js');
		
		
		// stylesheet
		wp_enqueue_style('bootstrap', get_bloginfo('template_url') . '/css/bootstrap.min.css');
		wp_enqueue_style('icons', get_bloginfo('template_url') . '/fonts/icons.css');	
		wp_enqueue_style('stylesheet', get_bloginfo('stylesheet_url'));
			
	?>	
	
	<!-- Begin JavaScript -->
		 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target="#nav" <?php body_class() ?>>

<div id="maxwrap">
	
	<div id="header">
		
		<div class="container">
		
			<div class="logowrap">
		
				<a href="<?php echo site_url(); ?>" class="logo"></a>
				
				<a href="<?php echo site_url(); ?>" class="textlogo"></a>
			
			</div>
			
			<a href="#" class="nav-icon pull-right visible-sm"></a>
			
			<ul class="nav pull-right">
			
				<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '' )) ?>
				
								
			</ul>
			
		</div>	
											
		<div id="sitesearch">
			<div class="container">
				<?php get_search_form(); ?>
			</div>
		</div>	
		
	</div><!-- end header -->
	
	<div id="wrapper" class="clearfix">
	

		