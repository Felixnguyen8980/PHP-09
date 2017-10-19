<?php include 'common/header.php' ?>
<body>
    <?php 
        include 'connect.php';
        if(!isset($_SESSION['login'])) {
            $link = "login.php";
            $content = "Login";
        } else {
            $link = "logout.php";
            $content = "Logout";
        }
    ?>
 <style>
 	.ad_function a{
 		text-decoration: none;
 		color: white;
 	}
 	.ad_function a:hover{
 		text-decoration: none;
 		color: white;
 	}

</style>
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
							$sqlSelectProduct    = "SELECT products.id, products.name, products.description, products.price, products.created, products.image, categories.name as category_name FROM products INNER JOIN categories
							ON products.category_id = categories.id";
							$resultSelectProduct = $conn_php09_basic->query($sqlSelectProduct);
						?>
						<h1>List products</h1>
							<p><a href='add_product.php'>Add products</a></p>
							
							   <table class="table table-striped table-bordered table-hover">
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
												echo "<td>
														<button type='button' class='btn btn-primary ad_function'>
															<a href='DelProducts.php?id=$id'>DELETE</a>
														</button></td>";
												echo "</tr>";
											$i++;
										}
									?>
									</tbody>
									</table>
									
									<?php } else {
										echo "No product";
									}
						//var_dump($resultSelectUser);exit();
							?>

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include 'common/footer.php' ?>
