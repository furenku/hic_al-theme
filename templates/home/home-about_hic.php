<section id="home-about_hic">

   <h1>
      About HIC
   </h1>


   <nav id="home-about_hic-thematic_areas-menu">

      <h3>
         Áreas Temáticas
      </h3>

      <ul>
         <?php for ($i=0; $i < 5; $i++) : ?>

            <li>

               <div image-frame="" contain="">
                  <img src="http://fakeimg.pl/300x200" alt="" />
               </div>

               <h4>
                  Lorem ipsum dolor sit amet, consectetur.
               </h4>

            </li>

         <?php endfor; ?>
      </ul>
   </nav>

   <section id="home-about_hic-coalition">
      <h3>
         La coalición
      </h3>
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
      <h3>
         Estructuras
      </h3>
      <div>
         <?php
         $page = get_page_by_title("Estructuras");
         echo apply_filters('the_content', $page->post_content);
         ?>
      </div>
   </section>



   <section id="home-about_hic-documents">
      <h4>
         Documentos
      </h4>
      <ul>
         <?php for ($i=0; $i < 4; $i++) : ?>

            <article>
               <a href="">
                  <h5>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem facilis, ratione!
                  </h5>
                  <div class="place">Place</div>
                  <div class="date">date</div>
               </a>
            </article>

         <?php endfor; ?>

      </ul>

      <a href="#">
         <button type="button" name="button">
            Ver Más <b>Documentos de HIC</b>
         </button>
      </a>
   </section>

   <section id="home-about_hic-newsletter">

      <h4>
         Boletín de noticias
      </h4>

      <form action="">
         <label for="">
            Nombre
         </label>
         <input type="text">
         <label for="">
            Correo electrónico
         </label>
         <input type="email">
         <input type="submit" value="Inscribirme al boletín bimestral">
      </form>

      <a href="#">
         <button type="button" name="button">
            Ver <b>Boletines de noticias</b> anteriores
         </button>
      </a>
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

</section>
