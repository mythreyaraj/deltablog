<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php include("../includes/header.php"); ?>
<?php
	if(isset($_POST['submitform']))
	{
		if($_POST['rpassword']==$_POST['password']){
		$sql="SELECT * FROM users";
		$result2=mysql_query($sql,$con);
		while($row=mysql_fetch_array($result2)){
			if($_POST['username']==$row['username']||$_POST['blogname']==$row['blogname']){
				$i=1;
			}
			else{$i=0;}	
		}
		if($i==0){
		$hashed_password=sha1($_POST['password']);
		$query="INSERT INTO users VALUES(NULL,'{$_POST['username']}','{$hashed_password}','{$_POST['blogname']}','welcome+to+my+blog');";
		$result=mysql_query($query,$con);
		$sql = "CREATE TABLE {$_POST['blogname']} (`id` INT, `topic` TEXT, `content` TEXT, `date` DATE, `images` TEXT) ENGINE = MyISAM;";
		$result1=mysql_query($sql,$con);
		redirect_to("viewblog.php?name={$_POST['blogname']}"); }
		else{
			redirect_to("createuser.php?flag=1");
		}}
		else{
			redirect_to("createuser.php?flag=2");
		}
	}
?>
<html>
<head>
	<title>CREATE BLOG</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/createuserstyle.php" />
	<script type="text/javascript" src="script.js">
</script>
<head>
<body>
	<?php
		if(isset($_GET['flag'])){
			if($_GET['flag']==1){
				echo "<p id=\"warningred\">Already username or blogname exits</p>";
			}
			if($_GET['flag']==2){
				echo "<p id=\"warningred\">Password does not match</p>";
			}
		}
	?>
	<div id="wrapper">
	<a href="index.php" class="dc">GO BACK</a>
	<form method="post" action="createuser.php" onSubmit="return validateForm()" >
		<fieldset>
		<legend>CREATE USER:</legend>
		<table>
		<tr>
		<td>Username:</td><td><input type="text" id="name" name="username" onBlur="return validateName()" onChange="return validateName()" /></td><td id="errorname"></td></td></tr>
		<tr><td>Password:</td><td><input type="password" id="password" name="password" onBlur="return validatePassword()" onChange="return validatePassword()" /></td><td id="errorpassword"></td></tr>
		<tr><td>Retype Password:</td><td><input type="password" id="rpassword" name="rpassword" onBlur="return validateRPassword()" onChange="return validateRPassword()" /></td><td id="errorrpassword"></td></td></tr>
		<td>Blogname:</td><td><input type="text" id="bname" name="blogname" onBlur="return validateBName()" onChange="return validateBName()" /></td><td id="errorbname"></td></td></td>
		<tr><td><input type="submit" name="submitform" value="Submit" id="formbutton"/> </td><td><input type="reset" name="resetform" value="reset" id="formbutton"/> </td></tr>	
		</table>
		</fieldset>
		</form>	
	</div>	
</body>
</html>
<?php mysql_close($con); ?>	