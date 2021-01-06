<?php 
global $wp_query;
    $all_post = new WP_Query([
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'posts_per_page' => '6',
        'order'         => 'DESC',
        'paged'         => 1,
    ]);

if($all_post->have_posts()) : ?>

    <div class="card-posts">
        <div class="row my-posts">
            <?php while( $all_post->have_posts() ) : $all_post->the_post(); 
                if(is_sticky()) : 
                    include get_stylesheet_directory() . '/template-pages/home-archives/content/sticky-post.php';
                else : ?>
                    <div class="col-xl-4 col-md-6 mb-5">
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
                <?php endif ; ?>
            <?php endwhile ; ?>
        </div>
    </div>
<?php endif ; ?>

    <!-- Load more button -->
    <div class="text-center mt-xl-4 mt-2">
        <div class="button-tertiary loadmore"><?php echo esc_html('Laad meer', 'diametheus'); ?></div>
    </div>