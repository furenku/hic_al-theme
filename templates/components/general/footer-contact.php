<section id="contact">

    <h4>
        Contacto
    </h4>

    <div class="content">
        <?php
        $page = get_page_by_title("Contacto");
        echo apply_filters('the_content', $page->post_content);
        ?>
    </div>

</section>