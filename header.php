<!doctype html>

<html class="no-js" lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HIC-AL</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

    <link href="<?php echo get_stylesheet_directory_uri(); ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/css/hic_al.css">

    <?php wp_head(); ?>

  </head>

  <body>

   <header id="site_header">

      <div id="secondary_menu-container">

         <?php echo wp_nav_menu(array(
            'theme_location' => 'secondary',
            'container' => 'nav',
            'container_class' => 'vcenter',
            'echo' => false
         )); ?>

      </div>

      <div id="primary_menu-container">

         <a href="<?php echo get_site_url(); ?>">
            <div id="logo" image-frame contain left>
               <img src="http://fakeimg.pl/200x70" alt="">
            </div>
         </a>

         <?php echo wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'echo' => false,
            // 'depth' => 1
         )); ?>

         <!-- <form id="search" action="">
            <input type="text">
            <button type="submit" value="">
               <i></i>
            </button>
         </form> -->

         <?php get_search_form( ); ?>

         <nav id="social_media_links">
            <ul>
               <li>
                  <a href="#" network="facebook">
                     <i></i>
                  </a>
               </li>
               <li>
                  <a href="#" network="twitter">
                     <i></i>
                  </a>
               </li>
               <li>
                  <a href="#" network="youtube">
                     <i></i>
                  </a>
               </li>
               <li>
                  <a href="#" network="instagram">
                     <i></i>
                  </a>
               </li>
            </ul>
         </nav>

      </div>

   </header>

   <main>
