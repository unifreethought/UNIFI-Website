<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function print_admin_link($user_id, $database) {

  $tmp = DB::single("SELECT `access_admin_dashboard` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");

  if ($tmp['access_admin_dashboard'] == '1') {
    echo '<section id="admin-box">';
    echo '<h3>' . ADMIN_SIDEBAR_HEADER . '</h3><div><div class="no-border"><span><a href="admin/index.php">';
    echo ADMIN_SIDEBAR_LINK . '</a></span></div></div></section>';
  }

}
