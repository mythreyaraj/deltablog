<?php Header ("Content-type: text/css");?> 
<?php include("../includes/colors.php"); ?>
html{background-color:<?php echo $htmlbg; ?>;}
div#wrapper{
	margin:100px auto;
	width:800px;
	
}
form{
	background-color:<?php echo $bodybg; ?>;
	border:5px solid #3b5998;
	
	color:#333;
}

#editform{
	width:400px;
	margin-left:200px;
	}
input{style:none;
border:none;
margin-top:10px;
margin-left:10px;
margin-bottom:10px;
}
#formbutton{
background-color:<?php echo $topbg; ?>;
color:white;
border:none;
height:20px;
}

#formbutton:hover{
	background-color:<?php echo $hover;?>
}
.post{margin:10px auto;
width:520px;
height:auto;

}	
.topic{
	font-size:30px;
	padding-top:5px;
	padding-bottom:5px;
	padding-left:10px;
	background-color:<?php echo $topicbg; ?>;
	color:<?php echo $topictxt; ?>;
	font-family:Georgia, "Times New Roman", Times, serif;
	}
.date{text-align:right;
	
	color:<?php echo $datetxt; ?>;
}	

.content{
font-size:20px;
background-color:<?php echo $contentbg; ?>;
color:<?php echo $contenttxt; ?>;
font-style:italic;
}
.commentname{
	font-style:italic;
	font-weight:200;	
	color:<?php echo $commentnametxt; ?>
}
.comment{
	
 color:<?php echo $commenttxt; ?>;
}

#nav2,#nav1{text-decoration:none;
display:block;
text-align:center;
width:100px;
height:auto;
padding-top:10px;
padding-bottom:10px;
background-color:<?php echo $behover; ?>;
color:#FFF;

}
#nav2{float:left;}
#nav1{float:right;}
#nav1:hover,#nav2:hover{
	background-color:<?php echo $hover; ?>;
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
	
.dc, .commentname{display:inline;}	

.ep,.dp{
	text-decoration:none;
	display:block;
	text-align:center;
	height:auto;
	background-color:<?php echo $behover; ?>;
	color:#FFF;
	font-style:none;
	margin-right:20px;
	padding-left:10px;
	padding-right:10px;
}
.topic,.ep,.dp{display:inline;}	
.ep:hover,.dp:hover{
	background-color:<?php echo $hover; ?>;
	box-shadow:0px 0px 10px #000;
	}
.message{
	width:180px;
	text-align:center;
	color:#7CFC00;
	background-color:red;
	font-weight:900;
	}
	
	
	
	
	
	
	
	