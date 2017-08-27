<?php

/* WP CONFIG */

add_theme_support('post-thumbnails');


/* Menús */

add_action('after_setup_theme','register_menus');

function register_menus() {

   register_nav_menus( array(
   	'primary' => 'Primary Menu',
   	'secondary' => 'Secondary Menu',
   ) );

}

?>
