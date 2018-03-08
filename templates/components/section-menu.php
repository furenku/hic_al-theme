<?php # global $subsections; ?>

<nav class="section-menu">

  <ul>

    <?php foreach( $subsections as $section ) : ?>

      <li>
        <a href="#activity-<?php echo name2slug($section); ?>">

          <span>
             <?php echo $section; ?>
          </span>

        </a>
      </li>


    <?php endforeach; ?>

  </ul>

</nav>
