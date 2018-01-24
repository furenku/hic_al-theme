<section id="microsite-cases">

  <h1>
    Casos
  </h1>


  <section id="microsite-cases-map">

  </section>


  <section id="microsite-cases-container">

    <section class="content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia ducimus id sequi.</p>
      <p>Fugiat animi iure omnis magnam doloremque officia nobis assumenda, dolorem dolor laboriosam?</p>
      <p>Dolorum hic iste praesentium, cumque. Quidem accusantium, ipsa architecto quasi suscipit assumenda.</p>
    </section>

    <ul id="microsite-cases-list">

      <?php for ($i=0; $i < 18; $i++) : ?>

        <article class="microsite-case">

          <a href="#">

            <div image-frame>
              <img src="http://unsplash.it/400/300/?random=<?php echo $i*2; ?>" alt="">
            </div>

            <h6>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, quibusdam.
            </h6>

            <div class="excerpt">

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quo officiis debitis ducimus! Laboriosam, tempore.</p>
              <p>Excepturi quidem placeat, ea fugiat ducimus dicta mollitia reiciendis nihil porro totam officia eos. Adipisci.</p>

            </div>

            <footer>

              <div class="place">

                <span class="locality">
                  Nombre Localidad
                </span>
                ,
                <span class="country">
                  Nombre País
                </span>

              </div>

              <button>
                Ver
              </button>

            </footer>

          </a>

        </article>

      <?php endfor; ?>

    </ul>


    <div id="microsite-case-preview">
      <header class="close-container">
        <button class="close-button">
          <i class="fa fa-arrow-left"></i>
          <span>
            Regresar
          </span>
        </button>
      </header>
      <section class="content-preview">

      </section>
    </div>

  </section>


</section>
