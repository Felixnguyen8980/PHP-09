<?php include 'connect.php';
    $carts = $_SESSION['cart'];
	$listProductCartID = "(";
	$countCart = count($_SESSION['cart']);
	$i = 1;
	foreach ($carts as $key => $value) {
		$listProductCartID.=$key;
		if($i < $countCart){
			$listProductCartID.=",";
		}
		$i++;
	}
	$listProductCartID .= ")";
	//get product on cart
	$sqlGetCartProduct    = "SELECT products.id, products.name, products.description, products.price, products.created, products.image, categories.name as category_name FROM products INNER JOIN categories
	ON products.category_id = categories.id WHERE products.id IN $listProductCartID";
	$resultGetCartProduct = $conn_php09_basic->query($sqlGetCartProduct);
?>
<h1>List cart</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Category</th>
				<th>Quantity</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($resultGetCartProduct->num_rows > 0) {
				//show list users
				$i = 1;
				while($elementProduct = $resultGetCartProduct->fetch_assoc()) {
					$image  = $elementProduct['image'];
					$id     = $elementProduct['id'];
					echo "<tr>";
						echo "<td>".$i."</td>";
						echo "<td>".$elementProduct['name']."</td>";
						echo "<td>".$elementProduct['description']."</td>";
						echo "<td>".$elementProduct['price']."</td>";
						echo "<td>"."<img src='uploads/products/$image' width=100px height = 150px>"."</td>";
						echo "<td>".$elementProduct['category_name']."</td>";
						echo "<td>";
						echo $_SESSION['cart'][$id]['quantity'];
						echo "</td>";
						echo "<td><a href='decrease_product_in_cart.php?id=$id'>Decrease</a> | <a href='delete_product_in_cart.php?id=$id'>Delete</a> | <a href='increase_product_in_cart.php?id=$id'>Increase</a></td>";
					echo "</tr>";
					$i++;
				}
			?>
		</tbody>
	</table>
	<?php }else{
		echo "No product";
	}
?>