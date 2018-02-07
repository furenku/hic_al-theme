<?php
get_header();


if( have_posts() ) {
   while ( have_posts() ) {
      the_post();



?>

    <section class="dynamic-content-area">

      <?php show_dynamic_contents(); ?>

    </section>

      <article id="single-microsite">

        <?php if( get_the_post_thumbnail(get_the_ID(),'full') ) : ?>

        <div class="article-cover-photo" image-frame="">
          <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
        </div>

        <?php endif; ?>


         <h1>
            <?php echo get_the_title(); ?>
         </h1>         

         <section class="content">
            <?php echo apply_filters('the_content', get_the_content()); ?>
         </section>

         <section id="map_test">

           <section id="microsite-cases-map"></section>

           <section id="post_list" class="location_list">

             <ul>

               <?php

               $args = array(
                 'post_type' => 'post',
                 'category_name'  => 'casos'
               );

               $q = new WP_Query( $args );

               if( $q->have_posts() ) {
                 while ( $q->have_posts() ) {
                   $q->the_post();

                   $latitude = get_post_meta( get_the_ID(), 'content-map_location-latitude', true );
                   $longitude = get_post_meta( get_the_ID(), 'content-map_location-longitude', true );

                   $country = get_post_meta( get_the_ID(), 'content-place-country', true );
                   $location = get_post_meta( get_the_ID(), 'content-place-location', true );

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

                   <footer>
                     <div class="col-xs-6">
                       <?php echo $country; ?>
                     </div>
                     <div class="col-xs-6">
                       <?php echo $location; ?>
                     </div>
                   </footer>

                 </article>

                 <?php
               }
             }

             wp_reset_query();

             ?>

             </ul>

           </section>


         </section>


         <section class="dynamic_contents">

          <?php foreach( $dynamic_contents as $dynamic_content ) : ?>
           <section class="dynamic_contents">

             <?php switch( $dynamic_content['content_type'] ) :

                case "text":
                  echo $dynamic_content['content_value'];
                  break;

                case "image_upload":
                  ?>
                  <img src="<?php echo $dynamic_content['content_value']; ?>" alt="">
                  <?php
                  break;

                case "embed":
                  echo $dynamic_content['content_value'];
                  break;

             endswitch; ?>

           </section>

          <?php endforeach; ?>

         </section>

      </article>

      <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>
