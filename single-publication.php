<?php


get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      
      $publication_authors = get_post_meta( get_the_ID(), 'publication-info-authors', true );
      $publication_year = date_i18n( 'Y', strtotime(get_post_meta( get_the_ID(), 'publication-info-date', true )));
      
      $download_link = get_post_meta(get_the_ID(),'publication-file',true);

      ?>

    <article class="single single-publication">

        <?php if( get_the_post_thumbnail(get_the_ID(),'full') ) : ?>

        <div class="article-cover-photo" image-frame contain>
            <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
        </div>

        <?php endif; ?>

        <header>

            <h1 class="title">
                <?php echo get_the_title(); ?>
            </h1>

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

            </div>


        </header>

        <section class="content">

            <header>

                <?php share_post_widget(); ?>

            </header>


            <?php echo apply_filters('the_content', get_the_content()); ?>

        </section>

    </article>

    <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>