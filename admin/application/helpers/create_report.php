<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
$years = DB::search("SELECT * FROM `{$database}`.`year`");
$dorms = DB::search("SELECT * FROM `{$database}`.`dorm`");
$positions = DB::search("SELECT * FROM `{$database}`.`positions");
$tags = DB::search("SELECT * FROM `{$database}`.`tags");
$events_dirty = DB::search("SELECT `id`,`title` FROM `{$database}`.`events` ORDER BY `start_time` DESC LIMIT 10;");
$events = array();
  foreach ($events_dirty as $event) {
    $events[] = array('id' => $event['id'], 'desc' => $event['title']);
  }

function print_options($xs, $name) {
  $str = "";
  foreach ($xs as $x) {
    $str .= "<input type='checkbox' name='{$name}[]' value='{$x['id']}' /> {$x['desc']} | ";
  }
  echo substr($str, 0, -3);
}
