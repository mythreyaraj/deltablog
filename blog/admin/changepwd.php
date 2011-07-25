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
	if(isset($_POST['changepwd'])){
		$result=mysql_query("SELECT * FROM users WHERE id={$_SESSION['id']}",$con);
		$row=mysql_fetch_array($result);
		$bname=$row['blogname'];
		$sql="SELECT * FROM users WHERE blogname='{$bname}' LIMIT 1";
		$res=mysql_query($sql,$con);
		$row=mysql_fetch_array($res);
		$opwd=sha1($_POST['opassword']);
		if($opwd==$row['password']){
				$npwd=sha1($_POST['npassword']);
				$query="UPDATE users SET password='{$npwd}' WHERE blogname='{$bname}' LIMIT 1";
				$res=mysql_query($query,$con);
				if(!$res){
					redirect_to("changepwd.php?flag=2");
				}
				else{
					redirect_to("index.php");
				}
			
		}	
	}
?>	
<html>
<head>
	<title>CHANGE PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/changepwdstyle.php" />	
</head>
	<body>
		<div id="wrapper">
			<a href="index.php" class="dc">GO BACK</a>
			<form action="changepwd.php" method="post">
					<table>
					<tr><td>Old Password:</td><td><input name="opassword" type="password" /></td></tr>
					<tr><td>New Password:</td><td><input name="npassword" type="password" /></td></tr>
					<tr><td>Retype Password:</td><td><input name="rnpassword" type="password" /></td></tr>
					</table>
					<input type="submit" name="changepwd" value="change" id="formbutton"/>
			</form>
		</div>
	</body>
</html>