<?php

/*
embed_code
*/

if( $embed ) :

  $attributes = array();

  if( $contain ) {
    array_push( $attributes, "contain" );
  }

  $attributes = implode( " ", $attributes );

  ?>

  <div class="embed-box">

    <?php echo $embed; ?>

  </div>

<?php endif; ?>
