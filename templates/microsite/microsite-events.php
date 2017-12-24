<section id="microsite-events">

  <h1>
    Eventos
  </h1>

  <section id="microsite-events-list">

    <ul>
      <?php for ($i=0; $i < 5; $i++) : ?>
        <article class="event">
          <a href="#">
            <div image-frame>
              <img src="http://unsplash.it/300x300" alt="">
            </div>
            <div class="text">
              <header>
                <h6 class="title">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, modi excepturi.
                </h6>
              </header>
              <section class="excerpt">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt cumque eligendi recusandae impedit optio.</p>
              </section>
              <div class="date-place">
                <div class="place">
                  Lugar del Evento
                </div>
                <div class="date">
                  <span class="d">
                    17
                  </span>
                  <span class="m">
                    octubre
                  </span>
                </div>
              </div>
            </div>
          </a>

          <?php article_footer(); ?>

        </article>
      <?php endfor; ?>
    </ul>

    <footer>

      <a href="#">
        <button type="button" name="button">
          Ver Más Eventos
        </button>
      </a>

    </footer>

  </section>


  <article id="microsite-events-featured">


        <article>

          <a href="#">

          <div image-frame>
            <img src="http://unsplash.it/300x300" alt="">
          </div>

          <header>
            <h6 class="title">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, modi excepturi.
            </h6>
          </header>

          <section class="excerpt">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, sapiente, in! Perferendis veritatis est itaque rerum eveniet, placeat maxime quaerat sit. Natus recusandae excepturi quis.
            </p>
          </section>

          <div class="date-place">
            <div class="place">
              Lugar del Evento
            </div>
            <div class="date">
              <span class="d">
                17
              </span>
              <span class="m">
                octubre
              </span>
            </div>
          </div>

        </a>

        </article>

  </article>



    <section id="microsite-meetings-list">

      <ul>
        <?php for ($i=0; $i < 3; $i++) : ?>
          <article class="event meeting">

            <a href="#">

              <div image-frame>
                <img src="http://unsplash.it/300x300" alt="">
              </div>

              <header>
                <h6 class="title">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, modi excepturi.
                </h6>
              </header>

              <section class="excerpt">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo rem quo dicta!
                </p>
              </section>

              <div class="date-place">
                <div class="place">
                  Lugar del Evento
                </div>
                <div class="date">
                  <span class="d">
                    17
                  </span>
                  <span class="m">
                    octubre
                  </span>
                </div>
              </div>

            </a>
          </article>
        <?php endfor; ?>
      </ul>

      <footer>

        <a href="#">
          <button type="button" name="button">
            Ver Más Encuentros
          </button>
        </a>

      </footer>

    </section>



</section>
