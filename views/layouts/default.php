<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('views/partials/head') ?>

<body>
  <?php // visual header ?>
  <?php get_template_part('views/partials/header') ?>

  <?php // page content ?>
  <div id="contentWrap">
    <div class="content">
      <?php get_template_part('views/home'); ?>
    </div><!--content-->
  </div><!--contentWrap-->

  <?php // visual footer ?>
  <?php get_template_part('views/partials/footer'); ?>

  <?php // base scripts got last ?>
  <?php get_template_part('views/partials/base'); ?>
</body>
</html>
