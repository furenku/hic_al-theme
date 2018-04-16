
<section id="membership-member_contributions" v-center>
  <!--
   <div image-frame="">
      <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
   </div>
 -->


   <div class="content">

      <h3>
         Contribuciones de Contenido
      </h3>

      <div class="excerpt">
        <?php echo apply_filters('the_content',$page->post_content); ?>
      </div>

      <footer>
        <a href="<?php echo get_the_permalink($page->ID); ?>">
          <button>
            Ingresa
          </button>
        </a>
        <a href="<?php echo get_the_permalink($page->ID); ?>">
          <button>
            Crear Cuenta
          </button>
        </a>
      </footer>
   </div>

</section>
