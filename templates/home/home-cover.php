<?php
if( have_posts() ) :
   while ( have_posts() ) :
      the_post();

?>

<section id="home-cover">

   <div image-frame="">
      <img src="http://unsplash.it/1200/600?random=15" alt="">
   </div>

   <section class="presentation">

      <section id="branding">

         <div class="logo" image-frame="" contain="">
            <img src="http://fakeimg.pl/300x200" alt="">
         </div>

         <div class="name">
            <h1>
               <?php echo get_bloginfo('name'); ?>
            </h1>
            <h5>
               <?php echo get_bloginfo('description'); ?>
            </h5>
         </div>

      </section>

      <section class="description">
         <?php echo get_the_content(); ?>
      </section>

   </section>


   <section class="calls_to_action">

      <article>

         <h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
         </h4>
         <a href="">
            <button>
               Llamado a la Acción
            </button>
         </a>

      </article>

      <article>

         <h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
         </h4>
         <a href="">
            <button>
               Llamado a la Acción
            </button>
         </a>

      </article>

   </section>
</section>

<?php

endwhile;
endif;

?>
