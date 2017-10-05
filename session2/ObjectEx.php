<!DOCTYPE html>
<html>
<head>
	<title>Object</title>
</head>
<body>
<?php
	class Car {
	    function Car() {
	        $this->model = "";
	    }
	}

	// create an object
	$herbie = new Car();
	$herbie->model = "Sanzo";
	// show object properties
	echo $herbie->model;
?>
</body>
</html>