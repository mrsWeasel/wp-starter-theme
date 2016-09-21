<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tuomas
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

				<div id="masthead-inner">
					
					<div class="container">

						<div class="row site-branding-container">
							<div class="site-branding col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-9 col-xs-offset-3">
								
								<a id="home-link" href="<?php echo home_url(); ?>">
									<img src="<?php echo home_url() . "/wp-content/themes/sassyscores/assets/images/sassyscores_kallinen.svg" ?>" width="250px">
								</a>
										
							</div><!-- .site-branding -->
							<div class="nav-container col-md-9 col-sm-8 col-xs-12">
								<nav id="site-navigation" class="main-navigation" role="navigation">
									<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => '' ) ); ?>
								<button id="search-toggle" class="hidden-sm-down" role="button"><?php get_template_part('assets/icons/inline', 'icon-search.svg'); ?></button>
								</nav><!-- #site-navigation -->
								<div id="search-container" aria-hidden="true" data-visible="false">
									<?php get_search_form(); ?>
								</div>
							</div>	
						</div><!-- .row -->	
					</div><!-- .container -->
				
				</div><!-- #masthead-inner (sticky)-->
			
			<?php if (! is_front_page()) :?>
				<div id="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php global $post;
								$page_heading = $page_subheading = ''; 
									if ( is_search() ) :
										$page_heading = get_search_query();
										$page_subheading = sprintf(esc_html('Search results for "%s"', 'sassyscores'), $page_heading);
									elseif ( is_404() ) :
										$page_heading = '404 – Page not found';
										$page_subheading = esc_html("Nothing was found at this location.", 'sassyscores'); 
									elseif ( is_category() ) :
										$category = get_the_category($post->ID);
										$page_heading = $category[0]->name;
										$page_subheading = sprintf(esc_html('All posts in category "%s"', 'sassyscores'), $page_heading);
									elseif ( is_tag() ) :
										$page_heading = single_tag_title('', false);
										$page_subheading = sprintf(esc_html('All posts tagged "%s"', 'sassyscores'), $page_heading);
									elseif ( is_author() ) :
										$author = get_userdata( get_query_var('author') );
										$page_heading = $author->nickname;
										$page_subheading = sprintf(esc_html('All posts written by %s', 'sassyscores'), $page_heading);
									elseif (is_day()) :
										$page_heading = get_the_date();
										$page_subheading = esc_html('Daily archive', 'sassyscores'); 
									elseif (is_month()) :
										$page_heading = get_the_date('F Y');
										$page_subheading = esc_html('Monthly archive', 'sassyscores'); 
									elseif (is_year()) :
										$page_heading = get_the_date('Y');
										$page_subheading = esc_html('Yearly archive', 'sassyscores'); 
									elseif ( is_home() ) :
										$page_heading = esc_html('Blog', 'sassyscores');
									elseif ( is_single() && ! is_attachment() ):
										$category = get_the_category($post->ID);
										$page_heading = get_the_title();
										$page_subheading = $category[0]->name . ' | ' . sassyscores_posted_on();	
									else :
										$page_heading = get_the_title();
									endif; ?>

								<h1><?php echo esc_html($page_heading); ?></h1>
								<?php if ('' != $page_subheading) : ?>
								<p class="tk-entry-meta"><?php echo $page_subheading; ?></p>
								<?php endif; ?>	
							</div>
							<?php get_template_part('template-parts/breadcrumbs'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>	
		</header><!-- #masthead -->
		
		<div id="content" class="site-content">

