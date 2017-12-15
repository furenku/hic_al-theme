<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      ?>

      <div class="article-cover-photo" image-frame="">
        <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
      </div>

      <article>



         <h1>
            <?php echo get_the_title(); ?>
         </h1>

         <section class="content">
            <?php echo apply_filters('the_content', get_the_content()); ?>
         </section>
      </article>
      <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>
