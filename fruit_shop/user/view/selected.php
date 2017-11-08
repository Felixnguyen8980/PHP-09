<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="user/view/css/selected.css">
</head>
<body>
	<form method="post">
	<ul style="height: 200px; overflow: auto" id="selectedtable">
		<?php
			if(isset($_SESSION['selected'])){
			foreach ($_SESSION['selected'] as $selected): {
			}
		?>
		<li>
			<?php
				$id=$selected['id'];
				$Obj = $this->getid('products',$id);
			?>
			<div class="row boxselected" >
				<div class="col-md-3 text-center"><?php echo $Obj->name;?></div>
				<div class="col-md-3 text-center"><img src="admin/public/uploads/<?php echo $Obj->images ?>" style="width:50px;height: 50px;"></div>
				<div class="col-md-2 text-center"><?php echo $Obj->price;?></div>
				<div class="col-md-2 text-center"><?php echo $selected['quantity']; ?></div>
				<div class="col-md-2 text-center">
					<!--  <form method="post" action="<?php 
                  		  if(!isset($_SESSION['LOGIN'])){
                  		    echo "document.getElementById('loginform').style.display ='block'";
                		    }
                			 ?>"> -->
						<button name="cart" type="submit" class="btn btn-primary">CART</button>
					<!-- </form> -->
				</div>
			</div>			
		</li>
	<?php endforeach;}?>
	</ul>
	</form>
</body>
</html>