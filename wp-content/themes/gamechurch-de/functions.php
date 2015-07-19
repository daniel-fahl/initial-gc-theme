<?php

// Include functions files
require_once(functions . '/thumb.php');
require_once(functions . '/post-types.php');
require_once(functions . '/theme-options.php');
require_once(functions . '/shortcodes.php');
require_once(functions . '/meta-boxes.php');

//Register Navigation Menus
register_nav_menus( array(
'primary' => __( 'Main Nav' ),
'ministry' => __( 'Ministry Nav' ),
'category' => __( 'Homepage Categories' ),
'footer-menu' => __( 'Footer Menü' )
) );


add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

function new_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Removes ul class from wp_nav_menu
function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Store Sidebar',
		'id'   => 'store-sidebar',
		'description'   => __( 'These widgets appear in the sidebar of only the front page (if you set this option in the theme options)'),
		'before_widget' => '<div class="widget-wrapper"><div class="widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="section-wrapper"><div class="section">',
		'after_title'   => '</div></div>'
	));
}

function get_custom_field($key, $echo = FALSE) {
	global $post;
	$custom_field = get_post_meta($post->ID, $key, true);
	if ($echo == FALSE) return $custom_field;
	echo $custom_field;
}

?>