<section id="home-membership">

   <h1>
      Membership
   </h1>


   <section id="home-membership-space">
      <h2>
         Espacio de Miembros
      </h2>

      <div class="map" image-frame="" contain="">
         <img src="http://fakeimg.pl/400x600" alt="" />
      </div>

      <div class="text">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque reiciendis unde, nemo eos iure.</p>
         <p>Dolore quae, nemo pariatur, nisi ut sunt veritatis velit aliquam, quaerat facere totam sequi.</p>
         <p>Ut quisquam vitae optio obcaecati rem, alias, sequi quia aperiam ullam dolorem nulla ab.</p>
      </div>

   </section>

   <section id="home-membership-intro">
      <h2>
         HIC en el Mundo
      </h2>

      <div image-frame="" contain="">
         <img src="http://fakeimg.pl/600x400" alt="" />
      </div>

      <div class="text">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque reiciendis unde, nemo eos iure.</p>
         <p>Dolore quae, nemo pariatur, nisi ut sunt veritatis velit aliquam, quaerat facere totam sequi.</p>
         <p>Ut quisquam vitae optio obcaecati rem, alias, sequi quia aperiam ullam dolorem nulla ab.</p>
      </div>
   </section>

   <section id="home-membership-peer_posts">

      <h2>
         La palabra de miembr@s y amig@s
      </h2>

      <ul>

         <?php

         for ($i=0; $i < 4; $i++) :
            peer_post_item(get_the_ID(),'peer-post');
         endfor;

         ?>

      </ul>
   </section>

   <section id="home-membership-member_invitation">

      <div image-frame="" contain="">
         <img src="http://fakeimg.pl/200x300" alt="" />
      </div>

      <div class="text">
         <h3>¿Cómo ser Miembro de HIC?</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, minus! Similique corrupti veniam consectetur facere.</p>
         <p>Nemo reiciendis quia aspernatur repudiandae quaerat a placeat accusantium consequatur illo quod, eveniet atque. Atque?</p>
         <p>Obcaecati consequatur ut asperiores, porro officia nam et enim, pariatur doloribus eum reiciendis cum quia.</p>
         <p>Debitis eos repellendus accusamus vel adipisci veritatis praesentium molestiae unde, veniam beatae. Adipisci, ipsum, neque.</p>
      </div>

   </section>

</section>
