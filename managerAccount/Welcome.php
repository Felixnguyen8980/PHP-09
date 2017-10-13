<!DOCTYPE html>
<html>
<head>
	<title>loginpage</title>
	<link rel="stylesheet" href="style/stylebox.css">
	<link rel="stylesheet" type="text/css" href="style/loginstyle.css">
</head>
<body>
	<?
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "DataUser";
		$conn = mysqli_connect($servername,$username,$password,$database);

		$usernamelogin = $_SESSION["usernamelogin"] ;
        $thispasslogin = $_SESSION["thispasslogin"] ;

        $sql = "SELECT name FROM user WHERE username = '$usernamelogin' AND password = '$thispasslogin'";
        $result = $conn->query($sql);
        $nameUser = $result->fetch_assoc();
        echo "Welcome ".$nameUser["name"]."<br>";
        echo "<a href ='Homepage.php'>Logout</a>"
	?>
</body>
</html>