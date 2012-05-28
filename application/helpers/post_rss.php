<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

header("Content-Type: text/xml");

echo '<?xml version="1.0"?>
<rss version="2.0">
   <channel>
      <title>UNIFI Website</title>
      <link>http://unifreethought.com/</link>
      <description></description>
      <language>en-us</language>
      <managingEditor>contact@unifreethought.com</managingEditor>
      <webMaster>webmaster@unifreethought.com</webMaster>';

$sql = "SELECT * FROM `{$database}`.`blog-posts` ORDER BY `timestamp` DESC;";
$blog_posts = DB::search($sql);
$authors = array();

foreach ($blog_posts as $post) {

  // Pull out the guid for each post
  $sql = "SELECT `guid` FROM `{$database}`.`blog-guids` WHERE `post_id` = '{$post['id']}' LIMIT 1;";
  $guid = DB::single($sql);

  // Pull the authors
  if (@empty($authors[$post['author']]) && @$authors[$post['author']] != '0') {
    $sql = "SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$post['author']}' LIMIT 1;";
    $result = DB::single($sql);
    $authors[$post['author']] = $result['first_name'] . ' ' . $result['last_name'];
  }

  $post['title'] = htmlspecialchars($post['title']);
  $post['content'] = htmlspecialchars($post['content']);
  $post['link'] = htmlspecialchars("http://unifreethought.com/?page=post&post=" . $post['id']);

  echo "<item>";
    echo "<guid>unifreethought-blog-post-{$guid['guid']}</guid>";
    echo "<pubDate>" . date('r', $post['timestamp']) . "</pubDate>";
    echo "<title>{$post['title']}</title>";
    echo "<description>{$post['content']}</description>";
    echo "<link>{$post['link']}</link>";
    echo "<author>{$authors[$post['author']]}</author>";
  echo "</item>";
}

echo '</channel></rss>';
