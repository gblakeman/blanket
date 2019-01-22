<?php 
//scripts & styles
function blanket_add_scripts() {
  //remove core-provided jQuery
  wp_deregister_script('jquery');
  // main js file
  wp_enqueue_script('main-js', get_template_directory_uri() . getHashedAsset('main.js'), array(), null, true);
  // main css file
  wp_enqueue_style( 'styles', get_template_directory_uri() . getHashedAsset('main.css'), array(), null ); 

  wp_localize_script(
    'main-js',
    'localized',
    array(
      'siteurl' => get_bloginfo('url'),
      'ajaxURL' => get_template_directory_uri() . '/app/custom-ajax-handler.php',
    )
  );
}
//end blanket_add_scripts
?>
