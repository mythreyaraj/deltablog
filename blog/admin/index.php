<?php include("../includes/header.php"); ?>
<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php session_start(); ?>

<?php
	if(isset($_SESSION['id'])&&isset($_SESSION['username'])){
	
	}
	else{redirect_to("../public/viewblog.php?flag=1");}
?>

<html>
<head>
	<title>LOGGED IN</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/adminstyle.php" />	
<head>
<body>
	<div id="top">
			<?php 
				echo "<a id=\"admin\" href=\"../public/viewblog.php?id={$_SESSION['id']}\">GOTO BLOG</a>"; 
			?>
			<a id="signouta" href="signout.php">SIGN OUT</a>
	</div>
	<div id="wrapper">
	<div id="head">
		<h1 id="title">
		<?php if(isset($_SESSION['id'])){
				$query="SELECT * FROM users WHERE id='{$_SESSION['id']}';";
				$res=mysql_query($query,$con);
				$row=mysql_fetch_array($res);
				echo "{$row['username']}'s blog</h1>";
				}
			  		
		?>
		</div>
	<div id="edits">
		<a href="edittitle.php" class="edits">EDIT TITLE</a><br />
		<a href="addpost.php" class="edits">ADD ANOTHER POST</a><br/>
		<a href="editpost.php" class="edits">EDIT POST OR DELETE POST</a><br />
		<a href="changepwd.php" class="edits">CHANGE PASSWORD</a><br />
		<a href="delete.php" class="edits">DELETE YOUR BLOG</a>
		</div>	
	</div>
</body>
</html>
<?php mysql_close($con); ?>	


