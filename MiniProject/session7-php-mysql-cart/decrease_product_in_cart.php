<?php 
	include 'connect.php';
	$idIncreaseCart = $_GET['id'];
	if($_SESSION['cart'][$idIncreaseCart]['quantity'] > 1){
		$_SESSION['cart'][$idIncreaseCart]['quantity'] -=1;
	}else{
		unset($_SESSION['cart'][$idIncreaseCart]);
	}
	
	header("Location: cart.php");
?>