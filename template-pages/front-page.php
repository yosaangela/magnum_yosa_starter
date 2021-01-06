<?php
/**
 * Template Name: Homepage
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diametheus
 */

?>

<?php get_header(); ?>

    <?php 
        include get_stylesheet_directory() . '/template-pages/home-archives/header-fullpage.php'; 
        include get_stylesheet_directory() . '/template-pages/home-archives/title.php'; 
        include get_stylesheet_directory() . '/template-pages/home-archives/content-wrapper.php'; 
        include get_stylesheet_directory() . '/template-pages/default-templates/cta.php'; 
    ?>
<?php get_footer(); ?>