<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function print_profile_button($user_id) {

  if (isset($user_id)) {
    echo "<a class='profile-link' href='index.php?page=profile&profile={$user_id}'>" . MAIN_PAGE_PROFILE_NAV_LINK . "</a>";
  }

}
