<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php include("../includes/header.php"); ?>
<?php session_start(); ?>
<?php
	if(!isset($_SESSION['id'])){
		redirect_to("../public/viewblog.php?flag=1");
	}
?>
<?php
	if(isset($_POST['save'])){
		$title=$_POST['title'];
		$title=urlencode($title);
		$sql="UPDATE users SET title='{$title}' WHERE id={$_SESSION['id']} LIMIT 1;";
		$result=mysql_query($sql,$con);
		if(!$result){echo "could not update";}
		else{redirect_to("index.php?id={$_SESSION['id']}");}
	}
?>
<html>
<head>
	<title>EDIT TITLE</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/edittitlestyle.php" />	
</head>
	<body>
		<div id="wrapper">
				<a href="index.php" class="dc">GO BACK</a>
				<form action="edittitle.php" method="post">
					ENTER YOUR NEW TITLE:<input name="title" type="text" id="formarea"/>
					<input type="submit" value="SAVE" name="save" id="formbutton" />
				</form>
		</div>
	</body>
</html>