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

	function reverseName($name){
		$arrName = explode(" ",$name);
		$lastNamePosition = count($arrName);
		$tmp = $arrName[$lastNamePosition -1];
		$arrName[$lastNamePosition -1] = $arrName[$lastNamePosition -2];
		$arrName[$lastNamePosition -2] = $tmp;
		foreach ($arrName as $key => $value) {
			echo $value." ";
		}
	}
?>
</body>
</html>