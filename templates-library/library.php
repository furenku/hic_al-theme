<?php

/*
Template Name: Library
*/


get_header();



$publications_page = get_page_by_title("Publicaciones de HIC");
$publications_name = apply_filters( 'the_title', $publications_page -> post_title );

$member_publications_page = get_page_by_title("Miembros");
$member_publications_name = apply_filters( 'the_title', $member_publications_page -> post_title );

$multimedia_page = get_page_by_title("Multimedia");
$multimedia_name = apply_filters( 'the_title', $multimedia_page -> post_title );

$documents_page = get_page_by_title("Documentos");
$documents_name = apply_filters( 'the_title', $documents_page -> post_title );

$glossary_page = get_page_by_title("Glosario");
$glossary_name = apply_filters( 'the_title', $glossary_page -> post_title );

// $mapas_page = get_term_link( get_term_by('name','Mapas','document_type') );
// $infograficos_page = get_term_link( get_term_by('name','Infograficos','document_type') );
// // $diseño_page = get_term_link( get_term_by('name','Diseño','document_type') );


// $mapas_name = get_term_by('name','Mapas','document_type')->name;
// $infograficos_name = get_term_by('name','Infograficos','document_type')->name;
// $diseño_name = get_term_by('name','Diseño','document_type')->name;



//
// $call_for_solidarity_link = get_post_type_archive_link( 'call_for_solidarity' );
// $news_item_link = get_post_type_archive_link( 'news_item' );
// $open_call_link = get_post_type_archive_link( 'open_call' );
// $event_link = get_post_type_archive_link( 'event' );
// $category_link = get_term_link( get_term_by('name','Artículos','category') );

$subsections = array(
  $publications_name,
  $member_publications_name,
  $multimedia_name,
  $documents_name,
  $glossary_name
);

if( have_posts() ) {
  while ( have_posts() ) {
    the_post();

    global $parent_page_url;
    $parent_page_url = get_permalink();

?>

<article id="library" class="site_section">


  <h1 class="section-title">
    Biblioteca
  </h1>

  <?php
    $prefix = "library";
    include( locate_template('templates/components/shared/section-menu.php') );
  ?>



  <section id="library-sections" class="sections_list">



    <?php $section_id = "library-" . name2slug($publications_name); ?>

    <section id="<?php echo $section_id; ?>" class="library-section">

      <h2>
        <?php echo $publications_name; ?>
      </h2>

      <?php include_once( locate_template('templates-library/library/library-publications.php') ); ?>

    </section>



    <?php $section_id = "library-" . name2slug( $member_publications_name ); ?>

    <section id="<?php echo $section_id; ?>" class="library-section">

      <h2>
        <?php echo $member_publications_name; ?>
      </h2>

      <?php include_once( locate_template('templates-library/library/library-member-publications.php') ); ?>

    </section>



    <?php $section_id = "library-" . name2slug( $multimedia_name ); ?>

    <section id="<?php echo $section_id; ?>" class="library-section">

      <h2>
        <?php echo $multimedia_name; ?>
      </h2>

      <?php include_once( locate_template('templates-library/library/library-multimedia.php') ); ?>
    </section>



    <?php $section_id = "library-" . name2slug( $documents_name ); ?>

    <section id="<?php echo $section_id; ?>" class="library-section">

      <h2>
        <?php echo $documents_name; ?>
      </h2>

      <?php

      $tax_query = array(
        array(
          'taxonomy' => 'document-type',
          'field'    => 'slug',
          'terms'    => array('biblioteca'),
          'operator'  => 'IN'
        ),
      );

      include_once( locate_template('templates/components/shared/document-list.php',true) );

      ?>


      <?php include_once( locate_template('templates-library/library/library-documents-special_types.php') ); ?>

    </section>



    <?php $section_id = "library-" . name2slug( $glossary_name ); ?>

    <section id="<?php echo $section_id; ?>" class="library-section">

      <h2>
        <?php echo $glossary_name; ?>
      </h2>

      <?php include_once( locate_template('templates-library/library/library-glossary.php') ); ?>

    </section>



  </section>


</article>

<?php

}
} else {

}


get_footer();

?>
