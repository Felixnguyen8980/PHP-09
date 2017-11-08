<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="user/view/css/products.css">
</head>
<body>
<?php
  $start=(isset($_GET['start']))?$_GET['start']:1;
  if(!isset($_SESSION['login'])){
  $list = $this->list_normal_products(($start-1)*9,9);
   }
  else{
    $role=$_SESSION['role'];
    if($role == 'normal_customer');{
       $list = $this->list_normal_products(($start-1)*9,9);
    }
     if($role == 'admin'){
      $list = $this->list_total_products(($start-1)*9,9);
     }
     if($_SESSION['role'] == 'vip_customer'){
      $list = $this->list_vip_products(($start-1)*9,9);
     }

  }
  $i=($start-1)*9 +1;
  foreach ($list as $element):
    if ($i%3==1){
      echo "<div class='container'>";
      echo "<div class='row'>";
    }
?>  
   <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><a href="index.php?lastop=<?php echo $_GET['op']?>&op=showproduct&id=<?php echo $element->id; ?>"><?php echo $element->name?></a></div>
          <div class="panel-body text-center"><img src="admin/public/uploads/<?php echo $element->images;?>" class="img-responsive" style="width:200px; height: 150px;" alt="Image"></div>
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