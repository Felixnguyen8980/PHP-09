<?php
session_start();
include 'connect.php';
if(isset($_SESSION['login'])){
	header("Location: login_success.php");
}
if(isset($_POST['submit'])){
   $username   = $_POST['username'];
   $password   = md5($_POST['password']);
   $sqlLogin   = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
   $resultLogin = $conn_php09_basic->query($sqlLogin);
   if ($resultLogin->num_rows > 0) {
   		$_SESSION['login'] = $username;
   		header("Location: login_success.php");
   }else{
   		echo "Username/Password is not matching";
   }
}
?>
<h2>Login</h2>
<p><a href='select.php'>List users</a></p>
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
   <p>Username: <input type="text" name="username"></p>
   <p>Password: <input type="text" name="password"></p>
   <input type="submit" value="Login" name = "submit">
</form>