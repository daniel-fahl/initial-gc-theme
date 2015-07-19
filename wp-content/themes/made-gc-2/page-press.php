<?php
//Template Name: Press
?>

<?php get_header(); // show header ?>

<div class="store">

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<h1 class="press-page-title">GAMECHURCH PRESS HUB</h1>

<div class="main-content-left">

    <div class="page-content">
    
    	
    		<div class="post-loop">
    		
    			<div class="press-item clearfix">
    			
    				<h2>About Gamechurch</h2>
    				
    				<div class="press-inner about">
    				
    					<p>GameChurch was birthed through a chance meeting with the directors of xxxchurch.com at a conference in Portland, Oregon. After spending 1 year researching the video game industry and assorted trade shows and expos, the leadership of GameChurch found something missing. “We wanted to bring a simple message of hope to the culture of gaming”, states Mikee Bridges, founder and Director of GameChurch. “We are all gamers and want to bring this message to our own world of nerd culture.”<span class="dots">...</span></p>
    					
    					<div class="expand_block">
    					<p>Borrowing the model of xxxchurch.com GameChurch has set out to spread their message in a new way. In 2012 GameChurch attended 8 gaming conventions across the United States. At each convention GameChurch hosts a booth replete with irreverent and controversial graphics to stir in attendees the one question GameChurch loves to answer. “What are you doing?”.  To that question the answer is, “We are here to tell you Jesus loves you….and please take some free stuff”.</p>
    					 
    					<p>As one walks up to the GameChurch booth, they are first met with a large 8 foot tall picture of Jesus with a headset on and a game controller in his hand and t-shirts with the phrase “Jesus loves gamers” on them. The GameChurch booth is filled with free swag that you find at any trade show such as stickers, t-shirts, buttons and lanyards. To set them apart, GameChurch added their own gamer Bible to the swag list. “The Bible is the Gospel of John with commentaries from gaming culture in it”, says Bridges. To date GameChurch has given out more than 35,000 of these Bibles. </p>
    					<p>The GameChurch.com online experience is a community of gamers engaged in forum discussions about gaming and other topics. Also on the website are articles about depth of story in and around gaming. There are also industry interviews and other video related material. Not a website for Christian gamers, GameChurch is a website for everyone looking for a different perspective of gaming and to ask any question about the culture of gaming, religion, gaming addiction or story. </p>
    					
    					<p>GameChurch is set to attend 12 gaming conventions in 2013 with more on the horizon in 2014. “We have found that the reception of what we are doing is mostly favorable”, says Bridges, “We have a very simple message minus the religious and shame based overtones one might find elsewhere in culture. It is our desire to bring that message of hope to anyone and everyone from all walks of life without judgment”. </p>
    					
    					<p>Catch GameChurch at any one of many trade shows this year. Pick up your free shirt, gamer Bible or who knows, they are famous for giving out free beer.</p>
    					
    					</div>
    				
    				</div>
    				
    				<a href="#" class="press-expand button">Read More</a>
    			
    			</div>
    			
    			<?php /*
        
		        <div class="press-item">
		             
					<h2>
					
						Gamechurch Press Releases
						
					</h2>
					
					<div class="press-inner">	
		        
						<?php
					
						// The Query
						$the_query = new WP_Query( array('post_type' => 'press'));
					
						// The Loop
						while ( $the_query->have_posts() ) : $the_query->the_post();
						
						?>
			
						<div class="press-post">
						    
							<div class="press-date">
							
								<?php the_date('m/d/Y'); ?>
							
							</div>
							
							<div class="press-title">
							
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
								
							</div>					   				
						      				        
						</div>        
			
						<?php endwhile;	wp_reset_postdata(); ?>   	
			
						<br class="clearer" />
								
					</div>			
								
				</div>
				
				*/ ?>
				
				<div class="press-item">
					    
					<h2>
					
						Gamechurch In the Media          
						
					</h2>
					
					<div class="press-inner">	
			    
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
			
							<?php the_content(); ?>        
			
						<?php endwhile;	endif; ?>   	
			
						<br class="clearer" />
								
					</div>			
								
				</div>
				
				<div class="press-item">
						    
					<h2>
					
						Gamechurch Staff          
						
					</h2>
					
					<div class="press-inner">	
			    
						<div id="mikeebridges" class="staff">
						
						
							<h4>Mikee Bridges</h4>
							<h3>Founder & Director</h3>
							
							<img src="<?php bloginfo('template_url'); ?>/images/biopics/mikee.jpg" class="left">
							
							
							<p>
							Husband and father of 4 kids, Mikee Bridges has been in self-described “dirty” ministry since his first music club in 1989. He went on to create 3 more clubs during his 14 years in Portland, Oregon. During that time he also created “The Push”, his longest running and most well-known club. From that was birthed a great many bands and “Tom Festival” a 150 band, 4 day music festival that ran for 14 years in 4 different states. Mikee was also creator and front man for the bands “Sometime Sunday” on Tooth and Nail records and “Tragedy Ann” on Organic/ Pamplin Records. Upon moving back to his hometown of Ventura in Southern California, Mikee created “Alpine”, a 25,000 square foot entertainment facility including a music venue, skate park, café and video gaming facility. Epic Ministries, of which Mikee was a board member and CEO, took over the facility and Mikee created “The Armory” and “GameChurch”. “The Armory” is a 3,000 square foot gaming facility and “GameChurch” is both a mission to the gaming trade show circuit and an online community experience. Mikee also travels overseas for leadership development and evangelism. 
							</p>
						
						</div>
						
						<div id="brianbuffon" class="staff">
						
							<h4>Brian Buffon</h4>
							<h3>Director of Media</h3>
							
							<img src="<?php bloginfo('template_url'); ?>/images/biopics/brian.jpg" class="left">
							
							<p>
							Stay back ladies! Brian is newly and happily married.  He doesn't have any kids but is currently thinking about maybe getting a dog someday.  Born and raised in sunny Southern California, he lives with his wife in the L.A. suburb of Oxnard.  Over the past six years, Brian has played the role of "creative lackey" to Gamechurch founder Mikee Bridges in various ministerial ventures.  He has a B.A. in film and video production from Brooks Institute of Photography in Santa Barbara, CA. Fun fact:  Brian is deathly afraid of balloons.  That's seriously a thing.  More seriously, Brian is responsible for maintaining the visual brand identity of Gamechurch across print, web, video, and other mediums.
							</p>
						
						</div>
						
						<div id="drewdixon" class="staff">
						
							<h4>Drew Dixon</h4>
							<h3>Editor in Chief</h3>
							
							<img src="<?php bloginfo('template_url'); ?>/images/biopics/drew.jpg" class="left">
							
							<p>
							Drew Dixon is editor-in-chief of Game Church. Drew grew up playing videogames and has maintained a longstanding love/hate relationship with him which has resulted in regularly writing about both the potential and failures of videogames for various websites. He edits for Christ and Pop Culture and writes about videogames for Paste Magazine, Relevant Magazine, Bit Creature, and Think Christian. He has a wonderful wife and daughter, serves as the Family Pastor of a church he helped plant in Northeast Alabama, and coaches high school soccer. Follow him on Twitter @drewdixon82
							</p>
						
						</div>
						
						<div id="richclark" class="staff">
						
							<h4>Richard Clark</h4>
							<h3>Co-editor in Chief</h3>
							
							<img src="<?php bloginfo('template_url'); ?>/images/biopics/rich.jpg" class="left">
							
							<p>
							Richard Clark is the managing editor of Game Church. He is also the editor-in-chief of Christ and Pop Culture and writes regularly for Unwinnable, Bit Creature, Paste Magazine and other outlets. He lives in Louisville, KY, where he works as a campus technology manager. He uses pomade and wears cardigans. He likes to eat at delicious restaurants. He obsesses over pop songs and is not quite obsessed with Drake, okay he is totally obsessed with Drake. Follow him on twitter for plenty of references to cardigans and Drake: @deadyetliving.
							</p>
						
						</div>
														
					</div>			
								
				</div>
				
			
		</div>		    
        
	</div>        

