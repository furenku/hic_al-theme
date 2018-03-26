<?php
$authors = get_users( array('role'=>'member_role') );

?>


<ul class="<?php echo $plural_slug; ?>">

  <?php
  foreach($authors as $author) :

    $longitude = esc_attr( get_the_author_meta( 'longitude', $author->ID ) );
    $latitude = esc_attr( get_the_author_meta( 'latitude', $author->ID ) );

    ?>
    <article
    class="member"
    data-id="<?php echo $author->ID; ?>"
    data-longitude="<?php echo $longitude; ?>"
    data-latitude="<?php echo $latitude; ?>"
    >

      <div image-frame="" contain="">
        <?php echo get_avatar($author->ID,256); ?>
      </div>

      <h5>
        <?php echo $author->display_name; ?>
      </h5>

    </article>
    <?php
  endforeach;
  ?>

</ul>
