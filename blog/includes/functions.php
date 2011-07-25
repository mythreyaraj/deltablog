 <?php
function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
function monthstr($num){
	if($num==1){return "January";}
	if($num==2){return "February";}
	if($num==3){return "March";}
	if($num==4){return "April";}
	if($num==5){return "May";}
	if($num==6){return "June";}
	if($num==7){return "July";}
	if($num==8){return "August";}
	if($num==9){return "September";}
	if($num==10){return "October";}
	if($num==11){return "November";}
	if($num==12){return "December";}
}

function strmonth($num){
	if($num=="January"){return 1;}
	if($num=="February"){return 2;}
	if($num=="March"){return 3;}
	if($num=="April"){return 4;}
	if($num=="May"){return 5;}
	if($num=="June"){return 6;}
	if($num=="July"){return 7;}
	if($num=="August"){return 8;}
	if($num=="September"){return 9;}
	if($num=="October"){return 10;}
	if($num=="November"){return 11;}
	if($num=="December"){return 12;}
}
	
 ?>


<?php function table_exists ($table, $db) { 
	$tables = mysql_list_tables ($db); 
	while (list ($temp) = mysql_fetch_array ($tables)) {
		if ($temp == $table) {
			return TRUE;
		}
	}
	return FALSE;
}


?>