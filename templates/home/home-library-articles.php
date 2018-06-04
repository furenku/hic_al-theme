<h4>
Artículos
</h4>

<?php

$articles_cat = get_term_by('name','Artículos','category')->term_id;


$post_type = 'post';

$q = new WP_Query( array(
    'post_type'=>$post_type,
    'posts_per_page' => 3,
    'cat' => $articles_cat    
    )
);

if( $q->have_posts() ) {
    
    ?>
    
    <ul>
    
    <?php

    while ( $q->have_posts() ) {

        $q->the_post();
        
        $exclude_post = get_the_ID();
        
        ?>
        
        <article class="article">
        
        <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
        
        <div class="image_container">
        
        <div image-frame>
        <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
        </div>
        
        </div>
        
        <div class="text_container">
        
        <header>
        <h5>
        <?php echo get_the_title(); ?>
        </h5>
        <?php article_footer(); ?>
        
        </header>
        
        <p>
        <?php echo apply_filters( 'the_excerpt', wp_trim_words(get_the_excerpt(),20) ); ?>
        </p>
        
        </div>
        
        
        </a>
        </article>
        
        
        <?php
    }
    ?>
    
    </ul>
    
    <?php
    
}


?>

<footer>
<a href="<?php echo get_category_link( $articles_cat );  ?>">
<button type="button" name="button">
Ver Más <b>Artículos</b>
</button>
</a>
</footer>