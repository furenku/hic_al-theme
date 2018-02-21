<?php
$membership_page = 'Membrecía';

$membership_space_page = 'Espacio de miembros';
$membership_hic_page = 'HIC en el mundo';
$membership_contributions_page = 'La palabra de miembr@s y amig@s';
$membership_invitation_page = 'Registro';


?>

<section id="home-membership" data-scroll-id="membresia">

   <h3>
      <?php echo apply_filters('the_title',get_page_by_title($membership_page)->post_title); ?>
   </h3>

   <?php $page = get_page_by_title($membership_space_page); ?>

   <div class="row row-eq-height">

     <section id="home-membership-space">


        <h3>
           <?php echo apply_filters('the_title',$page->post_title); ?>
        </h3>

        <div class="image" image-frame="">
           <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
        </div>

        <div class="text" v-center>
           <div>
             <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
           </div>
        </div>

        <footer>
          <a href="#">
             <button type="button" name="button" class="more_link_button">
                Acceder al <b>Espacio de Miembros</b>
             </button>
          </a>
        </footer>

     </section>

     <?php $page = get_page_by_title($membership_hic_page); ?>

     <section id="home-membership-hic">
        <h3>
           <?php echo apply_filters('the_title',$page->post_title); ?>
        </h3>

        <div image-frame="">
           <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
        </div>

        <div class="text">
           <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
        </div>
     </section>

   </div>
   <!-- .row-eq-height -->


   <div class="row row-eq-height">

   <section id="home-membership-peer_posts">

      <h3>
         La palabra de miembr@s y amig@s
      </h3>

      <ul>

         <?php
         // $palabra_cat = get_term_by( 'slug', 'palabra-de-miembros-y-amigs', 'category' );
         $q = new WP_Q uery(array(
            'post_type' => array('post'),
            // 'usertype?' => array('memberr'),
            // 'cat' => $palabra_cat => term_id,
            'posts_per_page' => 5
         )
         );
         if( $q->have_posts() ) :
            while ( $q->have_posts() ) :
               $q->the_post();

               ?>

               <article class="peer-post">

                  <a href="<?php echo get_the_permalink(get_the_ID()); ?>">

                    <div image-frame>
                      <?php echo get_the_post_thumbnail(get_the_ID()); ?>
                    </div>

                    <div>

                       <h5>
                          <?php echo apply_filters('the_title', get_the_title( $id )); ?>
                       </h5>

                       <p>
                          <?php echo apply_filters('the_excerpt', wp_trim_words(get_the_excerpt( $id ),22)); ?>
                       </p>

                    </div>
                  </a>

                  <?php article_footer(); ?>

               </article>

               <?php


            endwhile;
         endif;

         ?>

      </ul>

      <footer>
        <a href="#">
           <button type="button" name="button" class="more_link_button">
              Ver más <b>Contenidos de Miembros</b>
           </button>
        </a>
      </footer>

   </section>

   <?php $page = get_page_by_title($membership_invitation_page); ?>

   <section id="home-membership-member_invitation" v-center>
     <!--
      <div image-frame="">
         <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
      </div>
    -->


      <div class="text">

         <h2>
            <?php echo apply_filters('the_title',$page->post_title); ?>
         </h2>

         <h3>
            ¿Cómo ser miembro de HIC?
         </h3>

         <div class="excerpt">
           <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
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


      </div>
      <!-- .row-eq-height -->

</section>
