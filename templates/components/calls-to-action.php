<?php

/*
- text
- font_size
*/

// if no category, fail silently

if( $site_location ) {

  if( ! $number ) {
    $number = 2;
  }


  ?>

  <div class="calls_to_action dynamic_component">

       <ul class="calls_to_action">
          <?php
          $q = new WP_Query( array(
             'post_type'=>'call_to_action',
             'posts_per_page' => $number,
             'tax_query' => array(
                array(
                   'taxonomy' => 'call_to_action-location',
                   'field'    => 'id',
                   'terms'    => $site_location,
                ),
             ),
          ));

          if( $q->have_posts() ) :

             while ( $q->have_posts() ) :
                $q->the_post();
                ?>

                <article>

                   <h4>
                      <?php echo get_the_content(); ?>
                   </h4>

                   <a href="<?php echo get_post_meta(get_the_ID(),'call_to_action-url',true); ?>">
                      <button>
                         <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                      </button>
                   </a>

                </article>

                <?php
             endwhile;
          endif;
          ?>
       </ul>


  </div>

<?php
}
?>
