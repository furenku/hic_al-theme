<?php
global $microsite_id;
?>

<section id="microsite-intro" class="row row-eq-height">

  <div class="text">

    <h1>
      <?php echo apply_filters("the_title",get_the_title()); ?>
    </h1>

    <p>
      <?php echo apply_filters("the_content",get_post($microsite_id)->post_content); ?>
    </p>

  </div>

  <?php
  get_template_part("templates/microsite/microsite-calls_to_action");
  ?>

</section>
