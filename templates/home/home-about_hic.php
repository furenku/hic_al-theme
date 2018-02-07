<section id="home-about_hic" data-scroll-id="acerca_de_hic">

   <h1>
      About HIC
   </h1>


   <nav id="home-about_hic-thematic_areas-menu">

      <h2>
         Áreas Temáticas
      </h2>

      <ul>
         <?php
         $q = new WP_Query(array(
            'post_type' => array('thematic-area'),
            'posts_per_page' => -1
         )
      );
      if( $q->have_posts() ) :
         while ( $q->have_posts() ) :
            $q->the_post();
            ?>

            <li>

               <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

                  <div image-frame="" contain="">
                     <?php echo get_the_post_thumbnail(); ?>
                  </div>

                  <h4>
                     <?php echo apply_filters('the_title',get_the_title()); ?>
                  </h4>

               </a>
            </li>

            <?php

         endwhile;
      endif;

      ?>

   </ul>
</nav>

<div class="row row-eq-height">

<section id="home-about_hic-coalition">
   <h4>
      La coalición
   </h4>
   <ul>

      <?php
      $parent = get_page_by_title('La coalición');
      $pages = get_pages( array('child_of'=>$parent->ID));

      foreach( $pages as $page ) : ?>

      <li>
         <a href="<?php echo get_the_permalink($page->ID); ?>">
            <?php echo ($page -> post_title) ?>
         </a>
      </li>

   <?php endforeach; ?>
  </ul>
</section>

<section id="home-about_hic-structures">
   <h4>
      Estructuras
   </h4>
   <div class="content">
      <?php
      $page = get_page_by_title("Estructuras");
      echo apply_filters('the_content', $page->post_content);
      ?>
   </div>
</section>


</div>
<!-- .row-eq-height -->

<div class="row row-eq-height">

<section id="home-about_hic-documents" class="more_link_footer">
   <h4>
      Documentos
   </h4>
   <ul>
      <?php
      $q = new WP_Query(array(
         'post_type' => array('document'),
         'posts_per_page' => 3
      )
   );
   if( $q->have_posts() ) :
      while ( $q->have_posts() ) :
         $q->the_post();
         ?>
         <article>

            <a href="#">
               <h5>
                  <?php echo apply_filters('the_title', get_the_title()); ?>
               </h5>

               <?php article_footer(); ?>
            </a>

         </article>

         <?php

      endwhile;
   endif;

   ?>

   </ul>

   <footer>
     <a href="<?php echo get_post_type_archive_link('document'); ?>">
        <button type="button" name="button" class="more_link_button">
          Ver Más <b>Documentos de HIC</b>
        </button>
     </a>
   </footer>

</section>

<section id="home-about_hic-newsletter" class="more_link_footer">
   <?php
   $page = get_page_by_title('Boletín De Noticias de HIC-AL');
   ?>
   <h4>
      <?php echo apply_filters('the_title',get_the_title($page->ID)); ?>
   </h4>

  <section class="content" v-center>

       <div>
         <?php echo apply_filters('the_excerpt',get_the_excerpt($page->ID)); ?>
       </div>

  </section>

   <footer>
     <a href="<?php echo get_term_link('news_bulletin','document-type'); ?>">
        <button type="button" name="button" class="more_link_button">
           Ver <b>Boletines de noticias</b> anteriores
        </button>
     </a>
   </footer>

</section>

<section id="home-about_hic-contact">

   <h4>
      Contacto
   </h4>

   <div class="content">
      <?php
      $page = get_page_by_title("Contacto");
      echo apply_filters('the_content', $page->post_content);
      ?>
   </div>

</section>

</div>
<!-- .row-eq-height -->

</section>
