<?php
$parent = get_page_by_title('La coalición');
$pages = get_pages( array('child_of'=>$parent->ID));
array_unshift($pages,$parent);

$subpages_menu = "";
$subpages_content = "";

foreach( $pages as $page ) :

  ob_start(); ?>

  <li>
    <a href="<?php echo get_the_permalink($page->ID); ?>">

      <h4 class="title">
        <?php echo apply_filters('the_title',$page -> post_title); ?>
      </h4>

      <p class="excerpt">
        <?php echo apply_filters('the_excerpt',$page -> post_excerpt); ?>
      </p>

    </a>
  </li>

<?php

$subpages_menu .= ob_get_contents();

ob_end_clean();

ob_start();

?>

<section class="page_content">

  <h4 class="title">
    <?php echo apply_filters('the_title',$page -> post_title); ?>
  </h4>
  <div class="content">
    <?php echo apply_filters('the_content',$page -> post_content); ?>
  </div>

</section>

<?php


$subpages_content .= ob_get_contents();

ob_end_clean();

endforeach; ?>

  <section class="subpages_viewer">
    <nav>
      <ul>
        <?php echo $subpages_menu; ?>
      </ul>
    </nav>

    <section class="content">
      <?php echo $subpages_content; ?>
    </section>
  </section>
