<?php
get_header();

if( have_posts() ) {
   while ( have_posts() ) {
      the_post();

      ?>
      <article class="single">

        <?php if( get_the_post_thumbnail(get_the_ID(),'full') ) : ?>

        <div class="article-cover-photo" image-frame contain>
          <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
        </div>

        <?php endif; ?>

         <header>
           <h1 class="title">
              <?php echo get_the_title(); ?>
           </h1>


           <div class="author">
             Por: <?php echo get_the_author(); ?>
           </div>
           <div class="date">
             <?php echo get_the_date(); ?>
           </div>

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
