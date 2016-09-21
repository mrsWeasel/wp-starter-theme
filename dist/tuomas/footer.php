<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tuomas
 */
?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div id="footer-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<?php dynamic_sidebar('footer-1'); ?>
						</div>
						<div class="col-md-4">
							<?php dynamic_sidebar('footer-2'); ?>
						</div>
						<div class="col-md-5">
							<?php dynamic_sidebar('footer-3'); ?>
						</div>
					</div>
				</div>
			</div><!-- #footer-wrapper -->
			<div id="copyright">
				<div class="container">
					<div class="row">
						<div class="site-info col-sm-6">
							<p><?php echo '&copy; <a href="' . home_url() . '">Composer &amp; Producer Tuomas Kallinen</a> ' . date('Y');?></p>
						</div><!-- .site-info -->
						<div class="designer-info col-sm-6">
							<p>Web Design &amp; Development: Laura Heino</p>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- #copyright -->			
		</footer><!-- #colophon -->
	</div><!-- #page -->
	
</div><!-- #main-wrapper -->
	
<?php wp_footer(); ?>

</body>
</html>
