<?php

/**
* Use assets with hashed names.
* credit: https://danielshaw.co.nz/wordpress-cache-busting-json-hash-map/
*
* Matches a filename against a hash manifest and returns the hash file name if
* it exists.
*
* @param  string $filename Original name of the file.
* @return string $filename Hashed name version of a file.
*/
function getHashedAsset( $filename ) {
  $manifest_path = get_template_directory_uri() . '/dist/manifest.json';

  if ( ! empty( $manifest_path ) ) {
    $request  = wp_remote_get( $manifest_path );
    $manifest = json_decode( wp_remote_retrieve_body( $request ) );

    if ( array_key_exists( $filename, $manifest ) ) {
      return '/dist/' . $manifest->$filename;
    }
  }

  return $filename;
}

function getHashedAssetWithPath( $filename ) {
  $base_path = get_template_directory_uri();
  $hashed_filename = getHashedAsset($filename);
  $name_with_path = $base_path . $hashed_filename;
  return $name_with_path;
}

function getMetaTitle()
{
  if (is_archive()) {
    echo post_type_archive_title() . " | ";
  } elseif (is_single() || is_page()) {
    echo get_the_title() . " | ";
  } elseif (is_404()) {
    echo '404 Error - ';
  }
  bloginfo('name');
}//getMetaTitle

function getMetaDesc()
{
  $id = get_queried_object_id();
  if (is_404()) {
    echo "404";
  } else {
    echo get_the_title($id);
  }
}//getMetaDesc

function getMetaImage()
{
  $id = get_queried_object_id();
  if (get_the_post_thumbnail_url( $id )) {
    echo get_the_post_thumbnail_url( $id, 'card' );
  } else {
    echo getHashedAsset( 'test.png' );
  }
}//getMetaImage

function getMetaURL()
{
  $id = get_queried_object_id();
  if (is_home()) {
    echo get_bloginfo('url');
  } else {
    echo get_permalink();
  }
}//getMetaURL

?>
