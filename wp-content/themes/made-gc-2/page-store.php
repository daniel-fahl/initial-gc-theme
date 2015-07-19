<?php
//Template Name: Store
?>

<?php get_header(); // show header ?>

<div class="store">

<div class="hide-responsive"><?php oswc_get_template_part('sharebox'); // show the sharebox ?></div>  

<div class="main-content-left">

    <div class="page-content">
        
        <div class="content-panel">
        
        	<div class="post-loop">
        
				<?php
			
				// The Query
				$the_query = new WP_Query( array('post_type' => 'merch', 'showposts' => 999));
			
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post();
				
				?>
	
				<div class="post-panel">
				    
				    
				    <div class="article-image">
				        <?php if ( has_post_thumbnail()) { //only show the featured image
				            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				            echo '<a class="darken" href="' . $large_image_url[0] . '">';
				            the_post_thumbnail('spotlight');
				            echo '</a>';
				        } ?>
				    </div>
				    
				    <div class="article-image responsive-large">
				        <?php if ( has_post_thumbnail()) { //only show the featured image
				            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				            echo '<a class="darken" href="' . $large_image_url[0] . '">';
				            the_post_thumbnail('spotlight');
				            echo '</a>';
				        } ?>
				    </div>
				    
				    <div class="article-image responsive">
				        <?php if ( has_post_thumbnail()) { //only show the featured image
				            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				            echo '<a class="darken" href="' . $large_image_url[0] . '">';
				            the_post_thumbnail('spotlight');
				            echo '</a>';
				        } ?>
				    </div>
				    
				    <br class="clearer" />
				
				        
				        <div class="inner">
				                                   
				            <h2><?php the_title(); ?> <span class="price"><?php get_custom_field_2('merch_price', TRUE) ?></span></h2>
				            			            
				                <div class="excerpt">
				                    
				                    <?php oswc_standard_excerpt(); ?>

				                </div>
				                
				                <?php get_custom_field_2('paypal_code', TRUE) ?>
				                
				      
				        </div>
				        
					</div>        
	
				<?php endwhile;	wp_reset_postdata(); ?>   	
				
				<br class="clearer" />
			
			</div>
            
        </div>      
        
    </div>
    
    
<br class="clearer" />
    
        

</div>

<div class="sidebar">

	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar) ) : else : ?>
	
		<div class="widget-wrapper">
	    
	    	<div class="widget">
	
	            <div class="section-wrapper"><div class="section">
	            
	                <?php _e('Cart', 'made' ); ?>
	            
	            </div></div> 
	            
	            <div class="textwidget">  
	                                          
	            	<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            	<input type="hidden" name="cmd" value="_s-xclick">
	            	<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
	            	">
	            	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	            	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	            	</form>
	            	
	                
	            </div>
	                        
	        </div>
	    
	    </div>
    
        <div class="widget-wrapper">
        
        	<div class="widget">
    
                <div class="section-wrapper"><div class="section">
                
                    <?php _e(' Why We Sell Stuff ', 'made' ); ?>
                
                </div></div> 
                
                <div class="textwidget">  
                                              
                	<p><?php _e( 'Our revenue from online sales goes directly toward printing "Jesus for the Win!" gamer bibles and participating in tradeshows', 'made' ); ?></p>
                	
                	<p>If you would like to donate directly to Gamechurch, please visit our <a href="<?php echo site_url('/donate/'); ?>">donation page</a>.</p>
                    
                </div>
                            
            </div>
        
        </div>
        
        <div class="widget-wrapper">
            
            	<div class="widget">
        
                    <div class="section-wrapper"><div class="section">
                    
                        <?php _e(' Free Shipping in the US! ', 'made' ); ?>
                    
                    </div></div> 
                    
                    <div class="textwidget">  
                                                  
                    	<p><?php _e( 'All our store items ship free to anywhere in the United Stats (inc. AK & HI)  For international orders please email <a href="mailto:cory@gamechurch.com">cory@gamechurch.com</a>', 'made' ); ?></p>
                    	
                        
                    </div>
                                
                </div>
            
            </div>
    
    <?php endif; ?>

</div>

</div>

<br class="clearer" />

<?php get_footer(); // show footer ?>