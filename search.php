<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cones
 */

get_header();
?>

<section id="search-results">
    <div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-lg-6">
				<h2 class="text-center mb-3"><?php printf( esc_html__( 'Search Results for: %s', 'diametheus' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				<?php get_search_form(); ?> 
			</div>
		</div>

		<?php
		if ( have_posts() ) : ?>
			<div class="row justify-content-center">
                <div class="col-lg-8">
					<?php /* Start the Loop */
					while ( have_posts() ) : the_post();
						?>
						<div class="content-wrapper">
							<h4>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<p><?php echo wp_trim_words(get_the_content(), 48, '...'); ?></p>
							<div class="row justify-content-between">
								<div class="col-auto">
									<?php echo get_the_date('j F, Y') . ' by ' . '<a href="' . get_the_permalink() . '"> '. get_the_author() . '</a>'; ?>
								</div>
								<div class="col-auto">
									<?php $cat =  get_the_category(); 
									if( !empty($cat)) : 
										echo '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '"> ' . esc_html($cat[0]->name) .' 
										</a>';
									endif ; ?>
									<?php 
									$count = get_comments_number(); 
									if($count > 0) { ?>
										<span>-</span>
										<a href="<?php the_permalink() ?>#comments"><?php echo $count . __(' reacties', 'diametheus'); ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php
					endwhile; // End of the loop. ?>
				</div>
			</div>
		<?php 
		else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
		endif;
		?>

	</div>
</section>

<?php include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; ?>
<?php
get_footer();
