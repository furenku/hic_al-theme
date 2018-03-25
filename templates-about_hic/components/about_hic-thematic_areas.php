<section class="text">

  <h2>
    Áreas Temáticas
  </h2>

  <div class="content">

    <?php echo apply_filters('the_content',get_the_content($page->ID)); ?>

  </div>

</section>

<nav>
    <ul>
      <?php
      $q = new WP_Query(array(
        'post_type' => array('thematic-area'),
        'posts_per_page' => -1
      )
    );
    if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
        $q->the_post();
        ?>

        <li>

          <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

            <div image-frame contain>
              <?php echo get_the_post_thumbnail(); ?>
            </div>

            <div class="text">
              <h4>
                <?php echo apply_filters('the_title',get_the_title()); ?>
              </h4>

              <p>
                <?php echo apply_filters('the_excerpt',get_the_excerpt()); ?>
              </p>
            </div>

          </a>
        </li>

        <?php

      endwhile;
    endif;

    ?>

  </ul>
</nav>
