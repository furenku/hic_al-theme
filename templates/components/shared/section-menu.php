<?php # global $subsections; ?>

<nav class="section-menu">

  <ul>

    <?php foreach( $subsections as $section ) : ?>

      <li>
        <a href="#<?php echo $prefix . '-' . name2slug($section); ?>">

          <span>
             <?php echo $section; ?>
          </span>

        </a>
      </li>


    <?php endforeach; ?>

  </ul>

</nav>
