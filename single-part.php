<?php get_header(); ?>

<?php the_post(); ?>

<div class="container">
  <h1><?= get_the_title(); ?></h1>
  <p>
    <?= get_the_content(); ?>
  </p>
</div>

<?php get_footer(); ?>