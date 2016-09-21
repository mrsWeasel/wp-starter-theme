<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tuomas
 */

get_header(); ?>
	
	<div class="fullwidth-block">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<p><?php esc_html_e( 'The content you are looking for may have been removed or moved to another location. Maybe try the links below or try searching?', 'sassyscores' ); ?></p>
							<?php get_search_form(); ?>
							<div class="row">
								<div class="col-md-6 content-menu">
									<?php 
									the_widget( 'WP_Widget_Recent_Posts' ); 
									if ( sassyscores_categorized_blog() ) : ?>
									<h2 class="widget-title"><?php esc_html_e( 'Categories', 'sassyscores' ); ?></h2>
									<ul>
									<?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										) ); ?>
									</ul>	
									<?php endif; ?>
								</div>
								<div class="col-md-6">
									<h2><?php esc_html_e('Contact me', 'sassyscores'); ?></h2>
									<p>+358 123 4567
									<br><a href="mailto:info@sassyscoreskallinen.com">info@sassyscoreskallinen.com</a></p>
								</div>
						</div><!-- .row (nested) -->
						</div>
					</div><!-- .row -->
					
			

			</div><!-- .container -->		
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .fullwidth-block -->	
<?php
get_footer();