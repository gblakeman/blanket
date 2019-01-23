<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php getPartial('head') ?>

<body>
  <?php // visual header ?>
  <?php getPartial('header') ?>

  <?php // page content ?>
  <div id="contentWrap">
    <div class="content">
      <?php getView('home'); ?>
    </div><!--content-->
  </div><!--contentWrap-->

  <?php // visual footer ?>
  <?php getPartial('footer'); ?>

  <?php // base scripts got last ?>
  <?php getPartial('base'); ?>
</body>
</html>
