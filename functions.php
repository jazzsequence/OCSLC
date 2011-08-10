<?php 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'mimbo' ),
		'subnav' => __('Secondary Navigation', 'mimbo' )
	) );	

	// This adds a home link option in the Menus
	function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

	// use post thumbnails instead of timthumb
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 105, 85 ); // 105 pixels wide by 85 pixels tall, box resize mode
	add_image_size( 'archivelist', 80, 65 ); // archive list thumbnail size
	add_image_size( 'featured', 260, 230 ); // featured image thumbnail size
	
if (!function_exists('_checkactive_widgets')) {
	// do nothing
}		
?>