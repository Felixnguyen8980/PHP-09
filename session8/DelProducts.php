<?php  include 'connect.php';?>
<?php
	if (isset($_SESSION['login'])) {
		$itemDel = $_GET['id'];
		$sql = "DELETE FROM products WHERE id = '$itemDel'";
		$conn_php09_basic->query($sql);
		header("Location: list_products.php");
	} else {
		header("Location: login.php");
	}

?>