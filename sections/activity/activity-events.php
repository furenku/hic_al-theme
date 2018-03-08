<h1>
  Eventos
</h1>

<section class="content_list">

  <?php
  $args = array(
    // 'exclude' => array($exclude_post),
    'number'  => 12
  );
  post_type_list('event', $args);
  ?>

</section>


<footer>
  <?php post_type_more_button('event'); ?>
</footer>
