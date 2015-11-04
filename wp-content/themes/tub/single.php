<?php
/**
 * The template for displaying all single posts.
 *
 * @package tub
 */

get_header(); ?>
<!-- single.php -->

	<!--
		Hero -->
	<div class="hero js-heroImage">
		<img class="hero--image" src="<?php bloginfo(template_directory) ?>/images/header.jpg" alt="The Unassisted Baby">

		<div class="overlay"></div>
	</div>


	<!--
		Content -->
	<main id="content" class="site_content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

					<h1 class="post--title"><?php the_title(); ?></h1>

					<p class="post--meta">written on <?php the_date(); ?></p>

					<div class="post--content">
						<?php the_content(); ?>
					</div>

					<footer class="post--footer">
						<p class="post--footer--prev">
							<?php previous_post_link('%link', '<i class="fa fa-long-arrow-left"></i> PREV POST'); ?>
						</p>
						<p class="post--footer--next">
							<?php next_post_link('%link', 'NEXT POST <i class="fa fa-long-arrow-right"></i>'); ?>
						</p>
					</footer>

				</article>

				<?php get_sidebar(); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>