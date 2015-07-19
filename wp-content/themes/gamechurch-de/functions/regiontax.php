<?php

/**
 * Shortcut function for assigning Labels to a custom taxonomy
 * 
 * @param string $term
 * @param string $plural If not specified, "s" is added to the end of $term
 * @return array Labels for use by the custom taxonomy
 * 
 */
function gamechurch_region_tax( $str = '', $plural = '' ) {
    $p = strlen( $plural ) ? $plural : $str . 's';

    return array( 
        'name'              => _x( $p, 'taxonomy general name' ),
        'singular_name'     => _x( $str, 'taxonomy singular name' ),
        'search_items'      => __( 'Search ' . $p ),
        'all_items'         => __( 'All ' . $p ),
        'parent_item'       => __( 'Parent ' . $str ),
        'parent_item_colon' => __( 'Parent ' . $str . ':' ),
        'edit_item'         => __( 'Edit ' . $str ),
        'update_item'       => __( 'Update ' . $str ),
        'add_new_item'      => __( 'Add New ' . $str ),
        'new_item_name'     => __( 'New ' . $str . ' Name' ),
        'menu_name'         => __( $p ),
    );
}

$post_types = get_post_types( array( 'exclude_from_search' => false, '_builtin' => false ) );

$defaults = array(
    'hierarchical'      => true,
    'public'            => true,
    'show_ui'           => true,
    '_builtin'          => true,
    'show_in_nav_menus' => false,
    'query_var'         => true,
    'rewrite'           => false
);

register_taxonomy( 'region', $post_types, wp_parse_args( array(
    'labels' => emusic_tax_inflection( 'Region' )
), $defaults ) );

?>