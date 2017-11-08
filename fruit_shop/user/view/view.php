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
        <li><a href="index.php?op=products" >Products</a></li>
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
             <ul class="dropdown-menu" id="menudrop3">
               <?php
                  $list = $this->view('categories');
                  foreach ($list as  $value) { ?>
                     <li><a href="index.php?op=products&categories=<?php echo $value->id; ?>"><?php echo $value->name; ?></a></li>
                <?php  } 
               ?>
             </ul>
        </li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- LOGIN -->
        <?php if(!isset($_SESSION['login'])){ ?>
          <li><a href="#" onclick="document.getElementById('loginform').style.display ='block'"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
        <?php } else { ?>
          <li><a href="index.php?lastop=<?php echo $_GET['op'];?>&op=logout"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
        <?php } ?>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-inbox"></span>Selected</a>
          <ul class="dropdown-menu" id="menudrop1">
              <li class="text-center">
                <?php
                  if(!isset($_SESSION['login'])){ ?>
                    <button type="submit" name="addtocart" class="btn btn-primary" value="addtocart" onclick="document.getElementById('loginform').style.display ='block'">Add them All to Cart</button>
                  <?php } else {?>
                <form method="post" 
                   action="index.php?lastop=<?php echo $_GET['op'];?>&op=buythemall">
                  <button type="submit" name="addtocart" class="btn btn-primary" value="addtocart">Add them All to Cart</button>
                </form>
               <?php }?>
              </li>
              <li>
                 <div class="row" >
                    <div class="col-md-3 text-center"><b>name</b></div>
                    <div class="col-md-3 text-center"><b>img</b></div>
                    <div class="col-md-2 text-center"><b>price/unit</b></div>
                    <div class="col-md-2
                     text-center"><b>quantity</b></div>
                    <div class="col-md-2 text-center"><b>action</b></div>
                  </div> 
              </li>
              <li>
                <?php include 'user/view/selected.php'; ?>
              </li>
          </ul>
        </li> 
        <li><a href="#">
          <?php if(isset($_SESSION['count'])) {
            echo $_SESSION['count'];
           } else {
            echo "0";
           }
          ?>    
          </a>
        </li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-inbox"></span>Cart</a>
          <ul class="dropdown-menu" id="menudrop2">
            <li class="text-center">
              <?php if(!isset($_SESSION['login'])) {
                echo "Please Login for more information";
                }else {?>
                <div class="row" >
                    <div class="col-md-3 text-center"><b>CartDay</b></div>
                    <div class="col-md-3
                     text-center"><b>quantity</b></div>
                     <div class="col-md-3
                     text-center"><b>price</b></div>
                    <div class="col-md-3 text-center"><b>action</b></div>
                  </div>
              <?php }?>
            </li>
          </ul>
        </li>

        <li><a href="#">0</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php include $viewOption;?>
<div id="loginform" style="display: none;">
    <div class="box">
      <div class="row title"></div>
        <div class="col-md-6 text-left ">Login</div>
        <div class="col-md-6 text-right"><a href="#" onclick="document.getElementById('loginform').style.display ='none'"> <span class="glyphicon glyphicon-remove"></span></a></div>      
    </div> 
   
    <?php include 'user/view/login.php';?>
</div>
