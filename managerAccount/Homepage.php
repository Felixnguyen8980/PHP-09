<!DOCTYPE html>
<html>
<head>
	<title>Welcome to my demo page</title>
	<link rel="stylesheet" href="style/stylebox.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<div id="container">
		<form action="Homepage.php" method="post" accept-charset="utf-8">
			<h2 class="title">Welcome to my demo page</h2>
			<div class="row">
				<button id="register" class="col-5" name="register">
					<p>REGISTER</p>
				</button>
				<button id="login" class="col-5" name="login">
					<p>LOGIN</p>
				</button>
			</div>
		</form>
	</div>
	<?php
		if(isset($_POST['register'])){
			header("Location: register.php");
		}
		if(isset($_POST['login'])){
			header("Location: login.php");
		}
	?>
</body>
</html>