<!DOCTYPE HTML>
<!--
	Verti 2.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	include 'config.php';
	session_start();
if (!IsUser()) {
	//header("location: frontpage.php");
}
function IsUser() {
	if (!isset($_SESSION['ID'])) {
		return false;
	}

	return ($_SESSION['user_type'] == 'user');
}

    include_once('config.php');

?>
<html>
	<head>
		<title>About </title>
							<!-- <link href="style2.css" rel="stylesheet" type="text/css" /> -->

<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<script src="js/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
<!--<meta http-equiv="refresh" content="5" >-->
			</head>
			<body class ="wrapper">
						

<div class="body">
<div class="topblock">
							<!-- Header -->
								<header>												

										</header>
<h1> <img src="img/Logo.png" alt="logo" style="width: 500px; height: 200px;"/> </h1>  

<div class="topnav"> 

<ul>
<?php if (isset($_SESSION['ID'])){
			echo "<li><a href='site_home.php'>Home</a></li>";
			echo "<li><a href='ViewProfile.php'>My blog</a></li>";
												
			echo"<li><a href='followed.php'>followed blogger posts</a></li>";
	        echo "<li><a href='Logout.php'>Sign out</a></li>";
			echo"<li><a href='About.php.php'>About</a></li>";
												 
												}else{
													echo"<li><a href='site_Home.php'>Home</a></li>";
													echo"<li><a href='login.php'>Sign in</a></li>";
													echo"<li><a href='sign_up.php'>Sign up</a></li>";
													echo"<li><a href='About.php.php'>About</a></li>";
													
												}?>
												
											</ul>
</div><br>
<!--right icons-->
	
											<!--<h1> lets share our thought people </h1>-->
											</div>
											<div>
	<fieldset style=" margin: auto; border-radius: 10px; width:60%; padding: 5px; min-height:70%; border:3px solid #1f497d;">
    
<h1 style=" text-align: center; color:#1f497d;">This Web Site Devloped For SWE381</h1></b> <br>
<h1 style=" text-align: center; color:#1f497d;">BY Group No.15</h1></b> <br>
<h1 style=" text-align: center; color:#1f497d;">Supervised By Dr.Achraf Gazdar</h1></b> <br>



<h3>Group Member: <h3><br>

<h3>Ahmed Alsehaim - 434105435<h3> <br>

<h3>Abdulrahman AlMuzaini - 434104474<h3> <br>

<h3>Abdulmohsen altuwaijri - 433106704<h3> <br>

<h3>Abdullah Aldrees - 433102147<h3> <br>
  </fieldset>
											
											
											<div>
											
										<br><br><br>
			</div>
			
			
			</body>
			</html>