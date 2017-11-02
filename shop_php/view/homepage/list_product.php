<?php 
	echo "<h2>Danh sach san pham</h2>";
	echo "<a href='index.php?action=home'>home</a>"."<br>";
	echo "<a href='index.php?action=select&category_id=47'>Samsung</a>"."<br>";
	echo "<a href='index.php?action=select&category_id=48'>iphone</a>"."<br>";
	echo "<a href='index.php?action=add&table=product'>add product</a>"."<br>";
	foreach($listProduct as $product){
		echo $product->id."--";
		echo $product->name."--";
		echo $product->description."--";
		echo $product->image."--";
		echo $product->is_hot."--";
		echo "<a href='index.php?action=delete&id=$product->id&table=products'>delete</a>"."--";
		echo "<a href='index.php?action=edit'>edit</a>";
		echo "<br>";
	}
?>