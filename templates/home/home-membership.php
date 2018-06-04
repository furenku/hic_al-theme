<?php
$membership_page = 'Membresía';

$membership_space_page = 'HIC en América Latina';
$membership_activity_page = 'Actividad de Miembros';
$membership_hic_page = 'HIC en el mundo';
$membership_contributions_page = 'La palabra de miembr@s y amig@s';
$membership_invitation_page = 'Nuevos Miembros';


?>

  <section id="home-membership" data-scroll-id="membresia">

    <h3>
      <?php echo apply_filters('the_title',get_page_by_title($membership_page)->post_title); ?>
    </h3>

    <?php $page = get_page_by_title($membership_space_page); ?>

    <div class="row row-eq-height">

      <?php include(locate_template( 'templates/home/home-membership_space.php', false, true ) ); ?>
      <?php include(locate_template( 'templates/home/home-membership_activity.php', false, true ) ); ?>

      <section>
        <?php include(locate_template( 'templates/home/home-membership_hic.php', false, true ) ); ?>
        <?php include(locate_template( 'templates/home/home-membership_invitation.php', false, true ) ); ?>
      </section>

      <?php # include(locate_template( 'templates/home/home-membership_blog.php', false, true ) ); ?>

    </div>
    <!-- .row-eq-height -->


  </section>