<section id="home-membership-peer_posts">

    <h3>
        La palabra de miembr@s y amig@s
    </h3>

    <ul>

        <?php
   // $palabra_cat = get_term_by( 'slug', 'palabra-de-miembros-y-amigs', 'category' );
   $q = new WP_Query(array(
      'post_type' => array('post'),
      // 'usertype?' => array('memberr'),
      // 'cat' => $palabra_cat => term_id,
      'posts_per_page' => 5
   )
   );
   if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
         $q->the_post();

         ?>

            <article class="peer-post">

                <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

                    <div image-frame>
                        <?php echo get_the_post_thumbnail(get_the_ID()); ?>
                    </div>

                    <div>

                        <h5 class="title">
                            <?php echo apply_filters('the_title', get_the_title( $id )); ?>
                        </h5>

                        <div class="excerpt">
                            <?php echo apply_filters('the_excerpt', wp_trim_words(get_the_excerpt( $id ),22)); ?>
                        </div>

                    </div>
                </a>

                <?php article_footer(); ?>

            </article>

            <?php


      endwhile;
   endif;

   ?>

    </ul>

    <footer>
        <a href="#">
            <button type="button" name="button" class="more_link_button">
                Ver más
                <b>Entradas</b>
            </button>
        </a>
    </footer>

</section>