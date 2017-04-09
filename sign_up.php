<!DOCTYPE HTML>
<!--
	Verti 2.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	//include 'config.php';
	session_start();


?>
<html>
	<head>
		<title>sign_up </title>
							<!-- <link href="style2.css" rel="stylesheet" type="text/css" /> -->

<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<script src="js/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
			</head>
			<body class ="wrapper">
						
							<!-- Header -->
								<header>											
										</header>
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
											
											<div  >
			 <?php
// include database connection
    include_once('config.php');

// select all data

?>




	<form action="sign_up2.php" method="post">
	<fieldset style="margin: auto; border-radius: 10px; width:60%; padding: 5px; min-height:70%; border:3px solid #1f497d;">
      <legend style="padding: 5px 20px 5px 20px; margin:0 auto; background: #25587E; color: #fff; font-size: 14px; border-radius: 20px; box-shadow: 0 0 0 10px #ddd;"> Sign_up</legend>
	  		<?php if (isset($_SESSION['error']))
			echo "<h3 style='text-align: center; font-style: italic; color:red; font-size: 14px;'> This nickname is already taken </h3>";
		if (isset($_SESSION['errorr']))
			echo "<h3 style='text-align: center; font-style: italic; color:red; font-size: 14px;'> This email is already taken </h3>";
	?>
  <table style="margin:auto">		    
		  <tr>
		  <td>
	Enter Your Nickname: </td> 
		  <td> <input type= "text" id= "uname" name="uname" style="width:250px;" required/> 
		  </td>
		  </tr>
		  <tr>
		  <td>Your Email:</td>
		  <td><input type= "email" id= "umail" name="umail" placeholder=""  style="width:250px;" required /></td>
		  </tr>
		  <tr>
		  <td>Your Password:</td>
		  <td><input type= "password" id= "password" name="password" placeholder=""  style="width:250px;" required /></td>
		  </tr>
		  <tr>
		  <td>Your Phone number:</td>
		  <td><input type= "text" id= "phonenumber" name="phonenumber" placeholder=""  style="width:250px;" /></td>
		  </tr>
		  <tr>

		   </tr>
		   </table> 
		 
							<input class="buttons" style="float: right;" type="submit" value="sign_up" />
							<br/>
							</fieldset>
						</form><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
			
			
			</div>
			
			
			</body>
			</html>