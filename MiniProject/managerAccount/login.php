<!DOCTYPE html>
<html>
<head>
	<title>loginpage</title>
	<link rel="stylesheet" href="style/stylebox.css">
	<link rel="stylesheet" type="text/css" href="style/loginstyle.css">
</head>
<body>
	<?php
		session_start();
		$message ="";
		if(isset($_POST['homepage'])){
			header("Location: Homepage.php");
		}
	?>
	<div id="container">
		 <form action="login.php" method="post" enctype="multipart/form-data">
			<div id="panelLogin" class="row">
				 <button id="homepage" name="homepage">&larr;</button>
				 <p id="title">LOGIN</p>
			</div>
			<div id="content" >	
				<p class="row">
					<p class="titleBlock">UserName    :</p>
					 <input class="inputblock" type="text" name="username">
				</p>
				<p class="row">
					<p class="titleBlock">Password    :</p>
				    <input class="inputblock" type="password" name="password">   
				</p>
				<p id="message"><?php echo $message;?></p>
				<p class="button">
					<input type="submit" value="submit" name="submit">
				</p>
		</div>
		</form>
	</div>
<?php
		if (isset($_POST['submit'])){
			$_SESSION["usernamelogin"] = $_POST['username'];
	        $_SESSION["thispasslogin"] = $_POST['password'];
	     
	     header("Location: Welcome.php");
	 }
	?> 
</body>
</html>