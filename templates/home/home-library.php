<section id="home-library" data-scroll-id="biblioteca">

  <h3>
    Biblioteca
  </h3>


  <section id="home-library-publications" class="row">

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
        $q = new WP_Query(array(
          'post_type' => array('media_content'),
          // 'usertype?' => array('memberr'),
          'posts_per_page' => 4,
          'tax_query' => array(
            array(
              'taxonomy' => 'media_content_type',
              'field'    => 'slug',
              'terms'    => 'infografico',
              'operator' => 'NOT IN',
            ),
          ),
        )
      );
      if( $q->have_posts() ) :
        while ( $q->have_posts() ) :
          $q->the_post();
          ?>


          <li>
            <!-- <div image-frame>
              <?php echo get_the_post_thumbnail(); ?>
            </div> -->
            <div class="text-center font-m">
              <i class="fa fa-dot-circle-o"></i>
            </div>
            <footer>
              <h6 class="text-center">
                <?php echo get_the_terms(get_the_ID(),'media_content_type')[0]->name; ?>
              </h6>
            </footer>
          </li>


          <?php
        endwhile;
      endif;
      ?>
    </ul>

  </nav>

  <nav id="redes">
    <h5 class="text-center">
      En redes:
    </h5>
    <ul>
      <?php for ($i=0; $i < 3; $i++) : ?>

        <li>
          <i class="fa fa-dot-circle-o"></i>

          <h5>
            Red Medios
          </h5>
        </li>


      <?php endfor; ?>
    </ul>

  </nav>

  <footer>

    <a href="#">
      <button type="button" class="more_link_button">
        Ver contenido <b>Multimedia</b>
      </button>
    </a>

  </footer>
</section>

<section id="home-library-infographics">
  <h4>
    Infográficos
  </h4>

  <ul>
    <?php
    $q = new WP_Query(array(
      'post_type' => array('media_content'),
      // 'usertype?' => array('memberr'),
      'posts_per_page' => 4,
      'tax_query' => array(
        array(
          'taxonomy' => 'media_content_type',
          'field'    => 'slug',
          'terms'    => 'infografico'
        ),
      ),
    )
  );
  if( $q->have_posts() ) :
    while ( $q->have_posts() ) :
      $q->the_post();
      ?>

      <li>
        <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">
          <h5>
            <?php echo apply_filters('the_title',get_the_title()); ?>
          </h5>
          <span class="date">
            <?php echo get_the_date('F \d\e\l Y', get_the_ID()); ?>
          </span>
        </a>
      </li>


      <?php
    endwhile;
  endif;
  ?>
</ul>

<footer>
  <a href="#">
    <button type="button" class="more_link_button">
      Ver más Infográficos
    </button>
  </a>
</footer>

</section>


<section id="home-library-calls_to_action" vcenter>

  <div class="row row-eq-height">


  <?php
  $q = new WP_Query( array(
    'post_type'=>'call_to_action',
    'posts_per_page' => 2,
    'tax_query' => array(
      array(
        'taxonomy' => 'call_to_action-location',
        'field'    => 'slug',
        'terms'    => 'library',
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
        <p>
          <?php echo get_the_content(); ?>
        </p>
        <a href="">
          <a href="<?php echo get_post_meta( get_the_ID(), 'call_to_action-url', true ); ?>" target="_blank">
            <button>
              <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
            </button>
          </a>
        </a>

      </article>

      <?php
    endwhile;
  endif;
  ?>

</div>
<!-- .row-eq-height -->

</section>

</div>
<!-- .row-eq-height -->

</section>
