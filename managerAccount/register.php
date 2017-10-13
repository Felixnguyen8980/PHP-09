<!DOCTYPE html>
<html>
<head>
	<title>loginpage</title>
	<link rel="stylesheet" href="style/stylebox.css">
	<link rel="stylesheet" type="text/css" href="style/registerstyle.css">
</head>
<body>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "DataUser";
		$conn = mysqli_connect($servername,$username,$password,$database);
		if(isset($_POST['homepage'])){
			header("Location: Homepage.php");
		}
		$kt = 1;

		$errPass = $nameErr = $usernameErr = $errRePassword = $errUpload = $message = "";
		$username = $password =$avatar =  $password = $repassword ="";
		if(isset($_POST['submit'])){
			if (strlen(($_POST["name"])) < 3 ) {
				$nameErr = "invaild";
				$kt = 0;
			} else {
				$name = $_POST['name'];
			}
			if (strlen(($_POST["username"])) < 5 ) {
				$usernameErr = "invaild";
				$kt = 0;
			} else {
				$username = $_POST['username'];
			}

			if (strlen(($_POST["password"])) < 8 ) {
				$errPass = "invaild";
				$kt = 0;
			} else {
				$password = $_POST['password'];
			}

			$repassword = $_POST['repassword'];
			if ($password != $repassword){
				$errRePassword ="Error";
				$kt = 0;
			}
			$target_dir = "images/";
			$fileimage = strtotime("now").basename($_FILES["fileToUpload"]["name"]);
			$target_file =$target_dir.$fileimage;
			$typeimg = pathinfo($fileimage,PATHINFO_EXTENSION);
			if($typeimg != "jpg" && $typeimg != "png" && $typeimg != "jpeg" && $typeimg != "gif" ){
				$kt = 0;
				$errUpload ="Only support jpg,png,jpeg,gif are allowed.";
			}
			if (empty($fileimage)){
				$errUpload ="";
			}
			$sql = "SELECT username FROM user WHERE  username = '$username'";
			if (mysqli_query($conn,$sql)) {
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0){


					$kt=0;
					$usernameErr = "exits";
				}
			}
			
			if ($kt == 1){
				$sql2 = "INSERT INTO `user`(`name`, `username`, `password`, `avatar`) VALUES ('$name','$username','$password','$fileimage')";
				if (mysqli_query($conn,$sql2)) {
					$message = "Successfully";
				} else {
					echo "Error :" .$sql2 ."<br>" . mysqli_error($conn);
				}

				 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    } else {
			        echo "Sorry, there was an error uploading your file.";
				}
			}
		}	


?> 
	<div id="container">
		 <form action="register.php" method="post" enctype="multipart/form-data">
			<div id="panelRegister" class="row">
				 <button id="homepage" name="homepage">&larr;</button>
				 <p id="title">REGISTER</p>
			</div>
			<div id="content" >
				<form action="register.php" method="post" enctype="multipart/form-data">
					<p class="row">
						<p class="titleBlock">Name        :</p> 
						<input class="inputblock"type="text" name="name">
						<p class="check" id="nameErr"><?php echo $nameErr; ?></p>
					</p>
					<p class="row">
						<p class="titleBlock">UserName    :</p>
						 <input class="inputblock" type="text" name="username">
						 <p class="check" id="usernameErr"><?php echo $usernameErr;?></p>
					</p>
					<p class="row">
						<p class="titleBlock">Password    :</p>
					    <input class="inputblock" type="password" name="password">
					    <p class="check" id="errPass"><?php echo $errPass;?></p>
					</p>
					<p class="row">
						<p class="titleBlock">rePassword    :</p>
					    <input class="inputblock" type="password" name="repassword">
					    <p class="check" id="errRePassword"><?php echo $errRePassword;?></p>
					</p>
					<p class="row">
						<p class="titleBlock">Avatar      :</p> 
						<input class="inputblock" type="file" name="fileToUpload" id="fileToUpload">
						<p class="check" id="errUpload"><?php echo $errUpload;?></p>
					</p>
					<p id="message"><?php echo $message;?></p>
					<p class="button">
						<input type="submit" value="submit" name="submit">
					</p>
				</form>
			</div>
		</form>
	</div>
</body>
</html>
