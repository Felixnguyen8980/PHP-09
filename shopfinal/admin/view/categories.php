<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="view/css/categories.css">
</head>
<body>
	<div class="row"> 
		<div class="col-md-6 col-sm-8" id="newCategory">
			<form method='post'>
				<div><p> New Category:</p><input type="text" name="Category" ></div>
				<input type="submit" name="newCategory" value="Add new Category">
			</form>
		</div>
		<div class="col-md-6 col-sm-8" id="viewCategories">
			<div class="tab">
				Categories:
				<table>
					<tr>
						<th>id</th>
						<th>name</th>
					</tr>
					<?php
						$start=(isset($_GET['start']))?$_GET['start']:1;
						$list = $this->listCategories(($start-1)*5,5);
						$i=($start-1)*5 +1;
						foreach ($list as $element) {			
							echo "<tr>";
							echo "<td>$i</td>";
							echo "<td>$element->name</td>";
							echo "</tr>";
							$i++;
						}
					?>
				</table>
				<div class="category_page">
					<?php
					$total= count($this->view('product_categories'));
					for($i=1;$i<=ceil($total/5);$i++){
						echo "<a href='index.php?op=categories&start=$i'>$i</a> ";
					}
					?>
				</div>
			</div>

		</div>
	</div>

</body>
</html>