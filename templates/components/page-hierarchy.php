<?php function show_children($page) {

  $subpages = get_pages( array( 'parent' => $page, 'child_of' => $page ) );
  // var_dump( get_post($page)->post_title );
  // var_dump( $subpages );
  if( is_array($subpages) ) : ?>
    <ul>
      <?php foreach( $subpages as $subpage ) : ?>
        <li>

          <a href="<?php echo get_the_permalink($subpage->ID); ?>">
            <div image-frame>
              <?php echo get_the_post_thumbnail($subpage->ID); ?>
            </div>
            <?php echo apply_filters('the_title',get_post($subpage)->post_title); ?>
          </a>

          <?php show_children($subpage->ID) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif;
} ?>


<section class="page_hierarchy">

  <?php show_children( $parent_page ); ?>

</section>
