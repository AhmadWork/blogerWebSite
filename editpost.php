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
		<title>edit post </title>
							<!-- <link href="style2.css" rel="stylesheet" type="text/css" /> -->

<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<script src="js/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
<script type="text/javascript" src="ckeditor/ckeditor.js"> </script>

			</head>
			<body class ="wrapper">
						
							<!-- Header -->
								<header>											

										</header>
<div class="body">
<div class="topblock">
<!--right icons-->
<header>
	 </header>
	<h1> <img src="img/Logo.png" alt="logo" style="width: 500px; height: 200px;"/> </h1>  
<div class="topnav"> 
<ul>
			<li><a href='site_home.php'>Home</a></li>
			<li><a href='ViewProfile.php'>My blog</a></li>
												
			<li><a href='followed.php'>followed blogger posts</a></li>
			
	        <li><a href='Logout.php'>Sign out</a></li>
			<li><a href='About.php.php'>About</a></li>
</ul>

</div>
											<!--<h1> lets share our thought people </h1>-->
											</div>
											<div>
<?php											
//$id = $_POST['myid']);
//$id = 38;
//echo $id;
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8');
	$id= intval($_POST['myid']);
      $order = "SELECT * FROM `post`
	where `id` =$id";
	      $result = mysql_query($order);
	      $row = mysql_fetch_array($result);
		  /////////////////////////////
		  echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:150px; border:3px solid #1f497d; background-color:#eeece1;'><legend><h3> Edit Post </h3></legend>
		<form action='editing.php' method='post'>
		<textarea rows= '27' cols='69' name='Edited' id='Edited' > " . $row['post'] . " </textarea> <script type='text/javascript'>CKEDITOR.replace( 'Edited' );</script>
		<input type='hidden' name='myid' id=''value='".$row['id']."'/><button type='submit' style='border-radius: 5px; width:100px; padding: 5px; margin:auto; height:50px; border:4px solid #1f497d; float:right;'> edit</button></form>
"; echo "<br></fieldset>";
		  ////////////////////////////
		  
		  
		  ?>
		  
	 
	 </div><br><br><br>
			</div>
			
			
			</body>
			</html>