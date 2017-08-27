<?php

/* WP CONFIG */

add_action('init', 'wp_config');

add_action( 'admin_init' , 'register_admin_options_fields' );

function wp_config() {

   show_admin_bar( false );
   add_theme_support('post-thumbnails');

}

/**
 * Add new fields to wp-admin/options-general.php page
 */
function register_admin_options_fields() {
   register_setting( 'general', 'site_subtitle', 'esc_attr' );
   add_settings_field(
      'site_subtitle',
      '<label for="site_subtitle_id">' . __( 'Site subtitle' , 'site_subtitle' ) . '</label>',
      'fields_html',
      'general'
   );
}

/**
 * HTML for extra settings
 */
function fields_html() {
   $value = get_option( 'site_subtitle', '' );
   echo '<input type="text" id="site_subtitle_id" name="site_subtitle" value="' . esc_attr( $value ) . '" />';
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
