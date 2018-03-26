<?php


$member_articles_page = ( get_query_var( 'member_articles_page' ) ) ? get_query_var( 'member_articles_page' ) : 1;

$authors = get_users( array('role'=>'member_role') );
$author_ids = array();
$post_type = "post";


// foreach ($authors as $author) {
//   array_push( $author_ids, $author->ID );
// }


$category = get_term_by('name','Palabra de miembros y amig@s','category');
?>


<ul id="membership-member_articles" class="post_list">

  <?php
  $posts_per_page = 3;
  $q = new WP_Query( array(
     'post_type' => array( 'post'),
     'cat' => $category->term_id,
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
        <article class="peer-post"
        data-id="<?php echo $id; ?>"
        data-longitude="<?php echo $longitude; ?>"
        data-latitude="<?php echo $latitude; ?>"
        >

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
     }
  }

  ?>

</ul>


<footer>

<?php
$page_var_name = 'member_articles_page';
$page_var = $member_articles_page;
include(locate_template('templates/components/shared/pagination-menu.php'));
?>

</footer>
