<?php Header ("Content-type: text/css");?> 
<?php include("../includes/colors.php"); ?>

html{background-color:<?php echo $htmlbg; ?>;}
div#wrapper{
	margin:0 auto;
	width:800px;
}
form#searchform{
	background-color:<?php echo $bodybg; ?>;
}
div#search{
	text-align:center;
}
#searchlist{text-align:center;}
#top{
	width:100%;
	background-color:<?php echo $topbg; ?>;
	height:1.6em;
	text-align:center;

	position:relative;
}
#signin{height:1.6em;
	width:70px;
	position:absolute;
	right:65px;
	
}
#signina{display:block;
color:white;
width:70px;
height:1.6em;
text-decoration:none;
}
#signinp{padding-top:4px}
#signina:hover{background-color:<?php echo $hover; ?>;}

form{
	color:<?php echo $formtxt; ?>;
	display:inline;
	
	}
#form1{
	
	border:7px solid #ccc;
	overflow:visible;
	text-align:center; 
	position:absolute;
	right:0px;
	top:1.6em;
	width:200px;
	height:120px;
	background-color:#336699;

}
.TheOff{visibility:hidden;}
.TheOn{visibility:visible;}
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
#create:hover{background-color:<?php echo $hover; ?>;}

#create{
	display:block;
color:white;
width:150px;
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

#main{
	height:100%;
	}

#blog{
	background-color:<?php echo $bodybg; ?>;
	width:69%;
	float:left;
	height:auto;
	margin-top:10px;
	padding:0px;
	}


#side{
	height:auto;
	float:right;
	
	width:29%;
	margin-top:10px;
	padding:0px;
	
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
#homea{
	display:block;
	width:100px;
	padding-top:10px;
	padding-bottom:10px;
	text-align:center;
	margin-left:5px;
	margin-top:10px;
	background-color:<?php echo $behover; ?>;
	color:#FFF;	
	text-decoration:none;
	
}	

#homea:hover{
	background-color:<?php echo $hover; ?>;
	
}
.year{
	display:block;
	width:80%;
	margin:0 auto;
	padding-top:10px;
	padding-bottom:10px;
	background-color:<?php echo $behover; ?>;
	color:#FFF;
	margin-bottom:1px;
	text-align:center;
	text-decoration:none;
	
}
.month{
	display:block;
	width:80%;
	margin:0 auto;
	padding-top:10px;
	padding-bottom:10px;
	background-color:<?php echo $behover; ?>;
	color:#FFF;
	margin-bottom:1px;
	text-align:center;
	text-decoration:none;
}
.dateside{
	display:block;
	width:80%;
	margin:0 auto;
	padding-top:10px;
	padding-bottom:10px;
	background-color:<?php echo $behover; ?>;
	color:#000;
	margin-bottom:1px;
	text-align:center;
	text-decoration:none;
}
.year:hover,.month:hover,.dateside:hover{
	background-color:<?php echo $hover; ?>;
	
}
.submitbutton,#submitbutton{
background-color:<?php echo $topbg; ?>;
color:white;
border:2px solid #999;
height:20px;
margin-top:10px;
}

.submitbutton:hover,#submitbutton:hover{
	background-color:<?php echo $hover;?>
}








