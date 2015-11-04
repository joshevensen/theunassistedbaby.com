<?php
/**
 * Admin functions
 *
 * Manage main menu
 * Manage listing screens
 * Manage editor metaboxes
 *
 * @package tub
 */

/*
 * Manage main menu items
 */

// Remove unnecessary menu items
add_action( 'admin_menu', 'tub_remove_menu_items' );

function tub_remove_menu_items() {
  remove_menu_page('edit-comments.php');
}



/*
 * Manage listing screens
 */

// Remove unnecessary columns from post listings
add_action( 'manage_edit-post_columns', 'tub_remove_posts_listings' );

function tub_remove_posts_listings( $columns ) {
  unset( $columns['comments'] );
  unset( $columns['wpseo-metadesc'] );
  unset( $columns['wpseo-focuskw'] );
  return $columns;
}

// Remove unnecessary columns from page listings
add_action( 'manage_edit-page_columns', 'tub_remove_pages_listings' );

function tub_remove_pages_listings( $columns ) {
  unset( $columns['comments'] );
  unset( $columns['wpseo-metadesc'] );
  unset( $columns['wpseo-focuskw'] );
  return $columns;
}





/*
 * Manage editor metaboxes
 */

// Remove unnecessary metaboxes from post and page editor screens
add_action( 'admin_menu', 'tub_remove_metabox' );

function tub_remove_metabox() {
  //posts
  remove_meta_box( 'commentstatusdiv', 'post', 'side' );
  remove_meta_box( 'commentsdiv', 'post', 'side' );

  //pages
  remove_meta_box( 'commentstatusdiv', 'page', 'side' );
  remove_meta_box( 'commentsdiv', 'page', 'side' );
}