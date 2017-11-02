<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="user/view/css/products.css">
</head>
<body>
<?php
  $start=(isset($_GET['start']))?$_GET['start']:1;
  $list = $this->listproducts(($start-1)*9,9);
  $i=($start-1)*9 +1;
  foreach ($list as $element):
    if ($i%3==1){
      echo "<div class='container'>";
      echo "<div class='row'>";
    }
?>  
   <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><?php echo $element->name?></div>
          <div class="panel-body"><img src="admin/public/uploads/<?php echo $element->image;?>" class="img-responsive" style="width:200px; height: 150px;" alt="Image"></div>
          <div class="panel-footer">
            <div class="row text-center">
                <div class="col-md-5 text-left price"><?php echo '$'.$element->price; ?></div>
                <form method='post'>
                  <div class="col-md-5 text-right"><button type="submit" class="btn btn-primary" name="btnSelect" value="<?php echo $element->id;?>">SELECT</button></div>
                </form>
            </div>
          </div>
        </div>
     </div>  
<?php 
    if ($i%3==0){
      echo "</div></div><br>";
    }
    endforeach; 
?>  
<div class="page">
  <?php
    $total= count($this->view('products'));
      for($i=1;$i<=ceil($total/9);$i++){
        echo "<b><a href='index.php?op=products&start=$i'>$i</a><b> ";
    }
  ?>
</div>
</body>
</html>