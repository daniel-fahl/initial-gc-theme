<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div id="feature" class="page" data-stellar-background-ratio="0.5" style="background-image: url(<?php bloginfo('template_url'); ?>/img/ministrybg.jpg);">
	<div class="dots"></div>
	<div class="tri" data-stellar-background-ratio="0.75"></div>
	
	<div class="col-lg-10 transition float-block">
	
		<h1 class="transition"><?php the_title(); ?></h1>
	
	</div>
	
</div>

<div class="container">

	<div class="page-block">
	
		<div class="row clearfix">
	
			<div class="col-lg-4 fund-avatar">
			
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail('large'); ?>
				<?php endif; ?>
			
				
			
			</div>
			
			<div class="col-lg-8">
		
				<?php wdf_fundraiser_panel(); ?>
		
			</div>
		
		</div>
		
		<div class="spacer"></div>
		
		<div class="clearfix">
		
			<?php the_content(); ?>
		
		</div>
	
		
		
	
	</div>

</div>
				
<?php endwhile; endif; ?>


<?php get_footer(); ?>