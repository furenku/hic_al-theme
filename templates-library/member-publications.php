<?php
/*
Template Name: Member Publications
*/

get_header();

if( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>

    <h1>
      <?php echo apply_filters('the_title', get_the_title()); ?>
    </h1>

    <section id="library-member-publications">

      <?php get_template_part('templates-library/library/library-publications'); ?>

    </section>

    <?php
  }
}

get_footer();

?>
