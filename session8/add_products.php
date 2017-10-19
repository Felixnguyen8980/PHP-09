
<?php
session_start();
 include 'common/header.php';
 include 'connect.php'; ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">My shop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li>
                          <a href="<?php echo $link;?>"><i class="fa fa-sign-out fa-fw"></i><?php echo $content;?></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="list_products.php">List products</a>
                                </li>
                                <li>
                                    <a href="add_products.php">Add productss</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">List users</a>
                                </li>
                                <li>
                                    <a href="morris.html">Add users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                     <?php
                  //get list category
                        $sqlCategory    = "SELECT * FROM categories";
                        $resultCategory = $conn_php09_basic->query($sqlCategory);
                        $category = "";
                        while($elementCategory = $resultCategory->fetch_assoc()) {
                           $categoryID   = $elementCategory['id'];
                           $categoryName = $elementCategory['type'];
                           $category.= "<option value='$categoryID'>$categoryName</option>";
                        }
                     if(isset($_POST['submit'])){
                        $name         = $_POST['name'];
                        $description  = $_POST['description'];
                        $price        = $_POST['price'];
                        $image        = $_FILES['image'];
                        $category_id  = $_POST['category_id'];
                        $imageName    = strtotime('now').$_FILES['image']['name'];
                        $created      = date('Y-m-d h:i:s');
                        //upload avatar into folder
                        $folderUploads = 'uploads/products/';
                        move_uploaded_file($image['tmp_name'], $folderUploads.$imageName);

                        // insert data into users table
                        $sqlInsertProduct = "INSERT INTO products (name, price, description, image, category_id, created) 
                                          VALUES ('$name', '$price', '$description', '$imageName',  '$category_id', '$created')";
                        // insert
                        $conn_php09_basic->query($sqlInsertProduct);
                     }
                     ?>
<h2>Add products</h2>
<p><a href='select_product.php'>List products</a></p>
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post" enctype="multipart/form-data">
   <p>Name: <input type="text" name="name"></p>
   <p>Desciption: <input type="text" name="description"></p>
   <p>Price: <input type="text" name="price"></p>
   <p>Category: 
   <select name = "category_id">
      <?php echo $category;?>
   </select>
   </p>
   <p>Image: <input type="file" name="image"></p>
   <input type="submit" value="Add" name = "submit">
</form>

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include 'common/footer.php' ?>

