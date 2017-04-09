<!DOCTYPE HTML>
<!--
	Verti 2.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	include 'config.php';
	session_start();


?>
<html>
	<head>
		<title>Log in </title>
							<!-- <link href="style2.css" rel="stylesheet" type="text/css" /> -->

<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<script src="js/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
        <script type="text/javascript">
            // function expand the field set when click on it
            function expand(num) {
                var v = document.getElementById("fieldset1");
                if (num == 1) {
                    if (v.style.display == "none") {
                        v.style.display = "block";
                        //q.style = "border-radius: 5px; width:98%; padding: 5px; min-height:150px; border:5px solid #1f497d;";

                    } else
                        v.style.display = "none";
                   // q.style = "border:none; width:98%;";
                }

            }
        </script>
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
</div>
<!--right icons-->
	
											<!--<h1> lets share our thought people </h1>-->
											</div>
											
											<div >

						<br>
						<fieldset style=" margin: auto; border-radius: 10px; width:60%; padding: 5px; min-height:70%; border:3px solid #1f497d;">
      <legend style="padding: 5px 20px 5px 20px; margin:0 auto; background: #25587E; color: #fff; font-size: 14px; border-radius: 20px; box-shadow: 0 0 0 10px #ddd;"> Log in</legend>
	<?php 
		if (isset($_SESSION['error']))
			echo "<h3 style='text-align: center; font-style: italic; color:red; font-size: 14px;'> Invalid username or password </h3>";
		if (isset($_SESSION['success']))
			echo "<h3 style='text-align: center; font-style: italic; color:green; font-size: 14px;'> Email with new password has been sent </h3>";
		if (isset($_SESSION['fail']))
			echo "<h3 style='text-align: center; font-style: italic; color:red; font-size: 14px;'> This email is not registered! </h3>";
	?>
	<form action="sign_in.php" method="post">
	
		   	  		  	
		   <table style="margin:auto">	
		   <tr style="width: 100%;">
		   <td>

		   </td>
		   </tr>
		  <tr>
		  <td><label for="login">Enter Your Email:</label></td> 
		  <td> <input id="login" class="username" name="login" placeholder="Email or Username"  type="email" required /> 
		  </td>
		  </tr>
		  <tr>
		  <td><label for="password" >Enter Your Password:</label></td>
		  <td><input class="password" name="password" id="password" placeholder="Password"  type="password" required/></td>
		  
		  </tr><tr><td><legend onclick="expand(1)"><h5 style="color:blue;"> Did you forgot your password?</h5></legend></td></tr>
		  
		  
		  
		  
		  </table>
		  

    <input  style="float: right;" type="submit" value="sign in" />
											
			
			</form> <div id="fieldset1" style="display:none">
		  <tr><td> <form action="forgotpass.php" method="post" ><input type="text" size="60px" name="forget" placeholder="Enter your username(email)" style="margin:auto;"/><input type="submit" style="margin:auto;" value="send"/></form></td></tr>
		  </div></fieldset><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
			</div>
			
			
			</body>
			</html>