<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="view/css/product.css">
</head>
<body>
	<h2>Add Product</h2>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-1">Name:</div>
			<div class="col-md-5"><input type="text" name="name"></div>
		</div>
		<div class="row">
			<div class="col-md-1">Description:</div>
			<div class="col-md-5"><input type="text" name="description"></div>
		</div>
		<div class="row">
			<div class="col-md-1">Category:</div>
			<div class="col-md-5">
				<?php
					$list= $this->view('product_categories');
					$option='';
					foreach ($list as $Obj) {
						$option.="<option value='$Obj->id'>$Obj->name</option>";
					}
				?>
					<select  name ="product_category_id">
						<?php echo $option; ?>
					</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">Price:</div>
			<div class="col-md-5"><input type="text" name="price"></div>
		</div>
		<div class="row">
			<div class="col-md-1">ishot:</div>
			<div class="col-md-5">
				<select name ="ishot">
					<option value="0">0</option>
					<option value="1">1</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1">image:</div>
			<div class="col-md-5"><input type="file" name="fileUpload"></div>
		</div>
		<!-- <input type="submit" name="submit" value="Add new product"> -->
		 <button type="submit" name="submit">Add new product</button>
	</form>
</body>
</html>
