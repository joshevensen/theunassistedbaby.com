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
<!-- front-page.php -->

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

				<?php the_content(); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<div class="latest_posts">
			<h2 class="latest_posts--heading">Latest Posts</h2>

			<ul class="latest_posts--list">

				<?php
					global $post;
					$myposts = get_posts('numberposts=4&category=1');
					foreach($myposts as $post) :
				?>
					<li class="latest_post">

						<div class="latest_post--thumbnail">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( array(300, 300) );
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
							} ?>
						</div>
						
						<h3 class="latest_post--title"><?php the_title(); ?></h3>

						<a class="latest_post--link" href="<?php echo get_permalink() ?>">READ POST</a>

					</li>

				<?php endforeach; ?>
	
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>

	</main>

<?php get_footer(); ?>