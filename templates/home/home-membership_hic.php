<?php $page = get_page_by_title($membership_hic_page); ?>

<section id="home-membership-hic">
    <h3>
        <?php echo apply_filters('the_title',$page->post_title); ?>
    </h3>

    <div image-frame contain>
        <?php echo get_the_post_thumbnail($page->ID,'medium'); ?>
    </div>

    <div class="text">
        <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
    </div>
    
    <footer>
        <a href="<?php echo get_the_permalink( $page->ID ); ?>">
            Ver más            
        </a>
    </footer>
</section>