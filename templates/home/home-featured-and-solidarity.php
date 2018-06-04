<?php

$home_solidarity_query = new WP_Query( array(
  'post_type'=>'call_for_solidarity',
  'posts_per_page' => 2,
  'tax_query' => array(
    array(
      'taxonomy' => 'site_hierarchy',
      'field'    => 'slug',
      'terms'    => 'featured',
      'operator'    => 'NOT_IN',
    ),
  ),
)
);

$posts_number = $home_solidarity_query -> post_count;

?>

<div class="container">
    

    <?php
    include( locate_template('templates/home/home-solidarity.php') );
    include( locate_template('templates/home/home-featured.php') );
    ?>


</div>



