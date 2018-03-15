<?php



library_document_type_list('Mapa');
library_document_type_list('Infográfico');
library_document_type_list('Diseño');

function library_document_type_list( $term_name ) {

  ?>
  <section id="<?php echo name2slug($term_name); ?>-list" class="document_type-list">

    <h2>
      <?php echo $term_name . "s"; ?>
    </h2>

    <ul class="library-document_list">

      <?php
      // $publications_page = ( get_query_var( 'publications_page' ) ) ? get_query_var( 'publications_page' ) : 1;

      $posts_per_page = 6;

      $term = get_term_by( 'name', $term_name, 'document-type' );


      $taxonomy_term_link = get_term_link( get_term_by('name',$term_name,'document-type') );
      $taxonomy_term_name = $term->name;

      $q = new WP_Query(array(
        'post_type' => array('document'),
        'posts_per_page' => $posts_per_page,

        'tax_query' => array(
        		array(
        			'taxonomy' => 'document-type',
              'field' => 'term_id',
        			'terms'    => array($term->term_id)
        		),
        	),

          // 'paged' => $publications_page
        )
      );

      $total_posts = $q->found_posts;

      if( $q->have_posts() ) :

        while ( $q->have_posts() ) :

          $q->the_post();

          $title = apply_filters( 'the_title', get_the_title() );
          $image = get_the_post_thumbnail();

          ?>

          <article>

            <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

              <?php if( $image ) : ?>

                <div image-frame>
                  <?php echo $image; ?>
                </div>

              <?php else: ?>

                <button class="link-button">
                  <i class="fa fa-play-circle-o"></i>
                </button>

              <?php endif; ?>
            </a>

            <footer>

              <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                <h5 class="title">
                  <?php echo $title; ?>
                </h5>
              </a>

              <div class="excerpt">
                <?php echo get_the_excerpt(); ?>
              </div>

              <div class="article-footer">
                <?php article_footer(); ?>
              </div>


            </footer>

          </article>

          <?php

        endwhile;
      endif;

      ?>

    </ul>

    <footer>
      <a href="<?php echo $taxonomy_term_link; ?>">
        <button>
          Ver más <?php echo $taxonomy_term_name; ?>s
        </button>
      </a>
    </footer>

  </section>

<?php

}

?>
