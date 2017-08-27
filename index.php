<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      ?>

      <h1>
         <?php echo get_the_title(); ?>
      </h1>

      <section class="content">
         <?php echo get_the_content(); ?>
      </section>
      <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>
