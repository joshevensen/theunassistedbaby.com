<?php
/**
 * Custom Article Page Type
 *
 * @package tub
 */

/*
 * Register an article post type.
 */
add_action( 'init', 'tub_articles_init' );

function tub_articles_init() {
	$labels = array(
		'name'               => _x( 'Articles', 'post type general name', 'tub' ),
		'singular_name'      => _x( 'Article', 'post type singular name', 'tub' ),
		'menu_name'          => _x( 'Articles', 'admin menu', 'tub' ),
		'name_admin_bar'     => _x( 'Article', 'add new on admin bar', 'tub' ),
		'add_new'            => _x( 'Add New', 'article', 'tub' ),
		'add_new_item'       => __( 'Add New Article', 'tub' ),
		'new_item'           => __( 'New Article', 'tub' ),
		'edit_item'          => __( 'Edit Article', 'tub' ),
		'view_item'          => __( 'View Article', 'tub' ),
		'all_items'          => __( 'All Articles', 'tub' ),
		'search_items'       => __( 'Search Articles', 'tub' ),
		'parent_item_colon'  => __( 'Parent Articles:', 'tub' ),
		'not_found'          => __( 'No articles found.', 'tub' ),
		'not_found_in_trash' => __( 'No articles found in Trash.', 'tub' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'article' ),
		'capability_type'    => 'page',
		'hierarchical'       => true,
		'menu_position'      => 20,
		'menu_icon' 		 => 'dashicons-format-aside',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' )
	);

	register_post_type( 'article', $args );
}


/**
 * Change Title Placeholder Text
 */
function tub_change_article_title( $title ){

  $screen = get_current_screen();

  if ( 'article' == $screen->post_type ){
    $title = 'Enter menu label here';
  }

  return $title;
}

add_filter( 'enter_title_here', 'tub_change_article_title' );





/**
 * Add a page title meta box
 */
// Add box
function tub_article_add_title(){
  add_meta_box(
    'article_title_meta',
    __('Page Title'),
    'tub_article_title_content',
    'article',
    'normal',
    'high'
  );
}
add_action("add_meta_boxes", "tub_article_add_title");


// Print box content
function tub_article_title_content( $post ){
  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'tub_article_meta_box', 'tub_article_meta_box_nonce' );

  $article_title = get_post_meta( $post->ID, 'tub_article_title', true );
  echo '<input type="text" name="tub_article_title" value="' . esc_attr( $article_title ) . '" style="width: 100%;margin-top: 6px;" placeholder="Enter title here" />';
}





/**
 * Save Data
 */
function tub_article_title_save( $post_id ) {

  /*
   * We need to verify this came from our screen and with proper authorization,
   * because the save_post action can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['tub_article_meta_box_nonce'] ) ) {
    return;
  }

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $_POST['tub_article_meta_box_nonce'], 'tub_article_meta_box' ) ) {
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
  if ( isset( $_POST['tub_article_title'] ) ) {
    $tub_article_title_data = sanitize_text_field( $_POST['tub_article_title'] );

    update_post_meta( $post_id, 'tub_article_title', $tub_article_title_data );
  }

  return;
}
add_action( 'save_post', 'tub_article_title_save' );
