<section id="<?php echo name2slug( $post_type ) . '-' . name2slug( $category ); ?>" class="post-slider dynamic-content">

  <?php

  if( $q->have_posts() ) :
     while ( $q->have_posts() ) :
        $q->the_post();

        $id = get_the_ID();
        ?>

        <article class="slide post-slide">


             <div image-frame>
               <?php echo get_the_post_thumbnail($id,'full'); ?>
             </div>

             <div class="text">

               <a href="<?php echo get_the_permalink($id); ?>">
                <h4>
                   <?php
                   echo apply_filters('the_title', get_the_title( $id )); ?>
                </h4>

                <p>
                   <?php echo apply_filters('the_excerpt', wp_trim_words(get_the_excerpt( $id ),22)); ?>
                </p>
              </a>

              <footer>
                <a href="<?php echo get_the_permalink($id); ?>">
                  Ver Más
                </a>
              </footer>

             </div>


        </article>

        <?php


     endwhile;
  endif;

  ?>


</section>
