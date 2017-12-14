<?php

get_header();

$post_type = get_post_type();
$post_type_plural = get_post_type_object( $post_type )->label;

?>

<section class="archive">


  <header>

    <h1>
      <?php echo $post_type_plural; ?>
    </h1>
  </header>

  <?php
  if( have_posts() ) {
    ?>

    <section class="container-fluid">

    <aside>

      <form id="searchform" action="<?php bloginfo("url"); ?>/">

        <input class="inlineSearch"
        type="text"
        name="s"
        value="Buscar <?php echo $post_type_plural; ?>"
        onclick="this.value = ''"
        onblur="if (this.value == '') {this.value = 'Buscar <?php echo $post_type_plural; ?>';}"
        onfocus="if (this.value == "Buscar <?php echo $post_type_plural; ?>") {this.value = ''} " />

        <input type="hidden" name="post_type" value="<?php echo $post_type; ?>"/>
        <input class="inlineSubmit" id="searchsubmit" type="submit" alt="Search" value="Search" />

      </form>



    </aside>


    <ul class="content-list">

    <?php
     while ( have_posts() ) {
        the_post();
        ?>

        <article class="archive-item content_list-item">

          <a href="<?php echo get_the_permalink(get_the_ID());  ?>">

            <div image-frame>
              <?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
            </div>

            <h5>
               <?php echo apply_filters('the_title', search_title_highlight() ); ?>
            </h5>

            <section class="excerpt">
               <?php echo apply_filters('the_excerpt', search_excerpt_highlight() ); ?>
            </section>


          </a>

          <?php article_footer(); ?>

        </article>
        <?php

     }

     ?>
    </ul>

    </section>

     <?php

  } else {

    echo "No hay Contenido de ese Tipo.";

  }

?>
</section>

<?php
get_footer();
?>
