<?php
/*
Template Name: Working Groups
*/


get_header();

if( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $title = apply_filters("the_title",get_the_title());
  }
}

$q = new WP_Query(array(
  'post_type' => 'working_group',
  'posts_per_page' => -1
));



?>


<section id="working_groups" class="site-section">

  <h1>
    <?php echo $title; ?>
  </h1>

  <?php
  if( $q->have_posts() ) {
    while ( $q->have_posts() ) {
      $q->the_post();

      ?>

      <a href="<?php echo get_the_permalink(); ?>" class="working_group-link">

        <div image-frame contain>
          <?php echo get_the_post_thumbnail(get_the_ID(),'medium'); ?>
        </div>

        <h3 class="title">
          <?php echo apply_filters("the_title",get_the_title()); ?>
        </h3>

        <p class="excerpt">
          <?php echo apply_filters('the_excerpt', get_the_excerpt() ); ?>
        </p>

      </a>
      <?php


    }
  }
  ?>




</section>


<?php
get_footer();
?>
