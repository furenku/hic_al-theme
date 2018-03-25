<section class="links">
  <?php
  echo apply_filters('the_content', $page->post_content);
  ?>
</section>

<section class="description">
  <?php
  echo apply_filters('the_excerpt', $page->post_excerpt);
  ?>
</section>
