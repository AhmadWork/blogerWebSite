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
        <title>My blog </title>
        <!-- <link href="style2.css" rel="stylesheet" type="text/css" /> -->

        <link rel="stylesheet" href="css/style.css" type="text/css" />

        <!--<meta http-equiv="refresh" content="5" >-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js">
        </script>


        <script>
            function deletepost(id) {
                if (confirm("Are you sure you want to Delete this post?")) {
                    $.ajax({
                        type: "POST",
                        data: "id=" + id,
                        url: "deletepost.php",
                        success: function(msg) {
                            $('#row' + id).fadeOut(300);

                        }
                    });
                    //
                }
            }
        </script>
        <script type="text/javascript">
            // function expand the field set when click on it
            function expand(num) {
                var v = document.getElementById("fieldset1");
                var q = document.getElementById("fieldset");
                if (num == 1) {
                    if (v.style.display == "none") {
                        v.style.display = "block";
                        q.style = "border-radius: 5px; width:98%; padding: 5px; min-height:150px; border:5px solid #1f497d;";

                    } else
                        v.style.display = "none";
                    q.style = "border:none; width:98%;";
                }

            }
        </script>

    </head>

    <body class="wrapper">

        <!-- Header -->
        <header>
        </header>
        <div class="body">
            <div class="topblock">
                <!--right icons-->
                <header></header>
                <h1> <img src="img/Logo.png" alt="logo" style="width: 500px; height: 200px;"/> </h1>
                <div class="topnav">
                    <ul>
                        <li><a href="site_home.php">Home</a></li>
                        <li><a href="ViewProfile.php">My blog</a></li>
                        <li><a href="followed.php">followed blogger posts</a></li>
						<li><a href="Logout.php">Sign out</a></li>
						<li><a href='About.php.php'>About</a></li>
                    </ul>

                </div>
                <!--<h1> lets share our thought people </h1>-->
            </div>

            <div>
                <?php
// include database connection
    include_once('config.php');

									$sql="SELECT * FROM `user` WHERE `user_id` = '".$_SESSION['ID']."'";
									mysql_query("SET NAMES UTF8");
									$result = mysql_query($sql);
									if(!$result){
									echo mysql_error();
									}
									if ($row = mysql_fetch_array($result)){
									echo '<h1 style="font-size:20px; color:#00CCFF; font-style: italic;">Hi '.$row['Name'].'! please have fun :)</h1>';
									//echo '<h1 style="font-size:20px">Email: '.$row['user_id'].'</h1>';
									//echo"<b> hi (</b>"; echo"<b>) please share your news thought</b>";
									}
									
// select all data

?>

                    <?php
// include database connection
    include_once('config.php');

// select all data
$query = "SELECT * FROM `post` WHERE `user_id` = '".$_SESSION['ID']."'";
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8');
$stmt = mysql_query($query);

//this is how to get number of rows returned
$num = mysql_num_rows($stmt);

//check if more than 0 record found
if ($num > 0) {

	//creating our table heading
	
	while ($row = mysql_fetch_array($stmt)) {
		
		echo "<fieldset style='margin:auto border-radius: 5px; width:98%; padding: 5px; min-height:20px; border:3px solid #1f497d;'><legend style='background: #25587E; color: #fff; font-size: 14px; border-radius: 5px; box-shadow: 0 0 0 5px #ddd;'>" . $row['user_name'] . "</legend>

		".$row['post']."";
		echo "<form action='editpost.php' method='post'><input type='hidden' name='myid' id=''value='".$row['id']."'/><button type='submit' style='border-radius: 5px; width:100px; padding: 5px; margin:auto; height:50px; border:4px solid #1f497d; float:right;'> edit</button></form>

<button onClick='javascript:deletepost(".$row['id'].");' style='border-radius: 5px; width:100px; padding: 5px; margin:auto; height:50px; border:4px solid #1f497d; float:right;'>Delete</button>"; echo "</fieldset>";

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
		echo"<form action='comment2.php' method='post'>";
		echo "<tr><td style='min-height:30px; border-radius: 5px; width:90%; border:2px solid #1f497d;'/><input placeholder='Add new Comment'  type='text' name='comnnn' style='border-radius: 5px; width:100%; min-height:30px;'/></td></tr>"; 
		echo "<input type='hidden' name='pid' id='pid' value='".$row['id']."'/>"; 
		
		//echo "<input type='hidden' name='uname' id=''value='".$row['user_name']."'/>";
		echo "<tr><td><button type='submit' style='border-radius: 5px; margin: auto; width:100%; border:2px solid #000000 ; '> <b style='color: black'>Add </b></button></td></tr>";

		echo "</form>";
									
									
									
									echo"</table></fieldset>"; }else
									{
										
										echo "<fieldset style='border-radius: 5px; width:98%; padding: 5px; min-height:30px; border:3px solid #1f497d;;' ><legend>Add Comment</legend>";
									echo "<tr><td><hr size='5' color='#1f497d'> <hr size='5' color='#1f497d'></td></tr>";
		echo"<form action='comment2.php' method='post'>";
		echo "<tr><td style='min-height:30px; border-radius: 5px; width:90%; border:2px solid #1f497d;'/><input placeholder='Add new Comment'  type='text' name='comnnn' style='border-radius: 5px; width:100%; min-height:30px;'/></td></tr>"; 
		echo "<input type='hidden' name='pid' id='pid' value='".$row['id']."'/>"; 
		
		//echo "<input type='hidden' name='uname' id=''value='".$row['user_name']."'/>";
		echo "<tr><td><button type='submit' style='border-radius: 5px; margin: auto; width:100%; border:2px solid #000000 ; '> <b style='color: black'>Add </b></button></td></tr>";

		echo "</form>";
									
									
									
									echo"</table></fieldset>";	
										
										
										
									}
}
 }
 else {
 echo "<h1>Let's start posting :)</h1>";}

mysql_close($con);
?>
                        <!--</fieldset>-->
                        </br>
                        <form action="add_post.php" method="post">
                            <fieldset id="fieldset" style="border:none">
                                <legend Style="background: #25587E; color: #fff; font-size: 32px; border-radius: 5px; box-shadow: 0 0 0 5px #ddd;" onclick="expand(1);"> Add new Post</legend>
                                <div id="fieldset1" style="display:none">
                                    <textarea rows="20" cols="20" name="post" id="post">
Enter the post
</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('post');
                                    </script>
                                    <input class="buttons" style="border-radius: 5px; width:100px; padding: 5px; margin:auto; height:50px; border:4px solid #1f497d; float:right;" type="submit" value="Add" />
                                    <br /></div>
                            </fieldset>
                        </form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>


        </div>


    </body>

    </html>
    </html>