<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tub
 */
?>

	<!--
		Footer -->
	<footer id="colophon" class="site_footer" role="contentinfo">

		<!-- Copyright -->
		<div class="site_footer--copyright">
			<p>&copy; 2014 - <?php echo date("Y"); ?> Anita Evensen. All Rights Reserved. | <?php wp_loginout();?> <?php wp_register('| ',''); ?></p>
		</div>

	</footer>

</div>


<?php edit_post_link( __( 'EDIT', 'tub' ), '<div class="edit_link">', '</div>' ); ?>

<?php wp_footer(); ?>

</body>
</html>
