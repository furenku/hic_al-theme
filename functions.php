<?php;


add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');



function post_type_list_box( $post_type, $args = array() ) {

   if( array_key_exists('number',$args) ) {
      $post_number = $args['number'];
   } else {
      $post_number = 3;
   }

   $exclude = array();
   if( array_key_exists('exclude',$args) ) {
      array_push($exclude, $args['exclude']);
   }

   $plural_label = get_post_type_object( $post_type )->labels->name;
   $plural_slug = str_replace(" ", "_", strtolower($plural_label));

   ?>

   <section
   id="home-activity-<?php echo $plural_slug; ?>"
   class="home-activity-content_list"
   >

      <h3>
         <?php echo $plural_label; ?>
      </h3>

      <ul class="<?php echo $plural_slug; ?>">

         <?php
         $q = new WP_Query( array(
            'post_type'=>$post_type,
            'post__not_in' => $exclude,
            'posts_per_page' => $post_number
         ));

         if( $q->have_posts() ) {
            while ( $q->have_posts() ) {
               $q->the_post();

               list_item(get_the_ID(),$post_type);

            }
         }

         ?>

      </ul>

      <a href="<?php echo get_post_type_archive_link( $post_type );  ?>">
         <button type="button" name="button">
            Ver Más <b><?php echo $plural_label; ?></b>
         </button>
      </a>

   </section>

<?php
}


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

   register_admin_setting('organization_title', 'Organization Title');
   register_admin_setting('organization_title_1', 'Organization Title 1');
   register_admin_setting('organization_title_2', 'Organization Title 2');
   register_admin_setting('organization_subtitle', 'Organization Subtitle');
   register_admin_setting('organization_statement', 'Organization Stament', 'textarea');

}


function register_admin_setting( $slug, $label, $field_type='') {

   register_setting( 'general', $slug, 'esc_attr' );

   add_settings_field(
      $slug,
      '<label for="'.$slug.'_id">' . __( $label , $slug ) . '</label>',
      'fields_html',
      'general',
      'default',
      array('slug'=>$slug, 'field_type'=>$field_type )
   );

}
/**
* HTML for extra settings
*/
function fields_html($args) {

   $slug = $args['slug'];

   $value = get_option( $slug, '' );

   switch( $args['field_type'] ){
      case 'textarea':
         echo '<textarea id="'.$slug.'_id" name="'.$slug.'">'.esc_attr( $value ).'</textarea>';
         break;
      default:
         echo '<input type="text" id="'.$slug.'_id" name="'.$slug.'" value="' . esc_attr( $value ) . '" />';
   }
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


   // multimedia content type
   register_taxonomy(
   'media_content_type',

   array(
   'media_content'
   ),
   array(
   'label' => __( 'Media Type' ),
   'hierarchical' => true,
   'rewrite' => array( 'slug' => 'media_content_type' ),
   )
   );


   // call_to_action location
   register_taxonomy(
   'call_to_action-location',

   array(
   'call_to_action'
   ),
   array(
   'label' => __( 'Site Location' ),
   'hierarchical' => true,
   'rewrite' => array( 'slug' => 'call_to_action-location' ),
   )
   );

   // call_to_action location
   register_taxonomy(
   'document-type',

   array(
   'document'
   ),
   array(
   'label' => __( 'Document Type' ),
   'hierarchical' => true,
   'rewrite' => array( 'slug' => 'document-type' ),
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

            <?php if( get_post_type( $id ) == 'open_call' ) :  ?>
               <span class="open_call-deadline">
                  Fecha de Cierre:
                  <?php echo date_i18n('F d\,',strtotime(get_post_meta($id,'open_call-deadline',true))); ?>
               </span>
            <?php elseif( get_post_type( $id ) == 'event' ) : ?>
               <span class="event_date">
                  Fecha del Evento:
                  <?php echo date_i18n('F d\,',strtotime(get_post_meta($id,'event-date',true))); ?>
               </span>
            <?php else : ?>
            <span class="author">
               Publicado por <a href="#"><?php echo get_the_author( $id ); ?></a>
            </span>
            <span class="date">
               el <?php echo get_the_date( 'd \d\e F\, Y', $id ); ?>
            </span>

            <?php endif; ?>

         </footer>


      </div>

   </article>
   <?php
}



function peer_post_item( $id, $class ) {
   ?>

   <article class="<?php echo $class ?>">

      <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
         <h5>
            <?php echo get_the_title( $id ); ?>
         </h5>
      </a>

      <footer>
         <span class="author">
            Publicado por <a href="#"><?php echo get_the_author( $id ); ?></a>
         </span>
         <span class="date">
            el <?php echo get_the_date( 'd \d\e F\, Y', $id ); ?>

         </span>
      </footer>

   </article>

   <?php
}


?>
