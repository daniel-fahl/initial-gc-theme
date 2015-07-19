<?php get_header(); //Template Name: Ministry ?>

<div id="submenu">

	<?php wp_nav_menu(array('theme_location' => 'ministry', 'menu_class' => 'strip' )) ?>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="feature">
	<div <?php post_class('container ministry-wrap'); ?>>
		<h1 class="mont text-center"><span class="hex-icon"><span class="hex-inner"></span></span><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; endif; ?>				

<div class="bottom-menu">
    <ul class="strip">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '' )) ?>
    </ul>
</div>
<?php get_footer(); ?>