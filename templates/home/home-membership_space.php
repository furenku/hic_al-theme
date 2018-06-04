<section id="home-membership-space">


    <h3>
        <?php echo apply_filters('the_title',$page->post_title); ?>
    </h3>

    <section id="home-membership-map" class="map"></section>


    <footer>
        <a href="<?php echo get_the_permalink( $page -> ID ); ?>">
            <button type="button" name="button" class="more_link_button">
                Ver la
                <b>Lista de Miembros</b>
            </button>
        </a>
    </footer>

    <ul class="location_list hidden">
        <?php
        $authors = get_users( array('role'=>'member_role') );
        
        if( is_array($authors) ) :
            foreach($authors as $author) :

            $longitude = esc_attr( get_the_author_meta( 'longitude', $author->ID ) );
            $latitude = esc_attr( get_the_author_meta( 'latitude', $author->ID ) );

            ?>
        
                <article
                class="member location_item"
                data-id="<?php echo $author->ID; ?>"
                data-longitude="<?php echo $longitude; ?>"
                data-latitude="<?php echo $latitude; ?>"
                >

                    <h5>
                        <?php echo $author->display_name; ?>
                    </h5>

                </article>
        
            <?php
            endforeach;
        endif;
        ?>

    </ul>

</section>