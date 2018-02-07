<nav id="home-menu">
   <ul class="site-menu">

      <?php

      $pages = get_pages( array(
         'parent' => get_page_by_title("Mapa de Sitio")->ID,
         // 'child_of'=>get_page_by_title("Mapa de Sitio")->ID,
      ));

      foreach( $pages as $page ):
        $page_slug = name2slug($page->post_title);

      ?>

         <li>
         <div>
            <a href="<?php echo get_the_permalink( $page->ID ); ?>" data-target="<?php echo $page_slug; ?>">
               <div image-frame="" contain="">
                  <?php echo get_the_post_thumbnail( $page->ID ); ?>
               </div>
               <h4>
                  <?php echo get_the_title( $page->ID ); ?>
               </h4>
               <p>
                  <?php echo get_the_excerpt( $page->ID ); ?>
               </p>
            </a>
         </div>
         </li>

      <?php endforeach; ?>

   </ul>
</nav>
