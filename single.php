<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cones
 */

get_header();
?>
<?php 

if(have_posts()) { while(have_posts()) { the_post(); 
	$cat = get_the_category();
	echo $cat->name;

	include get_stylesheet_directory() . '/template-pages/default-templates/header-halfpage.php'; ?>
	<section id="single-post">
		<div class="container">
			<!-- Title -->
			<div class="row justify-content-center mb-5">
				<div class="col-lg-8 header-wrapper">
					<h1 class="m-0 mb-3"><?php the_title(); ?></h1>
					<div class="row justify-content-between align-items-center">
						<div class="col-sm-auto d-flex align-items-center mb-3 mb-md-0">
							<div class="mr-2"><?php echo get_avatar( get_the_author_meta( 'ID' ) , 32 ); ?></div>
							<span><?php echo get_the_date('j F, Y') . ' by ';?><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_author('ID'); ?></a></span>
						</div>
						<div class="col-sm-auto">
						<?php 
							if( !empty($cat)) { 
							echo '<a href="' . esc_url(get_category_link( $cat[0]->term_id )) . '">' 
								. esc_html( $cat[0]->name) . '
							</a>';
						} ?>
							<span>-</span>
							<a href="<?php the_permalink(); ?>#comments">
								<?php echo get_comments_number() . __(' reacties', 'diametheus'); ?>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Content -->
			<?php
				$hasThumbnail = has_post_thumbnail() ? '' : 'without-thumbnail';
			?>
			<div class="row justify-content-center mb-5">
				<div class="col-lg-8">
					<!-- Thumnbail image -->
					<?php if (has_post_thumbnail()) : ?>
						<img class="featured-image" src="<?php echo get_the_post_thumbnail_url(); ?>">
					<?php endif; ?>

					<div class="content-wrapper p-3 <?php echo $hasThumbnail;?>">
						<!-- Content of the post goes here -->
						<article>
							<?php the_content(); ?>
						</article>

						<!-- Share buttons -->
						<div class="row justify-content-between align-items-center mt-4 pt-4 pb-2 share-wrapper">
							<div class="col-sm-auto d-flex align-items-center mb-3 mb-md-0">
								<h5 class="m-0 mr-3"><?php echo esc_html__('Deel', 'diametheus'); ?></h5>

								<!-- Share with jssocials -->
								<div id="share"></div>
							</div>

							<div class="col-sm-auto">
								<a href="<?php the_permalink(); ?>#comments"><?php echo esc_html__('Laat een reactie achter', 'diametheus'); ?></a>
							</div>
						</div>

					</div>

				</div>
			</div>

			<!-- Prev/Next buttons -->
			<div class="row justify-content-center mb-5">
				<div class="col-lg-8">
					<div class="row justify-content-between align-items-center next-prev-button">
					
						
							<?php the_post_navigation(array(
								'prev_text'     => '<div class="col-auto"><div class="button-secondary">' . __( 'Vorige bericht' ) . '</div></div>',     
								'next_text'     => '<div class="col-auto"><div class="button-secondary">' . __( 'Volgende bericht' ) . '</div></div>',                             
								'screen_reader_text' => __( ' ' ),                                  
							)); 
							?>	
						
		
						<!--  -->
					</div>
				</div>
			</div>

			<!-- Comments -->
			<div class="row justify-content-center mb-5">
				<div class="col-lg-8">
					<!-- Comment counter -->
					<h2 class="mb-3"><?php echo get_comments_number() . esc_html__(' Reacties'); ?> </h2>

					<div class="comment-wrapper p-3">
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
						if (  comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					</div>
				</div>
			</div>

			<!-- More posts -->
			<?php 
			global $post;
			$all_post = new WP_Query([
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'posts_per_page' => '4',
				'category_name'	=> $cat[0]->name,
				'order'         => 'DESC',
				'post__not_in'  => [$post->ID],
			]);

			if($all_post->have_posts()) : ?>

				<div class="row justify-content-center pt-0 pt-md-4">
					<div class="col-lg-8">
						<h2 class="text-center mb-4"><?php echo esc_html('Meer uit', 'diametheus'); ?> <a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>"><?php echo $cat[0]->name; ?></a></h2>
					</div>
				</div>
			

				<div class="row card-posts">
					<?php while( $all_post->have_posts() ) : $all_post->the_post(); ?>
						<div class="col-xl-3 col-md-6 mb-5 mb-xl-0 card-wrapper">
							<div class="card h-100">
								<?php if(get_the_post_thumbnail()) { ?>
									<img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
								<?php } ?>
								<div class="card-body d-flex flex-column">
									<a href="<?php the_permalink(); ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
									<p class="card-text mb-4"><?php echo wp_trim_words(get_the_content(), 48, '...'); ?></p>

									<div class="card-footer mt-auto p-0">
										<a href="<?php the_permalink(); ?>" class="button-secondary mb-3"><?php mycustom_read_more(); ?></a>
										<p class="mb-3"><?php echo get_the_date('j F, Y') . ' by ' . '<a href="' . get_the_permalink() . '"> '. get_the_author() . '</a>'; ?></p>

										<div class="row footer-links pt-4 pb-2">
											<div class="col-6 border-right d-flex justify-content-center">
												<?php $cat =  get_the_category(); 
												if( !empty($cat)) : 
													echo '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '"> ' . esc_html($cat[0]->name) .' 
													</a>';
												endif ; ?>
											</div>
											<div class="col-6 d-flex justify-content-center">
												<a href="<?php the_permalink() ?>#comments">
													<?php echo get_comments_number() . ' Reacties'; ?>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile ; ?>
					
				</div>
			<?php endif ;?>
		</div>
	</section>

	<?php
	include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; 

	}
}

get_footer();
