<div class="content-wrapper">
    <h4>
        <a href=""><?php the_title(); ?></a>
    </h4>
    <p><?php echo wp_trim_words(get_the_content(), 48, '...'); ?></p>
    <div class="row justify-content-between">
        <div class="col-auto">
            <?php echo get_the_date('j F, Y') . ' by ' . get_the_author(); ?>
        </div>
        <div class="col-auto">
            <?php $cat =  get_the_category(); 
            if( !empty($cat)) : 
                echo '<a href="' . esc_url(get_category_link($cat[0]->term_id)) . '"> ' . esc_html($cat[0]->name) .' 
                </a>';
            endif ; ?>
            <span>-</span>
            <a href="<?php the_permalink() ?>#comments">
                <?php echo get_comments_number(); ?>
            </a>
        </div>
    </div>
</div>