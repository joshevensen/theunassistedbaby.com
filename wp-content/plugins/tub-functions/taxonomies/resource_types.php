<?php
/**
 * Resource Type Taxonomy
 *
 * @package tub
 */

add_action( 'init', 'tub_resource_type_taxonomies', 0 );

function tub_resource_type_taxonomies() {
	$labels = array(
		'name'              => _x( 'Resource Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Resource Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Resource Types' ),
		'all_items'         => __( 'All Resource Types' ),
		'parent_item'       => __( 'Parent Resource Type' ),
		'parent_item_colon' => __( 'Parent Resource Type:' ),
		'edit_item'         => __( 'Edit Resource Type' ),
		'update_item'       => __( 'Update Resource Type' ),
		'add_new_item'      => __( 'Add New Resource Type' ),
		'new_item_name'     => __( 'New Resource Type Name' ),
		'menu_name'         => __( 'Resource Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'resource_type' ),
	);

	register_taxonomy( 'resource_type', array( 'resource' ), $args );
}
?>