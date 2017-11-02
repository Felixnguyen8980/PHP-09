<?php
require_once 'config/database.php';
class AdminModel extends ConnectDB {
	public function adminpage($view){
		$viewOption=$view;
		include 'view/view.php';
	}
	public function categories() {
	    $this->newCategories();
		$this->adminpage('view/categories.php');
	}
	public function view($table) {
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		return $element;
	}
	public function viewl($table,$start,$end) {
		$sql = "SELECT * FROM $table LIMIT $start,$end";
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		return $element;
	}
	public function getid($table,$id) {
		$sql = "SELECT * FROM $table WHERE id=$id";
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		foreach ($element as $value)
		return $value;
	}
	public function newCategories(){
		if (isset($_POST['newCategory'])){
			$Category = $_POST['Category'];
			$sql = "INSERT INTO product_categories (name) VALUES ('$Category')";
			$connect = new connectDB();
			mysqli_query($this->conn,$sql);
		}
		unset($_POST['newCategories']);
	}
	public function listCategories($start,$end){
		$list = $this->viewl('product_categories',$start,$end);
		return $list;
	}
	public function listproducts($start,$end){
		$list = $this->viewl('products',$start,$end);
		return $list;
	}
	public function addproducts(){
		$this->adminpage('view/add_products.php');
		if(isset($_POST['submit']) && isset($_POST['name'])) {
			$name = $_POST['name'];
			$description = $_POST['description'];
			$category = $_POST['product_category_id'];
			$price = $_POST['price'];
			$file = strtotime("now").($_FILES["fileUpload"]["name"]);
			$day = date("Y-m-d");
			$ishot = $_POST['ishot'];
			//addproduct
			$sql = "INSERT INTO products (name,description,product_category_id,price,image,created,is_hot) VALUES ('$name','$description','$category','$price','$file','$day','$ishot')";	
			mysqli_query($this->conn,$sql);	
			$dir='public/uploads/';
			$target_file=$dir.$file;
			move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
			unset($_POST['submit']);;
			header("location: index.php?op=addproducts");
		}
	}
	public function viewproducts(){
		$this->adminpage('view/list_products.php');
	}
	public function delete(){
		$id=$_GET['id'];
		$start=$_GET['start'];
		$sql = "DELETE FROM products WHERE id=$id";
		mysqli_query($this->conn,$sql);
		header("location: index.php?op=viewproducts&start=$start");
	}
	public function editProduct(){
		$id=$_GET['id'];
		$start=$_GET['start'];
		$getProduct = $this->getid('products',$id);
		$name = $_POST['name'];
			$description = $_POST['description'];
			$category = $_POST['product_category_id'];
			$price = $_POST['price'];
			$discount = $_POST['discount'];
			$modified  = date('Y-m-d');
			$file = (!$_FILES['fileUpload']['error'])?strtotime('now').$_FILES['fileUpload']['name']:$getProduct->image;
			$day = date("Y-m-d");
			$ishot = $_POST['ishot'];
			$dir='public/uploads/';

			$target_file=$dir.$file;
			$sql = "UPDATE products SET product_category_id = '$category',name = '$name', description = '$description', price = '$price', discount= '$discount', image = '$file', is_hot= '$ishot', modified = '$modified' WHERE id=$id";
			var_dump($sql);
			if(!$_FILES['fileUpload']['error']){
   						$folderUploads = 'public/uploads/';
  						move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$target_file);
  			}
  			mysqli_query($this->conn,$sql);	
  			header("location: index.php?op=viewproducts&start=$start");
	}
}
?>