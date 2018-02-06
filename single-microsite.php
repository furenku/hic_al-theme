<?php
get_header();


if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

        $dynamic_contents = get_post_meta(get_the_ID(),'microsite-content',true);


?>

  <section class="dynamic-content-area">

<?php

  if( is_array( $dynamic_contents ) ) :

    foreach( $dynamic_contents as $dynamic_content ) :

      switch( $dynamic_content['content_type'] ) :

        case "text-box":
          set_query_var("text", $dynamic_content['text'] );
          set_query_var("font_size", $dynamic_content['font_size']);
          get_template_part('templates/components/text-box');
        break;

        case "image_upload":
          // var_dump( $dynamic_content );
          set_query_var("image", $dynamic_content['image_upload'] );
          set_query_var("contain", $dynamic_content['contain']);
          get_template_part('templates/components/image-box');
        break;

        case "embed":
          set_query_var("embed", $dynamic_content['embed'] );
          get_template_part('templates/components/embed-box');
        break;

        case "calls_to_action":
          set_query_var("site_location", $dynamic_content['site_location'] );
          set_query_var("number", $dynamic_content['number'] );
          get_template_part('templates/components/calls-to-action');
        break;

      endswitch;
    endforeach;


  else:

    echo "is not array!";

  endif;

?>


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
