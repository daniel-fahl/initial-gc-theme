<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
	$url = $thumb['0'];
?>

	<div <?php post_class('p-block col-lg-4 col-md-6 col-sm-6 clearfix'); ?>>

		<a href="<?php the_permalink(); ?>" class="post transition">
		
			<div class="category">
				
				<?php if (is_sticky()) : ?> 
					Cover Story
				<?php else : ?> 
					<?php 
					$category = get_the_category(); 
					echo $category[0]->cat_name;
					?>
				<?php endif; ?>
				
			</div>
			
			<div class="image" style="background-image: url(<?=$url?>);">
				
				<div class="img-overlay transition"></div>
			</div>
			
			
			<div class="p-info transition" style="height: 180px;">
			
				<h1 class="transition"><?php the_title(); ?></h1>
				
				<?php the_excerpt(); ?>
				
				<?php if( in_category('feature') ) : ?>
				
					<div class="author">By <?php the_author_firstname(); ?> <?php the_author_lastname(); ?> </div>
				
				<?php endif; ?>
			
			</div>
		
		</a>
	
	</div>