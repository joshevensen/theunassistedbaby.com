<?php
/**
 * Custom Resource Post Type
 *
 * @package tub
 */

/*
 * Register an article post type.
 */
add_action( 'init', 'tub_resources_init' );

function tub_resources_init() {
	$labels = array(
		'name'               => _x( 'Resources', 'post type general name', 'tub' ),
		'singular_name'      => _x( 'Resource', 'post type singular name', 'tub' ),
		'menu_name'          => _x( 'Resources', 'admin menu', 'tub' ),
		'name_admin_bar'     => _x( 'Resource', 'add new on admin bar', 'tub' ),
		'add_new'            => _x( 'Add New', 'resource', 'tub' ),
		'add_new_item'       => __( 'Add New Resource', 'tub' ),
		'new_item'           => __( 'New Resource', 'tub' ),
		'edit_item'          => __( 'Edit Resource', 'tub' ),
		'view_item'          => __( 'View Resource', 'tub' ),
		'all_items'          => __( 'All Resources', 'tub' ),
		'search_items'       => __( 'Search Resources', 'tub' ),
		'parent_item_colon'  => __( 'Parent Resources:', 'tub' ),
		'not_found'          => __( 'No resources found.', 'tub' ),
		'not_found_in_trash' => __( 'No resources found in Trash.', 'tub' )
	);

	$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_nav_menus'  => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'resource' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'menu_icon'          => 'dashicons-format-aside',
    'supports'           => array( 'title', 'thumbnail', 'excerpt', 'revisions' )
	);

	register_post_type( 'resource', $args );
}





/**
 * Add a page title meta box
 */
// Add box
function tub_resource_add_link(){
  add_meta_box(
    'resource_link_meta',
    __('Resource Links'),
    'tub_resource_link_content',
    'resource',
    'normal',
    'low'
  );
}
add_action("add_meta_boxes", "tub_resource_add_link");


// Print box content
function tub_resource_link_content( $post ){
  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'tub_resource_meta_box', 'tub_resource_meta_box_nonce' );

  $resource_buy_link = get_post_meta( $post->ID, 'tub_resource_buy_link', true );
  echo '<label for="tub_resource_buy_link" style="display: block; margin-top: 12px; font-size: 18px;">Buy Link</label>';
  echo '<input type="text" name="tub_resource_buy_link" id="tub_resource_buy_link" value="' . esc_attr( $resource_buy_link ) . '" style="width: 100%;margin-top: 5px;" placeholder="Enter link here" />';

  $resource_review_link = get_post_meta( $post->ID, 'tub_resource_review_link', true );
  echo '<label for="tub_resource_review_link" style="display: block; margin-top: 12px; font-size: 18px;">Review Link</label>';
  echo '<input type="text" name="tub_resource_review_link" id="tub_resource_review_link" value="' . esc_attr( $resource_review_link ) . '" style="width: 100%;margin-top: 5px;" placeholder="Enter link here" />';

  $resource_download_link = get_post_meta( $post->ID, 'tub_resource_download_link', true );
  echo '<label for="tub_resource_download_link" style="display: block; margin-top: 12px; font-size: 18px;">Download Link</label>';
  echo '<input type="text" name="tub_resource_download_link" id="tub_resource_download_link" value="' . esc_attr( $resource_download_link ) . '" style="width: 100%;margin-top: 5px;" placeholder="Enter link here" />';
}





/**
 * Save Data
 */
function tub_resource_link_save( $post_id ) {

  /*
   * We need to verify this came from our screen and with proper authorization,
   * because the save_post action can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['tub_resource_meta_box_nonce'] ) ) {
    return;
  }

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $_POST['tub_resource_meta_box_nonce'], 'tub_resource_meta_box' ) ) {
    return;
  }

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }

  // Check the user's permissions.
  if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
      return;
    }

  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }
  }

  /* OK, it's safe for us to save the data now. */

  // Save testimonial date data if the field isset
  if ( isset( $_POST['tub_resource_buy_link'] ) ) {
    $tub_resource_buy_link_data = sanitize_text_field( $_POST['tub_resource_buy_link'] );

    update_post_meta( $post_id, 'tub_resource_buy_link', $tub_resource_buy_link_data );
  }

  if ( isset( $_POST['tub_resource_review_link'] ) ) {
    $tub_resource_review_link_data = sanitize_text_field( $_POST['tub_resource_review_link'] );

    update_post_meta( $post_id, 'tub_resource_review_link', $tub_resource_review_link_data );
  }

  if ( isset( $_POST['tub_resource_download_link'] ) ) {
    $tub_resource_download_link_data = sanitize_text_field( $_POST['tub_resource_download_link'] );

    update_post_meta( $post_id, 'tub_resource_download_link', $tub_resource_download_link_data );
  }


  return;
}
add_action( 'save_post', 'tub_resource_link_save' );
