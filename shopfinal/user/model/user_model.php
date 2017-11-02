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
	public function listproducts($start,$end){
		$list = $this->viewl('products',$start,$end);
		return $list;
	}
	public function login(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql = "SELECT username FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($this->conn,$sql);
		$lastop=$_GET['lastop'];
		var_dump($lastop);
		var_dump($result->num_rows);
		 if ($result->num_rows >0) {
		 	if(!isset($_SESSION['login'])){
				$_SESSION['login']='login';
			}
		 	header("location:index.php?op=$lastop");
		 } else {
		  	echo "username/password are not matching";
		  	header("location:index.php?op=$lastop");
		 }
	}
}
?>