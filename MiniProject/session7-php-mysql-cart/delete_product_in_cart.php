<?php 
	include 'connect.php';
	$idDeleteCart = $_GET['id'];
	unset($_SESSION['cart'][$idDeleteCart]);
	header("Location: cart.php");
?>