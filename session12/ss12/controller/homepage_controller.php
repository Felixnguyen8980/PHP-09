<?php
require_once 'config/database.php';
require_once 'model/homepage_model.php';
session_start();
class HomePageController {

	public function requestByCustomer(){
		$action = isset($_GET['action'])?$_GET['action']:'home';
		$controller = isset($_GET['controller'])?$_GET['controller']:'home_controller';
		switch ($action) {
			case 'home':
				//list product
				// tao model va co mot ham de lay danh sach san pham ra
				$productCategoryID = isset($_GET['product_category_id'])?$_GET['product_category_id']:NULL;
				$homePageModel = new HomePageModel();
				$listProduct = $homePageModel->getListProduct($productCategoryID);
				$listUser = $homePageModel->getListUser();
				$listCategory = $homePageModel->getListCategory();
				include 'view/homepage/list_product.php';

				break;
			case 'delete':
				$id = isset($_GET['id'])?$_GET['id']:NULL;
				$homePageModel = new HomePageModel();
				$listProduct = $homePageModel->deleteProduct($id);
				break;
			case 'add':
				$homePageModel = new HomePageModel();
				$listProductCategory = $homePageModel->GetProductCategory();
				if (isset($_POST['submit'])) {
					$name =  $_POST['name'];
   					$description  = $_POST['description'];
   					$price        = $_POST['price'];
   					$discount	  = $_POST['discount'];
   					$image        = $_FILES['avatar'];
   					$category_id  = $_POST['category'];
   					$imageName    = strtotime('now').$_FILES['avatar']['name'];
   					$created      = date('Y-m-d');
   					$isHot        = $_POST['ishot'];
   					
   					$folderUploads = 'public/uploads/';
  					move_uploaded_file($image['tmp_name'], $folderUploads.$imageName);

  					$homePageModel = new HomePageModel();
  					$addProduct = $homePageModel->AddProduct($category_id, $name, $description, $price,  $discount, $imageName, $isHot, $created);
  					header('Location:index.php');
				}				
				include 'view/homepage/add_product.php';
				break;	
			case 'edit':
				var_dump($_FILES['avatar']['error']);
				$id = isset($_GET['id'])?$_GET['id']:NULL;
				$homePageModel = new HomePageModel();
				$listProductCategory = $homePageModel->GetProductCategory();

				$getProduct = $homePageModel->getProduct($id);
				if (isset($_POST['submit'])) {
					$name =  $_POST['name'];
   					$description  = $_POST['description'];
   					$price        = $_POST['price'];
   					$discount	  = $_POST['discount'];
   					$image        = $_FILES['avatar'];
   					$category_id  = $_POST['category'];
   					$imageName    = (!$_FILES['avatar']['error'])?strtotime('now').$_FILES['avatar']['name']:$getProduct->image;
   					$modified      = date('Y-m-d');
   					$isHot        = $_POST['ishot'];
   					if(!$_FILES['avatar']['error']){
   						$folderUploads = 'public/uploads/';
  						move_uploaded_file($image['tmp_name'], $folderUploads.$imageName);
  					}
  					$addProduct = $homePageModel->EditProduct($id,$category_id, $name, $description, $price,  $discount, $imageName, $isHot, $modified);
  					header('Location:index.php');
				}
				include 'view/homepage/edit_product.php';
				break;	
			case 'cart':
				$carts = $_SESSION['cart'];
				$listProductCartID = "(";
				$countCart = count($_SESSION['cart']);
				$i = 1;
				foreach ($carts as $key => $value) {
					$listProductCartID.=$key;
					if($i < $countCart){
						$listProductCartID.=",";
					}
					$i++;
				}
				$listProductCartID .= ")";
				$homePageModel = new HomePageModel();
				$cartProduct = $homePageModel->CartProduct($listProductCartID);
				
				include 'view/homepage/cart.php';
				break;
			case 'buy':
				$idBuy = $_GET['id'];

				if(isset($_SESSION['cart']) && isset($_SESSION['cart'][$idBuy]['quantity'])) {

					$_SESSION['cart'][$idBuy]['id'] = $idBuy;
					$_SESSION['cart'][$idBuy]['quantity'] +=1;
				}else{
					$_SESSION['cart'][$idBuy]['id'] = $idBuy;
					$_SESSION['cart'][$idBuy]['quantity'] = 1;
				}
				header("Location: index.php?action=cart");
				break;
			case 'payment':
				# code...
				var_dump("check login, neu chua login thi dang ky, nguoc lai luu thong tin gio hang vao DB va tro ve trang chu, xoa gio hang");
				break;
			case 'login':
				# code...
				break;
			case 'logout':
				# code...
				break;
			default:
				# code...
				break;
		}
		
	}
}