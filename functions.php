<?php

// constants
define('BLANKET_SVG_DIR', get_template_directory_uri() . '/views/partials/svg/');

// actions & filters
add_action('after_setup_theme', 'blanket_theme_setup');

function blanket_theme_setup() {
  // ajax.php
  // add_action('blanket_blanket_search', 'blanket_search_ajax_handler');
  // add_action('blanket_nopriv_blanket_search', 'blanket_search_ajax_handler');
  // add_action('blanket_blanket_fetch', 'blanket_fetch_ajax_handler');
  // add_action('blanket_nopriv_blanket_fetch', 'blanket_fetch_ajax_handler');

  // classic editor
  add_action('admin_init', 'blanket_custom_editor_styles');
  add_filter('mce_buttons', 'blanket_remove_tinymce_buttons_from_editor');
  add_filter('mce_buttons_2', 'blanket_remove_tinymce_buttons_from_kitchen_sink');

  // dashboard.php
  add_action('login_head', 'blanket_custom_login_css');
  add_filter('login_headerurl', 'blanket_custom_loginlogo_url');
  add_action('wp_dashboard_setup', 'blanket_remove_ataglance');
  add_filter('upload_mimes', 'blanket_add_mime_types');
  //add_filter('post_thumbnail_html', 'blanket_remove_width_attribute', 10);
  //add_filter('image_send_to_editor', 'blanket_remove_width_attribute', 10);
  //add_filter('admin_menu', 'blanket_remove_taxonomy_meta_boxes');
  add_action('admin_menu', 'blanket_dash_cleanup');
  add_action('admin_head', 'blanket_admin_css');

  // gutenberg
  // add_action( 'enqueue_block_editor_assets', 'blanket_block_editor_styles' );
  // add_filter( 'allowed_block_types', 'blanket_allowed_block_types' );

  // head.php
  add_action('init', 'blanket_head_cleanup');

  // scriptsandstyles.php
  add_action('wp_enqueue_scripts', 'blanket_add_scripts');

  // custom taxonomies(1st) & post types(2nd)
  add_action('init', 'blanket_create_taxonomies', 0);
  add_action('init', 'blanket_create_post_types');
}// blanket_theme_setup

// actions & filters
require get_template_directory() . '/app/ajax.php';
require get_template_directory() . '/app/classiceditor.php';
require get_template_directory() . '/app/dashboard.php';
require get_template_directory() . '/app/gutenberg.php';
require get_template_directory() . '/app/head.php';
require get_template_directory() . '/app/scriptsandstyles.php';

// custom post types & taxonomies
require get_template_directory() . '/app/posttypes.php';
require get_template_directory() . '/app/taxonomies.php';

// theme options
require get_template_directory() . '/app/theme.php';

// helpers
require get_template_directory() . '/app/helpers.php';

?>
