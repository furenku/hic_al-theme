<?php

// Template Name: About HIC

get_header();

if( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $page_name = get_the_title();
    $featured_image = get_the_post_thumbnail(get_the_ID(),'large');
  }
}

$page_0_name = "Áreas Temáticas";
$page_1_name = "La Coalición";
$page_2_name = "Estructuras";
$page_3_name = "Documentos";
$page_4_name = "Boletín";
$page_5_name = "Contacto";

$page_0 = get_page_by_title( $page_0_name );
$page_1 = get_page_by_title( $page_1_name );
$page_2 = get_page_by_title( $page_2_name );
$page_3 = get_page_by_title( $page_3_name );
$page_4 = get_page_by_title( $page_4_name );
$page_5 = get_page_by_title( $page_5_name );

$subsections = array(
  $page_0_name,
  $page_1_name,
  $page_2_name,
  $page_3_name,
  $page_4_name,
  $page_5_name,
);

?>


<section id="about_hic">
  <section class="section_list">


      <h3>
        <?php echo $page_name; ?>
      </h3>


      <div class="featured-image" image-frame contain>
        <?php echo $featured_image; ?>
      </div>

      <?php
      $prefix = "about_hic";
      include( locate_template('templates/components/shared/section-menu.php') );
      ?>




    <section id="<?php echo $prefix . "-" . name2slug($page_0_name); ?>">

      <h3>
        <?php echo $page_0_name; ?>
      </h3>

      <?php include( locate_template('templates-about_hic/components/about_hic-thematic_areas.php') ); ?>

    </section>


    <section id="<?php echo $prefix . "-" . name2slug($page_1_name); ?>">

      <h3>
        <?php echo $page_1_name; ?>
      </h3>

      <?php include( locate_template('templates-about_hic/components/about_hic-coalition.php') ); ?>

    </section>


    <section id="<?php echo $prefix . "-" . name2slug($page_2_name); ?>">

      <h3>
        <?php echo $page_2_name; ?>
      </h3>

      <?php
      $page = $page_2;
      include( locate_template('templates-about_hic/components/about_hic-structures.php') );
      ?>

    </section>


    <section id="<?php echo $prefix . "-" . name2slug($page_3_name); ?>">

      <h3>
        <?php echo $page_3_name; ?>
      </h3>

      <?php include( locate_template('templates-about_hic/components/about_hic-documents.php') ); ?>

    </section>


    <section id="<?php echo $prefix . "-" . name2slug($page_4_name); ?>">

      <h3>
        <?php echo $page_4_name; ?>
      </h3>

      <?php include( locate_template('templates-about_hic/components/about_hic-newsletter.php') ); ?>

    </section>


    <section id="<?php echo $prefix . "-" . name2slug($page_5_name); ?>">

      <h3>
        <?php echo $page_5_name; ?>
      </h3>

      <?php include( locate_template('templates-about_hic/components/about_hic-contact.php') ); ?>

    </section>


  </section>
</section>


<?php
get_footer();
?>
