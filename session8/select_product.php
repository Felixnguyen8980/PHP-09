<?php include 'connect.php'; ?>
<?php 
	$limit = 3;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	$from = $limit*($page - 1);

	$sqlSelectProduct    = "SELECT products.id, products.name, products.description, products.price, products.created, products.image, categories.name as category_name FROM products INNER JOIN categories
	ON products.category_id = categories.id LIMIT $from,$limit";
	$resultSelectProduct = $conn_php09_basic->query($sqlSelectProduct);
	//get total product
	$total = 0;
	$sqlGetTotalProduct =  "SELECT name from products";
	$resultGetTotalProduct = $conn_php09_basic->query($sqlGetTotalProduct);
	$total = $resultGetTotalProduct->num_rows;
?>
<h1>List products</h1>
	<p><a href='add_product.php'>Add products</a></p>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Category</th>
				<th>Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($resultSelectProduct->num_rows > 0) {
				//show list users
				$i = 1;
				while($elementProduct = $resultSelectProduct->fetch_assoc()) {
					$image  = $elementProduct['image'];
					$id     = $elementProduct['id'];
					echo "<tr>";
						echo "<td>".$i."</td>";
						echo "<td>".$elementProduct['name']."</td>";
						echo "<td>".$elementProduct['description']."</td>";
						echo "<td>".$elementProduct['price']."</td>";
						echo "<td>"."<img src='uploads/products/$image' width=100px height = 150px>"."</td>";
						echo "<td>".$elementProduct['category_name']."</td>";
						echo "<td>".$elementProduct['created']."</td>";
						echo "<td><a href='buy_product.php?id=$id'>Buy</a></td>";
					echo "</tr>";
					$i++;
				}
			?>
		</tbody>
	</table>
	<?php }else{
		echo "No product";
	}
	for($i = 1; $i <= ceil($total/$limit); $i++){
		echo "<a href='select_product.php?page=$i'>$i</a> | ";
	}
?>