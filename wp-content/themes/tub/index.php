<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tub
 */

get_header(); ?>
<!-- index.php -->

	<!--
		Hero -->
	<div class="hero" style="background-image: url(<?php header_image(); ?>)">
		<h2 class="hero--tagline"><?php echo get_bloginfo( 'description' ); ?></h2>
	</div>


	<!--
		Content -->
	<main id="content" class="site_content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main>


<?php get_footer(); ?>