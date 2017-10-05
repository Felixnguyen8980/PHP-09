<!DOCTYPE html>
<html>
<head>
	<title>Validate Form</title>
</head>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="utf-8">
		Name : <input type="text" name="name"><br>
		Class : <input type="text" name="class"><br>
		Age : <input type="text" name="age"><br>
		Email : <input type="text" name="email"><br>
		<input type="submit" name="submit" value="Sign up"><br>
	</form>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 		$name = $_POST['name'];
	 		$class = $_POST['class'];
	 		$age = $_POST['age'];
	  	    $email = $_POST['email'];  

	  	    if (empty($name)) {
	  	    	echo "check your name! <br>";
	  	    }
	  	    if (empty($class)) {
	  	    	echo "check your class! <br>";
	  	    }
	  	    if ($age <= 18) {
	  	    	echo "check your age! <br>";
	  	    }
	  	    $checkEmail1 = explode('@',  $email);
	  	    if (count($checkEmail1) == 2) {
	  	    	$pos1 = strpos('@', $email);
	  	    	$pos2 = strpos('.', $email,$pos1);
	  	    	if ($pos2 > 0) {

	  	    	} else {
	  	    		echo "check your mail! <br>";
	  	    	}
	  	    } else {
	  	    	echo "check your mail! <br>";
	  	    }
	  	}
	?>
</body>
</html>
