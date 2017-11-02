
<?php 
		echo "<a href='index.php?action=add'>ADD PRODUCT</a>";
		echo "<br>";
?>
<?php 
	foreach($listCategory as $category){
		$id = $category->id;
		$name = $category->name;
		echo "<a href='index.php?product_category_id=$id'>$name</a>";
		echo "<br>";
	}
?>

<?php 
	foreach($listProduct as $product){
		$id = $product->id;
		echo $product->id." ";
		echo $product->name." ";
		echo $product->description." ";
		echo $product->price." ";
		echo $product->image." ";
		echo $product->is_hot." ";
		echo "<a href='index.php?id=$id&action=delete'>Delete</a>|<a href='index.php?action=edit&id=$id'>Edit</a>
					|<a href='index.php?action=buy&id=$id'>Buy</a>";
		echo "<br>";
	}
?>
<p></p>
<p></p>
<p></p>
<?php 
	foreach($listUser as $users){
		$id = $users->id;
		echo $users->name." ";
		echo $users->email." ";
		echo $users->phone." ";
		echo $users->username." ";
		echo $users->role." ";
		echo "<a href='index.php?id=$id&action=delete'>Delete</a>";
		echo "<br>";
	}
?>