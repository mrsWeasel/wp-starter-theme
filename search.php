<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tuomas
 */

get_header(); ?>
	
	<div class="fullwidth-block">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container">
					<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .fullwidth-block -->	
<?php

get_footer();
