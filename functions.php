<?php
// Add RSS links to <head> section
	automatic_feed_links();

// Load jQuery
	// if ( !is_admin() ) {
	//    wp_deregister_script('jquery');
	//    wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	//    wp_enqueue_script('jquery');
	// }

//jQuery Google API
    function modify_jquery() {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
        wp_enqueue_script('jquery');
        }
        add_action('init', 'modify_jquery');
	
// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
// Add Sidebar
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
// Thumbnail sizes
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
    }
    if ( function_exists( 'add_image_size' ) ) { 
        add_image_size( 'slide-size', 1600, 500, true );
        add_image_size( 'huge-size', 2600, 1000, true );      
    }
?>