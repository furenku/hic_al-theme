<?php

$member_activity_page = ( get_query_var( 'member_activity_page' ) ) ? get_query_var( 'member_activity_page' ) : 1;

$authors = get_users( array('role'=>'member_role') );
$author_ids = array();

foreach ($authors as $author) {
  array_push( $author_ids, $author->ID );
}


?>


<ul class="<?php echo $plural_slug; ?>">

  <?php
  $posts_per_page = 8;
  $q = new WP_Query( array(
     'post_type' => array( 'post', 'news_item', 'open_call', 'event', 'publication' ),
     'author__in' => $author_ids,
     'posts_per_page' => $posts_per_page,
     'paged' => $member_activity_page
  ));

  $total_posts = $q->found_posts;

  if( $q->have_posts() ) {
     while ( $q->have_posts() ) {
        $q->the_post();

        $id = get_the_ID();


        $longitude = get_post_meta($id,'content-place-longitude',true);
        if( ! $longitude ) {
          $longitude = esc_attr( get_the_author_meta( 'longitude' ) );
        }
        $latitude = get_post_meta($id,'content-place-latitude',true);
        if( ! $latitude ) {
          $latitude = esc_attr( get_the_author_meta( 'latitude' ) );
        }

        ?>


        <article class="<?php echo $class ?> list-item"
          data-id="<?php echo $id; ?>"
          data-longitude="<?php echo $longitude; ?>"
          data-latitude="<?php echo $latitude; ?>"
        >


          <a href="<?php echo get_the_permalink( $id ); ?>" class="image-container">
           <div image-frame="">
              <?php echo get_the_post_thumbnail( $id, 'large' ); ?>
           </div>
           </a>

           <div class="post-info">

             <a href="<?php echo get_the_permalink( $id ); ?>">
                <h6 class="title">
                   <?php echo wp_trim_words(get_the_title( $id ),18); ?>
                </h6>
              </a>

              <footer class="article-footer">

                 <?php if( get_post_type( $id ) == 'open_call' ) :  ?>
                    <span class="open_call-deadline">
                       Fecha de Cierre:
                       <?php echo date_i18n('F d',strtotime(get_post_meta($id,'open_call-deadline',true))); ?>
                    </span>
                 <?php elseif( get_post_type( $id ) == 'event' ) : ?>
                    <span class="event_date">
                       Fecha del Evento:
                       <?php echo date_i18n('F d',strtotime(get_post_meta($id,'event-date',true))); ?>
                    </span>
                 <?php
               endif;

                 article_footer_contents();

                 ?>

              </footer>


           </div>


        </article>


        <?php

     }
  }

  ?>

</ul>


<footer>

<?php
$page_var_name = 'member_activity_page';
$page_var = $member_activity_page;
include(locate_template('templates/components/shared/pagination-menu.php'));
?>

</footer>
