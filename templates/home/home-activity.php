
<section id="home-activity" data-scroll-id="actividad_reciente">

  <h3>
    Actividad Reciente
  </h3>

   <section id="home-activity-articles-news" class="row row-eq-height">


     <section id="home-activity-news" class="news_item-container">

       <h4>
         Noticias
       </h4>

        <?php
            $args = array(
               // 'exclude' => array($exclude_post),
               'number'  => 5
            );
            post_type_list('news_item', $args);
          ?>
          <footer>
            <?php post_type_more_button('news_item'); ?>
          </footer>
        </section>


      <section id="home-activity-articles" class="articles-container">

        <h4>
          Artículos
        </h4>

        <?php

           $articles_cat = get_term_by('name','Artículos','category')->term_id;


           $post_type = 'post';

           $q = new WP_Query( array(
              'post_type'=>$post_type,
              'posts_per_page' => 3,
              'cat' => $articles_cat

           )
           );

           if( $q->have_posts() ) {
           while ( $q->have_posts() ) {
              $q->the_post();

              $exclude_post = get_the_ID();

              ?>

              <article class="article">

<a href="<?php echo get_the_permalink(get_the_ID()); ?>">

  <div class="image_container">

    <div image-frame>
       <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
    </div>

  </div>

  <div class="text_container">

    <header>
      <h5>
         <?php echo get_the_title(); ?>
      </h5>
      <?php article_footer(); ?>

    </header>

    <p>
       <?php echo apply_filters( 'the_excerpt', wp_trim_words(get_the_excerpt(),20) ); ?>
    </p>

  </div>


</a>
              </article>


              <?php
           }
        }


        ?>

        <footer>
          <a href="<?php echo get_category_link( $articles_cat );  ?>">
            <button type="button" name="button">
              Ver Más <b>Artículos</b>
            </button>
          </a>
        </footer>

      </section>

   </section>

   <div class="row row-eq-height">

        <section id="home-activity-open_call" class="home-activity-content_list">

          <h4>
             Convocatorias
          </h4>

          <?php
          post_type_list('open_call',array('number'=>4));
          ?>

          <footer>
            <a href="<?php echo get_post_type_archive_link( 'open_call' ); ?>">
               <button type="button" name="button" class="more_link_button">
                  Ver Más <b>Convocatorias</b>
               </button>
            </a>
          </footer>

        </section>

        <section id="home-activity-event" class="home-activity-content_list">

          <h4>
             Eventos
          </h4>

          <?php
          post_type_list('event',array('number'=>4));
          ?>

          <footer>
            <a href="<?php echo get_post_type_archive_link( 'event' ); ?>">
               <button type="button" name="button" class="more_link_button">
                  Ver Más <b>Eventos</b>
               </button>
            </a>
          </footer>

        </section>


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
<div class="button-container">

                       <a href="<?php echo get_post_meta( get_the_ID(),'call_to_action-url', true ); ?>">
                          <button>
                             <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                          </button>
                       </a>

                     </div>
                       <?php article_footer(); ?>


                    </div>

                 </article>

              <?php
              endwhile;
              endif;
              ?>
           </ul>

           <footer>
             <a href="<?php echo get_post_type_archive_link( 'call_for_solidarity' ); ?>">
                <button type="button" name="button" class="more_link_button">
                   Ver Más <b>Llamados de Solidaridad</b>
                </button>
             </a>
           </footer>

        </section>

   </div>
</section>
