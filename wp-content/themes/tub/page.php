<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package tub
 */

get_header(); ?>
<!-- page.php -->

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

	<!--
		Hero -->
	<div class="hero js-heroImage">
		<img class="hero--image" src="<?php bloginfo(template_directory) ?>/images/header.jpg" alt="The Unassisted Baby">

		<h2 class="hero--tagline"><?php the_title(); ?></h2>

		<div class="overlay"></div>
	</div>


	<!--
		Content -->
	<main id="content" class="site_content" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="page--content">
					<?php the_content(); ?>
				</div>

			</article>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>