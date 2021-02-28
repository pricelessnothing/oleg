<?php get_header(); ?>

<div class="container part-catalog-page">
  <div class="catalog-menu">
    <?php
      category_select( get_query_var( 'vehicle' ) ?? '' );
    ?>
  </div>
  <div class="parts">
    <?php if ( have_posts() ) : ?>
      <div class="parts-container">
       <?php
          while ( have_posts() ) {
            the_post();
            global $post;
            part_preview_card( $post );
          }
        ?>
      </div>
    <?php else : ?>
      <div class="no-parts-placeholder">Запчасти отсутствуют</div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>