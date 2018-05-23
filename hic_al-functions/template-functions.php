<?php
function list_item( $id, $class ) {
   ?>

   <article class="<?php echo $class ?> list-item">


     <a href="<?php echo get_the_permalink( $id ); ?>" class="image-container">
      <div image-frame="">
         <?php echo get_the_post_thumbnail( $id, 'large' ); ?>
      </div>
      </a>

      <div class="post-info">

        <a href="<?php echo get_the_permalink( $id ); ?>">
           <h6>
              <?php echo wp_trim_words(get_the_title( $id ),18); ?>
           </h6>
         </a>

         <footer class="article-footer">

            <?php if( get_post_type( $id ) == 'open_call' ) :  ?>
               <span class="open_call-deadline">
                  Fecha de Cierre:
                  <?php echo date_i18n('F d',strtotime(get_post_meta($id,'open_call-deadline',true))); ?>
               </span>
            <?php elseif( get_post_type( $id ) == 'event' ) : ?>
               <span class="event_date">
                  Fecha del Evento:
                  <?php echo date_i18n('F d',strtotime(get_post_meta($id,'event-date',true))); ?>
               </span>
            <?php
          endif;

            article_footer_contents();

            ?>

         </footer>


      </div>


   </article>
   <?php
}




function article_footer() {
  ?>

  <footer class="article-footer">

    <?php article_footer_contents(); ?>

  </footer>

  <?php
}

function article_footer_contents() {

  $author = get_the_author_link();

  $country = get_post_meta(get_the_ID(),'content-place-country',true);
  $date = get_the_date();

  if( ! $country ) {
    $country = esc_attr( get_the_author_meta( 'country' ) );
  }

  $categories = get_the_category();

  ?>

    <div class="info">
      <?php if( $author && $author != "" ) : ?>
      <div class="author">
         Por:
         <?php echo $author; ?>
     </div>
      <?php endif; ?>

     <div class="place-date">

        <?php if( $country && $country != "" ) : ?>
            <span class="place">
             <?php echo $country; ?>,
           </span>
        <?php endif; ?>

        <?php if( $date && $date != "" ) : ?>
          <span class="date">
             <?php echo $date; ?>
          </span>
        <?php endif; ?>

     </div>
    </div>

     <ul class="categories">

       <?php foreach($categories as $category) :  ?>

         <li class="category">

           <a href="<?php echo get_category_link($category->cat_ID); ?>">
             <?php echo $category->name; ?>
           </a>

         </li>

       <?php endforeach; ?>

     </ul>

  <?php
}
