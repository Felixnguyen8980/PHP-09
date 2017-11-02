<h1>Edit product</h1>
<form method="POST" action = ""  enctype="multipart/form-data">

	<p>Name : <input type="text" name="name" value="<?php echo $getProduct->name?>"></p>
	<p>Description : <input type="text" name="description" value="<?php echo $getProduct->description?>"></p>
	<p>Price : <input type="text" name="price" value="<?php echo $getProduct->price?>"></p>
	<p>Discount : <input type="text" name="discount" value="<?php echo $getProduct->discount?>"></p>
	<p>Product Category : 
		<select name="category">
			<?php 
				$categorySeleted = "";
				foreach($listProductCategory as $productcategoriesy){
					$id = $productcategoriesy->id;
					$name = $productcategoriesy->name;

					$categorySeleted = ($productcategoriesy->id == $getProduct->product_category_id)?"selected":"";


					echo "<option value='$id' $categorySeleted>$name</option>";
				}
			?>
		</select>
	</p>
	<img src="<?php echo "public/uploads/".$getProduct->image;?>" width="300px">
	<p>Image : <input type="file" name="avatar"></p>
	<p>Is Hot :
		<select name="ishot">
			<option value ="0" <?php echo $getProduct->is_hot==0?"selected":""?>>0</option>
			<option value ="1" <?php echo $getProduct->is_hot==1?"selected":""?>>1</option>
		</select>
	</p>
	<P><input type="submit" name="submit" value="Edit"></P>
</form>