<?php
$home = get_page_by_title("Inicio");

$logoCover = wp_get_attachment_image_src( get_option('hic_al-logo-cover'), 'full')[0];
$logoCoverMobile = wp_get_attachment_image_src( get_option('hic_al-logo-cover-mobile'), 'full')[0];
$coverImage_0 = wp_get_attachment_image_src( get_option('hic_al-cover-image-0'), 'large')[0] ;

?>

<section id="home-cover">

   <div class="cover_image" image-frame>
     <img src="<?php echo $coverImage_0; ?>" alt="">
    </div>
    
    <div class="logo-mobile" image-frame="" contain="">
      <img src="<?php echo $logoCoverMobile; ?>" alt="">
    </div>

   <div class="content">

      <section class="presentation">
        

         <section id="branding">

            <div class="logo" image-frame="" contain="">
               <img src="<?php echo $logoCover; ?>" alt="">
            </div>

            <div class="text" vcenter>
               <h1>
                  <?php echo get_option('hic_al-organization_title_1'); ?>
               </h1>
               <h2>
                  <?php echo get_option('hic_al-organization_title_2'); ?>
               </h2>

            </div>
            <div class="text-2">
              <h4>
                <?php echo get_option('hic_al-organization_subtitle'); ?>
              </h4>
            </div>
         </section>


      </section>


      <section class="description-calls_to_action">


        <!--
        <section class="description">
             <h3>
             <?php echo get_option('hic_al-organization_subtitle'); ?>
           </h3>
              <p>
                 <?php echo get_option('hic_al-organization_statement'); ?>
              </p>
        </section>
        -->


         <ul class="calls_to_action">
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
