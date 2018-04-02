
<section class="links">

  <?php

  $hic_structure_users = get_users( array('role'=>'hic_structure_role') );

  foreach( $hic_structure_users as $structure ) : ?>

    <a href="<?php echo $structure->user_url; ?>" target="blank">
      <h4>
        <?php echo $structure->display_name; ?>
      </h4>
    </a>
    <?php


  endforeach;

  ?>

</section>

<section class="description">
  <?php
  echo apply_filters('the_excerpt', $page->post_excerpt);
  ?>
</section>
