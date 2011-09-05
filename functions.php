<?php 
// adds a widgetized menu to the left sidebar
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Left Sidebar',
        'before_widget' => '<div class="widget clearfloat">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

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

	// automatic feed links
	add_theme_support('automatic-feed-links');	
	
if ( !is_admin() ) { // instruction to only load if it is not the admin area
	$theme  = get_theme( get_current_theme() );
	// register droid sans
	wp_register_style('droid-sans','http://fonts.googleapis.com/css?family=Droid+Sans:400,700',false,$theme['Version']);
	wp_register_script('mimbo-dropdown',get_bloginfo('template_url').'/js/dropdowns.js',false,$theme['Version']);
	// enqueue styles and scripts
	wp_enqueue_style('droid-sans');
	wp_enqueue_style('mimbo-dropdown');
}	
	
	
// add a meta box for pages to display in the sidebar
// this is some hardcore ninja shit
if (current_user_can('administrator')) { // this checks to see if the current user is an administrator, if so, they can add the quote, otherwise gtfo
	function ocslc_meta_boxes() {
		add_meta_box("ocslc-page-quote", "Page Excerpt", "ocslc_quote", "page", "normal", "low");
	}
	add_action('admin_menu', 'ocslc_meta_boxes');
}
function ocslc_quote() { // this loads the actual meta boxes
    global $post;

	echo '<input type="hidden" name="ocslc_noncename" id="ocslc_noncename" value="' .
	wp_create_nonce( wp_basename(__FILE__) ) . '" />';
	echo '<p><em>This adds the ability to pull optional content page meta.  This fills in the featured content area in the OCSLC home page and is not used anywhere else.</em></p>';
	echo '<label for="ocslc_excerpt"><strong>Excerpt Content</strong></label><br />';
	echo '<textarea style="width: 100%; height: 200px; margin: auto;" name="ocslc_excerpt" />'.get_post_meta($post->ID, 'ocslc_excerpt', true).'</textarea><br />';
	echo '<em>HTML is allowed</em><br />';
}

/* When the post is saved, saves our ocslc data */
function ocslc_save_ocslc_postdata($post_id, $post) {
   	if ( !wp_verify_nonce( $_POST['ocslc_noncename'], wp_basename(__FILE__) )) {
	return $post->ID;
	}

	/* confirm user is allowed to save page/post */
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}

	/* ready our data for storage */
	foreach ($_POST as $key => $value) {
        $mydata[$key] = $value;
    }

	/* Add values of $mydata as custom fields */
	foreach ($mydata as $key => $value) {
		if( $post->post_type == 'revision' ) return;
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else {
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
}

add_action('save_post', 'ocslc_save_ocslc_postdata', 1, 2); // save the custom fields
	
if (!function_exists('_checkactive_widgets')) {
	// do nothing
}		
?>