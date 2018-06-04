<h4>
    Documentos
</h4>

<ul>
    <?php
      $q = new WP_Query(array(
        'post_type' => array('document'),
        // 'usertype?' => array('memberr'),
        'posts_per_page' => 4,
        'tax_query' => array(
            array(
                'taxonomy' => 'document-type',
                'field'    => 'slug',
                'terms'    => array('interno', 'newsletter'),
                'operator'  => 'NOT IN'
            ),
        ),
        )
    );
    if( $q->have_posts() ) :
        while ( $q->have_posts() ) :
            
            $q->the_post();
            ?>

        <article>
            <a href="<?php echo get_the_permalink( get_the_ID() ); ?>">
                <h5>
                    <?php echo apply_filters('the_title',get_the_title()); ?>
                </h5>
                <div class="document-type">
                    <?php
            $terms = get_the_terms( get_the_ID(),'document-type');
            echo $terms[0]->name;
            ?>
                </div>
                <div class="date">
                    <?php echo ucfirst(get_the_date('F, Y', get_the_ID())); ?>
                </div>
            </a>
        </article>


        <?php
        endwhile;
    endif;
    ?>
</ul>

<footer>
    <a href="#">
        <button type="button" class="more_link_button">
            Ver más
            <b>Documentos</b>
        </button>
    </a>
</footer>