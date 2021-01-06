<?php
/**
 * Template Name:Diametheus
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package project_name
 */

?>

<?php get_header(); ?>
<?php include get_stylesheet_directory() . '/template-pages/default-templates/header-halfpage.php'; ?>

    <section id="service">
        <div class="container">

            <!-- Title -->
            <div class="row mb-5">
                <div class="col-lg-9 header-wrapper">
                    <h1 class="m-0"><?php the_title(); ?></h1>
                </div>
            </div>

            <div class="row">
                <!-- Main Content -->
                <div class="col-xl-9 mb-5 mb-xl-0">   
                    <?php
                        $hasThumbnail = has_post_thumbnail() ? '' : 'without-thumbnail';
                    ?>
                    <!-- Thumnbail image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <img class="featured-image" src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <?php endif; ?>

                    <div class="content-wrapper p-3 <?php echo $hasThumbnail;?>">
                        <!-- Content of the post goes here -->
                        <article>
                            <?php the_content(); ?>
                        </article>       
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

<?php include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; ?>
<?php get_footer(); ?>