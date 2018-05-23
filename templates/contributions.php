<?php
/* Template Name: Contributions */
get_header();


if( have_posts() ):

  while( have_posts() ):

    the_post();

    ?>

    <section id="contributions">

      <header>

        <h1 class="title">
          <?php echo apply_filters('the_title',get_the_title()); ?>
        </h1>

      </header>

      <section class="content">

        <?php echo apply_filters('the_content',get_the_content()); ?>

      </section>

    </section>

    <?php

  endwhile;

endif;


get_footer();
?>
