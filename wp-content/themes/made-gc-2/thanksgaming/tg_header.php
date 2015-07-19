<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>ThanksGaming // The Nerdy Helping the Needy</title>
	
	<?php
		// Enqueue
		wp_enqueue_script("jquery");
		wp_enqueue_script( 'tg_scripts', get_bloginfo('template_url') . '/thanksgaming/js/scripts.js');		
		// stylesheet
		wp_enqueue_style( 'tg_style', get_bloginfo('template_url') . '/thanksgaming/tg_style.css');								
	?>	
			
	<?php wp_head(); ?>
			
</head>

<body>