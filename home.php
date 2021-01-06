<?php
/**
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package project_name
 */

?>

<?php get_header(); ?>

    <?php 
        //Here you can breakdown all the sections -- and call certain file one by one
        //EXAMPLE
        include get_stylesheet_directory() . '/template-pages/home-archives/header-fullpage.php'; 
        include get_stylesheet_directory() . '/template-pages/home-archives/title.php'; 
        include get_stylesheet_directory() . '/template-pages/home-archives/content-wrapper.php'; 
        include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; 
    ?>
<?php get_footer(); ?>