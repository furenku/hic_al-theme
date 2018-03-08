<?php
get_header();

?>

<h1>
   <?php echo single_term_title() ?>
</h1>

<?php
if( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      ?>
      <article>
         <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
            <h2>
               <?php echo get_the_title(); ?>
            </h2>

            <section class="content">
               <?php echo get_the_content(); ?>
            </section>
         </a>
      </article>
      <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>
