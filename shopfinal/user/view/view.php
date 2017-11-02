<?php
  include 'user/common/headder.php';
?>
  <link rel="stylesheet" type="text/css" href="user/view/css/view.css">
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
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?op=home">Home</a></li>
        <li><a href="index.php?op=products">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- LOGIN -->
        <?php if(!isset($_SESSION['login'])){ ?>
          <li><a href="#" onclick="document.getElementById('loginform').style.display ='block'"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
        <?php } else { ?>
          <li><a href="index.php?op=logout"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
        <?php } ?>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-inbox"></span>Selected</a>
          <ul class="dropdown-menu">
              <li class="text-center"><button type="submit" name="addtocart" class="btn btn-primary">Add them All to Cart</button></li>
              <li>
                <?php include 'user/view/selected.php'; ?>
              </li>
          </ul>
        </li> 
        <li><a href="#"><?php echo $_SESSION['count'];?></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="#">0</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php include $viewOption;?>
<?php
  include 'user/common/footer.php';
?>
<div id="loginform" style="display: none;">
    <div class="box">
      <div class="row title"></div>
        <div class="col-md-6 text-left ">Login</div>
        <div class="col-md-6 text-right"><a href="#" onclick="document.getElementById('loginform').style.display ='none'"> <span class="glyphicon glyphicon-remove"></span></a></div>      
    </div>   
    <?php include 'user/view/login.php';?>
</div>