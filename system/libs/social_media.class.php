<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

class SocialMedia {

  private function buildUrl($postId, $encode = false) {
    $str = "http://www.unifreethought.com/index.php?page=post&id=" . $postId;  
    if ($encode == true) {
      return htmlspecialchars($str);
    }
    return $str;
  }
  
  static function facebookLike($postId) { 
    $fbUrl = "//www.facebook.com/plugins/like.php?href=" . self::buildUrl($postId, true);
    $fbUrl .= "&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80";
    $fbUrl .= "&amp;appId=175996285780738";
    $fbCSS = "style='border:none; overflow:hidden; width:350px; height:30px;'";
    echo "<iframe src='{$fbUrl}' scrolling='no' frameborder='0' {$fbCSS} allowTransparency='true'></iframe>";
  }

  static function googlePlus($postId) {
    echo "<div><div class='g-plusone' data-annotation='inline' data-width='300' href='" . self::buildUrl($postId) . "'></div><script>(function(){var po = document.createElement('script');po.type='text/javascript';po.async=true;po.src = 'https://apis.google.com/js/plusone.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script></div>";
  }

  static function redditPost($postId) {
    echo "<div><script>reddit_url='" . self::buildUrl($postId) . "'</script><script src='http://www.reddit.com/static/button/button1.js'></script></div>";
  }

  static function twitterButton($postId) {
    echo "<a href='https://twitter.com/share' class='twitter-share-button' data-url='{self::buildUrl($postId)' data-via='unifreethought'>Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='//platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>";
  }

}
