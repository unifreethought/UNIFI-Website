<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

function check_url() {

  $post = $_POST;
  $get = $_GET;
  $url = array();

  if (!empty($post) && empty($get)) {
    $url['get'] = (bool) false;
    $url['post'] = (bool) true;
  } else {
    $url['get'] = (bool) true;
    $url['post'] = (bool) false;
  }

  if (!empty($get['page'])) {
    $url['page'] = $get['page'];

    foreach ($get as $key => $value) {
      if (empty($url[$key])) {
        $url[$key] = $value;
      }
    }
  } else {
    $url['page'] = 'main';
  }


  return $url;
}
