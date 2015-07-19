<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
	$url = $thumb['0'];
?>

<div id="feature" class="page" data-stellar-background-ratio="0.5" style="background-image: url(<?=$url?>);">
	<div class="dots"></div>
	<div class="tri" data-stellar-background-ratio="0.75"></div>
	
	<div class="col-lg-10 transition float-block <?php if ( get_post_meta($post->ID, 'dark_text', true) != '' ) { echo "dark"; } ?> ">
	
		<h1 class="transition"><?php the_title(); ?></h1>
	
	</div>
	
</div>

<div class="container">
    <div class="page-block row">
	<!-- div class="page-block col-lg-12" -->
	
		<?php the_content(); ?>
	
	<!-- /div -->
    </div>
</div>
				
<?php endwhile; endif; ?>

<div class="bottom-menu">
    <ul class="strip">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '' )) ?>
    </ul>
</div>

<?php get_footer(); ?>