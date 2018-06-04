<ul>

    <?php
      $q = new WP_Query(array(
        'post_type' => array('publication'),
        'posts_per_page' => 4
      )
    );
    if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
        $q->the_post();

        $title = apply_filters('the_title',get_the_title());
        $image = get_the_post_thumbnail();
        $publication_authors = get_post_meta( get_the_ID(), 'publication-info-authors', true );
        $publication_year = date_i18n( 'Y', strtotime(get_post_meta( get_the_ID(), 'publication-info-date', true )));
        $download_link = get_post_meta( get_the_ID(), 'publication-file', true);

        ?>

        <article>

            <a href="">
                <div image-frame>
                    <?php echo $image; ?>
                </div>

                <div class="text">

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

                        <?php if( $download_link && $download_link != "" ) : ?>
                        <a href="<?php echo $download_link; ?>" class="download-button" target="_blank">
                            <i class="fa fa-download"></i>
                            <span>
                                Descargar
                            </span>
                        </a>
                        <?php endif; ?>

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
    <a href="<?php echo get_post_type_archive_link('publication'); ?>">
        <button type="button" name="button" class="more_link_button">
            Ver Más
            <b>Publicaciones</b>
        </button>
    </a>
</footer>