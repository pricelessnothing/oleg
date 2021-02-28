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
      <div class="logo__img">
        ЛОГО
      </div>
    </a>
    <div>
      <a href="#" class="feedback">Связаться с нами</a>
      <a href="tel:+7 (800) 800-80-80">+7 (800) 800-80-80</a>
    </div>
  </div>
</header>
<nav>
  <div class="container">
    <div class="nav-main">
      <a href="<?= get_post_type_archive_link('part') ?>">Каталог</a>
      <a href="#">Как мы работаем</a>
      <a href="#">Контакты</a>
    </div>
  </div>
</nav>
<main>
