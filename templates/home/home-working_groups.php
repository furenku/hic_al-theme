<section id="home-working_groups">

   <h1>
      Iniciativas y Grupos de Trabajo
   </h1>

   <nav id="home-working_groups-list">
      <ul>
         <?php
         $q = new WP_Query(array(
            'post_type' => array('working_group'),
            // 'usertype?' => array('memberr'),
            'posts_per_page' => -1
         )
      );
      if( $q->have_posts() ) :
         while ( $q->have_posts() ) :
            $q->the_post();

            ?>
            <li>
               <div image-frame="" contain="">
                  <?php echo get_the_post_thumbnail(get_the_ID()); ?>
               </div>
               <h4>
                  <?php echo apply_filters('the_title', get_the_title() ); ?>
               </h4>
               <p>
                  <?php echo apply_filters('the_excerpt', get_the_excerpt() ); ?>
               </p>
            </li>
            <?php
         endwhile;
      endif;

      ?>
   </ul>
</nav>

</section>
