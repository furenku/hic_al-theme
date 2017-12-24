<?php
global $microsite_id;
$microsite_id = get_the_ID();
/* Template Name: Microsite */

get_header();

get_template_part("templates/microsite/microsite-header");

get_template_part("templates/microsite/microsite-intro");
get_template_part("templates/microsite/microsite-menu-description");

?>
<div id="microsite-container">

  <section id="microsite-content">

    <?php
    get_template_part("templates/microsite/microsite-events");
    // get_template_part("templates/microsite/microsite-publications");
    // get_template_part("templates/microsite/microsite-cases");
    // get_template_part("templates/microsite/microsite-members");
    ?>

  </section>

  <?php
  get_template_part("templates/microsite/microsite-sidebar");
  ?>

</div>

<?php

get_footer();
?>
