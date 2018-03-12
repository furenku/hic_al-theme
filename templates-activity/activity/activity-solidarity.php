<h1>
  Solidaridad
</h1>

<ul class="call_for_solidarity_list">

  <?php
  $q = new WP_Query( array(
     'post_type'=>'call_for_solidarity',
     'posts_per_page' => 3
  )
  );

  if( $q->have_posts() ) :
  while ( $q->have_posts() ) :
     $q->the_post();


  ?>

     <article class="solidarity_item">

        <!-- <div class="image-container"> -->
          <div image-frame="">
             <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
          </div>
        <!-- </div> -->


        <div class="info">

           <section class="title" v-center>
             <h5>
                <?php echo apply_filters('the_title',get_the_title()); ?>
             </h5>
           </section>

           <section class="excerpt">
             <p>
                <?php echo apply_filters('the_excerpt',wp_trim_words(get_the_excerpt(),25)); ?>
             </p>
           </section>

           <section class="button-container">

             <a href="<?php echo get_post_meta( get_the_ID(),'call_to_action-url', true ); ?>">
                <button>
                   <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                </button>
             </a>

           </section>


        </div>

        <?php article_footer(); ?>

     </article>

  <?php
  endwhile;
  endif;
  ?>

</ul>
