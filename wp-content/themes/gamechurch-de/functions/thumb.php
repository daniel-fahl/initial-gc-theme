<?php 

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'funder') );
set_post_thumbnail_size( 800, 800, true ); // Normal post thumbnails
add_image_size( 'single-thumb', 1200, 800, true ); // Permalink thumbnail size
add_image_size( 'staff-thumb', 800, 800, true ); // Permalink thumbnail size
add_image_size( 'mini-thumb', 100, 100, true ); // Permalink thumbnail size
add_image_size( 'fund-thumb', 400, 400, true ); // Permalink thumbnail size
}

 ?>