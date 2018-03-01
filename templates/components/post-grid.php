<?php

/*
- text
- font_size
*/

// if no category, fail silently

if( ! $post_type ) {
  $post_type = 'post';
}

if( ! $category ) {
  $category = 0;
}

if( ! $number ) {
  $number = -1;
}


if( true ) {


  ?>

  <div class="post_grid dynamic_component">

       <ul class="posts">
          <?php

          $q = new WP_Query( array(
             'post_type'=> $post_type,
             'posts_per_page' => $number,
             'cat' => $category,
          ));

          if( $q->have_posts() ) :

             while ( $q->have_posts() ) :
                $q->the_post();
                ?>

                <article>

                 <?php if( ! $post_components['link_disabled'] ) { ?>
                   <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                 <?php } ?>

                   <?php if( ! $post_components['thumbnail_disabled'] ) { ?>
                     <div image-frame>
                       <?php echo get_the_post_thumbnail(get_the_ID()); ?>
                     </div>
                   <?php } ?>

                   <?php if( ! $post_components['title_disabled'] ) { ?>
                     <h5>
                        <?php echo apply_filters('the_title',get_the_title()); ?>
                     </h5>
                   <?php } ?>

                   <?php if( ! $post_components['date_disabled'] ) { ?>
                     <div class="date">
                        <?php echo get_the_date(); ?>
                     </div>
                   <?php } ?>

                   <?php if( ! $post_components['excerpt_disabled'] ) { ?>
                     <p>
                       <?php echo apply_filters('the_excerpt',get_the_excerpt()); ?>
                     </p>
                   <?php } ?>

                   <?php if( ! $post_components['link_disabled'] ) { ?>
                      <button>
                         Ver más
                      </button>
                   </a>
                   <?php } ?>

                </article>

                <?php
             endwhile;
          else:
            ?>
            <div class="text-box" style="height:65vh">

              <h3>No hay Contenidos</h3>

            </div>
            <?php
          endif;
          ?>
       </ul>


  </div>

<?php
}
?>
