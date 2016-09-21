<?php
/**
 * Template part for displaying single post content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sassy Scores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

		if ( 'post' === get_post_type() ) : ?>
		<div class="row">
			<div class="col-xs-12">
			<div class="tag-container"><?php the_tags('', ' ', ''); ?></div>
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
