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
    mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8');
$id= intval($_POST['myid']);
	$editeded=$_POST['Edited'];
$qry="UPDATE post SET post='$editeded' WHERE id=$id";
 mysql_query($qry);
 header("location: ViewProfile.php");
	 ?>