<!DOCTYPE html>
<html>
<head>
	<title>Example1</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" accept-charset="utf-8">
		n: <input type="text" name="variable"><br>
		<input type="submit" name="submit">
</form>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$varA = $_POST['variable'];
		 if (empty($varA)) {
       		 echo "Text is empty";
   		 }else{
   		 	For ($i = 1; $i <= $varA; $i++){
   		 		if ($i % 3 == 0){
   		 			echo $i." - ";
   		 		}
   		 	}
   		 	echo "<br>";
   		 	$x = 0;
   		 	while (($varA > 10) && ($x < 1)){
   		 		echo "N lon hon 10 : ".$varA;
   		 		$x++;
   		 	}
   		 	echo "<br>";
   		 	$x = 0;
   		 	do{
   		 		echo "N nho hon hoc bang 15 : ".$varA;
   		 		$x++;
   		 	}while (($varA <= 15) && ($x < 1));
   		 }
	}
?>
</body>
</html>