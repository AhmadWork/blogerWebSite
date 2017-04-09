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

	$comment=mysql_real_escape_string($_POST['comnnn']);
	$post_id=intval($_POST['pid']);
	$sql="SELECT `Name` FROM `user` WHERE `user_id` = '".$_SESSION['ID']."'";
									//$sql = "SELECT * FROM user WHERE email ='".$_SESSION['ID']."'";
									mysql_query("SET NAMES UTF8");
									mysql_query('SET CHARACTER SET utf8');
									$res = mysql_query($sql);
									//$row = mysql_real_escape_string($res);
$row1 = mysql_fetch_assoc($res);

$field1 = $row1['Name'];
//
	echo $field1;
		$query = "INSERT INTO comment VALUES('','$post_id','$comment','$field1')";	
		mysql_query("SET NAMES 'utf8'");
        mysql_query('SET CHARACTER SET utf8');
	$result=mysql_query($query, $con) or die(mysql_error());
		//if ($result) 
	header("location: followed.php");

?>
<?php
mysql_close($con);
?>