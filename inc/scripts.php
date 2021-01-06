<?php

/**
 * Enqueue scripts and styles.
 */
function diametheus_scripts() {
    wp_enqueue_style( 'diametheus-style', get_stylesheet_directory_uri() . '/dist/css/build.min.css', array(), '1.0.0' );
    
    wp_enqueue_script( 'diametheus-script', get_template_directory_uri() . '/dist/js/build.min.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'diametheus_scripts' );