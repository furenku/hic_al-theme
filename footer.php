<?php

$footer_text = $logoCover = get_option('hic_al-footer-text');
$legal_info = get_option('hic_al-legal_info');

?>

</main>


<?php get_template_part('templates/components/general/footer'); ?>


<!-- <footer id="site_footer">

   <section class="copyright">
      <p>
        <?php echo $footer_text; ?>
      </p>
   </section>

   <section class="disclaimer">
      <a href="<?php echo get_the_permalink( $legal_info ); ?>">
         <?php echo apply_filters('the_title',get_the_title( $legal_info )); ?>
      </a>
   </section>

</footer> -->



<?php $themeDir = get_stylesheet_directory_uri(); ?>

<script src="<?php echo $themeDir; ?>/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo $themeDir; ?>/bower_components/what-input/dist/what-input.js"></script>
<script src="<?php echo $themeDir; ?>/bower_components/isotope/dist/isotope.pkgd.min.js"></script>
<script src="<?php echo $themeDir; ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $themeDir; ?>/bower_components/imgLiquid/js/imgLiquid-min.js"></script>
<script src="<?php echo $themeDir; ?>/bower_components/leaflet/dist/leaflet.js"></script>
<script src="<?php echo $themeDir; ?>/bower_components/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
<script src="<?php echo $themeDir; ?>/js/hic_al.js"></script>

<script src="<?php echo $themeDir; ?>/js/components/text-box.js"></script>

<script src="<?php echo $themeDir; ?>/js/components/post-grid.js"></script>
<script src="<?php echo $themeDir; ?>/js/components/calls-to-action.js"></script>

<?php wp_footer(); ?>

</body>
</html>
