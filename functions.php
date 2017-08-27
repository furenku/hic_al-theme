<?php

/* WP CONFIG */

add_action('init', 'wp_config');

add_action( 'admin_init' , 'register_admin_options_fields' );

function wp_config() {

   show_admin_bar( false );
   add_theme_support('post-thumbnails');
   add_post_type_support( 'page', 'excerpt' );
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
		array(
         'news_item',
         'call_to_action',
         'call_for_solidarity',
         'open_call',
         'event',
         'initiative',
         'member',
         'document',
         'publication',
         'media_content',
         'glossary-term'
      ),
		array(
			'label' => __( 'Site Hierarchy' ),
         'hierarchical' => true,
			'rewrite' => array( 'slug' => 'featured' ),

		)
	);
}

add_action( 'init', 'register_taxonomies' );




function list_item( $id, $class ) {
   ?>

   <article class="<?php echo $class ?>">

   <div image-frame="">
      <?php echo get_the_post_thumbnail( $id, 'large' ); ?>
   </div>

   <div>

      <h5>
         <?php echo get_the_title( $id ); ?>
      </h5>

      <footer>
         <span class="author">
            Publicado por <a href="#"><?php echo get_the_author( $id ); ?></a>
         </span>
         <span class="date">
            el <?php echo get_the_date( 'd \d\e F\, Y', $id ); ?>

         </span>
      </footer>


   </div>

</article>
<?php
}

function solidarity_item( $id ) {
   ?>

   <article class="solidarity_item">

   <div image-frame="">
      <?php echo get_the_post_thumbnail( $id, 'large' ); ?>
   </div>

   <div>

      <h5>
         <?php echo get_the_title( $id ); ?>
      </h5>

      <p>
         <?php echo get_the_excerpt( $id ); ?>
      </p>

      <footer>
         <span class="author">
            Publicado por <a href="#"><?php echo get_the_author( $id ); ?></a>
         </span>
         <span class="date">
            el <?php echo get_the_date( 'd \d\e F\, Y', $id ); ?>

         </span>

         <button type="button" name="button">
            Realiza una Acción
         </button>
      </footer>


   </div>

</article>
<?php
}
?>
