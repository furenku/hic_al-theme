
    <?php
    $publications_page = ( get_query_var( 'publications_page' ) ) ? get_query_var( 'publications_page' ) : 1;

    $posts_per_page = 3;
    $this_url = get_permalink();

    $member_authors = get_users( array('role'=>'member_role') );
    $member_author_ids = array();

    foreach ($member_authors as $member_author) {
      array_push( $member_author_ids, $member_author->ID );
    }



    $q = new WP_Query(array(
      'post_type' => array('publication'),
      'posts_per_page' => $posts_per_page,
      'author__in' => $member_author_ids,
      'paged' => $publications_page
    )
    );

    $show_footer = true;

    include(locate_template('templates/components/shared/publication-list.php'));

    ?>

<footer>

  <?php include(locate_template('templates/components/shared/pagination-menu.php')); ?>

</footer>
