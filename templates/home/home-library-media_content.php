<h4>
    Multimedia
</h4>

<nav id="multimedia">
    <ul>
        <?php

        $media_types = get_terms('media_content-type');
        foreach( $media_types as $media_type ):
          switch( $media_type->name ) {
            case 'Audio':
              $icon = 'headphones';
              break;
            case 'Video':
              $icon = 'film';
              break;
            case 'Fotografía':
              $icon = 'camera-retro';
              break;
          }
          ?>


            <li>
                <!-- <div image-frame>
              <?php echo get_the_post_thumbnail(); ?>
            </div> -->
                <div class="text-center font-m">

                    <i class="fa fa-<?php echo $icon; ?>"></i>
                </div>
                <footer>
                    <h6 class="text-center">
                        <?php echo $media_type->name; ?>
                    </h6>
                </footer>
            </li>


            <?php
        endforeach;
      ?>
    </ul>

</nav>

<nav id="redes">
    <h5 class="text-center">
        En redes:
    </h5>
    <ul>

        <li>
            <a href="<?php echo get_option(" hic_al-url-youtube "); ?>" target="_blank">

                <i class="fa fa-youtube"></i>

                <h5>
                    Youtube
                </h5>

            </a>
        </li>

        <li>
            <a href="<?php echo get_option(" hic_al-url-soundcloud "); ?>" target="_blank">

                <i class="fa fa-soundcloud"></i>

                <h5>
                    Soundcloud
                </h5>

            </a>
        </li>

        <li>
            <a href="<?php echo get_option(" hic_al-url-flickr "); ?>" target="_blank">

                <i class="fa fa-flickr"></i>

                <h5>
                    Flickr
                </h5>

            </a>
        </li>



    </ul>

</nav>

<footer>

    <!--
    <a href="#">
      <button type="button" class="more_link_button">
        Ver contenido <b>Multimedia</b>
      </button>
    </a>
    -->

</footer>