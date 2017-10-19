<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Store</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
    include 'connect.php';
    $sqlGetTotalProduct =  "SELECT name from products";
    $resultGetTotalProduct = $conn_php09_basic->query($sqlGetTotalProduct);
    $total = $resultGetTotalProduct->num_rows;
    $limit = 3;

    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }

    $from = $limit*($page - 1);
    $sqlSelectProduct    = "SELECT products.id, products.name, products.description, products.price, products.created, products.image, categories.name as category_name FROM products INNER JOIN categories
    ON products.category_id = categories.id LIMIT $from,$limit";
    $resultSelectProduct = $conn_php09_basic->query($sqlSelectProduct);
?>
    <h1>List products</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Category</th>
        <th>Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($resultSelectProduct->num_rows > 0) {
        //show list users
        $i = 1;
        while($elementProduct = $resultSelectProduct->fetch_assoc()) {
          $image  = $elementProduct['image'];
          $id     = $elementProduct['id'];
          echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$elementProduct['name']."</td>";
            echo "<td>".$elementProduct['description']."</td>";
            echo "<td>".$elementProduct['price']."</td>";
            echo "<td>"."<img src='uploads/products/$image' width=100px height = 150px>"."</td>";
            echo "<td>".$elementProduct['category_name']."</td>";
            echo "<td>".$elementProduct['created']."</td>";
            echo "<td><a href='buy_product.php?id=$id'>Buy</a></td>";
          echo "</tr>";
          $i++;
        }
      ?>
    </tbody>
  </table>
  <?php }else{
    echo "No product";
  }
  for($i = 1; $i <= ceil($total/$limit); $i++){
    echo "<a href='index.php?page=$i'>$i</a> | ";
  }
    //get total product
    // <div class="container">    
    //   <div class="row">
    //     <div class="col-sm-4">
    //       <div class="panel panel-primary">
    //         <div class="panel-heading">BLACK FRIDAY DEAL</div>
    //         <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
    //         <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
    //       </div>
    //     </div>
    //     <div class="col-sm-4"> 
    //       <div class="panel panel-danger">
    //         <div class="panel-heading">BLACK FRIDAY DEAL</div>
    //         <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
    //         <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
    //       </div>
    //     </div>
    //     <div class="col-sm-4"> 
    //       <div class="panel panel-success">
    //         <div class="panel-heading">BLACK FRIDAY DEAL</div>
    //         <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
    //         <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
    //       </div>
    //     </div>
    //   </div>
    // </div>
    // <br>
?>
<br><br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
