<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cones
 */

get_header();


    include get_stylesheet_directory() . '/template-pages/home-archives/header-fullpage.php'; ?>
    <section id="title">
        <div class="container">
            <div class="row align-items-center align-items-md-end justify-content-center">
                <div class="col-lg-7">
                    <h1 class="text-left text-sm-center"><?php the_archive_title(); ?> </h1>
                </div>
            </div>
        </div>
    </section> 
    <?php 
    include get_stylesheet_directory() . '/template-pages/home-archives/content-archive.php'; 
    include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; 

get_footer();
