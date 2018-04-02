<?php

/*
image
contain - true / false
alt_text
*/



$attributes = array();

if( $contain ) {
  array_push( $attributes, "contain" );
}

$attributes = implode( " ", $attributes );

?>

<div class="image-box" image-frame <?php echo $attributes; ?>>

  <image src="<?php echo $image; ?>" alt="<?php echo $alt_text; ?>"/>

</div>
