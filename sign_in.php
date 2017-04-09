<?php
session_start();

    include_once('config.php');
//Sanitize the POST values
$login    = $_POST['login'];
$password = $_POST['password'];

//Create query
$qry= "SELECT * FROM `user` WHERE `user_id`='$login' AND `Password`='$password'";
$result = mysql_query($qry);

//Check whether the query was successful or not
if ($result) {
	//if(true){
    if (mysql_num_rows($result) == 1) {
        //Login Successful
        $user               = mysql_fetch_assoc($result);
        $_SESSION['ID']       = $user['user_id'];
        $_SESSION['user_type'] = 'user';
		header("location: ViewProfile.php");
        exit();
    } else {
                
                //Login failed
				$_SESSION['error'] = "ERROR";
                header("location: login.php");
                exit();
           }
} 
    

?>