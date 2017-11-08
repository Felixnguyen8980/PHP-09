<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="view/css/product.css">
</head>
<body>
	<table>
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>description</th>
					<th>price</th>
					<th>Is hot</th>
					<th>image</th>
					<th>Action</th>
				</tr>		
			</thead>
		<tbody>
			<?php
			$start=(isset($_GET['start']))?$_GET['start']:1;
			$list = $this->listproducts(($start-1)*6,6);
			$i=($start-1)*6 +1;
			foreach ($list as $element):
			?>
			<tr>
				<td><?php echo $element->id ?></td>
				<td><?php echo $element->name ?></td>
				<td><?php echo $element->description ?></td>
				<td><?php echo $element->price?></td>
				<td><?php echo $element->is_hot?></td>
				<td><img src="public/uploads/<?php echo $element->image;?>" width='70px' height='80px'></td>	
				<td>
					<button><a href="index.php?op=delete&id=<?php echo $element->id;?>&start=<?php echo $start;?>" style="text-decoration: none;">Delete</a></button>
					&nbsp;
					<button><a  href="index.php?op=edit&id=<?php echo $element->id;?>&start=<?php echo $start;?>" style="text-decoration: none;"">Edit</a></button>
					<!-- <a href="index.php?op=edit&id=<?php echo $element->id;?>&start=<?php echo $start;?>">Edit</a> -->
				</td>		
			</tr>
			<?php endforeach; ?>
		</tbody>
	
	</table>
	<div class="page">
	<?php
					$total= count($this->view('products'));
					for($i=1;$i<=ceil($total/6);$i++){
						echo "<b><a href='index.php?op=viewproducts&start=$i'>$i</a><b> ";
					}
	?>
	</div>
</body>
</html>
