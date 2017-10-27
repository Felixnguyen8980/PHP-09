<?php
include'config/connect.php';
include 'model/admin_model.php';
session_start();
class categories{
	public $total;
	public $categoriespage;
	public $limit=5;
}
class admin_controller extends categories{
	public $subview1='';
	public $subview2='';
	public function handle_request(){
		$op = isset($_GET['op'])?$_GET['op']:NULL;
		if (! isset($_SESSION['admin'])){
			$this->login();
		} else {
			if(!$op || $op=='home') {
				$includeview ='';
				$this->mainview($includeview);
			} elseif ($op=='out') {
				$this->logout();
			} elseif ($op=='listproducts') {
				$this->viewlist();
			} elseif ($op=='addproducts') {
				$this->addproducts();
			} elseif ($op=='categories') {
				$this->categoriespage = isset($_GET['categoriespage'])?$_GET['categoriespage']:NULL;
				if (!$this->categoriespage) {
					$this->categoriespage = 1;
				}
				$this->categories($this->categoriespage);
			}
		}
	}
	public function mainview(){
		include 'view/view.php';
	}
	public function login(){
		$adminMode = new adminModel(); 
		require_once 'view/login.php';
		$login = $adminMode->login();
		if (isset($_SESSION['admin'])){
			header("Location: index.php");
		}
	}
	public function logout(){
			$adminMode = new adminModel(); 
			$logout = $adminMode->logout();
			header("Location: index.php");
	}
	public function viewlist(){
		$adminMode = new adminModel(); 
		$view = $adminMode->viewlist();
	}
	public function addproducts(){
		$includeview ='view/addproducts.php'; 
		$this->subview1 = $includeview;
		$this->mainview();
		$adminMode = new adminModel(); 
		$add = $adminMode->addproducts();
	}
	public function categories($categoriespage){
		$includeview ='view/categories.php'; 
		$adminMode = new adminModel(); 
		$view = $adminMode->viewcategories($categoriespage,$this->limit);
		$add = $adminMode->addcategories();
		$this->subview1 = $includeview;
		$this->subview2 = $view;
		$this->total = $adminMode->countdata($database='product_categories');
		$this->mainview();
	}
}
?>