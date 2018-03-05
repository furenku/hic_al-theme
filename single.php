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

           <header>

             <?php
             global $post;

             if(is_singular() || is_home()){

               $crunchifyURL = urlencode(get_permalink());

               $crunchifyTitle = str_replace( ' ', '%20', get_the_title());

               $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

               $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
               $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;

               $widget = '';
               $widget .= '<h5 class="col-xs-6 text-right">Compartir</h5>';
               $widget .= '<div class="hic_al-social col-xs-6 text-right">';
                 $widget .= '<a class="hic_al-link hic_al-twitter text-center col-xs-6" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter font-xl w-100  "></i><span class="row">Twitter</span></a>';
                 $widget .= '<a class="hic_al-link hic_al-facebook text-center col-xs-6" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook font-xl w-100 "></i><span class="row">Facebook</span></a>';

               $widget .= '</div>';

               echo $widget;
               // return  $widget . $content;

             }

             ?>

           </header>


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
