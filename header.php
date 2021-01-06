<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diametheus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> id="html">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

<?php $headerClass = is_404() || is_search() ? 'container-fluid header-search-results' : 'container-fluid'; ?>

<div id="page" class="site">

	<!-- Main Navigation -->
	<header id="masthead" class="<?php echo $headerClass; ?>">

		<div class="container">
			<div class="menu-wrapper">
				<div class="site-branding">
					<?php if (has_custom_logo()) {the_custom_logo();} else {?>
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a>
					<?php }?>
				</div><!-- .site-branding -->

				<div class="hamburger hamburger--collapse">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'depth' => 2,
					'container' => false,
					'menu_class' => 'nav',
					'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
					'walker' => new Bootstrap_Walker_Nav_Menu(),
				));
				?>
				<div class="social-medias">	
					<?php 
					/**
					 * @func: extras.php
					 * 
					 */
					custom_social_media();
					?>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->