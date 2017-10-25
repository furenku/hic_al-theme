<section id="home-activity">

   <h1>
      Actividad Reciente
   </h1>

   <section id="home-activity-news">

      <h2>
         Noticias
      </h2>

      <?php

         // Noticia Principal

         $post_type = 'news_item';

         $q = new WP_Query( array(
            'post_type'=>$post_type,
            'posts_per_page' => 1,
            'tax_query' => array(
               array(
                  'taxonomy' => 'site_hierarchy',
                  'field'    => 'slug',
                  'terms'    => 'home-main-news',
               ),
            ),
         )
         );

         if( $q->have_posts() ) {
         while ( $q->have_posts() ) {
            $q->the_post();

            $exclude_post = get_the_ID();

            ?>

            <article class="latest <?php echo $post_type; ?>">

               <div>
                  <div image-frame>
                     <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
                  </div>
                  <footer>
                     <span class="author">
                        Publicado por <a href="#">Nombre del Autor</a>
                     </span>
                     <span class="date">
                        el <?php echo get_the_date(); ?>

                     </span>
                  </footer>
               </div>

               <div>

                  <h3>
                     <?php echo get_the_title(); ?>
                  </h3>

                  <p>
                     <?php echo get_the_excerpt(); ?>
                  </p>

               </div>


            </article>


            <?php
         }
      }


      $args = array(
         'exclude' => array($exclude_post)
      );
      post_type_list_box('news_item', $args);

      ?>

   </section>

   <?php
   post_type_list_box('open_call');
   post_type_list_box('event');
   ?>


   <section id="home-activity-solidarity" class="home-activity-content_list">

      <h3>
         Solidaridad
      </h3>

      <ul class="solidarity">
         <?php
         $q = new WP_Query( array(
            'post_type'=>'call_for_solidarity',
            'posts_per_page' => 1
         )
         );

         if( $q->have_posts() ) :
         while ( $q->have_posts() ) :
            $q->the_post();


         ?>

            <article class="solidarity_item">

               <div image-frame="">
                  <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
               </div>

               <div>

                  <h5>
                     <?php echo get_the_title(); ?>
                  </h5>

                  <p>
                     <?php echo get_the_excerpt(); ?>
                  </p>

                  <footer>

                     <a href="<?php echo get_post_meta( get_the_ID(),'call_to_action-url', true ); ?>">
                        <button>
                           <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                        </button>
                     </a>


                     <span class="author">
                        Publicado por <a href="#"><?php echo get_the_author( get_the_ID() ); ?></a>
                     </span>
                     <span class="date">
                        el <?php echo get_the_date( 'd \d\e F\, Y', get_the_ID() ); ?>

                     </span>

                  </footer>


               </div>

            </article>

         <?php
         endwhile;
         endif;
         ?>
      </ul>

      <a href="<?php echo get_post_type_archive_link( 'call_for_solidarity' ); ?>">
         <button type="button" name="button">
            Ver Más <b>Llamados de Solidaridad</b>
         </button>
      </a>

   </section>

</section>
