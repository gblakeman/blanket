<?php 
//scripts & styles
function BLANKET_add_scripts() {
  //remove core-provided jQuery
  wp_deregister_script('jquery');
  wp_enqueue_script('main-js', BLANKET_THEME . get_asset_hash_path('main.js'), array(), BLANKET_VERSION, true);
  
  wp_enqueue_style( 'styles', BLANKET_THEME . get_asset_hash_path('main.css'), array(), BLANKET_VERSION ); 

  wp_localize_script(
    'main-js',
    'localized',
    array(
      'siteurl' => BLANKET_URL,
      'ajaxURL' => BLANKET_THEME . '/_/php/custom-ajax-handler.php',
    )
  );
} //end BLANKET_add_scripts

?>
