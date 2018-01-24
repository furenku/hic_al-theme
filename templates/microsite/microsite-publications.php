<section id="microsite-publications">

  <h1>Publicaciones</h1>

  <?php for ($i=0; $i < 3; $i++) : ?>

  <article id="microsite-publications-featured-<?php echo $i; ?>" class="publication featured">

    <a href="#">

      <header>

        <h3>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero ipsa mollitia molestiae eaque ut cupiditate?
        </h3>

        <div class="date">
            Nombre del Mes, Año
        </div>

      </header>

      <div image-frame>
        <img src="http://unsplash.it/400/600?random=<?php echo $i; ?>" alt="">
      </div>

      <div class="excerpt">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolorum, voluptatem incidunt voluptates porro laborum, facilis, qui delectus hic, nulla recusandae.</p>
        <p>Voluptates facilis iusto alias! Ipsa repellendus, accusamus laudantium nihil vero quis tempore provident delectus.</p>
        <p>Nisi dolorum consequatur, sapiente commodi facere dolore iusto minima.</p>
      </div>


      <footer>

        <button class="more action_button">

          <i class="fa fa-arrow-down"></i>

          <span>
            Descarga
          </span>

        </button>

        <button class="more action_button">

          <i class="fa fa-arrow-right"></i>

          <span>
            Leer Más
          </span>

        </button>

      </footer>

    </a>

  </article>

  <?php endfor; ?>


  <ul id="microsite-publications-list">

    <?php for ($i=0; $i < 7; $i++) : ?>

      <article class="publication">

        <a href="#">

          <div image-frame>
            <img src="http://unsplash.it/400/600?random=<?php echo $i; ?>" alt="">
          </div>

          <header>
            <h4>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero ipsa mollitia molestiae eaque ut cupiditate?
            </h4>

            <div class="date">
              Nombre del Mes, Año
            </div>

          </header>


          <footer>

            <button class="more action_button">

              <i class="fa fa-arrow-down"></i>

              <span>
                Descarga
              </span>

            </button>

            <button class="more action_button">

              <i class="fa fa-arrow-right"></i>

              <span>
                Leer Más
              </span>

            </button>

          </footer>

        </a>

      </article>

    <?php endfor; ?>

  </ul>

</section>
