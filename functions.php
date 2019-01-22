<?php

//constants
define('BLANKET_SVG_DIR', get_template_directory_uri() . '/_/svg/');


//actions & filters
add_action('after_setup_theme', 'blanket_theme_setup');
function blanket_theme_setup() {

  //head.php
  add_action('init', 'blanket_head_cleanup');

  //dashboard.php
  add_action('login_head', 'blanket_custom_login_css');
  add_filter('login_headerurl', 'blanket_custom_loginlogo_url');
  add_action('wp_dashboard_setup', 'blanket_remove_ataglance');
  add_filter('upload_mimes', 'blanket_add_mime_types');
  add_filter('post_thumbnail_html', 'blanket_remove_width_attribute', 10);
  add_filter('image_send_to_editor', 'blanket_remove_width_attribute', 10);
  add_action('admin_init', 'blanket_custom_editor_styles');
  add_action('admin_menu', 'blanket_editor_dash_cleanup');
  add_action('admin_head', 'blanket_admin_css');

  //ajax.php
  add_action('blanket_blanket_search', 'blanket_search_ajax_handler');
  add_action('blanket_nopriv_blanket_search', 'blanket_search_ajax_handler');
  add_action('blanket_blanket_fetch', 'blanket_fetch_ajax_handler');
  add_action('blanket_nopriv_blanket_fetch', 'blanket_fetch_ajax_handler');

  //scriptsandstyles.php
  add_action('wp_enqueue_scripts', 'blanket_add_scripts');

}//blanket_theme_setup


// requires & includes
require get_template_directory() . '/app/ajax.php';
require get_template_directory() . '/app/dashboard.php';
require get_template_directory() . '/app/head.php';
require get_template_directory() . '/app/helpers.php';
require get_template_directory() . '/app/posttypes.php';
require get_template_directory() . '/app/scriptsandstyles.php';
require get_template_directory() . '/app/taxonomies.php';
require get_template_directory() . '/app/theme.php';

?>
