<?php get_header(); ?>

<div class="container">
  <div class="error-404">
    <div class="code">404 :(</div>
    <p>Кажется, такой страницы не существует.</p>
    <p>
      Попробуйте <a href="#" onclick="window.history.back()">вернуться назад</a>
      <br>
      или перейти на <a href="<?= home_url(); ?>">главную страницу</a>.
    </p>
  </div>
</div>

<?php get_footer(); ?>