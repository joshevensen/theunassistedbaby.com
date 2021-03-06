<?php
/**
 * The template for displaying blog posts.
 *
 * @package tub
 */

get_header(); ?>
<!-- home.php -->

	<!--
		Hero -->
	<div class="hero js-heroImage">
		<img class="hero--image" src="<?php echo get_stylesheet_directory_uri() ?>/images/header.jpg" alt="The Unassisted Baby">

		<h2 class="hero--tagline"><?php echo get_bloginfo( 'description' ); ?></h2>

		<div class="overlay"></div>
	</div>


	<!--
		Content -->
	<main id="content" class="site_content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

					<h1 class="entry--title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

					<div class="entry--content">
						<?php the_post_thumbnail( 'thumbnail', array('class' => 'entry--thumbnail') ); ?>

						<?php the_excerpt(); ?>

						<a class="entry--link" href="<?php echo get_permalink() ?>">READ MORE</a>
					</div>

				</article>

			<?php endwhile; ?>

			<?php tub_pagination() ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

	</main>

<?php get_footer(); ?>