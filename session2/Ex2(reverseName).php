<!DOCTYPE html>
<html>
<head>
	<title>Example1</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" accept-charset="utf-8">
		Name: <input type="text" name="variable"><br>
		<input type="submit" name="submit">
</form>
<?php
	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$varA = $_POST['variable'];
		reverseName($varA);
		
	}
	// reversename Function
	// example : Nguyen Tan Nam to Nguyen Nam Tan
	// created by BiBiBitTut
	// created on 20:00 03/10/2017 
	function reverseName($name){
		$arrName = explode(" ",$name);
		$lastNamePosition = count($arrName);
		$tmp = $arrName[$lastNamePosition -1];
		$arrName[$lastNamePosition -1] = $arrName[$lastNamePosition -2];
		$arrName[$lastNamePosition -2] = $tmp;
		$newName = implode(" ", $arrName);
		echo $newName;
	}
?>
</body>
</html>