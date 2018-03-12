
  <ul id="library-glossary_term_list" class="media_content_list">

    <?php
    $publications_page = ( get_query_var( 'publications_page' ) ) ? get_query_var( 'publications_page' ) : 1;

    $posts_per_page = 3;
    $this_url = get_permalink();

    $q = new WP_Query(array(
      'post_type' => array('publication'),
      'posts_per_page' => $posts_per_page,
      'paged' => $publications_page
    )
    );

    $total_posts = $q->found_posts;

    if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
        $q->the_post();

        $title = apply_filters('the_title',get_the_title());
        $image = get_the_post_thumbnail();
        $publication_authors = get_post_meta( get_the_ID(), 'publication-info-authors', true );
        $publication_year = date_i18n( 'Y', strtotime(get_post_meta( get_the_ID(), 'publication-info-date', true )));

        ?>

        <article>

          <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
            <div image-frame>
              <?php echo $image; ?>
            </div>

            <div>

              <h5>
                <?php echo $title; ?>
              </h5>

              <div class="publication-info">

                <div class="publication-author">

                  <ul>
                    <?php foreach ($publication_authors as $publication_author) :  ?>
                    <li>
                      <?php echo $publication_author; ?>
                    </li>
                    <?php endforeach; ?>

                  </ul>
                </div>

                <div class="publication-year">
                  <?php echo $publication_year; ?>
                </div>

              </div>

              <?php #  article_footer(); ?>

            </div>

          </a>
        </article>

        <?php

      endwhile;
    endif;

    ?>

</ul>

<footer>

  <?php include(locate_template('templates/components/shared/pagination_menu.php')); ?>

</footer>
