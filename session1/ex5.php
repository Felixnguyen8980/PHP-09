<?php
	$name = "Luong Hoai Canh";
	echo " Số ký tự của tên: ".strlen($name)."<br>" ;					//number of name's Characters  
	echo " Số chữ trong tên : ".str_word_count($name)."<br>"; 			//number of name's Words
	echo "Vị trí chữ a : ".strpos($name,"a")."<br>"; 					//position "a" in name
	echo "Thay tên lót : ".str_replace("Hoai","PHP09",$name)."<br>";    //exchange subname
	echo "Đảo tên : ".strrev($name)."<br>"; 							//reveb
?>