<section id="home-membership-activity">

  <?php $page = get_page_by_title($membership_activity_page); ?>

  <h3>
    <?php echo apply_filters('the_title',$page->post_title); ?>
  </h3>

  <section class="content_list">

    <?php
   $authors = get_users( array('role'=>'member_role') );
   $author_ids = array();

   foreach ($authors as $author) {
     array_push( $author_ids, $author->ID );
   }

   ?>


      <ul class="<?php echo $plural_slug; ?>">

        <?php
     $q = new WP_Query( array(
        'post_type' => array( 'post', 'news_item', 'open_call', 'event', 'publication' ),
        'author__in' => $author_ids,
        'posts_per_page' => 4
     ));

     if( $q->have_posts() ) {
        while ( $q->have_posts() ) {
           $q->the_post();

           list_item( get_the_ID(), $post_type );

        }
     }

     ?>

      </ul>

  </section>


  <footer>
    <a href="<?php echo get_the_permalink( $page -> ID ); ?>">
      <button type="button" name="button" class="more_link_button">
        Ver
        <b>Actividad de Miembros</b>
      </button>
    </a>
  </footer>

</section>