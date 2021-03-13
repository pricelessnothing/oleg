<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alfa Parts</title>
  <?php wp_head(); ?>
</head>
<body>
<header>
  <div class="container header-content">
    <a href="<?= home_url(); ?>" class="logo">
      <img
        class="logo__img"
        src="<?= get_template_directory_uri() . './img/gears.svg' ?>"
        alt="Альфа Партс"
      >
      ALFA PARTS
    </a>
    <div>
      <a href="#" class="feedback">Связаться с нами</a>
      <a href="tel:<?= get_option( 'site_contact_phone' ); ?>"><?= get_option( 'site_contact_phone' ); ?></a>
    </div>
  </div>
</header>
<nav>
  <div class="container">
    <div class="nav-main">
      <a href="<?= get_post_type_archive_link('part') ?>">Каталог</a>
      <a href="<?= get_home_url() . '/shipping' ?>">Как мы работаем</a>
      <a href="<?= get_home_url() . '/contacts' ?>">Контакты</a>
    </div>
  </div>
</nav>
<main>
