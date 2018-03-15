
  <dl id="library-glossary_term_list" class="glossary_term-list">

    <?php

    $q = new WP_Query(array(
      'post_type' => array('glossary-term'),
      'posts_per_page' => "-1",
      'orderby' => 'title',
      'order'   => 'ASC',
    )
    );

    if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
        $q->the_post();

        $title = apply_filters('the_title',get_the_title());
        $content = apply_filters('the_content',get_the_content());

        ?>

        <dt class="glossary-term">
          <?php echo $title; ?>
        </dt>

        <dd class="glossary-definition">
          <?php echo $content; ?>
        </dd>


        <?php

      endwhile;
    endif;

    ?>

</dl>
