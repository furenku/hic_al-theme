<?php

function post_type_countries( $post_type ) {

    $countries = array();
    $args = array( "post_type" => $post_type, "posts_per_page" => -1 );
    $loop  = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();

        $this_country = get_post_meta( get_the_ID(), 'content-place-country', true );

        if ( ! array_key_exists( $this_country, $countries ) ) {
          $countries[ $this_country ] = array();
        }

        array_push( $countries[ $this_country ], get_the_ID() );

    endwhile;

    rsort( $countries );

    return $countries;

}

// function all_post_countries() {
  // $country_cpts = [
  //   "news_item",
  //   "call_for_solidarity",
  //   "open_call",
  //   "event",
  //   "member",
  //   "document",
  //   "publication",
  //   "media_content"
  // ];
// }

//
// global $post;
// $transient = 'all-post-years';
// $timeout   = 14400; // 4 hours
//
// if ( false === $out = get_transient( $transient ) ) {
//
//     $years = array();
//     $loop  = new WP_Query( $args );
//
//     while ( $loop->have_posts() ) : $loop->the_post();
//         $this_year = get_post_meta( $post->ID, 'event_date', true );
//         if ( $this_year = date( 'Y', $this_year ) ) {
//             if ( ! in_array( $this_year, $years ) ) {
//                 $years[] = $this_year;
//             }
//         }
//     endwhile;
//
//     rsort( $years ); // sorts the years array into reverse order
//
//     foreach ( $years as $year ) {
//         $out .= '<a href="#' . $year . '" name="y' . $year . '" class="inactive">' . $year . '</a> <span class="sep">|</span> ';
//     }
//
//     if ( $out ) {
//         set_transient( $transient, $out, $timeout );
//     }
//
// }
//
// echo $out;














//
// global $post;
// global $cpt_countries;
//
// $country_cpts = [
//   "news_item",
//   "call_for_solidarity",
//   "open_call",
//   "event",
//   "member",
//   "document",
//   "publication",
//   "media_content"
// ];
//
//   $transient = $country_cpt .'-years';
//
//   $timeout   = 14400; // 4 hours
//
//   if ( false === $out = get_transient( $transient ) ) {
//
//
//     $cpt_countries = array();
//
//     foreach( $country_cpts as $country_cpt ) :
//
//
//       $years = array();
//       $loop  = new WP_Query( $args );
//
//       while ( $loop->have_posts() ) : $loop->the_post();
//           $this_year = get_post_meta( $post->ID, 'event_date', true );
//           if ( $this_year = date( 'Y', $this_year ) ) {
//               if ( ! in_array( $this_year, $years ) ) {
//                   $years[] = $this_year;
//               }
//           }
//       endwhile;
//
//       rsort( $years ); // sorts the years array into reverse order
//
//       foreach ( $years as $year ) {
//           $out .= '<a href="#' . $year . '" name="y' . $year . '" class="inactive">' . $year . '</a> <span class="sep">|</span> ';
//       }
//
//
//
//         $cpt_countries[ $country_cpt ] = $out;
//
//       endforeach;
//
//
//       if ( $out ) {
//           set_transient( $transient, $out, $timeout );
//       }
//
//   }
//
?>
