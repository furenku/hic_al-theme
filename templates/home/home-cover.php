<?php $home = get_page_by_title("Inicio"); ?>

<section id="home-cover">

   <div image-frame="">
      <?php echo get_the_post_thumbnail( $home->ID, 'full'); ?>
   </div>

   <div class="content">

      <section class="presentation">

         <section id="branding">

            <div class="logo" image-frame="" contain="">
               <img src="http://fakeimg.pl/300x450" alt="">
            </div>

            <div class="text" vcenter>
               <h3>
                  <?php echo get_option('organization_title_1'); ?>
               </h3>
               <h4>
                  <?php echo get_option('organization_title_2'); ?>
               </h4>
            </div>

         </section>

         <section class="description">
            <h3>
               <?php echo get_option('organization_subtitle'); ?>
            </h3>
               <p>
                  <?php echo get_option('organization_statement'); ?>
               </p>
         </section>

      </section>


      <section class="calls_to_action">

         <ul>
            <?php
            $q = new WP_Query( array(
               'post_type'=>'call_to_action',
               'posts_per_page' => 2,
               'tax_query' => array(
                  array(
                     'taxonomy' => 'call_to_action-location',
                     'field'    => 'slug',
                     'terms'    => 'cover',
                  ),
               ),
            ));

            if( $q->have_posts() ) :

               while ( $q->have_posts() ) :
                  $q->the_post();
                  ?>

                  <article>

                     <h4>
                        <?php echo get_the_content(); ?>
                     </h4>

                     <a href="<?php echo get_post_meta(get_the_ID(),'call_to_action-url',true); ?>">
                        <button>
                           <?php echo get_post_meta( get_the_ID(), 'call_to_action-text', true ); ?>
                        </button>
                     </a>

                  </article>

                  <?php
               endwhile;
            endif;
            ?>
         </ul>

      </section>

   </div>

</section>
