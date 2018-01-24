<?php



// include_once 'hic-al-functions/post_type_countries.php';




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

      <h4>
         <?php echo $plural_label; ?>
      </h4>

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

function post_type_list( $post_type, $args = array() ) {

  $post_number = 4;
  if( $args['number'] ) {
     $post_number = $args['number'];
  }


   $exclude = array();
   if( array_key_exists('exclude',$args) ) {
      array_push($exclude, $args['exclude']);
   }

   $plural_label = get_post_type_object( $post_type )->labels->name;
   $plural_slug = str_replace(" ", "_", strtolower($plural_label));

   ?>

   <!-- <section
   id="home-activity-<?php echo $plural_slug; ?>"
   class="home-activity-content_list"
   > -->

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

   <!-- </section> -->

<?php
}

function post_type_more_button( $post_type, $args = array() ) {

  $plural_label = get_post_type_object( $post_type )->labels->name;

  ?>

  <a href="<?php echo get_post_type_archive_link( $post_type );  ?>">
    <button type="button" name="button">
      Ver Más <b><?php echo $plural_label; ?></b>
    </button>
  </a>

  <?php
}


/* WP CONFIG */

add_action('init', 'wp_config');


/* THEME SETTINGS */




include_once 'backend/theme-settings.php';


add_action( 'admin_init' , 'register_admin_options_fields' );

function wp_config() {

   show_admin_bar( false );
   add_theme_support('post-thumbnails');
   add_post_type_support( 'page', 'excerpt' );

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




function list_item( $id, $class ) {
   ?>

   <article class="<?php echo $class ?>">

     <!-- <a href="#"> -->

      <div image-frame="">
         <?php echo get_the_post_thumbnail( $id, 'large' ); ?>
      </div>

      <div>

         <h6>
            <?php echo wp_trim_words(get_the_title( $id ),18); ?>
         </h6>

         <footer class="article-footer">

            <?php if( get_post_type( $id ) == 'open_call' ) :  ?>
               <span class="open_call-deadline">
                  Fecha de Cierre:
                  <?php echo date_i18n('F d',strtotime(get_post_meta($id,'open_call-deadline',true))); ?>
               </span>
            <?php elseif( get_post_type( $id ) == 'event' ) : ?>
               <span class="event_date">
                  Fecha del Evento:
                  <?php echo date_i18n('F d',strtotime(get_post_meta($id,'event-date',true))); ?>
               </span>
            <?php
          endif;

            article_footer_contents();

            ?>

         </footer>


      </div>

    <!-- </a> -->

   </article>
   <?php
}




function article_footer() {
  ?>

  <footer class="article-footer">

    <?php article_footer_contents(); ?>

  </footer>

  <?php
}

function article_footer_contents() {

  $author = get_the_author_link();

  $country = get_post_meta(get_the_ID(),'content-place-country',true);
  $date = get_the_date();

  $categories = get_the_category();

  ?>

    <div class="info">
      <?php if( $author && $author != "" ) : ?>
      <div class="author">
         Publicado por
         <?php echo $author; ?>
     </div>
      <?php endif; ?>

     <div class="place-date">

        <?php if( $country && $country != "" ) : ?>
            <span class="place">
             <?php echo $country; ?>,
           </span>
        <?php endif; ?>

        <?php if( $date && $date != "" ) : ?>
          <span class="date">
             <?php echo $date; ?>
          </span>
        <?php endif; ?>

     </div>
    </div>

     <ul class="categories">

       <?php foreach($categories as $category) :  ?>

         <li class="category">

           <a href="<?php echo get_category_link($category->cat_ID); ?>">
             <?php echo $category->name; ?>
           </a>

         </li>

       <?php endforeach; ?>

     </ul>

  <?php
}





/* search highlight */

function search_excerpt_highlight() {
    $excerpt = get_the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $excerpt);
    echo '<p>' . $excerpt . '</p>';
}
function search_title_highlight() {
    $title = get_the_title();
    $keys = implode('|', explode(' ', get_search_query()));
    $title = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $title);
    echo $title;
}
function test_func() {
  return "test!";
}



/* query vars */


function hic_al_query_vars_filter($vars) {
  $vars[] = 'date_start';
  $vars[] .= 'date_end';
  $vars[] .= 'categories';
  $vars[] .= 'countries';
  return $vars;
}
add_filter( 'query_vars', 'hic_al_query_vars_filter' );




function post_type_countries( $post_type ) {

    global $countries_posts;
    $countries_posts = array();
    $args = array( "post_type" => $post_type, "posts_per_page" => -1 );
    $loop  = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();

        $this_country = get_post_meta( get_the_ID(), 'content-place-country', true );


        if ( ! array_key_exists( $this_country, $countries_posts ) ) {
          $countries_posts[ $this_country ] = array();
        }

        array_push( $countries_posts[ $this_country ], get_the_ID() );


    endwhile;


    return $countries_posts;

}

?>
