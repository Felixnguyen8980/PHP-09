<?php
include 'model/admin_model.php';
class AdminController{
	public function handle_request(){
		$op = (isset($_GET['op']))? $_GET['op']:NULL;
		switch ($op) {
			case NULL:
				 	$this->adminpage();
				break;
			case 'view':
				 	$this->adminpage();
				break;
			case 'categories':
				 	$this->categories();
				break;
			case 'addproducts':
				 	$this->addproducts();
				break;
			case 'viewproducts':
				 	$this->viewproducts();
				break;
			case 'delete':
				 	$this->delete();
				break;
			case 'edit':
				 	$this->editProduct();
				break;
			default:
				# code...
				break;
		}
	}
	public function adminpage(){
		$model = new AdminModel();
		$view = 'view/message.php';
		$tabs=$model->adminpage($view);
	}
	public function categories(){
		$model = new AdminModel();
		$model->categories();
	}
	public function addproducts(){
		$model = new AdminModel();
		$model->addproducts();
	}
	public function viewproducts(){
		$model = new AdminModel();
		$model->viewproducts();
	}
	public function delete(){
		$model = new AdminModel();
		$model->delete();
	}
	public function editProduct(){
		$model = new AdminModel();
		$model->adminpage('view/editProduct.php');
		if(isset($_POST['submit'])) {
		$start=$_GET['start'];
		$model->editProduct();
		}
	}
}
?>