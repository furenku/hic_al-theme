<h3>
  Actividad Reciente
</h3>

<section id="home-activity">


   <section id="home-activity-news">

      <h4>
         Noticias
      </h4>

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

                  <?php article_footer(); ?>

               </div>

               <div>

                  <h4>
                     <?php echo get_the_title(); ?>
                  </h4>

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

      ?>

      <section>
        <?php post_type_list('news_item', $args); ?>
      </section>
      <footer>
        <?php post_type_more_button('news_item'); ?>
      </footer>

   </section>

   <div class="row row-eq-height">

        <?php
        post_type_list_box('open_call',array('number'=>5));
        post_type_list_box('event',array('number'=>5));
        ?>


        <section id="home-activity-solidarity" class="home-activity-content_list">

           <h4>
              Solidaridad
           </h4>

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

                       <a href="<?php echo get_post_meta( get_the_ID(),'call_to_action-url', true ); ?>">
                          <button>
                             <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                          </button>
                       </a>

                       <?php article_footer(); ?>


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

   </div>
</section>
