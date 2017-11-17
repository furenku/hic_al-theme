<section id="home-library">

   <h1>
      Library
   </h1>


   <section id="home-library-publications" class="row">

      <ul>

         <?php
         $q = new WP_Query(array(
            'post_type' => array('publication'),
            'posts_per_page' => 4
         )
         );
         if( $q->have_posts() ) :
            while ( $q->have_posts() ) :
               $q->the_post();
      ?>

            <article>

               <a href="">
                  <div image-frame contain>
                     <?php echo get_the_post_thumbnail(); ?>
                  </div>

                  <h4>
                     <?php echo apply_filters('the_title',get_the_title()); ?>
                  </h4>

                  <footer>
                     <div class="author">
                        <?php echo get_post_meta(get_the_ID(),'publication-info-author',true); ?>
                     </div>
                     <div class="place">
                        <?php echo get_post_meta(get_the_ID(),'content-place-country',true); ?>
                     </div>
                     <div class="date">
                        <?php echo date_i18n('F\, Y',strtotime(get_post_meta(get_the_ID(),'publication-info-date',true))); ?>
                     </div>
                  </footer>

               </a>
            </article>

         <?php

                     endwhile;
                  endif;

      ?>

      </ul>

<footer>
   <a href="<?php echo get_post_type_archive_link('publication'); ?>">
      <button type="button" name="button">
         Ver Más <b>Publicaciones</b>
      </button>
   </a>
</footer>
</section>



<div class="row row-eq-height">


      <section id="home-library-media_content">
         <h2>
            Multimedia
         </h2>

         <ul>
            <?php
            $q = new WP_Query(array(
               'post_type' => array('media_content'),
               // 'usertype?' => array('memberr'),
               'posts_per_page' => 4,
               'tax_query' => array(
                  array(
                     'taxonomy' => 'media_content_type',
                     'field'    => 'slug',
                     'terms'    => 'infografico',
                     'operator' => 'NOT IN',
                  ),
               ),
            )
            );
            if( $q->have_posts() ) :
               while ( $q->have_posts() ) :
                  $q->the_post();
            ?>


<article>
   <div image-frame>
      <?php echo get_the_post_thumbnail(); ?>
   </div>
   <footer>
      <h6>
         <?php echo get_the_terms(get_the_ID(),'media_content_type')[0]->name; ?>
      </h6>
   </footer>
</article>


               <?php
            endwhile;
         endif;
   ?>
</ul>



         <footer>
            <a href="#">
               <button type="button">
                  Lorem ipsum dolor sit amet.
               </button>
            </a>

            <h5>
               En redes:
            </h5>
            <ul>
               <?php for ($i=0; $i < 3; $i++) : ?>

                  <li>
                     <i class="fa fa-dot-circle-o"></i>

                     <h5>
                        Videos
                     </h5>
                  </li>


               <?php endfor; ?>
            </ul>


         </footer>
      </section>

      <section id="home-library-infographics">
         <h2>
            Infográficos
         </h2>

         <ul>
            <?php
            $q = new WP_Query(array(
               'post_type' => array('media_content'),
               // 'usertype?' => array('memberr'),
               'posts_per_page' => 4,
               'tax_query' => array(
                  array(
                     'taxonomy' => 'media_content_type',
                     'field'    => 'slug',
                     'terms'    => 'infografico'
                  ),
               ),
            )
         );
         if( $q->have_posts() ) :
            while ( $q->have_posts() ) :
               $q->the_post();
               ?>

               <li>
                  <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">
                     <h5>
                        <?php echo apply_filters('the_title',get_the_title()); ?>
                     </h5>
                     <span class="date">
                        <?php echo get_the_date('F \d\e\l Y', get_the_ID()); ?>
                     </span>
                  </a>
               </li>


            <?php
         endwhile;
      endif;
?>
         </ul>

         <footer>
            <a href="#">
               <button type="button">
                  Lorem ipsum dolor sit amet.
               </button>
            </a>
         </footer>

      </section>

      <?php $page = get_page_by_title('Exposición Mapas'); ?>
      <section id="home-library-calls_to_action">

                  <?php
                  $q = new WP_Query( array(
                     'post_type'=>'call_to_action',
                     'posts_per_page' => 2,
                     'tax_query' => array(
                        array(
                           'taxonomy' => 'call_to_action-location',
                           'field'    => 'slug',
                           'terms'    => 'library',
                        ),
                     ),
                  ));

                  if( $q->have_posts() ) :

                     while ( $q->have_posts() ) :
                        $q->the_post();
                        ?>

                        <article>
                           <div image-frame>
                              <?php echo get_the_post_thumbnail(get_the_ID()); ?>
                           </div>
                           <p>
                              <?php echo get_the_content(); ?>
                           </p>
                           <a href="">
                              <a href="<?php echo get_post_meta( get_the_ID(), 'call_to_action-url', true ); ?>" target="_blank">
                                 <button>
                                    <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                                 </button>
                              </a>
                           </a>

                        </article>

                        <?php
                     endwhile;
                  endif;
                  ?>



      </section>

    </div>
    <!-- .row-eq-height -->

</section>
