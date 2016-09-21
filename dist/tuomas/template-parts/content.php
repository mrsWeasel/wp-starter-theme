<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tuomas
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( ! is_single() ) :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="row">
			<div class="col-sm-6">
			<div class="tag-container"><?php the_tags('', ' ', ''); ?></div>
			</div>
			<div class="col-sm-6 tk-social-right">
			<?php if ( function_exists( 'sharing_display' ) ) { echo sharing_display(); } ?>
			</div>
		</div> <!-- .row -->	
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if (has_post_thumbnail()) {
				the_post_thumbnail('large');
			}
			the_content(sprintf(
				esc_html__('Read more %s', 'sassyscores'),
				the_title('<span class="screen-reader-text"> about "', '"</span>', false) )
			); 

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sassyscores' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<!--<?php sassyscores_entry_footer(); ?>-->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
