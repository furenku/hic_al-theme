
    <?php
    $member_publications_page = ( get_query_var( 'member_publications_page' ) ) ? get_query_var( 'member_publications_page' ) : 1;

    $posts_per_page = 12;

    $member_authors = get_users( array('role'=>'member_role') );
    $member_author_ids = array();

    foreach ($member_authors as $member_author) {
      array_push( $member_author_ids, $member_author->ID );
    }



    $q = new WP_Query(array(
      'post_type' => array('publication'),
      'posts_per_page' => -1,
      'author__in' => $member_author_ids,
      'paged' => $member_publications_page
    )
    );

    $show_footer = true;

    $query = $q;

    include_once(locate_template('templates/components/post-map.php'));


              ?>

<footer>

  <?php
  // $page_var_name = 'member_publications_page';
  // $page_var = $member_publications_page;
  // include(locate_template('templates/components/shared/pagination-menu.php'));
  ?>

</footer>
