<?php
if( ! $post_type ) {
  $post_type = 'post';
}

if( ! $category ) {
  $category = 0;
}

if( ! $number ) {
  $number = -1;
}

if( ! $query ) {

  $query = new WP_Query( array(
     'post_type'=> $post_type,
     'posts_per_page' => $number,
     'cat' => $category,
  ));

}
?>


<section class="post-map">

  <section id="post-map-map" class="post-map-map"></section>

  <section class="post-map-posts-container">

    <ul class="location_list post_list">

      <?php


      if( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();

          $latitude = get_post_meta( get_the_ID(), 'content-map_location-latitude', true );
          $longitude = get_post_meta( get_the_ID(), 'content-map_location-longitude', true );

          $country = get_post_meta( get_the_ID(), 'content-place-country', true );
          $location = get_post_meta( get_the_ID(), 'content-place-location', true );

          $author_id =  get_the_author_meta( 'ID' );

          if( ! $latitude || $longitude ) {
            $user = get_userdata( $author_id );

            if ( in_array( 'member_role', (array) $user->roles ) ) {
              $latitude = esc_attr( get_the_author_meta( 'latitude', $user->ID ) );
              $longitude = esc_attr( get_the_author_meta( 'longitude', $user->ID ) );
            }
          }


          if( ! $country || $location ) {

            if ( in_array( 'member_role', (array) $user->roles ) ) {
              $country = esc_attr( get_the_author_meta( 'country', $user->ID ) );
              $location = esc_attr( get_the_author_meta( 'location', $user->ID ) );
            }

          }


          ?>

          <article
          class="location_item"
          data-id="<?php echo get_the_ID(); ?>"
          data-latitude="<?php echo $latitude; ?>"
          data-longitude="<?php echo $longitude; ?>"
          >

          <h4 class="title">
            <?php echo apply_filters( 'the_title', get_the_title() ); ?>
          </h4>

          <p class="excerpt">
            <?php echo apply_filters( 'the_excerpt', wp_trim_words(get_the_excerpt(),15) ); ?>
          </p>

          <footer>
            <div>
              <?php echo $country; ?>, <?php echo $location; ?>
            </div>
          </footer>

        </article>

        <?php
      }
    }

    wp_reset_query();

    ?>

    </ul>



        <div class="post-map-post-preview">
          <header class="close-container">
            <button class="close-button">
              <i class="fa fa-arrow-left"></i>
              <span>
                Regresar
              </span>
            </button>
          </header>
          <section class="content-preview">

          </section>
        </div>

  </section>


</section>
