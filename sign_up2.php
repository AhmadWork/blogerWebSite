<?php
session_start();
	    include_once('config.php');

	$email=$_POST['umail'];
	$password = $_POST['password'];
	$name = $_POST['uname'];
	$phonenumber=$_POST['phonenumber'];;
	echo $name;
	
$query = "SELECT * FROM `user` WHERE `Name`='$name'";
$result=mysql_query($query);
$qry = "SELECT * FROM `user` WHERE `user_id`='$email'";
$res=mysql_query($qry);
//$query = "SELECT * FROM `user` WHERE `Name`=$name";
//$result=mysql_query($query);
$num = mysql_num_rows($result);
$numm = mysql_num_rows($res);
if ($num > 0) {
	 if (mysql_num_rows($result) == 1) {
	$_SESSION['error'] = "ERROR";
	
	header("location: sign_up.php");
	exit();
}}
else{
///////////////////////
if ($numm > 0) {
	 if (mysql_num_rows($res) == 1) {
	$_SESSION['errorr'] = "ERRORR";
	
	header("location: sign_up.php");
	exit();
}}else{
/////////////////////



	
$sign_up = "INSERT INTO user VALUES('$email','$name','$password','$phonenumber')";	

$result=mysql_query($sign_up, $con) or die(mysql_error());
header("location: site_Home.php");
}}
		
		//if ($result) 
		

?>
<?php
mysql_close($con);
?>