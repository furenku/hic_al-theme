<section id="newsletter" class="more_link_footer">
  <?php
    $page = get_page_by_title('Boletín De Noticias');
    ?>
    <h4>
      <?php echo apply_filters('the_title',get_the_title($page->ID)); ?>
    </h4>

    <section class="content" v-center>

      <div>
        <?php echo apply_filters('the_excerpt',get_the_excerpt($page->ID)); ?>
      </div>

    </section>

    <footer>
      <a href="<?php echo get_term_link('newsletter','document-type'); ?>">
        <button type="button" name="button" class="more_link_button">
          Ver
          <b>Boletines de noticias</b> anteriores
        </button>
      </a>
    </footer>

</section>