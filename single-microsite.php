<?php
get_header();


if( have_posts() ) {
  while ( have_posts() ) {

    the_post();

    $microsite_title = get_the_title();
    $microsite_thumb = get_the_post_thumbnail(get_the_ID(),'full');
    $microsite_content = apply_filters('the_content', get_the_content());

  }

}

?>

      <article id="single-microsite">

        <?php if( $microsite_thumb ) : ?>

        <div class="article-cover-photo" image-frame="">
          <?php echo $microsite_thumb; ?>
        </div>

        <?php endif; ?>


        <h1>
           <?php echo $microsite_title; ?>
        </h1>


         <section class="content">
            <?php echo $microsite_content; ?>
         </section>





         <section class="dynamic-content-area">

           <?php show_dynamic_contents(); ?>

         </section>



      </article>

      <?php


get_footer();
?>
