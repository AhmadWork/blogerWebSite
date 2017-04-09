
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
$to_folow_user_id= $_POST['myid']; 
$email=$_SESSION['ID'];
//$query = "SELECT * FROM `follow` WHERE `post_id`=$id  AND `user_id` = '".$_SESSION['ID']."'";
//$result=mysql_query($query);
if($to_folow_user_id == $email){ 
header("location: site_Home.php");
}else{ 
$qry="INSERT INTO follow VALUES('".$_SESSION['ID']."','$to_folow_user_id')";	
$numl=mysql_query($qry);
header("location: followed.php");}
	 ?>