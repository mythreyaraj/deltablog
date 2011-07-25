<?php Header ("Content-type: text/css");?> 
<?php include("../includes/colors.php"); ?>
html{background-color:<?php echo $htmlbg; ?>;}
div#wrapper{
	margin:200px auto;
	width:400px;
	
}
form{
	background-color:<?php echo $bodybg; ?>;
	font-size:30px;
	border:5px solid #3b5998;
	
	color:#000;
}
#formarea{font-size:30px;}
#formbutton{
background-color:<?php echo $topbg; ?>;
color:white;
border:none;

height:20px;
}

#formbutton:hover{
	background-color:<?php echo $hover;?>
}


.dc{
	text-decoration:none;
	display:block;
	text-align:center;
	height:auto;
	background-color:<?php echo $behover; ?>;
	color:#FFF;
	font-style:none;
	float:right;
	padding-left:10px;
	padding-right:10px;
}	
.dc:hover{
	background-color:<?php echo $hover; ?>;
	
	box-shadow:0px 0px 10px #000;
	}

