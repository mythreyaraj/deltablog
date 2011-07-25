<?php include("includes/header.php"); ?>
<?php include("includes/constant.php"); ?>
<?php include("includes/functions.php"); ?> 
<?php
$con = mysql_connect($host,$username,$dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_select = mysql_select_db("blogdatabase",$con);
if (!$db_select) {
	$sql = "CREATE DATABASE `blogdatabase`;";
	$r=mysql_query($sql,$con);
	$db_select = mysql_select_db("blogdatabase",$con);
}

	if (!table_exists('users','blogdatabase')){
	$sql = "CREATE TABLE `blogdatabase`.`users` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `username` TEXT NOT NULL, `password` TEXT NOT NULL, `blogname` TEXT NOT NULL, `title` TEXT NOT NULL ) ENGINE = MyISAM;";
	$r=mysql_query($sql,$con);	}
?>
<?php
	redirect_to("public/");
?>
<html>
<head>
<title>INDEX</title>
<head>
<body>
</body>
</html>