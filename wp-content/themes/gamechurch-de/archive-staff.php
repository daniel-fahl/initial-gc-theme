<?php get_header(); ?>

	<h1 class="pagetitle">Gamechurch Staff</h1>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'staff-thumb' );
			$url = $thumb['0'];
		?>
			
			<div class="clearfix">
				<div class="col-lg-3 staff-thumb" style="background-image: url(<?=$url?>);"></div>
				
				<div class="staff-bio col-lg-9 clearfix">
						
					<h2><?php the_title(); ?></h2>
					<p class="lead"><?php the_content(); ?></p>
							
				</div>
			</div>
			
	<?php endwhile; endif; ?>

<?php get_footer(); ?>