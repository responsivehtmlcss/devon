<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP_Custom_Theme
 * @since WP Custom Theme 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="footer-bottom">
					<div class="site-width">
						<div class="footer-container clearfix">
							<div class="footer-column">
								<div class="footer-content">
									<div class="footer">
										<?php 
					                       $footerlogourl = ot_get_option( 'white_logo' );
					                       $footertext = ot_get_option( 'footer_column_first' );
										?>
										<div class="footer">
											<?php if ( $footerlogourl !="" ) : ?>
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo"><img src="<?php echo $footerlogourl ?>" alt="" /></a>
											<?php endif; ?>												
											<div class="footer-about-text"><?php echo $footertext ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="footer-column">
								<div class="footer-content">							
									<div class="footer-twitter-code">
										<?php dynamic_sidebar( 'footer-tweeter' ); ?>										
									</div>
								</div>
							</div>
							<div class="footer-column">
								<div class="footer-content">
									<!-- sitemap -->
									<h4 class="footer-column-title">Sitemap</h4>
									<?php wp_nav_menu( array( 'theme_location' => 'footermenu', 'menu_class' => 'sitemap-menu' ) ); ?>
								</div>
							</div>
							<div class="footer-column">
								<div class="footer-content">
									<div class="footer-instagram-code">
										<?php dynamic_sidebar( 'footer-instagram' ); ?>										
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>	
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>