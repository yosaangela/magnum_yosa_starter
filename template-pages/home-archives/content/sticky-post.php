<div class="col-12">
    <div class="sticky-post-card mb-5">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center image-wrapper">
                <img class="w-100" src="<?php echo get_the_post_thumbnail_url(); ?>">
            </div>
            
            <div class="col-md-8 d-flex flex-column justify-content-between content-wrapper">
                <div class="card border-0 h-100">
                    <div class="card-body d-flex flex-column">
                        <a href="<?php the_permalink(); ?>"><h2 class="card-title m-0 mb-3"><?php the_title(); ?></h2></a>
                        <p class="card-text mb-4"><?php echo wp_trim_words(get_the_content(), 50, '...'); ?> </p>

                        <div class="card-footer mt-auto p-0">
                            <a href="<?php the_permalink(); ?>" class="button-primary mb-3"><?php mycustom_read_more(); ?></a>
                            <p class="mb-3"><?php echo get_the_date('j F, Y') . ' by ' . '<a href="' . get_the_permalink() . '"> '. get_the_author() . '</a>'; ?></p>

                            <div class="row footer-links pt-4 pb-2">
                                <div class="col-6 border-right d-flex justify-content-center">
                                    <?php $cat = get_the_category();
                                    if( !empty($cat)) { 
                                        echo '<a href="' . esc_url(get_category_link( $cat[0]->term_id )) . '">' 
                                            . esc_html( $cat[0]->name) . '
                                        </a>';
                                        } ?>
                                </div>
                                <div class="col-6 d-flex justify-content-center">
                                    <a href="<?php the_permalink(); ?>#comments">
                                    <?php echo get_comments_number() . ' Reacties'; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>