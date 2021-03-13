<?php get_header(); ?>

<section class="container greeting">
  <div class="text">
    <?= bloginfo('description'); ?>
  </div>
  <img src="<?= get_template_directory_uri(). '/img/greeting-image.png' ?>" alt="...">
</section>
<section class="container catalog-preview">
  <?php
    $details = get_posts([
      'post_type' => 'part',
      'posts_per_page' => 4
    ])
  ?>
    <?php if ( ! empty( $details ) ) : ?>
      <a href="<?= get_post_type_archive_link( 'part' ); ?>" class="catalog-header"><h2>Каталог</h2></a>
      <div class="parts-container">
       <?php
          foreach ( $details as $detail ) {
            part_preview_card( $detail );
          }
        ?>
      </div>
      <a href="<?= get_post_type_archive_link( 'part' ); ?>" class="watch-catalog">Смотреть целиком</a>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
