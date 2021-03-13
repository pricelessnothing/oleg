<?php

/* WP setup */

add_theme_support( 'post-thumbnails' );

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('ap-style', get_stylesheet_directory_uri() . '/style.css');
});


/* Post types */

add_action('init', function() {

  register_taxonomy( 'vehicle', 'part', [
    'label' => 'Спецтехника',
    'public' => true,
    'hierarchical' => true
  ]);

  register_post_type( 'part', [
    'label' => 'Запчасть',
    'has_archive' => true,
    'public' => true,
    'publicly_queryable' => true,
    'rewrite' => [ 'slug' => 'parts' ],
    'supports' => ['title', 'editor', 'thumbnail'],
    'taxonomies' => ['vehicle']
  ]);
});

flush_rewrite_rules();

/* Theme utils */

function category_select( $vehicle ) {
  $all_brands = get_tags([
    'taxonomy' => 'vehicle',
    'parent' => 0,
    'hide_empty' => false,
  ]);

  $vendors = [];
  foreach ($all_brands as $brand) {
    $models = get_tags([
      'taxonomy' => 'vehicle',
      'parent' => $brand->term_id,
      'hide_empty' => false,
    ]);

    $children = [];

    $opened = $vehicle === $brand->slug;

    foreach( $models as $model ) {
      $children[] = [
        'id'     => $model->term_id,
        'name'   => $model->name,
        'slug'   => $model->slug,
        'active' => $model->slug === $vehicle
      ];

      if ( $vehicle === $model->slug ) {
        $opened = true;
      }
    }

    $vendors[] = [
      'id'       => $brand->term_id,
      'name'     => $brand->name,
      'slug'     => $brand->slug,
      'children' => $children,
      'opened'   => $opened
    ];
  }
  ?>

    <ul>
      <?php foreach( $vendors as $vendor ): ?>
        <li class="<?= $vendor['opened'] ? 'opened' : '' ?>">
          <a href="<?= get_post_type_archive_link('part') . '?vehicle=' . $vendor['slug']; ?>">
            <?= $vendor['name'] ?>
          </a>
        <?php if ( ! empty( $vendor['children'] ) ): ?>
          <ul>
            <?php foreach ( $vendor['children'] as $model ): ?>
              <li class="<?= $model['active'] ? 'active' : '' ?>">
                <a href="<?= get_post_type_archive_link('part') . '?vehicle=' . $model['slug'] ?>"><?= $model['name'] ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>


  <?php
}

function part_preview_card( $part ) {
  ?>
    <a class="part-card" href="<?= get_permalink( $part ) ?>">
      <img src="<?= get_image_src( $part ) ?>" alt="<?= $part->post_title ?>">
      <h2><?= $part->post_title ?></h2>
      <h3>Артикул: <?= get_post_meta( $part->ID, 'artikul', true); ?></h3>
    </a>
  <?php
}

function get_image_src( $post ) {
  if ( has_post_thumbnail( $post ) ) {
    return get_the_post_thumbnail_url( $post );
  } else {
    //TODO: get more beautiful pic
    return get_template_directory_uri() . '/img/noimg.png';
  }
}

function general_settings_register_fields() {
  register_setting( 'general', 'site_contact_phone', 'esc_attr' );
  add_settings_field( 'site_contact_phone', '<label for="site_contact_phone">' . __( 'Контактный телефон', 'r47717' ) . '</label>', 'general_settings_phone_field_html', 'general' );

  register_setting( 'general', 'site_contact_emails_textfield', 'esc_attr' );
  add_settings_field( 'site_contact_emails_textfield', '<label for="site_contact_emails_textfield">' . __( 'Emails для сообщений', 'r47717' ) . '</label>', 'general_settings_emails_field_html', 'general' );
}

function general_settings_phone_field_html() {
  $value = get_option( 'site_contact_phone', '' );
  ?>
  <input type="text" id="site_contact_phone" name="site_contact_phone" value="<?= $value ?>">
  <?php
}

function general_settings_emails_field_html() {
  $value = get_option( 'site_contact_emails_textfield', '' );
  ?>
  <textarea id="site_contact_emails_textfield" name="site_contact_emails_textfield" rows="6" cols="35"><?= $value ?></textarea>
  <?php
}

add_filter( 'admin_init', 'general_settings_register_fields' );
