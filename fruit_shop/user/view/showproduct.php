<?php
	$table = 'products';
	$id = $_GET['id'];
	$result = $this->getid($table,$id);
	$sql = "SELECT name FROM categories WHERE id='$result->category_id'";
	$resultcategories = mysqli_query($this->conn,$sql);
	$element = array();
		while (($obj = mysqli_fetch_object($resultcategories))!=NULL){
			$element[] = $obj;
		}
	foreach ($element as $categories) {
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Product: <?php echo $result->name; ?></h2>
	<img src="admin/public/uploads/<?php echo $result->images;?>" width="300px">
	<p>Description: <?php echo $result->description; ?></p>
	<p>Price: <?php echo $result->price; ?></p>
	<p>Categories: <?php echo $categories->name; ?></p>
</body>
</html>