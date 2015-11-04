<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package tub
 */

get_header(); ?>
<!-- 404.php -->

	<!--
		Hero -->
	<div class="hero js-heroImage">
		<img class="hero--image" src="<?php echo get_stylesheet_directory_uri() ?>/images/header.jpg" alt="The Unassisted Baby">

		<div class="overlay"></div>
	</div>


	<!--
		Content -->
	<main id="content" class="site_content" role="main">

		<h1 class="page--title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'tub' ); ?></h1>

		<?php get_template_part( 'content', 'none' ); ?>

	</main>

<?php get_footer(); ?>
