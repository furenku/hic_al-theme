<?php

/*
- text
- font_size
*/


$text = $dynamic_content['text'];
$font_size = $dynamic_content['font_size'];

if( $font_size ) {
  $font_size = "font-" . $font_size;
} else {
  $font_size = "font-m";
}

$font_classes = array();
array_push( $font_classes, $font_size );
$font_classes = implode( " ", $font_classes );

?>

<div class="text-box dynamic_component">

  <div class="<?php echo $font_classes; ?>">
    <?php echo $text; ?>
  </div>

</div>
