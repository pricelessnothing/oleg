<?php get_header(); ?>

<?php
  global $post;
  $post_tags = get_the_terms( $post->ID, 'vehicle' );
  $post_tag = array_values(
    array_filter( $post_tags, function( $tag ) {
      return $tag->parent !== 0;
    })
  )[0]->slug;
?>

<div class="container single-part-page">
  <div class="catalog-menu">
    <?php
      category_select( $post_tag );
    ?>
  </div>
  <div class="part">
    <div class="photo">
      <img src="<?= get_image_src( $post ); ?>" alt="<?= get_the_title(); ?>">
    </div>
    <div class="description">
      <h1 class="part-title">
        <?= get_the_title(); ?>
      </h1>
      <h3 class="part-artikul">
        Артикул: <?= get_post_meta( $post->ID, 'artikul', true); ?>
      </h3>

      <button class="feedback-button">
        Связаться с менеджером
      </button>

      <div class="text">
        <?= get_the_content(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>