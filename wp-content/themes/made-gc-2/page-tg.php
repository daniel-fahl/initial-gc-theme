<?php
// Template Name: ThanksGaming
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>ThanksGaming // The Nerdy Helping the Needy</title>
	
	<?php
		// Enqueue
		wp_enqueue_script("jquery");
		wp_enqueue_script( 'tg_scripts', get_bloginfo('template_url') . '/thanksgaming/js/tg_scripts.js');
		wp_enqueue_script( 'tg_countdown', get_bloginfo('template_url') . '/thanksgaming/js/tg_countdown.js');		
		// stylesheet
		wp_enqueue_style( 'tg_style', get_bloginfo('template_url') . '/thanksgaming/tg_style.css');								
	?>	
	
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:700|Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
			
	<?php wp_head(); ?>
	
	
			
</head>

<body>

<div id="header_wrap" class="clearfix">

	<div id="header" class="clearfix">
	
		<div id="main_video" class="floatleft clearfix">
		
			<a href="#" id="about">What is Thanksgaming?</a>
					
				<?php /*
				<object type="application/x-shockwave-flash" height="307" width="512" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=gamechurch" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=www.twitch.tv&channel=gamechurch&auto_play=true&start_volume=25" /></object>
				*/ ?>
				
				<div id="counter_wrap"></div>
			
		
			<a href="#" id="donate_big"><img src="<?php bloginfo('template_url'); ?>/thanksgaming/img/donate_button_big.png"></a>
		
		</div>
		
		<div id="donate_block" class="slide_block">
		
			<a href="#" id="close-it"></a>
			
			<div class="inner">
			
			<h2>You are Super Awesome!</h2>
			
			Please select the amount you would like to donate:
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="SCKSSNF46PH34">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" value="$10" alt="PayPal - The safer, easier way to pay online!">
			</form>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="HDMC64EQMXN9U">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" value="$25" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="G59DZWQPZC25S">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" value="$50" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="WZ6EL4Z4J95ZN">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" value="$75" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="54D35846C6MRC">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" value="$100" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="NB2VQ5TDAKUPN">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" value="$200" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="PGQZJ9KZKLX7G">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" value="$350" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="2RUE7GRRDSNBQ">
			<input type="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" value="$500" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			
			<br>
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="CSJCX6Z9DM35Q">
			<input type="submit" class="otheramount" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" value="Other Amount" alt="PayPal - The safer, easier way to pay online!">
			</form>
			
			
			</div>
		
		</div>
		
		<div id="about_block" class="slide_block">
		
			<a href="#" id="close-it"></a>
			
			<div class="inner">
			
			<h2>The Nerdy Helping the Needy.</h2>
			
			ThanksGaming is a fundraising event that is aimed at providing food for needy families through the medium of Video Gaming and web-broadcasting. Over 49 million Americans face hunger every day, and through ThanksGaming, we would like to provide as many families as we can with a warm, nutritious meal this Thanksgiving. We ask that you would please consider aiding us with this effort by making a donation of any amount. With your help, we can effectively benefit more needy families.
			
			</div>
					
		</div>
		
		<div id="logo" class="floatright clearfix">
		
			<a class="spon_logo verizon" href="http://www22.verizon.com/home/aboutfios/"><img src="<?php bloginfo('template_url'); ?>/thanksgaming/img/fios.png"></a>
			<a class="spon_logo gc" href="http://gamechurch.com"><img src="<?php bloginfo('template_url'); ?>/thanksgaming/img/gamechurch.png"></a>
			<a class="spon_logo armory" href="http://armoryventura.com"><img src="<?php bloginfo('template_url'); ?>/thanksgaming/img/armory.png"></a>
		
			<img src="<?php bloginfo('template_url'); ?>/thanksgaming/img/logo.png">
		
		</div>
				
		<div class="big_shadow"></div>
	
	</div>

</div>

<div id="main_wrapper">

	<div class="thankyoumessage">
	
		<h1>You helped us raise over $1,000 and give over 120 people a hearty meal this thanksgiving.  From all of us here at ThanksGaming, thank you.  Stay tuned for ThanksGaming 2! </h1>
	
	</div>

	<div id="social_buttons">
	

	
		<div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		
		<div>
			<script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><style> html .fb_share_link { padding:2px 0 0 20px; height:16px; background:url(http://static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat top left; }</style><a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" onclick="return fbs_click()" target="_blank" class="fb_share_link">Share</a>
		</div>
		
		<div>
		
			<script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script>
		
		</div>
		
		<div>
		
			<!-- Place this tag where you want the +1 button to render. -->
			<div class="g-plusone" data-size="tall" data-annotation="none"></div>
			
			<!-- Place this tag after the last +1 button tag. -->
			<script type="text/javascript">
			  (function() {
			    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			    po.src = 'https://apis.google.com/js/plusone.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		
		</div>
		
	</div>	

	<a href="http://www22.verizon.com/home/aboutfios/"><img src="http://gamechurch.com/wp-content/uploads/2012/11/acq_fios_3x_EP_SpeedTiers_8499_standard_728x90_102112.jpg"></a>

	<div id="main" class="clearfix">
	
		<div id="chat" class="left">
		
			<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=gamechurch&amp;popout_chat=true" height="416" width="512"></iframe>
		
		</div>

		<div id="twitter" class="right">
		
			<a class="twitter-timeline" data-dnt=true href="https://twitter.com/search?q=%23TG12" data-widget-id="256132124300681217">Tweets about "#TG12"</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			
		
		</div>
		
	</div>
	
	<div id="main" class="clearfix">
	
		<!-- Begin MailChimp Signup Form -->
		<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
			   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup">
		<form action="http://gamechurch.us2.list-manage2.com/subscribe/post?u=146f056be682f9f73aa7da93e&amp;id=25519663e7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<label for="mce-EMAIL">Get Updates on Future Events!</label>
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
			<p>Note: If you've already received an email from us about ThanksGaming, you don't need to sign up.</p>
			<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		</form>
		</div>
		
		<!--End mc_embed_signup-->
	
	</div>	

</div>

</body>