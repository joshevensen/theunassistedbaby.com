<?php
/**
 * The template for displaying all single posts.
 *
 * @package tub
 */

get_header(); ?>
<!-- single-archive.php -->

<!--
	Hero -->
<div class="hero js-heroImage">
	<?php global $post;


		// If article has thumbnail
		if ( has_post_thumbnail() ) {
		    the_post_thumbnail();

		// If article has no thumbnail and is a child page
		} elseif ( is_singular('article') && $post->post_parent ) {
			// If parent article has a thumbnail
			if( has_post_thumbnail($post->post_parent) ) {
		    	echo get_the_post_thumbnail($post->post_parent);

			// If parent article doesn't have a thumbnail
		    } else {
		    	echo '<img class="hero--image" src="' . get_stylesheet_directory_uri() . '/images/header.jpg" alt="The Unassisted Baby">';
		    }

		// If all else fails
		} else {
			echo '<img class="hero--image" src="' . get_stylesheet_directory_uri() . '/images/header.jpg" alt="The Unassisted Baby">';
		}
	?>

	<div class="overlay"></div>
</div>


<!--
	Content -->
<main id="content" class="site_content" role="main">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>

				<h1 class="article--title">
					<?php if( get_post_meta( get_the_ID(), 'tub_article_title' ) ) {
						echo get_post_meta( get_the_ID(), 'tub_article_title', true );
					} else {
						the_title();
					} ?>
				</h1>

				<div class="article--content">
					<?php the_content(); ?>
				</div>

			</article>

			<?php get_sidebar(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</main>

<?php get_footer(); ?>