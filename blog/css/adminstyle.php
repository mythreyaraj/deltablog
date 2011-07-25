<?php Header ("Content-type: text/css");?> 
<?php include("../includes/colors.php"); ?>
html{background-color:<?php echo $htmlbg; ?>;}
div#wrapper{
	margin:0 auto;
	width:800px;
}
#top{
	width:100%;
	background-color:<?php echo $topbg; ?>;
	height:25px;
	text-align:center;
	box-shadow: 0px 0px 10px #7f93bc;
	position:relative;
}

#signouta{display:block;
color:white;
width:100px;
height:100%;
text-decoration:none;
position:absolute;
right:0px;
}

#signouta:hover,#admin:hover{background-color:<?php echo $hover; ?>;}

#admin{
	display:block;
color:white;
width:100px;
height:100%;
text-decoration:none;
position:absolute;
left:0px;

}
#head{
	background-color:<?php echo $headbg; ?>;
	height:150px;
	margin:0px;
	padding:0px;
	color:<?php $headtxt; ?>;
}
#title{
	font-size:50px;
	text-align:center;
	padding-bottom:50px;
	padding-top:50px;
	
	
}
#preview{
	float:right;
	display:block;
	text-decoration:none;
	height:auto;
	width:100%;
	background-color:<?php echo $behover; ?>;
	color:<?php echo $linkcolor; ?>;
	text-align:center;
}
#preview:hover{
	background-color:<?php echo $hover;?>;
}
#edits{
	width:20%;
	margin:0 auto;		
	margin-top:25px;
	text-align:center;
}
.edits{
	font-size:100%;
	display:block;
	width:204.8px;
	height:auto;
	background-color:<?php echo $behover;?>;
	text-decoration:none;
	padding-top:5px;
	padding-bottom:5px;
	color:<?php echo $linkcolor;?>;
	}

.edits:hover{
	background-color:<?php echo $hover;?>;
	box-shadow:0px 0px 10px #000;
}




