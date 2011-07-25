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
	$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
	if(!isset($_GET['move'])){
		$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']."&move=0";
		redirect_to($url);
	}
?>
<html>
<head>
	<title>EDIT POST</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/editpoststyle.php" />	
</head>
	<body>
		<div id="wrapper">
			<?php
				if(isset($_GET['flag'])){
					if($_GET['flag']==1){
						echo "<p class=\"message\">DELETED THE COMMENT</p>";
					}
					if($_GET['flag']==2){
						echo "<p class=\"message\">DELETED THE POST</p>";
					}
					if($_GET['flag']==3){
						echo "<p class=\"message\">EDITED THE POST</p>";
					}
				}
			?>
			<?php 
				if(isset($_GET['id'])){
					echo "<a href=\"editpost.php\" class=\"dc\">GO BACK</a>";
					
						$result=mysql_query("SELECT * FROM users WHERE id={$_SESSION['id']}",$con);
						$row=mysql_fetch_array($result);
						$bname=$row['blogname'];
					if(isset($_GET['comment'])){	
						$sql="SELECT * FROM {$bname} WHERE id={$_GET['id']}";
						$result1=mysql_query($sql,$con);
						$row=mysql_fetch_array($result1);
						$string=$row['content'];
						parse_str($string, $output);
						$i=0;
						$string="content={$output['content']}&";
						$name=array();
						$comment=array();
						while(isset($output['name'][$i])){
							if($i==$_GET['comment']){}
							else{
								$name=$output['name'][$i];
								$name=mysql_real_escape_string($name);
								$name=addcslashes($name,'&=[]');
								$comment=$output['comment'][$i];
								$comment=mysql_real_escape_string($comment);
								$comment=addcslashes($comment,'&=[]');
								$string=$string."name[]={$name}&comment[]={$comment}&";
							}
							$i++;
						}
						$sql1 = "UPDATE {$bname} SET content ='{$string}' WHERE id = {$_GET['id']} LIMIT 1;";
						$result1=mysql_query($sql1,$con);
						redirect_to("editpost.php?flag=1");	
					}
					else if(isset($_GET['action'])){
						if($_GET['action']=="delete"){
							$sql="DELETE FROM {$bname} WHERE id={$_GET['id']} LIMIT 1";
							$result=mysql_query($sql,$con);
							redirect_to("editpost.php?flag=2");
						}
						else if($_GET['action']=="edit"){
							if(isset($_POST['editpost'])){
								$topic=$_POST['topic'];
								$topic=mysql_real_escape_string($topic);
								$content=urlencode($_POST['content']);
								$string="content={$content}&";
								$sql="SELECT * FROM {$bname} WHERE id={$_GET['id']} LIMIT 1";
								$result=mysql_query($sql,$con);
								$row=mysql_fetch_array($result);
								parse_str($row['content'], $output);
								$i=0;
								while(isset($output['name'][$i])){
									$name=$output['name'][$i];
									$name=mysql_real_escape_string($name);
									$name=addcslashes($name,'&=[]');
									$comment=$output['comment'][$i];
									$comment=mysql_real_escape_string($comment);
									$comment=addcslashes($comment,'&=[]');
									$string=$string."name[]={$name}&comment[]={$comment}&";
									$i++;
								}
							echo $string;	
							$sql1="UPDATE {$bname} SET content='{$string}', topic='{$topic}' WHERE id={$_GET['id']} LIMIT 1";
							$result1=mysql_query($sql1,$con);
							if(!$result1){
								echo "<p class=\"message\">NOT ABLE TO EDIT THE POST</p>";
							}
							else{
								redirect_to("editpost.php?flag=3");
							}
							}
							else {
									$sql="SELECT * FROM {$bname} WHERE id={$_GET['id']} LIMIT 1";
									$result=mysql_query($sql,$con);
									$row=mysql_fetch_array($result);
									parse_str($row['content'], $output);
									$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
									echo "<div id=\"editform\"><form action=\"{$url}\" method=\"post\">
									Topic:<input name=\"topic\" type=\"text\" value=\"{$row['topic']}\"/><br/>Content:<br/>
									<textarea name=\"content\" cols=\"40\" rows=\"15\">{$output['content']}</textarea><br />
									<input type=\"submit\" name=\"editpost\" value=\"edit post\" id=\"formbutton\"/></form></div>";
									
						}	}
					}
				}
				else{
				echo "<a href=\"index.php\" class=\"dc\">GO BACK</a>";	
				$result=mysql_query("SELECT * FROM users WHERE id={$_SESSION['id']}",$con);
				$row=mysql_fetch_array($result);
				$bname=$row['blogname'];
				$sql="SELECT * FROM {$bname} ORDER BY id DESC LIMIT ".$_GET['move'].", 5";
				$result1=mysql_query($sql,$con);
				$num=mysql_num_rows($result1);	
				while($row=mysql_fetch_array($result1)){
					echo "<br/>";
					echo "<div class=\"post\">";
					$string=$row['content'];
					parse_str($string, $output);
					$date=$row['date'];
					$year = strtok($date, "-");
					$month= monthstr(strtok("-"));
					$date=strtok("-");
					$output['content']=urldecode($output['content']);
					echo "<h2 class=\"topic\">".$row['topic']."</h2><br /><a href=\"editpost.php?id={$row['id']}&action=delete\" class=\"dp\">DELETE POST</a><a href=\"editpost.php?id={$row['id']}&action=edit\" class=\"ep\">EDIT POST</a>";
					echo "<p class=\"date\">posted on {$date}<sup>th</sup> {$month},{$year}</p>";
					echo "<p class=\"content\">{$output['content']}</p>";
					$i=0;
					echo "<br/><br >";
					while(isset($output['name'][$i])){
					echo "<p class=\"commentname\">{$output['name'][$i]}:<a href=\"editpost.php?comment={$i}&id={$row['id']}\" class=\"dc\">DELETE COMMENT</a></p>";
					echo "<p class=\"comment\">{$output['comment'][$i]}</p>";
					$i++;
					}
					echo "</div>";
				}
						$value=$_GET['move'];		
						if($value>=0){
						if($num){
						$value=$_GET['move']+5;		
						echo "</br><a href=\"editpost.php?move={$value}\" id=\"nav2\">older posts</a>";}
						$value=$_GET['move']-5;	
						if($value>=0){
						echo "<a href=\"editpost.php?move={$value}\" id=\"nav1\">newer posts</a>";
				}}}
			?>		
		</div>
	</body>
</html>