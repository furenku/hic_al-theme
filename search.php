<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

      ?>
      <article>

        <?php if( get_the_post_thumbnail(get_the_ID(),'full') ) : ?>

        <div class="article-cover-photo" image-frame="">
          <?php # echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
        </div>

        <?php endif; ?>

         <h4>
            <?php echo apply_filters('the_title', search_title_highlight() ); ?>
         </h4>

         <section class="content">
            <?php echo apply_filters('the_excerpt', search_excerpt_highlight()); ?>
         </section>

      </article>

      <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>
