<?php
require_once 'user/config/database.php';
class UserModel extends ConnectDB {
	public function mainpage($view){
		$viewOption=$view;
		include 'user/view/view.php';
	}	
	public function products(){
		if(isset($_POST['btnSelect'])){
			if(isset($_SESSION['count'])){
				$_SESSION['count']+=1;
			} else {
				$_SESSION['count']=1;
			}
			$idBuy = $_POST['btnSelect'];
			if(isset($_SESSION['selected']) && isset($_SESSION['selected'][$idBuy]['quantity'])) {
				$_SESSION['selected'][$idBuy]['id'] = $idBuy;
				$_SESSION['selected'][$idBuy]['quantity'] +=1;
			}else{
				$_SESSION['selected'][$idBuy]['id'] = $idBuy;
				$_SESSION['selected'][$idBuy]['quantity'] = 1;
			}
		}
		$this->mainpage('user/view/products.php');
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
	public function view_normal($table,$start,$end) {
		if(isset($_GET['categories'])){
		$categories_id = $_GET['categories'];
		} else {
			$categories_id=Null;
		}
		if (is_null($categories_id)){
		$sql = "SELECT * FROM $table WHERE price <=1000 LIMIT $start,$end";
		} else {
			$sql = "SELECT * FROM $table WHERE category_id ='$categories_id' AND price <=1000 LIMIT $start,$end";
		}
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		return $element;
	}
	public function view_vip($table,$start,$end) {
		if(isset($_GET['categories'])){
		$categories_id = $_GET['categories'];
		} else {
			$categories_id=Null;
		}
		if (is_null($categories_id)){
			$sql = "SELECT * FROM $table WHERE price >1000 LIMIT $start,$end";
		} else {
			$sql = "SELECT * FROM $table WHERE category_id ='$categories_id' AND price >1000 LIMIT $start,$end";
		}	
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		return $element;
	}
	public function view_total($table,$start,$end) {
		if(isset($_GET['categories'])){
		$categories_id = $_GET['categories'];
		} else {
			$categories_id=Null;
		}
		if (is_null($categories_id)){
			$sql = "SELECT * FROM $table LIMIT $start,$end";
		}else {
			$sql = "SELECT * FROM $table WHERE category_id ='$categories_id'  LIMIT $start,$end";
		}
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
	public function list_normal_products($start,$end){
		$list = $this->view_normal('products',$start,$end);
		return $list;
	}
	public function list_vip_products($start,$end){
		$list = $this->view_vip('products',$start,$end);
		return $list;
	}
	public function list_total_products($start,$end){
		$list = $this->view_total('products',$start,$end);
		return $list;
	}
	public function login(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($this->conn,$sql);
		if (isset($_SESSION['lastop'])){
		$lastop=$_SESSION['lastop'];
		}	else {
			$lastop=$_GET['lastop'];
		}

		 if ($result->num_rows >0) {
		 	 $element = array();
		 	 while (($obj = mysqli_fetch_object($result))!=NULL){
			 $element[] = $obj;
			 }
			foreach ($element as $value)
			 	if(!isset($_SESSION['login'])){
					$_SESSION['login']=$value->id;
				}
				
				if (isset($_SESSION['login'])){

				 	if(!isset($_SESSION['role'])){
				 		$_SESSION['role']=$value->role;
				 	}
				 }
		 	header("location:index.php?op=$lastop");
		 } else {
		  	echo "username/password are not matching";
		  	header("location:index.php?op=$lastop");
		 }
	}
	public function logout(){
		$lastop=$_GET['lastop'];
		session_destroy();
		header("location:index.php?op=$lastop");
	}
	public function showproduct(){
		$this->mainpage('user/view/showproduct.php');
	}

}
?>