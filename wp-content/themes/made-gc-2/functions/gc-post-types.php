<?php

$labels = array( 
	'name' => __( 'Merch' ),
	'singular_name' => __( 'Merch' ),
	'add_new' => _x('Add New', 'Merch Item'),
	'add_new_item' => __('Add New Merch Item'),
	'edit_item' => 'Edit Merch Item',
	'new_item' => 'New Merch Item',
	'view_item' => 'View Merch Item',
	'search_items' => 'Search Merch Item',
	'not_found' => 'No Merch Items found',
	'not_found_in_trash' => 'No Merch Items found in Trash',
	'parent_item_colon' => ''
);
$post_type_array = array(
	'labels' => $labels,
	'singular_label' => __( 'Merch' ),
	'public' => true,
	'query_var' => true,
	'supports' => array( 'title', 'excerpt', 'thumbnail', 'comments', 'author' ), // 'custom-fields'
	'taxonomies' => array( 'category' ),
	'rewrite' => array( 'slug' => 'store', 'with_front' => false ),
	'menu_position' => 6
);

sd_register_post_type( 'merch', $post_type_array, 'merch' );

$labels = array( 
	'name' => __( 'Community' ),
	'singular_name' => __( 'Community' ),
	'parent_item_colon' => ''
);
$post_type_array = array(
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'supports' => array( 'title', 'excerpt', 'thumbnail', 'editor', 'comments', 'author' ), // 'custom-fields'
	'taxonomies' => array( 'category' ),
	'rewrite' => array( 'slug' => 'community', 'with_front' => false ),
	'menu_position' => 6
);

sd_register_post_type( 'community', $post_type_array, 'community' );

?>
