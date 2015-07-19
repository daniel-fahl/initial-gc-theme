<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'Community',
		array(
			'labels' => array(
				'name' => __( 'Community' ),
				'singular_name' => __( 'Community Post' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'community'),
			'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail' ), // 'custom-fields'
		)
	);
	register_post_type( 'staff',
		array(
			'labels' => array(
				'name' => __( 'Staff' ),
				'singular_name' => __( 'Staff Member' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'staff'),
			'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail' ), // 'custom-fields'
			
		)
	);
	register_post_type( 'Shows',
		array(
			'labels' => array(
				'name' => __( 'Shows' ),
				'singular_name' => __( 'Show' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'shows'),
			'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'custom-fields' ), // 
		)
	);
	register_post_type( 'Slider',
		array(
			'labels' => array(
				'name' => __( 'Slider' ),
				'singular_name' => __( 'Slider Post' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'slider'),
			'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail', 'custom-fields' ), // 
		)
	);
}

?>