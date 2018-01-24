<aside id="microsite-sidebar">

  <?php for ($i=0; $i < 3; $i++) : ?>

    <article>

      <a href="#">

        <div image-frame>
          <img src="http://unsplash.it/600/400?random=<?php echo $i; ?>" alt="">
        </div>

        <h6>
          Lorem ipsum dolor sit amet, consectetur adipisicing.
        </h6>

      </a>

    </article>

  <?php endfor; ?>

</aside>
