<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cones
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cones_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cones_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cones_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cones_pingback_header' );


/**
 * Allow .svg upload
 * 
 * To use this function works, add this code in your wp-config.php: define('ALLOW_UNFILTERED_UPLOADS', true);
 */
function upload_my_images($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'upload_my_images');

/*
 * Custom menu output
 * No <ul>, no <li>, just <a>
 * headlab_menu('location')
 **/
function headlab_menu($location)
{
    // Get our nav locations (set in our theme, usually functions.php)
    $menuLocations = get_nav_menu_locations(); // This returns an array of menu locations;
    $menuID = $menuLocations[$location]; // Get the *MENU* menu ID
    $menu_navs = wp_get_nav_menu_items($menuID);
	$queried_page_id = (get_queried_object_id()) ? get_queried_object_id() : woocommerce_get_page_id('shop');
		
	//var_dump($queried_page_id);
    foreach ($menu_navs as $menu_nav) {
		$object_id = $menu_nav->object_id;
		$hasParent = intval($menu_nav->menu_item_parent);

        if ($queried_page_id == $object_id) {
            $active = " class='active main-item'";
        } else {
            $active =  " class='main-item'";
		}
		if(!$hasParent) {
			echo '<a href="' . esc_url($menu_nav->url) . '" ' . $active . '>' . esc_html($menu_nav->title) . '</a>';
		}
    }
}

/**
 * Read More text functions
 * 
 */
function mycustom_read_more() {
	echo esc_html('Lees Meer', 'diametheus');
}



/**
 * Remove Website field from Comments
 */
function prefix_disable_comment_url($fields) { 
	$fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
            . _x(
                'Jouw naam',
                'diametheus'
                )
            . '"',
        $fields['author']
	);

	$fields['email'] = str_replace(
        '<input',
        '<input placeholder="'
            . _x(
                'Jouw e\'mailadres',
                'diametheus'
                )
            . '"',
        $fields['email']
	);
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','prefix_disable_comment_url');

/**
 * Comment Form Placeholder Comment Field
 */
function placeholder_comment_form_field($fields) {
    $replace_comment = __('Your Comment', 'yourdomain');
     
    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
	'</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'. __('Jouw reactie', 'diametheus') .'" aria-required="true"></textarea></p>';
	
	$fields['label_submit'] =  __('Vesturen', 'diametheus') ;
    
    return $fields;
 }
add_filter( 'comment_form_defaults', 'placeholder_comment_form_field' );


/**
 * ACF function for social media
 * Retrieve from ACF field
 * 
 */
function custom_social_media() { 
	$fb = get_field('fb_link', 'options');
	$tw = get_field('tw_link', 'options');

	if($fb) : 
		echo '<a href="' . $fb .'" target="_blank"><i class="fab fa-facebook-square"></i></a>';
	endif ; 

	if($tw) : 
		echo '<a href="' .$tw . '" target="_blank"><i class="fab fa-twitter-square"></i></a>';			
	endif ; 
}
add_filter('comment_form_default_fields','prefix_disable_comment_url');

/**
 * Enable or disable comments based on custom field Allow Comments.
 *
 * @param bool $open    Whether comments should be open.
 * @param int  $post_id Post ID.
 * @return bool Whether comments should be open.
 */
function wpdocs_comments_open( $open, $post_id ) {
    $post = get_post( $post_id );
        if (get_post_meta($post->ID, 'Allow Comments', true)) {
        $open = true;
    }
    return $open;
}
add_filter( 'comments_open', 'wpdocs_comments_open', 10, 2 );

function blog_scripts() {
    wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/src/js/loadmore.js', array('jquery'), false, true );
 
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'custom-script', 'blog', $script_data_array );
 
    wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );


