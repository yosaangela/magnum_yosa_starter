<?php 
    $title_cta      = get_field('title_cta', 'options');
    $desc           = get_field('desc_cta', 'options');
    $btn1_text      = get_field('btn1_text', 'options');
    $btn1_link      = get_field('btn1_link', 'options');
    $btn2_text      = get_field('btn2_text', 'options');
    $img            = get_field('img_cta', 'options');
    $title_popup    = get_field('title_pop_up', 'options');
    $form           = get_field('form_donation', 'options');
    if( $desc ) :
?>

    <section id="cta">
        <div class="container container-wrapper">
            <div class="row">
                <?php if($img) { ?>
                    <div class="col-lg-6 p-0 image-wrapper">
                        <img class="h-100 w-100 image-cta" src="<?php echo $img; ?>">
                    </div>
                <?php } ?>

                <div class="col-lg-6 p-0 content-wrapper">
                    <div class="d-flex flex-column h-100 pb-3 pb-lg-0 pt-5 px-3 px-sm-4 content">
                        <h2 class="mb-3">
                           <?php echo $title_cta; ?>
                        </h2>
                        <p>
                            <?php echo $desc ; ?>
                        </p>
        
                        <div class="row button-wrapper border-top mt-auto py-4">
                            <div class="col-sm-auto">
                                <a href="<?php echo $btn1_link; ?>" class="button-secondary py-3 mb-sm-0 mb-3"><?php echo $btn1_text; ?></a>
                            </div>
                            <?php if($title_popup && $form) : ?>
                                <div class="col-sm-auto">
                                    <button type="button" class="button-primary w-100 py-3 px-5" data-toggle="modal" data-target="#donateModal">
                                        <?php echo $btn2_text; ?>
                                    </button>
                                </div>
                            <?php endif ;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Greek ancient image -->
    <img class="greek-image" src="<?php echo get_template_directory_uri(); ?>/src/img/greek.png">

    <!-- Modal -->
   <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="donateModalLabel"><?php echo $title_popup; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo ($form); ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="button-secondary" data-dismiss="modal"><?php echo esc_html__('Close', 'diametheus'); ?></button>
        </div>
        </div>
    </div>
    </div>
<?php endif ; ?>