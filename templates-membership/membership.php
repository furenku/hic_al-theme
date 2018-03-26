<?php
/*
Template Name: Membership
*/

get_header();

$page_0_name = "Actividad";
$page_1_name = "La palabra de miembros y amig@s";
$page_2_name = "HIC en AL";
$page_3_name = "HIC en el Mundo";
$page_4_name = "Nuevos Miembros";

$page_0 = get_page_by_title( $page_0_name );
$page_1 = get_page_by_title( $page_1_name );
$page_2 = get_page_by_title( $page_2_name );
$page_3 = get_page_by_title( $page_3_name );
$page_4 = get_page_by_title( $page_4_name );

$subsections = array(
  $page_0_name,
  $page_1_name,
  $page_2_name,
  $page_3_name,
  $page_4_name,
);

?>

<section id="membership" class="site_section">

  <header>

    <h1>
      <?php echo apply_filters( 'the_title', get_the_title() ); ?>
    </h1>

    <?php
    $prefix = "membership";
    include( locate_template('templates/components/shared/section-menu.php') );
    ?>

  </header>



  <section id="membership-sections" class="section_list">

    <section id="membership-<?php echo name2slug($page_0_name); ?>">
      <h3>
        <?php echo $page_0_name; ?>
      </h3>
      <?php include( locate_template('templates-membership/components/membership-activity.php')); ?>
    </section>

    <section id="membership-<?php echo name2slug($page_1_name); ?>">
      <h3>
        <?php echo $page_1_name; ?>
      </h3>
      <?php include( locate_template('templates-membership/components/membership-articles.php')); ?>
    </section>

    <section id="membership-<?php echo name2slug($page_2_name); ?>">
      <h3>
        <?php echo $page_2_name; ?>
      </h3>
      <?php include( locate_template('templates-membership/components/membership-members.php')); ?>
    </section>

    <section id="membership-<?php echo name2slug($page_3_name); ?>">

      <?php $page = $page_3; ?>

      <h3>
        <?php echo $page_3_name; ?>
      </h3>
      <?php include( locate_template('templates-membership/components/membership-global.php')); ?>
    </section>

    <section id="membership-<?php echo name2slug($page_4_name); ?>">

      <?php $page = $page_4; ?>

      <h3>
        <?php echo $page_4_name; ?>
      </h3>
      <?php include( locate_template('templates-membership/components/membership-registration.php')); ?>
    </section>

  </section>

  <section id="membership-map"></section>


</section>

<?php

get_footer();

?>
