<?php
/**
 * The template for displaying resources posts.
 *
 * @package tub
 */

get_header(); ?>
<!-- archive-resources.php -->

	<!--
		Hero -->
	<div class="hero js-heroImage">
		<img class="hero--image" src="<?php echo get_stylesheet_directory_uri() ?>/images/header.jpg" alt="The Unassisted Baby">

		<h2 class="hero--tagline"><?php echo get_bloginfo( 'description' ); ?></h2>

		<div class="overlay"></div>
	</div>


	<!--
		Content -->
	<main id="content" class="site_content resource_archive" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('resource_box'); ?>>

					<h1 class="resource--title"><?php the_title(); ?></h1>

					<div class="resource--content">
						<?php the_post_thumbnail( 'thumbnail', array('class' => 'resource--thumbnail') ); ?>

						<?php the_excerpt(); ?>

						<div class="resource--links">
							<?php $buy_link = get_post_meta( get_the_ID(), 'tub_resource_buy_link', true ); ?>
							<?php if ( $buy_link ) : ?>
							    <a class="resource--link" href="<?php echo $buy_link; ?>">BUY THE BOOK</a>
							<?php endif; ?>

							<?php $review_link = get_post_meta( get_the_ID(), 'tub_resource_review_link', true ); ?>
							<?php if ( $review_link ) : ?>
							    <a class="resource--link" href="<?php echo $review_link; ?>">READ REVIEW</a>
							<?php endif; ?>

							<?php $download_link = get_post_meta( get_the_ID(), 'tub_resource_download_link', true ); ?>
							<?php if ( $download_link ) : ?>
							    <a class="resource--link" href="<?php echo $download_link; ?>">DOWNLOAD PDF</a>
							<?php endif; ?>
						</div>
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