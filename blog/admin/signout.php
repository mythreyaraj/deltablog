<?php include("../includes/constant.php"); ?>
<?php include("../includes/functions.php"); ?> 
<?php include("../includes/header.php"); ?>
<?php
session_start();
$_SESSION=array();
session_destroy();
redirect_to("../public/viewblog.php?flag=2");
?>