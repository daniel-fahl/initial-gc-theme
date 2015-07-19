<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
		$url = $thumb['0'];
	?>
	
	<div id="feature" data-stellar-background-ratio="0.5" style="background-image: url(<?=$url?>);">
		<div class="dots"></div>
		<div class="tri" data-stellar-background-ratio="0.75"></div>
		
		<div class="col-lg-10 transition float-block <?php if ( get_post_meta($post->ID, 'dark_text', true) != '' ) { echo "dark"; } ?> ">
		
			<h1 class="transition"><?php the_title(); ?></h1>
			<div class="author">Von <?php the_author_firstname(); ?> <?php the_author_lastname(); ?> / <?php the_date(); ?> </div>
		
		</div>
		
	</div>
	
	
	<div class="single-block col-lg-8">
				
		<?php the_content(); ?>
		
		<hr>

		<div class="row authbox">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 author-avatar">
				<? echo get_avatar( get_the_author_meta('user_email'), $size = '100'); ?>
			</div>
			<div class="col-lg-10">
			    <h4 class="mont">&Uuml;ber <?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></h4>
			    <p><?php the_author_meta('description'); ?></p>
			</div>
	    </p>

	</div>


		
<?php endwhile; endif; ?>

</div>
<div class="bottom-menu">
    <ul class="strip">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '' )) ?>
    </ul>
</div>
<div>
<?php get_footer(); ?>