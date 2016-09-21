<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sassyscores
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="main-wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sassyscores' ); ?></a>
	<button id="menu-button" class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false"><?php get_template_part('assets/icons/inline', 'icon-menu.svg'); ?></button>

	<div id="page" class="site">
			<div id="mobile-nav-container">

			<nav id="mobile-navigation" class="main-navigation" role="navigation">		
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mobile-menu', 'container' => '' ) ); ?>
					<div id="mobile-search-container">
						<?php get_search_form(); ?><!-- small menu search form -->
					</div>	
			</nav><!-- #site-navigation -->
		</div>
		
		
		<header id="masthead" class="site-header" role="banner">
					<div class="container">
						<div class="row site-branding-container">
							<div class="site-branding col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-9 col-xs-offset-3">
								<a id="home-link" href="<?php echo home_url(); ?>">
									<?php echo bloginfo('name');?>
								</a>
							</div><!-- .site-branding -->
							<div class="nav-container col-md-9 col-sm-8 col-xs-12">
								<nav id="site-navigation" class="main-navigation" role="navigation">
									<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '' ) ); ?>
								<button id="search-toggle" class="hidden-sm-down" role="button"><?php esc_html_e('Search', 'sassyscores');?></button>
								</nav><!-- #site-navigation -->
								<div id="search-container" aria-hidden="true" data-visible="false">
									<?php get_search_form(); ?>
								</div>
							</div>	
						</div><!-- .row -->	
					</div><!-- .container -->
		</header><!-- #masthead -->
		
		<div id="content" class="site-content">

