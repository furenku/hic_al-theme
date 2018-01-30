<?php

/*
embed_code
*/

if( $embed_code ) :

  $attributes = array();

  if( $contain ) {
    array_push( $attributes, "contain" );
  }

  $attributes = implode( " ", $attributes );

  ?>

  <div class="embed-box">

    <?php echo $embed_code; ?>

  </div>

<?php endif; ?>
