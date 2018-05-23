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
      $download_link = get_post_meta(get_the_ID(),'publication-file',true);
      
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
                  <?php if( $publication_authors ) : 
                    foreach ($publication_authors as $publication_author) :
                  ?>
                      <li>
                        <?php echo $publication_author; ?>
                      </li>
                  <?php
                    endforeach;
                  endif;
                  ?>

                </ul>
              </div>

              <div class="publication-year">
                <?php echo $publication_year; ?>
              </div>

              <?php if( $download_link && $download_link != "" ) : ?>
                <a href="<?php echo $download_link; ?>" class="download-button">
                  <i class="fa fa-download"></i>
                  <span>
                    Descargar
                  </span>
                </a>
              <?php endif; ?>


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
