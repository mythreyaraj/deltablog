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
	$sql="DELETE FROM users WHERE id={$_SESSION['id']};";
	$result=mysql_query($sql,$con);
	$blog=$_SESSION['blogname'];
	echo $blog;
	$sql1="DROP TABLE {$_SESSION['blogname']}";
	$result=mysql_query($sql1,$con);
?>
<?php
	
	$_SESSION=array();
	session_destroy();
	redirect_to("../public/viewblog.php?flag=2");
?>