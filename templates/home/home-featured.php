<section id="home-featured">

   <?php

   $q = new WP_Query( array(
      'post_type' => array(
            'page',
            'post'
         ),
         'posts_per_page' => 3
         /* taxonomy featured */
      )
   );


   if( $q -> have_posts() ) :
      while ( $q -> have_posts() ) :
         $q -> the_post();
   ?>

      <article>

         <a href="#">

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
