
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
$query = "SELECT * FROM `likeme` WHERE `post_id`=$id  AND `user_id` = '".$_SESSION['ID']."'";
$result=mysql_query($query);
//this is how to get number of rows returned
$num = mysql_num_rows($result);
//if he already like it do nothing 
//else if he didn't increase the number of likes and check if did unlike it before, remove the unlike
if ($num > 0) {echo "like before";}else{

$qry="INSERT INTO likeme VALUES('".$_SESSION['ID']."','$id')";	
$numl=mysql_query($qry);

$qry="UPDATE post SET likes=likes+1 WHERE id=$id";
$numl=mysql_query($qry);

$query = "SELECT * FROM `unlikeme` WHERE `post_id`=$id  AND `user_id` = '".$_SESSION['ID']."'";
$result=mysql_query($query);
$num = mysql_num_rows($result);
if($num > 0){
$q = "DELETE FROM `ulikeme` WHERE `post_id` =  $id";
mysql_query($q) or die('Error, query failed');
$qry="UPDATE post SET unlikes=unlikes-1 WHERE id=$id";
$numl=mysql_query($qry);

}else{
	
}
}
  header("location: followed.php");
	 ?>
	 
	 
	 