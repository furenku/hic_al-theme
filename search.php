<?php
get_header();
?>

<section id="search_results">

  <?php

  if( have_posts() ) {

  ?>

  <h1>
    Resultados para: <b><?php echo get_search_query(); ?></b>
  </h1>

  <?php

  while ( have_posts() ) {
      the_post();

      $image = get_the_post_thumbnail(get_the_ID(),'medium');

      ?>
      <article class="search_result post">

        
        <div class="image" image-frame <?php echo $image ? '' : 'contain'; ?>>
            <?php
            if( $image ) :
              echo $image;
            else:            
              echo '<img src="'.get_stylesheet_directory_uri() . '/assets/img/logo-50-2x.png'.'" alt="">';
            endif;
            ?>
        </div>


      <div class="text">
          <h3 class="title">
              <?php echo apply_filters('the_title', search_title_highlight() ); ?>
          </h3>

          <section class="content">
              <?php echo apply_filters('the_excerpt', search_excerpt_highlight()); ?>
          </section>
        </div>

      </article>

      <?php

  }
  } else {
  
    ?>
    
    <section class="no_results">
      <p>
      No hay resultados
      </p>
    </section>
    
    <?php

  }

  ?>

</section>

<?php

get_footer();
?>
