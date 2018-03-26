
<section id="membership-member_invitation" v-center>
  <!--
   <div image-frame="">
      <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
   </div>
 -->


   <div class="text">
     
      <h3>
         ¿Cómo ser miembr@ de HIC?
      </h3>

      <div class="excerpt">
        <?php echo apply_filters('the_content',$page->post_content); ?>
      </div>

      <footer>
        <a href="<?php echo get_the_permalink($page->ID); ?>">
          <button>
            Registra tu Organización
          </button>
        </a>
      </footer>
   </div>

</section>
