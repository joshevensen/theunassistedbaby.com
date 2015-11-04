<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package tub
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="widget_bar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
