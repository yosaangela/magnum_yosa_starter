<section id="content">
    <div class="container">
        <div class="row">
            <!-- Posts card -->
            <div class="col-xl-9 mb-5 mb-xl-0">
                <!--- echo thisi cardpost -->
                <?php if(have_posts()) : ?>

                    <div class="card-posts">
                        <div class="row">
                            <?php while( have_posts() ) : the_post(); ?>
                                <div class="col-xl-4 col-md-6 mb-5">
                                    <div class="card h-100">
                                        <?php if(get_the_post_thumbnail()) { ?>
                                            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
                                        <?php } ?>
                                        <div class="card-body d-flex flex-column">
                                            <a href="<?php the_permalink(); ?>"><h3 class="card-title"><?php the_title(); ?></h3><a>
                                            <p class="card-text mb-4"><?php echo wp_trim_words(get_the_content(), 48, '...'); ?></p>

                                            <div class="card-footer mt-auto p-0">
                                                <a href="<?php the_permalink(); ?>" class="button-secondary mb-3"><?php mycustom_read_more(); ?></a>
                                                <p class="mb-3"><?php echo get_the_date('j F, Y') . ' by ' . get_the_author(); ?></p>

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
                    </div>
                <?php endif ; ?>
                <!-- end of card post --> 
            
                <!-- Load more button -->
                <div class="text-center mt-xl-4 mt-2">
                <div class="button-tertiary loadmore-cat"><?php echo esc_html('Laad meer', 'diametheus'); ?></div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-xl-3">
                <div class="row">
                    <div class="col-12">
                        <?php get_search_form(); ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?> 
                    </div>
                    <div class="col-md-6 col-xl-12">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>