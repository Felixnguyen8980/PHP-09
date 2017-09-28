<?php
function swap(&$x,&$y){
	$t;
	$t = $x;
	$x = $y;
	$y = $t;
}
	$a=5;
	$b=8;
	echo "a = $a, b = $b";
	echo "<br>";
	swap($a, $b);
	echo "a = $a, b = $b";
?>