<?php 
	foreach($cartProduct as $cartProduct){
		$id = $cartProduct->id;
		echo $cartProduct->id." ";
		echo $cartProduct->name." ";
		echo $cartProduct->description." ";
		echo $cartProduct->price." ";
		echo $cartProduct->image." ";
		echo $cartProduct->is_hot." ";
		echo $_SESSION['cart'][$id]['quantity'];
		echo "<a href='index.php?action=cart&id=$id'>Delete</a>";
		echo "<br>";
	}
?>