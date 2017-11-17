<?php
$membership_page = 'Membrecía';

$membership_space_page = 'Espacio de miembros';
$membership_hic_page = 'HIC en el mundo';
$membership_contributions_page = 'La palabra de miembr@s y amig@s';
$membership_invitation_page = '¿Cómo ser miembr@ de HIC?';


?>

<section id="home-membership">

   <h1>
      <?php echo apply_filters('the_title',get_page_by_title($membership_page)->post_title); ?>
   </h1>

   <?php $page = get_page_by_title($membership_space_page); ?>

   <div class="row row-eq-height">

     <section id="home-membership-space">

        <h2>
           <?php echo apply_filters('the_title',$page->post_title); ?>
        </h2>

        <div class="map" image-frame="">
           <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
        </div>

        <div class="text">
           <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
        </div>

     </section>

     <?php $page = get_page_by_title($membership_hic_page); ?>

     <section id="home-membership-hic">
        <h2>
           <?php echo apply_filters('the_title',$page->post_title); ?>
        </h2>

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

      <h2>
         La palabra de miembr@s y amig@s
      </h2>

      <ul>

         <?php
         $q = new WP_Query(array(
            'post_type' => array('post'),
            // 'usertype?' => array('memberr'),
            'posts_per_page' => 3
         )
         );
         if( $q->have_posts() ) :
            while ( $q->have_posts() ) :
               $q->the_post();

               peer_post_item(get_the_ID(),'peer-post');

            endwhile;
         endif;

         ?>

      </ul>

   </section>

   <?php $page = get_page_by_title($membership_invitation_page); ?>

   <section id="home-membership-member_invitation">
      <div image-frame="">
         <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
      </div>

      <div class="text">
         <h3>
            <?php echo apply_filters('the_title',$page->post_title); ?>
         </h3>

         <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>

      </div>

   </section>


      </div>
      <!-- .row-eq-height -->

</section>
