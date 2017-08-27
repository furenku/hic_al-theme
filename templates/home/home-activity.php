<section id="home-activity">

   <h1>
      Actividad Reciente
   </h1>

   <section id="home-activity-news">

      <h2>
         Noticias
      </h2>

      <article class="latest">

         <div>
            <div image-frame="">
               <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
            </div>
            <footer>
               <span class="author">
                  Publicado por <a href="#">Nombre del Autor</a>
               </span>
               <span class="date">
                  el <?php echo get_the_date(); ?>

               </span>
            </footer>
         </div>

         <div>

            <h3>
               <?php echo get_the_title(); ?>
            </h3>

            <p>
               <?php echo get_the_excerpt(); ?>
            </p>

         </div>


      </article>


      <ul class="news-items">

         <?php
         for ($i=0; $i < 4; $i++) :
            list_item(get_the_ID(),'news-item');
         endfor;
         ?>

      </ul>

   </section>


   <section id="home-activity-open_calls">

      <h3>
         Convocatorias
      </h3>

      <ul class="open-calls">
         <?php
         for ($i=0; $i < 4; $i++) :
            list_item(get_the_ID(),'open_call');
         endfor;
         ?>
      </ul>

      <a href="#">
         <button type="button" name="button">
            Ver Más <b>Convocatorias</b>
         </button>
      </a>


   </section>

   <section id="home-activity-events">

      <h3>
         Eventos
      </h3>

      <ul class="events">
         <?php
         for ($i=0; $i < 4; $i++) :
            list_item(get_the_ID(),'event');
         endfor;
         ?>
      </ul>

      <a href="#">
         <button type="button" name="button">
            Ver Más <b>Eventos</b>
         </button>
      </a>

   </section>

   <section id="home-activity-solidarity">

      <h3>
         Solidaridad
      </h3>

      <ul class="solidarity">
         <?php
         for ($i=0; $i < 4; $i++) :
            solidarity_item(get_the_ID());
         endfor;
         ?>
      </ul>

      <a href="#">
         <button type="button" name="button">
            Ver Más <b>Llamados de Solidaridad</b>
         </button>
      </a>

   </section>

</section>
