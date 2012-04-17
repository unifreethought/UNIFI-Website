<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function show_authors_in_sidebar() {
  $authors_raw = MySQL::search("SELECT `user_id`,`count` FROM `" . MySQL::$database . "`.`blog-authors`");
  $authors = array();
  foreach ($authors_raw as $_author) {
    $sql = 'SELECT `first_name`,`last_name` FROM `' . MySQL::$database . '`.`users` WHERE `id` = "' . $_author['user_id'] . '" LIMIT 1';
    $_name = MySQL::single($sql);
    $authors[] = array($_name['first_name'] . ' ' . $_name['last_name'], $_author['user_id'], $_author['count']);
  }

  asort($authors);

  foreach ($authors as $author) {
    echo '<li><a href="index.php?page=profile&profile=' . $author[1] . '">' . $author[0] . '</a> (' . $author[2] . ')</li>';
  }
}

function show_labels_in_sidebar() {
  $labels_raw = MySQL::search("SELECT `id`,`tag`,`count` FROM `" . MySQL::$database . "`.`blog-tag-names` WHERE `count` > 0");

  asort($labels_raw);

  foreach ($labels_raw as $label) {
    echo '<li><a href="index.php?page=label&label=' . $label['id'] . '">' . $label['tag'] . '</a> (' . $label['count'] . ')</li>';
  }
}