</div>

<div class="sidebar">

	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else : ?>
	
		<div class="widget-wrapper">
	    
	    	<div class="widget">
	
	            <div class="section-wrapper"><div class="section">
	            
	                <?php _e('Contact Info', 'made' ); ?>
	            
	            </div></div> 
	            
	            <div class="textwidget">
	            
	            	<h4><a href="mailto:info@gamechurch.com">info@gamechurch.com</a></h4>  
	                                          
	            	1496 Tower Square<br>
	            	Ventura, CA 93003	            	
	                
	            </div>
	                        
	        </div>
	    
	    </div>
    
        <div class="widget-wrapper">
        
        	<div class="widget">
    
                <div class="section-wrapper"><div class="section">
                
                    <?php _e('EPK & Promo Materials', 'made' ); ?>
                
                </div></div> 
                
                <div class="textwidget">  
                                              
                	<a href="http://gamechurch.com/wp-content/downloads/GC-2013-EPK.zip">Press Kit</a><br>
                	<a href="http://gamechurch.com/wp-content/downloads/GC-LOGO-PACK.zip">Gamechurch Logos</a>
                    
                </div>
                            
            </div>
        
        </div>
        
        <div class="widget-wrapper">
            
        	<div class="widget">
    
                <div class="section-wrapper"><div class="section">
                
                    <?php _e('Staff', 'made' ); ?>
                
                </div></div> 
                
                <div class="textwidget">  
                                              
                	<ul class="stafflinks">
                	
                		<li><a href="#mikeebridges">Mikee Bridges / Founder & Director</a></li>
                		<li><a href="#brianbuffon">Brian Buffon / Director of Media</a></li>
                		<li><a href="#drewdixon">Drew Dixon / Editor in Chief</a></li>
                		<li><a href="#richclark">Richard Clark / Co-editor in Chief</a></li>
                		
                	</ul>
                    
                </div>
                            
            </div>
            
            </div>
    
    <?php endif; ?>

</div>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>