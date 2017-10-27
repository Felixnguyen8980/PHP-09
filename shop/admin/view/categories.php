<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>
	<form action="#" method="post" enctype="multipart/form-data">
		<div class ="row box">
			<div class="col-md-6">
				<h2>Add Categories</h2>
				<div>
					<div class="row option">
						<div class="col-md-3">Category's name</div>
						<div class="col-md-3"><input type="text" name="name"></div>
					</div>
					<div class="row option btn">
						<div class="col-md-3"></div>
						<div class="col-md-3"><input type="submit" name="submit" value="add"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h2>List Categories</h2>
				<div>
					<table class="Categories" border="0" cellpadding="2px" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category's Name</th>
							</tr>
						</thead>
						<tbody>
							<?php
							 $i=1+($this->categoriespage-1)*$this->limit;
							 foreach ($this->subview2 as $Category): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo ($Category->name); ?></td>				
								</tr>
							<?php $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php
				for($i = 1; $i <= ceil($this->total/$this->limit); $i++){
					echo "<a href='index.php?op=categories&categoriespage=$i'>$i</a> | ";
				}
				?>
			</div>
		</div>
	</form>
</body>
</html>