<nav id="home-menu">
   <ul>

      <?php

      $pages = get_pages( array(
         'parent' => get_page_by_title("Mapa de Sitio")->ID,
         // 'child_of'=>get_page_by_title("Mapa de Sitio")->ID,
      ));

      foreach( $pages as $page ): ?>

         <li>
            <a href="<?php echo get_the_permalink( $page->ID ); ?>">
               <div image-frame="" contain="">
                  <?php echo get_the_post_thumbnail( $page->ID ); ?>
               </div>
               <h2>
                  <?php echo get_the_title( $page->ID ); ?>
               </h2>
               <p>
                  <?php echo get_the_excerpt( $page->ID ); ?>
               </p>
            </a>
         </li>

      <?php endforeach; ?>

   </ul>
</nav>
