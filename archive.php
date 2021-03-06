<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sassyscores
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) : ?>
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.

						sassyscores_paginate_posts();

						else:
							get_template_part( 'template-parts/content', 'none' );
						
						?>

					<?php endif; ?>
						
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .row -->	
	</div><!-- .container -->
<?php
get_footer();
