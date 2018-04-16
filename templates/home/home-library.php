<section id="home-library" data-scroll-id="biblioteca">

  <h3>
    Biblioteca
  </h3>


  <section id="home-library-publications" class="row publication_list">

    <ul>

      <?php
      $q = new WP_Query(array(
        'post_type' => array('publication'),
        'posts_per_page' => 3
      )
    );
    if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
        $q->the_post();

        $title = apply_filters('the_title',get_the_title());
        $image = get_the_post_thumbnail();
        $publication_authors = get_post_meta( get_the_ID(), 'publication-info-authors', true );
        $publication_year = date_i18n( 'Y', strtotime(get_post_meta( get_the_ID(), 'publication-info-date', true )));

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
        Ver Más <b>Publicaciones</b>
      </button>
    </a>
  </footer>
</section>



<div class="row row-eq-height">


  <section id="home-library-media_content">
    <h4>
      Multimedia
    </h4>

    <nav id="multimedia">
      <ul>
        <?php

        $media_types = get_terms('media_content_type');
        foreach( $media_types as $media_type ):
          switch( $media_type->name ) {
            case 'Audio':
              $icon = 'headphones';
              break;
            case 'Video':
              $icon = 'film';
              break;
            case 'Fotografía':
              $icon = 'camera-retro';
              break;
          }
          ?>


          <li>
            <!-- <div image-frame>
              <?php echo get_the_post_thumbnail(); ?>
            </div> -->
            <div class="text-center font-m">

              <i class="fa fa-<?php echo $icon; ?>"></i>
            </div>
            <footer>
              <h6 class="text-center">
                <?php echo $media_type->name; ?>
              </h6>
            </footer>
          </li>


          <?php
        endforeach;
      ?>
    </ul>

  </nav>

  <nav id="redes">
    <h5 class="text-center">
      En redes:
    </h5>
    <ul>

        <li>
          <a href="<?php echo get_option("hic_al-url-youtube"); ?>" target="_blank">

          <i class="fa fa-youtube"></i>

          <h5>
            Youtube
          </h5>

          </a>
        </li>

        <li>
          <a href="<?php echo get_option("hic_al-url-soundcloud"); ?>" target="_blank">

          <i class="fa fa-soundcloud"></i>

          <h5>
            Soundcloud
          </h5>

          </a>
        </li>

        <li>
          <a href="<?php echo get_option("hic_al-url-flickr"); ?>" target="_blank">

          <i class="fa fa-flickr"></i>

          <h5>
            Flickr
          </h5>

          </a>
        </li>



    </ul>

  </nav>

  <footer>

    <!--
    <a href="#">
      <button type="button" class="more_link_button">
        Ver contenido <b>Multimedia</b>
      </button>
    </a>
    -->

  </footer>
</section>

<section id="home-library-documents">
  <h4>
    Documentos
  </h4>

  <ul>
    <?php
    $q = new WP_Query(array(
      'post_type' => array('document'),
      // 'usertype?' => array('memberr'),
      'posts_per_page' => 4,
      'tax_query' => array(
        array(
          'taxonomy' => 'document-type',
          'field'    => 'slug',
          'terms'    => array('interno', 'newsletter'),
          'operator'  => 'NOT IN'
        ),
      ),
    )
  );
  if( $q->have_posts() ) :
    while ( $q->have_posts() ) :

      $q->the_post();
      ?>

      <article>
        <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">
          <h5>
            <?php echo apply_filters('the_title',get_the_title()); ?>
          </h5>
          <div class="document-type">
            <?php
            $terms = get_the_terms( get_the_ID(),'document-type');
            echo $terms[0]->name;
            ?>
          </div>
          <div class="date">
            <?php echo ucfirst(get_the_date('F, Y', get_the_ID())); ?>
          </div>
        </a>
      </article>


      <?php
    endwhile;
  endif;
  ?>
</ul>

<footer>
  <a href="#">
    <button type="button" class="more_link_button">
      Ver más <b>Documentos</b>
    </button>
  </a>
</footer>

</section>


<section id="home-library-calls_to_action">
  <h4>
    Destacado
  </h4>


  <?php
  $q = new WP_Query( array(
    'post_type'=>array('publication','document'),
    'posts_per_page' => 2,
    'tax_query' => array(
      array(
        'taxonomy' => 'library-category',
        'field'    => 'slug',
        'terms'    => 'destacado',
      ),
    ),
  ));

  if( $q->have_posts() ) :

    while ( $q->have_posts() ) :
      $q->the_post();
      ?>

      <article>

        <div image-frame>
          <?php echo get_the_post_thumbnail(get_the_ID()); ?>
        </div>

        <div class="title" vcenter>
          <h5>
            <?php echo apply_filters('the_title',get_the_title()); ?>
          </h5>
        </div>

        <div class="excerpt">
          <?php echo apply_filters('the_excerpt',wp_trim_words(get_the_excerpt(),21)); ?>
        </div>

        <a href="<?php echo get_the_permalink(get_the_ID()); ?>" target="_blank">
          <button>
            Ver
          </button>
        </a>

      </article>

      <?php
    endwhile;
  endif;
  ?>


</section>

</div>
<!-- .row-eq-height -->

</section>
