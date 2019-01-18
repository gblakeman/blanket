<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:title" content="<?php getMetaTitle(); ?>">
<meta property="og:description" content="<?php getMetaDesc(); ?>">
<meta property="og:url" content="<?php getMetaURL(); ?>">
<meta property="og:image" content="<?php getMetaImage(); ?>">
<meta property="og:type" content="<?php if (is_single() || is_page() || is_tax()) {
                                  echo "article";
                                } else {
                                  echo "website";
                                } ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">

<link rel="icon" href="<?php echo getHashedAssetWithPath('icons/favicon.ico') ?>">
<link rel="icon" sizes="128x128" href="<?php echo getHashedAssetWithPath('icons/android-icon-sm.png') ?>">
<link rel="icon" sizes="192x192" href="<?php echo getHashedAssetWithPath('icons/android-icon-lg.png') ?>">
<link rel="mask-icon" href="<?php echo getHashedAssetWithPath('icons/pinned-tab.svg') ?>" color="#ff6767">
<link rel="apple-touch-icon" href="<?php echo getHashedAssetWithPath('icons/touch-icon-iphone-sm.png') ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo getHashedAssetWithPath('icons/touch-icon-ipad.png') ?>">
<link rel="apple-touch-icon" sizes="167x167" href="<?php echo getHashedAssetWithPath('icons/touch-icon-ipad-pro.png') ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo getHashedAssetWithPath('icons/touch-icon-iphone-lg.png') ?>">

<title><?php getMetaTitle(); ?></title>

<?php wp_head(); ?>

</head>

<body>

  <header>
    HEADER
  </header>

  <div id="contentWrap">
    <div class="content">
