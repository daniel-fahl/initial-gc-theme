<?php get_header(); //Template Name: Revelations Live ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=115436275164791";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content revlive clearfix">

    <div class="page-content">
        
        <div class="content-panel">
        	
        	<div id="live_content">
        	
        		<div class="grid_7">
        	
        			<?php get_custom_field_2('embed1', TRUE) ?>
        			
        		</div>
        		
        		<div class="grid_5 rev-chat">
        		
        			<div class="fb-comments" data-href="http://gamechurch.com/revelationslive" data-width="375" data-num-posts="50"></div>
        			        			
        		</div>	
        	
        	</div>
            
        </div>      
        
    </div>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>