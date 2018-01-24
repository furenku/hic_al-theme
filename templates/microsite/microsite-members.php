<section id="microsite-members">

  <h1>
    Miembros
  </h1>

  <section class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia ducimus id sequi.</p>
    <p>Fugiat animi iure omnis magnam doloremque officia nobis assumenda, dolorem dolor laboriosam?</p>
    <p>Dolorum hic iste praesentium, cumque. Quidem accusantium, ipsa architecto quasi suscipit assumenda.</p>
  </section>

  <ul id="microsite-members-list">

    <?php for ($i=0; $i < 18; $i++) : ?>

      <article class="microsite-member">

        <a href="#">

          <div image-frame contain>
            <img src="http://fakeimg.pl/300x300/?text=logo" alt="">
          </div>

          <h3>
            Nombre Miembro
          </h3>

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

          </footer>

        </a>


      </article>

    <?php endfor; ?>

  </ul>



  <ul id="microsite-supporters-list">

    <h2>
      Organizaciones que Apoyan
    </h2>

    <?php for ($i=0; $i < 3; $i++) : ?>

      <article class="microsite-supporter">

        <a href="#">

          <div image-frame contain>
            <img src="http://fakeimg.pl/300x300/?text=logo" alt="">
          </div>

          <h4>
            Nombre Organización
          </h4>

          </footer>

        </a>

      </article>

    <?php endfor; ?>

  </ul>



</section>
