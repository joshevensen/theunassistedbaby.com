<?php
/**
 * @package tub
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry_header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry_content">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tub' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry_footer">
	</footer>
</article>