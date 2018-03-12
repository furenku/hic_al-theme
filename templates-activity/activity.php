<?php

/*
Template Name: Activity
*/


get_header();


$call_for_solidarity_object = get_post_type_object('call_for_solidarity');
$news_item_object = get_post_type_object('news_item');
$open_call_object = get_post_type_object('open_call');
$event_object = get_post_type_object('event');
$category_object = get_term_by('name','Artículos','category');


$call_for_solidarity_name = $call_for_solidarity_object->labels->name;
$news_item_name = $news_item_object->labels->name;
$open_call_name = $open_call_object->labels->name;
$event_name = $event_object->labels->name;
$category_name = $category_object->name;

$call_for_solidarity_link = get_post_type_archive_link( 'call_for_solidarity' );
$news_item_link = get_post_type_archive_link( 'news_item' );
$open_call_link = get_post_type_archive_link( 'open_call' );
$event_link = get_post_type_archive_link( 'event' );
$category_link = get_term_link( get_term_by('name','Artículos','Category') );

$subsections = array(
  'Solidaridad',
  $news_item_name,
  $open_call_name,
  $event_name,
  $category_name,
);

if( have_posts() ) {
  while ( have_posts() ) {
    the_post();


?>

<article id="activity" class="site_section">


  <h1 class="section-title">
    Actividad
  </h1>


  <?php
    $prefix = "activity";
    include( locate_template('templates/components/shared/section-menu.php') );
  ?>


  <section id="activity-sections" class="sections_list">

    <section id="activity-<?php echo name2slug('Solidaridad'); ?>" class="activity-section">
      <?php include_once( locate_template('templates-activity/activity/activity-solidarity.php', true) ); ?>
    </section>

    <section id="activity-<?php echo name2slug( $news_item_name ); ?>" class="activity-section">
      <?php include_once( locate_template('templates-activity/activity/activity-news.php', true) ); ?>
    </section>

    <section id="activity-<?php echo name2slug( $open_call_name ); ?>" class="activity-section">
      <?php include_once( locate_template('templates-activity/activity/activity-open_calls.php', true) ); ?>
    </section>

    <section id="activity-<?php echo name2slug( $event_name ); ?>" class="activity-section">
      <?php include_once( locate_template('templates-activity/activity/activity-events.php', true) ); ?>
    </section>

    <section id="activity-<?php echo name2slug( $category_name ); ?>" class="activity-section">
      <?php include_once( locate_template('templates-activity/activity/activity-articles.php', true) ); ?>
    </section>

  </section>


</article>

<?php

}
} else {

}


get_footer();

?>
