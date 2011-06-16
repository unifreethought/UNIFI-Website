<?php
/**
 * UNIFI WebSite
 * Adam Shannon
 * 2011-02-27
 */
 
$first_name = "`first_name` LIKE '" . MySQL::clean($_POST['first_name']) . "%'";
$last_name = "`last_name` LIKE '" . MySQL::clean($_POST['last_name']) . "%'";

$sql = "SELECT `id`,`first_name`,`last_name` FROM `{$database}`.`users` WHERE {$first_name} AND {$last_name} LIMIT 100";
//echo $sql . '<br /><br />';

$data = MySQL::search($sql);
//print_r($data);

echo ADMIN_DASHBORD_DELETE_USER_CONFORM_DESC . '<br />';
echo "<form action='index.php' method='POST'>";
echo "<input type='hidden' name='confirm_delete' value='yes' />";
echo "<ul style='list-style-type:none;'>";

foreach ($data as $person) {
	echo '<li>';
		echo "<input type='checkbox' name='users_to_delete[]' value='{$person['id']}' />";
		echo $person['first_name'] . ' ' . $person['last_name'];
	echo '</li>';
}

echo '</ul>';
echo "<input type='submit' value='" . ADMIN_DASHBORD_DELETE_USER_SUBMIT . "' />";
echo "<input type='button' onclick='window.location=\"index.php\";' value='" . ADMIN_DASHBORD_DELETE_USER_GO_HOME . "' />";
echo "</form>";
