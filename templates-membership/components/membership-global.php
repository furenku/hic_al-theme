<?php $hic_structures = get_users( array('role'=>'hic_structure_role') ); ?>
<?php #var_dump($hic_structures); ?>
<div class="content">

  <?php echo apply_filters('the_content', $page -> post_content ); ?>

</div>

<ul class="hic_structures">
  <?php
  foreach ($hic_structures as $hic_structure) :

    $longitude = esc_attr( get_the_author_meta( 'longitude', $hic_structure->ID ) );
    $latitude = esc_attr( get_the_author_meta( 'latitude', $hic_structure->ID ) );

  ?>

    <article
    class="hic_structure"
    data-id="<?php echo $hic_structure->ID; ?>"
    <?php if( $longitude && $latitude && $longitude = "" && $latitude == "" ) : ?>
      data-longitude="<?php echo $longitude; ?>"
      data-latitude="<?php echo $latitude; ?>"
    <?php endif; ?>
    >


      <a href="<?php echo $hic_structure->user_url; ?>">
        <h4>
          <?php echo $hic_structure->display_name; ?>
        </h4>
      </a>
    </article>

  <?php endforeach; ?>
</ul>
