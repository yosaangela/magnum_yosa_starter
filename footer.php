<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_20
 */

?>

	<footer id="footer">
		<div class="container py-4 py-md-5">
			<div class="row align-items-center">
				<div class="col-md-8 d-flex flex-md-row flex-column mb-3 mb-md-0">
					<span class="mr-3 mb-2 mb-md-0">© Diametheus 2020</span>
					<span class="mr-3 d-none d-md-block">-</span>
					<div class="legal-navigation">
						<?php
							wp_nav_menu(array(
								'theme_location' => 'footer',
								'depth' => 1,
								'container' => false,
								'menu_class' => 'nav',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new Bootstrap_Walker_Nav_Menu(),
							));
						?>
					</div>
				</div>
				<div class="col-md-4 d-flex justify-content-start justify-content-md-end right-footer">
					<?php 
					/**
					 * @func: extras.php
					 * 
					 */
					custom_social_media();
					?>
					<a href="#back-to-top" alt="Back to top" class="ml-auto ml-md-0"><img class="back-to-top" src="<?php echo get_template_directory_uri(); ?>/src/img/icons/arrow.svg"></a>		
				</div>
			</div>

		</div><!-- .container -->
	</footer><!-- #footer -->
</div><!-- #page -->


<?php wp_enqueue_media();
wp_footer(); ?>

</body>
</html>
