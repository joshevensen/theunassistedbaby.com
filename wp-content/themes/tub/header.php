<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tub
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700' rel='stylesheet'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

	<!--
		Header -->
	<header id="header" class="site_header tall" role="banner">
		<a href="<?php bloginfo( 'url' ); ?>" class="site_header--logo"><img src="<?php bloginfo( 'template_directory' ) ?>/images/logo-tall.png" alt="<?php bloginfo( 'name' ); ?>"></a>
	</header>

	<header class="site_header wide" role="banner">
		<button id="sitePanelButton" class="site_header--button"><i class="fa fa-bars"></i></button>

		<a href="<?php bloginfo( 'url' ); ?>" class="site_header--logo"><img src="<?php bloginfo( 'template_directory' ) ?>/images/logo-wide.png" alt="<?php bloginfo( 'name' ); ?>"></a>
	</header>


	<div id="sitePanel" class="site_panel">

		<?php get_search_form(); ?>

		<?php if( !is_front_page() ) { ?>
			<a href="<?php bloginfo( 'url' ); ?>" class="site_panel--home_link">Home</a>
		<?php } else { ?>
			<a href="<?php bloginfo( 'url' ); ?>" class="site_panel--home_link current">Home</a>
		<?php } ?>


		<!--
			Article Menu -->
		<?php $article_args = array(
		    'depth'       => 0,
			'sort_column' => 'menu_order',
			'menu_class'  => 'article_menu',
			'include'     => '',
			'exclude'     => '',
			'echo'        => true,
			'show_home'   => false,
			'post_type'    => 'article',
			'link_before' => '',
			'link_after'  => '' );
		?>

		<?php wp_page_menu( $article_args ); ?>

		<div class="social_menu">
			<ul>
				<?php $facebook_link = get_option( 'tub_facebook_link' ); ?>
				<?php if ( $facebook_link ) : ?>
				    <li><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
				<?php endif; ?>

				<?php $twitter_link = get_option( 'tub_twitter_link' ); ?>
				<?php if ( $twitter_link ) : ?>
				    <li><a href="<?php echo $twitter_link; ?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
				<?php endif; ?>

				<?php $google_link = get_option( 'tub_google_link' ); ?>
				<?php if ( $google_link ) : ?>
				    <li><a href="<?php echo $google_link; ?>" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
				<?php endif; ?>
			</ul>
		</div>


		<!--
			Primary Menu -->
		<?php $primary_args = array(
			'theme_location' => 'primary',
			'container_class'  => 'primary_menu',
			'echo'        => true,);
		?>

		<?php wp_nav_menu( $primary_args ); ?>

	</div>


	<!--
		Page -->
	<div id="page" class="site_page">
