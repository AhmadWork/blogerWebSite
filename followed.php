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
	header("location: site_Home.php");
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
		<title>followed blogger posts </title>
							<!-- <link href="style2.css" rel="stylesheet" type="text/css" /> -->

<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<script src="js/jquery-latest.js"></script>
		<!--<meta http-equiv="refresh" content="5" >-->

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

</div><br>
											<!--<h1> lets share our thought people </h1>-->
											</div>
											
											<div >
			 <?php
// include database connection
    include_once('config.php');
									$sql="SELECT * FROM `follow` WHERE `follower_user_id` = '".$_SESSION['ID']."'";
									$following = mysql_query($sql);
									$num = mysql_num_rows($following);
									//check if more than 0 record found
									if ($num > 0) {
										while ($row = mysql_fetch_array($following)) {
											//////////
											$query = "SELECT * FROM `post` WHERE `user_id` = '" . $row['followed_user_id'] . "'";
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8');
$stmt = mysql_query($query);

//this is how to get number of rows returned
$num = mysql_num_rows($stmt);

//check if more than 0 record found
if ($num > 0) {

	//creating our table heading
	
	while ($row = mysql_fetch_array($stmt)) {
		echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:20px; border:3px solid #1f497d;'><legend style='background: #25587E; color: #fff; font-size: 14px; border-radius: 5px; box-shadow: 0 0 0 5px #ddd;'>" . $row['user_name'] . "</legend>";
//echo"<button onclick='expand(1);' type='submit' style='border-radius: 5px; width:100px; padding: 5px; margin:auto; height:50px; border:4px solid #1f497d; float:right;'> Comment </button></br></br>";
		echo "".$row['post']."";
		
		
echo"<form action='unlike.php' method='post'><input type='hidden' name='myid' id=''value='".$row['id']."'/>
<label for='idlike' style='float: right;color: #B4886B; font-weight: bold;'>" . $row['unlikes'] . "</label><button id='idlike' type='submit' style='    background-color: white; border:0;
width:75px; padding: 5px; margin:auto; height:75px; float:right; background-image: url(img/unlike.png); background-repeat: no-repeat;'> </button></form>
<form action='like.php' method='post'><input type='hidden' name='myid' id=''value='".$row['id']."'/><label for='ilike' style='float: right;color: #B4886B; font-weight: bold;'>" . $row['likes'] . "</label><button id='ilike' type='submit' style='    background-color: white;
border:0; width:75px; padding: 5px; margin:auto; height:75px; float:right; background-image: url(img/like.png); background-repeat: no-repeat;'> </button></form>";

		



/////////////////

		echo "</fieldset>";
		//////
		//> Add new Post</legend>
	  
		///////
//////////////comments///////////////
$sql="SELECT * FROM `comment` WHERE `post_id` = '" . $row['id'] . "'";
									$comments = mysql_query($sql);
									$num = mysql_num_rows($comments);
									//check if more than 0 record found
									if ($num > 0) {
										echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:30px; border:3px solid #1f497d;;' ><legend>View Comments(" . $row['numberComments'] . ")</legend>";
										echo"<div id='fieldset111' >";
										echo" <table style='border-radius: 5px; width:100%; border:1px solid #1f497d;'>";
										while ($ro = mysql_fetch_array($comments)) {
											echo"<tr><td style='border-radius: 5px; width:90%; border:1px solid #1f497d;'>"; echo "<b>".$ro['commenter']."'Says:  </b>".$ro['comment']."</td></tr>";											
									} 
									
									echo "<tr><td><hr size='5' color='#1f497d'> <hr size='5' color='#1f497d'></td></tr>";
		echo"<form action='comment.php' method='post'>";
		echo "<tr><td style='min-height:30px; border-radius: 5px; width:90%; border:2px solid #1f497d;'/><input placeholder='Add new Comment'  type='text' name='comnnn' style='border-radius: 5px; width:100%; min-height:30px;'/></td></tr>"; 
		echo "<input type='hidden' name='pid' id='pid' value='".$row['id']."'/>"; 
		
		//echo "<input type='hidden' name='uname' id=''value='".$row['user_name']."'/>";
		echo "<tr><td><button type='submit' style='border-radius: 5px; margin: auto; width:100%; border:2px solid #000000 ; '> <b style='color: black'>Add </b></button></td></tr>";

		echo "</form>";
									
									
									
									echo"</table></div></fieldset>"; }else
									{
										
										echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:30px; border:3px solid #1f497d;;' ><legend>Add Comment</legend>";
									echo "<tr><td><hr size='5' color='#1f497d'> <hr size='5' color='#1f497d'></td></tr>";
		echo"<form action='comment.php' method='post'>";
		echo "<tr><td style='min-height:30px; border-radius: 5px; width:90%; border:2px solid #1f497d;'/><input placeholder='Add new Comment'  type='text' name='comnnn' style='border-radius: 5px; width:100%; min-height:30px;'/></td></tr>"; 
		echo "<input type='hidden' name='pid' id='pid' value='".$row['id']."'/>"; 
		
		//echo "<input type='hidden' name='uname' id=''value='".$row['user_name']."'/>";
		echo "<tr><td><button type='submit' style='border-radius: 5px; margin: auto; width:100%; border:2px solid #000000 ; '> <b style='color: black'>Add </b></button></td></tr>";

		echo "</form>";
									
									
									
									echo"</table></fieldset>";	
										
										
										
									}

}
 } else{
	 echo "No fll found.";
 }
											//////
											
											
										}
									}else{
										echo "<h1> No posts  found.</h1>";
									}
									
									
									
									
									
								
									
// select all data

?>
			</div><br><br><br>
			
			
			</div>
			
			
			</body></html>
			
			