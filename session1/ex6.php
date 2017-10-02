<?php
	$number = array(2, 3, 4, 5, 6, 7, 8);
	$vi     = array("2"=>"Hai", "3"=>"Ba", "4"=>"Tu", "5"=>"Nam", "6"=>"Sau", "7"=>"Bay", "8"=>"Chu Nhat");
	$en     = array("2"=>"Monday", "3"=>"Tuesday", "4"=>"Wedsday", "5"=>"Thurday", "6"=>"Friday", "7"=>"Saturday", "8"=>"Sunday");
	
	$day = 3;
	$lg  =  "vi";
	if ( $lg == "vi"){
		echo $vi[$day];
	}else{
		echo $en[$day];
	}
?>