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
		<title>Bloger Posts </title>
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
											
			 <?php
// include database connection
    include_once('config.php');

// select all data
$wantedbloger=mysql_real_escape_string($_POST['myid']);

$query = "SELECT * FROM `post` WHERE `user_id`='$wantedbloger'";
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8');
$stmt = mysql_query($query);

//this is how to get number of rows returned
$num = mysql_num_rows($stmt);
///////////

//////////
//check if more than 0 record found
if ($num > 0) {
///////////
//echo "<b> Please note this: if you want to view all posts posted by a specific bloger click on his/her name.</b>";
while ($row = mysql_fetch_array($stmt)) {
		echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:20px; border:3px solid #1f497d;'><legend onclick='' style='background: #25587E; color: #fff; font-size: 14px; border-radius: 5px; box-shadow: 0 0 0 5px #ddd;'>" . $row['user_name'] . "</legend>";
		echo "".$row['post']."";
		if (isset($_SESSION['ID'])){
		echo"<form action='follow.php' method='post'><input type='hidden' name='myid' id=''value='".$row['user_id']."'/><button type='submit' style='width:60px; height:20px; float:right; background-color: #6699FF;'> <b>Follow</b> </button></form></br>";
		
}



		echo "</fieldset>";

//////////////comments///////////////
$sql="SELECT * FROM `comment` WHERE `post_id` = '" . $row['id'] . "'";
									$comments = mysql_query($sql);
									$num = mysql_num_rows($comments);
									//check if more than 0 record found
									if ($num > 0) {
										echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:30px; border:3px solid #1f497d;;' ><legend>View Comments(" . $row['numberComments'] . ")</legend>";
										
										echo" <table style='border-radius: 5px; width:100%; border:1px solid #1f497d;'>";
										while ($ro = mysql_fetch_array($comments)) {
											echo"<tr><td style='border-radius: 5px; width:90%; border:1px solid #1f497d;'>"; echo "<b>".$ro['commenter']."'Says:  </b>".$ro['comment']."</td></tr>";											
									} 
									
									echo "<tr><td><hr size='5' color='#1f497d'> <hr size='5' color='#1f497d'></td></tr>";

									
									
									
									echo"</table></fieldset>"; }
//////////////comments///////////////

}
 }
 else {
 echo "No records found.";}


mysql_close($con);

?></div><br><br><br>
			</div>
			
			
			</body>
			</html>