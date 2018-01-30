<?php
global $microsite_id;
$microsite_id = get_the_ID();
/* Template Name: Microsite */

get_header();

get_template_part("templates/microsite/microsite-header");

?>

<section style="height:80vh; background-color:#eee; display: block; width: 100%">

<?php

set_query_var("content", "Lorem ipsum dolor!");
set_query_var("font_size", "font-xxxl");

get_template_part('templates/components/text-box');

?>

</section>

<section style="height:80vh; background-color:#eee; display: block; width: 100%">

<?php

set_query_var("content", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia adipisci nulla, est! Corporis repellat perspiciatis temporibus maiores provident praesentium quas quaerat deleniti cumque in!");
set_query_var("font_size", "font-m");

get_template_part('templates/components/text-box');

?>

</section>

<section style="height:80vh; background-color:#eee; display: block; width: 100%">

<?php

set_query_var("image", "http://unsplash.it/1200x700");
set_query_var("contain", true );

get_template_part('templates/components/image-box');

?>

</section>

<section style="height:80vh; background-color:#eee; display: block; width: 100%">

<?php

set_query_var("embed_code", '<iframe src="https://www.youtube.com/embed/C0DPdy98e4c" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');

get_template_part('templates/components/embed-box');

?>

</section>

<?php


get_template_part("templates/microsite/microsite-intro");
// get_template_part("templates/microsite/microsite-dynamic_area");
get_template_part("templates/microsite/microsite-menu-description");

?>
<div id="microsite-container">

  <section id="microsite-content">

    <?php
    get_template_part("templates/microsite/microsite-events");
    get_template_part("templates/microsite/microsite-publications");
    get_template_part("templates/microsite/microsite-cases");
    get_template_part("templates/microsite/microsite-members");
    ?>

  </section>

  <?php
  get_template_part("templates/microsite/microsite-sidebar");
  ?>

</div>

<?php

get_footer();
?>
