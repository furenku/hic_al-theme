<?php
$post_type = get_post_type();

$post_type_plural = get_post_type_object( $post_type )->label;
$category__in = get_post_type_object( $post_type )->label;

$parent = get_term_by( "name", $post_type_plural, "category" )->term_id;
$categoryObjects = get_categories( array( "parent" => $parent ) );




?>

<form id="archive-searchform" class="row" action="<?php echo get_post_type_archive_link(); ?>">

  <h2>
    Filtrar
  </h2>


  <div class="rrow form-section-inputs">


    <input class="inlineSearch"
    type="text"
    name="s"
    value="<?php echo $s; ?>"
    onclick="this.value = ''"
    placeholder = "Buscar en <?php echo $post_type_plural; ?>..."
    onfocus="if (this.placeholder == "Buscar <?php echo $post_type_plural; ?>") {this.placeholder = ''} " />

  </div>


  <div class="rrow input-daterange input-group form-section-inputs">

    <h3>Fechas</h3>

    <div class="date-input-container">
      <label class="input-group-addon">Desde</label>
      <input type="text"
      class="input-sm form-control"
      value="<?php echo $date_start; ?>"
      name="date_start" />
    </div>
    <div class="date-input-container">
      <label class="input-group-addon">Hasta</label>
      <input type="text"
      class="input-sm form-control"
      value="<?php echo $date_end; ?>"
      name="date_end" />
    </div>

  </div>

  <?php if(!is_category()): ?>


  <nav id="categories" class="rrow form-section-inputs">

    <h3>Categorías</h3>

    <ul>
      <?php foreach ($categoryObjects as $category ): $cat_id = $category->cat_ID; ?>
        <!-- input[type=checkbox][cat_id=x][name=categories[]]{n} -->
        <li category="<?php echo $cat_id; ?>">
          <input type="checkbox" value="<?php echo $cat_id; ?>" name="categories[]" <?php echo in_array( $cat_id, $categories ) ? 'checked' : ''; ?> class="checkbox-hidden"/>
          <label class="checkbox-label">
            <?php echo $category->name; ?>
          </label>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>


  <nav id="countries" class="rrow form-section-inputs">

    <h3>Países</h3>

    <ul>

      <?php global $countries_posts; foreach ( $countries_posts as $country => $country_posts ): ?>
        <li country="<?php echo $country; ?>" posts="<?php echo json_encode($country_posts); ?>">
          <input type="checkbox" value="<?php echo $country; ?>" name="countries[]" <?php echo in_array( $country, $countries ) ? 'checked' : ''; ?> class="checkbox-hidden"/>
          <label class="checkbox-label">
            <?php echo $country; ?> <span>(<span class="post_count"><?php echo count($country_posts); ?></span>)</span>
          </label>
        </li>
      <?php endforeach; ?>

    </ul>
  </nav>



  <input type="hidden" name="post_type" value="<?php echo $post_type; ?>"/>

  <?php endif; ?>

  <input class="inlineSubmit" id="searchsubmit" type="submit" alt="Buscar" value="Buscar" />



</form>
