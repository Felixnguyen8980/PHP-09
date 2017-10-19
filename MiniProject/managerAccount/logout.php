<?php 
session_start();
unset($_SESSION['usernamelogin']);
header("Location: login.php");

?>