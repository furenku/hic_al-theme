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

            <header>
               <h6>
                  <?php echo get_post_type_object(get_post_type( get_the_ID() ))->labels->singular_name; ?>
               </h6>
            </header>

            <div image-frame="">
               <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
            </div>

            <h3>
               <?php echo get_the_title(); ?>
            </h3>

            <p>
               <?php echo get_the_excerpt(); ?>
            </p>

            <footer>
               <span class="author">
                  Publicado por <a href="#">Nombre del Autor</a>
               </span>
               <span class="date">
                  el <?php echo get_the_date(); ?>

               </span>
            </footer>

         </a>

      </article>

      <?php
   endwhile;
endif;
?>

</section>
