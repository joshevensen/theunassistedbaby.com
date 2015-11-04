<?php

/**
 * Template Name: Resource Page
 *
 * @package tub
 */

get_header(); ?>
<!-- resource.php -->

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

		<?php $args = array( 'post_type' => 'resource', 'posts_per_page' => 4 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

				<h1 class="entry--title"><?php the_title(); ?></h1>

				<div class="entry--content">
					<?php the_post_thumbnail( 'thumbnail', array('class' => 'entry--thumbnail') ); ?>

					<?php the_excerpt(); ?>

					<a class="entry--link" href="<?php echo get_permalink() ?>">READ MORE</a>
				</div>

			</article>

		<?php endwhile; ?>

		<?php tub_pagination() ?>

		<?php wp_reset_postdata(); ?>

	</main>

<?php get_footer(); ?>