<?php $q = $home_solidarity_query; ?>

<section id="home-solidarity" class="content_list">

  <!-- <h4 class="title">
    Solidaridad
  </h4> -->

  <ul class="article-list">
    <?php

   if( $q->have_posts() ) :
   while ( $q->have_posts() ) :
      $q->the_post();
   ?>

      <article class="solidarity_item">

        <div image-frame="">
          <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
        </div>

        <div>

          <h5 class="title">
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
        Ver Más
        <b>Llamados de Solidaridad</b>
      </button>
    </a>
  </footer>

</section>