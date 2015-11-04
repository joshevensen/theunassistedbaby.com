<?php
/**
 * Child Menu Shortcode
 *
 * @package tub
 */

function tub_childmenu( $atts ) {
	$page_id = get_the_ID();

	$childmenu_args = array(
		'child_of'     => $page_id,
		'depth'        => 0,
		'post_type'    => 'article',
		'post_status'  => 'publish',
		'sort_column'  => 'menu_order',
		'title_li'     => '',
		'echo' 		   => 1
	);

	echo '<div class="child_menu js-childMenu">';
		// echo '<h2 class="child_menu--heading"></h2>';
		echo '<ul class="child_menu--list">';
			echo wp_list_pages( $childmenu_args );
		echo '</ul>';
	echo '</div>';
}
add_shortcode('childmenu', 'tub_childmenu');