<?php
$page = get_page_by_title('Boletín De Noticias');
?>

<section class="text newsletter-subscription">

  <div class="content">
    <?php echo $page->post_content; ?>
  </div>

  <div class="excerpt">
    <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
  </div>

</section>

<section class="newsletter-list">
<?php
    $term = get_term_by( 'name', 'Boletín', 'document-type' );

    $args = array(

       'number'  => 5,

       'tax_query' => array(
            array(
              'taxonomy' => 'document-type',
              'field' => 'term_id',
              'terms'    => array($term->term_id)
            ),
          ),
    );

    post_type_list('document', $args);
  ?>

  <footer>
    <?php post_type_more_button('document'); ?>
  </footer>

</section>
