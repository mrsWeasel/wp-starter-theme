<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sassyscores
 */


		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sassyscores' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>
				<?php if ( is_search() ) :
					$helper_text = esc_html('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'sassyscores');
				else :
					$helper_text = esc_html( 'The content you are looking for may have been removed or moved to another location. Maybe try the links below or try searching?', 'sassyscores' );
				endif; ?>

				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<p><?php echo $helper_text; ?></p>
							<?php get_search_form(); ?>
							<div class="row">
								<div class="col-md-12">
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
						</div><!-- .row (nested) -->
					</div>
				</div><!-- .row -->
		
		<?php endif; ?>
