<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="view/style.css">
</head>
<body>
	<form action="#" method="post" enctype="multipart/form-data">
		<div class="form">
			<h2>Add Products</h2>
			<div>
				<div class="row option">
					<div class="col-md-3">Product's name</div>
					<div class="col-md-3"><input type="text" name="product_name"></div>
				</div>
				<div class="row option">
					<div class="col-md-3">Product's category</div>
					<div class="col-md-3">
						<?php
							$list = "";
							while($elementCategory = $this->list_product_categories->fetch_assoc()) {
								$categoryID   = $elementCategory['category_id'];
								$categoryName = $elementCategory['name'];
								$list.= "<option value='$categoryID'>$categoryName</option>";
							}					
   						?>
						   <select name = "category_id">
						      <?php echo $list?>
						   </select>
					</div>
				</div>
				<div class="row option">
					<div class="col-md-3">Product's price</div>
					<div class="col-md-3"><input type="text" name="price"></div>
				</div>
				<div class="row option">
					<div class="col-md-3">Product's description</div>
					<div class="col-md-3"><input type="text" name="description"></div>
				</div>
				<div class="row option">
					<div class="col-md-3">Product's image</div>
					<div class="col-md-3"><input type="file" name="image"></div>
				</div>
				<div class="row option btn">
					<div class="col-md-3"></div>
					<div class="col-md-3"><input type="submit" name="submit" value="add"></div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>