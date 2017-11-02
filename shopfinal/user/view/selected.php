<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="user/view/css/selected.css">
</head>
<body>
	<form method="post">
	<ul class="selected" style="width: 400px; height: 200px; overflow: auto">
		<?php
			foreach ($_SESSION['selected'] as $selected): {
			}
		?>
		<li>
			<?php
				$id=$selected['id'];
				$Obj = $this->getid('products',$id);
			?>
			<div class="row boxselected" >
				<div class="col-md-2 text-left"><?php echo $Obj->name;?></div>
				<div class="col-md-4 text-center"><img src="admin/public/uploads/<?php echo $Obj->image ?>" style="width:50px;"></div>
				<div class="col-md-3"><?php echo $selected['quantity']; ?></div>
				<div class="col-md-3"><button name="cart" type="submit" class="btn btn-primary">CART</button></div>
			</div>			
		</li>
	<?php endforeach;?>
	</ul>
	</form>
</body>
</html>