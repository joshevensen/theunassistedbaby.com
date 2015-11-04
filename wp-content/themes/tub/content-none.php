<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tub
 */
?>

<section class="not_found">

	<!-- No Blog Posts -->
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<h2 class="not_found--heading"><?php _e( 'Nothing Found', 'tub' ); ?></h2>

		<div class="not_found-content">

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tub' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		</div>

	<!-- No Search Results -->
	<?php elseif ( is_search() ) : ?>
		<h2 class="not_found--heading"><?php _e( 'Nothing Found', 'tub' ); ?></h2>

		<div class="not_found-content">

			<p><?php _e( 'Sorry but nothing matched your search terms. Please try again with different keywords.', 'tub' ); ?></p>

			<?php get_search_form(); ?>
			
		</div>

	<!-- Anything Else like 404 -->
	<?php else : ?>

		<div class="not_found-content">

			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Please try using the search function below or <a href="<?php bloginfo(url) ?>/contact/">contact us</a> directly.</p>

			<?php get_search_form(); ?>
			
		</div>

	<?php endif; ?>
</section>
