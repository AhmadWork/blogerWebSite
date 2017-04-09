
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
$id= intval($_POST['myid']); /// post id , I need old numbers+ like table
$query = "SELECT * FROM `unlikeme` WHERE `post_id`=$id  AND `user_id` = '".$_SESSION['ID']."'";
$result=mysql_query($query);
$num = mysql_num_rows($result);
if ($num > 0) {echo "unlike before";}else{

$qry="INSERT INTO unlikeme VALUES('".$_SESSION['ID']."','$id')";	
$numl=mysql_query($qry);

$qry="UPDATE post SET unlikes=unlikes+1 WHERE id=$id";
$numl=mysql_query($qry);

$query = "SELECT * FROM `likeme` WHERE `post_id`=$id  AND `user_id` = '".$_SESSION['ID']."'";
$result=mysql_query($query);
$num = mysql_num_rows($result);
if($num > 0){
$query = "DELETE FROM `likeme` WHERE `post_id` =  $id";
mysql_query($query) or die('Error, query failed');
$qry="UPDATE post SET likes=likes-1 WHERE id=$id";
$numl=mysql_query($qry);

}else{
	
}
}
 header("location: followed.php");
	 ?>