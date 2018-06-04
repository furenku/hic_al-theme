
<section id="home-activity" data-scroll-id="actividad_reciente">

  <h3>
    Actividad Reciente
  </h3>

   <div class="row content_list_row">

      <section id="home-activity-open_call" class="content_list">

        <h4>
          Noticias
        </h4>

        <?php
        post_type_list('news_item',array('number'=>4));
        ?>

        <footer>
          <a href="<?php echo get_post_type_archive_link( 'news_item' ); ?>">
            <button type="button" name="button" class="more_link_button">
                Ver Más <b>Noticias</b>
            </button>
          </a>
        </footer>

      </section>

      <section id="home-activity-open_call" class="content_list">

        <h4>
            Convocatorias
        </h4>

        <?php
        post_type_list('open_call',array('number'=>4));
        ?>

        <footer>
          <a href="<?php echo get_post_type_archive_link( 'open_call' ); ?>">
              <button type="button" name="button" class="more_link_button">
                Ver Más <b>Convocatorias</b>
              </button>
          </a>
        </footer>

      </section>

      <section id="home-activity-event" class="content_list">

        <h4>
            Eventos
        </h4>

        <?php
        post_type_list('event',array('number'=>4));
        ?>

        <footer>
          <a href="<?php echo get_post_type_archive_link( 'event' ); ?>">
              <button type="button" name="button" class="more_link_button">
                Ver Más <b>Eventos</b>
              </button>
          </a>
        </footer>

      </section>    

   </div>
   
</section>
