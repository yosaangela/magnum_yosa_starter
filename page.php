<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourPackageName
 */

get_header();
?>

<?php  if( have_posts() ) : 
	while( have_posts() ) : the_post() ; ?>
		<!-- Banner -->
		<?php include get_stylesheet_directory() . '/template-pages/default-templates/header-halfpage.php'; ?>

			<div id="default-page">
				<div class="container">
					<!-- Title -->
					<div class="row flex-column align-items-center">
						<div class="col-lg-8 mb-5 header-wrapper">
							<h1 class="m-0"><?php the_title();?></h1>
						</div>

						<!-- Main Content -->
						<div class="col-lg-8">   
							<div class="content-wrapper p-3 <?php echo $hasThumbnail;?>">
								<!-- Content of the post goes here -->
								<article>
									<?php the_content(); ?>
								</article>       
							</div>
						</div>
					</div>
				</div>


			</div><!-- #primary -->

			<!-- CTA -->
			<?php include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; ?>
	<?php endwhile ; 
endif ; ?>

<?php
get_footer();

