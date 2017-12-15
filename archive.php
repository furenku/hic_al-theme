<?php

get_header();


$post_type = get_post_type();
$post_type_plural = get_post_type_object( $post_type )->label;

global $countries_posts;
$countries_posts = post_type_countries( $post_type );

$end_year = date_i18n('Y',strtotime($date_end));
$end_month = date_i18n('m',strtotime($date_end));
$end_day = date_i18n('d',strtotime($date_end));

$args = $wp_query -> query_vars;

$date_query = array();


if( $date_start && $date_start != "" ) {

  $start_year = date_i18n('Y',strtotime($date_start));
  $start_month = date_i18n('m',strtotime($date_start));
  $start_day = date_i18n('d',strtotime($date_start));

  $date_query['after'] = array(
    'year'  => $start_year,
    'month' => $start_month,
    'day'   => $start_day,
  );

  $date_query['inclusive'] = true;

}

if( $date_end && $date_end != "" ) {

  $end_year = date_i18n('Y',strtotime($date_end));
  $end_month = date_i18n('m',strtotime($date_end));
  $end_day = date_i18n('d',strtotime($date_end));

  $date_query['before'] = array(
    'year'  => $end_year,
    'month' => $end_month,
    'day'   => $end_day,
  );

  $date_query['inclusive'] = true;

}

if( is_array($countries) && count( $countries ) > 0 ) {
  global $countries_posts;
  $country_post_ids = array();

  foreach( $countries as $country ) {
    $country_post_ids = array_merge( $country_post_ids, $countries_posts[ $country ] );
  }

  $args["post__in"] = $country_post_ids;
}

if( count($date_query) > 0 ) {
  $args["date_query"] = array( $date_query );
}

if( is_array($categories) && count($categories) > 0 ) {
  $args["category__in"] = $categories;
}

// var_dump( $args["category__in"] );


$q = new WP_Query( $args );

?>

<section class="archive">


  <header>

    <h1>
      <?php echo $post_type_plural; ?>
    </h1>
  </header>


  <section class="container-fluid">

  <aside>

    <?php get_template_part("templates/archive_search"); ?>


  </aside>




  <ul class="content-list">


  <?php
  if( $q -> have_posts() ) {
    ?>



    <?php
     while ( $q -> have_posts() ) {
        $q -> the_post();
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

  } else {

    echo "No hay Contenido de ese Tipo.";

  }


       ?>
      </ul>

    </section>

</section>

<?php
get_footer();
?>
