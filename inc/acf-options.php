<?php 
/**
 * 
 * Register ACF options page
 * 
 */

 if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Contact Settings',
		'menu_title'	=> 'Homepage Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Contact Settings',
		'menu_title'	=> 'Contact Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
 }