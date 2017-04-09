<?php
session_start();
	    include_once('config.php');
$email = $_POST['forget'];

$qry = "SELECT * FROM `user` WHERE `user_id`='$email'";
$res=mysql_query($qry);
$num = mysql_num_rows($res);

if ($num > 0) {
	 if (mysql_num_rows($res) == 1) {
		 //create new pass
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $newPass = '';
    for ($i = 0; $i < 6; $i++)
        $newPass .= $characters[mt_rand(0, 61)];
		 //
$subject = "Password Reset";
$message = "We have received a password change request for your blog account, so here is your new password\n---------------------- \nPassword: 
$newPass\n---------------------- \nThank you for using blogger.com";
$from = "blogger@gmail.com";
$headers = "From: " . $from;
if (mail($email,$subject,$message,$headers))
//echo "Mail Sent.";
		 ///
		 
	$_SESSION['success'] = "SUCCESS";
	
	header("location: login.php");
	exit();
}}
else{
	$_SESSION['fail'] = "FAIL";
	header("location: login.php");
	exit();
}


?>