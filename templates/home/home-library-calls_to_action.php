<h4>
Destacado
</h4>

<?php
$q = new WP_Query( array(
    'post_type'=>array('publication','document'),
    'posts_per_page' => 2,
    'tax_query' => array(
        array(
            'taxonomy' => 'library-category',
            'field'    => 'slug',
            'terms'    => 'destacado',
        ),
    ),
));

if( $q->have_posts() ) :
    
    while ( $q->have_posts() ) :
        $q->the_post();
        
        $download_link = get_post_meta( get_the_ID(), 'publication-file', true);
        
        
        ?>
        
        <article>
        
        <div image-frame>
        <?php echo get_the_post_thumbnail(get_the_ID()); ?>
        </div>
        
        <div class="title" vcenter>
        <h5>
        <?php echo apply_filters('the_title',get_the_title()); ?>
        </h5>
        </div>
        
        <div class="excerpt">
        <?php echo apply_filters('the_excerpt',wp_trim_words(get_the_excerpt(),21)); ?>
        </div>
        
        <nav class="action-buttons">
        <?php if( $download_link && $download_link != "" ) : ?>
        <a href="<?php echo $download_link; ?>" class="download-button" target="_blank">
        <button>
        <i class="fa fa-download"></i>
        <span>
        Descargar
        </span>
        </button>
        </a>
        <?php endif; ?>
        
        <a href="<?php echo get_the_permalink(get_the_ID()); ?>" target="_blank">
        <button>
        Ver
        </button>
        </a>
        </nav>
        
        </article>
        
        <?php
    endwhile;
endif;
?>


</section>