<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<link rel="stylesheet" type="text/css" href="user/view/css/login.css">
</head>
<body>
	<div>
		<form method="post" action="index.php?lastop=<?php echo $_GET['op'];?>&op=login">
			<div class="row">
				<div class="col-md-3">Username:</div>
				<div class="col-md-8"><input type="text" name="username"></div>
			</div>
			<div class="row">
				<div class="col-md-3">password:</div>
				<div class="col-md-8"><input type="password" name="password"></div>
			</div>
			<div id="login">
				<button type="submit" class="btn btn-success" name="login" 
				value="submit" >
					LOGIN
				</button>
			</div>
		</form>
	</div>
</body>
</html>
