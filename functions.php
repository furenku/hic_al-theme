<?php



// include_once 'hic-al-functions/post_type_countries.php';
include_once 'hic-al-functions/share_buttons.php';




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

               list_item( get_the_ID(), $post_type );

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

  if( ! $country ) {
    $country = esc_attr( get_the_author_meta( 'country' ) );
  }

  $categories = get_the_category();

  ?>

    <div class="info">
      <?php if( $author && $author != "" ) : ?>
      <div class="author">
         Por:
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








// function remove_accents($string) {
//
//     if ( !preg_match('/[\x80-\xff]/', $string) )
//         return $string;
//
//     if (seems_utf8($string)) {
//         $chars = array(
//         // Decompositions for Latin-1 Supplement
//         chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
//         chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
//         chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
//         chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
//         chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
//         chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
//         chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
//         chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
//         chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
//         chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
//         chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
//         chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
//         chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
//         chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
//         chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
//         chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
//         chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
//         chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
//         chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
//         chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
//         chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
//         chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
//         chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
//         chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
//         chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
//         chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
//         chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
//         chr(195).chr(191) => 'y',
//         // Decompositions for Latin Extended-A
//         chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
//         chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
//         chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
//         chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
//         chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
//         chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
//         chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
//         chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
//         chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
//         chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
//         chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
//         chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
//         chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
//         chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
//         chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
//         chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
//         chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
//         chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
//         chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
//         chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
//         chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
//         chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
//         chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
//         chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
//         chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
//         chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
//         chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
//         chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
//         chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
//         chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
//         chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
//         chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
//         chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
//         chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
//         chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
//         chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
//         chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
//         chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
//         chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
//         chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
//         chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
//         chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
//         chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
//         chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
//         chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
//         chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
//         chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
//         chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
//         chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
//         chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
//         chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
//         chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
//         chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
//         chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
//         chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
//         chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
//         chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
//         chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
//         chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
//         chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
//         chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
//         chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
//         chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
//         chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
//         // Euro Sign
//         chr(226).chr(130).chr(172) => 'E',
//         // GBP (Pound) Sign
//         chr(194).chr(163) => '');
//
//         $string = strtr($string, $chars);
//     } else {
//         // Assume ISO-8859-1 if not UTF-8
//         $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
//             .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
//             .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
//             .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
//             .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
//             .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
//             .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
//             .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
//             .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
//             .chr(252).chr(253).chr(255);
//
//         $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";
//
//         $string = strtr($string, $chars['in'], $chars['out']);
//         $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
//         $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
//         $string = str_replace($double_chars['in'], $double_chars['out'], $string);
//     }
//
//     return $string;
//
// }



function name2slug( $name ) {

   $strict = remove_accents( $name );

   return strtolower( str_replace(" ", "_", $strict) );

}


?>
