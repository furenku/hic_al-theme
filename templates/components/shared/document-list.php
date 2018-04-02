<ul class="document-list">

  <?php
  $documents_page = ( get_query_var( 'documents_page' ) ) ? get_query_var( 'documents_page' ) : 1;
  $page_var_name = 'documents_page';
  $page_var = $documents_page;

  $posts_per_page = 4;

  $q = new WP_Query(array(
    'post_type' => array('document'),
    'posts_per_page' => $posts_per_page,
    'tax_query' => $tax_query,
    'paged' => $documents_page
  )
  );

  $total_posts = $q->found_posts;

  if( $q->have_posts() ) :
    while ( $q->have_posts() ) :
      $q->the_post();

      $title = apply_filters('the_title',get_the_title());
      $excerpt = wp_trim_words(apply_filters('the_excerpt',get_the_excerpt()),15);
      $file = get_post_meta( get_the_ID(), 'document-file', true );

      ?>

      <article>

        <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

          <h5 class="title">
            <?php echo $title; ?>
          </h5>

          <p class="excerpt">
            <?php echo $excerpt; ?>
          </p>

        </a>

        <footer>

          <?php if ($file) : ?>

            <a href="<?php echo $file; ?>" download>
              <button class="link-button">
                <i class="fa fa-download"></i>
              </button>
            </a>

          <?php endif; ?>

          <?php article_footer(); ?>

        </footer>

          </div>

      </article>

      <?php

    endwhile;
  endif;

  ?>

</ul>


<footer>

  <?php include(locate_template('templates/components/shared/pagination-menu.php')); ?>

</footer>
