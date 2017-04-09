<?php
	session_start();
if (!IsUser()) {
	header("location: site_Home.php");
}
function IsUser() {
	if (!isset($_SESSION['ID'])) {
		return false;
	}

	return ($_SESSION['user_type'] == 'user');
}
	    include_once('config.php');

$id1 = intval($_POST['id']);
if (isset($id1)) {

$query = "DELETE FROM `post` WHERE `id` =  $id1";

mysql_query($query) or die('Error, query failed');

}
mysql_close($con);
?>
