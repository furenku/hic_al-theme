<?php

  $tax_query = array(
    array(
      'taxonomy' => 'document-type',
      'field'    => 'slug',
      'terms'    => array('biblioteca'),
      'operator'  => 'IN'
    ),
  );

  include_once( locate_template('templates/components/shared/document-list.php',true) );

?>
