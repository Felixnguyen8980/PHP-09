<h1>ADD product</h1>
<form method="POST" action=""  enctype="multipart/form-data">

	<p>Name : <input type="text" name="name"></p>
	<p>Description : <input type="text" name="description"></p>
	<p>Price : <input type="text" name="price"></p>
	<p>Discount : <input type="text" name="discount"></p>
	<p>Product Category : 
		<select name="category">
			<?php 
				foreach($listProductCategory as $productcategoriesy){
					$id = $productcategoriesy->id;
					$name = $productcategoriesy->name;
					echo "<option value='$id'>$name</option>";
				}
			?>
		</select>
	</p>
	<p>Image : <input type="file" name="avatar"></p>
	<p>Is Hot :
		<select name="ishot">
			<option>0</option>
			<option>1</option>
		</select>
	</p>
	<P><input type="submit" name="submit" value="Add Product"></P>
</form>