<?php
/**
 * The template for displaying the latest news.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tuomas
 */

get_header(); ?>

<div class="fullwidth-block">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

							endwhile; // End of the loop.

						else :
							get_template_part( 'template-parts/content', 'none' );	
						endif; ?>
					<?php sassyscores_paginate_posts(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .row -->	
	</div><!-- .container -->
</div><!-- .fullwidth-block -->	
<?php
get_footer();