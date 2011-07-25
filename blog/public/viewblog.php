<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php include("../includes/header.php"); ?>
<?php session_start(); ?>
<?php
	if(isset($_GET['id'])){
	$i=0;
	$sql="SELECT * FROM USERS";
	$result=mysql_query($sql,$con);
	while($row=mysql_fetch_array($result)){
		if($row['id']==$_GET['id']){
		$i++;
		}
	}
	if($i==0){
		redirect_to("{$_SERVER['PHP_SELF']}");
	}
	}
?>
<?php
	$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
	if(isset($_GET['id'])&&!isset($_GET['move'])){
		$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']."&move=0";
		redirect_to($url);
	}
?>
<?php
	
	if(isset($_POST['submitform']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$hpassword=sha1($password);
		$query="SELECT * FROM users";
		$result=mysql_query($query,$con);
		while($row=mysql_fetch_array($result)){
		if($username==$row['username']&&$hpassword==$row['password']){
		
			$_SESSION['id']=$row['id'];
			$_SESSION['username']=$username;
			$_SESSION['blogname']=$row['blogname'];
			redirect_to("../admin/index.php?id={$row['id']}");
	}}}
?>

<html>
<head>
	<title><?php if(isset($_GET['id'])){$result=mysql_query("SELECT * FROM users WHERE id={$_GET['id']}",$con); $row=mysql_fetch_array($result); echo "{$row['blogname']}";} else { echo "VIEW BLOG";}?></title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css" />
	<link rel="stylesheet" type="text/css" href="../css/viewblogstyle.php" />	
	<script type="text/javascript" src="jquery.js"></script>	
	<script type="text/javascript">
		function dropdown(){
			if(document.getElementById('form1').className=='TheOn'){
				document.getElementById('form1').className='TheOff'
			}
			else{
				document.getElementById('form1').className='TheOn'
			}
		}
		</script>
	<script type="text/javascript">    
			$(function() {  
				$(".search_button").click(function() {  
					var searchString = $("#search_box").val();  
					var data = 'search='+ searchString;  
					if(searchString) {  
						$.ajax({  
							type: "POST",  
							url: "do_search.php",  
							data: data,  
					beforeSend: function(html) { // this happens before actual call  

                     $("#searchlist").html('');  
					},
		
					success: function(html){
					    $("#searchlist").append(html);  
					}});  

					}  

				return false;  
			}); });  

</script> 

<head>
<body>
	<?php
		if(isset($_GET['flag'])){
			if($_GET['flag']==1){echo "you are not signed in";}
			else if($_GET['flag']==2){echo "you have successfully logged out";}
		}
	?>
	<?php
		if(isset($_GET['id'])){
			$result=mysql_query("SELECT * FROM users WHERE id={$_GET['id']}",$con); $row=mysql_fetch_array($result);
			$bname=$row['blogname'];
			$value="Submit";
			$id=array_search($value,$_POST);
			$sql="SELECT * FROM {$bname} WHERE id={$id}";
			$result=mysql_query($sql,$con);
			if($result){
			$row=mysql_fetch_array($result);
			$str=$row['content'];
			$name=$_POST['name'];
			$name=mysql_real_escape_string($name);
			$name=addcslashes($name,'&=[]');
			$comment=$_POST['comment'];
			$comment=mysql_real_escape_string($comment);
			$comment=addcslashes($comment,'&=[]');
			$str=$str."&name[]={$name}&comment[]={$comment}";
			$sql1 = "UPDATE {$bname} SET content ='{$str}' WHERE id = {$id} LIMIT 1;";
			$result1=mysql_query($sql1,$con);
			if(!$result1){echo $id;}
			}}
			
    ?>
	<div id="top">
			<?php
			if(!isset($_SESSION['id'])){
			echo "<a id=\"create\" href=\"createuser.php\">CREATE BLOG</a>";
			echo "<div id=\"signin\"><a id=\"signina\" href=\"#\"  onclick=\"dropdown();\"><p id=\"signinp\">SIGN IN</p></a></div>
			<div id=\"form1\" class=\"TheOff\"><form onsubmit=\"document.getElementById('form1').className='TheOff'\" method=\"post\">
			Username:</td><td><input type=\"text\" id=\"username\" name=\"username\"  />
			Password:</td><td><input type=\"password\" id=\"password\" name=\"password\"/>
			<input type=\"submit\" name=\"submitform\" id=\"submitbutton\" value=\"Submit\" />
			</form></div>";	}
			else{
				echo "<a id=\"admin\" href=\"../admin\">ADMIN</a>";
				echo "<a id=\"signouta\" href=\"../admin/signout.php\">SIGN OUT</a>";
			}
			?>
			</div>
	<div id="wrapper">
	<div id="head">
		<h1 id="title">
		<?php if(isset($_GET['id'])){
				$query="SELECT * FROM users WHERE id='{$_GET['id']}';";
				$res=mysql_query($query,$con);
				$row=mysql_fetch_array($res);
				$row['title']=urldecode($row['title']);
				echo $row['title'];}
			  else{
				echo "SELECT A BLOG TO VIEW";
			  }				
		?>
		</h1>
	</div>
	<div id="main">
	<div id="blog">
	<?php 
		if(isset($_GET['year'])&&isset($_GET['month'])&&isset($_GET['date'])){
			echo "<h2 id=\"home\"><a href=\"{$_SERVER['PHP_SELF']}?id={$_GET['id']}\" id=\"homea\">HOME</a></h2>";
			if(isset($_GET['id'])){
				$result=mysql_query("SELECT * FROM users WHERE id={$_GET['id']}",$con); $row=mysql_fetch_array($result);
				$bname=$row['blogname'];
				$month=strmonth($_GET['month']);
				$date="{$_GET['year']}-{$month}-{$_GET['date']}";
				$sql="SELECT * FROM {$bname} WHERE date='{$date}' ORDER BY id DESC;";
				$result1=mysql_query($sql,$con);
				$num=mysql_num_rows($result1);	
				while($row=mysql_fetch_array($result1)){
					echo "<br/>";
					echo "<div class=\"post\">";
					$string=$row['content'];
					parse_str($string, $output);
					$output['content']=urldecode($output['content']);
					$date=$row['date'];
					$year = strtok($date, "-");
					$month= monthstr(strtok("-"));
					$date=strtok("-");
					echo "<p class=\"date\">posted on {$date}<sup>th</sup> {$month},{$year}</p>";
					echo "<h2 class=\"topic\">".$row['topic']."</h2><br />";
					echo "<p class=\"content\">{$output['content']}</p>";
					$i=0;
					echo "<br/><br >";
					while(isset($output['name'][$i])){
					echo "<p class=\"commentname\">{$output['name'][$i]}:<p>";
					echo "<p class=\"comment\">{$output['comment'][$i]}</p>";
					$i++;
					}
					$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
					echo "<form action=\"{$url}\" method=\"post\">
					<fieldset>
					<legend>Add Comment</legend>
					<table><tr><td>Name:</td><td><input type=\"text\" name=\"name\" /></td></tr>
					<tr><td>Comment:</td><td><textarea cols=18 rows=3 name=\"comment\" /></textarea></td></tr>
					<tr><td><input type=\"submit\" value=\"Submit\" name=\"{$row['id']}\" class=\"submitbutton\" /></td></tr>
					</table>
					</fieldset>
					</form>
					<hr/><br/>";
					echo "</div>";
				}		
		}}
			else if(isset($_GET['id'])){
				$result=mysql_query("SELECT * FROM users WHERE id={$_GET['id']}",$con); $row=mysql_fetch_array($result);
				$bname=$row['blogname'];
				$sql="SELECT * FROM {$bname} ORDER BY id DESC LIMIT ".$_GET['move'].", 5";
				$result1=mysql_query($sql,$con);
				$num=mysql_num_rows($result1);	
				while($row=mysql_fetch_array($result1)){
					echo "<br/>";
					echo "<div class=\"post\">";
					$string=$row['content'];
					parse_str($string, $output);
					$output['content']=urldecode($output['content']);
					$date=$row['date'];
					$year = strtok($date, "-");
					$month= monthstr(strtok("-"));
					$date=strtok("-");
					echo "<p class=\"date\">posted on {$date}<sup>th</sup> {$month},{$year}</p>";
					echo "<h2 class=\"topic\">".$row['topic']."</h2><br />";
					echo "<p class=\"content\">{$output['content']}</p>";
					$i=0;
					echo "<br/><br >";
					while(isset($output['name'][$i])){
					echo "<p class=\"commentname\">{$output['name'][$i]}:<p>";
					echo "<p class=\"comment\">{$output['comment'][$i]}</p>";
					$i++;
					}
					$url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
					echo "<form action=\"{$url}\" method=\"post\">
					<fieldset>
					<legend>Add Comment</legend>
					<table><tr><td>Name:</td><td><input type=\"text\" name=\"name\" /></td></tr>
					<tr><td>Comment:</td><td><textarea cols=18 rows=3 name=\"comment\" /></textarea></td></tr>
					<tr><td><input type=\"submit\" value=\"Submit\" name=\"{$row['id']}\" class=\"submitbutton\"/></td></tr>
					</table>
					</fieldset>
					</form>
					<hr/><br/>";
					echo "</div>";
				}
						$value=$_GET['move'];		
						if($value>=0){
						if($num){
						$value=$_GET['move']+5;		
						echo "</br><a href=\"../public/viewblog.php?id={$_GET['id']}&move={$value}\" id=\"nav2\">older posts</a>";}
						$value=$_GET['move']-5;	
						if($value>=0){
						echo "<a href=\"../public/viewblog.php?id={$_GET['id']}&move={$value}\" id=\"nav1\">newer posts</a>";
						}}
				}
		else{
				if(isset($_GET['flag'])&&$_GET['flag']=='show'){
					$sql="SELECT * FROM USERS";
					$result=mysql_query($sql,$con);
					while($row=mysql_fetch_array($result)){
						echo "<a href=\"{$_SERVER['PHP_SELF']}?id={$row['id']}\" id=\"homea\">{$row['blogname']}</a>";
				}}
				else{
				echo "<div id=\"search\"><form method=\"post\" action=\"do_search.php\">
				  <input type=\"text\" name=\"search\" id=\"search_box\" class='search_box'/>
				  <input type=\"submit\" value=\"Search\" class=\"search_button\" id=\"formbutton\" /><a href=\"viewblog.php?flag=show\" id=\"homea\">SHOW ALL</a><br />
				  </form>
				  </div>";
				 	echo "<div id=\"searchlist\"></div>";}
		}
		
	?>
	</div>
	<div id="side">
		
		<?php
		if(isset($_GET['id'])){
				$result=mysql_query("SELECT * FROM users WHERE id={$_GET['id']}",$con); $row=mysql_fetch_array($result);
				$bname=$row['blogname'];
				$sql="SELECT * FROM {$bname}";
				$result1=mysql_query($sql,$con);
				$url=$_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
				echo "<form action={$url} method=\"post\"><ul id=\"year\">";
				$stack=array();
				while($row=mysql_fetch_array($result1)){
					$date=$row['date'];
					$year = strtok($date, "-");
					if(!in_array($year,$stack)){
						array_push($stack,$year);
				}}
				foreach ($stack as $value){
					echo "<li><a href=\"{$url}&year={$value}\" class=\"year\""; if(isset($_GET['year'])){echo "disabled=\"disabled\"";} echo ">{$value}</a></li>";
				}
				$stackmonth=array();
				if(isset($_GET['year'])){
					$result1=mysql_query($sql,$con);
					while($row=mysql_fetch_array($result1)){
					$date=$row['date'];
					$year = strtok($date, "-");
					if($_GET['year']==$year){
						$month= monthstr(strtok("-"));
						if(!in_array($month,$stackmonth)){
							array_push($stackmonth,$month);
						}
					}}
					echo "<li><ul>";
					$url=$_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
					foreach($stackmonth as $value){
						echo "<li><a href=\"{$url}&month={$value}\" class=\"month\""; if(isset($_GET['month'])&&isset($_GET['year'])){echo "disabled=\"disabled\"";} echo ">{$value}</a></li>";
					} 	
				}
				$stackdate=array();
				if(isset($_GET['year'])&&isset($_GET['month'])){
					$result1=mysql_query($sql,$con);
					while($row=mysql_fetch_array($result1)){
					$date=$row['date'];
					$year = strtok($date, "-");
					$month= monthstr(strtok("-"));
					if($_GET['year']==$year&&$_GET['month']==$month){
						$date=strtok("-");
						if(!in_array($date,$stackdate)){
							array_push($stackdate,$date);
						}
					}}
					echo "<li><ul>";
					$url=$_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
					foreach($stackdate as $value){
						echo "<li><a href=\"{$url}&date={$value}\" class=\"dateside\""; if(isset($_GET['date'])){echo "disabled=\"disabled\"";} echo ">{$value}</a></li>";
					} 	
				}
				echo "</ul></li></ul></li></ul>";
			}		
		?>
		
	</div>
	</div>
	</div>
	
</body>
</html>
<?php mysql_close($con); ?>	    