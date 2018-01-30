<?php

/*
content
font_size
*/

if( ! $content ) {
  $content = "...";
}
if( ! $font_size ) {
  $font_size = "font-m";
}

$classes = array();

array_push( $classes, $font_size );

$classes = implode( " ", $classes );

?>

<div class="text-box <?php echo $classes; ?>" v-center>

  <div>
    <?php echo $content; ?>
  </div>

</div>
