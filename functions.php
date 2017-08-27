<?php

/* WP CONFIG */

add_action('init', 'wp_config');

function wp_config() {

   show_admin_bar( false );
   add_theme_support('post-thumbnails');

}


/* Menus */

add_action('after_setup_theme','register_menus');

function register_menus() {

   register_nav_menus( array(
   	'primary' => 'Primary Menu',
   	'secondary' => 'Secondary Menu',
   ) );

}


/* Taxonomies */

function register_taxonomies() {
	// create a new taxonomy
	register_taxonomy(
		'site_hierarchy',
		'post',
		array(
			'label' => __( 'Site Hierarchy' ),
         'hierarchical' => true,
			'rewrite' => array( 'slug' => 'featured' ),

		)
	);
}

add_action( 'init', 'register_taxonomies' );

?>
