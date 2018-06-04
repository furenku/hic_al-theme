<section id="home-about_hic-documents" class="more_link_footer">

<h4>
  Documentos
</h4>

<ul>
  <?php
  $q = new WP_Query(array(
    'post_type' => array('document'),
    'posts_per_page' => 3,

  )
);
if( $q->have_posts() ) :
  while ( $q->have_posts() ) :
    $q->the_post();
    ?>
    <article>

      <a href="#">
        <h5>
          <?php echo apply_filters('the_title', get_the_title()); ?>
        </h5>

        <?php article_footer(); ?>
      </a>

    </article>

    <?php

  endwhile;
endif;

?>

</ul>

<footer>
<a href="<?php echo get_post_type_archive_link('document'); ?>">
  <button type="button" name="button" class="more_link_button">
    Ver Más <b>Documentos de HIC</b>
  </button>
</a>
</footer>

</section>
