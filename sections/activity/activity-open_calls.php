<h1>
  Convocatorias
</h1>

<section class="content_list">

  <?php
  $args = array(
     // 'exclude' => array($exclude_post),
     'number'  => 12
  );
  post_type_list('open_call', $args);
  ?>

</section>


<footer>
  <?php post_type_more_button('open_call'); ?>
</footer>
