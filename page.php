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
             Por:
             <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a>
           </div>

           <div class="date">
             <?php echo get_the_date(); ?>
           </div>

         </header>

         <section class="content">

           <header>

             <?php share_post_widget(); ?>

           </header>


           <?php echo apply_filters('the_content', get_the_content()); ?>
           <?php #echo get_the_content(); ?>

         </section>

      </article>

      <?php

   }
} else {
   /* No posts found */

}

get_footer();
?>
