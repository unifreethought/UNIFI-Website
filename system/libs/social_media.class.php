<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

class SocialMedia {

  private function buildUrl($postId, $encode = false) {
    if ($encode == true) {
      return "http%3A%2F%2Funifreethought.com%2Findex.php%3Fpage%3Dpost%26id%3D" . $postId;
    }
    return "http://www.unifreethought.com/index.php?page=post&amp;id=" . $postId;
  }

  private function buildRedditURl($postId) {
    return "http://www.unifreethought.com/index.php?page=post&id=" . $postId;
  }

  static function facebookLike($postId) {
    $fbUrl = "//www.facebook.com/plugins/like.php?href=" . self::buildUrl($postId, true);
    $fbUrl .= "&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80";
    $fbUrl .= "&amp;appId=175996285780738";
    $fbCSS = "style='border:none; overflow:hidden; width:350px; height:30px;'";
    echo "<iframe src='{$fbUrl}' scrolling='no' frameborder='0' {$fbCSS} allowTransparency='true' defer></iframe>";
  }

  static function googlePlus($postId) {
    echo "<g:plusone annotation='inline' href='" . self::buildUrl($postId) . "'></g:plusone>";
  }

  static function redditPost($postId) {
    echo "<div id='redditButton'><script>window.reddit_url='" . self::buildRedditUrl($postId) . "';</script></div>";
  }

}
