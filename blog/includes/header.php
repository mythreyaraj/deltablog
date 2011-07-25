<?php include("constant.php"); ?>
<?php echo "<!DOCTYPE HTML>";

$con = mysql_connect($host,$username,$dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_select = mysql_select_db("blogdatabase",$con);
 ?>