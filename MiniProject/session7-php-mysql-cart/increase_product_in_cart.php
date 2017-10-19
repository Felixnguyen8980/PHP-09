<?php 
	include 'connect.php';
	$idIncreaseCart = $_GET['id'];
	$_SESSION['cart'][$idIncreaseCart]['quantity'] +=1;
	header("Location: index.php");
?>