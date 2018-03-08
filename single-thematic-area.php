<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

      ?>
      <article class="thematic_area single">

        <div class="article-cover-photo" image-frame contain>
          <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
        </div>

         <header>
           <h1>
              <?php echo get_the_title(); ?>
           </h1>
         </header>

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
