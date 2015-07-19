<?php get_header(); ?>

<?php if ( is_search() ) : ?>	
	<h2 class="pagetitle mont caps text-center"><?php printf( __( 'Showing Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h2>	
<?php endif; ?>

<div id="load" class="post-wrapper">
					
	<div id="infinite" class="home clearfix">		
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<?php get_template_part( 'loop', 'index' ); ?>
		
		<?php endwhile; endif; ?>
		
		<div class="navigation">
		
			<?php next_posts_link( 'More' ); ?>
		
		</div>	
			
	</div>
							
</div>



<div class="bottom-menu">
    <ul class="strip">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '' )) ?>
    </ul>
</div>

<?php get_footer(); ?>