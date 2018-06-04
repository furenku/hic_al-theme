<?php $page = get_page_by_title($membership_invitation_page); ?>

<section id="home-membership-member_invitation" v-center>
    
    <div class="text">

        <h3>
            Sé miembro de HIC
        </h3>

        <div class="excerpt">
            <?php echo apply_filters('the_excerpt',$page->post_excerpt); ?>
        </div>

        <footer>
            <a href="<?php echo get_the_permalink($page->ID); ?>">
                <button>
                    Sé parte de HIC
                </button>
            </a>

        </footer>

    </div>

</section>