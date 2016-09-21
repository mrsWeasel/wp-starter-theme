<?php
/**
 * The template for displaying static front page.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tuomas
 */

get_header(); ?>

		<div id="front-page-tall-header">
			<div class="container">
				<div class="row">
					<div id="header-content" class="col-md-8 col-md-offset-2">
						<?php if (function_exists('get_field')) : ?>
						<p><?php echo esc_html( get_field('tk_intro_text', '') );?></p>
						<?php endif; ?>
						<a id="scroll-icon" href="#about-sassyscores"><?php get_template_part('assets/icons/inline', 'icon-down-arrow.svg'); ?></a>
					</div>
				</div>
			</div>	
		</div>	
		<div class="fullwidth-block" id="about-sassyscores">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="container">
						<?php
						while ( have_posts() ) : the_post(); ?>
							<div class="row">
								<div class="col-md-5">
								<?php if (function_exists('get_field')) : ?>	
									<?php if (get_field('tk_kuva')) :
										$image = esc_url( get_field('tk_kuva')); ?>

										<img src="<?php echo $image; ?>"/>

									<?php endif; ?>
								<?php endif; ?>
								</div>

								<div class="col-md-7">
								<?php if (function_exists('get_field')) : ?>	
									<?php if ( get_field('tk_tekstipalstan_otsikko') ) :?>
									<h1><?php the_field('tk_tekstipalstan_otsikko'); ?></h1>
									<?php endif; ?>
								<?php endif; ?>
								<?php the_content(); ?>
								<?php if (function_exists('get_field')) : ?>
									<?php if ( get_field('tk_soundcloud') ) :
										$soundcloud = esc_url(get_field('tk_soundcloud')); ?>
										<a id="tk-soundcloud" class='tk-social-icon' href="<?php echo $soundcloud;?>"></a>
									<?php endif; ?>

								
									<?php if ( get_field('tk_facebook') ) :
										$facebook = esc_url(get_field('tk_facebook')); ?>
										<a id="tk-facebook" class='tk-social-icon' href="<?php echo $facebook;?>"></a>
									<?php endif; ?>
								<?php endif; ?>	
								</div>
							</div>

							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .fullwidth-container -->	
<?php

get_footer();