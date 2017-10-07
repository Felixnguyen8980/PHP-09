<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" ">
	<title>Task1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" accept-charset="utf-8">
		<div id = "container">
			<h2>Input Database </h2>
			<div class="textbox">
				<p>Name</p>: <input type="text" name="name"><br>
			</div>
			<div class="textbox">
				<p>Age</p>: <input type="text" name="Age"><br>
			</div>
			<div class="textbox">
				<p>Email</p>: <input type="text" name="email"><br>
			</div>
			<div class="textbox">
				<p>Class</p>: <input type="text" name="Class"><br>
			</div>
			<div class="btnbox">
				<input type="submit" name="submit" value="submit">
				<input type="submit" name="showdata" value="showdata">		
			</div>	
		</div>
	</form>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "shop_php09";
	//check connection
	//  if (!$conn){
	// 	die("Connection fail" . mysqli_connect_error());
	// } echo "connection successfully <br>";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$conn = mysqli_connect($servername, $username, $password, $database);
		if (isset($_POST['submit'])){
			$name = $_POST['name'];
			$Age = $_POST['Age'];
			$email = $_POST['email'];
			$Class = $_POST['Class'];
			$kt = 1;
			if (empty($name)) {
				echo "check your name! <br>";
				$kt = 0;
			}
			if (empty($Class)) {
				echo "check your class! <br>";
				$kt = 0;
			}
			if ($Age <= 18) {
				echo "check your age! <br>";
				$kt = 0;
			}
			$checkEmail1 = explode('@',  $email);
			if (count($checkEmail1) == 2) {
				$pos1 = strpos($email,'@');

				$pos2 = strpos($email,'.',$pos1);
				if ($pos2 > 0) {
				} else {
				echo "check your mail! <br>";
				$kt = 0;
				}
			} else {
				echo "check your mail! <br>";
				$kt = 0;
			}

	       		if ($kt ==1){
				$sql = "INSERT INTO `user` (`name`, `Age`, `email`, `Class`) VALUES ('$name', '$Age', '$email', '$Class')" ;
				if (mysqli_query($conn, $sql)) {
					echo "New record created successfully";
				} else {
					echo "Error :" . $sql . "<br>" .mysqli_error($conn);
				}
			}
		}
			

		if (isset($_POST['showdata'])){
			$sql = "SELECT * FROM `user` where 1";
			if (mysqli_query($conn, $sql)) {
				echo "<h2> Data :</h2>";
				$result = $conn->query($sql);
				if ($result->num_rows > 0){
					 while($row = $result->fetch_assoc()) {
       					 echo "ID: " . $row["ID"]. " - Name: " . $row["name"]. " - Age: " . $row["Age"]. " - email: ". $row["email"] . " - Class: ". $row["Class"] ."<br>";
       				}
				} else {
				    echo "0 results";
				}
			} else {
				echo "Error :". $sql . "<br>" . mysqli_error($conn);
			}
		}
		$conn->close();
	}

	?>
</body>
</html>
