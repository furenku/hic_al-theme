
<?php



library_media_content_list('Video');
library_media_content_list('Fotografía');
library_media_content_list('Audio');

function library_media_content_list( $term_name ) {

  ?>
  <section id="<?php echo name2slug($term_name); ?>-list" class="media_content-list">

    <h2>
      <?php echo $term_name; ?>
    </h2>

    <ul id="library-media_content_list" class="media_content_list">

      <?php
      // $publications_page = ( get_query_var( 'publications_page' ) ) ? get_query_var( 'publications_page' ) : 1;

      $posts_per_page = 6;
      $this_url = get_permalink();

      $term = get_term_by( 'name', $term_name, 'media_content-type' );


      $taxonomy_term_link = get_term_link( get_term_by('name',$term_name,'media_content-type') );
      $taxonomy_term_name = $term->name;

      $q = new WP_Query(array(
        'post_type' => array('media_content'),
        'posts_per_page' => $posts_per_page,

        'tax_query' => array(
        		array(
        			'taxonomy' => 'media_content-type',
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
