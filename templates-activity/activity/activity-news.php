<h1>
  Noticias
</h1>

<section class="content_list">

  <?php
  $args = array(
     // 'exclude' => array($exclude_post),
     'number'  => 12
  );
  post_type_list('news_item', $args);
  ?>

</section>

<footer>
  <?php post_type_more_button('news_item'); ?>
</footer>
