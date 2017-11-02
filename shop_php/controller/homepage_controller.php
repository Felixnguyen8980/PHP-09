<?php
require_once 'config/database.php';
require_once 'model/homepage_model.php';
class HomePageController {

	public function requestByCustomer(){
		$action = isset($_GET['action'])?$_GET['action']:'home';
		//var_dump($action);
		switch ($action) {
			case 'home':
				$this->homepage();
				break;
			case 'buy':
				# code...
				break;
			case 'cart':
				# code...
				break;
			case 'payment':
				# code...
				break;
			case 'login':
				# code...
				break;
			case 'logout':
				# code...
				break;
			case 'delete':
				$this->delete();
				break;
			case 'select':
				$this->select();
				default:
				# code...
				break;
		}
		
	}
	public function homepage(){
		$data1='products';
		$data2='users';
		$homePageModel = new HomePageModel();
		$listProduct = $homePageModel->getList($data1);
		$listUser = $homePageModel->getList($data2);
		include 'view/homepage/list_product.php';
		include 'view/homepage/list_user.php';
	}
	public function delete(){
		$table=$_GET['table'];
		$id=$_GET['id'];
		$homePageModel = new HomePageModel();
		$delete = $homePageModel->delete($table,$id);
		$this->homepage();
	}
	public function select(){
		$categori_id = $_GET['category_id'];
		$homePageModel = new HomePageModel();
		$listProduct = $homePageModel->select($categori_id);
		include 'view/homepage/list_product.php';
		$data2='users';
		$listUser = $homePageModel->getList($data2);
		include 'view/homepage/list_user.php';	
	}
}
?>