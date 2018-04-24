
<section id="membership-contributions-dashboard" v-center>

  <h3>
     Contribuye
  </h3>

  <?php

    $parent_page = get_page_by_title("Contribuciones");
    $post_type_edit_pages = get_pages(
      array(
        'child_of'=>$parent_page->ID,
        'parent'=>$parent_page->ID
      )
    );

    // $post_types = array(
    //   'post',
    //   'news_item',
    //   'call_for_solidarity',
    //   'open_call',
    //   'event',
    //   'document',
    //   'publication',
    //   'media_content'
    // );

  ?>

  <nav>
    <ul>
      <?php foreach( $post_type_edit_pages as $ptep ): ?>
        <li>
          <a href="<?php echo get_the_permalink($ptep->ID); ?>">
            <h4>
              <?php echo apply_filters('the_title',get_the_title($ptep->ID)); ?>
            </h4>
            <p>
              <?php echo apply_filters('the_excerpt',get_the_excerpt($ptep->ID)); ?>
            </p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

</section>
