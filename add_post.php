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

	$post=$_POST['post'];
$sql="SELECT `Name` FROM `user` WHERE `user_id` = '".$_SESSION['ID']."'";
									
$res = mysql_query($sql);
								
$row1 = mysql_fetch_assoc($res);

$field1 = $row1['Name'];

	echo $field1;
		$query = "INSERT INTO post VALUES('','".$_SESSION['ID']."','0','0','$post','$field1','0')";	
	$result=mysql_query($query, $con) or die(mysql_error());
		//if ($result) 
	header("location: ViewProfile.php");

?>
<?php
mysql_close($con);
?>