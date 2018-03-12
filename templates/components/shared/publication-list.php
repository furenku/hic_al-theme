<?php

  $total_posts = $q->found_posts;

  if( $q->have_posts() ) :

    ?>
    <ul id="library-publication_list" class="publication_list">
    <?php

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
          </a>

          <div class="text">

            <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
              <h5>
                <?php echo $title; ?>
              </h5>
            </a>

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

              <?php if( $show_footer ) {
                article_footer();
              }
               ?>
              <?php # if( $show_footer ) { article_footer(); } ?>

            </div>


          </div>

      </article>

      <?php

    endwhile;

    ?>
    </ul>
    <?php

  endif;

?>
