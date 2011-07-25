<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php include("../includes/header.php"); ?>
<?php
	$flag=0;
	$str=mysql_real_escape_string($_POST['search']);
	$sql = "SELECT * FROM users";
	$result=mysql_query($sql,$con);
	while($row=mysql_fetch_array($result)){
		if(strchr($row['blogname'],$str)){
			echo "<a href=\"viewblog.php?id={$row['id']}\" id=\"homea\">{$row['blogname']}</a>";
			$flag++;
		}
	}
	if($flag==0){
		echo "no match found";
	}
?>