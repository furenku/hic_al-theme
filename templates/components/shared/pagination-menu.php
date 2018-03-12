<nav class="pagination_menu">
  <ul>
    <?php
      $post_page_total = ceil($total_posts/$posts_per_page);
      for ($i=0; $i < $post_page_total; $i++) :

        $paged_url = add_query_arg( 'publications_page', $i + 1, $this_url );
        $paged_url .= '#' . $section_id;

        $active_page = $i+1 == $publications_page ? 'active' : '';

        ?>

        <li>
          <a href="<?php echo $paged_url; ?>">
            <button class="pagination_button <?php echo $active_page; ?>">
              <?php echo $i + 1; ?>
            </button>
          </a>
        </li>

        <?php
      endfor;
    ?>
  </ul>
</nav>
