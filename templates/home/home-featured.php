<section id="home-featured">

   <?php

   $q = new WP_Query( array(
      'post_type' => array(
         'news_item',
         'call_for_solidarity',
         'open_call',
         'event',
         'document',
         'publication',
      ),
      'posts_per_page' => 3,
      'tax_query' => array(
         array(
            'taxonomy' => 'site_hierarchy',
            'field'    => 'slug',
            'terms'    => 'featured',
         ),
      ),
      /* taxonomy featured */
   )
);


if( $q -> have_posts() ) :
   while ( $q -> have_posts() ) :
      $q -> the_post();
      ?>

      <article>

         <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

            <i class="fa fa-angle-right"></i>

            <div image-frame="">
               <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
            </div>

               <header>

                  <h6 class="post-type">
                     <?php echo get_post_type_object(get_post_type( get_the_ID() ))->labels->singular_name; ?>
                  </h6>

                  <div class="title-container" vcenter>
                     <h4>
                        <?php echo get_the_title(); ?>
                     </h4>
                  </div>
               </header>



            <p>
               <?php echo get_the_excerpt(); ?>
            </p>

         </a>

         <?php if( get_post_type() == 'call_for_solidarity' ) : ?>
            <a href="<?php echo get_post_meta( get_the_ID(), 'call_to_action-url', true ); ?>">

               <button type="button" name="button">
                  <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
               </button>

            </a>
         <?php endif; ?>

        <?php article_footer(); ?>

      </article>

      <?php
   endwhile;
endif;
?>

</section>
