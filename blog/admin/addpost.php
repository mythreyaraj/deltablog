<?php include("../includes/header.php"); ?>
<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php session_start(); ?>
<?php
	if(!isset($_SESSION['id'])){
		redirect_to("../public/viewblog.php?flag=1");
	}
?>
<?php
	if(isset($_POST['addpost'])){
		$result=mysql_query("SELECT * FROM users WHERE id={$_SESSION['id']}",$con);
		$row=mysql_fetch_array($result);
		$bname=$row['blogname'];
		$sql="SELECT * FROM {$bname} ORDER BY id DESC LIMIT 1";
		$result=mysql_query($sql,$con);
		$row=mysql_fetch_array($result);
		$id=$row['id']+1;
		$topic=$_POST['topic'];
		$topic=mysql_real_escape_string($topic);
		$temp=$_POST['content'];
		$temp=mysql_real_escape_string($temp);
		$temp=urlencode($temp);
		$content="content={$temp}";
		$sql="INSERT INTO {$bname} VALUES('{$id}','{$topic}','{$content}',CURDATE(),NULL);";
		$result=mysql_query($sql,$con);
		if($result){redirect_to("index.php?id={$_SESSION['id']}");}
	}
?>
<html>
<head>
	<title>ADD POST</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/addpoststyle.php" />	
</head>
	<body>
		<div id="wrapper">
			<a href="index.php" class="dc">GO BACK</a>
			<form action="addpost.php" method="post">
				Topic:<input name="topic" type="text" /><br/>Content:<br/>
				<textarea name="content" cols="40" rows="15"></textarea><br />
				<input type="submit" name="addpost" value="add post" id="formbutton"/>
			</form>	
		</div>
	</body>
</html>