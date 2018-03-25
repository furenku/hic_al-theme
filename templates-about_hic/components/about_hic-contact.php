<div class="content">
  <?php
  $page = get_page_by_title("Contacto");
  echo apply_filters('the_content', $page->post_content);
  ?>
</div>
