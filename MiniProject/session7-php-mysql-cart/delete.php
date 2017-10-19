<?php  include 'connect.php';?>
<?php 
	$idDelete = $_GET['id'];
	$sqlDeleteUser = "DELETE FROM users WHERE id = $idDelete";
	$resultDeleteUser = $conn_php09_basic->query($sqlDeleteUser);
	header("Location: select.php");

?>