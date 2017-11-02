<?php $id=$_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
</head>
<body>
	<h4>Edit Product id: <?php echo $id; ?></h4>
	<?php
		$product = $this->getid('products',$id);
	?>
	<form method="post" enctype="multipart/form-data">
	<div class=row>
		<div class="col-md-1"><b>Name</b></div>
		<div class="col-md-5"><input type="text" name="name" value="<?php echo $product->name; ?>"></div>
	</div>
	<div class=row>
		<div class="col-md-1"><b>Description</b></div>
		<div class="col-md-5"><input type="text" name="description" value="<?php echo $product->description; ?>"></div>
	</div>
	<div class="row">
			<div class="col-md-1"><b>Category</b></div>
			<div class="col-md-5">
				<?php
					$categorySeleted = "";
					$list= $this->view('product_categories');
					$option='';
					foreach ($list as $Obj) {
						$categorySeleted = ($Obj->id == $product->product_category_id)?"selected":"";
						$option.="<option value='$Obj->id' $categorySeleted>$Obj->name</option>";
					}
				?>
					<select name ="product_category_id">
						<?php echo $option; ?>
					</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"><b>Price</b></div>
			<div class="col-md-5"><input type="text" name="price" value="<?php echo $product->price; ?>"></div>
		</div>
		<div class="row">
			<div class="col-md-1"><b>Discount</b></div>
			<div class="col-md-5"><input type="text" name="discount" value="<?php echo $product->discount; ?>"></div>
		</div>
		<div class="row">
			<div class="col-md-1"><b>Is hot</b></div>
			<div class="col-md-5">
				<select name="ishot">
					<option value ="0" <?php echo $product->is_hot==0?"selected":""?>>0</option>
					<option value ="1" <?php echo $product->is_hot==1?"selected":""?>>1</option>
				</select>
			</div>
		</div>
		<div>
			<img src="public/uploads/<?php echo $product->image;?>" width='150px'>
		</div>
		<div class="row">
			<div class="col-md-1"><b>image</b></div>
			<div class="col-md-5"><input type="file" name="fileUpload"></div>
		</div>
		<div>
			<input type="submit" name="submit" value="update">
		</div>
	</form>
</body>
</html>